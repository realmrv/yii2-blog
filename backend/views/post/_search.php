<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PostSearch */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="post-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'brief') ?>

    <?= $form->field($model, 'content') ?>

    <?= $form->field($model, 'slug') ?>

    <?php // echo $form->field($model, 'banner') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

  <div class="form-group">
      <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
      <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
  </div>

    <?php ActiveForm::end(); ?>

</div>
