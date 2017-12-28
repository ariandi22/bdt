<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Images extends CI_Migration {

        public function up() {
                if (!$this->db->table_exists('images')) {
                $this->dbforge->add_field(array(
                        'id_img' => array(
                                'type' => 'INT',
                                'constraint' => 110,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'relation' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 110,
                        ),
                        'path' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                ));
                $this->dbforge->add_key('id_img', TRUE);
                $this->dbforge->create_table('images');
            }
        }

        public function down()
        {
                $this->dbforge->drop_table('images');
        }
}

?>