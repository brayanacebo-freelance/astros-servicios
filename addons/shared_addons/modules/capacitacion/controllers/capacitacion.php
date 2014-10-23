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
        $data = $this->capacitacion_model->get_all();

        $post = array();

        if (count($data) > 0) {
            $post = $data[0];
        }

        // Se convierten algunas variables necesarias para usar como slugs
        $setter = array(
            'image_one' => site_url($post->image_one),
            'image_two' => site_url($post->image_two)
            );

        $data_end = array_merge((array)$post,$setter);

        $this->template
        ->title($this->module_details['name'])
        ->set_breadcrumb('Sobre Nosotros')
        ->set('data', (object) $data_end)
        ->build('index');
    }

}

?>
