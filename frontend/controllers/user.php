<?php

namespace app\controllers;

class userController extends \yii\web\SiteController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}