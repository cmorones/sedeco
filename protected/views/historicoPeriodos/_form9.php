
<?php
/* @var $this HistoricoPeriodosController */
/* @var $model HistoricoPeriodos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'historico-periodos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	
	<?php echo $form->errorSummary($model); ?>

<div class="row">
		<?php echo $form->labelEx($model,'id_ind'); ?>
		<?php echo $form->textField($model,'id_ind',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'id_ind'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Nombre del Periodo'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

   
	

	<div class="row">
		<?php echo $form->labelEx($model,'titulo1'); ?>
		<?php $this->widget('ext.editMe.widgets.ExtEditMe', array(
				'model'=>$model,
				'attribute'=>'titulo1',
				'height'=>'100',
				'toolbar'=>array(
				array(
				'Bold', 'Italic', 'Underline', 'Strike',
				'Subscript', 'Superscript'
				),
				array(
		            'Styles', 'Format', 'Font', 'FontSize',
		        ),
				array('NumberedList', 'BulletedList', '-',
				'Outdent', 'Indent', '-',
				'Blockquote', '-',
				'JustifyLeft', 'JustifyCenter', 'JustifyRight',
				)	)
				)); 
		?>
		<?php echo $form->error($model,'titulo1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'titulo2'); ?>
		<?php $this->widget('ext.editMe.widgets.ExtEditMe', array(
				'model'=>$model,
				'attribute'=>'titulo2',
				'height'=>'100',
				'toolbar'=>array(
				array(
				'Bold', 'Italic', 'Underline', 'Strike',
				'Subscript', 'Superscript'
				),
				array(
		            'Styles', 'Format', 'Font', 'FontSize',
		        ),
				array('NumberedList', 'BulletedList', '-',
				'Outdent', 'Indent', '-',
				'Blockquote', '-',
				'JustifyLeft', 'JustifyCenter', 'JustifyRight',
				)	)
				)); 
		?>
		<?php echo $form->error($model,'titulo2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'titulo3'); ?>
		<?php $this->widget('ext.editMe.widgets.ExtEditMe', array(
				'model'=>$model,
				'attribute'=>'titulo3',
				'toolbar'=>array(
				array(
				'Bold', 'Italic', 'Underline', 'Strike',
				'Subscript', 'Superscript'
				),
				array(
		            'Styles', 'Format', 'Font', 'FontSize',
		        ),
				array('NumberedList', 'BulletedList', '-',
				'Outdent', 'Indent', '-',
				'Blockquote', '-',
				'JustifyLeft', 'JustifyCenter', 'JustifyRight',
				)	)
				)); 
		?>
		<?php echo $form->error($model,'titulo3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nota1'); ?>
		<?php $this->widget('ext.editMe.widgets.ExtEditMe', array(
				'model'=>$model,
				'attribute'=>'nota1',
			'toolbar'=>array(
				array(
				'Bold', 'Italic', 'Underline', 'Strike',
				'Subscript', 'Superscript'
				),
				array(
		            'Styles', 'Format', 'Font', 'FontSize',
		        ),
				array('NumberedList', 'BulletedList', '-',
				'Outdent', 'Indent', '-',
				'Blockquote', '-',
				'JustifyLeft', 'JustifyCenter', 'JustifyRight',
				)	)
				)); 
		?>
		<?php echo $form->error($model,'nota1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fuente'); ?>
		<?php $this->widget('ext.editMe.widgets.ExtEditMe', array(
'model'=>$model,
'attribute'=>'fuente',
'height'=>'100',
'toolbar'=>array(
				array(
				'Bold', 'Italic', 'Underline', 'Strike',
				'Subscript', 'Superscript'
				),
				array(
		            'Styles', 'Format', 'Font', 'FontSize',
		        ),
				array('NumberedList', 'BulletedList', '-',
				'Outdent', 'Indent', '-',
				'Blockquote', '-',
				'JustifyLeft', 'JustifyCenter', 'JustifyRight',
				)	)
)); ?>
		
		<?php echo $form->error($model,'fuente'); ?>
	</div>

 <div class="page-header"> 	
  <h2>Parametros del Indicador</small></h2>

	</div>
 

<div class="row">
<b>Rango de Años</b> <bR>


DEL
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

AL

<?php
    echo $form->dropDownList(
        $model, 
        'anios_fin', 
        CHtml::listData( CatAnios::model()->findAll(array('order'=>'id DESC')),'nombre','nombre' ), 
        [
            'class' => 'my-drop-down',
            'options' => [
                '2' => [ 'selected' => 'selected' ]
            ]
        ]);
?>
<hr>
</div>

 

<div class="row">
	<b>Entidades para mostrar en este indicador</b>

		<br>

	<?php
        
        echo $form->checkBoxList(
        $model, 
        'config', 
        CHtml::listData( Relaciones::model()->findAll(array("condition"=>"indicador =  'ap5Ind4'")),'columna','titulo' ),array(
			'separator' => '<br/>',
			'class'=>'checkBoxClass',
                        
		)
        );
?>


		<?php echo $form->error($model,'config'); ?>
		<hr>
	</div>


	
 </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->