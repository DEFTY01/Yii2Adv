<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TweetModel */

$this->title = 'Make a fancy tweet';
?>
<div class="tweet-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
