<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Acceso';
$this->breadcrumbs=array(
	'Acceso',
);
?>
<div class="page-header" align="center">
	<h3> Reporte Económico de la Ciudad de México</h3>
</div>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="row">
            <h3 align="center">Acceso al Sistema</h3>
            <br/>
        </div>
        <div class="well">
                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'login-form',
                    'enableClientValidation'=>true,
                    'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                    ),
                    'htmlOptions' => array('class' => 'form-horizontal'),
                )); ?>
                <label>Campos con <span class="required">*</span> son  requeridos.</label>
                <div class="form-group">
                    <?php echo $form->labelEx($model,'username', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'username'); ?>
                    </div>
                </div>
            
                <div class="form-group">
                    <?php echo $form->labelEx($model,'password', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'password'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <?php echo CHtml::submitButton('Ingresar',array('class'=>'btn btn btn-primary')); ?>
                    </div>
                </div>
                <?php $this->endWidget(); ?>
        </div>
    </div>
    <div class="col-sm-4"></div>
</div>
<br/><br/><br/>
