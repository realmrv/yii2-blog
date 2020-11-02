<?php

namespace api\controllers;

use common\models\Post;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\rest\ActiveController;

/**
 * Class PostController
 * @package api\controllers
 */
class PostController extends ActiveController
{
    public $modelClass = 'common\models\Post';

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            [
                'class' => 'yii\filters\HttpCache',
                'only' => ['index', 'list', 'content', 'view'],
                'lastModified' => function ($action, $params) {
                    $q = new Query();
                    return $q->from('post')->max('updated_at');
                },
            ],
            [
                'class' => 'yii\filters\PageCache',
                'only' => ['index', 'list', 'content', 'view'],
                'duration' => 3600,
                'variations' => [
                    Yii::$app->language,
                ],
                'dependency' => [
                    'class' => 'yii\caching\DbDependency',
                    'sql' => 'SELECT MAX(updated_at) FROM post',
                ],
            ],
        ]);
    }

    public function actionList()
    {
        return new ActiveDataProvider([
            'query' => Post::find()->select(['id', 'title']),
        ]);
    }

    public function actionContent()
    {
        return new ActiveDataProvider([
            'query' => Post::find()->select(['id', 'title', 'content']),
        ]);
    }
}
