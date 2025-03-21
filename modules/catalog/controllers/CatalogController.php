<?php

use searches\CatalogSearch;
use yii\filters\AccessControl;
use yii\web\Controller;

class CatalogController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['?', '@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create', 'update', 'delete'],
                        'roles' => ['user'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex(): string
    {
        $searchModel = new CatalogSearch();
        $dataProvider = $searchModel->search();

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }
}