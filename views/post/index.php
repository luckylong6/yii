<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>Countries</h1>
<ul>
    <?php foreach ($model as $country) : ?>
        <li>
            <?= Html::encode("{$country->name} ({$country->code})") ?>: <?= $country->population ?>
        </li>
    <?php endforeach; ?>
    <ul>
        <li>
            <?= Html::encode("{$name}") ?>
        </li>
        <li>
            <?= $country ?>
        </li>
    </ul>
</ul>