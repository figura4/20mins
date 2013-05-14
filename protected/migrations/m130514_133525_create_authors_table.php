<?php

class m130514_133525_create_authors_table extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_author', array(
				'id' 			=> 'pk',
				'first_name' 	=> 'VARCHAR(50) NOT NULL',
				'last_name'		=> 'VARCHAR(50) NOT NULL',
				'bio' 			=> 'text',
				'bio_url' 		=> 'VARCHAR(200) NOT NULL',
				'picture' 		=> 'VARCHAR(100) NOT NULL',
				'created_on' 	=> 'DATETIME NOT NULL',
				'updated_on' 	=> 'DATETIME NOT NULL',
			), 'ENGINE=InnoDB CHARSET=utf8');
	}

	public function safeDown()
	{
		$this->dropTable('tbl_author');
	}
}