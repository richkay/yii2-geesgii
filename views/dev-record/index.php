<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel richkay\geesgii\models\DevRecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dev Records';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dev-record-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Dev Record', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tabel_name',
            'type_class',
            'class_name',
            'ns',
            // 'has_realation',
            // 'id_dev_project',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
