<?php

use common\models\Post;
use yii\bootstrap4\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

/** @var Post $model */

?>
<!-- Blog Post -->
<div class="card mb-4">
  <img class="card-img-top"
       src="<?= $model->banner ? $model->getThumbUploadUrl('banner') : 'http://placehold.it/750x300' ?>"
       alt="Card image cap">
  <div class="card-body">
    <h2 class="card-title"><?= Html::encode($model->title) ?></h2>
    <p class="card-text"><?= HtmlPurifier::process($model->brief) ?></p>
    <a href="<?= Url::to(['post/view', 'id' => $model->primaryKey]) ?>>" class="btn btn-primary">Read More &rarr;</a>
  </div>
  <div class="card-footer text-muted">
    Posted on <?= Yii::$app->formatter->asDatetime($model->created_at) ?> by
    <a href="#"><?= $model->user->username ?></a>
  </div>
</div>

