 <div id="req_res<?=$id_menu?>">
 <?php


$privilegio = Permisos::model()->find("id_menu=:id_menu AND id_perfil=:id_perfil", array(":id_menu" => $id_menu, ":id_perfil" => $id_perfil));
 
  if(!empty($privilegio)){

   ?>

   <?php             
  /*   echo CHtml::ajaxLink(
	'Test request',          // the link body (it will NOT be HTML-encoded.)
	array('privilegios/reqTest01'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
	array(
		'update'=>'#req_res'.$id_menu.''
	)
);*/

echo CHtml::ajaxButton('Deshabilitar',
Yii::app()->createUrl('permisos/reqTest01',array('id_menu'=>$id_menu,'id_perfil'=>$id_perfil)),
array(
'dataType' => 'html',
'type' => 'get',
'confirm' => 'Estas seguro?',
'update' => '#req_res'.$id_menu.'',
'htmlOptions'=>array('class'=>'btn btn-primary','style'=>'padding: 0px;'),

), // ajax
 array(
                                    //coloco la clase que quiero que tenga el boton y listo
                                    'class'=>'btn btn-danger',
                                     "onclick"=>"if (!confirm('Estas seguro?\\r\\nNo se mostrara en el menu de este perfil.')){return}",
                                )
); // script

?>

<?php
/*
//javascript:location.reload()


echo CHtml::ajaxButton('Activar',
Yii::app()->createUrl('permisos/reqTest02',array('id_menu'=>$id_menu,'id_perfil'=>$id_perfil)),
array(
'dataType' => 'html',
'type' => 'get',
'update' => '#req_res'.$id_menu.'',
'htmlOptions'=>array('class'=>'btn btn-primary','style'=>'padding: 0px;'),
) // ajax
); // script		*/

            }
            else 
            {

?>



<?php

/*echo CHtml::ajaxButton('Habilitar',
Yii::app()->createUrl('permisos/reqTest01',array('id_menu'=>$id_menu,'id_perfil'=>$id_perfil)),
array(
'dataType' => 'html',
'type' => 'get',
'update' => '#req_res'.$id_menu.'',
 array(
                                    //coloco la clase que quiero que tenga el boton y listo
                                    'class'=>'btn btn-primary',
                                ),
) // ajax
); // script*/


echo CHtml::ajaxButton('Activar',
Yii::app()->createUrl('permisos/reqTest02',array('id_menu'=>$id_menu,'id_perfil'=>$id_perfil)),
array(
'dataType' => 'html',
'type' => 'get',
'update' => '#req_res'.$id_menu.'',

), // ajax
 // ajax
 array(
                                    //coloco la clase que quiero que tenga el boton y listo
                                    'class'=>'btn btn-success',
                                    "onclick"=>"if (!confirm('Permitir Acceso?\\r\\nEsta opcion aparecera en el menu principal.')){return}",
                                )
); // script

            }


?>

</div>


