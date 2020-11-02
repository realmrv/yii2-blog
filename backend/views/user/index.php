<?php

use common\models\User;
use kartik\grid\GridView;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

  <h1><?= Html::encode($this->title) ?></h1>

  <p>
      <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
  </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            'username',
            'email:email',
            [
                'attribute' => 'status',
                'filter' => [User::STATUS_ACTIVE => 'Active', User::STATUS_INACTIVE => 'Inactive'],
                'value' => function ($model, $key, $index, $column) {
                    return array_search($model->status, ['Active' => User::STATUS_ACTIVE, 'Inactive' => User::STATUS_INACTIVE], true);
                }
            ],
            'created_at:datetime',
            'updated_at:datetime',
            ['class' => 'kartik\grid\ActionColumn', 'template' => '{view} {update}'],
        ],
    ]); ?>


</div>
