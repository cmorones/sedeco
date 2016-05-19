<?php
//AQUI AGREGO LA CONFIGURACION SEGÚN SEA EL CASO
$config=HistoricoPeriodos::model()->periodo($id);

//aca traigo titulos, notas y fuente
$titulos=HistoricoPeriodos::model()->datosIndicador($id);
//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);
//meses
$m = HistoricoPeriodos::model()->listaSimple($config['config']);
?>

<div class="col-md-12 text-center">
    <h3><?php echo $titulos['titulo1']; ?></h3>
    <p><?php echo $titulos['titulo2']; ?></p>
    <p><?php echo $titulos['titulo3']; ?></p>
</div>
                                        
                                        
<div class="table_explanation">
        <p><?php echo $titulos['nota1']; ?></p>
        <p><?php echo $titulos['nota2']; ?></p>
        <p><?php echo $titulos['nota3']; ?></p>
        <p><?php echo $titulos['fuente']; ?></p>
</div>
