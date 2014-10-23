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
            "product_model",
            "product_image_model"
            );
        $this->load->model($models);
    }

    // -----------------------------------------------------------------

    public function index() {

        // Paginación de Productos
        $pagination = create_pagination('admin/products/index', $this->db->count_all('products'), 10);

        // Se consultan los productos
        $products = $this->db
        ->order_by('id', 'DESC')
        ->limit($pagination['limit'], $pagination['offset'])
        ->get('products')
		->result();

        $this->template
        ->set('pagination', $pagination)
        ->set('products', $products)
        ->build('admin/index');
    }
	
	// destacados de los productos para el home
	public function outstanding_product($idItem = null)
	{
		$amount = $this->db->where('outstanding', 1)->get('products')->result();
		$amount = count($amount);
		$obj = $this->db->where('id', $idItem)->get('products')->row();
	    $data['outstanding'] = ($obj->outstanding == 1 ? 0 : 1);
		
		if($amount < 2 || $data['outstanding'] == 0)
		{
			if ($this->db->where('id', $idItem)->update('products', $data))
			{
                $this->session->set_flashdata('success', 'Proceso exitoso');
	        }
	        else
	        {
	            $this->session->set_flashdata('error', 'Ocurrio un error al cambiar el estado a destacado');
	        }
		}
		else {
			$this->session->set_flashdata('error', 'Ya llegaste al numero limite de destacados');
		}
		redirect('admin/products');
		
	}
	
    /*
     * Productos
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
        $this->form_validation->set_rules('video', 'Video', 'trim');

        // Se ejecuta la validación
        if ($this->form_validation->run() === TRUE) {
            $post = (object) $this->input->post();

            // Array que se insertara en la base de datos
            $data = array(
                'name' => $post->name,
                'slug' => slug($post->name),
                'description' => $post->description,
                'introduction' => $post->introduction,
                'video' => $post->video,
                'created_at' => date('Y-m-d H:i:s')
                );

            // Se carga la imagen
            $config['upload_path'] = './' . UPLOAD_PATH . '/products';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2050;
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            // imagen uno
            $img = $_FILES['image']['name'];

            if (!empty($img)) {
                if ($this->upload->do_upload('image')) {
                    $datos = array('upload_data' => $this->upload->data());
                    $path = UPLOAD_PATH . 'products/' . $datos['upload_data']['file_name'];
                    $img = array('image' => $path);
                    $data = array_merge($data, $img);
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admin/products/');
                }
            }

            // Se inserta en la base de datos
            if ($this->db->insert('products', $data)) 
            {
                $this->session->set_flashdata('success', 'Los registros se ingresaron con éxito.');
                redirect('admin/products');
            } else {
                $this->session->set_flashdata('error', 'Error al almacenar los registros');
                redirect('admin/products/create');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/products/create');
        }
    }

    // -----------------------------------------------------------------

    public function destroy($id = null) {
        $id or redirect('admin/products');
        $obj = $this->db->where('id', $id)->get($this->db->dbprefix.'products')->row();
		if ($this->db->where('id', $id)->delete('products'))
		{
            @unlink($obj->image); // Eliminamos archivo existente
            $this->session->set_flashdata('success', 'El registro se elimino con éxito.');
        } else {
            $this->session->set_flashdata('error', 'No se logro eliminar el registro, inténtelo nuevamente');
        }
        redirect('admin/products');
    }

    // --------------------------------------------------------------------------------------

    public function edit($id = null) {
        $id or redirect('admin/products');
		$product = $this->db->where('id', $id)->get('products')->row();

        $this->template
        ->set('product', $product)
        ->build('admin/edit');
    }

    // -----------------------------------------------------------------

    public function update() {

        // Validaciones del Formulario
        $this->form_validation->set_rules('name', 'Nombre', 'required|trim');
        $this->form_validation->set_rules('description', 'Descripción', 'required|trim');
        $this->form_validation->set_rules('introduction', 'Introducción', 'required|trim');
        $this->form_validation->set_rules('video', 'Video', 'trim');

        // Se ejecuta la validación
        if ($this->form_validation->run() === TRUE) {
            $post = (object) $this->input->post();

            // Array que se insertara en la base de datos
            $data = array(
                'name' => $post->name,
                'slug' => slug($post->name),
                'description' => $post->description,
                'introduction' => $post->introduction,
                'video' => $post->video,
            );

            // Se carga la imagen
            $config['upload_path'] = './' . UPLOAD_PATH . '/products';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2050;
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            // imagen uno
            $img = $_FILES['image']['name'];

            if (!empty($img)) {
                if ($this->upload->do_upload('image')) {
                    $datos = array('upload_data' => $this->upload->data());
                    $path = UPLOAD_PATH . 'products/' . $datos['upload_data']['file_name'];
                    $img = array('image' => $path);
                    $data = array_merge($data, $img);
                    $obj = $this->db->where('id', $post->id)->get('products')->row();
                    @unlink($obj->image);
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admin/products/');
                }
            }

            // Se inserta en la base de datos
            if ($this->db->where('id', $post->id)->update('products', $data))
            {
                $this->session->set_flashdata('success', 'Los registros se ingresaron con éxito.');
                redirect('admin/products');
            } else {
                $this->session->set_flashdata('error', 'Error al almacenar los registros');
                redirect('admin/products/create');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/products/create');
        }
    }

    /*
     * Administración de imagenes
     */

    public function images($id = null) {
        $id or redirect('admin/products');
        // Se consultan las imagenes del product
		$images = $this->db->where('product_id', $id)->get('product_images')->result();
		$product = $this->db->where('id', $id)->get('products')->row();

        $this->template
        ->set('product', $product)
        ->set('images', $images)
        ->build('admin/images');
    }

    // ----------------------------------------------------------------------------------

    public function create_image($id = null) {
        $id or redirect('admin/products');
		$product = $this->db->where('id', $id)->get('products')->row();
		
        $this->template
        ->set('product', $product)
        ->build('admin/create_image');
    }
	
	public function create_video($id = null) {
        $id or redirect('admin/products');
        $product = $this->db->where('id', $id)->get('products')->row();
		
        $this->template
        ->set('product', $product)
        ->build('admin/create_video');
    }
	
    // -----------------------------------------------------------------

    public function store_image()
    {
    	// Se carga la imagen
        $config['upload_path'] = './' . UPLOAD_PATH . '/products';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2050;
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        $id = $this->input->post('id');
		
		if(isset($_POST['video']))
		{
			$post = (object) $this->input->post();
			$image = array(
                'video' => $post->video,
                'product_id' => $id,
                );
		}
		else
		{
			    // imagen uno
	        $img = $_FILES['image']['name'];
	        $image = array();
	        
	
	        if (!empty($img)) {
	            if ($this->upload->do_upload('image')) {
	                $datos = array('upload_data' => $this->upload->data());
	                $path = UPLOAD_PATH . 'products/' . $datos['upload_data']['file_name'];
	                $image = array(
	                    'product_id' => $id,
	                    'path' => $path
	                    );
	            } else {
	                $this->session->set_flashdata('error', $this->upload->display_errors());
	                redirect('admin/products/images/'.$id);
	            }
	        }
		}
		
            // Se inserta en la base de datos
        if ($this->db->insert('product_images', $image)) {
            $this->session->set_flashdata('success', 'Los registros se ingresaron con éxito.');
            redirect('admin/products/images/'.$id);
        } else {
            $this->session->set_flashdata('error', 'Error al almacenar los registros');
            redirect('admin/products/create_image/'.$id);
        }
    }

    // -----------------------------------------------------------------

    public function destroy_image($id = null,$product_id = null) {
        $id or redirect('admin/products');
        $product_id or redirect('admin/products');
		$obj = $this->db->where('id', $id)->get('product_images')->row();
		if ($this->db->where('id', $id)->delete('product_images'))
        {
            @unlink($obj->path); // Eliminamos archivo existente
            $this->session->set_flashdata('success', 'El registro se elimino con éxito.');
        } else {
            $this->session->set_flashdata('error', 'No se logro eliminar el registro, inténtelo nuevamente');
        }
        redirect('admin/products/images/'.$product_id);
    }

}