<?php

use app\models\Author;
use app\models\Book;
use yii\db\Migration;

class m250320_140841_book_author__table_create extends Migration
{
    private const TABLE_NAME = 'book_author';

    public function safeUp(): bool
    {
        $this->createTable(self::TABLE_NAME, [
            'book_id' => $this->integer()->notNull()->unsigned(),
            'author_id' => $this->integer()->notNull()->unsigned(),
            'PRIMARY KEY(book_id, author_id)',
        ]);

        $this->addForeignKey(
            'FK__BOOK_AUTHOR__BOOK_ID__BOOK__ID',
            self::TABLE_NAME,
            'book_id',
            Book::tableName(),
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'FK__BOOK_AUTHOR__AUTHOR_ID__AUTHOR__ID',
            self::TABLE_NAME,
            'author_id',
            Author::tableName(),
            'id',
            'CASCADE'
        );


        return true;
    }


    public function safeDown(): bool
    {
        $this->dropForeignKey('FK__BOOK_AUTHOR__BOOK_ID__BOOK__ID', self::TABLE_NAME);
        $this->dropForeignKey('FK__BOOK_AUTHOR__AUTHOR_ID__AUTHOR__ID', self::TABLE_NAME);
        $this->dropTable(self::TABLE_NAME);

        return true;
    }
}
