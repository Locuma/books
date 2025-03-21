<?php

use assets\CatalogAsset;use yii\data\DataProviderInterface;
use yii\data\ActiveDataProvider;
use yii\widgets\LinkPager;

/**
 * @var ActiveDataProvider $dataProvider
 */

CatalogAsset::register($this);

?>


<div class="red_line">Найдено: <?= $dataProvider->getTotalCount() ?> | <a style="color:#FFFFFF"
        <?php if ($dataProvider->getTotalCount() > 1000) { ?>
            onclick="if (!confirm('Выбрано более 1 000 записей. Вы уверены?')) { return false; }"
        <?php } ?>

    </a></div>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="dataTable">
    <tr>
        <th class="nw font-small header-date">Дата</th>
        <th class="nw font-small header-event">Событие</th>
        <th class="nw font-small header-check-position">Позиции в чеке</th>
        <th class="nw font-small header-check-status">Статус чека</th>
        <th class="nw font-small header-check-type">Тип чека</th>
        <th class="nw font-small header-check-action"></th>
    </tr>

</table>

<?= LinkPager::widget([
    'pagination' => $dataProvider->getPagination(),
]) ?>

