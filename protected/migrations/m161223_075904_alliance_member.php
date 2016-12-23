<?php

class m161223_075904_alliance_member extends CDbMigration
{
		// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable(
			'alliance_member',
			array(
				'id'			=>'int(11) UNSIGNED NOT NULL AUTO_INCREMENT',
				'alliance_id'   =>'int(11) UNSIGNED NOT NULL',
				'user_id'		=>'int(11) UNSIGNED NOT NULL', 
				'status' 		=>'TINYINT(1)',
				'created_at' 	=>'int(11)',
				'updated_at' 	=>'int(11)',
				'PRIMARY KEY (id)',
				),
			'ENGINE=InnoDB'
			);
	}

	public function safeDown()
	{
		$this->dropTable('alliance_member');
	}
}