<?php
$baseUrl2 = YiiBase::getPathOfAlias("webroot");

$grafico= $baseUrl2.'/static/ap1Ind2a.json';

//echo $grafico;
$datos = file_get_contents($grafico);
$model = json_decode($datos, true);
    /*$url = "http://localhost/recm/index.php/api2/ap1Ind1";
        //$url = $baseUrl;
        $data = file_get_contents($url);
        $model= CJSON::decode($data);*/
   $id2=10;


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
//---------------------->
$azcapotzalco=HistoricoPeriodos::model()->suma_valorcensalg(2,$periodo);
$coyoacan=HistoricoPeriodos::model()->suma_valorcensalg(3,$periodo);
$cuajimalpa=HistoricoPeriodos::model()->suma_valorcensalg(4,$periodo);
$gustavo=HistoricoPeriodos::model()->suma_valorcensalg(5,$periodo);
$iztacalco=HistoricoPeriodos::model()->suma_valorcensalg(6,$periodo);
$iztapalapa=HistoricoPeriodos::model()->suma_valorcensalg(7,$periodo);
$magdalena=HistoricoPeriodos::model()->suma_valorcensalg(8,$periodo);
$milpaalta=HistoricoPeriodos::model()->suma_valorcensalg(9,$periodo);
$alvaro=HistoricoPeriodos::model()->suma_valorcensalg(10,$periodo);
$tlahuac=HistoricoPeriodos::model()->suma_valorcensalg(11,$periodo);
$tlalpan=HistoricoPeriodos::model()->suma_valorcensalg(12,$periodo);
$xochimilco=HistoricoPeriodos::model()->suma_valorcensalg(13,$periodo);
$benito=HistoricoPeriodos::model()->suma_valorcensalg(14,$periodo);
$cuau=HistoricoPeriodos::model()->suma_valorcensalg(15,$periodo);
$miguel=HistoricoPeriodos::model()->suma_valorcensalg(16,$periodo);
$venustiano=HistoricoPeriodos::model()->suma_valorcensalg(17,$periodo);

//echo $azcapotzalco;

 ?>
 <div class="container mainContainer" role="main">
                        <div class="customContent">
                            <div class="row contentRow">
                                <div class="col-md-4">
                                    <h2 class="indicadorTitulo">PRODUCCIÓN</h2>
                                </div>
                                <?php 
              $cadena=stripos($_SERVER['REQUEST_URI'], 'historicoPeriodos');
              

              if($cadena<1){ ?>
                                <div class="col-md-8">
                                    <ul class="nav nav-pills">
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
                                </div>
                                <?php } ?> 
                            </div>
                           
                            <div class="row maincontentRow">
                             <div class="col-md-12 text-center">
    <h3><?php echo $titulos['titulo1']; ?></h3>
    <p><?php echo $titulos['titulo2']; ?></p>
    <p><?php echo $titulos['titulo3']; ?></p>
</div> 
                              <div class="col-md-10 text-center">
                      <script type="text/javascript">
    $(function () {
    $('#valor_censal').highcharts({
        credits: false,
        chart: {
             
            type: 'column',

        },
        title: {
            text: ''
        },
        subtitle: {
         //   text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    
                    fontSize: '10px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Millones de pesos'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Valor Agregado en 2009: <b>{point.y:.1f} Millones de pesos</b>'
        },
        series: [{
            name: 'Delegaciones',
            color: '#FFA420',
            data: [
                ['Miguel Hidalgo', <?php echo round($miguel,1) ?>],
                ['Cuautemoc',<?php echo round($cuau,1) ?>],
                ['Benito Juaréz', <?php echo round($benito,1) ?>],
                ['Alvaro Obregón', <?php echo round($alvaro,1) ?>],
                ['Azcapotzalco', <?php echo round($azcapotzalco,1) ?>],
                ['Tlalpan', <?php echo round($tlalpan,1) ?>],
                ['Cuajimalpa', <?php echo round($cuajimalpa,1) ?>],
                ['Coyoacán', <?php echo round($coyoacan,1) ?>],
                ['Iztapalapa', <?php echo round($iztapalapa,1) ?>],
                ['Venustiano Carranza', <?php echo round($venustiano,1) ?>],
                ['Gustavo A. MAdero',<?php echo round($gustavo,1) ?>],
                ['Iztacalco',<?php echo round($iztacalco,1) ?>],
                ['Xochimilco', <?php echo round($xochimilco,1) ?>],
                ['Magdalena Contreras', <?php echo round($magdalena,1) ?>],
                ['Milpa Alta', <?php echo round($milpaalta,1) ?>]
            ],
            dataLabels: {
                enabled: true,
               // rotation: -180,
                color: '#000000',
                align: 'right',
                x: 4,
                y: 10,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif',
                   // textShadow: '0 0 3px black'
                }
            }
        }]
    });
});
         
        </script>


   <div class="option_1">
   <div class="table-responsive">
                      <?php if($image_data==""){ ?>
                      <div id="valor_censal">
                          </div>
                      <?php }else{ ?>
                        
                        <div class="col-md-12 text-center">
                          <img src="<?php echo $baseUrl; ?>/uploads/<?php echo $image_data;  ?>">
                        </div>
                        
                      <?php } ?>
    </div>
                    <div class="table_explanation">
                      <p><?php echo $titulos['nota1']; ?></p>
                      <p><?php echo $titulos['fuente']; ?></p>
              </div> 
                </div> 
                    <!-- </div>
                </div> -->
            </div>