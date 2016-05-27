<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model richkay\geesgii\models\DevRecord */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dev-record-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tabel_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_class')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'class_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ns')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'has_realation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_dev_project')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
