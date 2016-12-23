<?php

/* @property string $id
/* @property string $name
/* @property string $email
/* @property string $password
/* @property integer $mrp
/* @property integer $last_activity_at
/* @property integer $app_activity_count
/* @property integer $web_activity_count
/* @property string $campaign_source
/* @property integer $status
/* @property integer $created_at
/* @property integer $updated_at
*/
class User extends CActiveRecord {

	const STATUS_ACTIVE = 1;
	const STATUS_DEACTIVATED = 2;
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'user';
	}

	public function rules() {
		return array(
			array('name, email, password', 'required'),
			array('mrp, last_activity_at, app_activity_count, web_activity_count, status, created_at, updated_at', 'numerical', 'integerOnly'=>true),
			array('name, email, password, campaign_source', 'length', 'max'=>255),
			);
	}

	public function relations() {
		return array(
			'alliance' => array(self::HAS_ONE,'AllianceMember','user_id'),
			'comments' => array(self::HAS_MANY,'Comment','user_id'),
			'comment_likes' => array(self::HAS_MANY,'CommentLike','user_id'),
			'payments' => array(self::HAS_MANY,'PaymentOrder','user_id'),
			'posts' => array(self::HAS_MANY,'Post','user_id'),
		);
	}

	public function scopes() {
		return array(
			'active'=>array('condition'=>"{$this->tableAlias}.status = :status_active", 'params'=>array('status_active'=>self::STATUS_ACTIVE)),
			'deactivated'=>array('condition'=>"status = :status_deactivated", 'params'=>array('status_deactivated'=>self::STATUS_DEACTIVATED)),
		);
	}

	public function beforeSave() {
		if($this->isNewRecord) { 
			$this->status = self::STATUS_ACTIVE;
			$this->created_at = time();
		}
		$this->updated_at = time();
		return parent::beforeSave();
	}

	public function updateColumns($column_value_array) {
		$column_value_array['updated_at'] = time();
		foreach($column_value_array as $column_name => $column_value)
			$this->$column_name = $column_value;
		$this->update(array_keys($column_value_array));
	}

	public static function create($attributes) {
		$model = new User;
		$model->attributes = $attributes;
		$model->save();
		return $model;
	}
}