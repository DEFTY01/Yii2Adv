<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Profile */

$this->title = 'Create Profile';
$this->params['breadcrumbs'][] = ['label' => 'Profile', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-create container">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <div class="row">
        <div class="col-md-4">    
        <?= $this->render('_form', [
        'model' => $model,
         ]) ?></div>
        <div class="col-md-4">  
                
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
