<div class="row-fluid">
    <div class="span12">
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
            <h3 id="myModalLabel">Modificar Menú</h3>
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
                //echo CHtml::ajaxSubmitButton('Borrar', CController::createUrl('/menus/borrarMenu', array('id' => $model->id)), array('update' => '#contenido_menus_4'), array('class' => "btn", 'id' => 'B4' . time()));
            }
            ?>
            <?php echo CHtml::ajaxSubmitButton('Guardar', '', array('update' => '#contenido_menus_4'), array('class' => "btn btn-success", 'id' => 'G4' . time())); ?>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
<hr />
<?php /*if (!$model->isNewRecord) { ?>
    <div class="row-fluid">
        <div class="span12">
            <?php echo CHtml::ajaxLink('<i class="icon-refresh"></i>', CController::createUrl('/menus/actualizarMenu', array("nivel"=>4, 'id_parent'=>$model->id_menu)), array('update' => '#menu_4'), array("id" => "R4" . time())); ?>
            <ul class="nav nav-tabs nav-stacked" id="menu_4" name="menu_4">
                <?php $menus_nivel4 = Menus::model()->findAll('nivel=4 AND id_parent= ' . $model->id_menu . ' ORDER BY id_menu'); ?>
                <?php echo $this->renderPartial('_Menu4', array('menus_nivel4'=>$menus_nivel4, 'id_parent'=>$model->id_menu), false, false); ?>
            </ul>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12" id="contenido_menus_4">
    <?php //$model=new Menus; echo $this->renderPartial('_formMenuPrincipal', array('model'=>$model));  ?>
        </div>
    </div>
<?php }*/ ?>