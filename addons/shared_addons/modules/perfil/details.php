<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Module_Perfil extends Module {

    public $version = '1.0';
    public $tableMain = 'perfil';
    public $tableChapters = 'perfil_chapters';
    public $tableImages = 'perfil_chapters_images';

    public function info() {
        return array(
            'name' => array(
                'en' => 'Perfil',
                'es' => 'Perfil'
            ),
            'description' => array(
                'en' => 'Perfil @Brayan Acebo 2014',
                'es' => 'Perfil @Brayan Acebo 2014',
            ),
            'frontend' => TRUE,
            'backend' => TRUE,
            'menu' => 'content'
        );
    }

    public function install() {

        /* Creación del directorio para carga de imagenes */
        @mkdir($this->upload_path . $this->tableMain, 0777, TRUE);

        // Creando tabla de perfil
        $this->dbforge->drop_table($this->tableMain);

        $field = array(
            'id' => array(
                'type' => 'INT',
                'constraint' => '11',
                'auto_increment' => true
            ),
            'video' => array(
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

        if (!$this->dbforge->create_table($this->tableMain)) {
            return false;
        }

        //-------------------------------------------------

        // Creando tabla para novelas
        $this->dbforge->drop_table($this->tableChapters);

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
            'slug' => array(
                'type' => 'VARCHAR',
                'constraint' => '455',
                'null' => true
            ),
            'date' => array(
                'type' => 'DATETIME',
                'constraint' => '',
                'null' => true
            ),
            'country' => array(
                'type' => 'VARCHAR',
                'constraint' => '455',
                'null' => true
            ),
            'video' => array(
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

        if (!$this->dbforge->create_table($this->tableChapters)) {
            return false;
        }

        //-------------------------------------------------

        $this->dbforge->drop_table($this->tableImages);

        $field = array(
            'id' => array(
                'type' => 'INT',
                'constraint' => '11',
                'auto_increment' => true
            ),
            'chapters_id' => array(
                'type' => 'INT',
                'constraint' => '11',
                'null' => false
            ),
            'image' => array(
                'type' => 'VARCHAR',
                'constraint' => '455',
                'null' => true
            )
        );

        $this->dbforge->add_field($field);
        $this->dbforge->add_key('id', true);

        if (!$this->dbforge->create_table($this->tableImages)) {
            return false;
        }

        // Final
        return true;
    }

    public function uninstall() {
        $this->dbforge->drop_table($this->tableMain);
        $this->dbforge->drop_table($this->tableChapters);
        $this->dbforge->drop_table($this->tableImages);
        @rmdir($this->upload_path.$this->tableMain);
        return true;
    }

    public function upgrade($old_version) {
        return true;
    }

    public function help() {
        return "Modulo de perfil";
    }

}
/* Fin del archivo details.php */