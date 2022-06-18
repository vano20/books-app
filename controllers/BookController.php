<?php

namespace app\controllers;

class BookController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\book';

    public function actions():array
    {
        $actions = parent::actions();
        $actions['index'] = [
            'class' => 'yii\rest\IndexAction',
            'modelClass' => $this->modelClass,
            'prepareDataProvider' => fn() => new ActiveDataProvider(
                [
                    'query' => $this->modelClass::find(),
                    'pagination' => false
                ]
            )
        ];
        return $actions;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
