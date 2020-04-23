<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Job Base Homepage';
?>
<div class="site-index">

    <?php if (Yii::$app->session->getFlash('success') !== null) : ?>
        <!-- <div class="alert alert-success">
            <?php //Yii::$app->session->getFlash('success'); 
            ?>
        </div> -->
    <?php endif ?>
    <div class="jumbotron">
        <h2>Need a Job?</h2>

        <p class="lead">Find a job or seek employees!!!</p>

        <p><a class="btn btn-lg btn-success" href="<?= Yii::$app->homeUrl; ?>job/index">Start Browsing</a></p>
        <p><a class="btn btn-lg btn-primary" href="<?= Yii::$app->homeUrl; ?>job/create">Create Listing</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Browse Listings</h2>

                <p>Let's change the way we look at work!!</p>

                <p><a class="btn btn-default" href="<?= Yii::$app->homeUrl ?>job">Find Jobs &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Free to Join</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
            </div>
            <div class="col-lg-4">
                <h2>Find Employees</h2>

                <p>Create opportunities for bright minds out there!!</p>

                <p><a class="btn btn-default" href="<?= Yii::$app->homeUrl ?>job/create">Create Job &raquo;</a></p>
            </div>

        </div>

    </div>
</div>