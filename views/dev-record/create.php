<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model richkay\geesgii\models\DevRecord */

$this->title = 'Create Dev Record';
$this->params['breadcrumbs'][] = ['label' => 'Dev Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dev-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
