<?php

$perfil = Yii::app()->user->perfil;
$indicador=$this->traerIndicador($ind);
$mostrar_config=$this->mostrarConfiguracion($perfil,1,2,3,4);
$mostrar_datos=$this->mostrarDatos($perfil,1,2,3,4);
$mostrar_excel=$this->mostrarExcel($perfil,1,2,3,4);
$mostrar_eliminar=$this->mostrarExcel($perfil,1,2,3,4);
$mostrar_periodo=$this->mostrarNuevoPeriodo($perfil,1,2,3);



?>

<div class="page-header">
  <h2><?=$indicador?></h2>
</div>
<?php

 if($mostrar_periodo){
  ?>
<a href="<?php echo CController::createUrl('historicoPeriodos/create/'.$ind.''); ?>" class=" agregar btn btn-success pull-left"><i class="glyphicon glyphicon-plus"></i> Agregar</a>


<?php
}


        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<h3>Periodos del Indicador</h3>',
        ));
        
?>

<div class="row">
<div class="col-md-4"><b>Periodo</b></div>
<div class="col-md-2"><b>Estado</b></div>
<div class="col-md-6"><b>Acciones</b></div>
</div>

 <?php 
$contador =1;
 foreach ($model as $item) {

   $estado=$this->estado($item->id); 

  ?>

<div class="row">
<div class="col-md-4"><?php echo $contador?>.-<?php echo $item->nombre?></div>
<div class="col-md-2"> <?php
               echo "<b>$estado</b>";
               //echo "<b>$estado $item->id</b>";
            ?></div>
<div class="col-md-6">
  
  <?php                                                   
  echo CHtml::link(' Previo ', array('historicoPeriodos/main/'.$item->id.''),array('class'=>'btn btn-success btn-sm'));
  ?>
&nbsp;
  <?php   

  $sql = "SELECT grafico_int from menus  where id=$ind";  
  $indicador = Yii::app()->db->createCommand($sql)->queryRow();
  if($indicador['grafico_int']==1){

    echo CHtml::link(' Previo  grafico ', array('historicoPeriodos/main?id='.$item->id.'&graf_int=1'),array('class'=>'btn btn-success btn-sm'));
  }
  ?>
&nbsp;
  <?php
  if($item->autorizado!=1 and $mostrar_config){
  echo CHtml::link(' Configuracion ', array('historicoPeriodos/update/'.$item->id.''),array('class'=>'btn btn-info btn-sm'));
}
  ?>
  &nbsp; 
   <?php                                                   
  if($item->autorizado!=1 and $item->validado!=1 and $mostrar_datos){

   
    

    if($modelo=='ap3Ind11' or $modelo=='ap3Ind2' or $modelo=='ap4Ind12' or $modelo=='ap8Ind21'){
      echo CHtml::link('Datos Tabla 1',array($modelo.'/admin/'.$item->id),array('class'=>'btn btn-danger btn-sm'));
      echo CHtml::link('Datos Tabla 2',array($modelo.'a/admin/'.$item->id),array('class'=>'btn btn-danger btn-sm'));
    }else{
      echo CHtml::link('Datos',array($modelo.'/admin/'.$item->id),array('class'=>'btn btn-danger btn-sm'));

      if($modelo=='ap1Ind61'){
        echo CHtml::link('Datos gráfico',array('ap1Ind61g/admin/'.$item->id),array('class'=>'btn btn-danger btn-sm'));
      }
    }
  }

  //esto aplica solo en caso de que el ind tenga mas de un modelo de datos, todos tiene un sufijo "a"
  


    ?>
&nbsp;
<?php 
    if($item->autorizado!=1 and $item->validado!=1 and $mostrar_excel){
   echo CHtml::link('Subir Excel ',array('historicoPeriodos/excel/'.$item->id.''),array('class'=>'btn btn-warning btn-sm'));
 }
?>
&nbsp;
 <?php

if($item->autorizado==0 and $item->validado==0){ 

    /* Input dialog with Javascript callback */
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
        'id'=>'mydialog'.$item->id.'',
        'options'=>array(
            'title'=>'Eliminar Periodo!!!!',
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

   echo 'Nota: Se eliminarán los datos de este periodo';
?>
    <a href="<?php echo CController::createUrl('historicoPeriodos/borrar/'.$item->id); ?>" class="btn btn-danger pull-right"><i class="icon-plus icon-white"></i>Aceptar</a>
<?php
    $this->endWidget('zii.widgets.jui.CJuiDialog');



    echo CHtml::link('Eliminar', '#', array(
            'onclick'=>'$("#mydialog'.$item->id.'").dialog("open"); return false;',
            'class'=>'btn btn-danger btn-sm',
           // 'style'=>'padding: 0px;',

    ));

}
?>

  <?php 

 /* if($item->autorizado==0 and $item->validado==0){                                                  
   echo CHtml::link(
    'Eliminar',
     array('historicoPeriodos/borrar/'.$item->id),
     array('class'=>'btn btn-danger btn-sm','confirm' => 'Estas seguro de Eliminar?')
);
 
}*/
  ?>
&nbsp;
</div>
</div>

<?php
$contador++;
}

?>





 <?php 


 $this->endWidget();



?>

