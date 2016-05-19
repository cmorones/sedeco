<?php
 $baseUrl = Yii::app()->baseUrl;

 ?>
 <div class="container mainContainer" role="main">
 <div class="customContent">
<div class="row contentRow">


<section class="sectionInfografias">

<h2 class="indicadorTitulo">APÉNDICE</h2>

    <ul id="cols">


 <?php

                                        $resultado = Infografia::model()->findAll((array(
                                          //  'condition'=>'id_periodo=2',
                                            'order'=>'id'
                                            )));

                                        foreach ($resultado as $key => $row) {
                                        ?>

        <li>
        <h2><?php echo $row->nombre; ?></h2>
            <img src="<?php echo $baseUrl;?>/images/<?php echo $row->alt;?>" alt="Descripcipn de imagen">
             <div align="center">
                      <?php

                    
                 //  echo CHtml::link('Ver', array('site/main/16'));
                 
                                                      $this->widget('zii.widgets.jui.CJuiButton', array(
                                                            'buttonType'=>'link',
                                                            'name'=>'Grafico<?php echo $row->id; ?>',
                                                            'caption'=>'Ver',
                                                            'value'=>'Grafico1',
                                                            'htmlOptions'=>array('target'=>"_blank",'class'=>'btn  btn-default btn-lg vergraficaBtn','style'=>'padding: 0px;'),


                                                            'url' => $baseUrl.'/pdf/'.$row->filename.'' 
                                                            //http://www.sedecodf.gob.mx/archivos/ReporteEconomico/RE_Apendice_Infografia_Doing_Bussiness.pdf',
                                                            //'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
                                                      ));
                                                ?>
            </div>
        </li>
        <?php
      }

        ?>
        
    </ul>

   

    

    

</section>
<br>
<br>
<br>
<br>
</div>
</div>
</div>