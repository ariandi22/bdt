<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Pages extends CI_Migration {

        public function up() {
                if (!$this->db->table_exists('pages')) {
                $this->dbforge->add_field(array(
                        'id_pages' => array(
                                'type' => 'INT',
                                'constraint' => 110,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'title' => array(
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
                        'meta_desc' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '160',
                        ),
                        'category' => array(
                            'type' => 'INT',
                            'constraint' => 110,
                        ),
                        'slug' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '200',
                        ),
                        'status' => array(
                            'type' => 'TINYINT',
                            'default' => '1',
                        ),
                        'created_by' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                        ),
                        'created_at  datetime default current_timestamp',
                        'img' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                        ),
                        'CONSTRAINT FOREIGN KEY (category) REFERENCES category(id_category)',
                ));
                $this->dbforge->add_key('id_pages', TRUE);
                $this->dbforge->create_table('pages');
            }
        }

        public function down()
        {
                $this->dbforge->drop_table('pages');
        }
}