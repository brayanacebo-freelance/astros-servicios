<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Module_Home extends Module {

    public $version = '1.0';

    public function info() {
        return array(
            'name' => array(
                'es' => 'Home',
                'en' => 'Home'
            ),
            'description' => array(
                'es' => 'Home Basico',
                'en' => 'Basic Home'
            ),
            'frontend' => true,
            'backend' => true,
            'menu' => 'content',
        );
    }

    public function install() 
    {
    	// creamos la base de datos del banner
        $this->dbforge->drop_table('home_slider');

        // creamos un array con los campos de la base de datos
        $banner = array(
            'id' => array(
                'type' => 'INT',
                'constraint' => '11',
                'auto_increment' => true
            ),
            'image' => array(
                'type' => 'VARCHAR',
                'constraint' => '455',
                'null' => true
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '455',
                'null' => true
            ),
            'text' => array(
                'type' => 'TEXT',
                'constraint' => '0',
                'null' => true
            ),
            'link' => array(
                'type' => 'VARCHAR',
                'constraint' => '455',
                'null' => true
            ),
        );

        // creamos la llave primaria
        $this->dbforge->add_field($banner);
        $this->dbforge->add_key('id', true);

        // creamos la carpeta en la ruta especificada
        $this->dbforge->create_table('home_slider') AND is_dir($this->upload_path . 'home_slider/') OR @mkdir($this->upload_path . 'home_slider/', 0777, TRUE);

       

        return true;
    }

    public function uninstall()
    {
		$this->dbforge->drop_table('home_slider');
		@rmdir($this->upload_path . 'home_slider');
        return true;
    }

    public function upgrade($old_version) {
        return true;
    }

    public function help() {
        return "Pagina inicial del sitio desarrollada a la medida.";
    }

}