<?php

use common\models\Post;
use yii\bootstrap4\Html;
use yii\data\ActiveDataProvider;
use yii\helpers\HtmlPurifier;
use yii\web\View;

/* @var $this View */
/* @var $model Post */
/* @var $dataProvider ActiveDataProvider */


$this->title = $model->title;

$this->params['breadcrumbs'][] = [
    'label' => 'Blog',
    'url' => ['site/index']
];

$this->params['breadcrumbs'][] = $this->title;
$author = $model->user;

?>
<div class="container">
  <div class="row">

    <!-- Post Content Column -->
    <div class="col-xs-12">

      <!-- Title -->
      <h1 class="mt-4"><?= $model->title ?></h1>

      <!-- Author -->
      <p class="lead">
        by
        <a href="#"><?= $author->username ?></a>
      </p>

      <hr>

      <!-- Date/Time -->
      <p>Posted on <?= Yii::$app->formatter->asDatetime($model->created_at) ?></p>

      <hr>

        <?php if ($model->banner) : ?>
          <!-- Preview Image -->
            <?= Html::img($model->getUploadUrl('banner'), ['class' => 'img-thumbnail']) ?>
        <?php endif; ?>

      <hr>

      <!-- Post Content -->
        <?= HtmlPurifier::process($model->content) ?>
    </div>
  </div>
  <!-- /.row -->
</div>