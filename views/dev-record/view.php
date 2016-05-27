<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model richkay\geesgii\models\DevRecord */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dev Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dev-record-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tabel_name',
            'type_class',
            'class_name',
            'ns',
            'has_realation',
            'id_dev_project',
        ],
    ]) ?>

</div>
