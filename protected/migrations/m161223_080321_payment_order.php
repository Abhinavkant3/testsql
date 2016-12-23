<?php

class m161223_080321_payment_order extends CDbMigration
{
		// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable(
			'payment_order',
			array(
				'id'			=> 'int(11) UNSIGNED NOT NULL AUTO_INCREMENT',
				'user_id' 		=> 'int(11) UNSIGNED NOT NULL',
				'currency_code' => 'varchar(255)',
				'amount' 		=> 'int(11)',
				'status' 		=> 'TINYINT(1)',
				'created_at' 	=> 'int(11)',
				'updated_at' 	=> 'int(11)',
				'PRIMARY KEY (id)',
				),
			'ENGINE=InnoDB'
			);
	}

	public function safeDown()
	{
		$this->dropTable('payment_order');
	}
}