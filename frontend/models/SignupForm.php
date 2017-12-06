<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $firstname;
    public $lastname;
    public $email;
    public $password;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            ['firstname', 'required', 'message'=>'You need to fill this'],
            ['firstname','string', 'min'=> 1, 'max'=>30],
            ['lastname', 'required', 'message'=>'You need to fill this'],
            ['lastname','string', 'min'=> 1, 'max'=>30],

            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
        
        $user = new User();
        $user->firstname = $this->firstname;
        $user->lastname = $this->lastname;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->save();
        return $user;
    }
        return null;
    }
    
    
    
    public function sendEmail(){   
        $user = User::findOne([
        'status_id' => User::STATUS_ACTIVE,
        'email' => $this->email,
        ]);
        if ($user) {
        $user->generatePasswordResetToken();
        if ($user->save()) {
        return Yii::$app->mailer->compose('passwordResetToken',
        ['user' => $user])
        ->setFrom([\Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
        ->setTo($this->email)
        ->setSubject('Password reset for ' . Yii::$app->name)
        ->send();
            }
        }
    return false;
    
    }
}
