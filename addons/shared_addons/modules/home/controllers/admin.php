<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author @BrayanAcebo
 * copy 2014
 * http://brayanacebo.com
 */

class Admin extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->template->append_metadata($this->load->view('fragments/wysiwyg', null, TRUE));
        $models = array(
            'home_customer_m',
            'home_slider_m',
            'home_featured_m'
            );
        $this->load->model($models);
    }

    /**
    ** Todos los registros en el index
    **/

    public function index()
    {
    	// slider
        $slider = $this->home_slider_m->get_all();
        // Customers
        $customers = $this->home_customer_m ->get_all();
        // Featured
        $featured = $this->home_featured_m ->get_all();

        $this->template
        ->set('customers', $customers)
        ->set('slider', $slider)
        ->set('featured', $featured)
        ->build('admin/index');
    }


    /*
     * Administraccion de los clientes
     */

    public function new_customer()
    {
        $this->template->build('admin/new_customer');
    }

    // -----------------------------------------------------------------

    public function store_customer() {

        $this->form_validation->set_rules('link', 'Link', 'valid_url');

        if ($this->form_validation->run() === TRUE) {
            $post = (object) $this->input->post();
            $data = array(
                'link' => $post->link
                );

            $config['upload_path'] = './' . UPLOAD_PATH . '/home';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2050;
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            // imagen
            $img = $_FILES['image']['name'];

            if (!empty($img)) {
                if ($this->upload->do_upload('image')) {
                    $datos = array('upload_data' => $this->upload->data());
                    $path = UPLOAD_PATH . 'home/' . $datos['upload_data']['file_name'];
                    $img = array('image' => $path);
                    $data = array_merge($data, $img);
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    return $this->index();
                }
            }

            if ($this->home_customer_m->insert($data)) {
                $this->session->set_flashdata('success', 'Los registros se ingresaron con éxito.');
                redirect('admin/home/');
            } else {
                $this->session->set_flashdata('success', 'Error al almacenar los registros');
                return $this->new_customer();
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            return $this->new_customer();
        }
    }

    // -----------------------------------------------------------------

    public function edit_customer($id = null) {

        $id or redirect('admin/home');

        $customer = $this->home_customer_m->get($id);

        $this->template
        ->set('customer', $customer)
        ->build('admin/edit_customer');
    }

    // -----------------------------------------------------------------

    public function update_customer() {

        $this->form_validation->set_rules('link', 'Link', 'valid_url');

        if ($this->form_validation->run() === TRUE) {
            $post = (object) $this->input->post();

            $data = array(
                'link' => $post->link
                );

            $config['upload_path'] = './' . UPLOAD_PATH . '/home';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2050;
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            // imagen uno
            $img = $_FILES['image']['name'];

            if (!empty($img)) {
                if ($this->upload->do_upload('image')) {
                    $datos = array('upload_data' => $this->upload->data());
                    $path = UPLOAD_PATH . 'home/' . $datos['upload_data']['file_name'];
                    $img = array('image' => $path);
                    $data = array_merge($data, $img);
                    $obj = $this->db->where('id', $post->id)->get('home_customers')->row();
                    @unlink($obj->image);
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    return $this->index();
                }
            }

            if ($this->home_customer_m->update($post->id, $data)) {
                $this->session->set_flashdata('success', 'Los registros se actualizarón con éxito.');
                redirect('admin/home/');
            } else {
                $this->session->set_flashdata('success', 'Error al almacenar los registros');
                return $this->edit_customer();
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            return $this->edit_customer();
        }
    }

    // -----------------------------------------------------------------

    public function destroy_customer($id = null) {

        $id or redirect('admin/home/');

        $obj = $this->db->where('id', $id)->get('home_customers')->row();

        if ($this->home_customer_m->delete($id)) {
            @unlink($obj->image);
            $this->session->set_flashdata('success', 'El registro se elimino con éxito.');
        } else {
            $this->session->set_flashdata('error', 'No se logro eliminar el registro, inténtelo nuevamente');
        }
        redirect('admin/home/');
    }

	/*
     * Administración de slider principal
     */
	
	public function edit_slider($idItem = null)
    {
        $this->form_validation->set_rules('title', 'Título', 'required|max_length[180]|trim');
        $this->form_validation->set_rules('text', 'Texto', 'required|max_length[300]|trim');
        $this->form_validation->set_rules('link', 'Link', 'max_length[420]|valid_url');

		if($this->form_validation->run()!==TRUE)  // abrimos el formulario de edicion
		{
			if(validation_errors() == "")
			{
				$this->session->set_flashdata('error', validation_errors());
			}
			if(!empty($idItem))  // si se envia un dato por la URL se hace lo siguiente (Edita)
			{
				$idItem or redirect('admin/home/');
				
				$titulo = 'Editar slider';
                $slider = $this->home_slider_m->get($idItem);

                $this->template
                ->set('slider', $slider)
                ->set('titulo', $titulo)
                ->build('admin/edit_slider');
            }
            else 
            {
                $titulo = 'Crear slider';
                $this->template
                ->set('titulo', $titulo)
                ->build('admin/edit_slider');
            }
        }
		else // si el formulario ha sido enviado con éxito se procede
		{
			$action = $_POST['btnAction'];
			unset($_POST['btnAction']);
			if($idItem != null)  // si se envia un dato por la URL se hace lo siguiente (Edita)
			{
               $data = $_POST;

               $config['upload_path'] = './' . UPLOAD_PATH . '/home';
               $config['allowed_types'] = 'gif|jpg|png|jpeg';
               $config['max_size'] = 2050;
               $config['encrypt_name'] = true;

               $this->load->library('upload', $config);

	            // imagen uno
               $img = $_FILES['image']['name'];

               if (!empty($img)) {
                   if ($this->upload->do_upload('image')) {
                       $datos = array('upload_data' => $this->upload->data());
                       $path = UPLOAD_PATH . 'home/' . $datos['upload_data']['file_name'];
                       $img = array('image' => $path);
                       $data = array_merge($data, $img);
                       $obj = $this->db->where('id', $idItem)->get('home_slider')->row();
                       @unlink($obj->imagen);
                   }
                   else
                   {
                       $this->session->set_flashdata('error', $this->upload->display_errors());
                       header('Location: '.$_SERVER['REQUEST_URI']);
                   }
               }

               if ($this->home_slider_m->update($idItem, $data))
               {
                   $this->session->set_flashdata('success', 'Los registros se actualizarón con éxito.');
                   if($action == 'save')
                   {
                      header('Location: '.$_SERVER['REQUEST_URI']);
                  }
                  else
                  {
                      redirect('admin/home/');
                  }
              }
              else
              {
               $this->session->set_flashdata('error', 'Error al almacenar los registros');
               header('Location: '.$_SERVER['REQUEST_URI']);
           }
       }
       else
       {
           $data = $_POST;

           $config['upload_path'] = './' . UPLOAD_PATH . '/home';
           $config['allowed_types'] = 'gif|jpg|png|jpeg';
           $config['max_size'] = 2050;
           $config['encrypt_name'] = true;

           $this->load->library('upload', $config);

	            // imagen uno
           $img = $_FILES['image']['name'];

           if (!empty($img)) {
               if ($this->upload->do_upload('image')) {
                   $datos = array('upload_data' => $this->upload->data());
                   $path = UPLOAD_PATH . 'home/' . $datos['upload_data']['file_name'];
                   $img = array('image' => $path);
                   $data = array_merge($data, $img);
               }
               else
               {
                   $this->session->set_flashdata('error', $this->upload->display_errors());
                   header('Location: '.$_SERVER['REQUEST_URI']);
               }
           }

           if ($this->home_slider_m->insert($data))
           {
               $this->session->set_flashdata('success', 'Los registros se ingresaron con éxito.');
               redirect('admin/home/');
           }
           else
           {
               $this->session->set_flashdata('error', 'Error al almacenar los registros');
               header('Location: '.$_SERVER['REQUEST_URI']);
           }
       }
   }
}

public function destroy_slider($id = null) {

    $id or redirect('admin/home/');

    $obj = $this->db->where('id', $id)->get($this->db->dbprefix.'home_slider')->row();

    if ($this->home_slider_m->delete($id)) {
        @unlink($obj->image);
        $this->session->set_flashdata('success', 'El registro se elimino con éxito.');
    } else {
        $this->session->set_flashdata('error', 'No se logro eliminar el registro, inténtelo nuevamente');
    }
    redirect('admin/home/');
}




    /*
     * Edición destacados
     */

    public function edit_featured($id = null) {

        $id or redirect('admin/home');

        $featured = $this->home_featured_m->get($id);

        $this->template
        ->set('featured', $featured)
        ->build('admin/edit_featured');
    }

    public function update_featured($idItem = null)
    {
        $idItem OR  redirect('admin/home');

        $this->form_validation->set_rules('title', 'Título', 'max_length[180]|trim');
        $this->form_validation->set_rules('description', 'Descripción', 'max_length[300]|trim');
        $this->form_validation->set_rules('link', 'Link', 'max_length[420]|valid_url');

        if($this->form_validation->run() == TRUE)  // abrimos el formulario de edicion
        {
         $post = (object) $_POST;

         $data = array(
            'title' => $post->title,
            'description' => $post->description,
            'link' => $post->link
            );

         $config['upload_path'] = './' . UPLOAD_PATH . '/home';
         $config['allowed_types'] = 'gif|jpg|png|jpeg';
         $config['max_size'] = 2050;
         $config['encrypt_name'] = true;

         $this->load->library('upload', $config);

                // imagen uno
         $img = $_FILES['image']['name'];

         if (!empty($img)) {
             if ($this->upload->do_upload('image')) {
                 $datos = array('upload_data' => $this->upload->data());
                 $path = UPLOAD_PATH . 'home/' . $datos['upload_data']['file_name'];
                 $img = array('image' => $path);
                 $data = array_merge($data, $img);
                 $obj = $this->db->where('id', $idItem)->get('home_featured')->row();
                 @unlink($obj->image);
             }
             else
             {
                 $this->session->set_flashdata('error', $this->upload->display_errors());
             }
         }

         if ($this->home_featured_m->update($idItem, $data))
         {
             $this->session->set_flashdata('success', 'Los registros se actualizarón con éxito.');
         }
         else
         {
             $this->session->set_flashdata('error', 'Error al almacenar los registros');
         }

         redirect('admin/home/edit_featured/'.$idItem);

     }
 }

}