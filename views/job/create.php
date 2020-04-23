<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Category;

$this->title = 'Create Job';
/* @var $this yii\web\View */
/* @var $model app\models\Job */
/* @var $form ActiveForm */
?>
<div class="job-create col-md-7">
    <h2 class="page-header"> Create Job</h2>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($job); ?>
    <?= $form->field($job, 'category_id')->label('Category Name')
        ->dropDownList(Category::find()
            ->select(['name', 'id'])
            ->indexBy('id')
            ->column(), ['prompt' => 'Select Category']) ?>
    <?= $form->field($job, 'user_id')->hiddenInput(['readonly' => true, 'value' => Yii::$app->user->identity->id])->label(false) ?>
    <?= $form->field($job, 'title')->label('Job Title') ?>
    <?= $form->field($job, 'description')->textArea(['rows' => 6]) ?>
    <?= $form->field($job, 'type')
        ->dropDownList(
            [
                'Full-time' => 'Full-time',
                'part-time' => 'Part-time',
                'contract' => 'Contract',
                'casual' => 'Casual'
            ],
            ['prompt' => 'Select Type']

        ) ?>
    <?= $form->field($job, 'requirements')->textArea(['rows' => 6]) ?>
    <?= $form->field($job, 'salary_range')
        ->dropDownList(

            [
                'Under $50k' => 'Under $50k',
                '$50k-$70k' => '$50k-$70k',
                '$70k-$90k' => '$70k-$90k',
                '$90k-$110k' => '$90k-$110k'
            ],
            ['prompt' => 'Select Salary Range']
        ) ?>
    <?= $form->field($job, 'city') ?>
    <?= $form->field($job, 'state') ?>
    <?= $form->field($job, 'zipcode') ?>
    <?= $form->field($job, 'contact_phone') ?>
    <?= $form->field($job, 'contact_email') ?>
    <?= $form->field($job, 'is_published')->radioList(
        array('1' => 'Yes ', '0' => 'No'),
        array('separator' => " | ")
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'style' => 'width:25%;']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- job-create -->