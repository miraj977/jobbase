<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Create Category';
/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form ActiveForm */
?>
<div class="category-create">
    <h2 class="page-header">Add Category</h2>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($category, 'name') ?>
    <?= $form->field($category, 'summary')->textArea(['rows' => 6]) ?>
    <?= $form->field($category, 'user_id')->hiddenInput(['value' => Yii::$app->user->identity->id])->label(false) ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'style' => 'width:25%;']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- category-create -->