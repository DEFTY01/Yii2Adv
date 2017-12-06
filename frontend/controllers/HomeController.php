<?php

namespace frontend\controllers;

use Yii;
use app\models\TweetModel;
use frontend\models\search\TweetSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Profile;
use frontend\controllers\TweetController;
use frontend\controllers\SiteController;
use frontend\controllers\ProfileController;


class HomeController extends \yii\web\Controller
{
    public function actionHome()
    {
        return $this->render('home');
    }

    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    
    
    
    
    
    
    
}
