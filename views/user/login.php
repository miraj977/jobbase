<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login Page';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login text-center">
    <h1><?= Html::encode($this->title) ?></h1><br><br>

    <p>Please fill out the following fields to login:</p><br>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-6 col-offset-6 centered\">{input}</div>\n<div class=\"col-lg-5\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-3 control-label'],
        ],
        'options' => [
            'style' => ''
        ],
    ]); ?>
    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'rememberMe')->checkbox([
        'template' => "<div class=\"col-lg-offset-1 col-lg-6\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ]) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-10">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button', 'style' => 'width:25%']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>