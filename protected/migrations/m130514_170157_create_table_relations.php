<?php

class m130514_170157_create_table_relations extends CDbMigration
{
	public function safeUp()
	{
		$this->addForeignKey('authors_reviews', '{{content}}', 'author_id', '{{author}}', 'id','SET NULL','CASCADE');
		$this->addForeignKey('users_reviews', '{{content}}', 'user_id', '{{user}}', 'id','SET NULL','CASCADE');
		$this->addForeignKey('contents_comments', '{{comment}}', 'content_id', '{{content}}', 'id','CASCADE','CASCADE');
		$this->addForeignKey('quotes_contents', '{{quote}}', 'content_id', '{{content}}', 'id','CASCADE','CASCADE');
		$this->addForeignKey('tag_content_tag', '{{tag_content}}', 'content_id', '{{content}}', 'id','CASCADE','CASCADE');
		$this->addForeignKey('tag_content_content', '{{tag_content}}', 'tag_id', '{{tag}}', 'id','CASCADE','CASCADE');
	}

	public function safeDown()
	{
		$this->dropForeignKey('authors_reviews', '{{content}}');
		$this->dropForeignKey('users_reviews', '{{content}}');
		$this->dropForeignKey('contents_comments', '{{comment}}');
		$this->dropForeignKey('quotes_contents', '{{quote}}');
		$this->dropForeignKey('tag_content_tag', '{{tag_content}}');
		$this->dropForeignKey('tag_content_content', '{{tag_content}}');
	}
}