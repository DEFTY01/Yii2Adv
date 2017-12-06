<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TweetModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tweet-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tweet_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tweet_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'author_id')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>