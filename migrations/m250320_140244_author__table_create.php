<?php

use yii\db\Migration;

class m250320_140244_author__table_create extends Migration
{
    private const TABLE_NAME = 'author';

    public function safeUp(): bool
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey()->unsigned(),
            'last_name' => $this->string(32)->notNull()->comment('Фамилия автора'),
            'first_name' => $this->string(32)->notNull()->comment('Имя автора'),
            'second_name' => $this->string(32)->null()->comment('Отчество автора'),
            'deleted_at' => $this->timestamp()->null()->comment('Дата удаления'),
        ]);

        return true;
    }

    public function safeDown(): bool
    {
        $this->dropTable(self::TABLE_NAME);

        return true;
    }
}
