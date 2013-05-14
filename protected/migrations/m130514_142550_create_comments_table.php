<?php

class m130514_142550_create_comments_table extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_comment', array(
				'id' 			=> 'pk',
				'body'			=> 'text NOT NULL',
				'author'		=> 'VARCHAR(50) NOT NULL',
				'email'			=> 'VARCHAR(80) NOT NULL',
				'content_id'	=> 'int NOT NULL',
				'created_on' 	=> 'DATETIME NOT NULL',
				'updated_on' 	=> 'DATETIME NOT NULL',
		), 'ENGINE=InnoDB CHARSET=utf8');
	}

	public function safeDown()
	{
		$this->dropTable('tbl_comment');
	}
}