<?php

namespace app\models;

use phpDocumentor\Reflection\Types\This;
use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $email
 * @property string $username
 * @property string $access_token
 * @property string $auth_key
 * @property string $password
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'username', 'access_token', 'auth_key', 'password'], 'required'],
            [['email', 'username'], 'string', 'max' => 50],
            [['access_token', 'auth_key'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 200],
            [['username'], 'unique'],
            [['access_token'], 'unique'],
            [['auth_key'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'username' => 'Username',
            'access_token' => 'Access Token',
            'auth_key' => 'Auth Key',
            'password' => 'Password',
        ];
    }

    public static function findIdentity($id)
    {
        return User::findOne($id);
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
      return User::findOne(['access_token'=>$token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key == $authKey;
    }
}
