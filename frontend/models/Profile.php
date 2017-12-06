<?php

namespace frontend\models;

use common\models\User;
use yii;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\db\Expression;
use yii\db\ActiveRecord;


class Profile extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'profile';
    }

    public function rules()
    {
        return [
            [['user_id', 'gender_id'], 'required'],
            [['user_id', 'gender_id'], 'integer'],
            [['first_name', 'last_name'], 'string'],
            [['birthdate', 'created_at', 'updated_at'], 'safe'],
            [['gender_id'],'in', 'range'=>array_keys($this->getGenderList())],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'birthdate' => 'Birthdate',
            'gender_id' => 'Gender ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'genderName' => Yii::t('app', 'Gender'),
            'userLink' => Yii::t('app', 'User'),
            'profileIdLink' => Yii::t('app', 'Profile'),
            
        ];
    }
    
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                    ],
            'value' => new Expression('NOW()'),

            ],
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenderName()
    {
        return $this->gender->gender_name;
    }
    /**
    * get list of genders for dropdown
    */
    public static function getGenderList()
    {
        $droptions = Gender::find()->asArray()->all();
        return Arrayhelper::map($droptions, 'id', 'gender_name');
    }
    /**
    * @return \yii\db\ActiveQuery
    */
    public function getUser()
    {
         return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    /**
    * @get Username
    */
    public function getUsername()
    {
         return $this->user->username;
    }
    /**
    * @getUserId
    */
    public function getUserId()
    {
    return $this->user ? $this->user->id : 'none';
    }
    /**
    * @getUserLink
    */

    public function getUserLink()
    {
        $url = Url::to(['user/view', 'id'=>$this->UserId]);
        $options = [];
        return Html::a($this->getUserName(), $url, $options);
    }
    /**
    * @getProfileLink
    */
    public function getProfileIdLink()
    {
        $url = Url::to(['profile/update', 'id'=>$this->id]);
        $options = [];
        return Html::a($this->id, $url, $options);
    }
    
    public function getGender(){
        return $this->hasOne(Gender::className(),['id'=> 'gender_id']);
    }
    
    public function beforeValidate() {
        if ($this->birthdate != null) {
            $new_date_format = date('Y-m-d', strtotime($this->birthdate));
            $this->birthdate = $new_date_format;
        }
        return parent::beforeValidate();
    }
}
