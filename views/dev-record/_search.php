<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model richkay\geesgii\models\DevRecordSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dev-record-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tabel_name') ?>

    <?= $form->field($model, 'type_class') ?>

    <?= $form->field($model, 'class_name') ?>

    <?= $form->field($model, 'ns') ?>

    <?php // echo $form->field($model, 'has_realation') ?>

    <?php // echo $form->field($model, 'id_dev_project') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
