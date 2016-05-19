<?php
//error_reporting(0);
$baseUrl2 = YiiBase::getPathOfAlias("webroot");

///AQUI AGREGO LA CONFIGURACION SEGÚN SEA EL CASO

//-------->fer
$cadena=stripos($_SERVER['REQUEST_URI'], 'historicoPeriodos');
if($cadena<1){
  $sql = "SELECT id from historico_periodos WHERE id_ind=$id AND autorizado=1"; 
  $per = Yii::app()->db->createCommand($sql)->queryRow();
  $periodo=$per['id'];

  $config=HistoricoPeriodos::model()->periodo($id);

  //aca traigo titulos, notas y fuente
  $titulos=HistoricoPeriodos::model()->datosIndicador($id);

  //se valida si es imagen o datos para el front end
  $sql_imagen = "SELECT filename from historico_periodos WHERE id_ind=$id AND autorizado=1 AND imagen = 1"; 
  $imagen = Yii::app()->db->createCommand($sql_imagen)->queryRow();
  $image_data=$imagen['filename'];

}else{

  $config=HistoricoPeriodos::model()->periodo_back($periodo);

  //aca traigo titulos, notas y fuente
  $titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);


  //se valida si es imagen o datos para el back end
  $sql_imagen = "SELECT filename from historico_periodos WHERE id=$periodo AND imagen = 1"; 
  $imagen = Yii::app()->db->createCommand($sql_imagen)->queryRow();
  $image_data=$imagen['filename'];

}
//---------------------->fer
//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);
//meses
$m = HistoricoPeriodos::model()->listaSimple($config['config']);

$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api2/ap1Ind2b?anios=$a&entidad=$m,0&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);


$sql = "select TOP 1 anio from ap1Ind2b where  id_entidad=9 order by anio desc"; 
$anio = Yii::app()->db->createCommand($sql)->queryRow();
$aniof = $anio['anio'];



$sql = "select valor from ap1Ind2b where  id_entidad=9 and anio=$aniof and id_sector=1"; 
$primario = Yii::app()->db->createCommand($sql)->queryRow();

$sql = "select valor from ap1Ind2b where  id_entidad=9 and anio=$aniof and id_sector=2"; 
$secundario = Yii::app()->db->createCommand($sql)->queryRow();

$sql = "select valor from ap1Ind2b where  id_entidad=9 and anio=$aniof and id_sector=3"; 
$terciario = Yii::app()->db->createCommand($sql)->queryRow();

    
$id2=10;
 ?>
 <div class="container mainContainer" role="main">
                        <div class="customContent">
                            <div class="row contentRow">
                                <div class="col-md-3">
                                    <h2 class="indicadorTitulo">PRODUCCIÓN</h2>
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

               <li ><?php
                   echo CHtml::link('Participación en el PIB', array('site/main/14'));
                   
                 
            ?>
                      </li>


                        <li > <?php

                  echo CHtml::link('Participación en el PIB por sector', array('site/main/16'));
                 
            ?>
                        </li>
          
                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
                        </div>
                        <?php } ?> 
                            </div>
                           
                            <div class="row maincontentRow">
                            <div class="col-md-2 text-center">
                            </div>
                              <div class="col-md-8 text-center">
                  <h3>Estructura productiva del Distrito Federal, <?php echo $aniof; ?></h3>


                  
              
<script type="text/javascript">
		$(document).ready(function() {
var options = {
		credits: false,
	    chart: {
	        renderTo: 'national_pib_pct_entities',
	        type: 'pie'
	    },
	    title: {
	    	text: ''
		},
		series: [{
                type: 'pie',
                name: '%',
                color: '#FFA420',
                data: [
                    ['Sector primario ', <?php echo $primario['valor']; ?>],
                    ['Sector secundario',<?php echo $secundario['valor']; ?>],
                    ['Sector terciario',<?php echo $terciario['valor']; ?>]
                ]
         }]
				
	}
	chart = new Highcharts.Chart(options);   
	        
	       
	        });
		</script>


   <div class="option_1">
		        	
              <?php if($image_data==""){ ?>
                <div id="national_pib_pct_entities">
                </div>
              <?php }else{ ?>
                
                <div class="col-md-12 text-center">
                  <img src="<?php echo $baseUrl; ?>/uploads/<?php echo $image_data;  ?>">
                </div>
                
              <?php } ?>
		        
		        </div> 
                  <p class="table_exp_source"><span>Fuente:</span>INEGI, Sistema de Cuentas Nacionales de México</p>
                            </div>
                              <div class="col-md-2 text-center">
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
                    <!-- </div>
                </div> -->
            </div>