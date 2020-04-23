<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Category Listing';
?>

<h2 class='page-header'>Categories
    <a class="btn btn-primary pull-right" href="<?php if (isset(Yii::$app->user->identity)) { ?>
        <?= Yii::$app->homeUrl; ?>category/create
    <?php } else { ?>
        <?= Yii::$app->homeUrl; ?>site/login
    <?php } ?>">Create Category</a>
</h2>

<ul class="list-group">
    <?php foreach ($categories as $category) : ?>
        <li class="list-group-item">
            <a href="<?= Yii::$app->homeUrl; ?>category/details?id=<?= $category->id; ?>">
                <?= $category->name; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]);
