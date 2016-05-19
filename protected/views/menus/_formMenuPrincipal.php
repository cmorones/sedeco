<div class="row-fluid">
    <div class="col-md-12">
        <div class="form">
            <?php
            $perfil = Yii::app()->user->perfil;
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'menus-form',
                    /* 'enableClientValidation' => true,
                      'clientOptions' => array(
                      'validateOnSubmit' => true,
                      ), */
                    ));
            ?>
            <h3 id="myModalLabel">Modificar Menú Principal</h3>
            Campos con <span class="required">*</span> son obligatorios.
            <?php echo $form->errorSummary($model); ?>
            <table class="table table-condensed table-striped">

                <tr>
                    <td><?php echo $form->labelEx($model, 'label'); ?></td>
                    <td><?php echo $form->textField($model, 'label'); ?></td>
                    <td><?php echo $form->error($model, 'label'); ?></td>
                </tr>

                <?php if($perfil==1){
                    ?>
                <tr>
                    <td><?php echo $form->labelEx($model, 'link'); ?></td>
                    <td><?php echo $form->textField($model, 'link'); ?></td>
                    <td><?php echo $form->error($model, 'link'); ?></td>
                </tr>

                <tr>
                    <td><?php echo $form->labelEx($model, 'position'); ?></td>
                    <td><?php echo $form->textField($model, 'position'); ?></td>
                    <td><?php echo $form->error($model, 'position'); ?></td>
                </tr>

                <?php 
                    }
                    ?>
			        
            </table>

            <?php
            if (!$model->isNewRecord) {
                //echo CHtml::ajaxSubmitButton('Borrar', CController::createUrl('/menus/borrarMenu', array('id' => $model->id)), array('update' => '#contenido_menus'), array('class' => "btn", 'id' => 'B' . time()));
            }
            ?>
            <?php echo CHtml::ajaxSubmitButton('Guardar', '', array('update' => '#contenido_menus'), array('class' => "btn btn-success", 'id' => 'G' . time())); ?>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
<hr />
<?php if (!$model->isNewRecord) { ?>
    <div class="row-fluid">
        <div class="span12">
            <?php echo CHtml::ajaxLink('<i class="icon-refresh"></i>', CController::createUrl('/menus/actualizarMenu', array("nivel"=>1, 'parent_id'=>$model->id)), array('update' => '#menu_1'), array("id" => "R1" . time())); ?>
            <ul class="nav nav-tabs nav-stacked" id="menu_1" name="menu_1">
                <?php $menus_nivel1 = Menus::model()->findAll('nivel=1 AND parent_id= ' . $model->id . ' ORDER BY id'); ?>
                <?php echo $this->renderPartial('_Menu1', array('menus_nivel1'=>$menus_nivel1, 'parent_id'=>$model->id), false, false); ?>
            </ul>

    <div class="row-fluid">
        <div class="span12" id="contenido_menus_1">
    <?php //$model=new Menus; echo $this->renderPartial('_formMenuPrincipal', array('model'=>$model));  ?>
   
    </div>
<?php } ?>
