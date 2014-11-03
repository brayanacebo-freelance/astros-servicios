<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
*
* @author 	    Brayan Acebo
* @package 	PyroCMS
* @subpackage 	Products
* @category 	Modulos
*/

class Servicios extends Public_Controller {

    public function __construct() {
        parent::__construct();
       $models = array(
            "servicios_model",
            "servicios_image_model"
            );
        $this->load->model($models);
    }

// -----------------------------------------------------------------

    public function index() {

        // Paginación de servicios
        $pagination = create_pagination('servicios/index', $this->db->count_all('servicios'), 10);

        // Se consultan los servicios
        $servicios = $this->db
        ->order_by('id', 'DESC')
        ->limit($pagination['limit'], $pagination['offset'])
        ->get('servicios')
        ->result();

        $this->template
        ->set('pagination', $pagination)
        ->set('servicios', $servicios)
        ->build('index');
    }
}