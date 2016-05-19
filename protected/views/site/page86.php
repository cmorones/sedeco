  <?php
  //echo "El id es:$id";

  $sql = "SELECT descripcion, img from indicadores where id_ind=$id"; 
  $detalle = Yii::app()->db->createCommand($sql)->queryRow();
  
  ?>


<div class="container mainContainer" role="main">
                        <div class="customContent">
                            <div class="row contentRow">
                                <div class="col-md-3">
                                    <h2 class="indicadorTitulo">EMPLEO</h2>
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
                                            'condition'=>"parent_id=$id",
                                            'order'=>'position'
                                          )));
                                      //  echo CHtml::tag('ul',array('nav'=>'nav nav-pills'));
                                        foreach ($resultado as $key => $row) {

                                                            
                                                            echo CHtml::tag('li');
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
                            <div class="row maincontentRow">
                              <div class="col-md-9 text-justify">
                           <p><?=$detalle['descripcion']?></p> 
                           </div>
                              <div class="col-md-3"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/<?=utf8_encode($detalle['img'])?>" class="img-responsive"></div>
                            </div>
                        </div>
                    <!-- </div>
                </div> -->
            </div>