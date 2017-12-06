<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "role".
 *
 * @property integer $id
 * @property string $role_name
 * @property string $role_value
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_name', 'role_value'], 'required'],
            [['role_name', 'role_value'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_name' => 'Role Name',
            'role_value' => 'Role Value',
        ];
    }
    
    /**
    * get role relationship
    *
    */
    public function getRole(){
        return $this->hasOne(Role::className(), ['role_value' => 'role_id']);
    }
    /**
    * get role name
    *
    */
    public function getRoleName(){
        return $this->role ? $this->role->role_name : '- no role -';
    }
    /**
    * get roles from dropbar
    */
    public static function getRoleList()
    {
        $droptions = Role::find()->asArray()->all();
        return Arrayhelper::map($droptions, 'role_value', 'role_name');
    }
}
