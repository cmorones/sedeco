
<div class="page-header">
  <h2>Produccion<small> - Valor Agregado Censal Bruto</small></h2>
</div>



<?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'Indicador 1 > historico de Periodos',
        ));
        
?>

<table class="table table-bordered table-condensed table-striped table-hover">

      <thead>
        <tr>
          <th>Periodo</th>
           <th colspan="2"><div align="center">Estados</div></th>
          <th colspan="5"><div align="center">Acciones</div></th>
        </tr>

      </thead>
     <tbody>
        <?php foreach ($model as $item) { ?>
        <tr>
        <td><?php echo $item->nombre?></td>
         
           <td>
               <?php
                if($item->validado){
                    echo '<span class="label label-success">Validado</span>';
                    
                }else{
                   echo '<span class="label label-warning">No Validado</span>';
                }
            ?>
           </td>
           <td>
               <?php
                if($item->autorizado){
                    echo '<span class="label label-success">Autorizado</span>';
                    
                }else{
                   echo '<span class="label label-warning">No Autorizado</span>';
                }
            ?>
           </td>
           <td>
            <?php
                  $this->widget('zii.widgets.jui.CJuiButton', array(
                        'buttonType'=>'link',
                        'name'=>'previo'.$item->id.'',
                        'caption'=>'Previo',
                        'value'=>'previo',
                        'htmlOptions'=>array('class'=>'btn btn-primary','style'=>'padding: 0px;'),


                        'url' => array('ap1Ind1Hist/previo/'.$item->id.''),
                        //'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
                  ));
            ?>
           </td>
             <td>
                <?php
                  $this->widget('zii.widgets.jui.CJuiButton', array(
                        'buttonType'=>'link',
                        'name'=>'config'.$registro['periodo'].'',
                        'caption'=>'Configuracion',
                        'value'=>'config',
                        'htmlOptions'=>array('class'=>'btn btn-info','style'=>'padding: 0px;'),


                        'url' => array('ap1Ind1Hist/update/'.$item->id.''),
                        //'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
                  ));
            ?>
           </td>
             <td>
            <?php
                  $this->widget('zii.widgets.jui.CJuiButton', array(
                        'buttonType'=>'link',
                        'name'=>'datos'.$registro['periodo'].'',
                        'caption'=>'Datos',
                        'value'=>'datos',
                        'htmlOptions'=>array('class'=>'btn btn-success','style'=>'padding: 0px;'),


                        'url' => array('ap1Ind1/admin/'.$item->id.''),
                        //'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
                  ));
            ?>
           </td>
        
             <td>
                <?php
                  $this->widget('zii.widgets.jui.CJuiButton', array(
                        'buttonType'=>'link',
                        'name'=>'mod'.$registro['periodo'].'',
                        'caption'=>'Subir Excel',
                        'value'=>'mod',
                        'htmlOptions'=>array('class'=>'btn btn-warning','style'=>'padding: 0px;'),


                        'url' => array('ap1Ind1Hist/excel/'.$item->id.''),
                        //'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
                  ));
            ?>
           </td>
         
           


        </tr>

        <?php } ?>
        
      </tbody>
</table>
<?php
$this->widget('CLinkPager', array(
            'currentPage'=>$pages->getCurrentPage(),
            'itemCount'=>$item_count,
            'pageSize'=>$page_size,
            'maxButtonCount'=>5,
            'header'=>'',
        'htmlOptions'=>array('class'=>'pages'),
        ));
?>

 <?php $this->endWidget();?>