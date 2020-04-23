<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Category;

$this->title = 'Edit Category';
/* @var $this yii\web\View */
/* @var $model app\models\Job */
/* @var $form ActiveForm */
?>
<div class="job-edit col-md-7">
    <h2 class="page-header"> Edit Category</h2>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($category); ?>
    <?= $form->field($category, 'name')->textInput(['value' => $category->name]) ?>
    <?= $form->field($category, 'summary')->textArea(['value' => $category->summary, 'rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Cancel', ['/category/details?id=' . $category->id], ['class' => 'btn btn-secondary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- job-create -->