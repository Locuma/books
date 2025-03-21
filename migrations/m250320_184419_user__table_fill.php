<?php

use app\models\User;
use yii\db\Migration;

class m250320_184419_user__table_fill extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert(User::tableName(), [
            'login' => 'guest',
            'auth_key' => \Yii::$app->security->generateRandomString(),
            'password_hash' => \Yii::$app->security->generatePasswordHash('guest_password'),
            'email' => 'guest@example.com',
            'status' => 10,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $this->insert(User::tableName(), [
            'login' => 'user',
            'auth_key' => \Yii::$app->security->generateRandomString(),
            'password_hash' => \Yii::$app->security->generatePasswordHash('user_password'),
            'email' => 'user@example.com',
            'status' => 10,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $auth = Yii::$app->authManager;

        // добавляем роль "author" и даём роли разрешение "createPost"
        $user = $auth->createRole('user');
        $auth->add($user);

        $guest = $auth->createRole('guest');
        $auth->add($guest);

        $guestUser = User::findOne(['login' => 'guest']);
        if ($guestUser) {
            $auth->assign($guest, $guestUser->id);
        }

        $userUser = User::findOne(['login' => 'user']);
        if ($userUser) {
            $auth->assign($user, $userUser->id);
        }

        $guestUser = User::findOne(['login' => 'guest']);
        if ($guestUser && !$auth->getAssignment('guest', $guestUser->id)) {
            $auth->assign($guest, $guestUser->id);
        }

        $userUser = User::findOne(['login' => 'user']);
        if ($userUser && !$auth->getAssignment('user', $userUser->id)) {
            $auth->assign($user, $userUser->id);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete(User::tableName(), ['username' => 'guest']);
        $this->delete(User::tableName(), ['username' => 'user']);

        return false;
    }
}
