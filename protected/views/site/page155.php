<?php
//error_reporting(0);
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
//meses
$m = HistoricoPeriodos::model()->listaSimple($config['config']);

$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap6Ind11?anios=$a&meses=$m,0&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);
		
$id2=154;
 ?>
<div class="customContent">
 <div class="row contentRow">
                                <div class="col-md-3">
                                    <h2 class="indicadorTitulo">INVERSIÓN</h2>
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
                  <nav class="navbar navbar-default subindicadoresNav" role="navigation">
                <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-3">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Detalles</a>
                  </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-3" aria-expanded="false">
                      <ul class="nav navbar-nav">

                     
                          <li>
                                    <?php
                                      echo CHtml::link('Inversión Extranjera<br> Directa Trimestral', array('site/main/155'));
                                    ?>
                          </li>
                          <li >
                                    <?php
                                      echo CHtml::link('Inversión extranjera directa<br> en el Distrito Federal', array('site/main/157'));
                                    ?>
                           
                          </li>
                   
                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
              
                        </div>
                        <?php } ?>  
                                


                              
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

<!-- aqui va el contenido -->



<div class="table-responsive">
        <div class="col-md-12 text-center">
                <h3><?php echo $titulos['titulo1']; ?></h3>
                <p><?php echo $titulos['titulo2']; ?></p>
                <p><?php echo $titulos['titulo3']; ?></p>
                    
        
            <?php
            $cadena=stripos($_SERVER['REQUEST_URI'], 'historicoPeriodos');
            if($cadena<1){
                  $this->widget('zii.widgets.jui.CJuiButton', array(
                        'buttonType'=>'link',
                        'name'=>'Inicio2',
                        'caption'=>'Gráfica',
                        'value'=>'Inicio2',
                        'htmlOptions'=>array('class'=>'btn  btn-default btn-lg vergraficaBtn','style'=>'padding: 0px;'),

                        'url' => array('site/grafico/156'),
                        //'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
                  ));
            }else{

                 //echo CHtml::link(' Previo ', array('historicoPeriodos/main?id='.$id.'&graf_int=1'),array('class'=>'btn  btn-default btn-lg vergraficaBtn'));

            }
                        ?>
            </div>
        <table class="table600 table-bordered table-condensed defaultTable">
                



               

   
<?php 

$anio = $config['anios_fin'];
$anio_ant=$config['anios_ini'];
//$trim_inicio=1;
//$trim_fin=5;

                             
//Esta es la funcion para redondear las cifras con criterios especificos
function round_up ($value, $places=0) {
  if ($places < 0) { $places = 0; }
  $mult = pow(10, $places);
  return number_format(ceil($value * $mult) / $mult);
}

//print_r($actividad);


foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                
                        $datos[$indice2]= $valor2;
                      
                   

               

            }

    }
                

}


$anio=$config['anios_fin'];
$anio_ref=$config['anios_ini'];
$maximo = count($datos[$anio][1]);

if($cadena>0){
  
//echo "<pre>";
//print_r($datos[$anio]);
//echo "</pre>";
}
 

?>
   
    <tr class="rEven"> 
        <td rowspan="2">IED por tipo de inversión</td>
        <td colspan="<?php echo $maximo; ?>">Distrito Federal</td>
        <td colspan="<?php echo $maximo; ?>">Nacional</td>
    </tr>
    <tr class="rEven"> 
        
        <?php foreach($datos[$anio][1] as $key => $value){ 
        
            
            switch ($key){
                            case 1:
                                $trimestre_romano=$config['anios_fin']."."."1";
                                break;
                            case 2:
                                $trimestre_romano=$config['anios_fin']."."."2";
                                break;
                            case 3:
                                $trimestre_romano=$config['anios_fin']."."."3";
                                break;
                            case 4:
                                $trimestre_romano=$config['anios_fin']."."."4";
                                break;
                            case 0:
                                $trimestre_romano="Total";
                                break;
                                
                        }
        ?>   
        
        <td > <?php echo $trimestre_romano; ?></td>
        
        <?php } ?>
        <?php foreach($datos[$anio][1] as $key => $value){ 
         
            
            switch ($key){
                            case 1:
                                $trimestre_romano=$config['anios_fin']."."."1";
                                break;
                            case 2:
                                $trimestre_romano=$config['anios_fin']."."."2";
                                break;
                            case 3:
                                $trimestre_romano=$config['anios_fin']."."."3";
                                break;
                            case 4:
                                $trimestre_romano=$config['anios_fin']."."."4";
                                break;
                            case 0:
                                $trimestre_romano="Total";
                                break;
                                
                        }
        ?>   
        
        <td ><?php echo $trimestre_romano; ?></td>
        
        <?php } ?>
    </tr>
    
    <?php foreach($datos[$anio] as $rubro=>$da){ ?>
    <tr class="rEven">
        
        
        <?php foreach($datos[$anio][$rubro] as $key => $value){ 
            
        if($key==1){
           $sql1 = "SELECT titulo from relaciones where indicador='ap6Ind11' and columna=".$rubro; 
           $nombre = Yii::app()->db->createCommand($sql1)->queryRow(); 
           
           echo "<td>".$nombre['titulo']."</td>";
        }    
          
        ?>  
        <td class="data"><?php echo number_format($datos[$anio][$rubro][$key]['df'],1); ?></td> 
        
        <?php  ?>

        <?php

      } ?>
    
        
        <?php foreach($datos[$anio][$rubro] as $key => $value){ 
        
        ?>  
        <td class="data"><?php echo number_format($datos[$anio][$rubro][$key]['nacional'],1); ?></td>
       
        <?php } ?>
    </tr>   
    <?php } ?>
        
   
    

                               
  <tr class='rEven'> 
            <td  class="invisible"></td>
                <?php 
                foreach($datos[$anio][1] as $key => $value){ 
                    echo "<td class='invisible'>";
                    
                    echo "</td>";
                } ?>

                <?php 
                foreach($datos[$anio][1] as $key => $value){ 
                    echo "<td class='invisible'>";
                    
                    echo "</td>";
                } ?>
        </tr> 
    
        <tr class='rEven'> 
            <td >Var. % anual total</td>
                <?php 
                foreach($datos[$anio][1] as $key => $value){ 
                    echo "<td class='data'>";
                    if($key==0){  
                    echo number_format($model['informe']['df_total'],0); 
                    } 
                    echo "</td>";
                } ?>

                <?php 
                foreach($datos[$anio][1] as $key => $value){ 
                    echo "<td class='data'>";
                    if($key==0){  
                    echo number_format($model['informe']['nacional_total'],0); 
                    } 
                    echo "</td>";
                } ?>
        </tr>
        <tr class='rEven'> 
            <td  class="invisible"></td>
                <?php 
                foreach($datos[$anio][1] as $key => $value){ 
                    echo "<td class='invisible'>";
                    
                    echo "</td>";
                } ?>

                <?php 
                foreach($datos[$anio][1] as $key => $value){ 
                    echo "<td class='invisible'>";
                    
                    echo "</td>";
                } ?>
        </tr> 
        <tr class='rEven'> 
            <td>% de IED del Distrito Federal</td>
            <td class="data"><?php echo number_format(($model['informe']['df_v']/$model['informe']['nal_v'])*100,0)?> %</td>
        </tr>
         
    </table>
      <div align="right"><?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png'),array('apipdf/ap6Ind11?periodo='.$periodo.'&tipo=1'),array('target'=>'_blank')); ?>
<?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png'),array('apipdf/ap6Ind11?periodo='.$periodo.'&tipo=2')); ?>
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