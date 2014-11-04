<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
*
* @author 	    Brayan Acebo
* @package 		PyroCMS
* @subpackage 	albums
* @category 	Modulos
*/

class Leyes extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $models = array(
            "leyes_model",
            "leyes_image_model",
            );
        $this->load->model($models);
    }

// -----------------------------------------------------------------

    public function index($selCategory = null)
    {
         // Paginación de leyes
        $pagination = create_pagination('leyes/index', $this->leyes_model->count_all(), 10);

        // Se consultan las leyes
        $leyes = $this->leyes_model
        ->order_by('id', 'DESC')
        ->get_all();

        $image = $this->leyes_image_model->get(1);

        $this->template
        ->set('pagination', $pagination)
        ->set('leyes', $leyes)
        ->set('image', $image)
        ->build('index');
    }

}