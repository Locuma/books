<?php

namespace searches;

use app\models\Book;
use queries\CatalogQuery;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class CatalogSearch extends Model
{
    public CatalogQuery $query;

    public function init(): void
    {
        parent::init();

        $this->query = Book::find()->orderBy([Book::tableName() . '.id' => SORT_DESC]);
    }

    public function search(): ActiveDataProvider
    {
        $baseQuery = $this->query;

        $baseQuery->withAuthor();

        return new ActiveDataProvider([
            'query' => $baseQuery,
        ]);
    }
}