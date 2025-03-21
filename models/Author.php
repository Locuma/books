<?php

namespace app\models;

use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int $last_name
 * @property int $first_name
 * @property ?int $second_name
 * @property ?string $deleted_at
 * @property Book $bookList
 */
class Author extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'author';
    }

    public function rules(): array
    {
        return [
            [['last_name', 'first_name'], 'required'],
            [['last_name', 'first_name', 'second_name'], 'string', 'max' => 32],
            [
                'deleted_at',
                'date',
                'format' => 'php:Y-m-d H:i:s',
            ],
        ];
    }

    /**
     * @throws InvalidConfigException
     */
    public function getBookList(): ActiveQuery
    {
        return $this->hasMany(Book::class, ['id' => 'book_id'])
            ->viaTable(BookToAuthor::tableName(), ['author_id' => 'id']);
    }
}