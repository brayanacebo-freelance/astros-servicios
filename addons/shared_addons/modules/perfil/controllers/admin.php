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
            "perfil_model",
            "perfil_chapter_model",
            "perfil_chapter_image_model"
            );
        $this->load->model($models);
    }

    // -----------------------------------------------------------------

    public function index() {

        // Paginación de novelas
        $pagination = create_pagination('admin/perfil/index', $this->perfil_chapter_model->count_all(), 10);

        // Se consultan los novelas
        $chapters = $this->perfil_chapter_model
        ->order_by('id', 'DESC')
        ->limit($pagination['limit'], $pagination['offset'])
        ->get_all();

        $perfil = $this->perfil_model->get(1);

        $this->template
        ->set('pagination', $pagination)
        ->set('chapters', $chapters)
        ->set('perfil', $perfil)
        ->build('admin/index');
    }

    // -----------------------------------------------------------------

    public function update_video() {

        // Validaciones del Formulario
        $this->form_validation->set_rules('video', 'Video', 'required|trim');

        // Se ejecuta la validación
        if ($this->form_validation->run() === TRUE) {
            $post = (object) $this->input->post();

            // Array que se insertara en la base de datos
            $data = array(
                'video' => $post->video
            );

            // Se inserta en la base de datos
            if ($this->perfil_model->update(1, $data)) {
                $this->session->set_flashdata('success', 'Los registros se ingresaron con éxito.');
            } else {
                $this->session->set_flashdata('error', 'Error al almacenar los registros');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
        }

        redirect('admin/perfil');
    }

    /*
     * Novelas
     */

    public function create() {
        $this->template->build('admin/create');
    }

    // -----------------------------------------------------------------

    public function store() {

        // Validaciones del Formulario
        $this->form_validation->set_rules('title', 'Titulo', 'required|trim');
        $this->form_validation->set_rules('date', 'Fecha', 'required|trim');
        $this->form_validation->set_rules('video', 'Video', 'required|trim');
        $this->form_validation->set_rules('country', 'Pais', 'trim');
        $this->form_validation->set_rules('description', 'Descripción', 'required|trim');

        // Se ejecuta la validación
        if ($this->form_validation->run() === TRUE) {
            $post = (object) $this->input->post();

            // Array que se insertara en la base de datos
            $data = array(
                'title' => $post->title,
                'slug' => slug($post->title),
                'date' => $post->date,
                'country' => $post->country,
                'video' => $post->video,
                'description' => $post->description,
                'created_at' => date('Y-m-d H:i:s')
            );

            // Se inserta en la base de datos
            if ($this->perfil_chapter_model->insert($data)) {
                $this->session->set_flashdata('success', 'Los registros se ingresaron con éxito.');
                redirect('admin/perfil');
            } else {
                $this->session->set_flashdata('error', 'Error al almacenar los registros');
                redirect('admin/perfil/create');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/perfil/create');
        }
    }

    // -----------------------------------------------------------------

    public function destroy($id = null) {
        $id or redirect('admin/perfil');
        if ($this->perfil_chapter_model->delete($id)) {
            $this->session->set_flashdata('success', 'El registro se elimino con éxito.');
        } else {
            $this->session->set_flashdata('error', 'No se logro eliminar el registro, inténtelo nuevamente');
        }
        redirect('admin/perfil');
    }

    // --------------------------------------------------------------------------------------

    public function edit($id = null) {
        $id or redirect('admin/perfil');
        $chapter = $this->perfil_chapter_model->get($id);
        
        $this->template
        ->set('chapter', $chapter)
        ->build('admin/edit');
    }

    // -----------------------------------------------------------------

    public function update() {

        // Validaciones del Formulario
        $this->form_validation->set_rules('title', 'Titulo', 'required|trim');
        $this->form_validation->set_rules('date', 'Fecha', 'required|trim');
        $this->form_validation->set_rules('video', 'Video', 'required|trim');
        $this->form_validation->set_rules('country', 'Pais', 'trim');
        $this->form_validation->set_rules('description', 'Descripción', 'required|trim');

        // Se ejecuta la validación
        if ($this->form_validation->run() === TRUE) {
            $post = (object) $this->input->post();

            // Array que se insertara en la base de datos
            $data = array(
                'title' => $post->title,
                'slug' => slug($post->title),
                'date' => $post->date,
                'country' => $post->country,
                'video' => $post->video,
                'description' => $post->description
            );

            // Se inserta en la base de datos
            if ($this->perfil_chapter_model->update($post->id, $data)) {
                $this->session->set_flashdata('success', 'Los registros se ingresaron con éxito.');
                redirect('admin/perfil');
            } else {
                $this->session->set_flashdata('error', 'Error al almacenar los registros');
                redirect('admin/perfil/create');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/perfil/create');
        }
    }

    /*
     * Administración de imagenes
     */

    public function images($id = null) {
        $id or redirect('admin/perfil');
        // Se consultan las imagenes del album
        $images = $this->perfil_chapter_image_model->get_many_by("chapters_id",$id);
        $chapter = $this->perfil_chapter_model->get_many_by("id",$id);
        $chapter = $chapter[0];

        $this->template
        ->set('chapter', $chapter)
        ->set('images', $images)
        ->build('admin/images');
    }

    public function create_image($id = null) {
        $id or redirect('admin/perfil');
        $perfil = $this->perfil_chapter_model->get_many_by("id", $id);
        $perfil= $perfil[0];
        $this->template
        ->set('perfil', $perfil)
        ->build('admin/create_image');
    }

    // -----------------------------------------------------------------

    public function store_image() {

            // Se carga la imagen
        $config['upload_path'] = './' . UPLOAD_PATH . '/perfil';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2050;
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        $id = $this->input->post('id');

		// imagen uno
        $img = $_FILES['image']['name'];
        $image = array();

        if (!empty($img)) {
           if ($this->upload->do_upload('image')) {
               $datos = array('upload_data' => $this->upload->data());
               $path = UPLOAD_PATH . 'perfil/' . $datos['upload_data']['file_name'];
               $image = array(
                   'chapters_id' => $id,
                   'image' => $path
                   );
           } else {
               $this->session->set_flashdata('error', $this->upload->display_errors());
               redirect('admin/perfil/images/'.$id);
           }
       }

            // Se inserta en la base de datos
       if ($this->perfil_chapter_image_model->insert($image)) {
        $this->session->set_flashdata('success', 'Los registros se ingresaron con éxito.');
        redirect('admin/perfil/images/'.$id);
    } else {
        $this->session->set_flashdata('error', lang('galeria:error_message'));
        redirect('admin/perfil/create_image/'.$id);
    }
}

    // -----------------------------------------------------------------

public function destroy_image($id = null, $album_id = null) {
    $id or redirect('admin/perfil');
    $obj = $this->perfil_chapter_image_model->get_many_by('id',$id);
    $obj = $obj[0];
    if ($this->perfil_chapter_image_model->delete($id)) {
            @unlink($obj->path); // Eliminamos archivo existente
            $this->session->set_flashdata('success', 'El registro se elimino con éxito.');
        } else {
            $this->session->set_flashdata('error', 'No se logro eliminar el registro, inténtelo nuevamente');
        }
        redirect('admin/perfil/images/'.$album_id);
    }

}