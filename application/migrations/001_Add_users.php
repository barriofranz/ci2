<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_users extends CI_Migration {
		
        public function up()
        {
			$this->dbforge->add_field(array(
					'id_user' => array(
							'type' => 'INT',
							'constraint' => '11',
							'unsigned' => TRUE,
							'auto_increment' => TRUE,
					),
					'username' => array(
							'type' => 'VARCHAR',
							'constraint' => '255',
					),
					'email' => array(
							'type' => 'VARCHAR',
							'constraint' => '255',
					),
					'password' => array(
							'type' => 'VARCHAR',
							'constraint' => '255',
					),
					'created_at' => array(
							'type' => 'DATETIME',
					),
					'updated_at' => array(
							'type' => 'DATETIME',
					),
					'is_admin' => array(
							'type' => 'TINYINT',
							'constraint' => 1,
					),
					'is_confirmed' => array(
							'type' => 'TINYINT',
							'constraint' => 1,
					),
					'is_deleted' => array(
							'type' => 'TINYINT',
							'constraint' => 1,
					),
			));
				
			$this->dbforge->add_key('id_user', TRUE);
			$this->dbforge->create_table('users');
			
			
			$this->dbforge->add_field(array(
					'id_sessions' => array(
							'type' => 'INT',
							'constraint' => '11',
							'unsigned' => TRUE,
							'auto_increment' => TRUE,
					),
					'ip_address' => array(
							'type' => 'VARCHAR',
							'constraint' => '255',
					),
					'timestamp' => array(
							'type' => 'VARCHAR',
							'constraint' => '255',
					),
			));
				
			$this->dbforge->add_key('id_sessions', TRUE);
			$this->dbforge->create_table('sessions');
			
        }

        public function down()
        {
                $this->dbforge->drop_table('users');
        }
}