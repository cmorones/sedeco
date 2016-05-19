<div class="row-fluid">
  <div class="span6">
<div class="page-header">
  <h2>Administracion<small> -Permisos por Perfil</small></h2>
</div>



<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			//'title'=>'Produccion > historico de Periodos',
		));
		
?>

<table class="table table-striped table-hover table-bordered table-condensed">
      
      <thead>
        <tr>
          
           <th colspan="1"><div align="center">Perfil</div></th>
           <th colspan="1"><div align="center">Privilegios</div></th>
        </tr>

          
      </thead>
      <tbody>
        <?php foreach ($model as $registro) { ?>
        <tr>
        <td><?php echo $registro['nombre']?></td>
           
           <td>
           	<?php
				  $this->widget('zii.widgets.jui.CJuiButton', array(
				  	    'buttonType'=>'link',
						'name'=>'permisos'.$registro['id'].'',
						'caption'=>'permisos',
						'value'=>'permisos',
						'htmlOptions'=>array('class'=>'btn btn-primary','style'=>'padding: 0px;'),


						'url' => array('permisos/permisos/'.$registro['id'].''),
						//'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
				  ));
			?>
           </td>
             

        </tr>

        <?php } ?>
        
      </tbody>
    </table>


  
    <?php $this->endWidget();?></div></div>