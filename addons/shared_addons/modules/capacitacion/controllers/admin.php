<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * @author 	    Brayan Acebo
 * @subpackage 	Capacitación Module
 * @category 	Modulos
 * @license 	Apache License v2.2
 */
class Admin extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $models = array(
            'capacitacion_model'
            );
        $this->load->model($models);
    }

    // ------------------------------------------------------------------------------------------

    public function index()
    {
		$this->form_validation->set_rules('title_one', 'Título Uno', 'required|max_length[455]|trim');
        $this->form_validation->set_rules('text_one', 'Texto Uno', 'required|trim');
        $this->form_validation->set_rules('title_two', 'Título Dos', 'required|max_length[455]|trim');
        $this->form_validation->set_rules('text_two', 'Texto Dos', 'required|trim');

		if($this->form_validation->run()!==TRUE)  // abrimos el formulario de edicion
		{
			if(validation_errors() == "")
			{
				$this->session->set_flashdata('error', validation_errors());
			}

			$data = $this->capacitacion_model->limit(1)->get_all();

        	$this->template->set('data', $data[0])
                	->build('admin/index');
		}
		else // si el formulario ha sido enviado con éxito se procede
		{
			$post = (object) $this->input->post();

            $data = array(
                'title_one' => $post->title_one,
                'text_one' => html_entity_decode($post->text_one),
                'title_two' => $post->title_two,
                'text_two' => html_entity_decode($post->text_two)
            );

           	$config['upload_path'] = './' . UPLOAD_PATH . '/capacitacion';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2050;
            $config['max_width'] = 1000;
            $config['max_height'] = 700;
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            $imgOne = $_FILES['image_one']['name'];

            //imagen Uno
            if (!empty($imgOne)) {
                if ($this->upload->do_upload('image_one')) {
                    $datos = array('upload_data' => $this->upload->data());
                    $path = UPLOAD_PATH . 'capacitacion/' . $datos['upload_data']['file_name'];
                    $imgOne = array('image_one' => $path);
                    $data = array_merge($data, $imgOne);
                    $obj = $this->db->where('id', $post->id)->get('capacitacion')->row();
                    @unlink($obj->image_one);
                }
                else
                {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admin/capacitacion');
                }
            }

            //Imagen Dos
             $imgTwo = $_FILES['image_two']['name'];

            if (!empty($imgTwo)) {
                if ($this->upload->do_upload('image_two')) {
                    $datos = array('upload_data' => $this->upload->data());
                    $path = UPLOAD_PATH . 'capacitacion/' . $datos['upload_data']['file_name'];
                    $imgTwo = array('image_two' => $path);
                    $data = array_merge($data, $imgTwo);
                    $obj = $this->db->where('id', $post->id)->get('capacitacion')->row();
                    @unlink($obj->image_two);
                }
                else
                {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admin/capacitacion');
                }
            }

            if ($this->capacitacion_model->update_all($data))
            {
                // insert ok, so
                $this->session->set_flashdata('success', lang('capacitacion:success_message'));
                redirect('admin/capacitacion');
            } else {
                $this->session->set_flashdata('error', lang('capacitacion:error_message'));
                redirect('admin/capacitacion');
            }
		}
    }

}
