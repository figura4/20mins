<?php

class m130514_140737_create_tags_table extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_tag', array(
				'id' 			=> 'pk',
				'name' 			=> 'VARCHAR(50) NOT NULL',
				'description'	=> 'text NOT NULL',
				'order' 		=> 'int not null default 1000',
				'created_on' 	=> 'DATETIME NOT NULL',
				'updated_on' 	=> 'DATETIME NOT NULL',
		), 'ENGINE=InnoDB CHARSET=utf8');
	}

	public function safeDown()
	{
		$this->dropTable('tbl_tag');
	}
}