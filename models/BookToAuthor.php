<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property int $book_id
 * @property int $author_id
 */
class BookToAuthor extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'book_author';
    }

    public function rules(): array
    {
        return [
            [['book_id', 'author_id'], 'required'],
            [['book_id', 'author_id'], 'integer'],
        ];
    }
}