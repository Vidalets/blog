<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\bootstrap\ActiveForm;
?>
<h1>Тема</h1>

<?= Html::tag('p', Html::encode("{$topic->author} ({$topic->text})")) ?>

<ul>
<?php foreach ($comments as $comment): ?>
    <li>
		<?= Html::tag('p', Html::encode($comment->text)) ?>
		<?= Html::tag('p', Html::encode($comment->author)) ?>
		<?= Html::tag('p', Html::encode($comment->created_at)) ?>
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>

<h2>Добавить свой комментарий</h2>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($сommentf, 'author')->textInput()->hint('Введите Ваше имя')->label('Имя'); ?>

    <?= $form->field($сommentf, 'text')->textarea(['rows' => 3, 'cols' => 5])->label('Текст комментария'); ?>
	
	<div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Ответить', ['class' => 'btn btn-primary', 'name' => 'add-button']) ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>