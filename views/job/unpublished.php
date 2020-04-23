<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Unpublished Jobs';
?>

<h2 class='page-header'>Unpublished Jobs
    <a class="btn btn-default pull-right" href="<?= Yii::$app->homeUrl; ?>job/index">Back to Jobs</a>
</h2>

<?php if (!empty($jobs)) :
?>
    <ul class="list-group">
        <?php foreach ($jobs as $job) :
            $date = strtotime($job->create_date);
            $formatted = date("F j, Y", $date); ?>
            <li class="list-group-item">
                <a href="<?= Yii::$app->homeUrl; ?>job/details?id=<?= $job->id; ?>">
                    <?= $job->title; ?>
                </a> - <strong><?php echo $job->city . ' , ' . $job->state; ?> </strong>- Listed on <?= $formatted; ?>
                <a class="btn btn-xs btn-primary pull-right" href="<?= Yii::$app->homeUrl; ?>job/edit?id=<?= $job->id; ?>">Publish</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?= LinkPager::widget(['pagination' => $pagination]);
