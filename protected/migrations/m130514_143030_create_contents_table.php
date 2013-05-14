<?php

class m130514_143030_create_contents_table extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_content', array(
				'id' 				=> 'pk',
				'page_title'		=> 'VARCHAR(200) NOT NULL',
				'user_id'			=> 'int NOT NULL',
				'published'			=> 'bool NOT NULL',
				'type'				=> 'VARCHAR(50) NOT NULL',
				'body'				=> 'text NOT NULL',
				'cover'				=> 'VARCHAR(100)',
				'picture1'			=> 'VARCHAR(100)',
				'picture2'			=> 'VARCHAR(100)',
				'picture3'			=> 'VARCHAR(100)',
				'italian_title'		=> 'VARCHAR(200)',
				'italian_subtitle'	=> 'VARCHAR(200)',
				'original_title'	=> 'VARCHAR(200)',
				'original_subtitle'	=> 'VARCHAR(200)',
				'year'				=> 'VARCHAR(4)',
				'vote'				=> 'smallint',
				'author_id'			=> 'int NOT NULL',
				'actors'			=> 'text',
				'nation'			=> 'VARCHAR(30)',
				'pages'				=> 'VARCHAR(5)',
				'editor'			=> 'VARCHAR(50)',
				'language'			=> 'VARCHAR(20)',
				'seasons'			=> 'VARCHAR(200)',
				'pub_date'			=> 'DATETIME NOT NULL',
				'created_on' 		=> 'DATETIME NOT NULL',
				'updated_on' 		=> 'DATETIME NOT NULL',
		), 'ENGINE=InnoDB CHARSET=utf8');
	}

	public function safeDown()
	{
		$this->dropTable('tbl_content');
	}
}