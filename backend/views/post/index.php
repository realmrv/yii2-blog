<?php

use kartik\grid\GridView;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

  <h1><?= Html::encode($this->title) ?></h1>

  <p>
      <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
  </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            'title',
            'user.username',
            'created_at:datetime',
            'updated_at:datetime',
            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>


</div>
