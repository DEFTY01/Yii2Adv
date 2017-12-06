<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Profile;
use frontend\models\search\ProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\PermissionHelpers;
use common\models\RecordHelpers;
use yii\filters\AccessControl;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
       return [
           'access'=> [
               'class' => \yii\filters\AccessControl::className(),
               'only' => ['index','view','create','update','delete'],
               'rules' => [
                   [
                   'actions' => ['index','view','create','update','delete'],
                   'allow'=> true,
                   'roles' => ['@'],
               ],
             ],
           ],
           
           /* 'access2'=>[
                'class'=> \yii\filters\AccessControl::className(),
                'only'=> ['index','view','create','update','delete'],
                'rules'=>[
                    [
                        'actions' => ['index','view','create','update','delete'],
                        'allow'=> true,
                        'role'=> ['@'],
                        'matchCallback'=> function ($rule, $action) {
                          return PermissionHelpers::requireStatus('Active');
                        }
                    ],
                ],
            ], */ 
           
           'verbs' => [
               'class' => VerbFilter::className(),
               'actions' => [
                   'delete' => ['post'],
           ],
          ],
    ];
    }

    /**
     * Lists all Profile models.
     * @return mixed
     */
    public function actionIndex()
    {
        if ($already_exists = RecordHelpers::userHas('profile')) {
             return $this->render('view', [
                'model' => $this->findModel($already_exists),
        ]);
        } else {
            return $this->redirect(['create']);
        }
    }

    /**
     * Displays a single Profile model.
     * @param string $id
     * @return mixed
     */
    public function actionView()
    {
        if ($already_exist = RecordHelpers::userHas('profile')){
            return $this->render('view', [
                'model' => $this->findModel($already_exist),
            ]);
        } else {
            return $this->redirect(['create']);
        }
    }

    /**
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
        {
        $model = new Profile;
        
        $model->user_id = \Yii::$app->user->identity->id;
        
            if ($already_exists = RecordHelpers::userHas('profile')) {
            return $this->render('view', [
                'model' => $this->findModel($already_exists),
            ]);
            
        } elseif ($model->load(Yii::$app->request->post()) && $model->save()){
                return $this->redirect(['view']);
                
        } else {
                return $this->render('create', [
                'model' => $model,
        ]);
        }
    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate(){
        
        if($model = Profile::find()->where(['user_id' =>
             Yii::$app->user->identity->id])->one()) {
            
             if ($model->load(Yii::$app->request->post()) && $model->save()) {
                 
              return $this->redirect(['view']);
              } 
              else {
                  
                return $this->render('update', [
                'model' => $model,
                ]);
        }
        } else {
            throw new NotFoundHttpException('No such profile.');
        }
}

    /**
     * Deletes an existing Profile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     */
    public function actionDelete()
    {
        $model = Profile::find()->where(['user_id'=>Yii::$app->user->id])->one();
        
        $this->findModel($model->id)->delete();
        
        return $this->redirect(['site/index']);
    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
