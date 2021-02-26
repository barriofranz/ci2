<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_datas extends CI_Migration {

        public function up()
        {
				// $this->dbforge->drop_table('order_detail');
                // $this->dbforge->drop_table('orders');
                // $this->dbforge->drop_table('currency');
                // $this->dbforge->drop_table('customers');
                // $this->dbforge->drop_table('products');

			$this->dbforge->add_field(array(
					'id_product' => array(
							'type' => 'INT',
							'constraint' => '11',
							'unsigned' => TRUE,
							'auto_increment' => TRUE,
					),
					'name' => array(
							'type' => 'VARCHAR',
							'constraint' => '255',
					),
					'desc' => array(
							'type' => 'VARCHAR',
							'constraint' => '255',
					),
					'price' => array(
							'type' => 'FLOAT',
							'constraint' => '10',
					),

			));

			$this->dbforge->add_key('id_product', TRUE);
			$this->dbforge->create_table('products');

			$data = array(

					array(
						'name' => 'laptop',
						'desc' => 'a laptop',
						'price' => '10000'
					),
					array(
						'name' => 'mouse',
						'desc' => 'literally a living mouse',
						'price' => '1000',
					),
					array(
						'name' => 'cellphone',
						'desc' => 'celphone',
						'price' => '5000',
					),
			);

			$this->db->insert_batch('products', $data);



			$this->dbforge->add_field(array(
					'id_customer' => array(
							'type' => 'INT',
							'constraint' => '11',
							'unsigned' => TRUE,
							'auto_increment' => TRUE,
					),
					'firstname' => array(
							'type' => 'VARCHAR',
							'constraint' => '255',
					),
					'lastname' => array(
							'type' => 'VARCHAR',
							'constraint' => '255',
					),
					'address' => array(
							'type' => 'VARCHAR',
							'constraint' => '255',
					),

			));

			$this->dbforge->add_key('id_customer', TRUE);
			$this->dbforge->create_table('customers');

			$data = array(
					array(
						'firstname' => 'franz',
						'lastname' => 'barr',
						'address' => 'pasay'
					),
					array(
						'firstname' => 'mi',
						'lastname' => 'ming',
						'address' => 'taguig'
					),
			);

			$this->db->insert_batch('customers', $data);




			$this->dbforge->add_field(array(
					'id_currency' => array(
							'type' => 'INT',
							'constraint' => '11',
							'unsigned' => TRUE,
							'auto_increment' => TRUE,
					),
					'name' => array(
							'type' => 'VARCHAR',
							'constraint' => '255',
					),
					'iso_code' => array(
							'type' => 'VARCHAR',
							'constraint' => '255',
					),
					'conversion_rate' => array(
							'type' => 'DECIMAL',
							'constraint' => '10,6',
					),

			));

			$this->dbforge->add_key('id_currency', TRUE);
			$this->dbforge->create_table('currency');

			$data = array(
					array(
						'name' => 'Philippines',
						'iso_code' => 'PHP',
						'conversion_rate' => '1'
					),
					array(
						'name' => 'United States',
						'iso_code' => 'USD',
						'conversion_rate' => '50'
					),
			);

			$this->db->insert_batch('currency', $data);









			$this->dbforge->add_field(array(
					'id_order' => array(
							'type' => 'INT',
							'constraint' => '11',
							'unsigned' => TRUE,
							'auto_increment' => TRUE,
					),
					'id_customer' => array(
							'type' => 'INT',
							'constraint' => '11',
							'unsigned' => TRUE,
					),
					'id_currency' => array(
							'type' => 'INT',
							'constraint' => '11',
					),
					'current_state' => array(
							'type' => 'INT',
							'constraint' => '11',
					),
					'total_products' => array(
							'type' => 'FLOAT',
							'constraint' => '10',
					),
					'total_shipping' => array(
							'type' => 'FLOAT',
							'constraint' => '10',
					),
					'total_paid' => array(
							'type' => 'FLOAT',
							'constraint' => '10',
					),
					'created_at' => array(
							'type' => 'DATETIME',
					),
					'updated_at' => array(
							'type' => 'DATETIME',
					),
			));

			$this->dbforge->add_key('id_order', TRUE);
			$this->dbforge->create_table('orders');

			$data = array(

					array(
						'id_order' => '1',
						'id_customer' => '1',
						'id_currency' => '1',
						'current_state' => '2',
						'total_products' => '2000',
						'total_shipping' => '100',
						'total_paid' => '2100',
						'created_at' => '2021-01-07',
						'updated_at' => '2021-01-07',
					),

					array(
						'id_order' => '2',
						'id_customer' => '1',
						'id_currency' => '1',
						'current_state' => '2',
						'total_products' => '6000',
						'total_shipping' => '100',
						'total_paid' => '6100',
						'created_at' => '2021-01-08',
						'updated_at' => '2021-01-08',
					),
			);

			$this->db->insert_batch('orders', $data);












			$this->dbforge->add_field(array(
					'id_order_detail' => array(
							'type' => 'INT',
							'constraint' => '11',
							'unsigned' => TRUE,
							'auto_increment' => TRUE,
					),
					'id_order' => array(
							'type' => 'INT',
							'constraint' => '11',
							'unsigned' => TRUE,
					),
					'id_product' => array(
							'type' => 'INT',
							'constraint' => '11',
							'unsigned' => TRUE,
					),
					'quantity' => array(
							'type' => 'INT',
							'constraint' => '11',
					),
					'product_name' => array(
							'type' => 'VARCHAR',
							'constraint' => '255',
					),
					'unit_price' => array(
							'type' => 'FLOAT',
							'constraint' => '10',
					),
					'total_price' => array(
							'type' => 'FLOAT',
							'constraint' => '10',
					),
			));

			$this->dbforge->add_key('id_order_detail', TRUE);
			$this->dbforge->create_table('order_detail');

			$data = array(

					array(
						'id_order' => '1',
						'id_product' => '2',
						'quantity' => '2',
						'product_name' => 'mouse',
						'unit_price' => '1000',
						'total_price' => '2000',
					),

					array(
						'id_order' => '2',
						'id_product' => '2',
						'quantity' => '1',
						'product_name' => 'mouse',
						'unit_price' => '1000',
						'total_price' => '1000',
					),

					array(
						'id_order' => '2',
						'id_product' => '3',
						'quantity' => '1',
						'product_name' => 'cellphone',
						'unit_price' => '5000',
						'total_price' => '5000',
					),
			);

			$this->db->insert_batch('order_detail', $data);


        }

        public function down()
        {
			$this->dbforge->drop_table('order_detail');
			$this->dbforge->drop_table('orders');
			$this->dbforge->drop_table('currency');
			$this->dbforge->drop_table('customers');
			$this->dbforge->drop_table('products');
        }
}
