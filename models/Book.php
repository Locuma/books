<?php

namespace app\models;

use yii\db\ActiveRecord;

class Book extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'book';
    }

    public function rules(): array
    {
        return [
            [['title', 'year', 'isbn'], 'required'],
            [['title', 'description', 'isbn', 'main_page_image'], 'string'],
            [['publication_year'], 'trim'],
            [
                'publication_year',
                'date',
                'format' => 'php:Y-m-d',
            ],
        ];
    }
}