<?php
$baseUrl2 = YiiBase::getPathOfAlias("webroot");

///AQUI AGREGO LA CONFIGURACION SEGÚN SEA EL CASO

$cadena=stripos($_SERVER['REQUEST_URI'], 'historicoPeriodos');
if($cadena<1){
  $sql = "SELECT id from historico_periodos WHERE id_ind=$id AND autorizado=1"; 
  $per = Yii::app()->db->createCommand($sql)->queryRow();
  $periodo=$per['id'];

  $config=HistoricoPeriodos::model()->periodo($id);

  //aca traigo titulos, notas y fuente
  $titulos=HistoricoPeriodos::model()->datosIndicador($id);

}else{

  $config=HistoricoPeriodos::model()->periodo_back($periodo);

  //aca traigo titulos, notas y fuente
  $titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);

}
//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap4Ind4?anios=$a&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);
		
$id2=113;
 ?>
<div class="customContent">
 <div class="row contentRow">
                                <div class="col-md-3">
                                    <h2 class="indicadorTitulo">SALARIOS E INGRESOS</h2>
                                </div>
                                <?php 
              $cadena=stripos($_SERVER['REQUEST_URI'], 'historicoPeriodos');
              

              if($cadena<1){ ?>
                                 <div class="col-md-9">
                                    <nav class="navbar navbar-default indicadoresNav" role="navigation">
                                      <div class="container-fluid">
                                        <!-- Brand and toggle get grouped for better mobile display -->
                                        <div class="navbar-header">
                                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                          </button>
                                          <a class="navbar-brand" href="#">Indicadores</a>
                                        </div>
                                          <!-- Collect the nav links, forms, and other content for toggling -->
                                          <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-2" aria-expanded="false">
                                            <ul class="nav navbar-nav">
                                                <?php
                                                              $resultado = Menus::model()->findAll((array(
                                                                  'condition'=>"parent_id=$id2",
                                                                  'order'=>'position'
                                                                )));
                                                            //  echo CHtml::tag('ul',array('nav'=>'nav nav-pills'));
                                                              foreach ($resultado as $key => $row) {

                                                                                 if($row->id==$id){
                                                        echo CHtml::tag('li',array('role'=>'presentation','class'=>'active'));
                                                                }else{
                                                                  echo CHtml::tag('li',array('role'=>'presentation'));
                                                                  
                                                                }  
                                                                                 
                                                                                  echo CHtml::link($row->label, array('/site/main/'.$row->id));
                                                                                  echo CHtml::closeTag('li');
                                                              }
                                                             // echo CHtml::closeTag('ul');
                                                        ?>
                                            </ul>
                                          </div><!-- /.navbar-collapse -->
                                        </div><!-- /.container-fluid -->
                                      </nav>
              
              
                        </div>
                        <?php } ?>  
<div class="row">       
<div class="col-md-4">
<div align="center">
	 
    
</div>
</div>
<div class="col-md-4">
<div align="center">
	 
    
</div>
</div>
<div class="col-md-4">
<div align="center">
	
    
</div>
</div>
</div>

<!-- aqui va el contenido -->



<div class="table-responsive">

        <div class="col-md-12 text-center">
                    <h3><?php echo $titulos['titulo1']; ?></h3>
                    <p><?php echo $titulos['titulo2']; ?></p>
                    <p><?php echo $titulos['titulo3']; ?></p>
        </div>
        <table class="table600 table-bordered table-condensed defaultTable">
                



               

   
<?php 

$anio = $config['anios_fin'];
$anio_ant=$anio-1;
$trim_inicio=1;
$trim_fin=5;

                             
//Esta es la funcion para redondear las cifras con criterios especificos
function round_up ($value, $places=0) {
  if ($places < 0) { $places = 0; }
  $mult = pow(10, $places);
  return number_format(ceil($value * $mult) / $mult);
}

//print_r($actividad);

//echo "<pre>";
//print_r($model);
//echo "</pre>";
foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                
                        $datos[$indice2]= $valor2;
                      
                   

               

            }

    }
                

}





//echo "<pre>";
//print_r($datos);
//echo "</pre>";
 

?>
   <tr class="rEven">
       <td rowspan="2"> Entidad Federativa</td>
    <?php 
        foreach($datos[3] as $an=>$dat){
        $cols1=count($datos[3][$an]['mes']);
       
        ?> 
        <td colspan="<?php echo $cols1; ?>"><?php echo $an;?></td>
    <?php } ?>
   <tr>
    <?php 
    $x=0;
    foreach($datos as $col => $v){  
    $x++;    
        ?>  
    <tr class="rEven">
        <?php 
        $i=0;
        foreach($datos[$col] as $key => $value){ 
        $i++;     
        ?>  
    
        
            <?php if($col==3 and $i==1){
                echo "<td></td>";
            }
            ?>
            <?php foreach ($value as $r=>$valor){ ?>
        
        
        
                <?php foreach($valor as $ind=>$val){
                    
                    //***********verificar si se van a comsultar todos los estados
                    if($x==1){
                    
                        switch ($ind){
                            case 1:
                                $trimestre_romano="1";
                                break;
                            case 2:
                                $trimestre_romano="2";
                                break;
                            case 3:
                                $trimestre_romano="3";
                                break;
                            case 4:
                            $trimestre_romano="4";
                            break;
                            case 0:
                                $trimestre_romano="Total";
                                break;
                                
                        }
                    
                    ?>
                    <td ><?php echo $trimestre_romano;?></td> 
                <?php } } ?>
            <?php } ?>
       
        
        <?php } ?>
      </tr>
      
    
    <?php } ?>

      <tr class="rEven">
        <?php 

          $sql1 = "SELECT nombre from entidades where id=9"; 
          $nombre = Yii::app()->db->createCommand($sql1)->queryRow();
        
          echo "<td>".$nombre['nombre']."</td>";
        ?>
        <?php foreach($datos[9] as $anios => $meses){ ?>

          <?php foreach($meses as $anio=>$meses){ ?>

            <?php foreach($meses as $mes=>$valor){ ?>

              <td class="data"><?php echo $valor['valor']; ?></td>

            <?php } ?>

          <?php } ?>

        <?php } ?>
      </tr>      
    <?php foreach($datos as $col => $v){  
      //valido si no es df
      if($col!=9){
      ?>  
      <tr class="rEven">
          <?php 
          $i=0;
          foreach($datos[$col] as $key => $value){ 
          $i++;     
          ?>  
          
              <?php if($i==1){
                  $sql1 = "SELECT nombre from entidades where id=".$col; 
                  $nombre = Yii::app()->db->createCommand($sql1)->queryRow();
                  
                  if($col<35){
                  echo "<td>".$nombre['nombre']."</td>";
                  }else{
                      if($col==40){ echo "<td>Nacional</td>"; }
                      if($col==41){ echo "<td>Urbano</td>"; }
                      if($col==42){ echo "<td>Rural</td>"; }
                      
                  }
              }
              ?>
              <?php foreach ($value as $valor){ ?>
             
              
            
                  <?php 
                  
                  
                  foreach($valor as $ind=>$val){ 
                  
                      
                      
                      ?>
                      
                      <td class="data"><?php echo round($val['valor'],4); ?></td> 
                  <?php } ?>
              
              
            
              
              <?php } ?>
         
          
          <?php } ?>
        </tr>
      <?php } ?>
    <?php } ?>
        
   
    

                               
		
			        </table>
<div align="right"><?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png'),array('apipdf/ap4Ind4?periodo='.$periodo.'&tipo=1'),array('target'=>'_blank')); ?>
<?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png'),array('apipdf/ap4Ind4?periodo='.$periodo.'&tipo=2')); ?>
                       </div> 
<div class="table_explanation">
        <p><?php echo $titulos['nota1']; ?></p>
        <p><?php echo $titulos['nota2']; ?></p>
        <p><?php echo $titulos['nota3']; ?></p>
        <p><?php echo $titulos['fuente']; ?></p>
</div>

			                
<!-- aca termina la tabla -->
     
     
    <div>
     <div align="center"></div>
     <div align="center"></div>
    </div>
</div>

		        <div class="row">       
<div class="col-md-4">
<div align="center">
	 
</div>
</div>
<div class="col-md-4">
<div align="center">
	 
</div>
</div>
<div class="col-md-4">
<div align="center">
	 
</div>
</div>
</div>
</div>