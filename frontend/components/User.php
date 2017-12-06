<?php

namespace frontend\components;

use Yii;

class User extends \yii\web\User{
    
    public function getUsername(){
        return Yii::$app->user->identity->username;
    }
    public function getFirstname(){
        return Yii::$app->user->identity->firstname;
    }

    public function getLastname(){
        return Yii::$app->user->identity->lastname;
    }
    
    public function listAction($id){
        $tweets = Tweet::find()->where(['user_id'=> $id])->all();
        
        $model = new TweetForm();
        
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->request->format = response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }elseif ($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->controller->redirect('/list');
        }else {
            return $this->controller->render('list', [
                'model'=>$model,
                'tweets'=>$tweets,
            ]);
        }
    }
    
    }