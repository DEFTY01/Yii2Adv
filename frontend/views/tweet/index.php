<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\DetailView;
use frontend\controllers\TweetController;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\TweetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My tweets';



?>


<div class="container-fluid">
    
    
    <div class="col-md-2" style="background-color: white; border:1px solid black; height:30em;">
        
        <h4 > Hello <b> <?= \Yii::$app->user->username ?></b></h4>
        <p> First name:<b> <?= \Yii::$app->user->firstname ?></b></p>
        <p> Last name: <b> <?= \Yii::$app->user->lastname ?></b></p>

        
    </div>
    
    <div class="col-md-8" style="background-color: rgba(0,130,192,0.2)">            
        <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
        <p class="text-center">
            <?= Html::a('New Tweet', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
            <?php

            $con = \Yii::$app->db;

            $sql = $con->createCommand("SELECT * FROM tweet ORDER BY created_at DESC");

            $tweets = $sql->queryAll();

            if(!$tweets)
                echo '<h2> This is empty </h2>';
             else{
                  foreach($tweets as $tweet){             
               ?>
            <hr>
        <p>

            
        </p>

        <div class="col-md-8 col-md-offset-2">
            <h2 class="text-left">
                <?php echo $tweet['tweet_title']; ?> 
                <br><small>Author: <b><?php echo $tweet['author_id'];?> </b>Created at: <b><?php echo date(($tweet['created_at']));?></b>
                    <br>Updated at: <b><?php echo date(($tweet['updated_at']));?>
                </small>
            </h2>

                <p class="text-left">
                <?= Html::a('Update', ['update', 'id' => $tweet['tweet_id']], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('View', ['view', 'id' => $tweet['tweet_id']], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $tweet['tweet_id']], [
                                        'class' => 'btn btn-danger',
                                        'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                        ],
                                    ]) ?>
                </p>
               

        
        </div>


    </div>
    

</div>
<?php } ?>
<?php } ?>