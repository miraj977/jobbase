<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php
        $condition = false;
        if (isset(Yii::$app->user->identity->id) && (Yii::$app->user->identity->id == 1)) :
            $condition = true;
        endif;
        NavBar::begin([
            'brandLabel' => 'Job Base',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-default navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-left'],
            'items' => [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'Jobs', 'url' => ['/job/index']],
                ['label' => 'Categories', 'url' => ['/category/index']],
                ['label' => 'Contact', 'url' => ['/site/contact']]
            ]

        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-left'],
            'items' => [
                [
                    'label' => 'User', 'url' => ['/user/index'],
                    'visible' => $condition,
                ]
            ]

        ]);


        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                Yii::$app->user->isGuest ? (['label' => 'Register', 'url' => ['/user/register']]) : (''),
                Yii::$app->user->isGuest ? (['label' => 'Login', 'url' => ['/site/login']]) : ('<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Logout (' . ucfirst(Yii::$app->user->identity->username) . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>')

            ]
        ]);
        NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Job Base <?= date('Y') ?></p>

            <!-- <p class="pull-right"><?= Yii::powered() ?></p> -->
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>