<?php

use yii\db\Migration;

class m250320_133943_book__table_create extends Migration
{
    private const TABLE_NAME = 'book';

    public function safeUp(): bool
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey()->unsigned(),
            'title' => $this->string()->notNull()->comment('Заголовок книги'),
            'publication_year' => $this->date()->notNull()->comment('Год издания'),
            'description' => $this->text()->null()->comment('Краткое описание'),
            'isbn' => $this->string(20)->unique()->notNull()->comment('Международный книжный номер'),
            'main_page_image' => $this->string()->null()->comment('Фото главной страницы'), // возможно, имелась в виду обложка. Толкаюсь от того, что написано.
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
