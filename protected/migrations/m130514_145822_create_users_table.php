<?php

class m130514_145822_create_users_table extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('{{user}}', array(
				'id' 				=> 'pk',
				'username'		    => 'VARCHAR(20) NOT NULL',
				'hashed_password'	=> 'VARCHAR(200) NOT NULL',
				'salt'				=> 'VARCHAR(200) NOT NULL',
				'email'				=> 'VARCHAR(200) NOT NULL',
				'homepage'			=> 'VARCHAR(200)',
				'avatar'			=> 'VARCHAR(100)',
				'role'				=> 'VARCHAR(100) NOT NULL',
				'created_on' 		=> 'DATETIME NOT NULL',
				'updated_on' 		=> 'DATETIME NOT NULL',
		), 'ENGINE=InnoDB CHARSET=utf8');
		
		$this->insert('{{user}}', 
					  array(
					  	'id' 				=> 1,
					  	'username' 			=> 'figura4',
					  	'hashed_password' 	=> 'da93b36067b42a697a8183adcccc593af980498d',
					  	'salt' 				=> '950cc1a15e8bb6fcfad3914bf0122e19',
					  	'role' 				=> 'admin',
		));
	}

	public function safeDown()
	{
		$this->dropTable('{{user}}');
	}
}