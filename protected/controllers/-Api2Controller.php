<?php



class Api2Controller extends Controller {

public function actionMenuadmin(){



$resultado = Permisos::model()->findAll((array(
    'condition'=>'id_perfil=1 and parent_id=0',
    'order'=>'position'
	)));





	foreach ($resultado as $key => $row) {

		if( !isset($json['label'][$row["label"]])){


		$criteria = new CDbCriteria();
		$criteria->condition = 'id_perfil=:id_perfil and parent_id=:parent_id';
		$criteria->params = array(':id_perfil'=>1,':parent_id'=>$row->id);
		if (Permisos::model()->exists($criteria)) {

			$json[] = array(
				'label'=>$row["label"], 
				'url'=> array(
					$row->link,
					),
				//'items'=>array(),
			);

		} else {
			$json[] = array(
				'label'=>$row["label"], 
				'url'=> array(
					$row->link,
					),
				
			);
		}
	    }

	   

		
		

		 
	
}






header('Content-type: application/json');  
			echo json_encode($json);  
			Yii::app()->end(); 
}


public function actionMenusite(){

$this->layout=false;

$resultado = Menus::model()->findAll((array(
    'condition'=>'activar_site=1 and nivel=1',
    'order'=>'position'
	)));





	foreach ($resultado as $key => $row) {

		if( !isset($json["informe"][$row["label"]])): 
			$json['informe'][$row["label"]] = array(
				
				'label'=> $row->label,
				'url'=> '/main/index/'.$row->id,

			
	          	);
	    endif;

		$resultado2 = Menus::model()->findAll((array(
		    'condition'=>'activar_site=1 and nivel=2 and parent_id='.$row->id.'',
		    'order'=>'position'
			)));


			foreach ($resultado2 as $key2 => $row2) {

				if( !isset($json["informe"]['items'][$row2["label"]])): 
				$json['informe'][$row["label"]]['items'][$row2["label"]] = array(
				
				'label'=> $row2->label,
				'url'=> '/main/index/'.$row2->id,
			
	          	);
	    endif;

	    $resultado3 = Menus::model()->findAll((array(
		    'condition'=>'activar_site=1 and nivel=3 and parent_id='.$row2->id.'',
		    'order'=>'position'
			)));


			foreach ($resultado3 as $key3 => $row3) {

				if( !isset($json["informe"]['items'][$row2["label"]]['items'][$row3["label"]])): 
				$json['informe'][$row["label"]]['items'][$row2["label"]]['items'][$row3["label"]] = array(
				
				'label'=> $row3->label,
				'url'=> '/main/index/'.$row3->id,
			
	          	);
	    endif;
	}


			}


		
		

		 
	
}






header('Content-type: application/json');  
			echo json_encode($json);  
			Yii::app()->end(); 
}

public function actionAp1Ind1($periodo){

$this->layout=false;

$resultado = Ap1Ind1::model()->findAll((array(
    'condition'=>"periodo_id=$periodo",
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


public function actionAp1Ind1Grafico($id){

$this->layout=false;

/*$resultado = Ap1Ind1::model()->findAll((array(
  //  'condition'=>'id_periodo=2',
    'order'=>'actividad'
	)));*/

/*
								429646,
								2619633,
								2803504,
								14099934,
								15729610,
								21356387,
								31126900,
								31703038,
								35333865,
								42745952,
								51309966,
								84259698,
								120794330,
								133136835,
								230580346,
								239283038
*/

$json = array(
									429646,
									2619633,
									2803504,
									14099934,
									15729610,
									21356387,
									31126900,
									31703038,
									35333865,
									42745952,
									51309966,
									84259698,
									120794330,
									133136835,
									230580346,
									239283038
	); 
/*foreach ($resultado as $key => $row) {

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


		} */ 


			header('Content-type: application/json');  
			echo json_encode($json, JSON_NUMERIC_CHECK);
			Yii::app()->end(); 
		}

public function actionAp1Ind2a($periodo,$entidad){

$this->layout=false;

$resultado = Ap1Ind2a::model()->findAll((array(
    'condition'=>'id_entidad in('.$entidad.') and periodo_id='.$periodo.'',
    'order'=>'valor desc'
	)));

			foreach ($resultado as $key => $row) {

				$sql = "SELECT nombre from entidades where id=$row[id_entidad]"; 
				$entidad = Yii::app()->db->createCommand($sql)->queryRow();

						if( !isset($json["informe"]['estado'][$entidad["nombre"]]) ): 
									$json["informe"]['estado'][$entidad["nombre"]] = array(
									'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
									
						          	);

						endif;
			}


			header('Content-type: application/json');  
			echo json_encode($json);  
			Yii::app()->end(); 
}

public function actionAp1Ind2avalores($periodo,$entidad){

$this->layout=false;

$resultado = Ap1Ind2a::model()->findAll((array(
    'condition'=>'id_entidad in('.$entidad.') and periodo_id='.$periodo.'',
    'order'=>'valor desc'
	)));
			$valores=array();
			foreach ($resultado as $key => $row) {



			 $val= array_push($valores,$row["valor"]);

					
			}


     

            $serie = HistoricoPeriodos::model()->listaSimple($valores);

			header('Content-type: application/json');      
            echo "[".$serie."]";  
            Yii::app()->end(); 
}

public function actionAp1Ind2aestados($periodo,$entidad){

$this->layout=false;

$resultado = Ap1Ind2a::model()->findAll((array(
    'condition'=>'id_entidad in('.$entidad.') and periodo_id='.$periodo.'',
    'order'=>'valor desc'
	)));
			$valores=array();
			foreach ($resultado as $key => $row) {

				$sql = "SELECT nombre from entidades where id=$row[id_entidad]"; 
				$entidad = Yii::app()->db->createCommand($sql)->queryRow();

			 $val= array_push($valores,"'$entidad[nombre]'");

					
			}

;

            $serie = HistoricoPeriodos::model()->listaSimple($valores);

			//header('Content-type: application/json');      
            echo "[".$serie."]";  
            Yii::app()->end(); 
}


public function actionAp1Ind4gestados($periodo){

$this->layout=false;
if($periodo){
$resultado = Ap1Ind4g::model()->findAll((array(
    'condition'=>'periodo_id='.$periodo.'',
    'order'=>'valor desc'
	)));
			$valores=array();
			foreach ($resultado as $key => $row) {

			
			 $val= array_push($valores,"'$row[rubro]'");

					
			}

;

            $serie = HistoricoPeriodos::model()->listaSimple($valores);

			//header('Content-type: application/json');      
            echo "[".$serie."]";  
            Yii::app()->end(); 
        }else {

        	echo "[0]";  
            Yii::app()->end();
        }
}

public function actionAp1Ind4gvalores($periodo){

$this->layout=false;
if($periodo){
$resultado = Ap1Ind4g::model()->findAll((array(
    'condition'=>'periodo_id='.$periodo.'',
    'order'=>'valor desc'
	)));
			$valores=array();
			foreach ($resultado as $key => $row) {

			
			 $val= array_push($valores,"$row[valor]");

					
			}

;

            $serie = HistoricoPeriodos::model()->listaSimple($valores);

			//header('Content-type: application/json');      
            echo "[".$serie."]";


            Yii::app()->end(); 
        }else {

        	echo "[0]";
        	Yii::app()->end(); 

        }

}




public function actionAp1Ind2aGrafico($id){

$this->layout=false;

/*$resultado = Ap1Ind1::model()->findAll((array(
  //  'condition'=>'id_periodo=2',
    'order'=>'actividad'
	)));*/

/*
					['Distrito Federal ', 17.10],
                    ['Estado de MÃ©xico',9.10],
                    ['Nuevo LeÃ³n',7.40],
                    ['Jalisco',6.20],
                    ['Veracruz',5.20],
                    ['Resto de las entidades',55]
*/

$json = array(
			array('Distrito Federal', 17.10),
			array('Estado de México',9.10),
			array('Nuevo León',7.40),
			array('Jalisco',6.20),
			array('Veracruz',5.20),
			array('Resto de las entidades',55),
									
	); 
/*foreach ($resultado as $key => $row) {

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


		} */ 


			header('Content-type: application/json');  
			echo json_encode($json, JSON_NUMERIC_CHECK);
			Yii::app()->end(); 
		}

public function actionAp1Ind2b($periodo,$anios,$entidad){

$this->layout=false;

$resultado = Ap1Ind2b::model()->findAll((array(
    'condition'=>'periodo_id='.$periodo.' and id_entidad in('.$entidad.') and anio in('.$anios.')',
    'order'=>'id'
	)));

			foreach ($resultado as $key => $row) {

				$sql = "SELECT nombre from entidades where id=$row[id_entidad]"; 
				$entidad = Yii::app()->db->createCommand($sql)->queryRow();

						if( !isset($json["informe"]['sector'][$row["id_sector"]]) ): 
									$json["informe"]['sector'][$row["id_sector"]] = array(
									//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
									'entidad'=>array(),
									
						          	);

						endif;
						if( !isset($json["informe"]['sector'][$row["id_sector"]]['entidad'][$row["id_entidad"]]) ): 
									$json["informe"]['sector'][$row["id_sector"]]['entidad'][$row["id_entidad"]] = array(
									//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
									'entidad'=>array(),
									
						          	);

						endif;

						if( !isset($json["informe"]['sector'][$row["id_sector"]]['entidad'][$row["id_entidad"]]['anio'][$row["anio"]]) ): 
									$json["informe"]['sector'][$row["id_sector"]]['entidad'][$row["id_entidad"]]['anio'][$row["anio"]] = array(
									'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
									
									
						          	);

						endif;
			}


			header('Content-type: application/json');  
			echo json_encode($json);  
			Yii::app()->end(); 
}

public function actionAp1Ind3($periodo,$tipo){


$this->layout=false;

$resultado = Ap1Ind3::model()->findAll((array(
    'condition'=>'periodo_id='.$periodo.' and valor_precio='.$tipo.'',
    'order'=>'id'
	)));

			foreach ($resultado as $key => $row) {

				$sql = "SELECT nombre from entidades where id=$row[id_entidad]"; 
				$entidad = Yii::app()->db->createCommand($sql)->queryRow();

					
						if( !isset($json[$row["anio"]][$entidad["nombre"]]) ): 
									$json[$row["anio"]][$entidad["nombre"]] = array(
									//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
									'pib'=>$row['pib'],
									'tipo_cambio'=>$row['tipo_cambio'],
									'pib_dolares'=>$row['pib']/$row['tipo_cambio'],
									'poblacion'=>$row['poblacion'],
									'per'=>$row['pib']*1000000/$row['poblacion'],
									'per_dolares'=>($row['pib']/$row['tipo_cambio'])*1000000/$row['poblacion'],

									
						          	);

						endif;

						/*if( !isset($json["informe"]['sector'][$row["id_sector"]]['entidad'][$row["id_entidad"]]['anio'][$row["anio"]]) ): 
									$json["informe"]['sector'][$row["id_sector"]]['entidad'][$row["id_entidad"]]['anio'][$row["anio"]] = array(
									'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
									
									
						          	);

						endif;*/
			}


			header('Content-type: application/json');  
			echo json_encode($json);  
			Yii::app()->end(); 






	}


public function actionAp1Ind4as($periodo,$anio,$trim){  //SERIES ORIGINALES

$this->layout=false;

$resultado = Ap1Ind4a::model()->findAll((array(
   // 'condition'=>'id_periodo='.$id.' and anio=.'.$anio.' and id_trimestre in('.$trim.') and tipo_serie=1 ',
	'condition'=>'periodo_id='.$periodo.' and tipo_serie=1 and anio='.$anio.' and id_trimestre in('.$trim.')',
    'order'=>'id'
	)));

			foreach ($resultado as $key => $row) {


						if( !isset($json["info"]['anio'][$row["anio"]]) ): 
									$json["info"]['anio'][$row["anio"]] = array(
									//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
									'trim'=>array(),
									
						          	);

						endif;

							if( !isset($json["info"]['anio'][$row["anio"]]['trim'][$row["id_trimestre"]]) ): 
									$json["info"]['anio'][$row["anio"]]['trim'][$row["id_trimestre"]] = array(
									//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
									'total'=>round($row["total_act"], 1),
									'vp'=>round($row["vp"], 1),
									
						          	);

						endif;
						
			}


			header('Content-type: application/json');  
			echo json_encode($json);  
			Yii::app()->end(); 
}

public function actionAp1Ind4ad($periodo,$anio,$trim){  //SERIES ORIGINALES

$this->layout=false;

$resultado = Ap1Ind4a::model()->findAll((array(
    'condition'=>'periodo_id='.$periodo.' and tipo_serie=2 and anio='.$anio.' and id_trimestre in('.$trim.')',
    'order'=>'id'
	)));

			foreach ($resultado as $key => $row) {


						if( !isset($json["info"]['anio'][$row["anio"]]) ): 
									$json["info"]['anio'][$row["anio"]] = array(
									//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
									'trim'=>array(),
									
						          	);

						endif;

						if( !isset($json["info"]['anio'][$row["anio"]]['trim'][$row["id_trimestre"]]) ): 
									$json["info"]['anio'][$row["anio"]]['trim'][$row["id_trimestre"]] = array(
									//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
									'total'=>round($row["total_act"], 1),
									'vp'=>round($row["vp"], 1),
									
						          	);
						endif;
						
			}


			header('Content-type: application/json');  
			echo json_encode($json);  
			Yii::app()->end(); 
}


public function actionAp1Ind4bcategories($periodo){

$this->layout=false;

$resultado = Ap1Ind4b::model()->findAll((array(
     'condition'=>'periodo_id='.$periodo.' and id_sector=1',
    
        'order'=>'id'
	)));
			$valores=array();
			foreach ($resultado as $key => $row) {

		     $item = "$row[anio]/$row[id_trimestre]";
		    
			 $val= array_push($valores,"'$item'");

					
			}

;

            $serie = HistoricoPeriodos::model()->listaSimple($valores);

			//header('Content-type: application/json');      
            echo "[".$serie."]";  
            Yii::app()->end(); 
}

public function actionAp1Ind4ccategories($periodo,$anioini,$aniofin){

$this->layout=false;

$resultado = Ap1Ind4c::model()->findAll((array(
     'condition'=>'periodo_id='.$periodo.' and (anio BETWEEN '.$anioini.' and '.$aniofin.')',
    
        'order'=>'id'
	)));
			$valores=array();
			foreach ($resultado as $key => $row) {

		     $item = "$row[anio]/$row[id_trimestre]";
		    
			 $val= array_push($valores,"'$item'");

					
			}

;

            $serie = HistoricoPeriodos::model()->listaSimple($valores);

			//header('Content-type: application/json');      
            echo "[".$serie."]";  
            Yii::app()->end(); 
}

public function actionAp1Ind4cpib($periodo,$anioini,$aniofin){

$this->layout=false;

$resultado = Ap1Ind4c::model()->findAll((array(
     'condition'=>'periodo_id='.$periodo.' and (anio BETWEEN '.$anioini.' and '.$aniofin.')',
    
        'order'=>'id'
	)));
			$valores=array();
			foreach ($resultado as $key => $row) {

		     $item = "$row[pib]";
		    
			 $val= array_push($valores,$item);

					
			}

;

            $serie = HistoricoPeriodos::model()->listaSimple($valores);

			//header('Content-type: application/json');      
            echo "[".$serie."]";  
            Yii::app()->end(); 
}

public function actionAp1Ind4cigae($periodo,$anioini,$aniofin){

$this->layout=false;

$resultado = Ap1Ind4c::model()->findAll((array(
     'condition'=>'periodo_id='.$periodo.' and (anio BETWEEN '.$anioini.' and '.$aniofin.')',
    
        'order'=>'id'
	)));
			$valores=array();
			foreach ($resultado as $key => $row) {

		     $item = "$row[igae]";
		    
			 $val= array_push($valores,$item);

					
			}

;

            $serie = HistoricoPeriodos::model()->listaSimple($valores);

			//header('Content-type: application/json');      
            echo "[".$serie."]";  
            Yii::app()->end(); 
}

public function actionAp1Ind4citaee($periodo,$anioini,$aniofin){

$this->layout=false;

$resultado = Ap1Ind4c::model()->findAll((array(
     'condition'=>'periodo_id='.$periodo.' and (anio BETWEEN '.$anioini.' and '.$aniofin.')',
    
        'order'=>'id'
	)));
			$valores=array();
			foreach ($resultado as $key => $row) {

		     $item = "$row[itaee]";
		    
			 $val= array_push($valores,$item);

					
			}

;

            $serie = HistoricoPeriodos::model()->listaSimple($valores);

			//header('Content-type: application/json');      
            echo "[".$serie."]";  
            Yii::app()->end(); 
}

public function actionAp1Ind4bsector1($periodo){

$this->layout=false;

$resultado = Ap1Ind4b::model()->findAll((array(
     'condition'=>'periodo_id='.$periodo.' and id_sector=1',
    
        'order'=>'id'
	)));
			$valores=array();
			foreach ($resultado as $key => $row) {

		     $item = "$row[vp]";
		    
			 $val= array_push($valores,$item);

					
			}

;

            $serie = HistoricoPeriodos::model()->listaSimple($valores);

			//header('Content-type: application/json');      
            echo "[".$serie."]";  
            Yii::app()->end(); 
}

public function actionAp1Ind4bsector2($periodo){

$this->layout=false;

$resultado = Ap1Ind4b::model()->findAll((array(
     'condition'=>'periodo_id='.$periodo.' and id_sector=2',
    
        'order'=>'id'
	)));
			$valores=array();
			foreach ($resultado as $key => $row) {

		     $item = "$row[vp]";
		    
			 $val= array_push($valores,$item);

					
			}

;

            $serie = HistoricoPeriodos::model()->listaSimple($valores);

			//header('Content-type: application/json');      
            echo "[".$serie."]";  
            Yii::app()->end(); 
}

public function actionAp1Ind4bsector3($periodo){

$this->layout=false;

$resultado = Ap1Ind4b::model()->findAll((array(
     'condition'=>'periodo_id='.$periodo.' and id_sector=3',
    
        'order'=>'id'
	)));
			$valores=array();
			foreach ($resultado as $key => $row) {

		     $item = "$row[vp]";
		    
			 $val= array_push($valores,$item);

					
			}

;

            $serie = HistoricoPeriodos::model()->listaSimple($valores);

			//header('Content-type: application/json');      
            echo "[".$serie."]";  
            Yii::app()->end(); 
}

public function actionAp1Ind4b($periodo,$anio,$trim){

$this->layout=false;

$resultado = Ap1Ind4b::model()->findAll((array(
    'condition'=>'periodo_id='.$periodo.' and anio='.$anio.' and id_trimestre='.$trim.'',
    'order'=>'id'
	)));

			foreach ($resultado as $key => $row) {

				$sql = "SELECT nombre from sectores where id=$row[id_sector]"; 
				$sector = Yii::app()->db->createCommand($sql)->queryRow();

				
						if( !isset($json["informe"]['anio'][$row["anio"]]) ): 
									$json["informe"]['anio'][$row["anio"]] = array(
									//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
									'trim'=>array(),
									
						          	);

						endif;

						if( !isset($json["informe"]['anio'][$row["anio"]]['trim'][$row["id_trimestre"]]) ): 
									$json["informe"]['anio'][$row["anio"]]['trim'][$row["id_trimestre"]] = array(
									//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
									'sector'=>array(),
									
						          	);

						endif;

						if( !isset($json["informe"]['anio'][$row["anio"]]['trim'][$row["id_trimestre"]]['sector'][$sector["nombre"]]) ): 
									$json["informe"]['anio'][$row["anio"]]['trim'][$row["id_trimestre"]]['sector'][$sector["nombre"]] = array(
									//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
									'valor'=>round($row["valor"], 1),
									'vp'=>round($row["vp"], 1),
									
						          	);

						endif;
						
			}


			header('Content-type: application/json');  
			echo json_encode($json);  
			Yii::app()->end(); 
			}



public function actionAp1Ind4c($periodo,$anioini,$aniofin){

$this->layout=false;

$resultado = Ap1Ind4c::model()->findAll((array(
	 'condition'=>'periodo_id='.$periodo.'',
     'order'=>'id'
	)));

			foreach ($resultado as $key => $row) {

			
				
						if( !isset($json["informe"]['anio'][$row["anio"]]) ): 
									$json["informe"]['anio'][$row["anio"]] = array(
									//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
									'trim'=>array(),
									
						          	);

						endif;

						if( !isset($json["informe"]['anio'][$row["anio"]]['trim'][$row["id_trimestre"]]) ): 
									$json["informe"]['anio'][$row["anio"]]['trim'][$row["id_trimestre"]] = array(
									//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
									'pib'=>round($row["pib"], 1),
									'igae'=>round($row["igae"], 1),
									'itaee'=>round($row["itaee"], 1),
									
						          	);

						endif;

						
						
			}


			header('Content-type: application/json');  
			echo json_encode($json);  
			Yii::app()->end(); 
			}

public function actionAp1Ind5a($id,$anio,$trim){

$this->layout=false;

$resultado = Ap1Ind5a::model()->findAll((array(
    'condition'=>'periodo_id='.$id.' and anio='.$anio.'',
    'order'=>'id'
	)));



$trims = explode(",", $trim);

$trims2= count($trims);
	$a=array();
//echo $trims2;
//die();$trimestre =0;



			foreach ($resultado as $key => $row) {

			//$promedio1 = array_sum($array) / count($array);
			//$promedio2 = array_sum($array) / count($array);
				
						if( !isset($json["informe"][$row["entidad"]]) ): 
									$json["informe"][$row["entidad"]] = array(
									//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
									$anio=>array(),
																	
						          	);
						endif;

						$promedio =0;


						for($i=1;$i<=$trims2;$i++){ 

						


							/*if($i==1 and ($row["id_mes"]==1 or $row["id_mes"]==2 or $row["id_mes"]==3 )){
							array_push($a,$row["valor"]);
						    }

						    if($i==2 and ($row["id_mes"]==4 or $row["id_mes"]==5 or $row["id_mes"]==6 )){
							array_push($a,$row["valor"]);
						    }

						    $promedio = array_sum($a) / count($a);*/

							if( !isset($json["informe"][$row["entidad"]][$anio][$i]) ): 
									$json["informe"][$row["entidad"]][$anio][$i] = array(
									//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
									'meses'=>array(),
									'promedio'=>0,
									
									
						          	);
							endif;

								if( !isset($json["informe"][$row["entidad"]][$anio][$i]['meses'][$row['id_mes']]) ){

										if($i==1 and ($row['id_mes']==1)){ 
											$json["informe"][$row["entidad"]][$anio][$i]['meses'][$row['id_mes']] = array(
											//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
											'valor'=>$row['valor'],
											
											);
											$trim1 = $trim1 + $row['valor'];

										}

										if($i==1 and ($row['id_mes']==2)){ 
											
											$json["informe"][$row["entidad"]][$anio][$i]['meses'][$row['id_mes']] = array(
											//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
											'valor'=>$row['valor'],
											
											);
											$trim1 = $trim1 + $row['valor'];
										}

										if($i==1 and ($row['id_mes']==3)){ 
											
											$json["informe"][$row["entidad"]][$anio][$i]['meses'][$row['id_mes']] = array(
											//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
											'valor'=>$row['valor'],
											
											);
											$trim1 = $trim1 + $row['valor'];
										}


										if($i==2 and ($row['id_mes']==4)){ 
											$json["informe"][$row["entidad"]][$anio][$i]['meses'][$row['id_mes']] = array(
											//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
											'valor'=>$row['valor'],
											
											);
										}

										if($i==2 and ($row['id_mes']==5)){ 
											$json["informe"][$row["entidad"]][$anio][$i]['meses'][$row['id_mes']] = array(
											//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
											'valor'=>$row['valor'],
											
											);
										}

										if($i==2 and ($row['id_mes']==6)){ 
											$json["informe"][$row["entidad"]][$anio][$i]['meses'][$row['id_mes']] = array(
											//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
											'valor'=>$row['valor'],
											
											);
										}

										if($i==3 and ($row['id_mes']==7)){ 
											$json["informe"][$row["entidad"]][$anio][$i]['meses'][$row['id_mes']] = array(
											//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
											'valor'=>$row['valor'],
											
											);
										}

											if($i==3 and ($row['id_mes']==8)){ 
											$json["informe"][$row["entidad"]][$anio][$i]['meses'][$row['id_mes']] = array(
											//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
											'valor'=>$row['valor'],
											
											);
										}

											if($i==3 and ($row['id_mes']==9)){ 
											$json["informe"][$row["entidad"]][$anio][$i]['meses'][$row['id_mes']] = array(
											//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
											'valor'=>$row['valor'],
											
											);
										}

											if($i==4 and ($row['id_mes']==10)){ 
											$json["informe"][$row["entidad"]][$anio][$i]['meses'][$row['id_mes']] = array(
											//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
											'valor'=>$row['valor'],
											
											);
										}

											if($i==4 and ($row['id_mes']==11)){ 
											$json["informe"][$row["entidad"]][$anio][$i]['meses'][$row['id_mes']] = array(
											//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
											'valor'=>$row['valor'],
											
											);
										}

											if($i==4 and ($row['id_mes']==12)){ 
											$json["informe"][$row["entidad"]][$anio][$i]['meses'][$row['id_mes']] = array(
											//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
											'valor'=>$row['valor'],
											
											);
										}


							}

						if($i==1){
						$trim1= $json["informe"][$row["entidad"]][$anio][$i]['meses'][1]['valor'] + $json["informe"][$row["entidad"]][$anio][$i]['meses'][2]['valor'] + $json["informe"][$row["entidad"]][$anio][$i]['meses'][3]['valor'];
						$promedio = $trim1/3;
						$promedio = round($promedio,1);
						$json["informe"][$row["entidad"]][$anio][$i]['promedio'] =$promedio;

						}

						if($i==2){
						$trim1= $json["informe"][$row["entidad"]][$anio][$i]['meses'][4]['valor'] + $json["informe"][$row["entidad"]][$anio][$i]['meses'][5]['valor'] + $json["informe"][$row["entidad"]][$anio][$i]['meses'][6]['valor'];
						$promedio = $trim1/3;
						$promedio = round($promedio,1);
						$json["informe"][$row["entidad"]][$anio][$i]['promedio'] =$promedio;

						}

						if($i==3){
						$trim1= $json["informe"][$row["entidad"]][$anio][$i]['meses'][7]['valor'] + $json["informe"][$row["entidad"]][$anio][$i]['meses'][8]['valor'] + $json["informe"][$row["entidad"]][$anio][$i]['meses'][9]['valor'];
						$promedio = $trim1/3;
						$promedio = round($promedio,1);
						$json["informe"][$row["entidad"]][$anio][$i]['promedio'] =$promedio;

						}

						if($i==4){
						$trim1= $json["informe"][$row["entidad"]][$anio][$i]['meses'][10]['valor'] + $json["informe"][$row["entidad"]][$anio][$i]['meses'][11]['valor'] + $json["informe"][$row["entidad"]][$anio][$i]['meses'][12]['valor'];
						$promedio = $trim1/3;

						$json["informe"][$row["entidad"]][$anio][$i]['promedio'] =$promedio;

						}
						
						}

		
						/*if( !isset($json["informe"][$row["entidad"]]['mes'][$row["id_mes"]]) ): 
									$json["informe"][$row["entidad"]]['mes'][$row["id_mes"]] = array(
									//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
									'valor'=>$row["valor"],
									
									
						          	);
						endif;*/

						
						
			}


			header('Content-type: application/json');  
			echo json_encode($json);  
			Yii::app()->end(); 
			}



public function actionAp1Ind5b($id,$anio,$trim){

$this->layout=false;

$resultado = Ap1Ind5b::model()->findAll((array(
    'condition'=>'periodo_id='.$id.' and anio='.$anio.'',
    'order'=>'id'
	)));



$trims = explode(",", $trim);

$trims2= count($trims);
	$a=array();

for($i=1;$i<=$trims2;$i++){

$prom1 =0;
$prom2 =0;
$prom3 =0;
$prom4 =0;

if($i==1){
$sql = "select AVG(valor) as promedio from ap1ind5b where periodo_id=$id and anio='$anio' and rubro=1 and mes in (1,2,3)"; 
$rubro1 = Yii::app()->db->createCommand($sql)->queryRow();
$prom1=$rubro1['promedio'];

$sql = "select AVG(valor) as promedio from ap1ind5b where periodo_id=$id and anio='$anio' and rubro=2 and mes in (1,2,3)"; 
$rubro2 = Yii::app()->db->createCommand($sql)->queryRow();
$prom2=$rubro2['promedio'];

$sql = "select AVG(valor) as promedio from ap1ind5b where periodo_id=$id and anio='$anio' and rubro=4 and mes in (1,2,3)"; 
$rubro3 = Yii::app()->db->createCommand($sql)->queryRow();
$prom3=$rubro3['promedio'];

$sql = "select AVG(valor) as promedio from ap1ind5b where periodo_id=$id and anio='$anio' and rubro=5 and mes in (1,2,3)"; 
$rubro4 = Yii::app()->db->createCommand($sql)->queryRow();
$prom4=$rubro4['promedio'];


    
}

if($i==2){
$sql = "select AVG(valor) as promedio from ap1ind5b where periodo_id=$id and anio='$anio' and rubro=1 and mes in (4,5,6)"; 
$rubro1 = Yii::app()->db->createCommand($sql)->queryRow();
$prom1=$rubro1['promedio'];

$sql = "select AVG(valor) as promedio from ap1ind5b where periodo_id=$id and anio='$anio' and rubro=2 and mes in (4,5,6)"; 
$rubro2 = Yii::app()->db->createCommand($sql)->queryRow();
$prom2=$rubro2['promedio'];

$sql = "select AVG(valor) as promedio from ap1ind5b where periodo_id=$id and anio='$anio' and rubro=4 and mes in (4,5,6)"; 
$rubro3 = Yii::app()->db->createCommand($sql)->queryRow();
$prom3=$rubro3['promedio'];

$sql = "select AVG(valor) as promedio from ap1ind5b where periodo_id=$id and anio='$anio' and rubro=5 and mes in (4,5,6)"; 
$rubro4 = Yii::app()->db->createCommand($sql)->queryRow();
$prom4=$rubro4['promedio'];


    
}

if($i==3){
$sql = "select AVG(valor) as promedio from ap1ind5b where periodo_id=$id and anio='$anio' and rubro=1 and mes in (7,8,9)"; 
$rubro1 = Yii::app()->db->createCommand($sql)->queryRow();
$prom1=$rubro1['promedio'];

$sql = "select AVG(valor) as promedio from ap1ind5b where periodo_id=$id and anio='$anio' and rubro=2 and mes in (7,8,9)"; 
$rubro2 = Yii::app()->db->createCommand($sql)->queryRow();
$prom2=$rubro2['promedio'];

$sql = "select AVG(valor) as promedio from ap1ind5b where periodo_id=$id and anio='$anio' and rubro=4 and mes in (7,8,9)"; 
$rubro3 = Yii::app()->db->createCommand($sql)->queryRow();
$prom3=$rubro3['promedio'];

$sql = "select AVG(valor) as promedio from ap1ind5b where periodo_id=$id and anio='$anio' and rubro=5 and mes in (7,8,9)"; 
$rubro4 = Yii::app()->db->createCommand($sql)->queryRow();
$prom4=$rubro4['promedio'];


    
}

if($i==4){
$sql = "select AVG(valor) as promedio from ap1ind5b where periodo_id=$id and anio='$anio' and rubro=1 and mes in (10,11,12)"; 
$rubro1 = Yii::app()->db->createCommand($sql)->queryRow();
$prom1=$rubro1['promedio'];

$sql = "select AVG(valor) as promedio from ap1ind5b where periodo_id=$id and anio='$anio' and rubro=2 and mes in (10,11,12)"; 
$rubro2 = Yii::app()->db->createCommand($sql)->queryRow();
$prom2=$rubro2['promedio'];

$sql = "select AVG(valor) as promedio from ap1ind5b where periodo_id=$id and anio='$anio' and rubro=4 and mes in (10,11,12)"; 
$rubro3 = Yii::app()->db->createCommand($sql)->queryRow();
$prom3=$rubro3['promedio'];

$sql = "select AVG(valor) as promedio from ap1ind5b where periodo_id=$id and anio='$anio' and rubro=5 and mes in (10,11,12)"; 
$rubro4 = Yii::app()->db->createCommand($sql)->queryRow();
$prom4=$rubro4['promedio'];


    
}
					
if( !isset($json[$i])): 
		$json[$i] = array(
									//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
		'rubro1'=>number_format($prom1,1),
		'rubro2'=>number_format($prom2,1),
		'rubro3'=>number_format($prom3,1),
		'rubro4'=>number_format($prom4,1),
								
									
	);



endif;

}




			/*foreach ($resultado as $key => $row) {

			//$promedio1 = array_sum($array) / count($array);
			//$promedio2 = array_sum($array) / count($array);
				
						if( !isset($json["informe"][$row["entidad"]]) ): 
									$json["informe"][$row["entidad"]] = array(
									//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
									'rubros'=>array(),
																	
						          	);
						endif;

						if( !isset($json["informe"][$row["entidad"]]['rubros'][$row['rubro']]) ): 
									$json["informe"][$row["entidad"]]['rubros'][$row['rubro']] = array(
									//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
									$anio=>array(),
																	
						          	);
						endif;

						$promedio =0;


						for($i=1;$i<=$trims2;$i++){ 

						


							/*if($i==1 and ($row["id_mes"]==1 or $row["id_mes"]==2 or $row["id_mes"]==3 )){
							array_push($a,$row["valor"]);
						    }

						    if($i==2 and ($row["id_mes"]==4 or $row["id_mes"]==5 or $row["id_mes"]==6 )){
							array_push($a,$row["valor"]);
						    }

						    $promedio = array_sum($a) / count($a);*/

					/*		if( !isset($json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]) ): 
									$json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i] = array(
									//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
									'meses'=>array(),
									'promedio'=>0,
									
									
						          	);
							endif;

								if( !isset($json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][$row['mes']]) ){

										if($i==1 and ($row['mes']==1)){ 
											$json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][$row['mes']] = array(
											//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
											'valor'=>$row['valor'],
											
											);
											$trim1 = $trim1 + $row['valor'];

										}

										if($i==1 and ($row['mes']==2)){ 
											
											$json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][$row['mes']] = array(
											//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
											'valor'=>$row['valor'],
											
											);
											$trim1 = $trim1 + $row['valor'];
										}

										if($i==1 and ($row['mes']==3)){ 
											
											$json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][$row['mes']] = array(
											//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
											'valor'=>$row['valor'],
											
											);
											$trim1 = $trim1 + $row['valor'];
										}


										if($i==2 and ($row['mes']==4)){ 
											$json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][$row['mes']] = array(
											//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
											'valor'=>$row['valor'],
											
											);
										}

										if($i==2 and ($row['mes']==5)){ 
											$json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][$row['mes']] = array(
											//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
											'valor'=>$row['valor'],
											
											);
										}

										if($i==2 and ($row['mes']==6)){ 
											$json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][$row['mes']] = array(
											//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
											'valor'=>$row['valor'],
											
											);
										}

										if($i==3 and ($row['mes']==7)){ 
											$json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][$row['mes']] = array(
											//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
											'valor'=>$row['valor'],
											
											);
										}

											if($i==3 and ($row['mes']==8)){ 
											$json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][$row['mes']] = array(
											//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
											'valor'=>$row['valor'],
											
											);
										}

											if($i==3 and ($row['mes']==9)){ 
											$json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][$row['mes']] = array(
											//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
											'valor'=>$row['valor'],
											
											);
										}

											if($i==4 and ($row['mes']==10)){ 
											$json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][$row['mes']] = array(
											//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
											'valor'=>$row['valor'],
											
											);
										}

											if($i==4 and ($row['mes']==11)){ 
											$json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][$row['mes']] = array(
											//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
											'valor'=>$row['valor'],
											
											);
										}

											if($i==4 and ($row['mes']==12)){ 
											$json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][$row['mes']] = array(
											//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
											'valor'=>$row['valor'],
											
											);
										}


							}

						if($i==1){
						$trim1= $json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][1]['valor'] + $json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][2]['valor'] + $json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][3]['valor'];
						$promedio = $trim1/3;
						$promedio = round($promedio,1);
						$json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['promedio'] =$promedio;

						}

						if($i==2){
						$trim1= $json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][4]['valor'] + $json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][5]['valor'] + $json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][6]['valor'];
						$promedio = $trim1/3;
						$promedio = round($promedio,1);
						$json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['promedio'] =$promedio;

						}

						if($i==3){
						$trim1= $json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][7]['valor'] + $json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][8]['valor'] + $json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][9]['valor'];
						$promedio = $trim1/3;
						$promedio = round($promedio,1);
						$json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['promedio'] =$promedio;

						}

						if($i==4){
						$trim1= $json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][10]['valor'] + $json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][11]['valor'] + $json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['meses'][12]['valor'];
						$promedio = $trim1/3;

						$json["informe"][$row["entidad"]]['rubros'][$row['rubro']][$anio][$i]['promedio'] =$promedio;

						}
						
						}

		
						/*if( !isset($json["informe"][$row["entidad"]]['mes'][$row["mes"]]) ): 
									$json["informe"][$row["entidad"]]['mes'][$row["id_mes"]] = array(
									//'valor'=> round($row["valor"], 1, PHP_ROUND_HALF_EVEN),
									'valor'=>$row["valor"],
									
									
						          	);
						endif;*/

						
						
		//	}


			header('Content-type: application/json');  
			echo json_encode($json);  
			Yii::app()->end(); 
			}


function round_up ($value, $places=0) {
  if ($places < 0) { $places = 0; }
  $mult = pow(10, $places);
  return number_format(ceil($value * $mult) / $mult);
}

	}