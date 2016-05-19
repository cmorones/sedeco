	<?php
    $baseUrl2 = YiiBase::getPathOfAlias("webroot");
    $baseUrl = Yii::app()->params['baserecm'];

    $menus= $baseUrl2.'/static/grafico_ap1ind1.json';

    //echo $menus;
                    $datos = file_get_contents($menus);
                    //$model = json_decode($datos, true);
            /*$url = "http://localhost/recm/index.php/api2/ap1Ind1";
            //$url = $baseUrl;
            $data = file_get_contents($url);
            $model= CJSON::decode($data);*/
     $id2=10;

    $homePrincipal = HomePrincipal::model()->findbyPk(1);

    // $url = $baseUrl. "/index.php/api2/ap1Ind4ccategories?periodo=23&anioini=2013&aniofin=2014";
    $url = $baseUrl. "/index.php/api2/ap1Ind4ccategories?periodo=248&anioini=2013&aniofin=2015";
    $categorias = file_get_contents($url);

    // $url = $baseUrl. "/index.php/api2/ap1Ind4cpib?periodo=23&anioini=2013&aniofin=2014";
    $url = $baseUrl. "/index.php/api2/ap1Ind4cpib?periodo=248&anioini=2013&aniofin=2015";
    $pib = file_get_contents($url);


    // $url = $baseUrl. "/index.php/api2/ap1Ind4cigae?periodo=23&anioini=2013&aniofin=2014";
    $url = $baseUrl. "/index.php/api2/ap1Ind4cigae?periodo=248&anioini=2013&aniofin=2015";
    $igae = file_get_contents($url);


    // $url = $baseUrl. "/index.php/api2/ap1Ind4citaee?periodo=23&anioini=2013&aniofin=2014";
    $url = $baseUrl. "/index.php/api2/ap1Ind4citaee?periodo=248&anioini=2013&aniofin=2015";
    $itaee = file_get_contents($url);


     ?>
    <div class="container mainContainer" role="main">
                <div class="homeContent">
                    <div class="row homecontentRow">
                        
                        <div class="col-md-6 text-center colPresentacion">
                            
                            <h3 class="tituloPresentacion"><?php echo $homePrincipal->titulo ?></h3>
                            <!-- <h4>¿Qué es, qué contiene, qué busca?</h4> -->
                            <h4><?php echo $homePrincipal->subtutulo ?></h4>
                            <?php if($homePrincipal->activo=='Si'){ ?>
                            <button type="button" class="btn btn-default btn-lg presentacionBtn">
                                
                                <?php
                                $url= $baseUrl.'/analisis/'.$homePrincipal->archivo;
                                echo CHtml::link($homePrincipal->nombre_btn, $url);
                                ?>
                            </button>
                             <?php } ?>
                        </div>
                       
                        <div class="col-md-6 text-center">
                        </div>
                    </div>
                    <div class="row homeanalisisRow">
                        <div class="col-md-6 text-center">
                            <script type="text/javascript">
                                $(document).ready(function() {

                            var options = {
                                credits: false,
                              chart: {
                                    renderTo: 'hist_itae',
                                    type: 'spline'
                                },
                                title: {
                                    text: 'HISTÓRICO ITAEE, IGAE Y PIB NACIONAL'
                                },
                               /* subtitle: {
                                    text: 'Source: WorldClimate.com'
                                },*/
                                xAxis: {
                                    categories: 
                                    <?php echo $categorias ?>
                                },
                                yAxis: {
                                    title: {
                                        text: ''
                                    },
                                    tickInterval: .2,
                                    labels: {
                                        formatter: function () {
                                            return this.value + '1';
                                        }
                                    }
                                },
                                tooltip: {
                                    crosshairs: true,
                                    shared: true
                                },
                                plotOptions: {
                                    spline: {
                                        marker: {
                                            radius: 4,
                                            lineColor: '#666666',
                                            lineWidth: 1
                                        }
                                    }
                                },
                                series: [{
                                    name: 'PIB',
                                    color: '#EF8526',
                                    marker: {
                                        symbol: 'square'
                                    },
                                    data: 

                                     <?php echo $pib ?>

                                }, {
                                    name: 'IGAE',
                                    color: '#862053',
                                    marker: {
                                        symbol: 'diamond'
                                    },
                                    data: 
                                     <?php echo $igae ?>
                                },
                                {
                                    name: 'ITAEE DF',
                                    color: '#EA666C',
                                    marker: {
                                        symbol: 'triangle'
                                    },
                                    data:  
                                    <?php echo $itaee ?>


                                    
                                }
                                ]
                                        
                            }


                                        chart = new Highcharts.Chart(options);
                                    
                                    
                                   
                                    });
                                    /*
                                    
                                chart = new Highcharts.Chart(options);    
                                    
                                }); */  
                                </script>


                           <div class="option_1">
                                            <div id="hist_itae">
                                          
                                            </div>

                            </div>    
                        </div>
                        <div class="col-md-6 text-center ">
                            <!--<h3 class="tituloPresentacion">ANÁLISIS DEL TERCER TRIMESTRE 2014</h3>
                            <h4>Recuperación en medio de la incertidumbre</h4>
                            <button type="button" class="btn btn-default btn-lg presentacionBtn">LEER ANÁLISIS</button>-->
                            <script type="text/javascript">
                                $(document).ready(function() {

                                var options = {
                                credits: false,
                                chart: {
                                    renderTo: 'variacion_porcentual',
                                    type: 'bar'
                                },
                                title: {
                                    text: 'Generación de empleo formal, entidades federativas seleccionadas, enero a mayo de 2015.'
                                },
                                xAxis: {
                                    title: {
                                        text: 'Entidad'
                                    },
                                    labels: {
                                        rotation: -25,
                                        y: 10
                                    },
                                    categories: [
                                                "Veracruz",
                                                "Puebla",
                                                "Coahuila",
                                                "Estado de México",
                                                "Nuevo León",
                                                "Jalisco",
                                                "Distrito Federal"
                                                

                                                
                                            ]
                                },
                                yAxis: {
                                    labels: {
                                        //format: '{value}'
                                        enabled: false
                                    },

                                   title: {
                                      text: ''
                                   },
                                    
                                    gridLineWidth: 1
                                },
                                scrollbar: {
                                    height: 15
                                },

                              
                                
                                rangeSelector: {
                                    selected: 1
                                },

                                series: [
                                                {
                                                name: 'Empleos',
                                                color: 'orange',
                                                allowPointSelect: true,
                                                data: [],
                                                dataLabels: {
                                                    enabled: true,
                                                    // rotation: -180,
                                                    color: '#000000',
                                                    align: 'right',
                                                    x: 4,
                                                    y: 10,
                                                    style: {
                                                        fontSize: '13px',
                                                        fontFamily: 'sans-serif, Verdana',
                                                       // textShadow: '0 0 3px black'
                                                    }
                                                }
                                                }
                                                
                                             ]
                                        
                            }

                                    $.getJSON("<?=$baseUrl?>/index.php/api/ap3Ind31g3?anios=2015&serie=1&grafico=1&periodo=72", function(json) {
                                    options.series[0].data = json;
                                                        chart = new Highcharts.Chart(options);
                                                
                                                
                                                });

                                                
                                        
                                    });
                                    /*
                                    
                                chart = new Highcharts.Chart(options);    
                                    
                                }); */  
                            </script>

                            <div class="option_1">
                                <div id="variacion_porcentual">
                            
                                </div>
                            </div>
                                                    
                        </div>
                    </div>
                    <div class="row indicadoreshomeRow">
                        <div class="col-md-9 text-justify colIndicadoresHome">
                            <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-heading text-center"><h4>INDICADORES</h4></div>
                                <div class="panel-body">
                                    <div class="row contentRow">
                                        
                                        <?php

                                        $resultado = HomeApartados::model()->findAll((array(
                                          //  'condition'=>'id_periodo=2',
                                            'order'=>'id'
                                            )));

                                        foreach ($resultado as $key => $row) {
                                        ?>

                                        <div class="col-md-4">
                                            <div class="panel panel-default">
                                                <!-- Default panel contents -->
                                                <div class="panel-heading text-center"><h4><? echo $row->titulo; ?></h4></div>
                                                <div class="panel-body panel-body-indicador">
                                                    <p><? echo $row->detalle; ?></p>
                                                    <div class="text-center">
                                                        <!-- <button type="button" class="btn btn-default btn-lg apartadoBtn">Ver apartado</button> -->
                                                                     <?php
                                                            echo CHtml::link('Ver apartado', array('site/main/'.$row->id_apartado),array('class'=>"btn btn-default btn-lg apartadoBtn", 'role'=>"button"));
                                                                      
                                                                ?>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php

                                    }

                                    ?>

                                     

                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 colReportesHome">
                            <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-heading text-center"><h4>ÚLTIMOS REPORTES</h4></div>
                                <div class="panel-body text-center">
                                    <div class="">
                                        
                                            <?php

                                        $resultado = HomeReportes::model()->findAll((array(
                                          //  'condition'=>'id_periodo=2',
                                            'order'=>'id'
                                            )));

                                        foreach ($resultado as $key => $row) {
                                        
                                        $url= $baseUrl.'/pdf/'.$row->archivo;
                                            echo CHtml::link($row->nombre_btn, $url,array('class'=>"btn btn-default btn-lg reporteBtn"));
                                                    
                                                          
                                     
                                       
                                    }

                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- content -->
       