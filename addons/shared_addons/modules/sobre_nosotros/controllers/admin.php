<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * @author 	    Brayan Acebo
 * @subpackage 	Sobre Nosotros Module
 * @category 	Modulos
 * @license 	Apache License v2.2
 */
class Admin extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $models = array(
            'sobre_nosotros_m'
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
        $this->form_validation->set_rules('title_three', 'Título Tres', 'required|max_length[455]|trim');
        $this->form_validation->set_rules('text_three', 'Texto Tres', 'required|trim');

		if($this->form_validation->run()!==TRUE)  // abrimos el formulario de edicion
		{
			if(validation_errors() == "")
			{
				$this->session->set_flashdata('error', validation_errors());
			}

			$data = $this->sobre_nosotros_m->limit(1)->get_all();

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
                'text_two' => html_entity_decode($post->text_two),
                'title_three' => $post->title_three,
                'text_three' => html_entity_decode($post->text_three)
            );

           	$config['upload_path'] = './' . UPLOAD_PATH . '/sobre_nosotros';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2050;
            $config['max_width'] = 1500;
            $config['max_height'] = 700;
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            $img = $_FILES['image']['name'];

            //imagen
            if (!empty($img)) {
                if ($this->upload->do_upload('image')) {
                    $datos = array('upload_data' => $this->upload->data());
                    $path = UPLOAD_PATH . 'sobre_nosotros/' . $datos['upload_data']['file_name'];
                    $img = array('image' => $path);
                    $data = array_merge($data, $img);
                    $obj = $this->db->where('id', $post->id)->get('sobre_nosotros')->row();
                    @unlink($obj->image);
                }
                else
                {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admin/sobre_nosotros');
                }
            }

            if ($this->sobre_nosotros_m->update_all($data))
            {
                // insert ok, so
                $this->session->set_flashdata('success', lang('sobre_nosotros:success_message'));
                redirect('admin/sobre_nosotros');
            } else {
                $this->session->set_flashdata('error', lang('sobre_nosotros:error_message'));
                redirect('admin/sobre_nosotros');
            }
		}
    }

}
