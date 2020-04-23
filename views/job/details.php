<?php $this->title = 'Job Details'; ?>

<a href="<?= Yii::$app->homeUrl; ?>job/index" class="pull-right">Back to Jobs</a>

<h2 class="page-header">
    <?= $job->title; ?>
    <small>in <?= $job->city . ', ' . $job->state; ?></small>
    <?php if ((isset(Yii::$app->user->identity->id)) && ($job->user_id === Yii::$app->user->identity->id || Yii::$app->user->identity->id === 1)) : ?>
        <span class="pull-right">
            <a class="btn btn-default" href="<?= Yii::$app->homeUrl; ?>job/edit?id=<?= $job->id; ?>">Edit</a>
            <a class="btn btn-danger" href="<?= Yii::$app->homeUrl; ?>job/delete?id=<?= $job->id; ?>" onclick="if(confirm(' Are you sure you want to delete this item?')){ return true; }else{ return false; }">Delete</a>
        </span>
    <?php endif; ?>
</h2>

<?php if (!empty($job->description)) : ?>
    <div class="well">
        <h4>Job Description</h4>
        <?= $job->description; ?>
    </div>
<?php endif; ?>

<ul class="list-group">
    <?php
    $date = strtotime($job->create_date);
    $formatted = date("F j, Y", $date); ?>
    <li class="list-group-item">
        <strong>Listing Date: </strong><?= $formatted; ?>
    </li>

    <?php if (!empty($job->category->name)) : ?>
        <li class="list-group-item"><strong>Category: </strong><?= $job->category->name; ?></li>
    <?php endif; ?>

    <?php if (!empty($job->description)) : ?>
        <li class="list-group-item"><strong>Job Description: </strong><?= $job->description; ?></li>
    <?php endif; ?>

    <?php if (!empty($job->requirements)) : ?>
        <li class="list-group-item"><strong>Requirements: </strong><?= $job->requirements; ?></li>
    <?php endif; ?>

    <?php if (!empty($job->type)) : ?>
        <li class="list-group-item"><strong>Job Type: </strong><?= ucfirst($job->type); ?></li>
    <?php endif; ?>

    <?php if (!empty($job->salary_range)) : ?>
        <li class="list-group-item"><strong>Salary Range: </strong><?= $job->salary_range; ?></li>
    <?php endif; ?>

    <?php if (!empty($job->city) && !empty($job->state)) : ?>
        <li class="list-group-item"><strong>City: </strong>
            <?= $job->city . ', ' . $job->state . ' ' . $job->zipcode; ?>
        </li>
    <?php endif; ?>
    <?php if (isset(Yii::$app->user->identity->id)) : ?>
        <?php if (!empty($job->contact_phone)) : ?>
            <li class="list-group-item"><strong>Phone: </strong><?= $job->contact_phone; ?></li>
        <?php endif; ?>

        <?php if (!empty($job->contact_email)) : ?>
            <li class="list-group-item"><strong>Email: </strong><?= $job->contact_email; ?></li>
        <?php endif; ?>
    <?php endif; ?>

    <?php if (isset(Yii::$app->user->identity->id)) : ?>
        <li class="list-group-item"><strong>Published: <?= ($job->is_published == 1) ? 'Yes' : 'No'; ?></strong></li>
    <?php endif; ?>
</ul>
<div class="text-center">
    <?php if (isset(Yii::$app->user->identity->id) && ($job->user_id != Yii::$app->user->identity->id)) : ?>
        <a href="mailto:<?= $job->contact_email; ?>?subject=Job Application" class="btn btn-primary ">Contact Employer</a>
    <?php elseif (isset(Yii::$app->user->identity->id) && ($job->user_id == Yii::$app->user->identity->id)) : ?>
        <div class="well">
            <center>
                <b><i>This job listing is your post.</i></b>
            </center>
        </div> <?php endif; ?> <?php if (!isset(Yii::$app->user->identity->id)) : ?> <a href="<?= Yii::$app->homeUrl ?>site/login" class="btn btn-primary ">Contact Employer</a>
    <?php endif; ?>
</div>