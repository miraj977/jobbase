<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'User Listing';
?>

<h2 class='page-header'>Users</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">S.N.</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col">Type</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        foreach ($users as $user) : ?>
            <tr>
                <th scope="row"><?= $count; ?></th>
                <td><?php if ($user->id == 1) : ?>
                        <?= $user->full_name; ?></span>
                    <?php elseif ($user->id != 1) : ?>
                    <?= $user->full_name;
                    endif; ?></td>
                <td><?= $user->username; ?></td>
                <td><?php if ($user->id == 1) : ?>
                        <strong>Admin</strong></span>
                    <?php elseif ($user->id != 1) : ?>
                    <?php echo "User";
                    endif; ?></td>
                <td><?= $user->email ?></td>
                <td><span>
                        <a class="btn btn-xs btn-primary" href="<?= Yii::$app->homeUrl; ?>user/edit?id=<?= $user->id; ?>">Edit</a>
                        <?php if ($user->id != 1) : ?>
                            <a class="btn btn-xs btn-danger" href="<?= Yii::$app->homeUrl; ?>user/delete?id=<?= $user->id; ?>" onclick="if(confirm(' Are you sure you want to delete this item?')){ return true; }else{ return false; }">Delete</a>
                        <?php endif; ?>
                    </span></td>
            </tr>
        <?php $count++;
        endforeach; ?>
    </tbody>
</table>

<?= LinkPager::widget(['pagination' => $pagination]);
