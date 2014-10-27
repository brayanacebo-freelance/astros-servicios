<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Module_Sobre_Nosotros extends Module
{

    public $version = '1.0';

    public function info() {
        return array(
            'name' => array(
                'es' => 'Sobre Nosotros',
                'en' => 'Sobre Nosotros',
            ),
            'description' => array(
                'es' => 'Sobre Nosotros @Brayan Acebo',
                'en' => 'Sobre Nosotros @Brayan Acebo',
            ),
            'frontend' => true,
            'backend' => true,
            'menu' => 'content',
        );
    }

    public function install() {

        $this->dbforge->drop_table('sobre_nosotros');

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
            'title_one' => array(
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
            'text_two' => array(
                'type' => 'LONGTEXT',
                'null' => true
            ),
            'title_three' => array(
                'type' => 'VARCHAR',
                'constraint' => '455',
                'null' => true
            ),
            'text_three' => array(
                'type' => 'LONGTEXT',
                'null' => true
            )
        );

        $this->dbforge->add_field($field);
        $this->dbforge->add_key('id', true);

        if (!$this->dbforge->create_table('sobre_nosotros')) {
            return false;
        }

        $data = array(
            'image' => '',
            'title_one' => '',
            'text_one' => '',
            'title_two' => '',
            'text_two' => '',
            'title_three' => '',
            'text_three' => ''
        );

        $this->db->insert('sobre_nosotros', $data);

        $dir = $this->upload_path . 'sobre_nosotros';

        if (!is_dir($dir)) {
            @mkdir($dir, '0777');
            chmod($dir, '0777');
        }

        return true;
    }

    public function uninstall() {
        $this->dbforge->drop_table('sobre_nosotros');
        @rmdir($this->upload_path . 'sobre_nosotros');
        return true;
    }

    public function upgrade($old_version) {
        return true;
    }

    public function help() {
        return "Página de contenido";
    }

}
