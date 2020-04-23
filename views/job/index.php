<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Job Listing';
?>

<h2 class='page-header'>Job Listing
    <a class="btn btn-primary pull-right" href="<?php if (isset(Yii::$app->user->identity)) { ?>
        <?= Yii::$app->homeUrl; ?>job/create
    <?php } else { ?>
        <?= Yii::$app->homeUrl; ?>site/login
    <?php } ?>">Create Job</a>
</h2>

<?php if (Yii::$app->session->getFlash('success') !== null) : ?>
    <!-- <div class="alert alert-success">
        <?php //Yii::$app->session->getFlash('success'); 
        ?>
    </div> -->
<?php endif ?>

<?php if (!empty($jobs)) :
?>
    <ul class="list-group">
        <?php foreach ($jobs as $job) :
            if ($job->is_published == 1) :
                $date = strtotime($job->create_date);
                $formatted = date("F j, Y", $date);
        ?>
                <li class="list-group-item">
                    <a href="<?= Yii::$app->homeUrl; ?>job/details?id=<?= $job->id; ?>">
                        <?= $job->title; ?>
                    </a> - <strong><?php echo $job->city . ' , ' . $job->state; ?> </strong>- Listed on <?= $formatted; ?>
                </li>
        <?php endif;
            if ($job->is_published == 0) :
                $unpublished = '';
                $unpublished = true;
            endif;
        endforeach; ?>
    </ul>
    <?php if (isset($unpublished) && $unpublished = true) : ?>
        <a class="btn btn-danger pull-left" href="<?= Yii::$app->homeUrl; ?>job/unpublished">Unpublished Jobs</a>
<?php endif;
endif; ?>

<?= LinkPager::widget(['pagination' => $pagination]);
