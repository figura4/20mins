<?php

class m130514_144848_create_quotes_table extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('{{quote}}', array(
				'id' 				=> 'pk',
				'body'				=> 'text NOT NULL',
				'source'			=> 'VARCHAR(200)',
				'content_id'		=> 'int',
				'random'			=> 'bool NOT NULL',
				'created_on' 		=> 'DATETIME NOT NULL',
				'updated_on' 		=> 'DATETIME NOT NULL',
		), 'ENGINE=InnoDB CHARSET=utf8');
	}

	public function safeDown()
	{
		$this->dropTable('{{quote}}');
	}
}