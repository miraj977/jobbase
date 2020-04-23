<?php $this->title = 'Category Details'; ?>

<a href="<?= Yii::$app->homeUrl; ?>category/index" class="pull-right">Back to Categories</a>

<h2 class="page-header">
    <?= $category->name; ?>
    <?php if (isset(Yii::$app->user->identity->id) && (1 === Yii::$app->user->identity->id || $category->user_id === Yii::$app->user->identity->id)) : ?>
        <span class="pull-right">
            <a class="btn btn-default" href="<?= Yii::$app->homeUrl; ?>category/edit?id=<?= $category->id; ?>">Edit</a>
            <a class="btn btn-danger" href="<?= Yii::$app->homeUrl; ?>category/delete?id=<?= $category->id; ?>" onclick="if(confirm(' Are you sure you want to delete this item?')){ return true; }else{ return false; }">Delete</a>
        </span>
    <?php endif; ?>
</h2>
<div class="well">
    <?= $category->summary; ?>
</div>