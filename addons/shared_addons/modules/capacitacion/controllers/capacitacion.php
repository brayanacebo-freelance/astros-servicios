<?php
/**
 *
 * @author 	    Brayan Acebo
 * @subpackage 	Sobre Nosotros
 * @category 	Modulos
 * @license 	Apache License v2.0
 */
class Capacitacion extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $models = array(
            'capacitacion_model'
            );
        $this->load->model($models);
    }

    // ------------------------------------------------------------------------

    function index()
    {
        $data = $this->capacitacion_model->limit(1)->get_all();

        $this->template->set('data', $data[0])
        ->build('index');
    }

}

?>
