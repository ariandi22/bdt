<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Products_Category extends CI_Migration {

        public function up() {
                if (!$this->db->table_exists('products_category')) {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 110,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'category_products' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 110,
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('products_category');
            }
        }

        public function down()
        {
                $this->dbforge->drop_table('products_category');
        }
}

?>