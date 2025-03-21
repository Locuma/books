<?php

use yii\db\Migration;

class m250320_140909_subscription__table_create extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250320_140909_subscription__table_create cannot be reverted.\n";

        return true;
    }
}
