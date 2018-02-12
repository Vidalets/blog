<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class TopicForm extends ActiveRecord
{
	
	public static function tableName()
    {
        return 'topics';
    }

    public function rules()
    {
        return [
            [['author', 'text'], 'required'],
			
			[['author'], 'string', 'max' => 50]
        ];
    }
	
	public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
	
}