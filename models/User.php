<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $login
 * @property string $auth_key
 * @property string $password_hash
 * @property string $status
 * @property ?string $email
 * @property ?string $created_at
 * @property ?string $deleted_at
 */
class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    public static function tableName(): string
    {
        return 'user';
    }


    public function rules(): array
    {
        return [
            [['username', 'email', 'password_hash'], 'required'],
            ['email', 'email'],
            ['username', 'unique', 'targetClass' => self::class],
            ['email', 'unique', 'targetClass' => self::class],
        ];
    }


    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public static function findByUsername($login): ?User
    {
        return static::findOne(['login' => $login]);
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
        return $this->auth_key === $authKey;
    }

    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function setPassword($password)
    {
        $this->password_hash = \Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = \Yii::$app->security->generateRandomString();
    }
}
