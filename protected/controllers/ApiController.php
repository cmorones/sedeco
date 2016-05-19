<?php


error_reporting(0);
class ApiController extends Controller {

public function actionAp1Ind1(){

$this->layout=false;

$resultado = Ap1Ind1::model()->findAll((array(
  //  'condition'=>'id_periodo=2',
    'order'=>'actividad'
	)));


foreach ($resultado as $key => $row) {

	    $resultado2 = Delegaciones::model()->findAll((array(

		    'order'=>'id'
			)));


		foreach ($resultado2 as $key2 => $row2) {

			if( !isset($json["informe"][$row["actividad"]][$row2["id"]])): 
			$json["informe"][$row["actividad"]][$row2["id"]] = array(
			
			'valor'=> 0,
		
          	);
	   		 endif;

	   		 if($json["informe"][$row["actividad"]][$row["municipio"]]): 
			$json["informe"][$row["actividad"]][$row["municipio"]] = array(
			
			'valor'=> $row["valor"],
		
          	);
	    endif;	

		}


		}  


			header('Content-type: application/json');  
			echo json_encode($json);  
			Yii::app()->end(); 
		}

    public function actionAp1Ind61($anio, $trim, $entidad, $grafico,$periodo,$texto=null){

    $this->layout=false;

    $anio_pasado=$anio-1;
    
    
 
    

            
            
            
            
            if($texto==null){
            
                if($grafico==0){

                    $result = Ap1Ind61::model()->findAll((array(
                    'condition'=>'anio in('.$anio.', '.$anio_pasado.') and  mes in ('.$trim.') and entidad in ('.$entidad.') and periodo_id='.$periodo,
                    'order'=>'entidad ASC'
                     )));

                    foreach ($result as $res) {

                            if(!isset($json["periodos"][$res["entidad"]][$res["anio"]][$res["mes"]]))
                            {
                                //$json["periodos"][$res["entidad"]][$res["anio"]][$res["mes"]] = $res["valor"];
                                $json["periodos"][$res["entidad"]][$res["anio"]]['suma']=$json["periodos"][$res["entidad"]][$res["anio"]]['suma']+$res["valor"];
                            }


                    }  
                    header('Content-type: application/json');  
                    echo json_encode($json);  
                    Yii::app()->end(); 
                 
                }else{
                    $sql = "SELECT anio,valor from ap1Ind61g where periodo_id=".$periodo; 
                    $val = Yii::app()->db->createCommand($sql)->queryAll();
                    
                    $series.="[";
                    $datos=count($val)-1;
                    foreach ($val as $key=>$valor) {
                        $series.=round($valor['valor'],2);

                        if($key<$datos){
                            $series.=",";
                        }


                    }
                    $series.="]";
      
            
             
                    header('Content-type: application/json');  
                    echo $series;  
                    Yii::app()->end(); 
                     
                    //aqui va la consulta del grafico
                }
            }else{
                    $sql = "SELECT anio from ap1Ind61g where periodo_id=".$periodo; 
                    $val = Yii::app()->db->createCommand($sql)->queryAll();
                    
                    $series.="[";
                    $datos=count($val)-1;
                    foreach ($val as $key=>$valor) {
                        $series.='"'.$valor['anio'].'"';

                        if($key<$datos){
                            $series.=",";
                        }


                    }
                    $series.="]";
      
            
             
                    header('Content-type: application/json');  
                    echo $series;  
                    Yii::app()->end(); 
                     
                    //aqui va la consulta del grafico
            }

            
    }
                
    public function actionAp1Ind62($anio, $trim_inicio, $trim_fin,$grafico,$periodo){

    $this->layout=false;



            $result = Ap1Ind62::model()->findAll((array(
            'condition'=>'anio ='.$anio.' and (mes between '.$trim_inicio.' and '.$trim_fin.') and periodo_id='.$periodo,
            'order'=>'rubro'
             )));

            foreach ($result as $res) {

                    if(!isset($json["periodos"][$res["rubro"]][$res["anio"]][$res["mes"]]))
                    {
                        if(!isset($json["periodos"][$res["rubro"]][$res["anio"]][$res["mes"]]))
                        {
                            $json["periodos"][$res["rubro"]][$res["anio"]]['suma']=$json["periodos"][$res["rubro"]][$res["anio"]]['suma']+$res["valor"];
                        }
                    }


            }  

            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    
    public function actionAp1Ind71($anio, $trim_inicio, $trim_fin, $entidad, $grafico,$periodo){

    $this->layout=false;

    $anio_pasado=$anio-1;
    
    
 
    

            $result = Ap1Ind71::model()->findAll((array(
            'condition'=>'anio in('.$anio.', '.$anio_pasado.') and  (mes between '.$trim_inicio.' and '.$trim_fin.') and entidad in ('.$entidad.') and periodo_id='.$periodo,
            'order'=>'entidad'
             )));
            
            
            
            foreach ($result as $res) {

                if(!isset($json["periodos"][$res["entidad"]][$res["anio"]])){

                    $json["periodos"][$res["entidad"]][$res["anio"]]=array(
                        'mes'=>array(),
                        'total'=>0,
                        
                        
                    );
                }

                if(!isset($json["periodos"][$res["entidad"]][$res["anio"]]['mes'][$res['mes']])){

                    $json["periodos"][$res["entidad"]][$res["anio"]]['mes'][$res['mes']]['valor']=$res['valor'];

                    $json["periodos"][$res["entidad"]][$res["anio"]]['total']=$json["periodos"][$res["entidad"]][$res["anio"]]['total']+$res['valor'];
                    
                }
                        
            }
            

            header('Content-type: application/json');  
            echo json_encode($json);
            //print_r($json);  
            Yii::app()->end(); 
    }
    
    public function actionAp1Ind72($anio, $trim_inicio, $trim_fin, $grafico,$periodo){

    $this->layout=false;

    $anio_pasado=$anio-1;
    
    
 
    

            $result = Ap1Ind72::model()->findAll((array(
            'condition'=>'anio in('.$anio.') and  (mes between '.$trim_inicio.' and '.$trim_fin.') and periodo_id='.$periodo,
            'order'=>'rubro'
             )));
            
            
            
            if($grafico==0){

                foreach ($result as $res) {

                        if(!isset($json["periodos"][$res["rubro"]][$res["anio"]][$res["mes"]]))
                        {
                            $json["periodos"][$res["rubro"]][$res["anio"]][$res["mes"]] = array(

                               "valor"=> $res["valor"],

                            );
                        }else{
                            $json["periodos"][$res["rubro"]][$res["anio"]][$res["mes"]] = array(

                               "valor"=> 0,

                            );

                        }


                }  
             
            }else{
                
                //aqui va la consulta del grafico
            }
            

            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    
    
    public function actionAp1Ind81($anios, $grafico,$periodo){

    $this->layout=false;

            $result = Ap1Ind81::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and periodo_id='.$periodo,
            'order'=>'entidad ASC'
             )));
            
            
            
            $sql = "SELECT SUM(valor) as total from ap1Ind81 where periodo_id=".$periodo; 
            $total = Yii::app()->db->createCommand($sql)->queryRow();
        

            foreach ($result as $res) {
                
                
                if(!isset($json['informe'])){

                    $json['informe']=array(
                        'entidad'=>array(),
                        'gran_total'=>$total['total'],
                    );

                }

                if(!isset($json['informe']['entidad'][$res['entidad']])){

                    $json['informe']['entidad'][$res['entidad']]=array(
                        'anio'=>array(),
                        'total'=>($json['informe']['entidad'][$res['entidad']]['total']),
                        
                    );
                    $totales= $json['informe']['entidad'][$res['entidad']]['total'];

                }
                
            
                if(!isset($json['informe']['entidad'][$res['entidad']][$res['anio']])){

                    $json['informe']['entidad'][$res['entidad']][$res['anio']]=array(
                        'valor'=>$res['valor'],
                        
                        
                    );
                    $json['informe']['entidad'][$res['entidad']]['total']=$json['informe']['entidad'][$res['entidad']]['total']+$json['informe']['entidad'][$res['entidad']][$res['anio']]['valor'];
                    
                }

                
                //$serie = HistoricoPeriodos::model()->listaSimple($totales);
                
            }
                
           
                
                

            /*$valores="";
            $valores.="[";

            for($x=1;$x<=32;$x++){
                
                $valores.=$json['informe']['entidad'][$x]['total'];
                if($x<32){
                    $valores.=",";
                }

            }
            $valores.="]";*/

            //serie de vlores
            $valores=array();
            for($x=1;$x<=32;$x++){
                
                $val= array_push($valores, $json['informe']['entidad'][$x]['total']);
                
            }
            $orden = array();
            foreach ($valores as $key => $row)
                {
                    $orden[$key] = $row;
                } 
            //aca ordeno el arreglo sumatorias y lo regreso acomodado   
            array_multisort($orden, SORT_DESC, $valores);




            /*
            //serie de titulos
            //serie de vlores
            $valores2=array();
            for($x=1;$x<=32;$x++){
                
                $val= array_push($valores2, $json['informe']['entidad'][$x]);
                
            }
            $orden2 = array();
            foreach ($valores2 as $key => $row)
                {
                    $orden2[$key] = $row;
                } 
            //aca ordeno el arreglo sumatorias y lo regreso acomodado   
            array_multisort($orden2, SORT_DESC, $valores2);

            */

            //echo "<pre>";
            //print_r($valores);
            //echo "</pre>";

            $serie = HistoricoPeriodos::model()->listaSimple($valores);
            
            //se debe agragar la serie de los titutlos
            //if($){
                 if($grafico==0){
                    header('Content-type: application/json');  
                    echo json_encode($json);  
                    Yii::app()->end(); 
                 }else{
                    header('Content-type: application/json');      
                    echo "[".$serie."]";  
                    Yii::app()->end(); 
                 }
             //}
    }
    
    public function actionAp1Ind82($anios, $grafico,$periodo){

    $this->layout=false;

            $result = Ap1Ind82::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and id > 1 and periodo_id='.$periodo,
            'order'=>'valor DESC'
             )));
            //saco el total el >1 significa que no debe tomar el valor de la columna 1, porque es un total en si
            $sql = "SELECT AVG(valor) as total from ap1Ind82 where rubro = 1 and periodo_id=".$periodo; 
            $total = Yii::app()->db->createCommand($sql)->queryRow();
            
            foreach ($result as $res) {
                if(!isset($json['informe'])){

                    $json['informe']=array(
                        'rubro'=>array(),
                        'gran_total'=>$total['total'],
                    );

                }

                if(!isset($json['informe']['rubro'][$res['rubro']])){

                    $json['informe']['rubro'][$res['rubro']]=array(
                        'anio'=>array(),
                        'total'=>  0,
                        
                    );

                }
                
                if(!isset($json['informe']['rubro'][$res['rubro']][$res['anio']])){

                    $json['informe']['rubro'][$res['rubro']][$res['anio']]=array(
                        'valores'=>array(),
                        
                    );

                }
                if(!isset($json['informe']['rubro'][$res['rubro']][$res['anio']][$res['valor']])){

                    $json['informe']['rubro'][$res['rubro']][$res['anio']][$res['valor']]=array(
                        'valores'=>$res['valor'],
                       
                        
                    );
                    $json['informe']['rubro'][$res['rubro']]['total']=$json['informe']['rubro'][$res['rubro']]['total']+$res['valor'];
                    
                }
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    public function actionAp1Ind83($anios, $grafico,$periodo){

    $this->layout=false;

            $result = Ap1Ind83::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and periodo_id='.$periodo,
            'order'=>'rubro ASC'
             )));
            
            $sql = "SELECT SUM(valor) as total from ap1Ind83 where periodo_id=".$periodo; 
            $total = Yii::app()->db->createCommand($sql)->queryRow();

            foreach ($result as $res) {
                if(!isset($json['informe'])){

                    $json['informe']=array(
                        'rubro'=>array(),
                        'gran_total'=>$total['total']
                        
                    );

                }

                
                
                if(!isset($json['informe']['rubro'][$res['rubro']][$res['anio']][$res['valor']])){

                    $json['informe']['rubro'][$res['rubro']][$res['anio']]['valor']=$res['valor'];
                    
                }
                
                if(!isset($json['informe']['rubro'][$res['rubro']][$res['anio']][$res['datop']])){

                    $json['informe']['rubro'][$res['rubro']][$res['anio']]['datop']=$res['datop'];
                    
                }
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    
    
    public function actionAp1Ind9($anios, $grafico,$periodo){

    $this->layout=false;

            $result = Ap1Ind9::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and periodo_id='.$periodo,
            'order'=>'rubro ASC'
             )));
            
           
            foreach ($result as $res) {
                if(!isset($json['informe'])){

                    $json['informe']=array(
                        'rubro'=>array(),
                        
                    );

                }

                
                
                if(!isset($json['informe']['rubro'][$res['rubro']][$res['anio']][$res['valor']])){

                    $json['informe']['rubro'][$res['rubro']][$res['anio']]['valor']=$res['valor'];
                    
                }
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    public function actionAp1Ind10($anios, $trim_inicio, $trim_fin, $grafico,$periodo){

    $this->layout=false;

            $result = Ap1Ind10::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and (mes between '.$trim_inicio.' and '.$trim_fin.') and periodo_id='.$periodo,
            'order'=>'rubro ASC'
             )));
            //saco el total el >1 significa que no debe tomar el valor de la columna 1, porque es un total en si
            
            foreach ($result as $res) {
                if(!isset($json['informe'])){

                    $json['informe']=array(
                        'mes'=>array(),
                        
                    );

                }

                if(!isset($json['informe']['mes'][$res['mes']])){

                    $json['informe']['mes'][$res['mes']]=array(
                        
                        
                        
                    );

                }
                
                
                if(!isset($json['informe']['mes'][$res['mes']][$res['anio']][$res['rubro']][$res['valor']])){

                    $json['informe']['mes'][$res['mes']][$res['anio']][$res['rubro']]['valor']=$res['valor'];
                       
                        
                   
                    //$json['informe']['rubro'][$res['rubro']]['total']=$json['informe']['rubro'][$res['rubro']]['total']+$json['informe']['rubro'][$res['rubro']][$res['anio']][$res['valor']]['valores'];
                    
                }
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    public function actionAp2Ind1($anios, $trim_inicio, $trim_fin, $grafico,$periodo){

    $this->layout=false;

            $result = Ap2Ind1::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and (mes between '.$trim_inicio.' and '.$trim_fin.') and periodo_id='.$periodo,
            'order'=>'id ASC'
             )));
            //saco el total el >1 significa que no debe tomar el valor de la columna 1, porque es un total en si
            
            //saco el promedio del periodo que solicitan para df
            $sql = "SELECT AVG(df) as prom from ap2Ind1 where anio =".$anios." and (mes between ".$trim_inicio." and ".$trim_fin.") and periodo_id=".$periodo; 
            $promdf = Yii::app()->db->createCommand($sql)->queryRow();
           
            //saco el promedio del periodo que solicitan para nacional
            $sql1 = "SELECT AVG(nacional) as prom from ap2Ind1 where anio =".$anios." and (mes between ".$trim_inicio." and ".$trim_fin.") and periodo_id=".$periodo; 
            $promnal = Yii::app()->db->createCommand($sql1)->queryRow();
            
            
            foreach ($result as $res) {
                if(!isset($json['informe'])){

                    $json['informe']=array(
                        'anio'=>array(),
                        
                        
                    );

                }
                if(!isset($json['informe']['anio'][$res['anio']])){

                    $json['informe']['anio'][$res['anio']]=array(
                        'mes'=>array(),
                        'promedios'=>array(
                        'promediodf'=>$promdf['prom'],
                        'promnal'=>$promnal['prom'],
                            ),
                        
                        
                    );

                }
                if(!isset($json['informe']['anio'][$res['anio']]['mes'][$res['mes']])){

                    $json['informe']['anio'][$res['anio']]['mes'][$res['mes']]=array(
                        'df'=>$res['df'],
                        'nacional'=>$res['nacional'],
                        
                        
                    );

                }
                
               
                
                
                
                
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    public function actionAp2Ind2($anios, $grafico,$periodo){

    $this->layout=false;

            $result = Ap2Ind1::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and periodo_id='.$periodo,
            'order'=>'id ASC'
             )));
            //saco el total el >1 significa que no debe tomar el valor de la columna 1, porque es un total en si
            
            
            foreach ($result as $res) {
                if(!isset($json['informe'])){

                    $json['informe']=array(
                        'anio'=>array(),
                        
                        
                    );

            }
            if(!isset($json['informe']['anio'][$res['anio']])){

                $json['informe']['anio'][$res['anio']]=array(
                    'mes'=>array(),



                );

            }
            if(!isset($json['informe']['anio'][$res['anio']]['mes'][$res['mes']])){

                $json['informe']['anio'][$res['anio']]['mes'][$res['mes']]=array(
                    'df'=>$res['df'],
                    'nacional'=>$res['nacional'],


                );

            }
                  
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    public function actionAp2Ind3($anios, $trim_inicio, $trim_fin, $grafico,$periodo){

    $this->layout=false;

            $result = Ap2Ind3::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and (mes between '.$trim_inicio.' and '.$trim_fin.') and periodo_id='.$periodo,
            'order'=>'id ASC'
             )));
            //saco el total el >1 significa que no debe tomar el valor de la columna 1, porque es un total en si
            
            //saco el promedio del periodo que solicitan para df
            $sql = "SELECT AVG(df) as prom from ap2Ind3 where anio =".$anios." and (mes between ".$trim_inicio." and ".$trim_fin.") and periodo_id=".$periodo; 
            $promdf = Yii::app()->db->createCommand($sql)->queryRow();
           
            //saco el promedio del periodo que solicitan para nacional
            $sql1 = "SELECT AVG(nacional) as prom from ap2Ind3 where anio =".$anios." and (mes between ".$trim_inicio." and ".$trim_fin.") and periodo_id=".$periodo; 
            $promnal = Yii::app()->db->createCommand($sql1)->queryRow();
            
            
            foreach ($result as $res) {
                if(!isset($json['informe'])){

                    $json['informe']=array(
                        'anio'=>array(),
                        
                        
                    );

                }
                if(!isset($json['informe']['anio'][$res['anio']])){

                    $json['informe']['anio'][$res['anio']]=array(
                        'mes'=>array(),
                        'promedios'=>array(
                        'promediodf'=>$promdf['prom'],
                        'promnal'=>$promnal['prom'],
                            ),
                        
                        
                    );

                }
                if(!isset($json['informe']['anio'][$res['anio']]['mes'][$res['mes']])){

                    $json['informe']['anio'][$res['anio']]['mes'][$res['mes']]=array(
                        'df'=>$res['df'],
                        'nacional'=>$res['nacional'],
                        
                        
                    );

                }
         
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    
    public function actionAp2Ind4($anios, $grafico,$periodo){

    $this->layout=false;

            $result = Ap2Ind3::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and periodo_id='.$periodo,
            'order'=>'id ASC'
             )));
            //saco el total el >1 significa que no debe tomar el valor de la columna 1, porque es un total en si
            
            
            foreach ($result as $res) {
                if(!isset($json['informe'])){

                    $json['informe']=array(
                        'anio'=>array(),
                        
                        
                    );

            }
            if(!isset($json['informe']['anio'][$res['anio']])){

                $json['informe']['anio'][$res['anio']]=array(
                    'mes'=>array(),



                );

            }
            if(!isset($json['informe']['anio'][$res['anio']]['mes'][$res['mes']])){

                $json['informe']['anio'][$res['anio']]['mes'][$res['mes']]=array(
                    'df'=>$res['df'],
                    'nacional'=>$res['nacional'],


                );

            }
                  
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    public function actionAp2Ind3a($anios, $trim_inicio, $trim_fin, $grafico,$periodo){

    $this->layout=false;

            //en este indicador la nomenclatura de losd modelos no corresponde ya que se hizo con una lista anterior, pero no afecta el funcionamiento

            $result = Ap2Ind4::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and (mes between '.$trim_inicio.' and '.$trim_fin.') and periodo_id='.$periodo,
            'order'=>'id ASC'
             )));
            //saco el total el >1 significa que no debe tomar el valor de la columna 1, porque es un total en si
            
            //saco el promedio del periodo que solicitan para df
            $sql = "SELECT AVG(df) as prom from ap2Ind4 where anio =".$anios." and (mes between ".$trim_inicio." and ".$trim_fin.") and periodo_id=".$periodo; 
            $promdf = Yii::app()->db->createCommand($sql)->queryRow();
           
            //saco el promedio del periodo que solicitan para nacional
            $sql1 = "SELECT AVG(nacional) as prom from ap2Ind4 where anio =".$anios." and (mes between ".$trim_inicio." and ".$trim_fin.") and periodo_id=".$periodo; 
            $promnal = Yii::app()->db->createCommand($sql1)->queryRow();
            
            
            foreach ($result as $res) {
                if(!isset($json['informe'])){

                    $json['informe']=array(
                        'anio'=>array(),
                        
                        
                    );

                }
                if(!isset($json['informe']['anio'][$res['anio']])){

                    $json['informe']['anio'][$res['anio']]=array(
                        'mes'=>array(),
                        'promedios'=>array(
                        'promediodf'=>$promdf['prom'],
                        'promnal'=>$promnal['prom'],
                            ),
                        
                        
                    );

                }
                if(!isset($json['informe']['anio'][$res['anio']]['mes'][$res['mes']])){

                    $json['informe']['anio'][$res['anio']]['mes'][$res['mes']]=array(
                        'df'=>$res['df'],
                        'nacional'=>$res['nacional'],
                        
                        
                    );

                }
         
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    
    public function actionAp2Ind5($anios, $serie, $grafico,$periodo){

        
        
     //esto es solo grafico
     if($serie == 1){  $rubro='df'; }
     if($serie == 2){  $rubro='nacional'; }

        $sql = "SELECT $rubro from Ap2Ind5 where  anio in($anios) and periodo_id=".$periodo; 
        $val = Yii::app()->db->createCommand($sql)->queryAll();
        
        $series.="[";
        $datos=count($val)-1;
        foreach ($val as $key=>$valor) {
            $series.=round($valor[$rubro],2);

            if($key<$datos){
                $series.=",";
            }


        }
        $series.="]";
       
       
        header('Content-type: application/json');  
        echo $series;  
        Yii::app()->end(); 
    }
    public function actionAp2Ind5_textos($anios, $serie, $grafico,$periodo){

        
        
    

        $sql = "SELECT anio, mes from Ap2Ind5 where  anio in($anios) and periodo_id=".$periodo; 
        $val = Yii::app()->db->createCommand($sql)->queryAll();
        
        $series.="[";
        $datos=count($val);
        $i=0;
        foreach ($val as $texto) {
            $i++;
            $series.='"';

            switch ($texto['mes']) {
                case '1':
                    $series.= " Ene";
                    break;
                case '2':
                    $series.= " Feb";
                    break;
                case '3':
                    $series.= " Mar";
                    break;
                case '4':
                    $series.= " Abr";
                    break;
                case '5':
                    $series.= " May";
                    break;
                case '6':
                    $series.= " Jun";
                    break;
                case '7':
                    $series.= " Jul";
                    break;
                case '8':
                    $series.= " Ago";
                    break;
                case '9':
                    $series.= " Sep";
                    break;
                case '10':
                    $series.= " Oct";
                    break;
                case '11':
                    $series.= " Nov";
                    break;
                case '12':
                    $series.= " Dic";
                    break;
            }
            $series.=" ".$texto['anio'].'"';

            if($i<$datos){
                $series.=',';
            }


        }
        $series.="]";
       
       
        header('Content-type: application/json');  
        echo $series;  
        Yii::app()->end(); 
    }
    
    public function actionAp3Ind11($anios, $trimestre,$grafico,$periodo){
        
    $anio_ref=$anios-1;    

    $this->layout=false;

            $result = Ap3Ind11::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and trimestre = '.$trimestre.' and periodo_id='.$periodo,
            'order'=>'id ASC'
             )));
            
            $result2 = Ap3Ind11a::model()->findAll((array(
            'condition'=>'anio in('.$anios.', '.$anio_ref.') and periodo_id='.$periodo,
            'order'=>'id ASC'
             )));
            
            
            
            
            foreach ($result as $res) {
                
                
                if(!isset($json['informe'][$res['anio']][$res['delegacion']][$res['trimestre']])){

                   $json['informe'][$res['anio']][$res['delegacion']][$res['trimestre']]['pea']=$res['pea'];
                   $json['informe'][$res['anio']][$res['delegacion']][$res['trimestre']]['po']=$res['po'];
                

                }
                
                
                
            }
            
            foreach ($result2 as $res) {
                
                //rubro1 == trimestre
                
                if(!isset($json['informe2'][$res['rubro']][$res['anio']][$res['trimestre']])){

                   $json['informe2'][$res['rubro']][$res['anio']][$res['trimestre']]['pea']=$res['pea'];
                   $json['informe2'][$res['rubro']][$res['anio']][$res['trimestre']]['po']=$res['po'];
                   $json['informe2'][$res['rubro']][$res['anio']][$res['trimestre']]['pdes']=$res['pdes'];
                

                }
                
                
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    
    
    
    public function actionAp3Ind12($anios, $trimestre, $grafico,$periodo){

    $this->layout=false;

            $result = Ap3Ind12::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and trimestre = '.$trimestre.'and periodo_id='.$periodo,
            'order'=>'id ASC'
             )));
            //saco el total el >1 significa que no debe tomar el valor de la columna 1, porque es un total en si
            
            foreach ($result as $res) {
                
                
                if(!isset($json['informe'][$res['anio']][$res['delegacion']][$res['trimestre']][$res['rubro']])){

                   $json['informe'][$res['anio']][$res['delegacion']][$res['trimestre']][$res['rubro']]['valor']=$res['valor'];
                 
                }
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
     public function actionAp3Ind2($anios, $trimestres, $grafico,$periodo){

    $this->layout=false;

            $result = Ap3Ind2::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and trimestre in('.$trimestres.')and periodo_id='.$periodo,
            'order'=>'id ASC'
             )));
            
            
            
            //se necesita un anio anterior
            $anio_ref=$anios-1;
            $result2 = Ap3Ind2a::model()->findAll((array(
            'condition'=>'anio in('.$anios.', '.$anio_ref.') and trimestre in('.$trimestres.') and periodo_id='.$periodo,
            'order'=>'id ASC'
             )));
            
            foreach ($result as $res) {
                
                
                if(!isset($json['informe'][$res['anio']][$res['delegacion']][$res['trimestre']][$res['rubro']])){

                   $json['informe'][$res['anio']][$res['delegacion']][$res['trimestre']][$res['rubro']]['valor']=$res['valor'];
                 
                }
                
            }
            
            
            foreach ($result2 as $res) {
                
                
                if(!isset($json['informe2'][$res['anio']][$res['rubro']][$res['trimestre']])){

                   $json['informe2'][$res['rubro']][$res['anio']][$res['trimestre']]['pea']=$res['pea'];
                   $json['informe2'][$res['rubro']][$res['anio']][$res['trimestre']]['po']=$res['po'];
                   $json['informe2'][$res['rubro']][$res['anio']][$res['trimestre']]['pdes']=$res['pdes'];
                 
                }
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    
    public function actionAp3Ind31($anios,$trim_inicio, $trim_fin, $entidades, $grafico,$periodo){

    $this->layout=false;
    //set_time_limit(180);
    $anio_rf=$anios-1;
            $result = Ap3Ind31::model()->findAll((array(
            'condition'=>'anio in('.$anios.','.$anio_rf.') and  (mes between '.$trim_inicio.' and '.$trim_fin.') and entidad in ('.$entidades.') and periodo_id='.$periodo,
            'order'=>'entidad ASC'
             )));
            //saco el total el >1 significa que no debe tomar el valor de la columna 1, porque es un total en si
            
            foreach ($result as $res) {
                
                if(!isset($json['informe'][$res['anio']][$res['entidad']])){

                   $json['informe'][$res['anio']][$res['entidad']]=  array(
                       
                       'suma'=>0,
                       'promedio' =>0,
                       
                       'resta' =>0
                       
                       
                   );
               
                

                }
                
                if(!isset($json['informe'][$res['anio']][$res['entidad']]['mes'][$res['mes']])){

                   //VErificar la consistencia de estaos datos *****************************
                    
                    //aqui valido si el mes es 1, debe consultar el 12 del año anterior
                   $anio_ref=$res['anio'];
                   
                   if($res['mes'] == 1){ 
                       
                       $mes_ant=12; $anio_ref= $res['anio']-1; 
                       
                   }else{
                       
                       $mes_ant=$res['mes']-1; $anio_ref= $res['anio']; 
                       
                   }
                   
                   //mes actual
                   
                   $sql = "SELECT valor from ap3Ind31 where mes = ".$mes_ant." and anio = ".$anio_ref." and mes < 9000 and entidad =".$res['entidad'].'and periodo_id='.$periodo; 
                   
                   $mes[$res['mes']] = Yii::app()->db->createCommand($sql)->queryRow();
                   
                                  
                   
                   
                   $json['informe'][$res['anio']][$res['entidad']]['resta'] += $res['valor'] - $mes[$res['mes']]['valor'] ;
                  
                   //$json['informe'][$res['anio']][$res['entidad']]['resta_acumulada'] = $json['informe'][$res['anio']][$res['entidad']]['resta_acumulada'] + $json['informe'][$res['anio']][$res['entidad']][$res['mes']]['resta'] ;
                   
                   
                   //esta es la sumatoria 
                   $json['informe'][$res['anio']][$res['entidad']]['suma'] = $json['informe'][$res['anio']][$res['entidad']]['suma'] + $res['valor'];

                }
                
                if(!isset($json['informe'][$res['anio']][$res['entidad']]['mes'][$res['mes']]['valor'][$res['valor']])){

               
               
                   $json['informe'][$res['anio']][$res['entidad']]['promedio'] = $json['informe'][$res['anio']][$res['entidad']]['suma']/$trim_fin;

                }
                
                
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    
    
    public function actionAp3Ind31g1($anios, $serie, $grafico,$periodo){
        
     //esto es solo grafico
      
         
        //esto es solo grafico
        if($serie == 1){  $rubro='df'; }
        if($serie == 2){  $rubro='nacional'; }

        $sql = "SELECT $rubro from Ap3Ind31g1 where anio in($anios) and periodo_id=".$periodo; 
        $val = Yii::app()->db->createCommand($sql)->queryAll();
        
        $series.="[";
        $datos=count($val)-1;
        foreach ($val as $key=>$valor) {
            $series.=round($valor[$rubro],2);

            if($key<$datos){
                $series.=",";
            }


        }
        $series.="]";
       
         
         header('Content-type: application/json');  
        echo $series;  
        Yii::app()->end(); 
    }
    public function actionAp3Ind31g1_textos($anios, $serie, $grafico,$periodo){
        
     //esto es solo grafico
    
        
       
        
        $sql = "SELECT mes from Ap3Ind31g1 where anio in($anios) and periodo_id=".$periodo; 
        $val = Yii::app()->db->createCommand($sql)->queryAll();
        
        $series.="[";
        $datos=count($val);
        $i=0;
        foreach ($val as $texto) {
            $i++;
            $series.='"';

            switch ($texto['mes']) {
                case '1':
                    $series.= " Enero";
                    break;
                case '2':
                    $series.= " Febrero";
                    break;
                case '3':
                    $series.= " Marzo";
                    break;
                case '4':
                    $series.= " Abril";
                    break;
                case '5':
                    $series.= " Mayo";
                    break;
                case '6':
                    $series.= " Junio";
                    break;
                case '7':
                    $series.= " Julio";
                    break;
                case '8':
                    $series.= " Agosto";
                    break;
                case '9':
                    $series.= " Septiembre";
                    break;
                case '10':
                    $series.= " Octubre";
                    break;
                case '11':
                    $series.= " Noviembre";
                    break;
                case '12':
                    $series.= " Diciembre";
                    break;
            }
            $series.=" ".$texto['anio'].'"';

            if($i<$datos){
                $series.=',';
            }
        }
        $series.="]";
       
         
        header('Content-type: application/json');  
        echo $series;  
        Yii::app()->end(); 
    }
    
    
    
    public function actionAp3Ind31g2($anios,$serie, $grafico,$periodo){
        
     //esto es solo grafico
      
        $sql = "SELECT rubro,valor from Ap3Ind31g2 where anio in($anios) and periodo_id=".$periodo; 
        $val = Yii::app()->db->createCommand($sql)->queryAll();
        
        $series.="[";
        $datos=count($val)-1;
        foreach ($val as $key=>$valor) {
            $series.='["'.$valor['rubro'].'",'.round($valor['valor'],2)."]";

            if($key<$datos){
                $series.=",";
            }


        }
        $series.="]";
       
        
        header('Content-type: application/json');  
        echo $series;  
        Yii::app()->end(); 
    }
    
    public function actionAp3Ind31g3($anios, $serie, $grafico,$periodo){
        
     //esto es solo grafico
        $sql = "SELECT rubro,valor from Ap3Ind31g3 where anio in($anios) and periodo_id=".$periodo; 
        $val = Yii::app()->db->createCommand($sql)->queryAll();
        
        $series.="[";
        $datos=count($val)-1;
        foreach ($val as $key=>$valor) {
            $series.=round($valor['valor'],2);

            if($key<$datos){
                $series.=",";
            }


        }
        $series.="]";
  
        
         
         header('Content-type: application/json');  
        echo $series;  
        Yii::app()->end(); 
    }
    
    
    public function actionAp3Ind32($serie, $grafico,$periodo){
        
     //esto es solo grafico
     if($serie == 1){   
         
        $json = array(
                0.33,
                0.5,
                0.97,
                0.71,
                0.16,
                -0.19,
                -0.04,
                0.29,
                0.41,
                0.13,
                0.54,
                0.86,
                0.65,
                0.3,
                0.29,
                0.2,
                0.24,
                0.04
        );
        
     }else{
         
         $json = array(
                0.4,
                0.49,
                0.73,
                0.07,
                -0.33,
                -0.06,
                -0.03,
                0.28,
                0.38,
                0.48,
                0.93,
                0.57,
                0.89,
                0.25,
                0.27,
                -0.19,
                -0.32,
                0.17

        );
         
     }
         
         
         header('Content-type: application/json');  
        echo json_encode($json);  
        Yii::app()->end(); 
    }
    
    
    
    
    public function actionAp3Ind4($anios, $grafico,$periodo){

    $this->layout=false;

            $result = Ap3Ind4::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and periodo_id='.$periodo,
            'order'=>'rubro ASC'
             )));
            //saco el total el >1 significa que no debe tomar el valor de la columna 1, porque es un total en si
            
            foreach ($result as $res) {
                
                
                if(!isset($json['informe'][$res['anio']][$res['rubro']][$res['mes']])){

                   $json['informe'][$res['anio']][$res['rubro']][$res['mes']]['df']=$res['df'];
                   $json['informe'][$res['anio']][$res['rubro']][$res['mes']]['nacional']=$res['nacional'];
                

                }
                
                
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    public function actionAp3Ind5($anios, $grafico,$periodo){

    $this->layout=false;

            $result = Ap3Ind5::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and periodo_id='.$periodo,
            'order'=>'mes ASC'
             )));
            //saco el total el >1 significa que no debe tomar el valor de la columna 1, porque es un total en si
            
            foreach ($result as $res) {
                
                
                if(!isset($json['informe'][$res['anio']][$res['rubro']][$res['mes']])){

                   $json['informe'][$res['anio']][$res['rubro']][$res['mes']]['valor']=$res['valor'];
                   
                

                }
                
                
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    
    public function actionAp4Ind11($anios, $grafico,$periodo){

    $this->layout=false;

            $result = Ap4Ind11::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and periodo_id='.$periodo,
            'order'=>'delegacion ASC'
             )));
            
            foreach ($result as $res) {
                
               
               if(!isset($json['informe'][$res['anio']])){
                   $json['informe'][$res['anio']]=array(
                       'delegacion'=>array(),
                       
                   );
                   
                   
                } 
                
               if(!isset($json['informe'][$res['anio']]['delegacion'][$res['delegacion']])){
                   $json['informe'][$res['anio']]['delegacion'][$res['delegacion']]=array(
                       
                       'rubro'=>array(),
                       'total'=>0
                       
                   );
                   
                   
                }
                
                 if(!isset($json['informe'][$res['anio']]['delegacion'][$res['delegacion']]['rubro'][$res['rubro']])){
                   $json['informe'][$res['anio']]['delegacion'][$res['delegacion']]['rubro'][$res['rubro']]['valor']=$res['valor'];
                   $json['informe'][$res['anio']]['delegacion'][$res['delegacion']]['total']=$json['informe'][$res['anio']]['delegacion'][$res['delegacion']]['total']+$res['valor'];
                   
                }
                
                
                
                
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    
    public function actionAp4Ind12($anios, $grafico,$periodo){

    $this->layout=false;
    
    $anio_ref=$anios-1;
            //esta es la consulta del primer arreglo
            $result = Ap4Ind12::model()->findAll((array(
            'condition'=>'anio in('.$anios.','.$anio_ref.') and periodo_id='.$periodo,
            'order'=>'rubro ASC'
             )));
            
           
            
            
            
            foreach ($result as $res) {
                
               
               if(!isset($json['informe'][$res['trimestre']][$res['anio']])){
                   $json['informe'][$res['trimestre']][$res['anio']]=array(
                       'rubro'=>array(),
                       
                   );
                   
                   
                } 
                
               if(!isset($json['informe'][$res['trimestre']][$res['anio']]['rubro'][$res['rubro']])){
                   $json['informe'][$res['trimestre']][$res['anio']]['rubro'][$res['rubro']]=array(
                       
                       'columna'=>array(),
                       'suma'=>0
                       
                       
                       
                   );
                   
                   
                }
                
                 if(!isset($json['informe'][$res['trimestre']][$res['anio']]['rubro'][$res['rubro']]['columna'][$res['rubro2']])){
                     
                     
                   $json['informe'][$res['trimestre']][$res['anio']]['rubro'][$res['rubro']]['columna'][$res['rubro2']]['valor']=$res['valor'];
                   $json['informe'][$res['trimestre']][$res['anio']]['rubro'][$res['rubro']]['suma'] = $json['informe'][$res['trimestre']][$res['anio']]['rubro'][$res['rubro']]['suma'] + $res['valor'];
                           
                }
                
              
            }
            
            //termina el primer arreglo
            $anio_ref=$anios-1;
            //esta es la consulta del segundo arreglo
            $result2 = Ap4Ind12a::model()->findAll((array(
            'condition'=>'anio in('.$anios.','.$anio_ref.') and periodo_id='.$periodo,
            'order'=>'rubro ASC'
             )));
            
    
            //---> inicia el segundo
            
            //********el apartado se refiere a la union de cada una de las 2 columnas, total y areas mas urbanizadas, son 3 rubros
            foreach ($result2 as $res) {
                
               
               if(!isset($json['informe2'][$res['trimestre']][$res['anio']])){
                   $json['informe2'][$res['trimestre']][$res['anio']]=array(
                       'rubro'=>array(),
                       
                   );
                   
                   
                } 
                
               if(!isset($json['informe2'][$res['trimestre']][$res['anio']]['rubro'][$res['rubro']])){
                   $json['informe2'][$res['trimestre']][$res['anio']]['rubro'][$res['rubro']]=array(
                       
                       'columna'=>array(),
                       'suma'=>0
                       
                       
                       
                   );
                   
                   
                }
                
                 if(!isset($json['informe2'][$res['trimestre']][$res['anio']]['rubro'][$res['rubro']]['columna'][$res['rubro2']])){
                     
                     
                   $json['informe2'][$res['trimestre']][$res['anio']]['rubro'][$res['rubro']]['columna'][$res['rubro2']]['valor']=$res['valor'];
                   $json['informe2'][$res['trimestre']][$res['anio']]['rubro'][$res['rubro']]['suma'] = $json['informe'][$res['trimestre']][$res['anio']]['rubro'][$res['rubro']]['suma'] + $res['valor'];
                           
                }





                //arreglo 3
                 if(!isset($json['informe3'][$res['apartado']][$res['trimestre']][$res['anio']])){
                   $json['informe3'][$res['apartado']][$res['trimestre']][$res['anio']]=array(
                       'rubro'=>array(),
                       
                   );
                   
                   
                } 
                
               if(!isset($json['informe3'][$res['apartado']][$res['trimestre']][$res['anio']]['rubro'][$res['rubro']])){
                   $json['informe3'][$res['apartado']][$res['trimestre']][$res['anio']]['rubro'][$res['rubro']]=array(
                       
                       'columna'=>array(),
                       'suma'=>0
                       
                       
                       
                   );
                   
                   
                }
                
                 if(!isset($json['informe3'][$res['apartado']][$res['trimestre']][$res['anio']]['rubro'][$res['rubro']]['columna'][$res['rubro2']])){
                     
                     
                   $json['informe3'][$res['apartado']][$res['trimestre']][$res['anio']]['rubro'][$res['rubro']]['columna'][$res['rubro2']]['valor']=$res['valor'];
                   $json['informe3'][$res['apartado']][$res['trimestre']][$res['anio']]['rubro'][$res['rubro']]['suma'] = $json['informe3'][$res['apartado']][$res['trimestre']][$res['anio']]['rubro'][$res['rubro']]['suma'] + $res['valor'];
                           
                }
                
                
              
            }
            


            
            
            
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    
   
    public function actionAp4Ind2($anios, $grafico,$periodo){

    $this->layout=false;

            $result = Ap4Ind2::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and periodo_id='.$periodo,
            'order'=>'id ASC'
             )));
            //saco el total el >1 significa que no debe tomar el valor de la columna 1, porque es un total en si
            
            foreach ($result as $res) {
                
                
                if(!isset($json['informe'][$res['anio']][$res['mes']])){

                   $json['informe'][$res['anio']][$res['mes']]['df']=$res['df'];
                   $json['informe'][$res['anio']][$res['mes']]['nacional']=$res['nacional'];
                

                }
                
                
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    public function actionAp4Ind31($anios, $trim_inicio, $trim_fin, $entidades, $grafico,$periodo){

    $this->layout=false;

            $result = Ap4Ind31::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and  (mes between '.$trim_inicio.' and '.$trim_fin.') and entidad in ('.$entidades.') and periodo_id='.$periodo,
            'order'=>'entidad ASC'
             )));
            
            
            
            foreach ($result as $res) {
                
                
                
                if(!isset($json['informe'][$res['anio']][$res['entidad']])){

                    $json['informe'][$res['anio']][$res['entidad']]=array(
                       
                        'mes'=>array(),
                        'promedio'=>0,
                        
                        
                    );

                }
                if(!isset($json['informe'][$res['anio']][$res['entidad']]['mes'][$res['mes']])){

                    $json['informe'][$res['anio']][$res['entidad']]['mes'][$res['mes']]=array(
                        'valor'=>array(),
                        
                    );

                }
                
                if(!isset($json['informe'][$res['anio']][$res['entidad']]['mes'][$res['mes']][$res['valor']])){

                    $json['informe'][$res['anio']][$res['entidad']]['mes'][$res['mes']]['valor']=$res['valor'];
                    
                    $json['informe'][$res['anio']][$res['entidad']]['promedio']=$json['informe'][$res['anio']][$res['entidad']]['promedio']+$json['informe'][$res['anio']][$res['entidad']]['mes'][$res['mes']]['valor'];

                }
                
               
                
                
                
                
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    
    
    public function actionAp4Ind32($entidades, $grafico,$periodo){

    $this->layout=false;

            $result = Ap4Ind31::model()->findAll((array(
            'condition'=>' entidad in ('.$entidades.') and periodo_id='.$periodo,
            'order'=>'anio ASC'
             )));
            
            
            
            foreach ($result as $res) {
                
                
                
                if(!isset($json['informe'][$res['anio']])){
                    
                    $sql = "SELECT AVG(valor) as prom from ap4Ind31 where  anio = ".$res['anio']." and entidad =9 and periodo_id=".$periodo; 
                    $promdf = Yii::app()->db->createCommand($sql)->queryRow();
                   
                    $sql = "SELECT AVG(valor) as prom from ap4Ind31 where  anio = ".$res['anio']." and entidad =40 and periodo_id=".$periodo; 
                    $promnal = Yii::app()->db->createCommand($sql)->queryRow();
                   

                    $json['informe'][$res['anio']]=array(
                       
                        'promedional'=>$promnal['prom'],
                        'promediodf'=>$promdf['prom'],
                        
                        
                    );

                }
                 if(!isset($json['informe'][$res['anio']][$res['mes']])){
                 
                     $json['informe'][$res['anio']][$res['mes']]=array();
                     
                 }
                
                if(!isset($json['informe'][$res['anio']]['valores'][$res['mes']][$res['entidad']][$res['valor']])){

                    $json['informe'][$res['anio']]['valores'][$res['mes']][$res['entidad']]['valor']=$res['valor'];
                    
                    //$json['informe'][$res['anio']][$res['mes']]['promedio']=$json['informe'][$res['anio']][$res['mes']]['promedio']+$res['valor'];

                }
                
               
                
                
                
                
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    
    
    
    
    public function actionAp4Ind4($anios, $grafico,$periodo){

    $this->layout=false;

            $result = Ap4Ind4::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and periodo_id='.$periodo,
            'order'=>'entidad ASC'
             )));
            
            foreach ($result as $res) {
                
                
               if(!isset($json['informe'][$res['entidad']][$res['anio']]['mes'][$res['mes']])){

                   $json['informe'][$res['entidad']][$res['anio']]['mes'][$res['mes']]['valor']=$res['valor'];
                   
                

                }
                
                
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    public function actionAp5Ind1($anios, $grafico,$periodo){

    $this->layout=false;

            $result = Ap5Ind1::model()->findAll((array(
            'condition'=>'anio in('.$anios.')  and periodo_id='.$periodo,
            'order'=>'rubro ASC'
             )));
            
            
            
            foreach ($result as $res) {
                
                
                
                if(!isset($json['informe'][$res['anio']])){

                    $json['informe'][$res['anio']]=array(
                       
                        'entidad'=>array(),
                        
                        
                        
                    );

                }
                if(!isset($json['informe'][$res['anio']]['entidad'][$res['entidad']])){

                    $json['informe'][$res['anio']]['entidad'][$res['entidad']]=array(
                        'rubro'=>array(),
                        
                    );

                }
                
                if(!isset($json['informe'][$res['anio']]['entidad'][$res['entidad']]['rubro'][$res['rubro']])){
                    
                    $json['informe'][$res['anio']]['entidad'][$res['entidad']]['rubro'][$res['rubro']]=array(
                        'mes'=>array(),
                    );
                   
                    
                    
                }
                
                if(!isset($json['informe'][$res['anio']]['entidad'][$res['entidad']]['rubro'][$res['rubro']]['mes'][$res['mes']])){
                    
                    $json['informe'][$res['anio']]['entidad'][$res['entidad']]['rubro'][$res['rubro']]['mes'][$res['mes']]=array(
                        'valor'=>array(),
                    );
                   
                    
                    
                }
                
                if(!isset($json['informe'][$res['anio']]['entidad'][$res['entidad']]['rubro'][$res['rubro']]['mes'][$res['mes']]['valor'][$res['valor']])){
                    
                    $json['informe'][$res['anio']]['entidad'][$res['entidad']]['rubro'][$res['rubro']]['mes'][$res['mes']]['valor']=$res['valor'];
                   
                    
                    
                }
                
               
                
                
                
                
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    
    public function actionAp5Ind21($anios, $grafico,$periodo){

    $this->layout=false;

            $result = Ap5Ind21::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and periodo_id='.$periodo,
            'order'=>'rubro ASC'
             )));
            
            foreach ($result as $res) {
                
                
               if(!isset($json['informe'])){

                   $json['informe'][$res['rubro']]['valor']=$res['valor'];
                   
                

                }
                
                
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    public function actionAp5Ind22($anios, $grafico,$periodo){

    $this->layout=false;

            $result = Ap5Ind22::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and periodo_id='.$periodo,
            'order'=>'rubro ASC'
             )));
            
            foreach ($result as $res) {
                
               
               if(!isset($json['informe'][$res['anio']])){
                   $json['informe'][$res['anio']]=array(
                       'rubro'=>array(),
                       'suma'=>0,
                   );
                   
                   
                } 
                
               if(!isset($json['informe'][$res['anio']]['rubro'][$res['rubro']])){
                   $json['informe'][$res['anio']]['rubro'][$res['rubro']]=array(
                       
                       'df'=>array(),
                       'total'=>array(),
                   );
                   
                   
                }
                
                if(!isset($json['informe'][$res['anio']]['rubro'][$res['rubro']]['x'])){

                   $json['informe'][$res['anio']]['rubro'][$res['rubro']]['df']['valor']=$res['df'];
                   $json['informe'][$res['anio']]['rubro'][$res['rubro']]['total']['valor']=$res['total'];
                   
                   $json['informe'][$res['anio']]['suma']=$json['informe'][$res['anio']]['suma']+$res['total'];
                   
                }
                
                
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    
    
    
    public function actionAp5Ind23($anios, $grafico,$periodo){

    $this->layout=false;

            $result = Ap5Ind23::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and periodo_id='.$periodo,
            'order'=>'id ASC'
             )));
            
            foreach ($result as $res) {
                
               
               if(!isset($json['informe'][$res['anio']])){
                   $json['informe'][$res['anio']]=array(
                       'rubro'=>array(),
                       
                   );
                   
                   
                } 
                
               if(!isset($json['informe'][$res['anio']]['rubro'][$res['rubro']])){
                   $json['informe'][$res['anio']]['rubro'][$res['rubro']]=array(
                       
                       'delegacion'=>array(),
                       
                   );
                   
                   
                }
                
                 if(!isset($json['informe'][$res['anio']]['rubro'][$res['rubro']]['delegacion'][$res['delegacion']])){
                   $json['informe'][$res['anio']]['rubro'][$res['rubro']]['delegacion'][$res['delegacion']]=array(
                       
                       'unidades'=>array(),
                       'porcentual'=>array(),
                   );
                   
                   
                }
                
                if(!isset($json['informe'][$res['anio']]['rubro'][$res['rubro']]['delegacion'][$res['delegacion']]['x'])){

                   $json['informe'][$res['anio']]['rubro'][$res['rubro']]['delegacion'][$res['delegacion']]['unidades']=$res['unidades'];
                   $json['informe'][$res['anio']]['rubro'][$res['rubro']]['delegacion'][$res['delegacion']]['porcentual']=$res['porcentual'];
                   
                   
                }
                
                
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    
    
    
    
    public function actionAp5Ind3($entidades,$grafico,$periodo){

    $this->layout=false;

            $result = Ap5Ind3::model()->findAll((array(
            'condition'=>'entidad in('.$entidades.') and periodo_id='.$periodo,
            'order'=>'entidad ASC'
             )));
            
            foreach ($result as $res) {
                
                
               if(!isset($json['informe'][$res['entidad']])){

                   $json['informe'][$res['entidad']]=array(
                       'columna'=>array(),
                   );
                
                }
                
                if(!isset($json['informe'][$res['entidad']]['columna']['x'])){

                   $json['informe'][$res['entidad']]['columna']=array(
                       'columna1'=>[$res['facilidad']],
                       'columna2'=>[$res['apertura']],
                       'columna3'=>[$res['manejo']],
                       'columna4'=>[$res['registro']],
                       'columna5'=>[$res['cumplimiento']],
                   );
                 
                }
                
                
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    
    public function actionAp5Ind4($grafico,$periodo){

    $this->layout=false;

            $result = Ap5Ind4::model()->findAll((array(
            'condition'=>'periodo_id='.$periodo,
            'order'=>'rubro ASC'
             )));
            
            foreach ($result as $res) {
                
                
               if(!isset($json['informe'][$res['rubro']])){

                   $json['informe'][$res['rubro']]=array(
                       'columna'=>array(),
                   );
                
                }
                
                if(!isset($json['informe'][$res['rubro']]['columna']['x'])){

                   $json['informe'][$res['rubro']]['columna']=array(
                       'valor'=>[$res['valor']],
                       
                   );
                 
                }
                
                
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    public function actionAp6Ind11($anios, $meses, $grafico,$periodo){

    $this->layout=false;

            $result = Ap6Ind11::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and mes in('.$meses.') and periodo_id='.$periodo,
            'order'=>'rubro ASC'
             )));

            $meses = explode(",",$meses);
            $max=count($meses)-1;


            $mes = array_slice($meses, 0,$max);
            $mes=HistoricoPeriodos::model()->listaSimple($mes);

            $anio_re=explode(",",$anios);
            $anio_ref=$anio_re[0];
            
            //saco sumatoria del periodo actual que solicitan para df
            $sql1 = "SELECT SUM(df) as prom from ap6Ind11 where anio in(".$anios.") and mes in(".$mes.") and rubro = 4 and periodo_id=".$periodo; 
            $df_total = Yii::app()->db->createCommand($sql1)->queryRow();
            
            //saco sumatoria del periodo actual que solicitan para nacional
            $sql1 = "SELECT SUM(nacional) as prom from ap6Ind11 where anio in(".$anios.") and mes in(".$mes.") and rubro = 4 and periodo_id=".$periodo; 
            $nal_total = Yii::app()->db->createCommand($sql1)->queryRow();
            
            
            //saco sumatoria del periodo pasado que solicitan para df
            $sql1 = "SELECT SUM(df) as prom from ap6Ind11 where anio in(".$anio_ref.") and  mes in(".$mes.") and rubro = 4 and periodo_id=".$periodo; 
            $df_total_pasado = Yii::app()->db->createCommand($sql1)->queryRow();
            
            //saco sumatoria del periodo pasado que solicitan para nacional
            $sql1 = "SELECT SUM(nacional) as prom from ap6Ind11 where anio in(".$anio_ref.") and mes in(".$mes.") and rubro = 4 and periodo_id=".$periodo; 
            $nal_total_pasado = Yii::app()->db->createCommand($sql1)->queryRow();
            //echo $df_total_pasado['prom'];
            $total_df=(($df_total['prom']/$df_total_pasado['prom'])-1)*100;
            $total_nal=(($nal_total['prom']/$nal_total_pasado['prom'])-1)*100;
            
            
            
          
            foreach ($result as $res) {
                
                
                if(!isset($json['informe'][$res['anio']][$res['rubro']])){

                   $json['informe']['df_total']=$total_df;
                   $json['informe']['nacional_total']=$total_nal;
                   $json['informe']['df_v']=$df_total['prom'];
                   $json['informe']['nal_v']=$nal_total['prom'];
                

                }
                 
            }
            
            
            foreach ($result as $res) {
                
                
                if(!isset($json['informe'][$res['anio']][$res['rubro']][$res['mes']])){

                   $json['informe'][$res['anio']][$res['rubro']][$res['mes']]['df']=$res['df'];
                   $json['informe'][$res['anio']][$res['rubro']][$res['mes']]['nacional']=$res['nacional'];
                

                }
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    
     public function actionAp6Ind12($anios, $serie, $grafico,$periodo){
        
     //esto es solo grafico
      
        $sql = "SELECT rubro,valor from Ap6Ind12 where anio in($anios) and periodo_id=".$periodo; 
        $val = Yii::app()->db->createCommand($sql)->queryAll();
        
        $series.="[";
        $datos=count($val)-1;
        foreach ($val as $key=>$valor) {

            /*if($valor['rubro']=='Distrito Federal'){
                $series.="{y: ".$valor['valor']." ,color: 'orange'}";
            }else{
                $series.=round($valor['valor'],2);
            }*/
            $series.=round($valor['valor'],2);
            if($key<$datos){
                $series.=",";
            }


        }
        $series.="]";


         
         
        header('Content-type: application/json');  
        echo $series;  
        Yii::app()->end(); 
    }
    
    
    
    
    public function actionAp6Ind13($anio, $grafico,$periodo){

    $this->layout=false;

            $result = Ap6Ind13::model()->findAll((array(
            'condition'=>'anio in('.$anio.') and periodo_id='.$periodo,
            'order'=>'rubro ASC'
             )));
            
            
            
            foreach ($result as $res) {
                
                
            
                if(!isset($json['informe'][$res['anio']][$res['rubro']][$res['mes']])){

                   $json['informe'][$res['anio']][$res['rubro']][$res['mes']]['valor']=$res['valor'];
                   
                

                }
                
                
                
                
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    
    public function actionAp6Ind2($anios, $grafico,$periodo){

    $this->layout=false;

            $result = Ap6Ind2::model()->findAll((array(
            'condition'=>'anio in('.$anios.')  and periodo_id='.$periodo,
            'order'=>'id ASC'
             )));
            //saco el total el >1 significa que no debe tomar el valor de la columna 1, porque es un total en si
            
            //saco el sumatoria del periodo que solicitan para df
            $sql = "SELECT SUM(df) as prom from ap6Ind2  where periodo_id=".$periodo; 
            $sumdf = Yii::app()->db->createCommand($sql)->queryRow();
           
            //saco el sumatoria del periodo que solicitan para nacional
            $sql1 = "SELECT SUM(nacional) as prom from ap6Ind2 where periodo_id=".$periodo; 
            $sumnal = Yii::app()->db->createCommand($sql1)->queryRow();
            
            
            //saco el promedio del periodo que solicitan para df
            $sql = "SELECT AVG(df) as prom from ap6Ind2 where periodo_id=".$periodo; 
            $promdf = Yii::app()->db->createCommand($sql)->queryRow();
           
            //saco el promedio del periodo que solicitan para nacional
            $sql1 = "SELECT AVG(nacional) as prom from ap6Ind2 where periodo_id=".$periodo; 
            $promnal = Yii::app()->db->createCommand($sql1)->queryRow();
            
            
            foreach ($result as $res) {
                if(!isset($json['informe'])){

                    $json['informe']=array(
                        'anio'=>array(),
                        'promedios'=>array(
                          
                        'promdf'=>$promdf['prom'],
                        'promnal'=>$promnal['prom'],
                            ),
                        
                    );

                }
                if(!isset($json['informe']['anio'][$res['anio']])){

                    $json['informe']['anio'][$res['anio']]=array(
                        
                        
                            'df'=>$res['df'],
                        'nacional'=>$res['nacional'],
                            
                        
                        
                    );

                }
               
                
               
                
                
                
                
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    public function actionAp7Ind11($anios, $grafico,$periodo){

    $this->layout=false;

            $result = Ap7Ind11::model()->findAll((array(
            'condition'=>'anio in('.$anios.')  and periodo_id='.$periodo,
            'order'=>'rubro ASC'
             )));
            
            
            
            foreach ($result as $res) {
                
                
                
                if(!isset($json['informe'][$res['anio']])){

                    $json['informe'][$res['anio']]=array(
                       
                        'rubro'=>array(),
                        
                        
                        
                    );

                }
                if(!isset($json['informe'][$res['anio']]['rubro'][$res['rubro']])){

                    $json['informe'][$res['anio']]['rubro'][$res['rubro']]=array(
                        
                        
                    );

                }
                
                if(!isset($json['informe'][$res['anio']][$res['rubro']]['valores'])){

                    $json['informe'][$res['anio']]['rubro'][$res['rubro']]['estimado']=$res['estimado'];
                    $json['informe'][$res['anio']]['rubro'][$res['rubro']]['registrado']=$res['registrado'];
                    
                    
                    
                }
                
               
                
                
                
                
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    public function actionAp7Ind12($anios_ini,$anios_fin,$serie, $grafico,$periodo){
        
     //esto es solo grafico

        $rango= range($anios_ini, $anios_fin);
        $a = HistoricoPeriodos::model()->listaSimple($rango);

        $sql = "SELECT anio,valor from Ap7Ind12 where anio in($a) and periodo_id=".$periodo; 
        $val = Yii::app()->db->createCommand($sql)->queryAll();
        
        $series.="[";
        $datos=count($val)-1;
        foreach ($val as $key=>$valor) {

            
            $series.=round($valor['valor'],2);
            if($key<$datos){
                $series.=",";
            }


        }
        $series.="]";

         
        
         
        header('Content-type: application/json');  
        echo $series;  
        Yii::app()->end(); 
    }
    public function actionAp7Ind12_textos($anios_ini,$anios_fin,$serie, $grafico,$periodo){
        
     //esto es solo grafico
    
        $rango= range($anios_ini, $anios_fin);
        $a = HistoricoPeriodos::model()->listaSimple($rango);
       
        
        $sql = "SELECT anio from Ap7Ind12 where anio in($a) and periodo_id=".$periodo; 
        $val = Yii::app()->db->createCommand($sql)->queryAll();
        
        $series.="[";
        $datos=count($val);
        $i=0;
        foreach ($val as $texto) {
            $i++;
            $series.='"';

            
            $series.=" ".$texto['anio'].'"';

            if($i<$datos){
                $series.=',';
            }
        }
        $series.="]";
       
         
        header('Content-type: application/json');  
        echo $series;  
        Yii::app()->end(); 
    }
    
    public function actionAp7Ind13($anios_ini,$anios_fin,$serie, $grafico,$periodo){
        
     //esto es solo grafico
      
         
        $rango= range($anios_ini, $anios_fin);
        $a = HistoricoPeriodos::model()->listaSimple($rango);

        $sql = "SELECT anio,valor from Ap7Ind13 where anio in($a) and periodo_id=".$periodo; 
        $val = Yii::app()->db->createCommand($sql)->queryAll();
        
        $series.="[";
        $datos=count($val)-1;
        foreach ($val as $key=>$valor) {

            
            $series.=round($valor['valor'],2);
            if($key<$datos){
                $series.=",";
            }


        }
        $series.="]";

         
        
         
        header('Content-type: application/json');  
        echo $series;  
        Yii::app()->end(); 
    }
    public function actionAp7Ind13_textos($anios_ini,$anios_fin,$serie, $grafico,$periodo){
        
     //esto es solo grafico
    
        $rango= range($anios_ini, $anios_fin);
        $a = HistoricoPeriodos::model()->listaSimple($rango);
       
        
        $sql = "SELECT anio from Ap7Ind13 where anio in($a) and periodo_id=".$periodo; 
        $val = Yii::app()->db->createCommand($sql)->queryAll();
        
        $series.="[";
        $datos=count($val);
        $i=0;
        foreach ($val as $texto) {
            $i++;
            $series.='"';

            
            $series.=" ".$texto['anio'].'"';

            if($i<$datos){
                $series.=',';
            }
        }
        $series.="]";
       
         
        header('Content-type: application/json');  
        echo $series;  
        Yii::app()->end(); 
    }
    
    
    
    public function actionAp7Ind14($anios_ini,$anios_fin,$serie, $grafico,$periodo){
        
     //esto es solo grafico
      
        
         
        $rango= range($anios_ini, $anios_fin);
        $a = HistoricoPeriodos::model()->listaSimple($rango);

        $sql = "SELECT anio,valor from Ap7Ind14 where anio in($a) and periodo_id=".$periodo; 
        $val = Yii::app()->db->createCommand($sql)->queryAll();
        
        $series.="[";
        $datos=count($val)-1;
        foreach ($val as $key=>$valor) {

            
            $series.=round($valor['valor'],2);
            if($key<$datos){
                $series.=",";
            }


        }
        $series.="]";

         
        
         
        header('Content-type: application/json');  
        echo $series;  
        Yii::app()->end(); 
    }
    

    public function actionAp7Ind14_textos($anios_ini,$anios_fin,$serie, $grafico,$periodo){
        
     //esto es solo grafico
    
        $rango= range($anios_ini, $anios_fin);
        $a = HistoricoPeriodos::model()->listaSimple($rango);
       
        
        $sql = "SELECT anio from Ap7Ind14 where anio in($a) and periodo_id=".$periodo; 
        $val = Yii::app()->db->createCommand($sql)->queryAll();
        
        $series.="[";
        $datos=count($val);
        $i=0;
        foreach ($val as $texto) {
            $i++;
            $series.='"';

            
            $series.=" ".$texto['anio'].'"';

            if($i<$datos){
                $series.=',';
            }
        }
        $series.="]";
       
         
        header('Content-type: application/json');  
        echo $series;  
        Yii::app()->end(); 
    }
    
    public function actionAp7Ind2($anios, $grafico,$periodo){

    $this->layout=false;

            $result = Ap7Ind2::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and periodo_id='.$periodo,
            'order'=>'rubro ASC'
             )));
            
            
            
            foreach ($result as $res) {
                
                
                
                if(!isset($json['informe'][$res['anio']])){

                    $json['informe'][$res['anio']]=array(
                       
                        'rubro'=>array(),
                        
                        
                        
                    );

                }
                if(!isset($json['informe'][$res['anio']]['rubro'][$res['rubro']])){

                    $json['informe'][$res['anio']]['rubro'][$res['rubro']]=array(
                        
                        
                    );

                }
                
                if(!isset($json['informe'][$res['anio']][$res['rubro']]['valores'])){

                    $json['informe'][$res['anio']]['rubro'][$res['rubro']]['ejercicio']=$res['ejercicio'];
                    $json['informe'][$res['anio']]['rubro'][$res['rubro']]['estructura']=$res['estructura'];
                    
                    
                    
                }
                
               
                
                
                
                
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    
    public function actionAp7Ind3($anios, $grafico,$periodo){

    $this->layout=false;

            $result = Ap7Ind3::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and periodo_id='.$periodo,
            'order'=>'rubro ASC'
             )));
            
            
            
            foreach ($result as $res) {
                
                
                
                if(!isset($json['informe'])){

                    $json['informe']=array(
                       
                        'rubro'=>array(),
                        
                        
                        
                    );

                }
                if(!isset($json['informe']['rubro'][$res['rubro']])){

       
                        $json['informe']['rubro'][$res['rubro']]['saldo1']=$res['saldo1'];
                        $json['informe']['rubro'][$res['rubro']]['colocacion1']=$res['colocacion1'];
                        $json['informe']['rubro'][$res['rubro']]['amortizacion1']=$res['amortizacion1'];
                        $json['informe']['rubro'][$res['rubro']]['colocacion2']=$res['colocacion2'];
                        $json['informe']['rubro'][$res['rubro']]['amortizacion2']=$res['amortizacion2'];
                        $json['informe']['rubro'][$res['rubro']]['actualizacion2']=$res['actualizacion2'];
                        $json['informe']['rubro'][$res['rubro']]['saldo2']=$res['saldo2'];
                        $json['informe']['rubro'][$res['rubro']]['endeudamiento']=$res['endeudamiento'];
                        
                        

                }
               
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    
    public function actionAp8Ind11($anios, $meses, $grafico,$periodo){

    $this->layout=false;

            $result = Ap8Ind11::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and mes in('.$meses.') and periodo_id='.$periodo,
            'order'=>'id ASC'
             )));
            
            
            
            foreach ($result as $res) {
                
                //al por mayor por año y columna
                if(!isset($json['informe']['pormayor'][$res['anio']])){

                    $json['informe']['pormayor'][$res['anio']]=array(
                        
                        //personas ocupadas nacional y df mayoreo
                        'p_ocupadas_n_ma'=>array(),
                        'p_ocupadas_df_ma'=>array(),
                        
                        //remunaeraciones ocupadas nacional y df mayoreo
                        'remuneraciones_n_ma'=>array(),
                        'remuneraciones_df_ma'=>array(),
                        
                        //remuneracione spor persona  nacional y df mayoreo
                        'remuneraciones_pp_n_ma'=>array(),
                        'remuneraciones_pp_df_ma'=>array(),
                        
                        //ingresos nacional y df mayoreo
                        'ingreso_n_ma'=>array(),
                        'ingreso_df_ma'=>array(),
                        
                        //compras nacional y df mayoreo
                        'compras_n_ma'=>array(),
                        'compras_df_ma'=>array(),
                        
                        
                        
                    );
                    
                }
                
                //personas ocupadas nacional y df mayoreo
                if(!isset($json['informe']['pormayor'][$res['anio']]['p_ocupadas_n_ma']['mes'][$res['mes']])){
                    
                    $json['informe']['pormayor'][$res['anio']]['p_ocupadas_n_ma']['total']=$json['informe']['pormayor'][$res['anio']]['p_ocupadas_n_ma']['total']+$res['p_ocupadas_n_ma'];
                    
                }
                
                if(!isset($json['informe']['pormayor'][$res['anio']]['p_ocupadas_df_ma']['mes'][$res['mes']])){

                    $json['informe']['pormayor'][$res['anio']]['p_ocupadas_df_ma']['total']=$json['informe']['pormayor'][$res['anio']]['p_ocupadas_df_ma']['total']+$res['p_ocupadas_df_ma'];;
                    
                }
                
                //remunaeraciones ocupadas nacional y df mayoreo
                if(!isset($json['informe']['pormayor'][$res['anio']]['remuneraciones_n_ma']['mes'][$res['mes']])){

                    $json['informe']['pormayor'][$res['anio']]['remuneraciones_n_ma']['total']=$json['informe']['pormayor'][$res['anio']]['remuneraciones_n_ma']['total']+$res['remuneraciones_n_ma'];;
                    
                }
                if(!isset($json['informe']['pormayor'][$res['anio']]['remuneraciones_df_ma']['mes'][$res['mes']])){

                    $json['informe']['pormayor'][$res['anio']]['remuneraciones_df_ma']['total']=$json['informe']['pormayor'][$res['anio']]['remuneraciones_df_ma']['total']+$res['remuneraciones_df_ma'];;
                    
                }
                
                //remuneracione spor persona  nacional y df mayoreo
                if(!isset($json['informe']['pormayor'][$res['anio']]['remuneraciones_pp_n_ma']['mes'][$res['mes']])){

                    $json['informe']['pormayor'][$res['anio']]['remuneraciones_pp_n_ma']['total']=$json['informe']['pormayor'][$res['anio']]['remuneraciones_pp_n_ma']['total']+$res['remuneraciones_pp_n_ma'];;
                    
                }
                if(!isset($json['informe']['pormayor'][$res['anio']]['remuneraciones_pp_df_ma']['mes'][$res['mes']])){

                    $json['informe']['pormayor'][$res['anio']]['remuneraciones_pp_df_ma']['total']=$json['informe']['pormayor'][$res['anio']]['remuneraciones_df_ma']['total']+$res['remuneraciones_pp_df_ma'];;
                    
                }
                
                //ingresos nacional y df mayoreo
                if(!isset($json['informe']['pormayor'][$res['anio']]['ingreso_n_ma']['mes'][$res['mes']])){

                    $json['informe']['pormayor'][$res['anio']]['ingreso_n_ma']['total']=$json['informe']['pormayor'][$res['anio']]['ingreso_n_ma']['total']+$res['ingreso_n_ma'];;
                    
                }
                if(!isset($json['informe']['pormayor'][$res['anio']]['ingreso_df_ma']['mes'][$res['mes']])){

                    $json['informe']['pormayor'][$res['anio']]['ingreso_df_ma']['total']=$json['informe']['pormayor'][$res['anio']]['ingreso_df_ma']['total']+$res['ingreso_df_ma'];;
                    
                }
                
                //compras nacional y df mayoreo
                if(!isset($json['informe']['pormayor'][$res['anio']]['compras_n_ma']['mes'][$res['mes']])){

                    $json['informe']['pormayor'][$res['anio']]['compras_n_ma']['total']=$json['informe']['pormayor'][$res['anio']]['compras_n_ma']['total']+$res['compras_n_ma'];;
                    
                }
                if(!isset($json['informe']['pormayor'][$res['anio']]['compras_df_ma']['mes'][$res['mes']])){

                    $json['informe']['pormayor'][$res['anio']]['compras_df_ma']['total']=$json['informe']['pormayor'][$res['anio']]['compras_df_ma']['total']+$res['compras_df_ma'];;
                    
                }
                
                
                
                
                
                
                
                //al por menor por año y por columna
                
                if(!isset($json['informe']['pormenor'][$res['anio']])){

                    $json['informe']['pormenor'][$res['anio']]=array(
                        
                        //personas ocupadas nacional y df menudeo
                        'p_ocupadas_n_me'=>array(),
                        'p_ocupadas_df_me'=>array(),
                        
                        //remunaeraciones ocupadas nacional y df menudeo
                        'remuneraciones_n_me'=>array(),
                        'remuneraciones_df_me'=>array(),
                        
                        //remuneracione spor persona  nacional y df menudeo
                        'remuneraciones_pp_n_me'=>array(),
                        'remuneraciones_pp_df_me'=>array(),
                        
                        //ingresos nacional y df menudeo
                        'ingreso_n_me'=>array(),
                        'ingreso_df_me'=>array(),
                        
                        //compras nacional y df menudeo
                        'compras_n_me'=>array(),
                        'compras_df_me'=>array(),
                        
                        
                        
                    );
                    
                }
                
                //personas ocupadas nacional y df mayoreo
                if(!isset($json['informe']['pormenor'][$res['anio']]['p_ocupadas_n_me']['mes'][$res['mes']])){
                    
                    $json['informe']['pormenor'][$res['anio']]['p_ocupadas_n_me']['total']=$json['informe']['pormenor'][$res['anio']]['p_ocupadas_n_me']['total']+$res['p_ocupadas_n_me'];
                    
                }
                
                if(!isset($json['informe']['pormenor'][$res['anio']]['p_ocupadas_df_me']['mes'][$res['mes']])){

                    $json['informe']['pormenor'][$res['anio']]['p_ocupadas_df_me']['total']=$json['informe']['pormenor'][$res['anio']]['p_ocupadas_df_me']['total']+$res['p_ocupadas_df_me'];;
                    
                }
                
                //remunaeraciones ocupadas nacional y df mayoreo
                if(!isset($json['informe']['pormenor'][$res['anio']]['remuneraciones_n_me']['mes'][$res['mes']])){

                    $json['informe']['pormenor'][$res['anio']]['remuneraciones_n_me']['total']=$json['informe']['pormenor'][$res['anio']]['remuneraciones_n_me']['total']+$res['remuneraciones_n_me'];;
                    
                }
                if(!isset($json['informe']['pormenor'][$res['anio']]['remuneraciones_df_me']['mes'][$res['mes']])){

                    $json['informe']['pormenor'][$res['anio']]['remuneraciones_df_me']['total']=$json['informe']['pormenor'][$res['anio']]['remuneraciones_df_me']['total']+$res['remuneraciones_df_me'];;
                    
                }
                
                //remuneracione spor persona  nacional y df mayoreo
                if(!isset($json['informe']['pormenor'][$res['anio']]['remuneraciones_pp_n_me']['mes'][$res['mes']])){

                    $json['informe']['pormenor'][$res['anio']]['remuneraciones_pp_n_me']['total']=$json['informe']['pormenor'][$res['anio']]['remuneraciones_pp_n_me']['total']+$res['remuneraciones_pp_n_me'];;
                    
                }
                if(!isset($json['informe']['pormenor'][$res['anio']]['remuneraciones_pp_df_me']['mes'][$res['mes']])){

                    $json['informe']['pormenor'][$res['anio']]['remuneraciones_pp_df_me']['total']=$json['informe']['pormenor'][$res['anio']]['remuneraciones_df_me']['total']+$res['remuneraciones_pp_df_me'];;
                    
                }
                
                //ingresos nacional y df mayoreo
                if(!isset($json['informe']['pormenor'][$res['anio']]['ingreso_n_me']['mes'][$res['mes']])){

                    $json['informe']['pormenor'][$res['anio']]['ingreso_n_me']['total']=$json['informe']['pormenor'][$res['anio']]['ingreso_n_me']['total']+$res['ingreso_n_me'];;
                    
                }
                if(!isset($json['informe']['pormenor'][$res['anio']]['ingreso_df_me']['mes'][$res['mes']])){

                    $json['informe']['pormenor'][$res['anio']]['ingreso_df_me']['total']=$json['informe']['pormenor'][$res['anio']]['ingreso_df_me']['total']+$res['ingreso_df_me'];;
                    
                }
                
                //compras nacional y df mayoreo
                if(!isset($json['informe']['pormenor'][$res['anio']]['compras_n_me']['mes'][$res['mes']])){

                    $json['informe']['pormenor'][$res['anio']]['compras_n_me']['total']=$json['informe']['pormenor'][$res['anio']]['compras_n_me']['total']+$res['compras_n_me'];;
                    
                }
                if(!isset($json['informe']['pormenor'][$res['anio']]['compras_df_me']['mes'][$res['mes']])){

                    $json['informe']['pormenor'][$res['anio']]['compras_df_me']['total']=$json['informe']['pormenor'][$res['anio']]['compras_df_me']['total']+$res['compras_df_me'];;
                    
                }
                
                
                
                
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    public function actionAp8Ind12($anios, $grafico,$periodo){

    $this->layout=false;

            $result = Ap8Ind12::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and periodo_id='.$periodo,
            'order'=>'id ASC'
             )));
            
            
            
            foreach ($result as $res) {
                
                //al por mayor por año y columna
                if(!isset($json['informe'][$res['anio']][$res['mes']])){

                   
                        
                        //compras nacional y df mayoreo
                        $json['informe'][$res['anio']][$res['mes']]['compras_n_ma']=$res['compras_n_ma'];
                        $json['informe'][$res['anio']][$res['mes']]['compras_df_ma']=$res['compras_df_ma'];
                        
                        //compras nacional y df menudeo
                        $json['informe'][$res['anio']][$res['mes']]['compras_n_me']=$res['compras_n_me'];
                        $json['informe'][$res['anio']][$res['mes']]['compras_df_me']=$res['compras_df_me'];
                        
                    
                }
            }
            
        header('Content-type: application/json');  
        echo json_encode($json);  
        Yii::app()->end(); 
    } 
    
    
    public function actionAp8Ind13($anios_ini,$anios_fin,$serie, $grafico,$periodo){


        if($serie==1){ $modelo="compras_df_ma";}
        if($serie==2){ $modelo="compras_n_ma";}

        $rango= range($anios_ini, $anios_fin);
        $a = HistoricoPeriodos::model()->listaSimple($rango);

        $sql = "SELECT $modelo from Ap8Ind12 where anio in($a) and periodo_id=".$periodo; 
        $val = Yii::app()->db->createCommand($sql)->queryAll();
        
        $series.="[";
        $datos=count($val)-1;
        foreach ($val as $key=>$valor) {

            
            $series.=round($valor[$modelo],2);
            if($key<$datos){
                $series.=",";
            }


        }
        $series.="]";    
        
     
         
         
         header('Content-type: application/json');  
        echo $series;  
        Yii::app()->end(); 
    }
    public function actionAp8Ind13_textos($anios_ini,$anios_fin,$serie, $grafico,$periodo){
        
     //esto es solo grafico
    
        $rango= range($anios_ini, $anios_fin);
        $a = HistoricoPeriodos::model()->listaSimple($rango);
       
        
        $sql = "SELECT anio,mes from Ap8Ind12 where anio in($a) and periodo_id=".$periodo; 
        $val = Yii::app()->db->createCommand($sql)->queryAll();
        
        $series.="[";
        $datos=count($val);
        $i=0;
        foreach ($val as $texto) {
            $i++;
            $series.='"';

            if($texto['mes']==1){
                $series.=$texto['anio']."-";
            }
            $series.=$texto['mes'].'"';

            if($i<$datos){
                $series.=',';
            }
        }
        $series.="]";
       
         
        header('Content-type: application/json');  
        echo $series;  
        Yii::app()->end(); 
    }
    
    
    public function actionAp8Ind14($anios_ini,$anios_fin,$serie, $grafico,$periodo){
        
     //esto es solo grafico
        if($serie==1){ $modelo="compras_df_me";}
        if($serie==2){ $modelo="compras_n_me";}

        $rango= range($anios_ini, $anios_fin);
        $a = HistoricoPeriodos::model()->listaSimple($rango);

        $sql = "SELECT $modelo from Ap8Ind12 where anio in($a) and periodo_id=".$periodo; 
        $val = Yii::app()->db->createCommand($sql)->queryAll();
        
        $series.="[";
        $datos=count($val)-1;
        foreach ($val as $key=>$valor) {

            
            $series.=round($valor[$modelo],2);
            if($key<$datos){
                $series.=",";
            }


        }
        $series.="]";    
        
     
         
         
         header('Content-type: application/json');  
        echo $series;  
        Yii::app()->end(); 
    }

    public function actionAp8Ind14_textos($anios_ini,$anios_fin,$serie, $grafico,$periodo){
        
     //esto es solo grafico
    
        $rango= range($anios_ini, $anios_fin);
        $a = HistoricoPeriodos::model()->listaSimple($rango);
       
        
        $sql = "SELECT anio,mes from Ap8Ind12 where anio in($a) and periodo_id=".$periodo; 
        $val = Yii::app()->db->createCommand($sql)->queryAll();
        
        $series.="[";
        $datos=count($val);
        $i=0;
        foreach ($val as $texto) {
            $i++;
            $series.='"';

            if($texto['mes']==1){
                $series.=$texto['anio']."-";
            }
            $series.=$texto['mes'].'"';

            if($i<$datos){
                $series.=',';
            }
        }
        $series.="]";
       
         
        header('Content-type: application/json');  
        echo $series;  
        Yii::app()->end(); 
    }
    
    
     public function actionAp8Ind21($anios,$anio_tiendas,$grafico,$periodo){

    $this->layout=false;

            $result = Ap8Ind21::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and periodo_id='.$periodo,
            'order'=>'rubro ASC'
             )));
            
             $result_tiendas = Ap8Ind21a::model()->findAll((array(
            'condition'=>'anio in('.$anio_tiendas.') and periodo_id='.$periodo,
            'order'=>'rubro ASC'
             )));
            
            
            
            foreach ($result as $res) {
                
                if(!isset($json['u_comercio'][$res['anio']][$res['rubro']])){

                    $json['u_comercio'][$res['anio']][$res['rubro']]['unidades']=$res['unidades'];
                    $json['u_comercio'][$res['anio']][$res['rubro']]['personal']=$res['personal'];
                    
                    
                }
            }
            
            foreach ($result_tiendas as $res) {
                
                if(!isset($json['tiendas'][$res['anio']][$res['rubro']])){

                    $json['tiendas'][$res['anio']][$res['rubro']]['valor']=$res['valor'];
                    
                    
                    
                }
                   
            }
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    
    
    public function actionAp8Ind3($anios,$grafico,$periodo){

    $this->layout=false;

            $result = Ap8Ind3::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and periodo_id='.$periodo,
            'order'=>'mes ASC'
             )));
            
            
            
            
            foreach ($result as $res) {
                
                if(!isset($json['u_comercio'][$res['anio']][$res['mes']])){

                    $json['informe'][$res['anio']][$res['mes']]['df']=$res['df'];
                    $json['informe'][$res['anio']][$res['mes']]['nacional']=$res['nacional'];
                    
                    
                }
            }
            
            
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    public function actionAp8Ind3a($anios_ini,$anios_fin,$serie,$grafico,$periodo){

    $this->layout=false;

        if($serie==1){ $modelo="df";}
        if($serie==2){ $modelo="nacional";}

        $rango= range($anios_ini, $anios_fin);
        $a = HistoricoPeriodos::model()->listaSimple($rango);

        $sql = "SELECT $modelo from Ap8Ind3 where anio in($a) and periodo_id=".$periodo; 
        $val = Yii::app()->db->createCommand($sql)->queryAll();
        
        $series.="[";
        $datos=count($val)-1;
        foreach ($val as $key=>$valor) {

            
            $series.=round($valor[$modelo],1);
            if($key<$datos){
                $series.=",";
            }


        }
        $series.="]";    
        
     
         
         
        header('Content-type: application/json');  
        echo $series;  
        Yii::app()->end();    
            
          
          
    }
    
    public function actionAp9Ind1($anios,$grafico,$periodo){

    $this->layout=false;

            $result = Ap9Ind1::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and periodo_id='.$periodo,
            'order'=>'anio ASC'
             )));
            
            
            
            
            foreach ($result as $res) {
                
                if(!isset($json['u_comercio'][$res['anio']])){

                    $json['informe'][$res['anio']]['habitaciones']=$res['habitaciones'];
                    $json['informe'][$res['anio']]['ocupacion']=$res['ocupacion'];
                    
                    
                }
            }
            
            
          
            header('Content-type: application/json');  
            echo json_encode($json);  
            Yii::app()->end(); 
    }
    
    
    public function actionAp9Ind2($anios,$meses,$grafico,$periodo,$texto=null){

    $this->layout=false;

            $result = Ap9Ind2::model()->findAll((array(
            'condition'=>'anio in('.$anios.') and mes in('.$meses.') and periodo_id='.$periodo,
            'order'=>'anio ASC'
             )));
            
            
            
            
            foreach ($result as $res) {
                
                if(!isset($json['informe'][$res['mes']])){
                    
                    $json['informe'][$res['mes']]=array(
                      
                        'anio'=>array(),
                        'total1'=>0,
                        
                        
                    );

                }
                if(!isset($json['informe'][$res['mes']]['anio'][$res['anio']])){
                    
                    

                    
                    
                    $json['informe'][$res['mes']]['anio'][$res['anio']]=array(
                        'rubro'=>array(),
                        
                    );

                }
                
                if(!isset($json['informe'][$res['mes']]['anio'][$res['anio']]['rubro'][$res['rubro']])){

                    $json['informe'][$res['mes']]['anio'][$res['anio']]['rubro'][$res['rubro']]['valor']=$res['valor'];
                    
                    if($res['mes']<13){
                        $json['informe'][$res['mes']]['anio'][$res['anio']]['total1']=$json['informe'][$res['mes']]['anio'][$res['anio']]['total1']+$res['valor'];
                    }
                    
                }
            }

           
            $conteo=count($json['informe'][1]['anio']);

            

            

           
            foreach($json['informe'] as $mes=>$dato){ 
                foreach($dato as $a=>$dat){
                    foreach($dat as $anio=>$valores){
                        //ho "<pre>";
                        //print_r($dat);
                        //ho "</pre>";
                        if($mes<13){
                             $sumadf[$anio]+=$valores['rubro'][1]['valor'];
                             $sumanal[$anio]+=$valores['rubro'][2]['valor'];
                        }
                    }
                }
            }
            $i=0;
            $cadena.="[";

            foreach($json['informe'][1]['anio'] as $anio=>$dat){ 
                $i++;
                $cadena.= $sumadf[$anio]+$sumanal[$anio];

                if($i<$conteo){ $cadena.= ",";}
                

                //echo $cadena.=$df+$nal;
            }
            
            //echo number_format($sumadf[$anio]+$sumanal[$anio],0);

            $cadena.="]";
            
          
            header('Content-type: application/json'); 

            if($texto==null){ 
                if($grafico==0){
                    echo json_encode($json);
                }else{
                    echo $cadena;
                }  
            }else{
                $datos=count($json['informe'][1]['anio']);

                $aniox.="[";
                    $i=0;
                    foreach($json['informe'][1]['anio'] as $anio=>$dat){ 
                        $i++;
                        $aniox.= '"'.$anio.'"';

                        if($i<$datos){ $aniox.= ",";}
                        

                        //echo $cadena.=$df+$nal;
                    }
            
            //echo number_format($sumadf[$anio]+$sumanal[$anio],0);

            $aniox.="]";

                echo $aniox;
            }
            
            Yii::app()->end(); 
    }
    
    public function actionAp9Ind2a($serie, $grafico,$periodo){
        
     //esto es solo grafico
      
        $baseUrl = Yii::app()->params['baserecm'];
        $url = $baseUrl. "/index.php/api/ap9Ind2?anios=2011,2012,2013,2014&meses=1,2,3,4,5,6,7,8,9,13&grafico=0";
        //$url = $baseUrl;
        $data = file_get_contents($url);
        $model= CJSON::decode($data);


        $json = array(
                8981643,
                9150350,
                9179913,
                9530010



               
        );   
         
         header('Content-type: application/json');  
        print_r($model);  
        Yii::app()->end(); 
    }
    
    
    
    

}
