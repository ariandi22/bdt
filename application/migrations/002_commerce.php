<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Commerce extends CI_Migration {

        public function up() {
                if (!$this->db->table_exists('products')) {
                $this->dbforge->add_field(array(
                        'id_product' => array(
                                'type' => 'INT',
                                'constraint' => 110,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'code_product' => array(
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
                        'quantity' => array(
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
                $this->dbforge->add_key('id_product', TRUE);
                $this->dbforge->create_table('products');
            }
        }

        public function down()
        {
                $this->dbforge->drop_table('products');
        }
}