<?php
/**
 *
 * @author 	    Brayan Acebo
 * @subpackage 	Sobre Nosotros
 * @category 	Modulos
 * @license 	Apache License v2.0
 */
class Sobre_Nosotros extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $models = array(
            'sobre_nosotros_m'
            );
        $this->load->model($models);
    }

    // ------------------------------------------------------------------------

    function index()
    {

        $data = $this->sobre_nosotros_m->limit(1)->get_all();

        $this->template
        ->title($this->module_details['name'])
        ->set_breadcrumb('Sobre Nosotros')
        ->set('data', $data[0])
        ->build('index');
    }

}

?>
