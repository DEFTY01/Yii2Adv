<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TweetModel */

$this->title = 'Update Tweet Model: ' . $model->tweet_title;
$this->params['breadcrumbs'][] = ['label' => 'Tweet Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tweet_title, 'url' => ['view', 'id' => $model->tweet_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tweet-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
