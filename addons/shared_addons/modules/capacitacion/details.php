<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Module_Capacitacion extends Module
{

    public $version = '1.0';

    public function info() {
        return array(
            'name' => array(
                'es' => 'Capacitación',
                'en' => 'Capacitación',
            ),
            'description' => array(
                'es' => 'Capacitación @Brayan Acebo',
                'en' => 'Capacitación @Brayan Acebo',
            ),
            'frontend' => true,
            'backend' => true,
            'menu' => 'content',
        );
    }

    public function install() {

        $this->dbforge->drop_table('capacitacion');

        $field = array(
            'id' => array(
                'type' => 'INT',
                'constraint' => '11',
                'auto_increment' => true
            ),
            'title_one' => array(
                'type' => 'VARCHAR',
                'constraint' => '455',
                'null' => true
            ),
            'image_one' => array(
                'type' => 'VARCHAR',
                'constraint' => '455',
                'null' => true
            ),
            'text_one' => array(
                'type' => 'LONGTEXT',
                'null' => true
            ),
            'title_two' => array(
                'type' => 'VARCHAR',
                'constraint' => '455',
                'null' => true
            ),
            'image_two' => array(
                'type' => 'VARCHAR',
                'constraint' => '455',
                'null' => true
            ),
            'text_two' => array(
                'type' => 'LONGTEXT',
                'null' => true
            ),
        );

        $this->dbforge->add_field($field);
        $this->dbforge->add_key('id', true);

        if (!$this->dbforge->create_table('capacitacion')) {
            return false;
        }

        $data = array(
            'title_one' => '',
            'image_one' => '',
            'text_one' => '',
            'title_two' => '',
            'image_two' => '',
            'text_two' => ''
        );

        $this->db->insert('capacitacion', $data);

        $dir = $this->upload_path . 'capacitacion';

        if (!is_dir($dir)) {
            @mkdir($dir, '0777');
            chmod($dir, '0777');
        }

        return true;
    }

    public function uninstall() {
        $this->dbforge->drop_table('capacitacion');
        @rmdir($this->upload_path . 'capacitacion');
        return true;
    }

    public function upgrade($old_version) {
        return true;
    }

    public function help() {
        return "Página de contenido, (texto e imagen) con párrafo introductorio.";
    }

}
