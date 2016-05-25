<?php

use richkay\geesgii\generators\model\Generator;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $generator richkay\geesgii\generators\model\Generator */
?>
<div class="row">
 <div class="col-md-12">
	<div class="col-md-6">
	<?php 
		echo $form->field($generator, 'ns');
		echo $form->field($generator, 'tableName')->textInput(['table_prefix' => $generator->getTablePrefix()]);
		echo $form->field($generator, 'modelClass');
		echo $form->field($generator, 'generateRelations')->dropDownList([
			Generator::RELATIONS_NONE => 'No relations',
			Generator::RELATIONS_ALL => 'All relations',
			Generator::RELATIONS_ALL_INVERSE => 'All relations with inverse',
		]);
		echo $form->field($generator, 'generateQuery')->checkbox();
		echo $form->field($generator, 'queryNs');
		echo $form->field($generator, 'queryClass');
		echo $form->field($generator, 'queryBaseClass');
	?>
	</div>
	<div class="col-md-6">
	<?php 
		echo $form->field($generator, 'db');
		echo $form->field($generator, 'baseClass');
		echo $form->field($generator, 'useTablePrefix')->checkbox();
		echo $form->field($generator, 'enableI18N')->checkbox();
		echo $form->field($generator, 'generateLabelsFromComments')->checkbox();
		echo $form->field($generator, 'useSchemaName')->checkbox();
		echo $form->field($generator, 'messageCategory');
	?>
	
	</div>
 </div>
</div>