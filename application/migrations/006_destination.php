<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Destination extends CI_Migration {

        public function up() {
                if (!$this->db->table_exists('destination')) {
                $this->dbforge->add_field(array(
                        'id_destination' => array(
                                'type' => 'INT',
                                'constraint' => 110,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'code_destination' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'content' => array(
                                'type' => 'TEXT',
                        ),
                        'lang' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '50',
                        ),
                        'category' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                        ),
                        'slug' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '200',
                        ),
                        'status' => array(
                            'type' => 'TINYINT',
                            'default' => '1',
                        ),
                        'created_at  datetime default current_timestamp',
                ));
                $this->dbforge->add_key('id_destination', TRUE);
                $this->dbforge->create_table('destination');
            }
        }

        public function down()
        {
                $this->dbforge->drop_table('destination');
        }
}

?>