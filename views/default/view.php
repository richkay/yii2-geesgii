<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use richkay\geesgii\components\ActiveField;
use richkay\geesgii\CodeFile;

/* @var $this yii\web\View */
/* @var $generator richkay\geesgii\Generator */
/* @var $id string panel ID */
/* @var $form yii\widgets\ActiveForm */
/* @var $results string */
/* @var $hasError boolean */
/* @var $files CodeFile[] */
/* @var $answers array */

$this->title = $generator->getName();
$templates = [];
foreach ($generator->templates as $name => $path) {
    $templates[$name] = "$name ($path)";
}
?>
<?php

$sss =<<<JS
$(document).on('click', '#generate', function(e){
	var generatorns = $('#generator-ns').val(),
		generatortablename = $('#generator-tablename').val(),
		generatormodelclass = $('#generator-modelclass').val();
		generatorgeneraterelations =$('#generator-generaterelations').val();
	var values = {
            'DevRecord[tabel_name]':generatortablename,
			'DevRecord[ns]':generatorns,
			'DevRecord[class_name]':generatormodelclass,
			'DevRecord[type_class]':'M',
			'DevRecord[has_realation]':generatorgeneraterelations,
			'_csrf': yii.getCsrfToken(),
    };
	var link =baseUrl+'/geesgii/dev-record/save';
	$.ajax({
				type: "POST",
				data: values,
				async: true,
				dataType: 'json',
				enctype: 'multipart/form-data',
				cache: false,
				url:link,
				success: function(data){				
					setTimeout(function(){
						alert(data);
					}, 100);
				},
				error:function (xhr, ajaxOptions, thrownError){
					alert(xhr.status);
					alert(xhr.statusText);
					alert(xhr.responseText);
				}
			});
});

JS;
$this->registerJs($sss, \yii\web\View::POS_END);
?>
<div class="default-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= $generator->getDescription() ?></p>

    <?php $form = ActiveForm::begin([
        'id' => "$id-generator",
        'successCssClass' => '',
        'fieldConfig' => ['class' => ActiveField::className()],
    ]); ?>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <?= $this->renderFile($generator->formView(), [
                    'generator' => $generator,
                    'form' => $form,
                ]) ?>
                <?= $form->field($generator, 'template')->sticky()
                    ->label('Code Template')
                    ->dropDownList($templates)->hint('
                        Please select which set of the templates should be used to generated the code.
                ') ?>
				<?php if ($generator->id=='model') { ?>
				<div class="relation row">
					<div class="col-lg-12 col-md-12">
					<?php
							
							echo '<div class="col-lg-2 col-md-2  form-group sticky">';
							echo '<strong>Fk Name</strong>';
							echo '</div>';
							echo '<div class="col-lg-3 col-md-3 form-group">';
							echo '<strong>Model Class Name</strong>';
							echo '</div>';
							echo '<div class="col-lg-4 col-md-4 form-group">';
							echo '<strong>Model Class Link</strong>';
							echo '</div>';
							echo '<div class="col-lg-2 col-md-2 form-group">';
							echo '<strong>Target Value</strong>';
							echo '</div>';
							echo '<div class="col-lg-1 col-md-1 form-group">';
							echo '<strong>Use?</strong>';
							echo '</div>';
							echo '<div class="previ">Preview to Get Relation Filed</div>';
							$relations = $generator->generateRelations();
							$tableName=$generator->tableName;	
							if (isset($relations[$tableName])) {
								$dataFK=$generator->generateGeesFkname($tableName);
								$i=0;
								foreach($dataFK as $FK){
									echo $form->field($generator, 'fkname[fk]['.$i.'][link]')->hiddenInput(['value'=>$FK['link']])->label(false);
									echo $form->field($generator, 'fkname[fk]['.$i.'][fullname]')->hiddenInput(['value'=>$FK['fullname']])->label(false);
									echo $form->field($generator, 'fkname[fk]['.$i.'][relationName]')->hiddenInput(['value'=>$FK['relationName']])->label(false);
									echo '<div class="col-lg-2 col-md-2  form-group sticky">';
									echo $form->field($generator, 'fkname[fk]['.$i.'][name]')->textInput(['placeholder'=>'fk','value'=>$FK['fkname']])->label(false);
									echo '</div>';
									echo '<div class="col-lg-3 col-md-3 form-group">';
									echo $form->field($generator, 'fkname[fk]['.$i.'][modelclass]')->textInput(['placeholder'=>$FK['classname']])->label(false);
									echo '</div>';
									echo '<div class="col-lg-4 col-md-4 form-group">';
									echo $form->field($generator, 'fkname[fk]['.$i.'][modellink]')->dropDownList($FK['class_ns'])->label(false);
									echo '</div>';
									echo '<div class="col-lg-2 col-md-2 form-group">';
									echo $form->field($generator, 'fkname[fk]['.$i.'][targetname]')->dropDownList($FK['targetname'])->label(false);
									echo '</div>';
									echo '<div class="col-lg-1 col-md-1 form-group">';
									echo $form->field($generator, 'fkname[fk]['.$i.'][isused]')->checkbox(['label' => null]);
									echo '</div>';
									$i++;
								}
							}else{
								echo '';
							}
					?>
					</div>
				</div>
				<br/><br/>
				<?php } ?>
                <div class="form-group">
                    <?= Html::submitButton('Preview', ['name' => 'preview', 'class' => 'btn btn-primary']) ?>

                    <?php if (isset($files)): ?>
                        <?= Html::submitButton('Generate', ['id'=>'generate','name' => 'generate', 'class' => 'btn btn-success']) ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php
        if (isset($results)) {
            echo $this->render('view/results', [
                'generator' => $generator,
                'results' => $results,
                'hasError' => $hasError,
            ]);
        } elseif (isset($files)) {
            echo $this->render('view/files', [
                'id' => $id,
                'generator' => $generator,
                'files' => $files,
                'answers' => $answers,
            ]);
        }
        ?>
    <?php ActiveForm::end(); ?>
</div>













