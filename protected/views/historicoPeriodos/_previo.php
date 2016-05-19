<div class="page-header">
  <h2>Previo</h2>
</div>
<div class="clear"></div>
<div id="main_content">

  <?php
  //incluir funciion para cachar el errors
  error_reporting(0);
  $this->renderPartial('_btnvista', array('id_p'=>$id_p, 'ind'=>$ind));  

  echo '<div class="clear"></div>';

  if($graf_int==1){
      //echo "periodo->".$id_grafico;
      //echo "id->".$id;
  		$this->renderPartial('//site/grafico'.$id, array('id'=>$id, 'ind'=>$ind, 'periodo'=>$id_p));
      
  }else{
	  if($grafico == 0){ 
       
		  	$this->renderPartial('//site/page'.$ind, array('id'=>$id, 'ind'=>$ind, 'periodo'=>$id_p));
		}else{
			$this->renderPartial('//site/grafico'.$ind, array('id'=>$id, 'ind'=>$ind, 'periodo'=>$id_p));
		}
	}
?>