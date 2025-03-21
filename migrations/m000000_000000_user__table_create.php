<?php

use yii\db\Migration;

class m000000_000000_user__table_create extends Migration
{
    private const TABLE_NAME = 'user';

    public function safeUp(): bool
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'login' => $this->string()->notNull()->unique()->comment('Логин пользователя'),
            'auth_key' => $this->string(32)->notNull()->comment('Ключ для cookie-авторизации'),
            'password_hash' => $this->string()->notNull()->comment('Хэш пароля'),
            'email' => $this->string()->notNull()->unique()->comment('Email'),
            'status' => $this->smallInteger()->notNull()->defaultValue(10)->comment('Статус пользователя (активен/неактивен)'),
            'created_at' => $this->timestamp()->null()->comment('Дата создания'),
            'deleted_at' => $this->timestamp()->null()->comment('Дата удаления'),

        ]);

        $this->createIndex('IDX__USER__LOGIN', self::TABLE_NAME, 'login');
        $this->createIndex('IDX__USER__EMAIL', self::TABLE_NAME, 'email');

        return true;
    }


    public function safeDown(): bool
    {

        $this->dropIndex('IDX__USER__LOGIN', self::TABLE_NAME);
        $this->dropIndex('IDX__USER__EMAIL', self::TABLE_NAME);
        $this->dropTable(self::TABLE_NAME);
        
        return false;
    }
}
