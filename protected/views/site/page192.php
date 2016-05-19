<?php
$baseUrl2 = YiiBase::getPathOfAlias("webroot");
$baseUrl = Yii::app()->params['baserecm'];

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



$url = $baseUrl. "/index.php/api/ap8Ind21?anios=".$config['anios_ini']."&anio_tiendas=".$config['anios_fin']."&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);
		
$id2=185;
 ?>
<div class="customContent">
 <div class="row contentRow">
                                <div class="col-md-3">
                                    <h2 class="indicadorTitulo">COMERCIO</h2>
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

foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                
                        $datos[$indice2]= $valor2;
                      
                   

               

            }

    }
                

}




 
//echo "<pre>";
//print_r($model['u_comercio'][2014]);
//echo "</pre>";
$anio_tiendas=2012;
$anio=$config['anios_fin'];
?>

    
    <div class="col-md-12 text-center">
                <h3><?php echo $titulos['titulo1']; ?></h3>
                <p><?php echo $titulos['titulo2']; ?></p>
                
                                        
             
              
    </div>
    <!--<table class="table600 table-bordered table-condensed defaultTable">
            <tr class="rEven"> 
                <td>Total</td>
                <td class="data"><?php echo number_format($model['tiendas'][$anio_tiendas][1]['valor'],0); ?></td>
            </tr>
            <tr class="rEven"> 
                <td>Tiendas que se aperturaron en el <?php echo $anio_tiendas; ?></td>
                <td class="data" ><?php echo number_format($model['tiendas'][$anio_tiendas][2]['valor'],0); ?></td>
            </tr>
    </table>
    <p><br></p>
    <p class="table_title default text-center">
      <h5 class="text-center">Unidades de comercio y de abasto en operación <br>al 31 de diciembre de 2013 en el Distrito federal</h5 >
    </p>-->
    <p><br></p>
    <table class="table600 table-bordered table-condensed defaultTable">
            <tr class="rEven"> 

                <td>Canal de distribución</td>
                <td>No. de unidades</td>
                <td>Personal que operan</td>

            </tr>



            <?php 


            foreach($model['u_comercio'][$anio] as $rubro=>$dato){ ?>
            <tr class="rEven"> 

                <td><?php 
                switch ($rubro){
                    case 1:
                        $rubro="Tianguis";
                        break;
                    case 2:
                        $rubro="Mercados públicos<sup>1</sup>";
                        break;
                    case 3:
                        $rubro="Mercados sobre ruedas<sup>1</sup>";
                        break;
                    case 4:
                        $rubro="Concentraciones<sup>2</sup>";
                        break;
                }
                echo $rubro; ?></td>


                <td class="data"><?php echo number_format($dato['unidades'],0); ?></td>
                <td class="data"><?php echo number_format($dato['personal'],0); ?></td>

            </tr>
            <?php  } ?>
    
    
    </table>
      <div align="right"><?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png'),array('apipdf/ap8Ind21?periodo='.$periodo.'&tipo=1'),array('target'=>'_blank')); ?>
<?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png'),array('apipdf/ap8Ind21?periodo='.$periodo.'&tipo=2')); ?>
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