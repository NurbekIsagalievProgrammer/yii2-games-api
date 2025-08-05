<?php

namespace app\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;
use app\models\Game;

class GameController extends ActiveController
{
    public $modelClass = 'app\models\Game';

public function behaviors()
{
    $behaviors = parent::behaviors();
    
    // Форсируем JSON-ответ вместо XML
    $behaviors['contentNegotiator'] = [
        'class' => \yii\filters\ContentNegotiator::class,
        'formats' => [
            'application/json' => \yii\web\Response::FORMAT_JSON,
        ],
    ];

    // Basic Auth (оставляем вашу реализацию)
    $behaviors['authenticator'] = [
        'class' => \yii\filters\auth\HttpBasicAuth::class,
        'auth' => function ($username, $password) {
            if ($username === 'admin' && $password === 'password') {
                return \app\models\User::findByUsername($username);
            }
            return null;
        },
    ];
    
    return $behaviors;
}

    public function actions()
    {
        $actions = parent::actions();
        
        // Настраиваем действие для получения игры по slug
        unset($actions['view']);
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        
        return $actions;
    }

    public function prepareDataProvider()
    {
        return new \yii\data\ActiveDataProvider([
            'query' => Game::find(),
            'pagination' => false,
        ]);
    }

    public function actionView($slug)
    {
        return Game::findOne(['slug' => $slug]);
    }
}