<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Package extends CI_Migration {

        public function up() {
                if (!$this->db->table_exists('package')) {
                $this->dbforge->add_field(array(
                        'id_package' => array(
                                'type' => 'INT',
                                'constraint' => 110,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'code_package' => array(
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
                        'price' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                        ),
                        'tour_days' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '110',
                        ),
                        'airplane' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '110',
                        ),
                        'hotel' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '110',
                        ),
                        'slug' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '200',
                        ),
                        'read_status' => array(
                            'type' => 'TINYINT',
                            'default' => '1',
                        ),
                        'status' => array(
                            'type' => 'TINYINT',
                            'default' => '1',
                        ),
                        'progress' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                        ),
                        'created_at  datetime default current_timestamp',
                ));
                $this->dbforge->add_key('id_package', TRUE);
                $this->dbforge->create_table('package');
            }
        }

        public function down()
        {
                $this->dbforge->drop_table('package');
        }
}