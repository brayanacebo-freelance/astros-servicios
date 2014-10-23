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
            "leyes_model",
            "leyes_image_model",
            );
        $this->load->model($models);
    }

    // -----------------------------------------------------------------

    public function index() {

        // Paginación de leyes
        $pagination = create_pagination('admin/leyes/index', $this->leyes_model->count_all(), 10);

        // Se consultan las leyes
        $leyes = $this->leyes_model
        ->order_by('id', 'DESC')
        ->limit($pagination['limit'], $pagination['offset'])
        ->get_all();

        $image = $this->leyes_image_model->get(1);

        $this->template
        ->set('pagination', $pagination)
        ->set('leyes', $leyes)
        ->set('image', $image)
        ->build('admin/index');
    }

    // -----------------------------------------------------------------

    public function update_image() {



        $config['upload_path'] = './' . UPLOAD_PATH . '/leyes';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2050;
        $config['max_width'] = 2000;
        $config['max_height'] = 1000;
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        $img = $_FILES['image']['name'];

        if (!empty($img)) {
            if ($this->upload->do_upload('image')) {
                $datos = array('upload_data' => $this->upload->data());
                $path = UPLOAD_PATH . 'leyes/' . $datos['upload_data']['file_name'];
                $img = array('image' => $path);
                $obj = $this->db->where('id', 1)->get('leyes_image')->row();
                @unlink($obj->image);
                // Se inserta en la base de datos
                if ($this->leyes_image_model->update(1, $img)) {
                    $this->session->set_flashdata('success', 'Los registros se ingresaron con éxito.');
                } else {
                    $this->session->set_flashdata('error', 'Error al almacenar los registros');
                }
            }
            else
            {
                $this->session->set_flashdata('error', $this->upload->display_errors());                
            }
        }

        redirect('admin/leyes');
    }

    /*
     * Leyes
     */

    public function create() {
        $this->template->build('admin/create');
    }

    // -----------------------------------------------------------------

    public function store() {

        // Validaciones del Formulario
        $this->form_validation->set_rules('title', 'Titulo', 'required|trim');
        $this->form_validation->set_rules('description', 'Descripción', 'required|trim');

        // Se ejecuta la validación
        if ($this->form_validation->run() === TRUE) {
            $post = (object) $this->input->post();

            // Array que se insertara en la base de datos
            $data = array(
                'title' => $post->title,
                'description' => $post->description,
                'created_at' => date('Y-m-d H:i:s')
                );

            // Se inserta en la base de datos
            if ($this->leyes_model->insert($data)) {
                $this->session->set_flashdata('success', 'Los registros se ingresaron con éxito.');
                redirect('admin/leyes');
            } else {
                $this->session->set_flashdata('error', 'Error al almacenar los registros');
                redirect('admin/leyes/create');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/leyes/create');
        }
    }

    // -----------------------------------------------------------------

    public function destroy($id = null) {
        $id or redirect('admin/leyes');
        if ($this->leyes_model->delete($id)) {
            $this->session->set_flashdata('success', 'El registro se elimino con éxito.');
        } else {
            $this->session->set_flashdata('error', 'No se logro eliminar el registro, inténtelo nuevamente');
        }
        redirect('admin/leyes');
    }

    // --------------------------------------------------------------------------------------

    public function edit($id = null) {
        $id or redirect('admin/leyes');
        $ley = $this->leyes_model->get($id);
        
        $this->template
        ->set('ley', $ley)
        ->build('admin/edit');
    }

    // -----------------------------------------------------------------

    public function update() {

        // Validaciones del Formulario
        $this->form_validation->set_rules('title', 'Titulo', 'required|trim');
        $this->form_validation->set_rules('description', 'Descripción', 'required|trim');

        // Se ejecuta la validación
        if ($this->form_validation->run() === TRUE) {
            $post = (object) $this->input->post();

            // Array que se insertara en la base de datos
            $data = array(
                'title' => $post->title,
                'description' => $post->description
                );

            // Se inserta en la base de datos
            if ($this->leyes_model->update($post->id, $data)) {
                $this->session->set_flashdata('success', 'Los registros se ingresaron con éxito.');
                redirect('admin/leyes');
            } else {
                $this->session->set_flashdata('error', 'Error al almacenar los registros');
                redirect('admin/leyes/create');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/leyes/create');
        }
    }

}