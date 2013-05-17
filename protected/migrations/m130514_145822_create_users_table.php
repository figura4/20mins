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
					  	'hashed_password' 	=> 'a7WNIGmgCQXkU',
					  	'salt' 				=> 'a7_)OWiw%n%sP,c`h1l(J6;PvO!{A>x$UY,%1t{6d!*5,ltt}b',
					  	'role' 				=> 'admin',
		));
	}

	public function safeDown()
	{
		$this->dropTable('{{user}}');
	}
}