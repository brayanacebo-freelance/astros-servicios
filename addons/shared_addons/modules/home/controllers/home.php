<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Brayan Acebo
 */
class Home extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $models = array(
            'home_customer_m',
            'home_slider_m',
            'home_featured_m'
            );
        $this->load->model($models);
    }

    // -----------------------------------------------------------------

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
        ->build('index');
    }

    // -----------------------------------------------------------------

    public function contactenos($msj = null)
    {  
        $this->template
             ->set('msj', $msj)
             ->build('contactenos');
    }

    // -----------------------------------------------------------------

    function send()
    {
        $this->form_validation->set_rules('name', 'Nombre', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('company', 'Empresa', 'trim|max_length[100]');
        $this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email|max_length[100]');
        $this->form_validation->set_rules('phone', 'Teléfono', 'trim|max_length[30]');
        $this->form_validation->set_rules('message', 'Mensaje', 'required|trim|max_length[440]');
        
        if ($this->form_validation->run() === TRUE)
        {
            $post = (object) $this->input->post(null);
            $data['post'] = array(
                'name' => $post->name,
                'email' => $post->email,
                'phone' => $post->phone,
                'company' => $post->company,
                'message' => $post->message
                );
            $this->send_email_to_user($data['post'], 'brayanacebo@gmail.com');
            redirect(site_url('contactenos/ok'));
        } else {
            $this->session->set_flashdata('error', validation_errors());
        }
        redirect(site_url('contactenos'));
        
    }


    /**
     * Send an email
     *
     * @param array $comment The comment data.
     * @param array $entry The entry data.
     * @return boolean 
     */
    private function send_email_to_user($data, $admin_email)
    {

        $this->load->library('email');      
        $this->load->library('user_agent');
        
        Events::trigger('email', array(
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'company' => $data['company'],
            'message' => $data['message'],
            'slug' => 'contact',
            /*'email' => Settings::get('contact_email'), // se manda el correo a al de la configuración del pyro*/
            'to' => $admin_email,
            ), 'array');
    }

}