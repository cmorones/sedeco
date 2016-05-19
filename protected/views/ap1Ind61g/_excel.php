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