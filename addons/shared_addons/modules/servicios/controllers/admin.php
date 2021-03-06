<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Brayan Acebo
 */

// Ajustamos Zona Horaria
date_default_timezone_set("America/Bogota");

class Admin extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $models = array(
            "servicios_model",
            "servicios_image_model"
            );
        $this->load->model($models);
    }

    // -----------------------------------------------------------------

    public function index() {

        // Paginación de servicios
        $pagination = create_pagination('admin/servicios/index', $this->db->count_all('servicios'), 10);

        // Se consultan los servicios
        $servicios = $this->db
        ->order_by('id', 'DESC')
        ->limit($pagination['limit'], $pagination['offset'])
        ->get('servicios')
        ->result();

        $this->template
        ->set('pagination', $pagination)
        ->set('servicios', $servicios)
        ->build('admin/index');
    }

    /*
     * servicios
     */

    public function create() 
    {
        $this->template->build('admin/create');
    }

    // -----------------------------------------------------------------

    public function store() {

        // Validaciones del Formulario
        $this->form_validation->set_rules('name', 'Nombre', 'required|trim');
        $this->form_validation->set_rules('description', 'Descripción', 'required|trim');
        $this->form_validation->set_rules('introduction', 'Introducción', 'required|trim');

        // Se ejecuta la validación
        if ($this->form_validation->run() === TRUE) {
            $post = (object) $this->input->post();

            // Array que se insertara en la base de datos
            $data = array(
                'name' => $post->name,
                'slug' => slug($post->name),
                'description' => $post->description,
                'introduction' => $post->introduction,
                'created_at' => date('Y-m-d H:i:s')
                );

            // Se carga la imagen
            $config['upload_path'] = './' . UPLOAD_PATH . '/servicios';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2050;
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            // imagen uno
            $img = $_FILES['image']['name'];

            if (!empty($img)) {
                if ($this->upload->do_upload('image')) {
                    $datos = array('upload_data' => $this->upload->data());
                    $path = UPLOAD_PATH . 'servicios/' . $datos['upload_data']['file_name'];
                    $img = array('image' => $path);
                    $data = array_merge($data, $img);
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admin/servicios/');
                }
            }

            // Se inserta en la base de datos
            if ($this->db->insert('servicios', $data)) 
            {
                $this->session->set_flashdata('success', 'Los registros se ingresaron con éxito.');
                redirect('admin/servicios');
            } else {
                $this->session->set_flashdata('error', 'Error al almacenar los registros');
                redirect('admin/servicios/create');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/servicios/create');
        }
    }

    // -----------------------------------------------------------------

    public function destroy($id = null) {
        $id or redirect('admin/servicios');
        $obj = $this->db->where('id', $id)->get($this->db->dbprefix.'servicios')->row();
        if ($this->db->where('id', $id)->delete('servicios'))
        {
            @unlink($obj->image); // Eliminamos archivo existente
            $this->session->set_flashdata('success', 'El registro se elimino con éxito.');
        } else {
            $this->session->set_flashdata('error', 'No se logro eliminar el registro, inténtelo nuevamente');
        }
        redirect('admin/servicios');
    }

    // --------------------------------------------------------------------------------------

    public function edit($id = null) {
        $id or redirect('admin/servicios');
        $servicio = $this->db->where('id', $id)->get('servicios')->row();

        $this->template
        ->set('servicio', $servicio)
        ->build('admin/edit');
    }

    // -----------------------------------------------------------------

    public function update() {

        // Validaciones del Formulario
        $this->form_validation->set_rules('name', 'Nombre', 'required|trim');
        $this->form_validation->set_rules('description', 'Descripción', 'required|trim');
        $this->form_validation->set_rules('introduction', 'Introducción', 'required|trim');

        // Se ejecuta la validación
        if ($this->form_validation->run() === TRUE) {
            $post = (object) $this->input->post();

            // Array que se insertara en la base de datos
            $data = array(
                'name' => $post->name,
                'slug' => slug($post->name),
                'description' => $post->description,
                'introduction' => $post->introduction
                );

            // Se carga la imagen
            $config['upload_path'] = './' . UPLOAD_PATH . '/servicios';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2050;
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            // imagen uno
            $img = $_FILES['image']['name'];

            if (!empty($img)) {
                if ($this->upload->do_upload('image')) {
                    $datos = array('upload_data' => $this->upload->data());
                    $path = UPLOAD_PATH . 'servicios/' . $datos['upload_data']['file_name'];
                    $img = array('image' => $path);
                    $data = array_merge($data, $img);
                    $obj = $this->db->where('id', $post->id)->get('servicios')->row();
                    @unlink($obj->image);
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admin/servicios/');
                }
            }

            // Se inserta en la base de datos
            if ($this->db->where('id', $post->id)->update('servicios', $data))
            {
                $this->session->set_flashdata('success', 'Los registros se ingresaron con éxito.');
                redirect('admin/servicios');
            } else {
                $this->session->set_flashdata('error', 'Error al almacenar los registros');
                redirect('admin/servicios/create');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/servicios/create');
        }
    }

    /*
     * Administración de imagenes
     */

    public function images($id = null) {
        $id or redirect('admin/servicios');
        // Se consultan las imagenes del servicios
        $images = $this->db->where('servicio_id', $id)->get('servicios_images')->result();
        $servicio = $this->db->where('id', $id)->get('servicios')->row();

        $this->template
        ->set('servicio', $servicio)
        ->set('images', $images)
        ->build('admin/images');
    }

    // ----------------------------------------------------------------------------------

    public function create_image($id = null) {
        $id or redirect('admin/servicios');
        $servicio = $this->db->where('id', $id)->get('servicios')->row();

        $this->template
        ->set('servicio', $servicio)
        ->build('admin/create_image');
    }

    // -----------------------------------------------------------------

    public function store_image()
    {
    	// Se carga la imagen
        $config['upload_path'] = './' . UPLOAD_PATH . '/servicios';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2050;
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        $id = $this->input->post('id');

		// imagen
        $img = $_FILES['image']['name'];
        $image = array();

        if (!empty($img)) {
           if ($this->upload->do_upload('image')) {
               $datos = array('upload_data' => $this->upload->data());
               $path = UPLOAD_PATH . 'servicios/' . $datos['upload_data']['file_name'];
               $image = array(
                   'servicio_id' => $id,
                   'path' => $path
                   );
           } else {
               $this->session->set_flashdata('error', $this->upload->display_errors());
               redirect('admin/servicios/images/'.$id);
           }
       }


            // Se inserta en la base de datos
       if ($this->db->insert('servicios_images', $image)) {
        $this->session->set_flashdata('success', 'Los registros se ingresaron con éxito.');
        redirect('admin/servicios/images/'.$id);
    } else {
        $this->session->set_flashdata('error', 'Error al almacenar los registros');
        redirect('admin/servicios/create_image/'.$id);
    }
}

    // -----------------------------------------------------------------

public function destroy_image($id = null,$servicios_id = null) {
    $id or redirect('admin/servicios');
    $servicios_id or redirect('admin/servicios');
    $obj = $this->db->where('id', $id)->get('servicios_images')->row();
    if ($this->db->where('id', $id)->delete('servicios_images'))
    {
            @unlink($obj->path); // Eliminamos archivo existente
            $this->session->set_flashdata('success', 'El registro se elimino con éxito.');
        } else {
            $this->session->set_flashdata('error', 'No se logro eliminar el registro, inténtelo nuevamente');
        }
        redirect('admin/servicios/images/'.$servicios_id);
    }

}