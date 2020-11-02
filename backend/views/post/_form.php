<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\redactor\widgets\Redactor;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brief')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'content')->widget(Redactor::class) ?>

    <?php if ($model->banner): ?>
      <div class="form-group">
        <div class="row">
          <div class="col-lg-6">
            <!-- Original image -->
              <?= Html::img($model->getUploadUrl('banner'), ['class' => 'img-thumbnail']) ?>
          </div>
          <div class="col-lg-4">
            <!-- Thumb 1 (thumb profile) -->
              <?= Html::img($model->getThumbUploadUrl('banner'), ['class' => 'img-thumbnail']) ?>
          </div>
          <div class="col-lg-2">
            <!-- Thumb 2 (preview profile) -->
              <?= Html::img($model->getThumbUploadUrl('banner', 'preview'), ['class' => 'img-thumbnail']) ?>
          </div>
        </div>
      </div>
    <?php endif ?>

    <?= $form->field($model, 'banner')->fileInput() ?>

  <div class="form-group">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
  </div>

    <?php ActiveForm::end(); ?>

</div>
