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
            'home_image_m',
            'home_slider_m',
            'home_featured_m'
        );
        $this->load->library('files/files');
        $this->load->model($models);
    }

    // -----------------------------------------------------------------

    public function index()
    {	
		// slider
        $slider = $this->home_slider_m->get_all();
        // Customers
        $customers = $this->home_customer_m ->get_all();
        // Imagen
        $image = $this->home_image_m ->get(1);
        // Featured
        $featured = $this->home_featured_m ->get_all();
		
        $this->template
                ->set('slider', $slider)
                ->set('customers', $customers)
				->set('image', $image)
                ->set('featured', $featured)
                ->build('index');
    }

}