<?php

class m130514_145822_create_users_table extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_user', array(
				'id' 				=> 'pk',
				'hashed_password'	=> 'VARCHAR(200) NOT NULL',
				'salt'				=> 'VARCHAR(200) NOT NULL',
				'email'				=> 'VARCHAR(200) NOT NULL',
				'homepage'			=> 'VARCHAR(200) NOT NULL',
				'avatar'			=> 'VARCHAR(100) NOT NULL',
				'role'				=> 'VARCHAR(100) NOT NULL',
				'created_on' 		=> 'DATETIME NOT NULL',
				'updated_on' 		=> 'DATETIME NOT NULL',
		), 'ENGINE=InnoDB CHARSET=utf8');
	}

	public function safeDown()
	{
		$this->dropTable('tbl_user');
	}
}