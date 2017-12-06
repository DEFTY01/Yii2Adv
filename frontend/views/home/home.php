<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\controllers\TweetController;


?>


<div class="container-fluid">
    
    
    <div class="col-md-2" style="background-color: white; border:1px solid black; height:550px;">
        
        <h4 > Hello <b> <?= \Yii::$app->user->username ?></b></h4>
        <p> First name:<b> <?= \Yii::$app->user->firstname ?></b></p>
        <p> Last name: <b> <?= \Yii::$app->user->lastname ?></b></p>

        
    </div>
    
    <div class="col-md-8" style="background-color: rgba(0,130,192,0.2)">
        <p>
            
            "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."
            
        </p>
        
        <p>

            
        </p>
    </div>
    
    <div class="col-md-2">
        
    </div>
    
    
    
</div>
