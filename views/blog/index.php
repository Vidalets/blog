<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\bootstrap\ActiveForm;
?>
<ul>
<h1>Блог</h1>

<?php foreach ($topics as $topic): ?>
    <li>
		<?= Html::tag('p', Html::encode(\yii\helpers\StringHelper::truncate($topic->text,100,'...')), ['class' => 'text']) ?>
		<?= Html::tag('p', Html::encode($topic->author)) ?>
		<?= Html::tag('p', Html::encode($topic->created_at)) ?>
        <?= Html::a('Перейти', '/web/index.php?r=blog%2Ftopic&tid='.$topic->id, $options=[]) ?>
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>

<h2>Добавить свою тему</h2>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($topicf, 'author')->textInput()->hint('Введите Ваше имя')->label('Имя'); ?>

    <?= $form->field($topicf, 'text')->textarea(['rows' => 3, 'cols' => 5])->label('Текст публикации'); ?>

	<div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Опубликовать', ['class' => 'btn btn-primary', 'name' => 'add-button']) ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>
