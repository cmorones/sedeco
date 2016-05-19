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
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


$url = $baseUrl. "/index.php/api/ap1Ind9?anios=$a&grafico=0&periodo=".$periodo;
        //$url = $baseUrl;
        $data = file_get_contents($url);
        $model= CJSON::decode($data);
		
$id2=10;
 ?>
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
          
                        	</div>
                        	<?php } ?>  
                                


                              
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
                    

                if (is_array($valor2)){ 
                    foreach ($valor2 as $indice3 => $valor3) {
                        
                       
                        
                            $sql = "SELECT titulo from relaciones where indicador='ap1Ind9' and columna = $indice3 "; 
                            $rubro = Yii::app()->db->createCommand($sql)->queryRow();
                            
                            
                            $rubros[$indice3]=($rubro['titulo']);
                            
                            //$datos[$indice3]= $valor3;
                            
                            
                            
                            
                            
                            

                    }

                }

            }

    }
                

}

//$datos = $model['informe']['rubro'];


                
$an=count($model['informe']['rubro'][1]);
?>
    <tr>
        <td class="invisible"></td>
        <td class="invisible"></td>
        <td colspan="<?php echo $an; ?>" class="span_time">Distrito Federal</td>
        <td colspan="<?php echo $an; ?>" class="span_time">Total de los estados (nacional)</td>
    </tr>
    <tr  class="rEven">
        <td colspan="2"></td>
        
        <?php foreach($model['informe']['rubro'][13] as $anio=>$dato){
            echo "<td>".$anio."</td>";
        }
        ?>
        <?php foreach($model['informe']['rubro'][1] as $anio=>$dato){
            echo "<td>".$anio."</td>";
        }
        ?>
        
        
    </tr>
    
    
    <tr class="rEven">
      <td  colspan="2"><?php echo $rubros[1];?></td>
      <?php 
      foreach($model['informe']['rubro'][13] as $dato){
          echo "<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      foreach($model['informe']['rubro'][1] as $dato){
          echo "<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      ?>

    </tr>

    
    <tr  class="rEven">
      <td  rowspan="3">&nbsp;&nbsp;</td>
      <td ><?php echo $rubros[2]?></td>
      <?php 
      foreach($model['informe']['rubro'][14] as $dato){
          echo "<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      foreach($model['informe']['rubro'][2] as $dato){
          echo "<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      ?>
    </tr>
    <tr class="rEven">
      <td ><?php echo $rubros[3]?></td>
      <?php 
      foreach($model['informe']['rubro'][15] as $dato){
          echo "<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      foreach($model['informe']['rubro'][3] as $dato){
          echo "<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      ?>
    </tr>
    <tr class="rEven">
      <td ><?php echo $rubros[4]?></td>
      <?php 
      foreach($model['informe']['rubro'][16] as $dato){
          echo "<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      foreach($model['informe']['rubro'][4] as $dato){
          echo "<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      ?>
    </tr>
    <tr class="rEven">
      <td  colspan="2"><?php echo $rubros[5];?></td>
      <?php 
      foreach($model['informe']['rubro'][17] as $dato){
          echo "<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      foreach($model['informe']['rubro'][5] as $dato){
          echo "<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      ?>
    </tr>
    <tr class="rEven">
      <td  rowspan="3">&nbsp;&nbsp;</td>
      <td ><?php echo $rubros[6]?></td>
      <?php 
      foreach($model['informe']['rubro'][18] as $dato){
          echo "<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      foreach($model['informe']['rubro'][6] as $dato){
          echo "<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      ?>
    </tr>
    <tr class="rEven">
      <td ><?php echo $rubros[7]?></td>
      <?php 
      foreach($model['informe']['rubro'][19] as $dato){
          echo "<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      foreach($model['informe']['rubro'][7] as $dato){
          echo "<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      ?>
    </tr>
    <tr class="rEven">
      <td ><?php echo $rubros[8]?></td>
      <?php 
      foreach($model['informe']['rubro'][20] as $dato){
          echo "<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      foreach($model['informe']['rubro'][8] as $dato){
          echo "<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      ?>
    </tr>
    <tr class="rEven">
      <td colspan="2"><?php echo $rubros[9];?></td>
      <?php 
      foreach($model['informe']['rubro'][21] as $dato){
          echo "<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      foreach($model['informe']['rubro'][9] as $dato){
          echo "<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      ?>
    </tr>
    <tr class="rEven">
      <td  rowspan="3">&nbsp;&nbsp;</td>
      <td ><?php echo $rubros[10]?></td>
      <?php 
      foreach($model['informe']['rubro'][22] as $dato){
          echo "<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      foreach($model['informe']['rubro'][10] as $dato){
          echo "<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      ?>
    </tr>
    <tr class="rEven">
      <td ><?php echo $rubros[11]?></td>
      <?php 
      foreach($model['informe']['rubro'][23] as $dato){
          echo "<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      foreach($model['informe']['rubro'][11] as $dato){
          echo "<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      ?>
    </tr>
    <tr class="rEven">
      <td ><?php echo $rubros[12]?></td>
      <?php 
      foreach($model['informe']['rubro'][24] as $dato){
          echo "<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      foreach($model['informe']['rubro'][12] as $dato){
          echo "<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      ?>
    </tr>
    

                               
		
			        </table>
    
  <div align="right"><?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png'),array('apipdf/ap1Ind9?periodo='.$periodo.'&tipo=1'),array('target'=>'_blank')); ?>
<?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png'),array('apipdf/ap1Ind9?periodo='.$periodo.'&tipo=2')); ?>
                       </div>    
    
<div class="table_explanation">
        <p><?php echo $titulos['nota1']; ?></p>
        <p><?php echo $titulos['fuente']; ?></p>
</div>		        
			                
<!-- aca termina la tabla -->
     
     
    <div>
     <div align="center"></div>
     <div align="center"></div>
    </div>
</div>

		     
</div>