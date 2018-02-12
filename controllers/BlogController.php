<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Topics;
use app\models\Comments;
use app\models\TopicForm;
//use app\models\CommentForm;

class BlogController extends Controller
{
	public function actionIndex()
		{
			
			$topicf = new TopicForm();

			if ($topicf->load(Yii::$app->request->post()) && $topicf->validate()) {
				
				if( $model->save() ) {
					return $this->refresh();
				}
				
			}			
			
			$query = Topics::find();

			$pagination = new Pagination([
				'defaultPageSize' => 20,
				'totalCount' => $query->count(),
			]);

			$topics = $query->orderBy('created_at')
				->offset($pagination->offset)
				->limit($pagination->limit)
				->all();

			return $this->render('index', [
				'topics' => $topics,
				'pagination' => $pagination,
			]);
			
			
			

			
		}
	public function actionTopic()
		{
		
			$topic = Topics::findOne(Yii::$app->request->get('tid'));	
			
			$query = Comments::find();

			$pagination = new Pagination([
				'defaultPageSize' => 20,
				'totalCount' => $query->count(),
			]);

			$comments = $query->orderBy('created_at')
				->offset($pagination->offset)
				->limit($pagination->limit)
				->all();

			return $this->render('topic', [
				'topic' => $topic ,
				'comments' => $comments,
				'pagination' => $pagination,
			]);
		}
}
