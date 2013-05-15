<?php

class m130514_184124_create_indexes extends CDbMigration
{
	public function safeUp()
	{
		$this->createIndex('comment_content_id', '{{comment}}', 'content_id');
		$this->createIndex('content_user_id', '{{content}}', 'user_id');
		$this->createIndex('content_type', '{{content}}', 'type');
		$this->createIndex('content_vote', '{{content}}', 'vote');
		$this->createIndex('content_created_on', '{{content}}', 'created_on');
		$this->createIndex('content_italian_title', '{{content}}', 'italian_title');
		$this->createIndex('content_original_title', '{{content}}', 'original_title');
		$this->createIndex('quotes_content_id', '{{quote}}', 'content_id');
		$this->createIndex('quotes_random', '{{quote}}', 'random');
		$this->createIndex('user_username', '{{user}}', 'username');
		$this->createIndex('user_role', '{{user}}', 'role');
		$this->createIndex('tags_name', '{{tag}}', 'name');
	}

	public function safeDown()
	{
		$this->dropIndex('comment_content_id', '{{comment}}');
		$this->dropIndex('content_user_id', '{{content}}');
		$this->dropIndex('content_type', '{{content}}');
		$this->dropIndex('content_vote', '{{content}}', 'vote');
		$this->dropIndex('content_italian_title', '{{content}}');
		$this->dropIndex('content_original_title', '{{content}}');
		$this->dropIndex('quotes_content_id', '{{quote}}');
		$this->dropIndex('quotes_random', '{{quote}}', 'random');
		$this->dropIndex('user_username', '{{user}}', 'username');
		$this->dropIndex('user_role', '{{user}}', 'role');
		$this->dropIndex('tags_name', '{{tag}}', 'name');
		$this->dropIndex('content_created_on', '{{content}}');
	}
}