
<?php
/* @var $this HistoricoPeriodosController */
/* @var $model HistoricoPeriodos */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'historico-periodos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('class' => 'form-horizontal'),
)); ?>

	
	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'id_ind', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'id_ind',array('maxlength'=>200, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'id_ind'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'Nombre del Periodo', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'nombre', array('maxlength'=>200, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>

	<!-- INICIO parametros del indicador -->
	<hr/>
	<div class="row"> 	
		<h3>Parametros del Indicador</h3>
		<h4>Seleccionar Año</h4>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label" for="HistoricoPeriodos_anios_ini">Año:</label>
		<div class="col-sm-10">
			<?php
			    echo $form->dropDownList(
			        $model, 
			        'anios_ini', 
			        CHtml::listData( CatAnios::model()->findAll(array('order'=>'id DESC')),'nombre','nombre' ), 
			        [
			            'class' => 'my-drop-down',
			            'options' => [
			                '2' => [ 'selected' => 'selected' ]
			            ]
			        ]);
			?>
		</div>
	</div>

	<div class="row"> 	
		<h4>Trimestres para mostrar en este indicador</h4>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label" for="HistoricoPeriodos_config">Trimestres:</label>
		<div class="col-sm-10">
			<?php
				echo $form->checkBoxList(
				$model, 
				'config', 
				CHtml::listData( CatTrimestres::model()->findAll(),'id','nombre' ),array(
					'separator' => '',
					'class'=>'checkBoxClass',
				)
				);
			?>
			<?php echo $form->error($model,'config'); ?>
		</div>
	</div>
	<hr/>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="HistoricoPeriodos_anios_fin">Gráfico como imagen</label>
		<div class="col-sm-10">
		<?php echo $form->checkBox($model,'imagen', array('class'=>'image_ind')); ?>
		<?php echo $form->hiddenField($model,'filename',array('maxlength'=>200, 'name'=>'HistoricoPeriodos[filename2]')); ?>
		</div>
		<script>
			$(document).ready(function(){
				//codigo para la imagen en lugar de datos
				if($(".image_ind").is(':checked')){
						//si esta seleccionado
						$("#up_image").attr('style','display:block');
				}else{
					//si no esta seleccionado
					$("#up_image").attr('style','display:none');
				}
				
				$(".image_ind").click(function(){
					if($(".image_ind").is(':checked')){
						//si esta seleccionado
						$("#up_image").attr('style','display:block');
					}else{
						//si no esta seleccionado
						$("#up_image").attr('style','display:none');
					}
				});

			});
		</script>
		<div class="col-sm-10" id="up_image" style="display:none">
			<p>Sube una imagen para la gráfica.<p>
			<div class="form-group">
		  		<?php echo $form->labelEx($model,'filename',array('class' => 'col-sm-2 control-label','for'=>"exampleInputFile")); ?>
			   	<div class="col-sm-10">
			  		<?php echo $form->fileField($model,'_archivo'); ?>
				   	<?php echo $form->error($model,'_archivo'); ?>
			   	</div>
  			</div>
		</div>
	</div>
	<!-- FIN parametros del indicador -->

	<hr/>
	<div class="form-group">
		<?php echo $form->labelEx($model,'titulo1', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'titulo1',array('maxlength'=>200, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'titulo1'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'titulo2', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'titulo2',array('maxlength'=>200, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'titulo2'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'titulo3', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'titulo3',array('maxlength'=>200, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'titulo3'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nota1', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php $this->widget('ext.editMe.widgets.ExtEditMe', array(
					'model'=>$model,
					'attribute'=>'nota1',
					'toolbar'=>array(
					array(
					'Bold', 'Italic', 'Underline', 'Strike',
					'Subscript', 'Superscript'
					),
						)
					)); 
			?>
			<?php echo $form->error($model,'nota1'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'fuente', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php $this->widget('ext.editMe.widgets.ExtEditMe', array(
					'model'=>$model,
					'attribute'=>'fuente',
					'toolbar'=>array(
					array(
					'Bold', 'Italic', 'Underline', 'Strike',
					'Subscript', 'Superscript'
					),
						)
					)); 
			?>
			<?php echo $form->error($model,'fuente'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar', array('class' => 'btn btn-success')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>