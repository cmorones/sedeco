<?php

$perfil = Yii::app()->user->perfil;
$indicador=$this->traerIndicador($ind);



$hayautorizados = $this->hayautorizados($ind);
$isValido = $this->isValido($id_p);
//autorizar
$mostrar_autorizar=$this->mostrarAutorizar($perfil,1,2,5);

//validar
$mostrar_validar=$this->mostrarValidar($perfil,1,2,4);
$isAutorizado =$this->autorizado($id_p);

//echo $hayautorizados;

?>

<div class="row-fluid  botonera-autorizar">
<div class="span4">
<a href="<?php echo CController::createUrl('historicoPeriodos/'.$ind); ?>" class="btn btn-info pull-left"><i class="icon-repeat icon-white"></i>Regresar</a>



 <?php

if(!$hayautorizados and $isValido and $mostrar_autorizar){

    /* Input dialog with Javascript callback */
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
        'id'=>'mydialog1',
        'options'=>array(
            'title'=>'Autorizar Indicador',
            'autoOpen'=>false,
            'show'=>array(
                'effect'=>'blind',
                'duration'=>1000,
            ),
        'hide'=>array(
                'effect'=>'explode',
                'duration'=>500,
            ),
            'modal'=>true,
            'buttons'=>array(
               // 'Aceptar'=>'js:addItem',
                'Cancelar'=>'js:function(){ $(this).dialog("close");}',
            ),
        ),
    ));

   echo 'Se mostrara en el micrositio???';
?>
    <a href="<?php echo CController::createUrl('historicoPeriodos/aceptar/'.$id_p); ?>" class="btn btn-success pull-right"><i class="icon-plus icon-white"></i>Aceptar</a>
<?php
    $this->endWidget('zii.widgets.jui.CJuiDialog');

    echo CHtml::link('Autorizar', '#', array(
            'onclick'=>'$("#mydialog1").dialog("open"); return false;',
            'class'=>'btn btn-info pull-left',
         //   'style'=>'padding: 0px;',

    ));

}
?>

 <?php

if($hayautorizados and $isValido and $isAutorizado and $mostrar_autorizar){

    /* Input dialog with Javascript callback */
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
        'id'=>'mydialog2',
        'options'=>array(
            'title'=>'Desautorizar Indicador',
            'autoOpen'=>false,
            'show'=>array(
                'effect'=>'blind',
                'duration'=>1000,
            ),
        'hide'=>array(
                'effect'=>'explode',
                'duration'=>500,
            ),
            'modal'=>true,
            'buttons'=>array(
               // 'Aceptar'=>'js:addItem',
                'Cancelar'=>'js:function(){ $(this).dialog("close");}',
            ),
        ),
    ));

   echo 'No se  mostrara en el micrositio???';
?>
    <a href="<?php echo CController::createUrl('historicoPeriodos/desAceptar/'.$id_p); ?>" class="btn btn-danger pull-right"><i class="icon-minus icon-white"></i>Aceptar</a>
<?php
    $this->endWidget('zii.widgets.jui.CJuiDialog');

    echo CHtml::link('Desautorizar', '#', array(
            'onclick'=>'$("#mydialog2").dialog("open"); return false;',
            'class'=>'btn btn-danger pull-left',
          //  'style'=>'padding: 0px;',

    ));

}
?>

 <?php

if(!$hayautorizados and $isValido and (!$isAutorizado) and $mostrar_validar){

    /* Input dialog with Javascript callback */
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
        'id'=>'mydialog3',
        'options'=>array(
            'title'=>'Desvalidar Indicador',
            'autoOpen'=>false,
            'show'=>array(
                'effect'=>'blind',
                'duration'=>1000,
            ),
        'hide'=>array(
                'effect'=>'explode',
                'duration'=>500,
            ),
            'modal'=>true,
            'buttons'=>array(
               // 'Aceptar'=>'js:addItem',
                'Cancelar'=>'js:function(){ $(this).dialog("close");}',
            ),
        ),
    ));

   echo 'No se  mostrara en el micrositio???';
?>
    <a href="<?php echo CController::createUrl('historicoPeriodos/desValidar/'.$id_p); ?>" class="btn btn-warning pull-right"><i class="icon-minus icon-white"></i>Aceptar</a>
<?php
    $this->endWidget('zii.widgets.jui.CJuiDialog');

    echo CHtml::link('Desvalidar', '#', array(
            'onclick'=>'$("#mydialog3").dialog("open"); return false;',
            'class'=>'btn btn-danger pull-left',
            //'style'=>'padding: 0px;',

    ));

}

?>


 <?php

if($hayautorizados and $isValido and (!$isAutorizado) and $mostrar_validar){

    /* Input dialog with Javascript callback */
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
        'id'=>'mydialog5',
        'options'=>array(
            'title'=>'Desvalidar Indicador',
            'autoOpen'=>false,
            'show'=>array(
                'effect'=>'blind',
                'duration'=>1000,
            ),
        'hide'=>array(
                'effect'=>'explode',
                'duration'=>500,
            ),
            'modal'=>true,
            'buttons'=>array(
               // 'Aceptar'=>'js:addItem',
                'Cancelar'=>'js:function(){ $(this).dialog("close");}',
            ),
        ),
    ));

   echo 'No se  mostrara en el micrositio???';
?>
    <a href="<?php echo CController::createUrl('historicoPeriodos/desValidar/'.$id_p); ?>" class="btn btn-warning pull-right"><i class="icon-minus icon-white"></i>Aceptar</a>
<?php
    $this->endWidget('zii.widgets.jui.CJuiDialog');

    echo CHtml::link('Desvalidar', '#', array(
            'onclick'=>'$("#mydialog5").dialog("open"); return false;',
            'class'=>'btn btn-danger pull-left',
            //'style'=>'padding: 0px;',

    ));

}

?>
 <?php

if(!$isValido and !$isAutorizado and $mostrar_validar){

    /* Input dialog with Javascript callback */
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
        'id'=>'mydialog4',
        'options'=>array(
            'title'=>'Validar Indicador',
            'autoOpen'=>false,
            'show'=>array(
                'effect'=>'blind',
                'duration'=>1000,
            ),
        'hide'=>array(
                'effect'=>'explode',
                'duration'=>500,
            ),
            'modal'=>true,
            'buttons'=>array(
               // 'Aceptar'=>'js:addItem',
                'Cancelar'=>'js:function(){ $(this).dialog("close");}',
            ),
        ),
    ));

   echo 'Es necesario validar para poder autorizar';
?>
    <a href="<?php echo CController::createUrl('historicoPeriodos/validar/'.$id_p); ?>" class="btn btn-info pull-right"><i class="icon-plus icon-white"></i>Aceptar</a>
<?php
    $this->endWidget('zii.widgets.jui.CJuiDialog');



    echo CHtml::link('Validar', '#', array(
            'onclick'=>'$("#mydialog4").dialog("open"); return false;',
            'class'=>'btn btn-success pull-left',
           // 'style'=>'padding: 0px;',

    ));

}
?>
<div class="span8">
</div>
</div>
</div>

