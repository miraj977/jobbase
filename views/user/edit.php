<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Edit Category';
/* @var $this yii\web\View */
/* @var $model app\models\Job */
/* @var $form ActiveForm */
?>
<div class="job-edit col-md-7">
    <h2 class="page-header"> Edit User</h2>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($user); ?>
    <?= $form->field($user, 'full_name')->textInput(['value' => $user->full_name]) ?>
    <?= $form->field($user, 'username')->textInput(['value' => $user->username]) ?>
    <?= $form->field($user, 'email')->textInput(['value' => $user->email]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Cancel', ['/user/index'], ['class' => 'btn btn-secondary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>