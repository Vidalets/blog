<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class CommentForm extends ActiveRecord
{
		
	public static function tableName()
    {
        return 'comments';
    }

    public function rules()
    {
        return [
            [['author', 'text'], 'required']
        ];
    }
	
	public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
}