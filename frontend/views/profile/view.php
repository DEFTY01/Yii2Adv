<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\PermissionHelpers;
use frontend\models\Profile;

/* @var $this yii\web\View */
/* @var $model frontend\models\Profile */

$this->title = $model->user->username . "'s Profile";
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?Php
        
            if (PermissionHelpers::userMustBeOwner('profile', $model->id)){
                echo Html::a('update', ['update','id' => $model->id],
                        ['class' => 'btn btn-primary']);
            }?>
        <?= Html::a('Delete',['delete', 'id'=>$model->id],[
            'class'=>'btn btn-danger',
            'data'=> [
                'confirm' => Yii::t('app', 'Are you sure to delete this item?'),
                'method' => 'post,'
            ],
        ])
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'user.username',
            'first_name',
            'last_name',
            'birthdate',
            'gender.gender_name',
            //'created_at',
            //'updated_at',
            //'user_id',
        ],
    ]) ?>

</div>
