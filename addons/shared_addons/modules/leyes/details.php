<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Module_Leyes extends Module {

    public $version = '1.0';
    public $tableImage = 'leyes_image';
    public $tableLeyes = 'leyes';

    public function info() {
        return array(
            'name' => array(
                'en' => 'Leyes y Normatividad',
                'es' => 'Leyes y Normatividad'
            ),
            'description' => array(
                'en' => 'Leyes y Normatividad @Brayan Acebo 2014',
                'es' => 'Leyes y Normatividad @Brayan Acebo 2014',
            ),
            'frontend' => TRUE,
            'backend' => TRUE,
            'menu' => 'content'
        );
    }

    public function install() {

        /* Creación del directorio para carga de imagenes */
        @mkdir($this->upload_path . $this->tableImage, 0777, TRUE);

        // Creando tabla de imagen
        $this->dbforge->drop_table($this->tableImage);

        $field = array(
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
            'updated_at' => array(
                'type' => 'TIMESTAMP',
                'constraint' => '',
                'null' => false
            )
        );

        $this->dbforge->add_field($field);
        $this->dbforge->add_key('id', true);

        if (!$this->dbforge->create_table($this->tableImage)) {
            return false;
        }

        //-------------------------------------------------

        // Creando tabla para leyes
        $this->dbforge->drop_table($this->tableLeyes);

        $field = array(
            'id' => array(
                'type' => 'INT',
                'constraint' => '11',
                'auto_increment' => true
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '455',
                'null' => true
            ),
            'description' => array(
                'type' => 'TEXT',
                'null' => true
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'constraint' => '',
                'null' => false
            ),
            'updated_at' => array(
                'type' => 'TIMESTAMP',
                'constraint' => '',
                'null' => false
            )
        );

        $this->dbforge->add_field($field);
        $this->dbforge->add_key('id', true);

        if (!$this->dbforge->create_table($this->tableLeyes)) {
            return false;
        }

        // Final
        return true;
    }

    public function uninstall() {
        $this->dbforge->drop_table($this->tableLeyes);
        $this->dbforge->drop_table($this->tableImage);
        return true;
    }

    public function upgrade($old_version) {
        return true;
    }

    public function help() {
        return "Modulo de leyes y normatividad";
    }

}
/* Fin del archivo details.php */