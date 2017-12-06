<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
use yii\helpers\Html;
use frontend\assets\AppAsset;
use frontend\assets\FontAwesomeAsset;
use yii\web\Controller;
use frontend\web\css;
use yii\bootstrap\ActiveForm;
use yii\web\View;
use frontend\components\User;
use \yii\bootstrap\Modal;
use \yii\bootstrap\Collapse;
use \yii\bootstrap\Alert;
$this->title = 'Index';
AppAsset::register($this);
FontAwesomeAsset::register($this);
?>

<div class="site-index" style="background-image: URL('../web/imgs/bg/bg2.png'); background-repeat: no-repeat; padding: 10% ">
<?php $this->beginPage() ?>

    <!--<div class="col-md-4 col-md-offset-8" style="background-color:rgba(255,255,255,0.6); width: 300px; height: 300px;"> -->
        

        
    </div>
    
    <div class="jumbotron" >
     <div class="col-md-4 col-md-offset-1">   
        <p>
            <?php
            if (Yii::$app->user->isGuest){
            echo Html::a('SIGNUP', ['site/signup'],
            ['class' => 'btn btn-lg btn-danger']);
            } 
            ?>
        </p>
     </div>

     <div class="col-md-4 col-md-offset-2">
        <p>
            <?php
                if (Yii::$app->user->isGuest){
                echo Html::a('LOGIN', ['site/login'],
                ['class' => 'btn btn-lg btn-success']);
                }
            ?></p>
     </div>
    </div>
</div>

