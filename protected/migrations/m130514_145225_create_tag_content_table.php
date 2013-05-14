<?php

class m130514_145225_create_tag_content_table extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_tag_content', array(
				'tag_id'			=> 'int NOT NULL',
				'content_id'		=> 'int NOT NULL',
				'created_on' 		=> 'DATETIME NOT NULL',
				'updated_on' 		=> 'DATETIME NOT NULL',
		), 'ENGINE=InnoDB CHARSET=utf8');
	}

	public function safeDown()
	{
		$this->dropTable('tbl_tag_content');
	}
}