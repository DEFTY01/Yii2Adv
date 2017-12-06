<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\user */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
    <?php ActiveForm::begin(); ?>
    
    <?= $form->field($model,'status_id')->dropDownList($model->statusList,
                ['prompt'=> 'Please choose one']);?>
    <?= $form->field($model,'role_id')->dropDownList($model->statusList,
                ['prompt'=> 'Please choose one']);?>
    <?= $form->field($model,'user_type_id')->dropDownList($model->statusList,
                ['prompt'=> 'Please choose one']);?>
    <?= $form->field($model,'username')->textInput(['maxlength'=> 256]) ?>
    <?= $form->field($model,'email')->textInput(['maxlength'=>256]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update',
                ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
