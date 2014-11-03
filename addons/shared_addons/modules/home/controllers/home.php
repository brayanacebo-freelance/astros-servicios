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

}