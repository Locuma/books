<?php

namespace app\models;

use queries\CatalogQuery;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property string $title
 * @property string $publication_year
 * @property string $isbn
 * @property ?string $main_page_image
 * @property ?string $description
 * @property ?string $deleted_at
 * @property Author $authorList
 */
class Book extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'book';
    }

    public function rules(): array
    {
        return [
            [['title', 'publication_year', 'isbn'], 'required'],
            [['title', 'description', 'isbn', 'main_page_image'], 'string'],
            [['publication_year'], 'trim'],
            [
                'publication_year',
                'date',
                'format' => 'php:Y-m-d',
            ],
            [
                'deleted_at',
                'date',
                'format' => 'php:Y-m-d H:i:s',
            ],
        ];
    }

    public static function find(): CatalogQuery
    {
        return new CatalogQuery(static::class);
    }

    /**
     * @throws InvalidConfigException
     */
    public function getAuthorList(): ActiveQuery
    {
        return $this->hasMany(Author::class, ['id' => 'author_id'])
            ->viaTable(BookToAuthor::tableName(), ['book_id' => 'id']);
    }
}