<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tweet".
 *
 * @property integer $tweet_id
 * @property string $tweet_title
 * @property string $tweet_description
 * @property string $author_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $views
 */
class TweetModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tweet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tweet_title', 'tweet_description', 'author_id'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['views'], 'integer'],
            [['tweet_title', 'author_id'], 'string', 'max' => 45],
            
            [['tweet_description'], 'string'],
            [['tweet_description'], 'string', 'max' => 160],
            [['tweet_description'],'string', 'min' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tweet_id' => 'Tweet ID',
            'tweet_title' => 'Tweet Title',
            'tweet_description' => 'Tweet Description',
           // 'author_id' => 'Author ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'views' => 'Views',
            'author_id.username' => 'Author',
        ];
    }

 
    
    }
