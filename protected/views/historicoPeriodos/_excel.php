<div class="row-fluid  botonera-autorizar">
	<div class="span4">
        <?php
        			error_reporting(0);
				 
				  $this->widget('zii.widgets.jui.CJuiButton', array(
				  	    'buttonType'=>'link',
						'name'=>'Regresar',
						'caption'=>'Regresar',
						'value'=>'Regresar',
						'htmlOptions'=>array('class'=>'btn btn-info pull-left','style'=>'padding: 0px;'),


						'url' => array('historicoPeriodos/'.$ind.''),
						//'onclick'=>new CJavaScriptExpression('function(){alert("Al autorizar se publicara en la pagina web"); this.blur(); return false;}'),
				  ));
				
			?>

	</div>
</div>

<?php

//esto llama la vista del excel y le pasa el id del periodo que vas a editar
echo $this->renderPartial("//upexcel/_excel",array('id_periodo' => $id),true);

?>

<script>
$(document).ready(function(){
    
    $('#excel_send').click(function(){
        
        
            alert('Sea paciente, no cierre la ventana, en la pantalla aparecera un mensaje cuando el proceso termine.');

       
    });
    
});

</script>