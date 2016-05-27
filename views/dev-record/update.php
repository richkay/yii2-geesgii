<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model richkay\geesgii\models\DevRecord */

$this->title = 'Update Dev Record: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dev Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dev-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
