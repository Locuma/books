<?php

namespace queries;

use yii\db\ActiveQuery;

class CatalogQuery extends ActiveQuery
{
    public function withAuthor(): CatalogQuery
    {
        return $this->with('authors');
    }
}