<?php
class m161223_072911_comment_like extends CDbMigration {

	public function safeUp() {
		$this->createTable(
			'comment_like',
			array(
				'id'			=>'int(11) UNSIGNED NOT NULL AUTO_INCREMENT',
				'user_id'		=>'int(11) UNSIGNED NOT NULL',
				'comment_id'	=>'int(11) UNSIGNED NOT NULL',
				'status' 		=> 'TINYINT(1)',
				'created_at' 	=> 'int(11)',
				'updated_at' 	=> 'int(11)',
				'PRIMARY KEY (id)',
				),
			'ENGINE=InnoDB'
			);
	}

	public function safeDown() {
		$this->dropTable('comment_like');

	}
}