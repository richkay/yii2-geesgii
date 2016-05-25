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
							echo '<strong>Table Target</strong>';
							echo '</div>';
							echo '<div class="col-lg-4 col-md-4 form-group">';
							echo '<strong>Model Class</strong>';
							echo '</div>';
							echo '<div class="col-lg-2 col-md-2 form-group">';
							echo '<strong>Target Value</strong>';
							echo '</div>';
							echo '<div class="col-lg-1 col-md-1 form-group">';
							echo '<strong>Use?</strong>';
							echo '</div>';
							$relations = $generator->generateRelations();
							$tableName=$generator->tableName;
							if (isset($relations[$tableName])) {
								//echo 'Have Relation';
								$dataFK=$generator->generateFkname($tableName);
								//var_dump($dataFK);
								
								$i=0;
								foreach($dataFK as $FK){
									//echo $FK.'<br/>';
									//var_dump($FK['targetname']);
									echo '<div class="col-lg-2 col-md-2  form-group sticky">';
									echo $form->field($generator, 'fkname[fk]['.$i.']')->textInput(['placeholder'=>'fk','value'=>$FK['fkname']])->label(false);
									echo '</div>';
									echo '<div class="col-lg-3 col-md-3 form-group">';
									echo $form->field($generator, 'fkname[targettable]['.$i.']')->textInput(['value'=>$FK['tablename'],'placeholder'=>'target table'])->label(false);
									echo '</div>';
									echo '<div class="col-lg-4 col-md-4 form-group">';
									echo $form->field($generator, 'fkname[modelclass]['.$i.']')->textInput(['value'=>$FK['classname'],'placeholder'=>'model class'])->label(false);
									echo '</div>';
									echo '<div class="col-lg-2 col-md-2 form-group">';
									echo $form->field($generator, 'fkname[targetname]['.$i.']')->dropDownList($FK['targetname'])->label(false);
									echo '</div>';
									echo '<div class="col-lg-1 col-md-1 form-group">';
									echo $form->field($generator, 'fkname[isused]['.$i.']')->checkbox(['label' => null]);
									echo '</div>';
									$i++;
								}
							}else{
								echo 'NONE - Relation';
							}
					?>
					</div>
				</div>
				<br/><br/>
				<?php } ?>
                <div class="form-group">
                    <?= Html::submitButton('Preview', ['name' => 'preview', 'class' => 'btn btn-primary']) ?>

                    <?php if (isset($files)): ?>
                        <?= Html::submitButton('Generate', ['name' => 'generate', 'class' => 'btn btn-success']) ?>
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
