<?php

error_reporting(0);
ini_set('memory_limit', '2048M');
set_time_limit(0); 


        $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>"<h2>Importar Archivo de excel</h2>",
        ));
        
//echo "Vas a editar el periodo =>".$id_periodo;        
        
//funciones comunes
        
function letras($numero){
    switch ($numero){
        case 0:
            $letra="A";
            break;
        case 1:
            $letra="B";
            break;
        case 2:
            $letra="C";
            break;
        case 3:
            $letra="D";
            break;
        case 4:
            $letra="E";
            break;
        case 5:
            $letra="F";
            break;
        case 6:
            $letra="G";
            break;
        case 7:
           $letra="H";
           break;
        case 8:
           $letra="I";
           break;
        case 9:
           $letra="J";
           break;
        case 10:
           $letra="K";
           break;
        case 11:
           $letra="L";
           break;
        case 12:
           $letra="M";
           break;
        case 13:
           $letra="N";
           break;
        case 14:
           $letra="O";
           break;
        case 15:
           $letra="P";
           break;
        case 16:
           $letra="Q";
           break;
        case 17:
           $letra="R";
           break;
        case 18:
           $letra="S";
           break;
        case 19:
           $letra="T";
           break;
        case 20:
           $letra="U";
           break;
        case 21:
           $letra="V";
           break;
        case 22:
           $letra="W";
           break;
        case 23:
           $letra="X";
           break;
        case 24:
           $letra="Y";
           break;
        case 25:
           $letra="Z";
           break;
       case 26:
           $letra="AA";
           break;
       case 27:
           $letra="AB";
           break;
       case 28:
           $letra="AC";
           break;
       case 29:
           $letra="AD";
           break;
       case 30:
           $letra="AE";
           break;
       case 31:
           $letra="AF";
           break;
       case 32:
           $letra="AG";
           break;
       case 33:
           $letra="AH";
           break;
       case 34:
           $letra="AI";
           break;
       case 35:
           $letra="AJ";
           break;
       case 36:
           $letra="AK";
           break;
       
         
        
    }
    
    return $letra;
}        

?>

<div class="form-horizontal">

<?php echo CHtml::form('','post',array('enctype'=>'multipart/form-data')); ?>
<!--<input type="file" id="archivo" name ="excel" class="filestyle" data-buttonName="btn-primary">-->
<div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Archivo</label>
  <div class="col-sm-10">
    <input type="file" class="form-control" id="archivo" name ="excel" class="filestyle" data-buttonName="btn-primary">
  </div>
</div>

<input type="hidden" value="upload" name="action" />
	<?php
				  $this->widget('zii.widgets.jui.CJuiButton', array(
				  	    'buttonType'=>'submit',
						'name'=>'importar',
						'caption'=>'Importar',
						'value'=>'Importar',
						'htmlOptions'=>array('class'=>'btn btn-success', 'id'=>'excel_send'),


						//'url' => array('ap1Ind1/config/'.$registro['id'].''),
						//'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
				  ));
			?>
<?php echo CHtml::endForm(); ?>


</div><!-- form -->


<?php $this->endWidget();?>

<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    
<!-- CARGA LA MISMA PAGINA MANDANDO LA VARIABLE upload -->

<?php 
extract($_POST);
if ($action == "upload"){

    


//cargamos el archivo al servidor con el mismo nombre
//solo le agregue el sufijo bak_ 

	$path = realpath( dirname(Yii::app()->request->scriptFile).Yii::app()->params['uploads'] ).DIRECTORY_SEPARATOR;

	$archivo = $_FILES['excel']['name'];
	$tipo = $_FILES['excel']['type'];
	$destino = $path."bak_".$archivo;

	//primero verificar si el archivo existe antes de copiarlo
	if (!file_exists($path."bak_".$archivo)){ 
			//si no existe se carga a la carpeta uploads
		if (copy($_FILES['excel']['tmp_name'],$destino)){ 

			//echo "Archivo Cargado Con Éxito<br>"; 

		}else{ 

			echo "Error Al Cargar el Archivo<br>"; 
		}
	}else{
		//si existe se borra y se carga de nuevo

		unlink ($path."bak_".$archivo);

		if (copy($_FILES['excel']['tmp_name'],$destino)){ 

			//echo "Archivo Cargado Con Éxito<br>"; 

		}else{ 

			echo "Error Al Cargar el Archivo<br>"; 
		}
	}
      
////////////////////////////////////////////////////////
if (file_exists ($path."bak_".$archivo)){ 
    
        //es necesario traer datos de la config durante la carga del excel para validar si el periodo ya ha sido cargado
        $periodo= 1;
        
        

    
        
	/** Clases necesarias */
    

	Yii::import('application.vendor.*');
	require_once('Classes/PHPExcel.php');
	require_once('Classes/PHPExcel/Reader/Excel2007.php');

	// Cargando la hoja de cálculo
	$objReader = new PHPExcel_Reader_Excel2007();
	$objPHPExcel = $objReader->load($path."bak_".$archivo);
	$objFecha = new PHPExcel_Shared_Date();       

	
        //esto cuenta las filas que tiene el archivo para saber cuentas veces insertar por rubro
	      $contar = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); 
        
        //traigo el modelo
        $modelo = $objPHPExcel->getActiveSheet(0)->getCell('A3')->getCalculatedValue();
        //echo "El modelo es ".$modelo."<br>";
        
        //traigo los titulos (estos son los campos de la base) solo para las columnas genericas
        $comun = $objPHPExcel->getActiveSheet(0)->getCell('B3')->getCalculatedValue();
        $comunes=explode(",", $comun);
        //las tengo que sumar para saber cuantas columas hay antes de los rubros
        $cuenta_comunes=count($comunes);
        //echo "<pre>";
        //print_r($comunes);
        //echo "</pre>";
        
        //traigo los titulos (estos son los campos de la base) solo para las columnas genericas
        $rubro = $objPHPExcel->getActiveSheet(0)->getCell('D3')->getCalculatedValue();
        $rubros=explode(",", $rubro);
        $count_rubros=count($rubros);
        
        
        //El selector sirve para saber si se van a pasar las columnas a rubros 
        //o si se van a hacer columnas fijas, es decir cada columna es un campo de la base
        //tal es el caso de nacional y df, son dos campos en un mismo registro
        $selector = $objPHPExcel->getActiveSheet(0)->getCell('C3')->getCalculatedValue();
        
        //Este selector sirve para saber que campo debe buscar en la base, solo aplica para delegaciones o entidades
        $nombre_rubro_entidad = $objPHPExcel->getActiveSheet(0)->getCell('E3')->getCalculatedValue();
        
        
        //Este es el modelo al que se debe hacer referencia y siempre es plural
        $criterio_model = $objPHPExcel->getActiveSheet(0)->getCell('F3')->getCalculatedValue();
        
        //Este contiene el numero de subrubros que van a ser cambiados a entero
        $num_subrubros = $objPHPExcel->getActiveSheet(0)->getCell('G3')->getCalculatedValue();
        
        //Este contiene el numero de entidades o delegaciones o rubros si es que aplica
        $num_rubros_ciclo = $objPHPExcel->getActiveSheet(0)->getCell('H3')->getCalculatedValue();
        
        //Este contiene el nombre del rubro en el caso del selector 1
        $nombre_rubro = $objPHPExcel->getActiveSheet(0)->getCell('I3')->getCalculatedValue();
        
        //Se saca el valor del campo de valores que contiene el total nacional
        $tot_col=$objPHPExcel->getActiveSheet(0)->getCell('J3')->getCalculatedValue();

        //funcion para sacar el último id de la tabla, para no crear conflictos de id
        
        $sql_lid="SELECT MAX(id) as id  FROM $modelo";
        $lid = Yii::app()->db->createCommand($sql_lid)->queryRow();
        $lastid=$lid['id'];
           

      


        
        /**********************   validaciones del periodo autorizado **********************/
        
        //el año sale del json
        
        
        
        //aca valido si ya existen registros similares para hacer un delete

       
          
          $sql_count="SELECT count(id) as cuenta FROM " .$modelo." where periodo_id=".$id_periodo;
          $cuenta = Yii::app()->db->createCommand($sql_count)->queryRow();

          if($cuenta['cuenta']>0){

              $sql_del="DELETE FROM ReporteEconimicoDev2.dbo.".$modelo." where periodo_id=".$id_periodo;
              $erase = Yii::app()->db->createCommand($sql_del)->queryRow();

              echo "Borre toda la información para el periodo ".$id_periodo." y la inserté de nuevo, ya lo habias cargado<br>";

          }else{
              //echo "La tabla estaba limpia<br>";

           
          }


        
        
        
        
        /*******************************************fin validaciones*************************/
        
	if($selector==1){
            //**Esto solo funciona si en el excel hay rubros, 
            //para df y nacional como columnas es un tratamiento diferente

            //aca voy a hacer un loop para todos los rubros
            for($rubro=1;$rubro<=$count_rubros;$rubro++){

                    //estas son las filas una por una para cada rubro
                    //arranca en 5, porque elimino las filas de la configuracion y los titulos
                    for ($i=5;$i<=$contar;$i++){

                            //en el arreglo se agrupan por rubros => filas => datos

                            foreach($comunes as $key=>$valor){
                                //estas son las letras de los comunes
                                $letra=letras($key);
                                $v = $objPHPExcel->getActiveSheet()->getCell($letra.$i)->getCalculatedValue();
                                if($v=="Total" and $modelo=="ap9Ind2"){$v=13;}
                                if($v=="Total" or $v=="Total "){$v=9000;}
                                
                                
                                

                                $_DATOS_EXCEL[$rubro][$i][$valor] = $v;

                            }

                            //aca saco las letras de los rubros
                            $cols_rubro=$rubro + $cuenta_comunes-1;
                            
                            $letra_rubro=letras($cols_rubro);
                            
                            
                            //verifico si el valor es null, lo paso a 0
                            $valor=$objPHPExcel->getActiveSheet()->getCell($letra_rubro.$i)->getCalculatedValue();
                            
                            
                            
                            //se valida si la columan esta marcada como total nacional y se cambia a 9000
                           
                          
                            if($rubro==$tot_col){
                                $r=9000;
                            }else{
                                $r=$rubro;
                            }
                            
                            
                            if($modelo == 'ap1Ind61' or $modelo == 'ap1Ind71'){
                              
                                $r=$rubro -1;
                            }
                            //solo para ek p3Ind31 ** si se requieren mas entidades se deben enlistar aca
                            if($rubro==1 and $modelo=="ap4Ind31"){
                                
                                $r=40;
                            }elseif($rubro==2 and $modelo=="ap4Ind31"){
                                $r=9;
                            }
                            
                            
                            
                            
                            
                            
                            if($modelo=="ap3Ind31" and $r<9000){  $r=$r-1;  }
                            
                           
                           
                            $_DATOS_EXCEL[$rubro][$i][$nombre_rubro] = $r;
                            $_DATOS_EXCEL[$rubro][$i]['valor']= $valor;

                            
                             //esto va en todos 
                            $_DATOS_EXCEL[$rubro][$i]['fecha_reg']= date("Y\-n\-j H:i:s");
                            $_DATOS_EXCEL[$rubro][$i]['fecha_mod']= date("Y\-n\-j H:i:s");
                            $_DATOS_EXCEL[$rubro][$i]['user_reg']= 1;
                            $_DATOS_EXCEL[$rubro][$i]['user_mod']= 0;


                    }
            }	
        }elseif($selector==2){
            //**Esto solo funciona si hay columnas df y nacional, 
            

                    //estas son las filas una por una para cada rubro
                    //arranca en 4, porque elimino las filas de la configuracion y los titulos
                    $r=0;
                    for ($i=5;$i<=$contar;$i++){
                            $r++;

                            //en el arreglo se agrupan por rubros => filas => datos

                            foreach($comunes as $key=>$valor){
                                
                                //estas son las letras de los comunes
                                $letra=letras($key);
                        
                                    //aqui verifico si el valor de los comunes es string o numerioco para asignarle un valor especifico
                                    $val_com[$i]=$objPHPExcel->getActiveSheet()->getCell($letra.$i)->getCalculatedValue();
                                    
                                    
                                    if($val_com[$i]=="Total"){$val_com[$i]=9000;}
                                    $_DATOS_EXCEL[$i][$valor] = $val_com[$i];
                                
                            }

                            //aca saco las letras del df, por convencion siempre iran en orden df -> nacional
                            

                            foreach($rubros as $key=>$valor){
                                
                                $columna=$cuenta_comunes+$key;
                               
                                $col=letras($columna);
                                $_DATOS_EXCEL[$i][$valor]= $objPHPExcel->getActiveSheet()->getCell($col.$i)->getCalculatedValue();
                            }

                             //esto va en todos 
                            $_DATOS_EXCEL[$i]['fecha_reg']= date("Y\-n\-j H:i:s");
                            $_DATOS_EXCEL[$i]['fecha_mod']= date("Y\-n\-j H:i:s");
                            $_DATOS_EXCEL[$i]['user_reg']= 1;
                            $_DATOS_EXCEL[$i]['user_mod']= 0;


                    }
           
        }elseif($selector==3){
            //**Esto aplica cuando hay sub rubros

                    //estas son las filas una por una para cada rubro
                    //arranca en 4, porque elimino las filas de la configuracion y los titulos
                    $fila=4;
                    for ($i=1;$i<=$num_rubros_ciclo;$i++){
                        
                        for($x=1;$x<=$num_subrubros;$x++){
                            $fila++;
                            
                            foreach($comunes as $key=>$valor){
                                
                                //estas son las letras de los comunes
                                $letra[$i]=letras($key);
                                
                                                       
                                    //aqui verifico si el valor de los comunes es string o numerioco para asignarle un valor especifico
                                    $val_com[$i]=$objPHPExcel->getActiveSheet()->getCell($letra[$i].$fila)->getCalculatedValue();
                                    
                                    if($letra[$i]==$nombre_rubro_entidad){
                                        //echo $val_com[$i];
                                        $sql = "SELECT id from ".$criterio_model." where nombre = '".$val_com[$i]."'"; 
                                        $nombre = Yii::app()->db->createCommand($sql)->queryRow();
            
                                        $val_com[$i]=$nombre['id'];
                                    }
                                    //solo para el ap5Ind23
                                    if(($val_com[$i]=="Total" or $val_com[$i]=="Total ") and $modelo=="ap5Ind23"){$val_com[$i]=$x;}
                                    
                                    //aqui paso los rubros a numeros y el valor total a 9000
                                    if($val_com[$i]=="Total" or $val_com[$i]=="Total "){$val_com[$i]=9000;}
                                    
                                    
                                    if($valor=="rubro" and $val_com[$i]!="9000"){ $val_com[$i]=$x; }
                                    
                                    $_DATOS_EXCEL[$i][$x][$valor] = $val_com[$i];
                                
                            }
                            //$i = Rubro  |   $x= Subrubro   |  $fila = fila del excel
                            //echo $fila."->".$i."=>".$x."<br>";
                            foreach($rubros as $key=>$valor){
                                
                                $columna=$cuenta_comunes+$key;
                               
                                $col=letras($columna);
                                $_DATOS_EXCEL[$i][$x][$valor]= $objPHPExcel->getActiveSheet()->getCell($col.$fila)->getCalculatedValue();
                            }
                             //esto va en todos 
                            $_DATOS_EXCEL[$i][$x]['fecha_reg']= date("Y\-n\-j H:i:s");
                            $_DATOS_EXCEL[$i][$x]['fecha_mod']= date("Y\-n\-j H:i:s");
                            $_DATOS_EXCEL[$i][$x]['user_reg']= 1;
                            $_DATOS_EXCEL[$i][$x]['user_mod']= 0;
                            
                        }
                            

                            

                    }
                    
                    
           
        }elseif($selector==4){
            //**Esto aplica cuando hay sub rubros

                    //estas son las filas una por una para cada rubro
                    //arranca en 4, porque elimino las filas de la configuracion y los titulos
                    $fila=4;
                    for ($i=1;$i<=$num_rubros_ciclo;$i++){
                        
                        for($x=1;$x<=$num_subrubros;$x++){
                            $fila++;
                            
                            foreach($comunes as $key=>$valor){
                                
                                //estas son las letras de los comunes
                                $letra[$i]=letras($key);
                                
                                                       
                                    //aqui verifico si el valor de los comunes es string o numerioco para asignarle un valor especifico
                                    $val_com[$i]=$objPHPExcel->getActiveSheet()->getCell($letra[$i].$fila)->getCalculatedValue();
                                    
                                    
                                    
                                    if($val_com[$i]=='Total' and $modelo=='ap6Ind11'){
                                        $val_com[$i]=0;
                                    }else{
                                        $val_com[$i]=$val_com[$i];
                                    }
                                    
                                    
                                    if($val_com[$i]=='Total' and $modelo=='ap6Ind13'){
                                        $val_com[$i]=5;
                                    }else{
                                        $val_com[$i]=$val_com[$i];
                                    }
                                    
                                    
                                    
                                    $_DATOS_EXCEL[$i][$x][$valor] = $val_com[$i];
                                    
                                    
                                    if($modelo=="ap1Ind4a"){
                                        $_DATOS_EXCEL[$i][$x][$nombre_rubro] = $i;
                                    }else{
                                        $_DATOS_EXCEL[$i][$x]['rubro'] = $i;
                                    }
                                
                            }
                            //$i = Rubro  |   $x= Subrubro   |  $fila = fila del excel
                            //echo $fila."->".$i."=>".$x."<br>";
                            foreach($rubros as $key=>$valor){
                                
                                $columna=$cuenta_comunes+$key;
                               
                                $col=letras($columna);
                                $_DATOS_EXCEL[$i][$x][$valor]= $objPHPExcel->getActiveSheet()->getCell($col.$fila)->getCalculatedValue();
                            }
                             //esto va en todos 
                            $_DATOS_EXCEL[$i][$x]['fecha_reg']= date("Y\-n\-j H:i:s");
                            $_DATOS_EXCEL[$i][$x]['fecha_mod']= date("Y\-n\-j H:i:s");
                            $_DATOS_EXCEL[$i][$x]['user_reg']= 1;
                            $_DATOS_EXCEL[$i][$x]['user_mod']= 0;
                            
                        }
                            

                            

                    }
                    
                    
           
        }elseif($selector==5){
            //**Esto solo funciona si en el excel hay rubros, 
            //para df y nacional como columnas es un tratamiento dif

                    //estas son las filas una por una para cada rubro
                    //arranca en 5, porque elimino las filas de la configuracion y los titulos
                    for ($i=5;$i<=$contar;$i++){
                        
                            //aca voy a hacer un loop para todos los rubros
                        for($rubro=1;$rubro<=$num_subrubros;$rubro++){
                            
                          
                                foreach($comunes as $key=>$valor){
                                    //estas son las letras de los comunes
                                    $letra=letras($key);
                                    $v = $objPHPExcel->getActiveSheet()->getCell($letra.$i)->getCalculatedValue();
                                    if($v=="Total" or $v=="Total "){$v=9000;}

                                    $_DATOS_EXCEL[$i][$rubro][$valor] = $v;

                                }

                                //aca saco las letras de los rubros
                                $cols_rubro=$rubro + $cuenta_comunes-1;

                                $letra_rubro=letras($cols_rubro);


                                //verifico si el valor es null, lo paso a 0
                                $valor=$objPHPExcel->getActiveSheet()->getCell($letra_rubro.$i)->getCalculatedValue();



                                //se valida si la columan esta marcada como total nacional y se cambia a 9000
                                if($rubro==$tot_col){
                                    $r=9000;
                                }else{
                                    $r=$rubro;
                                }


                                $_DATOS_EXCEL[$i][$rubro][$nombre_rubro] = $r;
                                $_DATOS_EXCEL[$i][$rubro]['valor']= $valor;


                                 //esto va en todos 
                                $_DATOS_EXCEL[$i][$rubro]['fecha_reg']= date("Y\-n\-j H:i:s");
                                $_DATOS_EXCEL[$i][$rubro]['fecha_mod']= date("Y\-n\-j H:i:s");
                                $_DATOS_EXCEL[$i][$rubro]['user_reg']= 1;
                                $_DATOS_EXCEL[$i][$rubro]['user_mod']= 0;    

                            
                    }
            }	
        }elseif($selector==6){
            //**Esto solo funciona si en el excel hay rubros, 
            //para df y nacional como columnas es un tratamiento dif
                    $c=0;
                    //estas son las filas una por una para cada rubro
                    //arranca en 5, porque elimino las filas de la configuracion y los titulos
                    for ($i=5;$i<=$contar;$i++){
                    $c++;    
                        
                        //aca voy a hacer un loop para todos los rubros
                        for($rubro=1;$rubro<=$num_subrubros;$rubro++){
                        
                            
                          
                                foreach($comunes as $key=>$valor){
                                    //estas son las letras de los comunes
                                    $letra=letras($key);
                                    $v = $objPHPExcel->getActiveSheet()->getCell($letra.$i)->getCalculatedValue();
                                    

                                    $_DATOS_EXCEL[$i][$rubro][$valor] = $v;

                                }

                                //aca saco las letras de los rubros
                                $cols_rubro=$rubro + $cuenta_comunes-1;

                                $letra_rubro=letras($cols_rubro);


                                //verifico si el valor es null, lo paso a 0
                                $valor=$objPHPExcel->getActiveSheet()->getCell($letra_rubro.$i)->getCalculatedValue();
                                
                                
                                //estos son los apartados
                                if($c == 1){
                                    $_DATOS_EXCEL[$i][$rubro]['apartado']= 1;
                                }elseif($c == 2){
                                    $_DATOS_EXCEL[$i][$rubro]['apartado']= 1;
                                }elseif($c == 3){
                                    $_DATOS_EXCEL[$i][$rubro]['apartado']= 2;
                                }elseif($c == 4){
                                    $_DATOS_EXCEL[$i][$rubro]['apartado']= 2;
                                }elseif($c == 5){
                                    $_DATOS_EXCEL[$i][$rubro]['apartado']= 3;
                                }elseif($c == 6){
                                    $_DATOS_EXCEL[$i][$rubro]['apartado']= 3;
                                }
                                
                                
                                //estos son los rubros2
                                if($rubro == 1){
                                    $_DATOS_EXCEL[$i][$rubro]['rubro2']= 1;
                                }elseif($rubro == 2){
                                    $_DATOS_EXCEL[$i][$rubro]['rubro2']= 2;
                                }elseif($rubro == 3){
                                    $_DATOS_EXCEL[$i][$rubro]['rubro2']= 1;
                                }elseif($rubro == 4){
                                    $_DATOS_EXCEL[$i][$rubro]['rubro2']= 2;
                                }elseif($rubro == 5){
                                    $_DATOS_EXCEL[$i][$rubro]['rubro2']= 1;
                                }elseif($rubro == 6){
                                    $_DATOS_EXCEL[$i][$rubro]['rubro2']= 2;
                                }         
                                
                                

                                $_DATOS_EXCEL[$i][$rubro][$nombre_rubro] = $c;
                                $_DATOS_EXCEL[$i][$rubro]['valor']= $valor;


                                 //esto va en todos 
                                $_DATOS_EXCEL[$i][$rubro]['fecha_reg']= date("Y\-n\-j H:i:s");
                                $_DATOS_EXCEL[$i][$rubro]['fecha_mod']= date("Y\-n\-j H:i:s");
                                $_DATOS_EXCEL[$i][$rubro]['user_reg']= 1;
                                $_DATOS_EXCEL[$i][$rubro]['user_mod']= 0;    

                            
                    }
            }	
        }
        //dejar estas lineas porque me da hueva escribirlas jaja
	//echo "<pre>";
	//print_r($_DATOS_EXCEL);	
	//echo "</pre>";
}



//si por algo no cargo el archivo bak_ 
else{ echo "Necesitas primero importar el archivo"; }
$errores=0;
$fecha_hoy =date("Y\-n\-j H:i:s");
$user = Yii::app()->user->id;


//aqui se concatenan los valores de los campos del excel
//antes de meterlos al loop, esto es para armar el query
$campos_comunes="";
foreach($comunes as $key=>$valor){
    $campos_comunes .=$valor.","; 
}

$rubros_val="";
foreach($rubros as $key=>$valor){
    $rubros_comunes .=$valor.","; 
}


//recorremos el arreglo multidimensional 
//para ir recuperando los datos obtenidos
//del excel e ir insertandolos en la BD

if($selector==1){
    
    //query para rubros, selector 1
    $i=$lastid;
    foreach($_DATOS_EXCEL as $rubro => $filas){

            foreach($filas as $fila=>$valores){
                $i++;

                //aqui acomodo los campos comunes para meterlos al insert
                foreach($comunes as $key=>$valor){
                    $campos_comunes_valor[$i] .=$valores[$valor].","; 
                }
                if($nombre_rubro!=''){
                    $nrubro=$nombre_rubro.",";
                    $val_rubro=$valores[$nombre_rubro].",";
                    
                }else{
                    $nrubro="";
                    $val_rubro=""; 
                }
                

                $sql = "INSERT INTO ReporteEconimicoDev2.dbo.".$modelo
                        . "(id,"
                        . $campos_comunes
                        . $nrubro ."valor, "
                        . "fecha_reg, fecha_mod, user_reg, user_mod,periodo_id"
                        . ") "
                        . "VALUES ("
                        .$i.","
                        .$campos_comunes_valor[$i]
                        . $val_rubro
                        .$valores['valor'].","

                        //Estos nunca cambian
                        ."'".$valores['fecha_reg']."' ,"
                        ."'".$valores['fecha_mod']."' ,"
                        .$valores['user_reg'].","
                        ."0,"
                        .$id_periodo.");" ;

                    
                    //echo "->".$sql."<br>";
                    $cmd = Yii::app()->db->createCommand($sql);
                    $cmd->execute();
                    //Yii::app()->db->createCommand($sql)->queryRow();
            }

    }
    
}elseif($selector==2){
    
    //query para df y nacional selector 2
    
    $i=$lastid;
    foreach($_DATOS_EXCEL as $fila=>$valores){
        $i++;

        //aqui acomodo los campos comunes para meterlos al insert
        foreach($comunes as $key=>$valor){
            
            $campos_comunes_valor[$i] .= $valores[$valor].","; 
        }
        
        foreach($rubros as $key=>$valor){
            
            
            $rubros_valores[$i] .= $valores[$valor].","; 
        }


        $sql = "INSERT INTO ReporteEconimicoDev2.dbo.".$modelo
                . "(id,"
                . $campos_comunes
                . $rubros_comunes
                . "fecha_reg, fecha_mod, user_reg, user_mod,periodo_id"
                . ") "
                . "VALUES ("
                .$i.","
                .$campos_comunes_valor[$i]
                .$rubros_valores[$i].""

                //Estos nunca cambian
                ."'".$valores['fecha_reg']."' ,"
                ."'".$valores['fecha_mod']."' ,"
                .$valores['user_reg'].","
                ."0,"
                        .$id_periodo.");" ;

            //echo "->".$sql."<br>";
            $cmd = Yii::app()->db->createCommand($sql);
            $cmd->execute();
        }
 
     
}elseif($selector==3){
    
    //query para df y nacional selector 2
    
    $i=$lastid;
    foreach($_DATOS_EXCEL as $fila=>$valores){
        
        foreach($valores as $rubro=>$val){
            $i++;

            //aqui acomodo los campos comunes para meterlos al insert
            foreach($comunes as $key=>$valor){
                $campos_comunes_valor[$i] .= $val[$valor].","; 
            }

            foreach($rubros as $key=>$valor){
                $rubros_valores[$i] .= $val[$valor].","; 
            }

            $sql = "INSERT INTO ReporteEconimicoDev2.dbo.".$modelo
                    . "(id,"
                    . $campos_comunes
                    . $rubros_comunes
                    . "fecha_reg, fecha_mod, user_reg, user_mod,periodo_id"
                    . ") "
                    . "VALUES ("
                    .$i.","
                    .$campos_comunes_valor[$i]
                    .$rubros_valores[$i].""

                    //Estos nunca cambian
                    ."'".$val['fecha_reg']."' ,"
                    ."'".$val['fecha_mod']."' ,"
                    .$val['user_reg'].","
                    ."0,"
                        .$id_periodo.");" ;

                //echo "--->".$sql."<br>";
                $cmd = Yii::app()->db->createCommand($sql);
                $cmd->execute();
        }
    }
 
     
}elseif($selector==4){
    
    //query para df y nacional selector 2
    
    $i=$lastid;
    foreach($_DATOS_EXCEL as $fila=>$valores){
        
        foreach($valores as $rubro=>$val){
            $i++;

            //aqui acomodo los campos comunes para meterlos al insert
            foreach($comunes as $key=>$valor){
                $campos_comunes_valor[$i] .= $val[$valor].","; 
            }

            foreach($rubros as $key=>$valor){
                $rubros_valores[$i] .= $val[$valor].","; 
            }
            
            $sql = "INSERT INTO ReporteEconimicoDev2.dbo.".$modelo
                    . "(id,"
                    . $campos_comunes
                    . $nombre_rubro.","
                    . $rubros_comunes
                    . "fecha_reg, fecha_mod, user_reg, user_mod,periodo_id"
                    . ") "
                    . "VALUES ("
                    .$i.","
                    .$campos_comunes_valor[$i]
                    .$val[$nombre_rubro].","
                    .$rubros_valores[$i].""

                    //Estos nunca cambian
                    ."'".$val['fecha_reg']."' ,"
                    ."'".$val['fecha_mod']."' ,"
                    .$val['user_reg'].","
                    ."0,"
                        .$id_periodo.");" ;

                //echo "--->".$sql."<br>";
                $cmd = Yii::app()->db->createCommand($sql);
                $cmd->execute();
        }
    }
 
     
}elseif($selector==5){
    
    //query para rubros, selector 1
    $i=$lastid;
    foreach($_DATOS_EXCEL as $rubro => $filas){

            foreach($filas as $fila=>$valores){
                $i++;

                //aqui acomodo los campos comunes para meterlos al insert
                foreach($comunes as $key=>$valor){
                    $campos_comunes_valor[$i] .=$valores[$valor].","; 
                }
                if($nombre_rubro!=''){
                    $nrubro=$nombre_rubro.",";
                    $val_rubro=$valores[$nombre_rubro].",";
                    
                }else{
                    $nrubro="";
                    $val_rubro=""; 
                }
                
               
                
                
                $sql = "INSERT INTO ReporteEconimicoDev2.dbo.".$modelo
                        . "(id,"
                        . $campos_comunes
                        . $nrubro 
                        . "valor, "
                        . "fecha_reg, fecha_mod, user_reg, user_mod,periodo_id"
                        . ") "
                        . "VALUES ("
                        . $i.","
                        . $campos_comunes_valor[$i]
                        . $val_rubro
                        . $valores['valor'].","
                        

                        //Estos nunca cambian
                        ."'".$valores['fecha_reg']."' ,"
                        ."'".$valores['fecha_mod']."' ,"
                        .$valores['user_reg'].","
                        ."0,"
                        .$id_periodo.");" ;

                    
                    //echo "->".$sql."<br>";
                    $cmd = Yii::app()->db->createCommand($sql);
                    $cmd->execute();
                    //Yii::app()->db->createCommand($sql)->queryRow();
            }

    }
    
}elseif($selector==6){
    
    //query para rubros, selector 1
    $i=$lastid;
    foreach($_DATOS_EXCEL as $rubro => $filas){

            foreach($filas as $fila=>$valores){
                $i++;

                //aqui acomodo los campos comunes para meterlos al insert
                foreach($comunes as $key=>$valor){
                    $campos_comunes_valor[$i] .=$valores[$valor].","; 
                }
                if($nombre_rubro!=''){
                    $nrubro=$nombre_rubro.",";
                    $val_rubro=$valores[$nombre_rubro].",";
                    
                }else{
                    $nrubro="";
                    $val_rubro=""; 
                }
                
               
                
                
                $sql = "INSERT INTO ReporteEconimicoDev2.dbo.".$modelo
                        . "(id,"
                        . $campos_comunes
                        . "rubro2,"
                        . $nrubro 
                        . "apartado,"
                        . "valor, "
                        . "fecha_reg, fecha_mod, user_reg, user_mod,periodo_id"
                        . ") "
                        . "VALUES ("
                        . $i.","
                        . $campos_comunes_valor[$i]
                        . $valores['rubro2'].","                        
                        . $val_rubro
                        . $valores['apartado'].","
                        . $valores['valor'].","
                        

                        //Estos nunca cambian
                        ."'".$valores['fecha_reg']."' ,"
                        ."'".$valores['fecha_mod']."' ,"
                        .$valores['user_reg'].","
                        ."0,"
                        .$id_periodo.");" ;

                    
                    //echo "->".$sql."<br>";
                    $cmd = Yii::app()->db->createCommand($sql);
                    $cmd->execute();
                    //Yii::app()->db->createCommand($sql)->queryRow();
            }

    }
    
}			
/////////////////////////////////////////////////////////////////////////

echo "<div class='alert alert-success' role='alert'><b>Archivo Importado con éxito</b>, en total ".$i." registros y ".$errores." errores</div>";

//una vez terminado el proceso borramos el 
//archivo que esta en el servidor el bak_
unlink($destino);
} else {

	echo "";
}

?>
    
  </div>
  <div class="col-md-3"></div>
</div>
