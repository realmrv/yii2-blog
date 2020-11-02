<?php

use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Yii2 Test Blog';

?>

<div class="site-index">

  <h1 class="my-4">Blog
    <small>Yii2 Test</small>
  </h1>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_post',
    ]) ?>

</div>
