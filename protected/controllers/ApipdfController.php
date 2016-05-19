<?php

class ApipdfController extends Controller
{
		public function actionAp1Ind1($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap1Ind1($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-ValorCensal_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap1Ind1($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"ValorCensal_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

		public function actionAp4Ind12($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap4Ind12($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Ingresoporhora". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap4Ind12($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"ap1Ind2a_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}


		public function actionAp1Ind2a($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap1Ind2a($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-ParticipacionPorcentual". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap1Ind2a($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"ap1Ind2a_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

		public function actionAp1Ind2b($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap1Ind2b($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-ParticipacionPorcentualEntidades". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap1Ind2b($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"ap1Ind2a_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}


	public function actionAp1Ind3($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap1Ind3($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-PIB-Per-capita". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap1Ind3($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"ap1Ind3_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp1Ind4a($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap1Ind4a($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Itaee-df". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap1Ind4a($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Itaee-df_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp1Ind4b($periodo,$tipo,$anio,$trim)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap1Ind4b($periodo,$anio,$trim);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Itaee-sector". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap1Ind4b($periodo,$anio,$trim));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Itaee-sector_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

public function actionAp1Ind4c($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap1Ind4c($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Itaee-historico". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap1Ind4c($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Itaee-historico". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp1Ind5a($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap1Ind5a($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Actividad-Industrial_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap1Ind5a($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Actividad-Industrial_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp1Ind5b($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap1Ind5b($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Actividad-Industrial-Sector_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap1Ind5b($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Actividad-Industrial-Sector_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp1Ind61($periodo,$tipo,$anio,$trim)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap1Ind61($periodo,$anio,$trim);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Construccion_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap1Ind61($periodo,$anio,$trim));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Construccion_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp1Ind62($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap1Ind62($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Construccion-sector_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap1Ind62($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Construccion-sector_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp1Ind71($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap1Ind71($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Industrua-manufaturera_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap1Ind71($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Industrua-manufaturera_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp1Ind72($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap1Ind72($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Industrua-manufaturera2_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap1Ind72($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Industrua-manufaturera2_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp1Ind81($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap1Ind81($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Exportaciones_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap1Ind81($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Exportaciones_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp1Ind82($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap1Ind82($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Exportaciones-subsector_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap1Ind82($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Exportaciones-subsector_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp1Ind83($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap1Ind83($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Exportaciones-anuales_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap1Ind83($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Exportaciones-anuales_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp1Ind9($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap1Ind9($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Cuentas-produccion_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap1Ind9($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Cuentas-produccion_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp1Ind10($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap1Ind10($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Cuentas-produccion_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap1Ind10($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Cuentas-produccion_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}


	public function actionAp2Ind1($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap2Ind1($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Precios_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap2Ind1($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Precios_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}


public function actionAp2Ind2($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap2Ind2($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Precios-historico_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap2Ind2($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Precios-historico_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}


	public function actionAp2Ind3($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap2Ind3($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Inflacion_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap2Ind3($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Inflacion_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp2Ind4($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap2Ind4($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Inflacion-historico_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap2Ind4($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Inflacion-historico_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp2Ind3a($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap2Ind3a($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-IPP_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap2Ind3a($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-IPP_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

public function actionAp3Ind11($periodo,$tipo,$trim)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap3Ind11($periodo,$trim);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-PEA-PO_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap3Ind11($periodo,$trim));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-PEA-PO_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

public function actionAp3Ind12($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap3Ind12($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Tasa-desempleo_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap3Ind12($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Tasa-desempleo_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

public function actionAp3Ind2($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap3Ind2($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-TasaDesempleo_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap3Ind2($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-TasaDesempleo_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

public function actionAp3Ind31($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap3Ind31($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-trabajadores-IMSS_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap3Ind31($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-trabajadores-IMSS_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

public function actionAp3Ind4($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap3Ind4($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Ocupacion-formal_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap3Ind4($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Ocupacion-formal_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

public function actionAp3Ind5($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap3Ind5($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Ocupacion-critica_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap3Ind5($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Ocupacion-critica_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}
public function actionAp4Ind11($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap4Ind11($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDFPoblacionOcupada_
        $report = "Indicador-PoblacionOcupada_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap4Ind11($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-PoblacionOcupada_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}
public function actionAp4Ind2($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap4Ind2($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Remesas_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap4Ind2($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Remesas_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp4Ind31($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap4Ind31($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-CotizacionIMSS_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap4Ind31($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-CotizacionIMSS_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp4Ind32($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap4Ind32($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-CotizacionIMSSHist_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap4Ind32($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-CotizacionIMSSHist_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp4Ind4($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap4Ind4($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-TendeciaLaboral_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap4Ind4($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-TendeciaLaboral_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}


public function actionAp9Ind2($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap9Ind2($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Turistas_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap9Ind2($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Turistas_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp9Ind1($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap9Ind1($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Turismo". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap9Ind1($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Turismo". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp8Ind3($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap8Ind3($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-VentasANTAD_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap8Ind3($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-VentasANTAD_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp8Ind21($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap8Ind21($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-UnidadesComercio_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap8Ind21($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-UnidadesComercio_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}


public function actionAp8Ind12($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap8Ind12($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-MensualComercio_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap8Ind12($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-MensualComercio_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

public function actionAp8Ind11($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap8Ind11($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Comercio_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap8Ind11($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Comercio_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp7Ind3($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap7Ind3($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-ServicioDeudaPublica_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap7Ind3($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-ServicioDeudaPublica_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp7Ind2($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap7Ind2($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Egresos_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap7Ind2($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Egresos_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

public function actionAp7Ind11($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap7Ind11($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-Ingresos_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap7Ind11($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-Ingresos_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

public function actionAp6Ind11($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap6Ind11($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-InversionExtranjera_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap6Ind11($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-InversionExtranjera_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}
	public function actionAp6Ind2($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap6Ind2($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-FormacionBrutaCapitalFijo_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap6Ind2($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-FormacionBrutaCapitalFijo_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

public function actionAp6Ind13($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap6Ind13($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-InversiónExtranjeraDirecta". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap6Ind13($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-InversiónExtranjeraDirecta". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp5Ind4($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap5Ind4($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-IndiceCompetitividad_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap5Ind4($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-IndiceCompetitividad_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

public function actionAp5Ind3($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap5Ind3($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-RegulacionesNegocios_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap5Ind3($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-RegulacionesNegocios_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

public function actionAp5Ind23($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap5Ind23($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-UnidadesEconomicas_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap5Ind23($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-UnidadesEconomicas_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp5Ind22($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap5Ind22($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-UnidadesEconomicasSector_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap5Ind22($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-UnidadesEconomicasSector_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp5Ind21($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap5Ind21($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-UnidadesEconomicas_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap5Ind21($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-UnidadesEconomicas_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}

	public function actionAp5Ind1($periodo,$tipo)
	{
		
		if($tipo==1){
		$html=$this->encabezado();
		$html2=$this->tabla_ap5Ind1($periodo);

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
 
        # Outputs ready PDF
        $report = "Indicador-AvisosApertura_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
	} else {
		$html=$this->encabezado();
		$html2=utf8_decode($this->tabla_ap5Ind1($periodo));
		header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
		header("Content-Disposition: filename=\"Indicador-AvisosApertura_". date("d/m/y H:i:s").".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $html2;  
		Yii::app()->end();
	}
 

	}



	public function encabezado()
	{
		
		$logo = Yii::app()->request->baseUrl . '/images/logos.png';
		$logocdmx = Yii::app()->request->baseUrl . '/images/logocdmx.png';
		//$html =file_get_contents(Yii::getPathOfAlias('webroot.css') . '/bootstrap.css');

		$html ="<div class=\"row headercontentRow\">
                        <div class=\"col-md-1\"></div>
                        <div class=\"col-md-2 text-left collogosHeader\"><img src=\"$logo\" alt=\"Secretaría de Desarrollo Económico de la Ciudad de México\" /></div>
                        <div class=\"col-md-3 text-left coltituloHeader\"><h1 class=\"tituloHeader\">SECRETARÍA DE <br/><span>DESARROLLO <br/>ECONÓMICO</span></h1></div>
                        <div class=\"col-md-5 text-center colcdmxHeader\"><img src=\"$logocdmx\" alt=\"Ciudad de México\" /></div>
                        <div class=\"col-md-1\"></div>
                    </div>";

        $html ="<div class=\"row headercontentRow\">
        <table cellspacing=\"0\" style=\"width: 100%; text-align: center; \">
        <tr>
            <td style=\"width: 10%;\">
            <img style=\"width:20%;\" src=\"$logo\" alt=\"Secretaría de Desarrollo Económico de la Ciudad de México\" /> 
            </td>
            <td style=\"width: 60%;\">
           <div  class=\"coltituloHeader\"><h1 class=\"tituloHeader\">SECRETARÍA DE <br/><span>DESARROLLO <br/>ECONÓMICO</span></h1></div>
            </td>
             <td style=\"width: 10%;\">
             <div class=\"col-md-5 text-center colcdmxHeader\"><img style=\"width:15%;\" src=\"$logocdmx\" alt=\"Ciudad de México\" /></div>
             </td>
            
        </tr>
    </table></div>";

        return $html;
	}

	public function tabla_ap1Ind1($periodo)
	{
	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	

	$url = $baseUrl. "/index.php/api2/ap1Ind1?&periodo=".$periodo;
        //$url = $baseUrl;
    $data = file_get_contents($url);
    $model= CJSON::decode($data);

    $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">PRODUCCIÓN</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <p>$titulos[titulo2]</p>
                <p>$titulos[titulo3]</p>
        </div>";   
  
                

              

   

									
			
		$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">
			        	<tr>
			        		<td class=\"invisible\"></td>
			        		<td colspan=\"19\" class=\"span_time\">Valor agregado censal bruto</td>
			        	</tr>



			        	<tr class=\"cell_label\">
			        		<td>Subsector de actividad económica</td>
			        		<td>Distrito Federal</td>
			        		<td>Azcapotzalco</td>
			        		<td>Coyoacán</td>
							<td>Cuajimalpa de Morelos</td>
							<td>Gustavo A. Madero</td>
							<td>Iztacalco</td>
							<td>Iztapalapa</td>
							<td>Magdalena Contreras</td>
							<td>Milpa Alta</td>
							<td>Álvaro Obregón</td>
							<td>Tláhuac</td>
							<td>Tlalpan</td>
							<td>Xochimilco</td>
							<td>Benito Juárez</td>
							<td>Cuauhtémoc</td>
							<td>Miguel Hidalgo</td>
							<td>Venustiano Carranza</td>
			        	</tr>";


			              

$totaldf =0;
$df=number_format(HistoricoPeriodos::model()->suma_valorcensal2(9,$periodo));
$azcapotzalco=number_format(HistoricoPeriodos::model()->suma_valorcensal1(2,$periodo));
$coyoacan=number_format(HistoricoPeriodos::model()->suma_valorcensal1(3,$periodo));
$cuajimalpa=number_format(HistoricoPeriodos::model()->suma_valorcensal1(4,$periodo));
$gustavo=number_format(HistoricoPeriodos::model()->suma_valorcensal1(5,$periodo));
$iztacalco=number_format(HistoricoPeriodos::model()->suma_valorcensal1(6,$periodo));
$iztapalapa=number_format(HistoricoPeriodos::model()->suma_valorcensal1(7,$periodo));
$magdalena=number_format(HistoricoPeriodos::model()->suma_valorcensal1(8,$periodo));
$milpaalta=number_format(HistoricoPeriodos::model()->suma_valorcensal1(9,$periodo));
$alvaro=number_format(HistoricoPeriodos::model()->suma_valorcensal1(10,$periodo));
$tlahuac=number_format(HistoricoPeriodos::model()->suma_valorcensal1(11,$periodo));
$tlalpan=number_format(HistoricoPeriodos::model()->suma_valorcensal1(12,$periodo));
$xochimilco=number_format(HistoricoPeriodos::model()->suma_valorcensal1(13,$periodo));
$benito=number_format(HistoricoPeriodos::model()->suma_valorcensal1(14,$periodo));
$cuau=number_format(HistoricoPeriodos::model()->suma_valorcensal1(15,$periodo));
$miguel=number_format(HistoricoPeriodos::model()->suma_valorcensal1(16,$periodo));
$venustiano=number_format(HistoricoPeriodos::model()->suma_valorcensal1(17,$periodo));
//$df=HistoricoPeriodos::model()->suma_valorcensal1($id,$periodo);

$html .="<tr class=\"rEven\">			        		
			        		<td>Total</td>
			        		<td class=\"data\">$df</td>
			        		<td class=\"data\">$azcapotzalco</td>
			        		<td class=\"data\">$coyoacan</td>
			        		<td class=\"data\">$cuajimalpa</td>
			        		<td class=\"data\">$gustavo</td>
			        		<td class=\"data\">$iztacalco</td>
			        		<td class=\"data\">$iztapalapa</td>
			        		<td class=\"data\">$magdalena</td>
			        		<td class=\"data\">$milpaalta</td>
			        		<td class=\"data\">$alvaro</td>
			        		<td class=\"data\">$tlahuac</td>
			        		<td class=\"data\">$tlalpan</td>
			        		<td class=\"data\">$xochimilco</td>
			        		<td class=\"data\">$benito</td>
			        		<td class=\"data\">$cuau</td>
			        		<td class=\"data\">$miguel</td>
			        		<td class=\"data\">$venustiano</td>
			        	</tr>";


/*echo "<tr class=\"rEven\">                  
                  <td>Total</td>
                  <td class=\"data\">".$gran_totaldf."</td>
                  <td class=\"data\">".$gran_azcapotzalco."</td>
                  <td class=\"data\">".$gran_coyoacan."</td>
                  <td class=\"data\">".$gran_cuajimalpa."</td>
                  <td class=\"data\">".$gran_gam."</td>
                  <td class=\"data\">".$gran_iztacalco."</td>
                  <td class=\"data\">".$gran_iztapalapa."</td>
                  <td class=\"data\">".$gran_contreras."</td>
                  <td class=\"data\">".$gran_milpaalta."</td>
                  <td class=\"data\">".$gran_obregon."</td>
                  <td class=\"data\">".$gran_tlahuac."</td>
                  <td class=\"data\">".$gran_tlalpan."</td>
                  <td class=\"data\">".$gran_xochimilco."</td>
                  <td class=\"data\">".$gran_benito."</td>
                  <td class=\"data\">".$gran_cuautemoc."</td>
                  <td class=\"data\">".$gran_hidalgo."</td>
                  <td class=\"data\">".$gran_venustiano."</td>
                </tr>";*/
foreach ($model as $indice => $valor) {
//echo ("El indice1 $indice tiene el valor: $valor<br>");


	if (is_array($valor)){ 
   		foreach ($valor as $indice2 => $valor2) {
   			//echo ("El indice2 $indice2 tiene el valor: $valor2<br>");

   				if (is_array($valor2)){ 
			   		foreach ($valor2 as $indice3 => $valor3) {
			   			//echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
			   			if (is_array($valor3)){ 
					   		foreach ($valor3 as $indice4 => $valor4) {
					   			//echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
					   		}
			   			}
			   		}
			   	}



    $azcapotzalco =number_format($model[$indice][$indice2]['2'][$indice4],0);
    $coyoacan =number_format($model[$indice][$indice2]['3'][$indice4],0);
    $cuajimalpa =number_format($model[$indice][$indice2]['4'][$indice4],0);
    $gam =number_format($model[$indice][$indice2]['5'][$indice4],0);
    $iztacalco =number_format($model[$indice][$indice2]['6'][$indice4],0);
    $iztapalapa =number_format($model[$indice][$indice2]['7'][$indice4],0);
    $contreras =number_format($model[$indice][$indice2]['8'][$indice4],0);
    $milpaalta =number_format($model[$indice][$indice2]['9'][$indice4],0);
    $obregon =number_format($model[$indice][$indice2]['10'][$indice4],0);
    $tlahuac =number_format($model[$indice][$indice2]['11'][$indice4],0);
    $tlalpan =number_format($model[$indice][$indice2]['12'][$indice4],0);
    $xochimilco =number_format($model[$indice][$indice2]['13'][$indice4],0);
    $benito =number_format($model[$indice][$indice2]['14'][$indice4],0);
    $cuautemoc =number_format($model[$indice][$indice2]['15'][$indice4],0);
    $hidalgo =number_format($model[$indice][$indice2]['16'][$indice4],0);
    $venustiano =number_format($model[$indice][$indice2]['17'][$indice4],0);

    $total = $azcapotzalco + $coyoacan + $cuajimalpa + $gam + $iztacalco + $iztapalapa + $contreras + $milpaalta + $obregon + $tlahuac + $tlalpan + $xochimilco + $benito + $cuautemoc + $hidalgo + $venustiano;
    
    $totaldf = $totaldf + $total;
    $totaldf =number_format($total,0); 


    





$sql = "SELECT nombre from actividades_economicas where id=$indice2"; 
$actividad = Yii::app()->db->createCommand($sql)->queryRow();

  $sql = "SELECT sum(valor)  as suma from ap1Ind1 where actividad=$indice2"; 
  $suma = Yii::app()->db->createCommand($sql)->queryRow();

$totaldf =number_format($suma['suma'],0); 

    $html .="<tr class=\"rEven\">			        		
			        		<td>".$actividad['nombre']."</td>
			        		<td class=\"data\">".$totaldf."</td>
			        		<td class=\"data\">".$azcapotzalco."</td>
			        		<td class=\"data\">".$coyoacan."</td>
			        		<td class=\"data\">".$cuajimalpa."</td>
			        		<td class=\"data\">".$gam."</td>
			        		<td class=\"data\">".$iztacalco."</td>
			        		<td class=\"data\">".$iztapalapa."</td>
			        		<td class=\"data\">".$contreras."</td>
			        		<td class=\"data\">".$milpaalta."</td>
			        		<td class=\"data\">".$obregon."</td>
			        		<td class=\"data\">".$tlahuac."</td>
			        		<td class=\"data\">".$tlalpan."</td>
			        		<td class=\"data\">".$xochimilco."</td>
			        		<td class=\"data\">".$benito."</td>
			        		<td class=\"data\">".$cuautemoc."</td>
			        		<td class=\"data\">".$hidalgo."</td>
			        		<td class=\"data\">".$venustiano."</td>
			        	</tr>";
   	}
 }

}




		
$html .="</table>
   </div>";
$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap1Ind2a($periodo)
	{
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	

	$url = $baseUrl. "/index.php/api2/ap1Ind2a?&periodo=$periodo&entidad=$var";
        //$url = $baseUrl;
   $data = file_get_contents($url);
    $model= CJSON::decode($data); 

     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">PRODUCCIÓN</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <p>$titulos[titulo2]</p>
                <p>$titulos[titulo3]</p>
        </div>";   
  
                

              

   

									
			
		$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">
               <tr class=\"cell_label\">
                  <td>Entidad Federativa</td>
                  <td>Participación porcentual en el PIB nacional, 2013</td>
                </tr>";




foreach ($model as $indice => $valor) {
//echo ("El indice1 $indice tiene el valor: $valor<br>");
  if (is_array($valor)){ 
      foreach ($valor as $indice2 => $valor2) {
        //echo ("El indice2 $indice2 tiene el valor: $valor2<br>");

          if (is_array($valor2)){ 
            foreach ($valor2 as $indice3 => $valor3) {
              //echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
              if (is_array($valor3)){ 
                foreach ($valor3 as $indice4 => $valor4) {
                  //echo ("El indice4 $indice4 tiene el valor: $valor4<br>");

                  $html .="<tr class=\"rEven\"> 
               <td>$indice3</td> 
               <td class=\"data\">$valor4 %</td> 
            </tr>";
                }
              }
              
            }
          }
    }
  }
}






		
$html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap1Ind2b($periodo)
	{
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	

		//años 
	$rango= range($config['anios_ini'], $config['anios_fin']);
	$a = HistoricoPeriodos::model()->listaSimple($rango);
	//meses
	$m = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];
	$url = $baseUrl. "/index.php/api2/ap1Ind2b?anios=$a&entidad=$m,0&grafico=0&periodo=".$periodo;
	//$url = $baseUrl;
	$data = file_get_contents($url);
	$model= CJSON::decode($data);

     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">PRODUCCIÓN</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <p>$titulos[titulo2]</p>
                <p>$titulos[titulo3]</p>
        </div>";   
  
                

              

   

									
			
		$html .="<table class=\"table400 table-bordered table-condensed\">
    <tr class=\"cell_label\"><td>Periodo</td>";
          
          foreach ($rango as $key => $value) {
          $html .="<td>$value</td>";
          }

     $html .="</tr>";      

            


if(is_array($model)){
  foreach ($model as $indice => $valor) {
  //echo ("El indice1 $indice tiene el valor: $valor<br>");
    if(is_array($valor)){
      foreach ($valor as $indice2 => $valor2) {
      //echo ("El indice2 $indice2 tiene el valor: $valor2<br>");
        if(is_array($valor2)){
          foreach ($valor2 as $indice3 => $valor3) {
          //echo ("El indice3 $indice3 tiene el valor: $valor3<br>");

            switch ($indice3) {
                      case '1':
                       $html .="<tr class=\"cell_label\">
                                      <td colspan=\"5\">Sector Primario</td>                
                                   </tr>";
                      break;
                    
                      case '2':
                        $html .="<tr class=\"cell_label\">
                                      <td colspan=\"5\">Sector Secundario</td>                
                                   </tr>";
                      break;
                    
                      case '3':
                        $html .="<tr class=\"cell_label\">
                                      <td colspan=\"5\">Sector Terciario</td>                
                                   </tr>";
                      break;
                    
                      
                    }

          
              if(is_array($valor3)){
              foreach ($valor3 as $indice4 => $valor4) {
              //echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
                  if(is_array($valor4)){
                    $contador=0;
                    foreach ($valor4 as $indice5 => $valor5) {
                    //echo ("El indice5 $indice5 tiene el valor: $valor5<br>");
                     $sql = "SELECT nombre from entidades where id=$indice5"; 
                        $entidad = Yii::app()->db->createCommand($sql)->queryRow();
                    
                    $html .="<tr class=\"rEven\">
                                  <td>$entidad[nombre]</td>
                                 ";
                  
                  
                  

                        if(is_array($valor5)){
                          
                            foreach ($valor5 as $indice6 => $valor6) {
                              //echo ("El indice6 $indice6 tiene el valor: $valor6<br>");

                              if(is_array($valor6)){
                          
                                  foreach ($valor6 as $indice7 => $valor7) {

                                      if(is_array($valor7)){
                          
                                          foreach ($valor7 as $indice8 => $valor8) {
                                            $html .="<td  class=\"data\">$valor8</td>";








                                          }
                                      }



                                    /*echo "<tr class=\"rEven\">
                                                <td>$indice7</td>
                                                <td class=\"data\">34.5</td>
                                                <td class=\"data\">33.8</td>
                                                 <td class=\"data\">32.9</td>
                                                <td class=\"data\">33.3</td>
                                              </tr>";*/
                                              
                                    }
                              }

                            }
                        }
                    $html .="</tr>";
                    }
                  }
              }
            }
          
        
          

          }
        }

      }
    }
  }
}




		
$html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap1Ind3($periodo)
	{
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	

	$url = $baseUrl. "/index.php/api2/ap1Ind3?periodo=$periodo&tipo=1";
//$url = $baseUrl; ap1Ind4c?id=23&anioini=2010&aniofin=2014&trim=1,2
//echo $url;
//die();


$data = file_get_contents($url);
$model= CJSON::decode($data);


$url2 = $baseUrl. "/index.php/api2/ap1Ind3?periodo=$periodo&tipo=2";
//$url = $baseUrl; ap1Ind4c?id=23&anioini=2010&aniofin=2014&trim=1,2
//echo $url;
//die();


$data2 = file_get_contents($url2);
$model2= CJSON::decode($data2);

     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">PRODUCCIÓN</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <p>$titulos[titulo2]</p>
                <p>$titulos[titulo3]</p>
        </div>";   
  
                

              

   

									
			
		$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">
          <tr class=\"cell_label\">
			        		<td></td>
			        		<td>PIB a precios constantes (millones de pesos)</td>	
			        		<td>Tipo de cambio dólar 2012 Banxico</td> 	
			        		<td>Dólares (millones de dólares)</td>	
			        		<td>Población 2012 CONAPO</td>	
			        		<td>PIB per cápita a precios constantes (pesos)</td>	
			        		<td>PIB per cápita a precios constantes (dólares)</td>
			        	</tr>";


if(is_array($model)){
	foreach ($model as $indice => $valor) {
	//echo ("El indice1 $indice tiene el valor: $valor<br>");
		if(is_array($valor)){
			foreach ($valor as $indice2 => $valor2) {
			//echo ("El indice2 $indice2 tiene el valor: $valor2<br>");

			$html .="<tr class=\"rEven\">
			        		<td>$indice2</td>
			        	
			        	";

				if(is_array($valor2)){
					foreach ($valor2 as $indice3 => $valor3) {
					$fin =number_format($valor3,1);
					//echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
					$html .="<td class=\"data\">$fin</td>";

					}
				}
				$html .="</tr>";
			}
		}
	}
}

		        
			      
			        	
			        	$html .="<tr class=\"cell_label\">
			        		<td></td>
			        		<td>PIB a precios corrientes (millones de pesos)</td>	
			        		<td>Tipo de cambio dólar 2012 Banxico</td> 	
			        		<td>Dólares (millones de dólares)</td>	
			        		<td>Población 2012 CONAPO</td>	
			        		<td>PIB per cápita a precios corrientes (pesos)</td>	
			        		<td>PIB per cápita a precios corrientes (dólares)</td>
			        	</tr>";
			        		
			      	

if(is_array($model2)){
	foreach ($model2 as $indice => $valor) {
	//echo ("El indice1 $indice tiene el valor: $valor<br>");
		if(is_array($valor)){
			foreach ($valor as $indice2 => $valor2) {
			//echo ("El indice2 $indice2 tiene el valor: $valor2<br>");

			$html .="<tr class=\"rEven\">
			        		<td>$indice2</td>
			        	
			        	";

				if(is_array($valor2)){
					foreach ($valor2 as $indice3 => $valor3) {
					$fin =number_format($valor3,1);
					//echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
					$html .="<td class=\"data\">$fin</td>";

					}
				}
				$html .="</tr>";
			}
		}
	}
}


		
$html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap1Ind4a($periodo)
	{
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	

$m = HistoricoPeriodos::model()->listaSimple($config['config']);
$url = $baseUrl. "/index.php/api2/ap1Ind4as?periodo=$periodo&anio=".$config[anios_ini]."&trim=$m";
//$url = $baseUrl;
//echo $url;

$data = file_get_contents($url);
$model= CJSON::decode($data);

$url2 = $baseUrl. "/index.php/api2/ap1Ind4ad?periodo=$periodo&anio=$config[anios_ini]&trim=$m";
//$url = $baseUrl;
//echo $url;

$data2 = file_get_contents($url2);
$model2= CJSON::decode($data2);

     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">PRODUCCIÓN</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <p>$titulos[titulo2]</p>
                <p>$titulos[titulo3]</p>
        </div>";   
  
                

              

   

									
			
		$html .="<table class=\"table600 table-bordered table-condensed table400\">


                <tr class=\"cell_label\">
                  <td>Series originales</td>
                  <td>Total de la Actividad Económica</td>
                  <td>Var. % respecto al mismo periodo del año anterior</td>
                </tr>";


if(is_array($model)){
  foreach ($model as $indice => $valor) {
  //echo ("El indice1 $indice tiene el valor: $valor<br>");
    if(is_array($valor)){
      foreach ($valor as $indice2 => $valor2) {
      //echo ("El indice2 $indice2 tiene el valor: $valor2<br>");
        if(is_array($valor2)){
          foreach ($valor2 as $indice3 => $valor3) {
          //echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
            if(is_array($valor3)){
              foreach ($valor3 as $indice4 => $valor4) {
              //echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
                  if(is_array($valor4)){
                    $contador=0;
                    foreach ($valor4 as $indice5 => $valor5) {
                    //echo ("El indice5 $indice5 tiene el valor: $valor5<br>");


                    $html .=" <tr class=\"rEven\">";
                    
                  
                      $html .=" <td>$indice3.0$indice5</td>";
                    

                        if(is_array($valor5)){
                          
                            foreach ($valor5 as $indice6 => $valor6) {

                              //echo ("El indice6 $indice6 tiene el valor: $valor6<br>");
                              $html .=" <td class=\"data\">$valor6</td>";
                            }
                        }

                    $html .=" </tr>";

                    $contador++;
                    }
                  }
              }
            }
          }
        }

      }
    }
  }
}



$html .="<tr class=\"rEven\">
                  <td>Series desestacionalizadas
		</td>
                  <td>Total de la Actividad Económica</td>
                  <td>Var. % respecto al mismo periodo del año anterior</td>
                </tr>";




if(is_array($model2)){
  foreach ($model2 as $indice => $valor) {
  //echo ("El indice1 $indice tiene el valor: $valor<br>");
    if(is_array($valor)){
      foreach ($valor as $indice2 => $valor2) {
      //echo ("El indice2 $indice2 tiene el valor: $valor2<br>");
        if(is_array($valor2)){
          foreach ($valor2 as $indice3 => $valor3) {
          //echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
            if(is_array($valor3)){
              foreach ($valor3 as $indice4 => $valor4) {
              //echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
                  if(is_array($valor4)){
                    $contador=0;
                    foreach ($valor4 as $indice5 => $valor5) {
                    //echo ("El indice5 $indice5 tiene el valor: $valor5<br>");

                    $html .=" <tr class=\"rEven\">";
                    
                    
                    $html .=" <td>$indice3.0$indice5</td>";
                  

                        if(is_array($valor5)){
                          
                            foreach ($valor5 as $indice6 => $valor6) {

                              //echo ("El indice6 $indice6 tiene el valor: $valor6<br>");
                              $html .=" <td class=\"data\">$valor6</td>";
                            }
                        }

                    $html .=" </tr>";


                    }
                  }
              }
            }
          }
        }

      }
    }
  }
}


    
		
$html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap1Ind4b($periodo,$anio,$trim)
	{
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	

if(date('Y')=='2016'){
	$anio='';
	$trim=4;
}
//$anio =2014;
//$trim=4;
/*
foreach ($model as $indice => $valor) {
//echo ("El indice1 $indice tiene el valor: $valor<br>");
  if (is_array($valor)){ 
      foreach ($valor as $indice2 => $valor2) {
        //echo ("El indice2 $indice2 tiene el valor: $valor2<br>");

          if (is_array($valor2)){ 
            foreach ($valor2 as $indice3 => $valor3) {
              //echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
              if (is_array($valor3)){ 
                foreach ($valor3 as $indice4 => $valor4) {
                  //echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
                  if (is_array($valor4)){ 
                    foreach ($valor4 as $indice5 => $valor5) {
                      //echo ("El indice5 $indice5 tiene el valor: $valor5<br>");
                      if (is_array($valor5)){ 
                        foreach ($valor5 as $indice6 => $valor6) {
                          //echo ("El indice6 $indice6 tiene el valor: $valor6<br>");
                          if (is_array($valor6)){ 
                            foreach ($valor6 as $indice7 => $valor7) {
                              //echo ("El indice7 $indice7 tiene el valor: $valor7<br>");

                              $act =$model[$indice][$indice2][$indice3][$indice4][$indice5][$indice6][$indice7]['valor'];
                              $vp  =$model[$indice][$indice2][$indice3][$indice4][$indice5][$indice6][$indice7]['vp'];

                              $html .="<tr class=\"rEven\">
                                    <td>$indice7</td>
                                <td colspan=\"3\" class=\"data\">$act</td>  
                                <td colspan=\"3\" class=\"data\">$vp</td> 
                            
                                  </tr>";



                            }
                      }
                        }

                        if (is_array($valor)){ 
      foreach ($valor as $indice2 => $valor2) {
        //echo ("El indice2 $indice2 tiene el valor: $valor2<br>");

          if (is_array($valor2)){ 
            foreach ($valor2 as $indice3 => $valor3) {
              //echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
              if (is_array($valor3)){ 
                foreach ($valor3 as $indice4 => $valor4) {
                  //echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
                  if (is_array($valor4)){ 
                    foreach ($valor4 as $indice5 => $valor5) {
                      //echo ("El indice5 $indice5 tiene el valor: $valor5<br>");
                      if (is_array($valor5)){ 
                        foreach ($valor5 as $indice6 => $valor6) {
                          //echo ("El indice6 $indice6 tiene el valor: $valor6<br>");
                          if (is_array($valor6)){ 
                            foreach ($valor6 as $indice7 => $valor7) {
                              //echo ("El indice7 $indice7 tiene el valor: $valor7<br>");

                              $act =$model[$indice][$indice2][$indice3][$indice4][$indice5][$indice6][$indice7]['valor'];
                              $vp  =$model[$indice][$indice2][$indice3][$indice4][$indice5][$indice6][$indice7]['vp'];

                              $html .="<tr class=\"rEven\">
                                    <td>$indice7</td>
                                <td colspan=\"3\" class=\"data\">$act</td>  
                                <td colspan=\"3\" class=\"data\">$vp</td> 
                            
                                  </tr>";



                            }
                      }
                        }

                        */

$url = $baseUrl. "/index.php/api2/ap1Ind4b?periodo=$periodo&anio=$anio&trim=$trim";


$data2 = file_get_contents($url);
$model= CJSON::decode($data2);

     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">PRODUCCIÓN</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <p>$titulos[titulo2]</p>
                <p>$titulos[titulo3]</p>
        </div>";   
  
                

              

   

									
			
		$html .=" <table class=\"table600 table-bordered table-condensed table400\">
                <tr>
                  <td rowspan=\"2\" class=\"span_time\">Sector de actividad económica</td>
                  <td colspan=\"3\" class=\"span_time\">Series originales</td>
                  <td colspan=\"3\" class=\"span_time\">Variación anual (%)</td>
                </tr>
                <tr class=\"rEven\">
                  <td colspan=\"6\">$anio.$trim</td>
                  
                </tr>";


foreach ($model as $indice => $valor) {
//echo ("El indice1 $indice tiene el valor: $valor<br>");
  if (is_array($valor)){ 
      foreach ($valor as $indice2 => $valor2) {
        //echo ("El indice2 $indice2 tiene el valor: $valor2<br>");

          if (is_array($valor2)){ 
            foreach ($valor2 as $indice3 => $valor3) {
              //echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
              if (is_array($valor3)){ 
                foreach ($valor3 as $indice4 => $valor4) {
                  //echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
                  if (is_array($valor4)){ 
                    foreach ($valor4 as $indice5 => $valor5) {
                      //echo ("El indice5 $indice5 tiene el valor: $valor5<br>");
                      if (is_array($valor5)){ 
                        foreach ($valor5 as $indice6 => $valor6) {
                          //echo ("El indice6 $indice6 tiene el valor: $valor6<br>");
                          if (is_array($valor6)){ 
                            foreach ($valor6 as $indice7 => $valor7) {
                              //echo ("El indice7 $indice7 tiene el valor: $valor7<br>");

                              $act =$model[$indice][$indice2][$indice3][$indice4][$indice5][$indice6][$indice7]['valor'];
                              $vp  =$model[$indice][$indice2][$indice3][$indice4][$indice5][$indice6][$indice7]['vp'];

                              $html .="<tr class=\"rEven\">
                                    <td>$indice7</td>
                                <td colspan=\"3\" class=\"data\">$act</td>  
                                <td colspan=\"3\" class=\"data\">$vp</td> 
                            
                                  </tr>";



                            }
                      }
                        }
                      }

                        
                    
                  //  $act =$model[$indice][$indice2][$indice3][$indice4][$indice5]['total'];
                  //  $vp =$model[$indice][$indice2][$indice3][$indice4][$indice5]['vp'];
                    
                    }
                  }

             
                }
              }
              
            }
          }
    }
  }
}

            

    
		
$html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap1Ind4c($periodo)
	{
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	

 $url = $baseUrl. "/index.php/api2/ap1Ind4c?periodo=$periodo&anioini=$config[anios_ini]&aniofin=$config[anios_fin]";
$data2 = file_get_contents($url);
$model= CJSON::decode($data2);

     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">PRODUCCIÓN</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <p>$titulos[titulo2]</p>
                <p>$titulos[titulo3]</p>
        </div>";   
  
                

              

   

									
			
		$html .="<table class=\"table table-bordered table-condensed table400\">
                <tr class=\"cell_label\"> 
               <td colspan=\"5\">Periodo</td> 
               <td>PIB</td> 
               <td>IGAE<sup>1</sup></td> 
               <td>ITTAEE D.F.<sup>2</sup></td> 
            </tr>";
            


if(is_array($model)){
  foreach ($model as $indice => $valor) {
  //echo ("El indice1 $indice tiene el valor: $valor<br>");
    if(is_array($valor)){
      foreach ($valor as $indice2 => $valor2) {
      //echo ("El indice2 $indice2 tiene el valor: $valor2<br>");
        if(is_array($valor2)){
          foreach ($valor2 as $indice3 => $valor3) {
          //echo ("El indice3 $indice3 tiene el valor: $valor3<br>");

          $html .="<tr class=\"rEven\">";
          $html .="<td colspan=\"4\" rowspan=\"4\">$indice3</td>";
        
        
            if(is_array($valor3)){
              foreach ($valor3 as $indice4 => $valor4) {
              //echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
                  if(is_array($valor4)){
                    $contador=0;
                    foreach ($valor4 as $indice5 => $valor5) {
                    //echo ("El indice5 $indice5 tiene el valor: $valor5<br>");

                    
                    switch ($indice5) {
                      case '1':
                       $html .="<td colspan=\"1\">I</td>";
                      break;
                    
                      case '2':
                       $html .="<tr class=\"rEven\"><td>II</td>";
                      break;
                    
                      case '3':
                        $html .="<tr class=\"rEven\"><td>III</td>";
                      break;
                    
                      case '4':
                        $html .="<tr class=\"rEven\"><td>IV</td>";

                      break;
                    }
                    
                    
                    



                        if(is_array($valor5)){
                          
                            foreach ($valor5 as $indice6 => $valor6) {

                              //echo ("El indice6 $indice6 tiene el valor: $valor6<br>");
                                switch ($indice5) {
                                      case '1':
                                        $html .="<td class=\"data\">$valor6</td>";
                                      break;
                                    
                                      case '2':
                                        $html .="<td class=\"data\">$valor6</td>";
                                      break;
                                    
                                      case '3':
                                        $html .="<td class=\"data\">$valor6</td>";
                                      break;
                                    
                                      case '4':
                                        $html .="<td class=\"data\">$valor6</td>";

                                      break;
                                    }
                                            
                          //echo " <td class=\"data\">$valor6</td>";
                            }
                        }
  
                    $contador++;
                    }
                  }
              }
            }
            $html .="</tr>";

          }
        }

      }
    }
  }
}


	
$html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap1Ind5a($periodo)
	{
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);

$rango_meses= range($config['mes_ini'], $config['mes_fin']);
//meses
$m = HistoricoPeriodos::model()->listaSimple($rango_meses);
$e = HistoricoPeriodos::model()->listaSimple($config['config']);

$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api2/ap1Ind5a?id=$periodo&anio=$config[anios_ini]&trim=$e";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);
$id2=10;

$trim=array();


foreach ($model as $indice => $valor) {
//echo ("El indice1 $indice tiene el valor: $valor<br>");
  if (is_array($valor)){ 
      foreach ($valor as $indice2 => $valor2) {
        //echo ("El indice2 $indice2 tiene el valor2: $valor2<br>");
          if (is_array($valor2)){ 
            foreach ($valor2 as $indice3 => $valor3) {
              //echo ("El indice3 $indice3 tiene el valor3: $valor3<br>");
              if (is_array($valor3)){ 
                foreach ($valor3 as $indice4 => $valor4) {
                  //echo ("El indice4 $indice4 tiene el valor4: $valor4<br>");
                    if (is_array($valor4)){ 
                      foreach ($valor4 as $indice5 => $valor5) {
                        //echo ("El indice5 $indice5 tiene el valor5: $valor5<br>");
                        //$promedio =$model[$indice][$indice2][$indice3][$indice4]['promedio'];

                        //$var .= "<td class=\"data\">$promedio</td>";
                      }
                    } 
                  
                  $trim[]=$indice4;
                  
                }
              }
            }
          }
          //echo "$indice4";
        }
    }
}

$trimestres = array_unique($trim);

     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">PRODUCCIÓN</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <p>$titulos[titulo2]</p>
                <p>$titulos[titulo3]</p>
        </div>";   
  
                

              

   

									
			
		$html .="<table class=\"table400 table-bordered table-condensed\">

                   <tr class=\"cell_label\"> 
                   
                     <td colspan=\"5\">Índice de actividad Industrial, $config[mes_fin]<br> promedio trimestral</td>
                     
                  </tr>
                <tr class=\"cell_label\"> 
               <td></td>";

      
      foreach ($trimestres as $indice => $valor) {
        $html .="<td>$config[anios_ini].$valor</td> ";
}



            
                
               
            $html .="</tr>";

$var ='';
foreach ($model as $indice => $valor) {
//echo ("El indice1 $indice tiene el valor: $valor<br>");
  if (is_array($valor)){ 
      foreach ($valor as $indice2 => $valor2) {
        //echo ("El indice2 $indice2 tiene el valor2: $valor2<br>");
        $html .="<tr class=\"rEven\">";
        $html .="<td >$indice2</td>";
          if (is_array($valor2)){ 
            foreach ($valor2 as $indice3 => $valor3) {
              //echo ("El indice3 $indice3 tiene el valor3: $valor3<br>");
              if (is_array($valor3)){ 
                foreach ($valor3 as $indice4 => $valor4) {
                  //echo ("El indice4 $indice4 tiene el valor4: $valor4<br>");
                    if (is_array($valor4)){ 
                      foreach ($valor4 as $indice5 => $valor5) {
                        //echo ("El indice5 $indice5 tiene el valor5: $valor5<br>");
                        $promedio =$model[$indice][$indice2][$indice3][$indice4]['promedio'];

                        //$var .= "<td class=\"data\">$promedio</td>";
                      }
                    } 
                  //$trim[]=$indice4;
                    $html .="<td class=\"data\">$promedio</td>";
                  
                }
              }
            }
          }


        
      

    
        $html .="</tr>";
        }
    }
}



	
$html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap1Ind5b($periodo)
	{
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//echo "-->".$modelo;
//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);

$rango_meses= range($config['mes_ini'], $config['mes_fin']);
//meses
$m = HistoricoPeriodos::model()->listaSimple($rango_meses);
$e = HistoricoPeriodos::model()->listaSimple($config['config']);

$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api2/ap1Ind5b?id=$periodo&anio=$config[anios_ini]&trim=$e";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">PRODUCCIÓN</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <p>$titulos[titulo2]</p>
                <p>$titulos[titulo3]</p>
        </div>";   
  
                

              

   

									
			
		$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">
              <tr class=\"cell_label\"> 
               <td colspan=\"5\">Índicide de actividad Industrial en el Distrito Fderal por subsector de actividad económica (Indice 2008=100) Distrito Federal</td>
                
               
            </tr>
            
                <tr class=\"cell_label\"> 
               <td>Promedio trimestral</td>
               <td>Minería</td> 
               <td>Generación, transmisión y distribución de energía eléctrica, suministro de agua y de gas por ductos al consumidor final</td>
               <td>Construcción</td> 
               <td>Industrias Manufactureras</td>   
               
            </tr>";
     
  


                    
  

foreach ($model as $indice => $valor) {
$html .="<tr class=\"rEven\">
<td>Trimestre $config[anios_ini].0$indice</td>
";
  if (is_array($valor)){ 
      foreach ($valor as $indice2 => $valor2) {
       // echo ("El indice2 $indice2 tiene el valor2: $valor2<br>");
         $html .="
             
              <td class=\"data\">$valor2</td>
              ";
            
          
        }
    }
     $html .="</tr>";
}


	
$html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap1Ind61($periodo,$anio,$trim)
	{
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//echo "-->".$modelo;
//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);

$rango_meses= range($config['mes_ini'], $config['mes_fin']);
//meses
$m = HistoricoPeriodos::model()->listaSimple($rango_meses);
$e = HistoricoPeriodos::model()->listaSimple($config['config']);

$url = $baseUrl. "/index.php/api/ap1Ind61?anio=$a&trim=$m&entidad=".$e.",0&grafico=0&periodo=".$periodo;
        //$url = $baseUrl;
        $data = file_get_contents($url);
        $model= CJSON::decode($data); 

     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">PRODUCCIÓN</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <p>$titulos[titulo2]</p>
                <p>$titulos[titulo3]</p>
        </div>";   
  
                

              

   

									
			
		$html .=" <table class=\"table600 table-bordered table-condensed defaultTable\">
              



                <tr class=\"rEven\">
                  <td>Entidad</td>";
              
                    if($config['mes_ini']==1 and $config['mes_fin']==3){$trimestre=1;}
                    if($config['mes_ini']==4 and $config['mes_fin']==6){$trimestre=2;}
                    if($config['mes_ini']==7 and $config['mes_fin']==9){$trimestre=3;}
                    if($config['mes_ini']==10 and $config['mes_fin']==12){$trimestre=4;}
                    
                                                
                                                
                    $html .="<td>$config[anios_ini].$trimestre</td>";
                    $html .="<td>%respecto al nacional</td>";
                    $html .="<td>% variacion respecto al mismo periodo del año anterior</td>";
                                                
                $html .="</tr>";

   
           

                             
//$anio=2014;
$anio_anterior=$anio-1;




    foreach($model['periodos'] as $entidad=>$anios){ 
        
        if($entidad==9){

    
        $html .="<tr class=\"rEven\">
                    <td>";
                       
                            $sql = "SELECT nombre from entidades where id=9"; 
                            $nombre = Yii::app()->db->createCommand($sql)->queryRow();
                            $html .="$nombre[nombre]";               
                       
                    $html .="</td>
                    <td class=\"data\">
                        " .number_format($model['periodos'][9][$anio]['suma'],0)."
                    </td>
                    <td class=\"data\">
                        ".number_format(($model['periodos'][9][$anio]['suma']/$model['periodos'][0][$anio]['suma'])*100,1)."%
                    </td>
                    <td class=\"data\">
                        ".number_format((($model['periodos'][9][$anio]['suma']/$model['periodos'][9][$anio_anterior]['suma'])-1)*100,1)."%
                    </td>
                </tr> ";  


   
      }

    }
    foreach($model['periodos'] as $entidad=>$anios){ 

        if($entidad > 0 and $entidad!=9){    
        
         
               $html .=" <tr class=\"rEven\">
                    <td>";
                        
                            $sql = "SELECT nombre from entidades where id=".$entidad; 
                            $nombre = Yii::app()->db->createCommand($sql)->queryRow();
                            $html .="$nombre[nombre]";               
                       
                    $html .="</td>
                    <td class=\"data\">
                        ".number_format($model['periodos'][$entidad][$anio]['suma'],0)."
                    </td>
                    <td class=\"data\">
                        ".number_format(($model['periodos'][$entidad][$anio]['suma']/$model['periodos'][0][$anio]['suma'])*100,1)."%
                    </td>
                    <td class=\"data\">
                        ".number_format((($model['periodos'][$entidad][$anio]['suma']/$model['periodos'][$entidad][$anio_anterior]['suma'])-1)*100,1)."%
                    </td>
                </tr> ";       

        }
    } 

    
    foreach($model['periodos'] as $entidad=>$anios){ 
        
        if($entidad==9){

       
        $html .="<tr class=\"rEven\">
                    <td>
                        Nacional
                    </td>
                    <td class=\"data\">". number_format($model['periodos'][0][$anio]['suma'],0)."
                    </td>
                    <td class=\"data\">
                        100%
                    </td>
                    <td class=\"data\">
                        ".number_format((($model['periodos'][0][$anio]['suma']/$model['periodos'][0][$anio_anterior]['suma'])-1)*100,1)."
                    </td>
                </tr>";   


       
      }

    }
        
	
$html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap1Ind62($periodo)
	{
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);

$url = $baseUrl. "/index.php/api/ap1Ind62?anio=$a&trim_inicio=".$config['mes_ini']."&trim_fin=".$config['mes_fin']."&grafico=0&periodo=".$periodo;
        //$url = $baseUrl;
        $data = file_get_contents($url);
        $model= CJSON::decode($data);

     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">PRODUCCIÓN</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <p>$titulos[titulo2]</p>
                <p>$titulos[titulo3]</p>
        </div>";   
  
                

              
if(date('Y')=='2016'){
	$a='';
	$trim=4;
}
   

									
			
		$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">
			      <tr class=\"rEven\">
                  <td>Trimestre $config[anios_fin]</td>
                  <td>Sector público</td>
                  <td>Sector privado</td>
                  <td>Otras construcciones</td>
                  <td>Petróleo y petroquímica</td>
                  <td>Transporte y urbanización</td>
                  <td>Electricidad y comunicaciones</td>
                  <td>Agua, riego y saneamiento</td>
                  <td>Edificación</td>
			      </tr>";

   
                                       $anio=$a;
                                        $html .="<tr class=\"rEven\">
                                            <td>Absoluto</td>";
                                          for($i=1;$i<=8;$i++){ 
                                            $html .="<td class=\"data\">".number_format($model['periodos'][$i][$anio]['suma'],0)."</td>";
                                         } 
                                        $html .="</tr>
                                        <tr class=\"rEven\">
                                            <td>
                                                % respecto al total del DF
                                            </td>";   
                                        for($i=1;$i<=8;$i++){ 
                                        $html .="<td class=\"data\">".number_format(($model['periodos'][$i][$anio]['suma']/$model['periodos'][9][$anio]['suma'])*100,1)."%</td>";
                                        
                                        } 

                                        $html .="</tr>";
		
			       
	
$html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}
public function tabla_ap1Ind71($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);
//entidades
$e = HistoricoPeriodos::model()->listaSimple($config['config']);


$url = $baseUrl. "/index.php/api/ap1Ind71?anio=$a&trim_inicio=".$config['mes_ini']."&trim_fin=".$config['mes_fin']."&entidad=0,$e&grafico=0&periodo=".$periodo;
        //$url = $baseUrl;
        $data = file_get_contents($url);
        $model= CJSON::decode($data);

     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">PRODUCCIÓN</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <p>$titulos[titulo2]</p>
                <p>$titulos[titulo3]</p>
        </div>";   
  
                

              


if($config['mes_ini']==1 and $config['mes_fin']==3){$trimestre=1;}
if($config['mes_ini']==4 and $config['mes_fin']==6){$trimestre=2;}
if($config['mes_ini']==7 and $config['mes_fin']==9){$trimestre=3;}
if($config['mes_ini']==10 and $config['mes_fin']==12){$trimestre=4;}
 

									
			
		$html .="<table class=\"table600 table-bordered table-condensed table400\">   

<tr class=\"rEven\">
      <td>Entidad</td>
      <td>$config[anios_fin].$trimestre</td>
      <td>%respecto al nacional</td>
      <td>% variacion respecto al mismo periodo del año anterior</td>
      
</tr>";          


foreach ($model as $indice => $valor) {

            foreach ($valor as $indice2 => $valor2) {
                    
              $datos[$indice2]= $valor2;

            }
                

}

//echo "<pre>";
//print_r($datos);
//echo "</pre>";


foreach ($datos as $entidad => $anios) {

  if($entidad==9){
  $sql1 = "SELECT nombre from entidades where id = $entidad"; 
  $nombre = Yii::app()->db->createCommand($sql1)->queryRow();
  
   $html .="<tr class=\"rEven\">
        <td>$nombre[nombre]</td>
        <td class=\"data\">".number_format($anios[$config['anios_fin']]['total'],0)."</td>
        <td class=\"data\">".number_format(($anios[$config['anios_fin']]['total']/$datos[0][$config['anios_fin']][total]*100),1)."%</td>
        <td class=\"data\">".number_format(((($anios[$config['anios_fin']]['total']/$datos[$entidad][$config['anios_ini']][total])-1)*100),1)."%</td>
    </tr>"; 

     } 
  }

foreach ($datos as $entidad => $anios) {

  if($entidad!=0 and $entidad!=9){
  $sql1 = "SELECT nombre from entidades where id = $entidad"; 
  $nombre = Yii::app()->db->createCommand($sql1)->queryRow();
 
  $html .="<tr class=\"rEven\">
        <td>$nombre[nombre]</td>
        <td class=\"data\">".number_format($anios[$config['anios_fin']]['total'],0)."</td>
        <td class=\"data\">".number_format(($anios[$config['anios_fin']]['total']/$datos[0][$config['anios_fin']][total]*100),1)."%</td>
        <td class=\"data\">".number_format(((($anios[$config['anios_fin']]['total']/$datos[$entidad][$config['anios_ini']][total])-1)*100),1)."%</td>
    </tr> ";

     } 
  }

foreach ($datos as $entidad => $anios) {

  if($entidad==0 ){

    $html .="<tr class=\"rEven\">
        <td>Nacional</td>
        <td class=\"data\">".number_format($anios[$config['anios_fin']]['total'],0)."</td>
        <td class=\"data\">".number_format(($anios[$config['anios_fin']]['total']/$datos[0][$config['anios_fin']][total]*100),1)."%</td>
        <td class=\"data\">".number_format(((($anios[$config['anios_fin']]['total']/$datos[$entidad][$config['anios_ini']][total])-1)*100),1)."%</td>
    </tr>"; 

     } 
  }


			       
	
$html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}


public function tabla_ap1Ind72($periodo)
	{
	
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


$url = $baseUrl. "/index.php/api/ap1Ind72?anio=$a&trim_inicio=".$config['mes_ini']."&trim_fin=".$config['mes_fin']."&grafico=0&periodo=".$periodo;
  //$url = $baseUrl;
        $data = file_get_contents($url);
        $model= CJSON::decode($data);

     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">PRODUCCIÓN</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <p>$titulos[titulo2]</p>
               
        </div>";   
  
                

              



									
			
		$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">";
                                    

   
		      
$anio=$config['anios_ini'];
$anio_anterior=$config['anios_ini'];
$trim_inicio=$config['mes_ini'];
$trim_fin=$config['mes_fin']+1;





$html .="<tr class=\"rEven\">
        <td rowspan=\"2\" >Subsector</td>
        <td colspan=\"2\" class=\"span_time\">
        Total de ";

        $mini=$this->meses($config['mes_ini']);
        $mfin=$this->meses($config['mes_fin']);
        //$mini." a ".$mfin." de ".$config['anios_fin']
        $html .="".$mini." a ".$mfin." de ".$config['anios_fin']."</td>";
$html .="</tr>
<tr class=\"rEven\">
                                                           
        <td>absolutos</td>
        <td>%</td>
          
</tr>";


 //$sql = "SELECT * from relaciones where indicador='ap1Ind72' ORDER BY orden ASC"; 
 //	$actividad = Yii::app()->db->createCommand($sql)->queryAll();
        //print_r($actividad);
        
        
foreach($model as $mod){
        
        //aca calculo el total del df con la sumatoria de la primera columna y los agrego a una variable
        for($t=$trim_inicio;$t<=$trim_fin;$t++){
               
                $total_df += $mod[1][$anio][$t]['valor'];
                $total_df_pasado += $mod[1][$anio_anterior][$t]['valor'];
                
        }
         
        $x=0; 
       
        //arranco el arreglo de las sumas
         $sumas=array(); 
      
        foreach($mod as $key=>$value){
            
            $x++;   

            //aqui le hago un push a cada sumatoria para luego poder ordenarla   
            for($i=$trim_inicio;$i<=$trim_fin;$i++){
                $s_actual[$x]+= $value[$anio][$i]['valor'];
            }
            array_push($sumas, $s_actual[$x]);
        }

          foreach($sumas as $key => $row){
            if($key>0){
            $sql = "SELECT titulo from relaciones where indicador='ap1Ind72' and columna=$key+1"; 
            $actividad = Yii::app()->db->createCommand($sql)->queryAll();
            //print_r($actividad);
             $html .="<tr class='rEven'><td >".$actividad[0]['titulo']."</td><td class='data'>".$this->round_up($row,1)."</td>";

            //operacion de totales
            $operacion1[$o] = ($row/$total_df)*100;

            $html .="<td class='data'>".round($operacion1[$o], 1)."%</td></tr>";

        }
        /*


        //aqui creo un arreglo ordenado en base a los valores
        $orden = array();
        foreach ($sumas as $key => $row)
            {
                $orden[$key] = $row;
            } 
        //aca ordeno el arreglo sumatorias y lo regreso acomodado   
       // array_multisort($orden, SORT_DESC, $sumas);
        //echo "<pre>";
        //print_r($sumas);
        //echo "</pre>";

        //aca despliego el arreglo para la tabla y le agrego el rubo o el estado    
        foreach($sumas as $key => $row){
            if($key>0){
            $html .="<tr class='rEven'><td >".$actividad[$key]['titulo']."</td><td class='data'>".$this->round_up($row,1)."</td>";

            //operacion de totales
            $operacion1[$o] = ($row/$total_df)*100;

            $html .="<td class='data'>".round($operacion1[$o], 1)."%</td><tr>";

        }

   */

   }

           
           
       $html .="<tr class='rEven'><td >Total industria manufacturera</td><td  class='data'>".$this->round_up($total_df,2)."</td><td class='data'>".round((($total_df/$total_df))*100 , 2)."</td></tr>";
           
}




$html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

function meses($mes){
  switch ($mes) {
    case 1:
      $m="Enero";
      break;
    case 2:
      $m="Febrero";
      break;
    case 3:
      $m="Marzo";
      break;
    case 4:
      $m="Abril";
      break;
    case 5:
      $m="Mayo";
      break;
    case 6:
      $m="Junio";
      break;
    case 7:
      $m="Julio";
      break;
    case 8:
      $m="Agosto";
      break;
    case 9:
      $m="Septiembre";
      break;
    case 10:
      $m="Octubre";
      break;
    case 11:
      $m="Noviembre";
      break;
    case 12:
      $m="Diciembre";
      break;
 
  }

  return $m;
}

//Esta es la funcion para redondear las cifras con criterios especificos
function round_up ($value, $places=0) {
  if ($places < 0) { $places = 0; }
  $mult = pow(10, $places);
  return number_format(ceil($value * $mult) / $mult);
}

public function tabla_ap1Ind81($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);

$url = $baseUrl. "/index.php/api/ap1Ind81?anios=$a&grafico=0&periodo=".$periodo;
        //$url = $baseUrl;
        $data = file_get_contents($url);
        $model= CJSON::decode($data);

     $html="<div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">PRODUCCIÓN</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h4>$titulos[titulo1]</h4>
                
               
        </div>";   
  		
		$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">
                <tr>
                        <td class=\"invisible\"></td>
                        <td colspan=\"19\" class=\"span_time\">Exportaciones de mercancías por entidad federativa</td>
                </tr>



                <tr class=\"rEven\">
                        <td>Entidad Federativa</td>


                        <td>Exportaciones en miles de dolares</td>
                        <td>% respecto al total nacional</td>


                </tr>";

   
//print_r($actividad);

//echo "<pre>";
//print_r($model);
//echo "</pre>";
foreach ($model as $indice => $valor) {
$gran_total=$valor['gran_total'];
    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    //echo ("El indice2 $indice2 tiene el valor: $valor2<br>");

                if (is_array($valor2)){ 
                    foreach ($valor2 as $indice3 => $valor3) {
                           //echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
                            $divisor=count($valor3);
                            $divisor=$divisor-2;
                            
                            $sql = "SELECT nombre from entidades where id= $indice3 "; 
                            $rubro = Yii::app()->db->createCommand($sql)->queryRow();
                            
                            $suma_promedios+=($valor3['total']/$divisor);
                            
                            if($indice3==9){ $clase_df='df'; }else{ $clase_df='no-df'; }
                            $html .="<tr class='rEven'><td class='".$clase_df."'>".  $rubro['nombre']."</td><td class='data'>".number_format(($valor3['total']/$divisor),0)."</td><td  class='data'>".round((($valor3['total']/$gran_total)*100),1)."</td></tr>";
                            

                    }

                }

            }

    }
                

}
                
$html .="<tr class='rEven'><td >Nacional</td><td  class='data'>".$this->round_up($suma_promedios,2)."</td><td class='data'>100%</td></tr>";


                             
//$anio=2014;
//$anio_anterior=$anio-1;


                             
                             

        
        
foreach($model as $mod){
        
        
         
        $x=0; 
       
        //arranco el arreglo de las sumas
        $sumas=array(); 
      
        foreach($mod as $value){
        
       
        
        
            $x++;   

            //aqui le hago un push a cada sumatoria para luego poder ordenarla   
            foreach($value as $val){
                $s_actual[$x]+= $val['valor'];
            }
            array_push($sumas, $s_actual[$x]);
        }
        
        
        //aqui creo un arreglo ordenado en base a los valores
        $orden = array();
        foreach ($sumas as $key => $row)
            {
                $orden[$key] = $row;
            } 
        //aca ordeno el arreglo sumatorias y lo regreso acomodado   
        array_multisort($orden, SORT_DESC, $sumas);
       

}





$html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap1Ind82($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


$url = $baseUrl. "/index.php/api/ap1Ind82?anios=$a&grafico=0&periodo=".$periodo;
        //$url = $baseUrl;
        $data = file_get_contents($url);
        $model= CJSON::decode($data);

     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">PRODUCCIÓN</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h4>$titulos[titulo2]</h4>
                
               
        </div>";   
  
                

              



									
			
		$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">
               



                <tr class=\"rEven\">
                        <td>Subsector de Actividad Económica</td>


                       <td>Miles de dolares</td>
                        <td>Porcentaje respecto al total en el D.F.</td>


                </tr>";

   
		
foreach ($model as $indice => $valor) {
$gran_total=$valor['gran_total'];
    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    //echo ("El indice2 $indice2 tiene el valor: $valor2<br>");

                if (is_array($valor2)){ 
                    foreach ($valor2 as $indice3 => $valor3) {
                        
                        $divisor=count($valor2[2]);
                        $divisor=$divisor-2;
                           // echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
                        
                        $suma_promedios+=($valor3['total']);
                        
                        
                        if($indice3>1){
                            $sql = "SELECT titulo from relaciones where indicador='ap1Ind82' and columna = $indice3 "; 
                            $rubro = Yii::app()->db->createCommand($sql)->queryRow();
                            $html .="<tr class='rEven'><td class=''>".  ($rubro['titulo'])."</td><td class='data'>".number_format(($valor3['total']/$divisor),0)."</td><td  class='data'>".round(((($valor3['total']/$divisor)/$gran_total)*100),1)."%</td></tr>";
                        }

                    }

                }

            }

    }
                

}
                
$html .="<tr class='rEven'><td ><b>Total<b></td><td  class='data'>".$this->round_up($gran_total,2)."</td><td class='data'>100%</td></tr>";


     

        
        
foreach($model as $mod){
        
        
         
        $x=0; 
       
        //arranco el arreglo de las sumas
        $sumas=array(); 
      
        foreach($mod as $value){
        
       
        
        
            $x++;   

            //aqui le hago un push a cada sumatoria para luego poder ordenarla   
            foreach($value as $val){
                $s_actual[$x]+= $val['valor'];
            }
            array_push($sumas, $s_actual[$x]);
        }
        
        
        //aqui creo un arreglo ordenado en base a los valores
        $orden = array();
        foreach ($sumas as $key => $row)
            {
                $orden[$key] = $row;
            } 
        //aca ordeno el arreglo sumatorias y lo regreso acomodado   
        array_multisort($orden, SORT_DESC, $sumas);
       

}






$html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap1Ind83($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


$url = $baseUrl. "/index.php/api/ap1Ind83?anios=$a&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">PRODUCCIÓN</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                
               
        </div>";   
  
                

              



									
			
		$html .="<table class=\"table600 table-bordered table-condensed table400\">";
                

   
foreach ($model as $indice => $valor) {
$gran_total=$valor['gran_total'];
    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                if (is_array($valor2)){ 
                    foreach ($valor2 as $indice3 => $valor3) {
                        
                       
                        
                            $sql = "SELECT titulo from relaciones where indicador='ap1Ind9' and columna = $indice3 "; 
                            $rubro = Yii::app()->db->createCommand($sql)->queryRow();
                            
                            
                            $rubros[$indice3]=utf8_encode($rubro['titulo']);
                            
                            $datos[1]= $valor3;
                            
                            
                            
                            
                            
                            

                    }

                }

            }

    }
                

}


//print_r($datos[1]);

                

    $html .="<tr>
        <td class=\"span_time\">Año</td>
        <td class=\"span_time\">Miles de dolares</td>
        <td class=\"span_time\">Tasa de variación anual %</td>
    </tr>"; 

        foreach($model['informe']['rubro'][1] as $key=>$dato){
            $anio_ant=$key-1;
            
            
          $html .="<tr  class='rEven'><td>".$key."</td><td class=\"data\">".number_format($dato['valor'],0)."</td><td class=\"data\">".$dato['datop']."</td></tr>";
        } 
      
    
    
    
    

$html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap1Ind9($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


$url = $baseUrl. "/index.php/api/ap1Ind9?anios=$a&grafico=0&periodo=".$periodo;
        //$url = $baseUrl;
        $data = file_get_contents($url);
        $model= CJSON::decode($data);

     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">PRODUCCIÓN</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                
               
        </div>";   
  
                

              



									
			
		$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">";
                




foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                if (is_array($valor2)){ 
                    foreach ($valor2 as $indice3 => $valor3) {
                        
                       
                        
                            $sql = "SELECT titulo from relaciones where indicador='ap1Ind9' and columna = $indice3 "; 
                            $rubro = Yii::app()->db->createCommand($sql)->queryRow();
                            
                            
                            $rubros[$indice3]=utf8_encode($rubro['titulo']);
                            
                            //$datos[$indice3]= $valor3;
                            
                            
                            
                            
                            
                            

                    }

                }

            }

    }
                

}

//$datos = $model['informe']['rubro'];


                
$an=count($model['informe']['rubro'][1]);

    $html .="<tr>
        <td class=\"invisible\"></td>
        <td class=\"invisible\"></td>
        <td colspan=\"$an\" class=\"span_time\">Distrito Federal</td>
        <td colspan=\"$an\" class=\"span_time\">Total de los estados (nacional)</td>
    </tr>
    <tr  class=\"rEven\">
    <td colspan=\"2\"></td>";
        
    foreach($model['informe']['rubro'][13] as $anio=>$dato){
            $html .="<td>".$anio."</td>";
        }
    foreach($model['informe']['rubro'][1] as $anio=>$dato){
            $html .="<td>".$anio."</td>";
        }
        
        
        
    $html .="</tr>
        <tr class=\"rEven\">
      <td  colspan=\"2\">$rubros[1]</td>";
    
      foreach($model['informe']['rubro'][13] as $dato){
          $html .="<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      foreach($model['informe']['rubro'][1] as $dato){
          $html .="<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      

    $html .="</tr>

    
    <tr  class=\"rEven\">
      <td  rowspan=\"3\">&nbsp;&nbsp;</td>
      <td >$rubros[2]</td>";
      
      foreach($model['informe']['rubro'][14] as $dato){
          $html .="<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      foreach($model['informe']['rubro'][2] as $dato){
          $html .="<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
     
    $html .="</tr>
    <tr class=\"rEven\">
      <td >$rubros[3]</td>";
      
      foreach($model['informe']['rubro'][15] as $dato){
          $html .="<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      foreach($model['informe']['rubro'][3] as $dato){
          $html .="<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
     
    $html .="</tr>
    <tr class=\"rEven\">
      <td >$rubros[4]</td>";
    
      foreach($model['informe']['rubro'][16] as $dato){
          $html .="<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      foreach($model['informe']['rubro'][4] as $dato){
          $html .="<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
     
    $html .="</tr>
    <tr class=\"rEven\">
      <td  colspan=\"2\">$rubros[5]</td>";
      
      foreach($model['informe']['rubro'][17] as $dato){
          $html .="<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      foreach($model['informe']['rubro'][5] as $dato){
          $html .="<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      
    $html .="</tr>
    <tr class=\"rEven\">
      <td  rowspan=\"3\">&nbsp;&nbsp;</td>
      <td >$rubros[6]</td>";
     
      foreach($model['informe']['rubro'][18] as $dato){
          $html .="<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      foreach($model['informe']['rubro'][6] as $dato){
          $html .="<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      
    $html .="</tr>
    <tr class=\"rEven\">
      <td >$rubros[7]</td>";
      
      foreach($model['informe']['rubro'][19] as $dato){
          $html .="<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      foreach($model['informe']['rubro'][7] as $dato){
          $html .="<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
     
    $html .="</tr>
    <tr class=\"rEven\">
      <td >$rubros[8]</td>";
      
      foreach($model['informe']['rubro'][20] as $dato){
          $html .="<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      foreach($model['informe']['rubro'][8] as $dato){
          $html .="<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
     
    $html .="</tr>
    <tr class=\"rEven\">
      <td colspan=\"2\">$rubros[9]</td>";
     
      foreach($model['informe']['rubro'][21] as $dato){
          $html .="<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      foreach($model['informe']['rubro'][9] as $dato){
          $html .="<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
    
    $html .="</tr>
    <tr class=\"rEven\">
      <td  rowspan=\"3\">&nbsp;&nbsp;</td>
      <td >$rubros[10]</td>";
       
      foreach($model['informe']['rubro'][22] as $dato){
          $html .="<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      foreach($model['informe']['rubro'][10] as $dato){
          $html .="<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      
    $html .="</tr>
    <tr class=\"rEven\">
      <td >$rubros[11]</td>";
    
      foreach($model['informe']['rubro'][23] as $dato){
          $html .="<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      foreach($model['informe']['rubro'][11] as $dato){
          $html .="<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      
    $html .="</tr>
    <tr class=\"rEven\">
      <td >$rubros[12]</td>";
   
      foreach($model['informe']['rubro'][24] as $dato){
          $html .="<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
      foreach($model['informe']['rubro'][12] as $dato){
          $html .="<td class=\"data\">".number_format($dato['valor'],0)."</td>";
      } 
    $html .="</tr>";
    
    

$html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}


public function tabla_ap1Ind10($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


$url = $baseUrl. "/index.php/api/ap1Ind10?anios=$a&trim_inicio=".$config['mes_ini']."&trim_fin=".$config['mes_fin']."&grafico=0&periodo=".$periodo;
        //$url = $baseUrl;
        $data = file_get_contents($url);
        $model= CJSON::decode($data);

     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">PRODUCCIÓN</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h4>$titulos[titulo2]</h4>
                <h5>$titulos[titulo3]</h5>
                
               
        </div>";   
  
                

              



									
			
		$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">";
                


$anio = 2015;
$anio_ant=$anio-1;
$trim_inicio=1;
$trim_fin=10;

 
foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                if (is_array($valor2)){ 
                    foreach ($valor2 as $indice3 => $valor3) {
                        $datos[$indice3]= $valor3;
                      
                    }

                }

            }

    }
                

}


$html .="<tr class=\"rEven\"> 
            <td>Mes</td>
            <td>Doméstico</td>
            <td>Variación porcentual anual</td>
            <td>Doméstico alto consumo</td>
            <td>Variación porcentual anual</td>
            <td>General hasta 25 kw de demanda</td>
            <td>Variación porcentual anual</td>
            <td>General para más de 25 kw de demanda</td>
            <td>Variación porcentual anual</td>
            <td>Media tensión</td>
            <td>Variación porcentual anual</td>
            <td>Total*</td>
            <td>Variación porcentual anual</td>
    </tr>
   
    <tr>";
      
        foreach($datos as $mes=>$val ){
            

            switch ($mes) {
              case 1:
                $mesd="Enero";
                break;
              case 2:
                $mesd="Febrero";
                break;
              case 3:
                $mesd="Marzo";
                break;
              case 4:
                $mesd="Abril";
                break;
              case 5:
                $mesd="Mayo";
                break;
              case 6:
                $mesd="Junio";
                break;
              case 7:
                $mesd="Julio";
                break;
              case 8:
                $mesd="Agosto";
                break;
              case 9:
                $mesd="Septiembre";
                break;
              case 10:
                $mesd="Octubre";
                break;
              case 11:
                $mesd="Noviembre";
                break;
              case 12:
                $mesd="Diciembre";
                break;

              
             
            }
            
            //****** $i es el mes que se va a consultar
            $html .="<tr class='rEven'><td>".$mesd."</td>";
            //****** al valor de cada columna se le suma 1
            foreach($val[$anio] as $rubro=>$valor){
                                
				$html .="<td class='data'>".number_format($datos[$mes][$anio][$rubro]['valor'],0)."</td><td class='data'>".round((($datos[$mes][$anio][$rubro]['valor']/$datos[$mes][$anio_ant][$rubro]["valor"])-1)*100, 1) ."%</td>";
            }
            $html .="</tr>";
        }
        
        
        
    
    
    $html .="</tr>";
    
    

$html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap2Ind1($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap2Ind1?anios=".$a."&trim_inicio=".$config['mes_ini']."&trim_fin=".$config['mes_fin']."&grafico=0&periodo=".$periodo;

        //$url = $baseUrl;
        $data = file_get_contents($url);
        $model= CJSON::decode($data);

     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">PRECIOS</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h4>$titulos[titulo2]</h4>
                <h5>$titulos[titulo3]</h5>
                
               
        </div>";   
  
                

              



									
			
		$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">";
                


$anio = $a;
$anio_ant=$anio-1;
$trim_inicio=1;
$trim_fin=6;

                             


//print_r($actividad);

//echo "<pre>";
//print_r($model);
//echo "</pre>";
foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                if (is_array($valor2)){ 
                    foreach ($valor2 as $indice3 => $valor3) {
                        $datos[$indice3]= $valor3;
                      
                    }

                }

            }

    }
                

}

 $html .="<tr class=\"rEven\"> 
            <td>$anio</td>
            <td>Área Metropolitana de la Ciudad de México</td>
            <td>Nacional</td>
           
    </tr>
   
    <tr>";
       
       foreach($datos[$anio]['mes'] as $mes=>$valor){
           
           if($mes!='promediodf' or $mes!='promnal') {
           //estos son los meses
               switch ($mes){
                    
                    case 1:
                       $mesd='Enero';
                       break;
                   case 2:
                       $mesd='Febrero';
                       break;
                   case 3:
                       $mesd='Marzo';
                       break;
                   case 4:
                       $mesd='Abril';
                       break;
                   case 5:
                       $mesd='Mayo';
                       break;
                   case 6:
                       $mesd='Junio';
                       break;
                   case 7:
                       $mesd='Julio';
                       break;
                   case 8:
                       $mesd='Agosto';
                       break;
                   case 9:
                       $mesd='Septiembre';
                       break;
                   case 10:
                       $mesd='Octubre';
                       break;
                   case 11:
                       $mesd='Noviembre';
                       break;
                   case 12:
                       $mesd='Diciembre';
                       break;
                } 
               
             $html .="<tr class='rEven'><td>".$mesd."</td>";
              $html .="<td class='data'>".round($valor['df'],2)."</td><td class='data'>".round($valor['nacional'],2)."</td>";
             $html .="</tr>";
           }
        }
            
//******estos son los promedios del periodo a consultar
             $html .="<tr class='rEven'><td>Promedio</td>";
             $html .="<td class='data'>".round($datos[$anio]['promedios']['promediodf'],2)."</td><td class='data'>".round($datos[$anio]['promedios']['promnal'],2)."</td>";
             $html .="</tr>";
        
  
    
    
    $html .="</tr>";
    
    

$html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}


public function tabla_ap2Ind2($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap2Ind2?anios=".$a."&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">PRECIOS</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                
               
        </div>";   
  
                

              



									
			
		$html .="<table class=\"table600 table-bordered table-condensed table400\">";
                



$anio=$config['anios_fin'];
                             

foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                if (is_array($valor2)){ 
                    foreach ($valor2 as $indice3 => $valor3) {
                        $datos[$indice3]= $valor3;
                      
                    }

                }

            }

    }
                

}


$html .="<tr class=\"rEven\"> 
            <td>Periodo</td>
            <td>Área Metropolitana de la Ciudad de México</td>
            <td>Nacional</td>
           
    </tr>
   
    <tr>";
         
        $primer_anio=$anio-6;
        for($i=1;$i<=6;$i++){
            $anio_ref=$primer_anio+$i;
            
            foreach($datos[$anio_ref]['mes'] as $mes=>$valor){

               if($mes!='promediodf' or $mes!='promnal') {
               //estos son los meses
               switch ($mes){
                   case 1:
                       $mesd='Ene';
                       break;
                   case 2:
                       $mesd='Feb';
                       break;
                   case 3:
                       $mesd='Mar';
                       break;
                   case 4:
                       $mesd='Abr';
                       break;
                   case 5:
                       $mesd='May';
                       break;
                   case 6:
                       $mesd='Jun';
                       break;
                   case 7:
                       $mesd='Jul';
                       break;
                   case 8:
                       $mesd='Ago';
                       break;
                   case 9:
                       $mesd='Sep';
                       break;
                   case 10:
                       $mesd='Oct';
                       break;
                   case 11:
                       $mesd='Nov';
                       break;
                   case 12:
                       $mesd='Dic';
                       break;
                       
               }   
                $html .="<tr class='rEven'><td>".$mesd." ".$anio_ref."</td>";
                $html .="<td class='data'>".round($valor['df'],2)."</td><td class='data'>".round($valor['nacional'],2)."</td>";
                $html .="</tr>";
               }
            }

        }
        
        
    $html .="</tr>";
    
    

$html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}


public function tabla_ap2Ind3($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap2Ind3?anios=".$a."&trim_inicio=".$config['mes_ini']."&trim_fin=".$config['mes_fin']."&grafico=0&periodo=".$periodo;
        //$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">PRECIOS</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                
               
        </div>";   
  
                

              



									
			
		$html .="<table class=\"table600 table-bordered table-condensed  table400\">";
                

$anio = 2015;
$anio_ant=$anio-1;
$trim_inicio=1;
$trim_fin=6;

                             


foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                if (is_array($valor2)){ 
                    foreach ($valor2 as $indice3 => $valor3) {
                        $datos[$indice3]= $valor3;
                      
                    }

                }

            }

    }
                

}


   $html .="<tr class=\"rEven\"> 
            <td>$anio</td>
            <td>Área Metropolitana de la Ciudad de México</td>
            <td>Nacional</td>
           
    </tr>
   
    <tr>";
       
        
       foreach($datos[$anio]['mes'] as $mes=>$valor){
           
           if($mes!='promediodf' or $mes!='promnal') {
           //estos son los meses
               
               switch ($mes){
                    
                    case 1:
                       $mesd='Enero';
                       break;
                   case 2:
                       $mesd='Febrero';
                       break;
                   case 3:
                       $mesd='Marzo';
                       break;
                   case 4:
                       $mesd='Abril';
                       break;
                   case 5:
                       $mesd='Mayo';
                       break;
                   case 6:
                       $mesd='Junio';
                       break;
                   case 7:
                       $mesd='Julio';
                       break;
                   case 8:
                       $mesd='Agosto';
                       break;
                   case 9:
                       $mesd='Septiembre';
                       break;
                   case 10:
                       $mesd='Octubre';
                       break;
                   case 11:
                       $mesd='Noviembre';
                       break;
                   case 12:
                       $mesd='Diciembre';
                       break;
                } 
               
            $html .="<tr class='rEven'><td>".$mesd."</td>";
            $html .="<td class='data'>".round($valor['df'],2)."</td><td class='data'>".round($valor['nacional'],2)."</td>";
            $html .="</tr>";
           }
        }
            
//******estos son los promedios del periodo a consultar
            $html .="<tr class='rEven'><td>Promedio</td>";
            $html .="<td class='data'>".round($datos[$anio]['promedios']['promediodf'],2)."</td><td class='data'>".round($datos[$anio]['promedios']['promnal'],2)."</td>";
            $html .="</tr>";
        
      
    $html .="</tr>";
    
    

$html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}


public function tabla_ap2Ind4($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap2Ind4?anios=".$a."&grafico=0&periodo=".$periodo;
        //$url = $baseUrl;
        $data = file_get_contents($url);
        $model= CJSON::decode($data);

     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">PRECIOS</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                
               
        </div>";   
  
                

              



									
			
		$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">";
                

$anio=2015;
                             

foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                if (is_array($valor2)){ 
                    foreach ($valor2 as $indice3 => $valor3) {
                        $datos[$indice3]= $valor3;
                      
                    }

                }

            }

    }
                

}


   $html .="<tr class=\"rEven\"> 
            <td>Periodo</td>
            <td>Área Metropolitana de la Ciudad de México</td>
            <td>Nacional</td>
           
    </tr>
   
    <tr>";
      
        $primer_anio=$anio-6;
        for($i=1;$i<=6;$i++){
            $anio_ref=$primer_anio+$i;
            
            foreach($datos[$anio_ref]['mes'] as $mes=>$valor){

               if($mes!='promediodf' or $mes!='promnal') {
               //estos son los meses
               switch ($mes){
                   case 1:
                       $mesd='Ene';
                       break;
                   case 2:
                       $mesd='Feb';
                       break;
                   case 3:
                       $mesd='Mar';
                       break;
                   case 4:
                       $mesd='Abr';
                       break;
                   case 5:
                       $mesd='May';
                       break;
                   case 6:
                       $mesd='Jun';
                       break;
                   case 7:
                       $mesd='Jul';
                       break;
                   case 8:
                       $mesd='Ago';
                       break;
                   case 9:
                       $mesd='Sep';
                       break;
                   case 10:
                       $mesd='Oct';
                       break;
                   case 11:
                       $mesd='Nov';
                       break;
                   case 12:
                       $mesd='Dic';
                       break;
                       
               }   
                $html .="<tr class='rEven'><td>".$mesd." ".$anio_ref."</td>";
                $html .="<td class='data'>".round($valor['df'],2)."</td><td class='data'>".round($valor['nacional'],2)."</td>";
                $html .="</tr>";
               }
            }

        }
       
    $html .="</tr>";
    
    

$html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}


public function tabla_ap2Ind3a($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap2Ind3a?anios=".$a."&trim_inicio=".$config['mes_ini']."&trim_fin=".$config['mes_fin']."&grafico=0&periodo=".$periodo;
        //$url = $baseUrl;
        $data = file_get_contents($url);
        $model= CJSON::decode($data);

     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">PRECIOS</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                
               
        </div>";   
  
                

              



									
			
		$html .="<table class=\"table600 table-bordered table-condensed  table400\">";
                

$anio = 2015;
$anio_ant=$anio-1;
$trim_inicio=1;
$trim_fin=6;

                             


foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                if (is_array($valor2)){ 
                    foreach ($valor2 as $indice3 => $valor3) {
                        $datos[$indice3]= $valor3;
                      
                    }

                }

            }

    }
                

}


$html .="<tr class=\"rEven\"> 
            <td>$anio</td>
            <td>Area metropolitana de la Cd. de México </td>
            <td>Nacional</td>
           
    </tr>
   
    <tr>";
      
       foreach($datos[$anio]['mes'] as $mes=>$valor){
           
           if($mes!='promediodf' or $mes!='promnal') {
           //estos son los meses
               
               switch ($mes){
                    
                    case 1:
                       $mesd='Enero';
                       break;
                   case 2:
                       $mesd='Febrero';
                       break;
                   case 3:
                       $mesd='Marzo';
                       break;
                   case 4:
                       $mesd='Abril';
                       break;
                   case 5:
                       $mesd='Mayo';
                       break;
                   case 6:
                       $mesd='Junio';
                       break;
                   case 7:
                       $mesd='Julio';
                       break;
                   case 8:
                       $mesd='Agosto';
                       break;
                   case 9:
                       $mesd='Septiembre';
                       break;
                   case 10:
                       $mesd='Octubre';
                       break;
                   case 11:
                       $mesd='Noviembre';
                       break;
                   case 12:
                       $mesd='Diciembre';
                       break;
                } 
               
            $html .="<tr class='rEven'><td>".$mesd."</td>";
            $html .="<td class='data'>".round($valor['df'],2)."</td><td class='data'>".round($valor['nacional'],2)."</td>";
            $html .="</tr>";
           }
        }
            
//******estos son los promedios del periodo a consultar
            $html .="<tr class='rEven'><td>Promedio</td>";
            $html .="<td class='data'>".round($datos[$anio]['promedios']['promediodf'],2)."</td><td class='data'>".round($datos[$anio]['promedios']['promnal'],2)."</td>";
            $html .="</tr>";
        
        
        
       
    $html .="</tr>";
    
    

$html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}


public function tabla_ap3Ind11($periodo,$trim)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//meses
$m = HistoricoPeriodos::model()->listaSimple($config['config']);
$trim=$config['config'][0];
$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap3Ind11?anios=".$config['anios_ini']."&trimestre=$trim&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">EMPLEO</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                
               
        </div>";   
  
                

$anio=$config['anios_ini'];
$anio_ref=$anio-1;
//aqui paso el arreglo para la primera serie de datos
foreach ($model['informe'] as $indice => $valor) {

    if (is_array($valor)){ 
        
        foreach ($valor as $indice2 => $valor2) {
            
                $datos[$indice2]= $valor2;
            
        }
                  

    }
                

}

$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">
    <tr class=\"rEven\">
        <td rowspan=\"3\">Delegación</td>";
        
       foreach($datos[2] as $trimestre=>$valor){ 
        $html .="<td colspan=\"3\">Trimestre $trimestre</td>";
        }

     $html .="</tr>";
    $html .="<tr class=\"rEven\">";
        
        
     foreach($datos[2] as $trimestre=>$valor){ 
         $html .="<td >PEA</td>
        <td colspan=\"2\">Población Ocupada</td>";
         }
     $html .="</tr>
    <tr class=\"rEven\">";
        
        
     foreach($datos[2] as $trimestre=>$valor){ 
         $html .="<td>Absoluto</td>
        <td>Absoluto</td>
        <td>% Respecto a la PEA delegacional</td>";
         } 
     $html .="</tr>";
    
    foreach($datos as $delegacion=>$valores){
    
     $html .="<tr class=\"rEven\"><td>";
        
        $sql = "SELECT nombre from delegaciones where id =".$delegacion; 
        $nombre = Yii::app()->db->createCommand($sql)->queryRow();
            
        if($delegacion==9000){
            $html .="Total Distrito Federal";
        }else{
            $html .="$nombre[nombre]";
        }
        $html .="</td>";
        
        foreach($valores as $trimestre=>$valor){ 
        $html .="<td class=\"data\">".number_format($valor['pea'],0)."</td>";
        $html .="<td class=\"data\">". number_format($valor['po'],0)."</td>";
        
        $html .="<td class=\"data\">". number_format(($valor['po']/$valor['pea'])*100,1)."%</td>";
         }
    $html .="</tr>";
     }
$html .="</table>
<p><br></p>";
   
/*$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">
    <tr class=\"rEven\">
        <td rowspan=\"3\">Delegacion</td>";
        
        foreach($datos[2] as $trimestre=>$valor){
        $html .="<td colspan=\"3\">Trimestre $trimestre</td>";
        }
    $html .="</tr>
    <tr class=\"rEven\">";
        
        
        foreach($datos[2] as $trimestre=>$valor){ 
        $html .="<td >PEA</td>
        <td colspan=\"2\">Poblacion Ocupada</td>";
        }
    $html .="</tr>
    <tr class=\"rEven\">";
        
        
        foreach($datos[2] as $trimestre=>$valor){ 
        $html .="<td>Absoluto</td>
        <td>Absoluto</td>
        <td>% Respecto a la PEA delegacional</td>";
        }
    $html .="</tr>";
    
    foreach($datos as $delegacion=>$valores){
    
    $html .="<tr class=\"rEven\">
        <td>";
        
        $sql = "SELECT nombre from delegaciones where id =".$delegacion; 
        $nombre = Yii::app()->db->createCommand($sql)->queryRow();
            
        if($delegacion==9000){
            $html .="Total Distrito Federal";
        }else{
            $html .="$nombre[nombre]";
        }
        $html .="</td>";
        
      foreach($valores as $trimestre=>$valor){
        $html .="<td class=\"data\">".number_format($valor['pea'],0)."</td>";
        $html .="<td class=\"data\">".number_format($valor['po'],0)."</td>";
        
        $html .="<td class=\"data\">".number_format(($valor['po']/$valor['pea'])*100,1)."%</td>";
        } 
  
    $html .="</tr>";
      }
     $html .="</table><br><br>";*/
    
$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">
    
    <tr class=\"rEven\">
        <td rowspan=\"2\"></td>
        <td colspan=\"2\">Población económica activa</td>
        <td colspan=\"2\">Población ocupada</td>
    </tr>
    <tr class=\"rEven\">
        
        <td>Trimestre $anio.$trim</td>
        <td>Var. % respecto al mismo periodo de $anio_ref</td>
        
        <td>Trimestre $anio.$trim</td>
        <td>Var. % respecto al mismo periodo de $anio_ref</td>
        
    </tr>";
   
    $trimestre = $trim;
    //checar si siempre son semestres********
    
    
    //*****nacionales
    //
    //pea año actual
    $pea_act_n=$model['informe2'][1][$anio][$trimestre]['pea'];
    //pea año anterior
    $pea_ant_n=$model['informe2'][1][$anio_ref][$trimestre]['pea'];
    
    //po año actual
    $po_act_n=$model['informe2'][1][$anio][$trimestre]['po'];
    //po año anterior
    $po_ant_n=$model['informe2'][1][$anio_ref][$trimestre]['po'];
    
    
    
    //*****df
    //
    //pea año actual
    $pea_act_df=$model['informe2'][2][$anio][$trimestre]['pea'];
    //pea año anterior
    $pea_ant_df=$model['informe2'][2][$anio_ref][$trimestre]['pea'];
    
    //po año actual
    $po_act_df=$model['informe2'][2][$anio][$trimestre]['po'];
    //pea año anterior
    $po_ant_df=$model['informe2'][2][$anio_ref][$trimestre]['po'];
    
   
    $html .="<tr class=\"rEven\">
        <td>Distrito Federal</td>
        <td class=\"data\">".number_format($pea_act_df,0)."</td>
        <td class=\"data\">".number_format((($pea_act_df/$pea_ant_df)-1)*100,2)."</td>
        <td class=\"data\">".number_format($po_act_df,0)."</td>
        <td class=\"data\">".number_format((($po_act_df/$po_ant_df)-1)*100,2)."</td>
    </tr>
    <tr class=\"rEven\">
        <td>Nacional</td>
        <td class=\"data\">".number_format($pea_act_n,0)."</td>
        <td class=\"data\">".number_format((($pea_act_n/$pea_ant_n)-1)*100,2)."</td>
        <td class=\"data\">".number_format($po_act_n,0)."</td>
        <td class=\"data\">".number_format((($po_act_n/$po_ant_n)-1)*100,2)."</td>
    </tr>";

$html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}


public function tabla_ap3Ind12($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//meses
$m = HistoricoPeriodos::model()->listaSimple($config['config']);

$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap3Ind12?anios=".$config['anios_ini']."&trimestre=$m&grafico=0&periodo=".$periodo;
        //$url = $baseUrl;
        $data = file_get_contents($url);
        $model= CJSON::decode($data);

     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">EMPLEO</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                
               
        </div>";   
  

$anio=$config['anios_ini'];
$anio_ref=$anio-1;
//aqui paso el arreglo para la primera serie de datos
foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
        
        foreach ($valor as $indice2 => $valor2) {
            
            foreach ($valor2 as $indice3 => $valor3) {
            
                $datos[$indice3]= $valor3;
            
            }
        
        }
                  

    }
                

}


 
$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">
    
    <tr class=\"rEven\">
        <td rowspan=\"2\">Delegación</td>";
        
        foreach($datos[2] as $trimestre=>$valor){
            $colspan=count($datos[2]);
           
        
            foreach($valor as $rubro=>$valores){ 
                
     switch ($rubro){
         case 1: 
             $rubro="Trabajadores remunerados y subordinados";
             break;
         case 2: 
             $rubro="Empleadores";
             break;
         case 3: 
             $rubro="Trabajadores por cuenta propia";
             break;
         case 4: 
             $rubro="Trabajadores no remunerados";
             break;
     }
                
                
                
    
    $html .="<td colspan=\"$colspan\">$rubro</td>";
           }    
        
     } 
    $html .="</tr>
    <tr class=\"rEven\">";
        
        
        foreach($datos[2] as $trimestre=>$valor){
        
          foreach($valor as $rubro=>$valores){
                $html .="<td>Trimestre<br>$anio.$trimestre</td>";
            }  
        
        }
    $html .="</tr>";
    
    
    foreach($datos as $delegacion=>$valores){
    
    $html .="<tr class=\"rEven\"><td>";

        $sql = "SELECT nombre from delegaciones where id =".$delegacion; 
        $nombre = Yii::app()->db->createCommand($sql)->queryRow();
            
        if($delegacion==9000){
            $html .="Total Distrito Federal";
        }else{
            $html .="$nombre[nombre]";
        }
       $html .="</td>";
        
        foreach($valores as $trimestre=>$valor){ 
        
            foreach($valor as $rubro=>$valores){ 
                $html .="<td class=\"data\">".number_format($valores['valor'],0)."</td>";
            }    
        
         } 
    $html .="</tr>";
  } 
    
    
    

$html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap3Ind2($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	



//meses
$m = HistoricoPeriodos::model()->listaSimple($config['config']);


$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap3Ind2?anios=".$config['anios_ini']."&trimestres=$m&grafico=0&periodo=".$periodo;
    //$url = $baseUrl;
    $data = file_get_contents($url);
    $model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">EMPLEO</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                
               
        </div>";   
  



//aqui paso el arreglo para la primera serie de datos
foreach ($model['informe'] as $indice => $valor) {

    if (is_array($valor)){ 
        
        foreach ($valor as $indice2 => $valor2) {
            
            
            
                $datos[$indice2]= $valor2;
            
            
        
        }
                  

    }
                

}



//aqui paso el arreglo para la primera serie de datos
foreach ($model['informe2'] as $indice => $valor) {

    if (is_array($valor)){ 
        
       
            
            
            
                $datos2[$indice]= $valor;
            
            
        
        
                  

    }
                

}




$anio=$config['anios_ini'];
$anio_ref=$anio-1;


  
$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">
    
    
    <tr class=\"rEven\">
        
        <td rowspan=\"2\">Delegacion</td>";
        foreach($datos[2] as $trimestre=>$valor){ 
              
       		foreach($valor as $rubro=>$valores){ 
                $html .="<td colspan=\"2\">Trimestre $anio.$trimestre</td>";
             }     
        
         } 
    $html .="</tr>
    <tr class=\"rEven\">";
        
        
       foreach($datos[2] as $trimestre=>$valor){ 
     			foreach($valor as $rubro=>$valores){
                $html .="<td>Total de desocupados</td>
                <td>Tasa de desempleo</td>";
             }     
        
         }
    $html .="</tr>";
    
    
   foreach($datos as $delegacion=>$valores){ 
    //esto es para hacer el promedio de promedios    
    $num_delegaciones = count($datos); 
    if($delegacion!=9000){
   
    
    $html .="<tr class=\"rEven\"><td>";
        
        $sql = "SELECT nombre from delegaciones where id =".$delegacion; 
        $nombre = Yii::app()->db->createCommand($sql)->queryRow();
            
        $html .="$nombre[nombre]";
           
       
        $html .="</td>";
        
         foreach($valores as $trimestre=>$valor){ 
        
             
            
            foreach($valor as $rubro=>$valores){ 
        
                $html .="<td class=\"data\">";
                
                
                $html .="".number_format($valores['valor'],0)."</td>
                <td class=\"data\">";
                
                
                $sql1 = "SELECT pea from ap3Ind11 where anio =".$anio." and trimestre = ".$trimestre. " and delegacion = ".$delegacion; 
                $pea = Yii::app()->db->createCommand($sql1)->queryRow();
                
                
                $html .="".number_format(($valores['valor']/$pea['pea'])*100,1)."%</td>";
            }    
        
         } 
    $html .="</tr>";
     } } 
    
    $html .="<tr class=\"rEven\">
        <td class=\"invisible\"></td>";
     foreach($datos[2] as $trimestre=>$valor){ 

       foreach($valor as $rubro=>$valores){ 
            $html .="<td class=\"invisible\"></td>
            <td class=\"invisible\"></td>";

         }   

     }  
    $html .="</tr>";
    
   
    $html .="<tr class=\"rEven\">
        <td>Total Distrito Federal</td>";
       foreach($datos[9000] as $trimestre=>$valor){ 

        foreach($valor as $rubro=>$valores){ 
            $html .="<td>".number_format($valores['valor'],0)."</td>
            <td>";
                
                
                $sql1 = "SELECT pea from ap3Ind11 where anio =".$anio." and trimestre = ".$trimestre. " and delegacion = 9000"; 
                $pea = Yii::app()->db->createCommand($sql1)->queryRow();
                
                
                $html .="".number_format(($valores['valor']/$pea['pea'])*100,2)."%</td>";

         }  

    }  
    $html .="</tr>";
    
   
    
    
    

$html .="</table>";

$html .="<p><br></p>
   
    <table class=\"table600 table-bordered table-condensed defaultTable\">
        
        <tr class=\"rEven\">
            <td rowspan=\"2\">Total de desempleo</td>
       
            <td colspan=\"\">$anio</td>
          
        </tr> 
        
        <tr class=\"rEven\">";
            
        foreach($anios[$anio] as $trimestre=>$valores){
        
                $html .="<td >Trimestre $trimestre</td>";
            
           
         } 
        $html .="</tr> ";    
   
    foreach($datos2 as $rubro => $anios){ 
    
        
        
        
        
        $html .="<tr class=\"rEven\"><td>";
            switch ($rubro){
                case 3:
                    $html .="Total Distrito Federal";
                    break;
                case 1:
                    $html .="Nacional";
                    break;
                case 2:
                    $html .="Nacional(Áreas más urbanizadas)";
                    break;
            }
            $html .="</td>";
        foreach($anios[$anio] as $valores){ 
        
            
            
        
                $html .="<td class=\"data\">".number_format(($valores['pdes']/$valores['pea'])*100,1)."%</td>";
            
           
           
         } 
        $html .="</tr>";
    
    
    
     } 
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}


public function tabla_ap3Ind31($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	



//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);
//meses
$e = HistoricoPeriodos::model()->listaSimple($config['config']);


$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap3Ind31?anios=$a&trim_inicio=".$config['mes_ini']."&trim_fin=".$config['mes_fin']."&entidades=$e,9000&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">EMPLEO</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                 <h3>$titulos[titulo3]</h3>
                
               
        </div>";   
  




//aqui paso el arreglo para la primera serie de datos
foreach ($model['informe'] as $indice => $valor) {

    if (is_array($valor)){ 
        
       
            
            
            
                $datos[$indice]= $valor;
            
            
        
        
                  

    }
                

}




$anio=$config['anios_fin'];
$anio_ref=$anio-1;

 
$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">
    <tr class=\"rEven\">
        <td>Entidad</td>
        <td>Trabajadores asegurados en el IMSS</td>
        <td>Variación anual respecto al mismo periodo del $anio_ref(%)</td>
        <td>% de registros respecto al nacional</td>
    </tr>";
    foreach($datos[$anio] as $entidad=>$valores){ 
    $html .="<tr class=\"rEven\">";
       
        if($entidad==9000){
            $html .="<td>Nacional</td>";
        }else{
            
            $sql = "SELECT nombre from entidades where id =".$entidad; 
            $nombre = Yii::app()->db->createCommand($sql)->queryRow();
             $html .="<td>".$nombre['nombre']."</td>";
        }
                  
        
        
        $html .="<td class=\"data\">".number_format($valores['promedio'],0)."</td>
        <td class=\"data\">".number_format((($valores['promedio']/$datos[$anio_ref][$entidad]['promedio'])-1)*100,2)."</td>
        <td class=\"data\">".number_format(($valores['promedio']/$datos[$anio][9000]['promedio'])*100,2)."</td>
        
       
    </tr>"; 
    
    
    
   } 
$html .="</table>
    <div class=\"table_explanation\">
       <p>$titulos[fuente]</p>
    </div>    
  

    <div class=\"col-md-12 text-center\">
      <h3>$titulos[titulo3]</h3>
     
    </div>


<table class=\"table600 table-bordered table-condensed defaultTable\">
    <tr class=\"rEven\">
        <td>Entidad</td>
        <td>Registro de nuevos empleos</td>
        <td>% de registros respecto al nacional</td>
        
    </tr>";
    foreach($datos[$anio] as $entidad=>$valores){ 
    $html .="<tr class=\"rEven\">";
        
       
        if($entidad==9000){
            $html .="<td>Nacional</td>";
        }else{
            
            $sql = "SELECT nombre from entidades where id =".$entidad; 
            $nombre = Yii::app()->db->createCommand($sql)->queryRow();
             $html .="<td>".$nombre['nombre']."</td>";
        }
       
        
        $html .="<td class=\"data\">".number_format($valores['resta'],0)."</td>
        <td class=\"data\">".number_format(($valores['resta']/$datos[$anio][9000]['resta'])*100,1)."</td>
        
    </tr> ";
    
    
    
   } 
    
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}



public function tabla_ap3Ind4($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	



//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap3Ind4?anios=".$a."&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">EMPLEO</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                 <h3>$titulos[titulo3]</h3>
                
               
        </div>";   
  



 $html .="<table class=\"table600 table-bordered table-condensed defaultTable\">";
                


$anio = $config['anios_fin'];
$anio_ant=$anio-1;
$trim_inicio=1;
$trim_fin=5;

                             

foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                
                        $datos[$indice2]= $valor2;
                      
                   

               

            }

    }
                

}




$anio=$config['anios_fin'];
$maximo = count($datos[$anio][1]);
 

 for($i=0;$i<=1;$i++){ 
        
    $anio_ref=$anio-$i;
    
    $html .="<tr class=\"rEven\"> 
        <td></td>";
       foreach($datos[$anio_ref][1] as $key => $value){ 
        if($key<=$maximo){        
          
        
        $html .="<td colspan=\"2\">Trimestre $key</td>";
        
         }} 
    $html .="</tr>
    <tr class=\"rEven\"> 
        <td>$anio_ref</td>";
        foreach($datos[$anio_ref][1] as $key => $value){ 
        if($key<=$maximo){        
       
        
        $html .="<td>Tasa de informalidad laboral (TIL2) </td>
        <td>Tasa de ocupación en el sector informal (TOSI2)</td>";
         }} 
    $html .="</tr>
    
    <tr class=\"rEven\">
        <td>Distrito Federal</td>";
        foreach($datos[$anio_ref][1] as $key => $value){ 
        if($key<=$maximo){      
       
        $html .="<td class=\"data\">".$datos[$anio_ref][1][$key]['df']."</td>
        <td class=\"data\">".$datos[$anio_ref][2][$key]['df']."</td>";
         }} 
    $html .="</tr>   
    
    <tr class=\"rEven\">
        <td>Nacional</td>";
        foreach($datos[$anio_ref][1] as $key => $value){ 
        if($key<=$maximo){    
         
        $html .="<td class=\"data\">".$datos[$anio_ref][1][$key]['nacional']."</td>
        <td class=\"data\">".$datos[$anio_ref][2][$key]['nacional']."</td>";
        }} 
    $html .="</tr>";  
     } 
        
   
    

                       
    
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}


public function tabla_ap3Ind5($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	



//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);

$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap3Ind5?anios=".$a."&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">EMPLEO</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                 <h3>$titulos[titulo3]</h3>
                
               
        </div>";   
  



 $html .="<table class=\"table600 table-bordered table-condensed defaultTable\">";
                


$anio = $config['anios_fin'];
$anio_ant=$anio-1;
$trim_inicio=1;
$trim_fin=5;

                             

foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                
                        $datos[$indice2]= $valor2;
                      
                   

               

            }

    }
                

}


//echo "<pre>";
//print_r($datos[2014]);
//echo "</pre>";

//$anio=2014;


         
    $html .="<tr class=\"rEven\">
        <td>Tasa de ocupación en condiciones críticas</td>";
        foreach($datos[$anio][1] as $k=>$d){ 
        $html .="<td>Trimestre $config[anios_ini].$k</td>";
         } 
    $html .="</tr>";        
    foreach($datos[$anio] as $rubro=>$dat){ 
    $html .="<tr class=\"rEven\">";
        
     foreach($datos[$anio][$rubro] as $key=>$valor){ 
            
     if($key==1){       
        switch ($rubro){
            case 1:
                $html .="<td>Distrito Federal</td>";
                break;
            case 2:
                $html .="<td>Nacional (total)</td>";
                break;
            case 3:
                $html .="<td>Nacional áreas más urbanizadas</td>";
                break;
        }
           
     }
           
            $html .="<td class=\"data\">".round($valor['valor'],2)."</td>";
        }
            
    $html .="</tr>";
  }
   
    


                       
    
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap4Ind11($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	



//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);

$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap4Ind11?anios=".$a."&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">SALARIOS E INGRESOS</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                 <h3>$titulos[titulo3]</h3>
                
               
        </div>";   
  



 $html .="<table class=\"table600 table-bordered table-condensed defaultTable\">";
 
foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                
                foreach ($valor2 as $indice3 => $valor3) {
              
                        $datos[$indice3]= $valor3;
                      
                }


            }

    }
                

}
                         


//es la sumatoria de todos los rubros para el periodo actual
$total=$datos['suma'];

//echo $total;

    

$html .="<tr class=\"rEven\">
        <td rowspan=\"2\">Delegación / Tamaño de empresa</td>";
    foreach($datos['delegacion'][2]['rubro'] as $rubro=>$valores){ 
    
        $html .="<td  colspan=\"2\">";
        
    switch ($rubro){
        case 1:
            $html .="Hasta un salario mínimo";
            break;
        case 2:
            $html .="Más de 1 hasta 2 salarios mínimos";
            break;
        case 3:
            $html .="Más de 2 hasta 3 salarios mínimos";
            break;
        case 4:
            $html .="Más de 3 hasta 5 salarios mínimos";
            break;
        case 5:
            $html .="Más de 5 salarios mínimos";
            break;
        case 6:
            $html .="No recibe ingresos y/o no se especifica";
            break;
    }
        
       $html .="</td>";
    
    } 
        $html .="<td rowspan=\"2\">Total</td>
    </tr>         
    <tr class=\"rEven\">";
        
    foreach($datos['delegacion'][2]['rubro'] as $rubro=>$valores){ 
    
        
        
        $html .="<td >Absoluto</td>
        <td >%</td>";
        
        
        
        
    
     } 
    $html .="</tr>"; 
    
   foreach($datos['delegacion'] as $delegacion=>$dato){ 
    $html .="<tr class=\"rEven\">";
        $html .="<td>"; 
        $sql = "SELECT nombre from delegaciones where id =".$delegacion; 
        $nombre = Yii::app()->db->createCommand($sql)->queryRow();
            
        if($delegacion==9000){
            $html .="Total";
        }else{
            $html .="$nombre[nombre]";
        }
        $html .="</td>";
        foreach($dato['rubro'] as $rubro=>$valores){ 
        
        $html .="<td class=\"data\">".number_format($valores['valor'],0)."</td>
        <td class=\"data\">".number_format((($valores['valor']/$datos['delegacion'][$delegacion]['total'])*100),2)."%</td>";
        
         } 
        $html .="<td class=\"data\">".number_format($datos['delegacion'][$delegacion]['total'],0)."</td>
    </tr>";
     }
    
    
   
    
    
    
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap4Ind2($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	



//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap4Ind2?anios=".$a."&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">SALARIOS E INGRESOS</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                 <h3>$titulos[titulo3]</h3>
                
               
        </div>";   
  



 $html .="<table class=\"table600 table-bordered table-condensed defaultTable\">";
                


$anio = $config['anios_fin'];
$anio_ant=$anio-1;
$trim_inicio=1;
$trim_fin=5;

                             

foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                
                        $datos[$indice2]= $valor2;
                      
                   

               

            }

    }
                

}



$anio=$config['anios_fin'];
$anio_ref=$anio-1;
$maximo = count($datos[$anio]);
 


    
 $html .="<tr class=\"rEven\"> 
        <td rowspan=\"2\"></td>";
       foreach($datos[$anio] as $key => $value){ 
        if($key<=$maximo){        
          
        
        $html .="<td colspan=\"2\">Trimestre ".$config['anios_fin'].".".$key."</td>";
        
         }} 
    $html .="</tr>
    <tr class=\"rEven\">";
        
        foreach($datos[$anio] as $key => $value){ 
        if($key<=$maximo){        
          
        
        $html .="<td>Millones de dolares </td>
        <td>Variacion % respecto al $key trimestre del $anio_ref</td>";
        }}
    $html .="</tr>
    
    <tr class=\"rEven\">
        <td>Distrito Federal</td>";
        foreach($datos[$anio] as $key => $value){ 
        if($key<=$maximo){      
        
        $html .="<td class=\"data\">".number_format($datos[$anio][$key]['df'],0)."</td>
        <td class=\"data\">".round((($datos[$anio][$key]['df']/$datos[$anio_ref][$key]['df'])-1)*100,1)."</td>";
         }} 
    $html .="</tr>   
    
    <tr class=\"rEven\">
        <td>Nacional</td>";
       foreach($datos[$anio] as $key => $value){ 
        if($key<=$maximo){    
         
        $html .="<td class=\"data\">".number_format($datos[$anio][$key]['nacional'],0)."</td>
        <td class=\"data\">".round((($datos[$anio][$key]['nacional']/$datos[$anio_ref][$key]['nacional'])-1)*100,1)."</td>";
        }} 
    $html .="</tr>";   
    
               
    
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap4Ind31($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	



//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);
$e = HistoricoPeriodos::model()->listaSimple($config['config']);


$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap4Ind31?anios=".$a."&trim_inicio=".$config['mes_ini']."&trim_fin=".$config['mes_fin']."&entidades=".$e.",40&grafico=0&periodo=".$periodo;

$data = file_get_contents($url);
$model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">SALARIOS E INGRESOS</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                 <h3>$titulos[titulo3]</h3>
                
               
        </div>";   
  



 $html .="<table class=\"table600 table-bordered table-condensed defaultTable\">";
                

$anio = $config['anios_fin'];
$anio_ant=$config['anios_ini'];
$trim_inicio=$config['mes_ini'];
$trim_fin=$config['mes_fin'];
$entidades="9,40";

                             

foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                if (is_array($valor2)){ 
                    foreach ($valor2 as $indice3 => $valor3) {
                        $datos[$indice3]= $valor3;
                      
                    }

                }

            }

    }
                

}

           

   $html .="<tr class=\"rEven\"> 
            <td>Periodo</td>";
            foreach($datos as $key=>$dat){ 
                //saco el nombre de la entidad
                $sql1 = "SELECT nombre from entidades where id=".$key; 
                $nombre = Yii::app()->db->createCommand($sql1)->queryRow();
            
            $html .="<td>";

             if($key!=40){$html .="$nombre[nombre]";}else{$html .="Total Nacional";} 
             $html .="</td>";
             } 
           
    $html .="</tr>";

    
        $ent=array(9,40);
        for($i=$trim_inicio;$i<=$trim_fin;$i++){ 
       
           
            $html .="<tr class=\"rEven\"> 
                    <td>";
                  
                switch ($i){
                    
                    case 1:
                       $mesd='Ene';
                       break;
                   case 2:
                       $mesd='Feb';
                       break;
                   case 3:
                       $mesd='Mar';
                       break;
                   case 4:
                       $mesd='Abr';
                       break;
                   case 5:
                       $mesd='May';
                       break;
                   case 6:
                       $mesd='Jun';
                       break;
                   case 7:
                       $mesd='Jul';
                       break;
                   case 8:
                       $mesd='Ago';
                       break;
                   case 9:
                       $mesd='Sep';
                       break;
                   case 10:
                       $mesd='Oct';
                       break;
                   case 11:
                       $mesd='Nov';
                       break;
                   case 12:
                       $mesd='Dic';
                       break;
                }  

                $html .="$mesd";
                $html .="</td>";
                
                foreach ($ent as $e){ 
                        
                $html .="<td class=\"data\">".round($datos[$e]['mes'][$i]['valor'],2)."</td>"; 
                    
                  } 
            $html .="</tr>";
          
            
         }
   
            $html .="<tr class=\"rEven\"> 
                    <td>Promedio</td>";
                    foreach ($ent as $e){
                    
                        $html .="<td class=\"data\">".round($datos[$e]['promedio']/$trim_fin, 2)."</td>";
                        
                    } 
            $html .="</tr>";
        
   
    
   
    
               
    
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}


public function tabla_ap4Ind32($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	



//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);
//meses
$e = HistoricoPeriodos::model()->listaSimple($config['config']);


$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl."/index.php/api/ap4Ind32?entidades=".$e.",40&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">SALARIOS E INGRESOS</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                 <h3>$titulos[titulo3]</h3>
                
               
        </div>";   
  



 $html .="<table class=\"table600 table-bordered table-condensed defaultTable\">";
                


$anio_ant=$anio-1;



foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                
                        $datos[$indice2]= $valor2;
                      
                   

                

            }

    }
                

}
$anio=  date("Y");
//echo "<pre>";           
//print_r($datos);
//echo "</pre>"; 

   $html .="<tr class=\"rEven\"> 
            <td>Periodo</td>
            <td>Distrito Federal</td>
            <td>Total Nacional</td>
           
    </tr>";

    
                
      
       
        foreach($datos as $anio=>$valores){ 
            
      
    
            
           foreach($valores['valores'] as $mes=>$valor){ 
            $html .="<tr class=\"rOdd\"> 
                    <td>";
                
                switch ($mes){
                    
                    case 1:
                       $mesd='Ene';
                       break;
                   case 2:
                       $mesd='Feb';
                       break;
                   case 3:
                       $mesd='Mar';
                       break;
                   case 4:
                       $mesd='Abr';
                       break;
                   case 5:
                       $mesd='May';
                       break;
                   case 6:
                       $mesd='Jun';
                       break;
                   case 7:
                       $mesd='Jul';
                       break;
                   case 8:
                       $mesd='Ago';
                       break;
                   case 9:
                       $mesd='Sep';
                       break;
                   case 10:
                       $mesd='Oct';
                       break;
                   case 11:
                       $mesd='Nov';
                       break;
                   case 12:
                       $mesd='Dic';
                       break;
                }  
                $html .="$mesd</td>
                    
                    
                
                
                <td class=\"data\">".number_format($valor[9]['valor'],2)."</td> 
                <td class=\"data\">".number_format($valor[40]['valor'],2)."</td> 
                    
                    
            </tr>";
           
            
           
           
            
            
             } 
            
            $html .="<tr class=\"rEven\">
                
                <td>$anio</td>
                <td>".number_format($valores['promediodf'],1)."</td>
                <td>".number_format($valores['promedional'],1)."</td>
            
            </tr>";
           
        } 
            
        
   
            
            
        
   
    

                               
    
               
    
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}


public function tabla_ap4Ind4($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	



//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap4Ind4?anios=$a&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">SALARIOS E INGRESO</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                 <h3>$titulos[titulo3]</h3>
                
               
        </div>";   
  



 $html .=" <table class=\"table600 table-bordered table-condensed defaultTable\">";
                


$anio = 2014;
$anio_ant=$anio-1;
$trim_inicio=1;
$trim_fin=5;

                             

foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                
                        $datos[$indice2]= $valor2;
                      
                   

               

            }

    }
                

}


   $html .="<tr class=\"rEven\">
       <td rowspan=\"2\"> Entidad Federativa</td>";

        foreach($datos[3] as $an=>$dat){
        $cols1=count($datos[3][$an]['mes']);
       
    
        $html .="<td colspan=\"$cols1\">$an</td>";
    } 
   $html .="<tr>";
    
    $x=0;
    foreach($datos as $col => $v){  
    $x++;    
   
    $html .="<tr class=\"rEven\">";
        
        $i=0;
        foreach($datos[$col] as $key => $value){ 
        $i++;     
         
    
        
             if($col==3 and $i==1){
                $html .="<td></td>";
            }
            
            foreach ($value as $r=>$valor){ 
        
        
        
                foreach($valor as $ind=>$val){
                    
                    //***********verificar si se van a comsultar todos los estados
                    if($x==1){
                    
                        switch ($ind){
                            case 1:
                                $trimestre_romano="I";
                                break;
                            case 2:
                                $trimestre_romano="II";
                                break;
                            case 3:
                                $trimestre_romano="III";
                                break;
                            case 0:
                                $trimestre_romano="IV";
                                break;
                                
                        }
                    
                   
                    $html .="<td >$trimestre_romano</td>";
                 } } 
             } 
       
        
         } 
      $html .="</tr>";
      
    
     } 

      $html .="<tr class=\"rEven\">";
      

          $sql1 = "SELECT nombre from entidades where id=9"; 
          $nombre = Yii::app()->db->createCommand($sql1)->queryRow();
        
          $html .="<td>".$nombre['nombre']."</td>";
       
        foreach($datos[9] as $anios => $meses){ 

          foreach($meses as $anio=>$meses){ 

             foreach($meses as $mes=>$valor){ 

              $html .="<td class=\"data\">$valor[valor]</td>";

             } 

           } 

         } 
      $html .="</tr>";      
     foreach($datos as $col => $v){  
      //valido si no es df
      if($col!=9){
     
      $html .="<tr class=\"rEven\">";
          
          $i=0;
          foreach($datos[$col] as $key => $value){ 
          $i++;     
          
          
           if($i==1){
                  $sql1 = "SELECT nombre from entidades where id=".$col; 
                  $nombre = Yii::app()->db->createCommand($sql1)->queryRow();
                  
                  if($col<35){
                  $html .="<td>".$nombre['nombre']."</td>";
                  }else{
                      if($col==40){ $html .="<td>Nacional</td>"; }
                      if($col==41){ $html .="<td>Urbano</td>"; }
                      if($col==42){ $html .="<td>Rural</td>"; }
                      
                  }
              }
               foreach ($value as $valor){ 
             
              
            
             
                  
                  
                  foreach($valor as $ind=>$val){ 
                  
                      
                      
                     
                      $html .="<td class=\"data\">".round($val['valor'],4)."</td>";
                  } 
              
              
            
              
             } 
         
          
           } 
        $html .="</tr>";
       } 
     } 
        
  
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}


public function tabla_ap9Ind2($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	



//años 
        $rango= range($config['anios_ini'], $config['anios_fin']);
        $a = HistoricoPeriodos::model()->listaSimple($rango);
        //meses
        $m = HistoricoPeriodos::model()->listaSimple($config['config']);

		$anio=2014;
		$baseUrl = Yii::app()->params['baserecm'];
		$url = $baseUrl. "/index.php/api/ap9Ind2?anios=$a&meses=$m,13&grafico=0&periodo=".$periodo;
		//$url = $baseUrl;
		$data = file_get_contents($url);
		$model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">TURISMO</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                 <h3>$titulos[titulo3]</h3>
                
               
        </div>";   
  



						
							//print_r($actividad);
							foreach ($model as $indice => $valor) {
							if (is_array($valor)){
							  foreach ($valor as $indice2 => $valor2) {
							    $datos[$indice2]= $valor2;
							  }
							}
							}
							//echo "<pre>";
							//print_r($datos[1]);
							//echo "</pre>";
						
						$html .="<table class=\"table table-bordered table-condensed defaultTable table400\">
						<tr class=\"rEven\">
						<td rowspan=\"2\">Mes</td>";
						  foreach($datos[1]['anio'] as $anio=>$dat){  
						      $html .="<td colspan=\"2\">$anio</td>";
						   }   
						$html .="</tr>
						<tr class=\"rEven\">";
						foreach($datos[1]['anio'] as $anio=>$dat){ 
						    $html .="<td>Nacionales</td>
						    <td>Internacionales</td>";

					 }
						$html .="</tr>";
						 foreach($datos as $mes=>$dato){ 
						$html .="<tr class=\"rEven\"> ";
						   if($mes!=13){ 
						    $html .="<td>";
						 
						        switch ($mes){
						            case 1:
						               $mesd='Enero';
						               break;
						           case 2:
						               $mesd='Febrero';
						               break;
						           case 3:
						               $mesd='Marzo';
						               break;
						           case 4:
						               $mesd='Abril';
						               break;
						           case 5:
						               $mesd='Mayo';
						               break;
						           case 6:
						               $mesd='Junio';
						               break;
						           case 7:
						               $mesd='Julio';
						               break;
						           case 8:
						               $mesd='Agosto';
						               break;
						           case 9:
						               $mesd='Septiembre';
						               break;
						           case 10:
						               $mesd='Octubre';
						               break;
						           case 11:
						               $mesd='Noviembre';
						               break;
						           case 12:
						               $mesd='Diciembre';
						               break;
						           case 13:
						               $mesd='Total';
						               break;
						        } 
						        $html .="$mesd";
						       
						      $html .="</td>";
						  
						      foreach($dato['anio'] as $anio=>$dat){
						        $sumadf[$anio]+=$dat['rubro'][1]['valor'];
						        $sumanal[$anio]+=$dat['rubro'][2]['valor'];
						
						        $html .="<td class=\"data\">".number_format($dat['rubro'][1]['valor'],0)."</td>
						        <td class=\"data\">".number_format($dat['rubro'][2]['valor'],0)."</td>";
						     } 
						  $html .="</tr>";
						   } 
						  }
						  $html .="<tr class=\"rEven\">
						    <td rowspan=\"2\">Total</td>";
						       foreach($datos[1]['anio'] as $anio=>$dat){ 
						          
						          $html .="<td>".number_format($sumadf[$anio],0)."</td>
						          <td>".number_format($sumanal[$anio],0)."</td>";
						       }
						  $html .="</tr>
						  <tr class=\"rEven\">";
						     foreach($datos[1]['anio'] as $anio=>$dat) { 
						        $html .="<td colspan=\"2\">".number_format($sumadf[$anio]+$sumanal[$anio],0)."</td>";
						     } 
						  $html .="</tr>";
        
  
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap9Ind1($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	



   //años 
            $rango= range($config['anios_ini'], $config['anios_fin']);
            $a = HistoricoPeriodos::model()->listaSimple($rango);
            //meses
        
            $anio=2014;
            $baseUrl = Yii::app()->params['baserecm'];
            $url = $baseUrl. "/index.php/api/ap9Ind1?anios=$a&grafico=0&periodo=".$periodo;
            //$url = $baseUrl;
            $data = file_get_contents($url);
            $model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">TURISMO</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h4>$titulos[titulo2]</h4>
                 <h4>$titulos[titulo3]</h4>
                
               
        </div>";   
  

  $anio = $config['anios_fin'];
			    $anio_ant=$anio-1;
			    $trim_inicio=1;
			    $trim_fin=5;

			 

			    //print_r($actividad);

			    foreach ($model as $indice => $valor) {
			      if (is_array($valor)){ 
			        foreach ($valor as $indice2 => $valor2) {
			          $datos[$indice2]= $valor2;
			        }
			      }
			    }
						
						$html .="<table class=\"table600 table-bordered table-condensed defaultTable table400\">
				          <tr class=\"rEven\"> 
				              <td></td>";
				              $rows= count($datos);
				              $html .="<td colspan=\"$rows\">Años</td>
				          </tr>
				          <tr class=\"rEven\">
				              <td></td>";
				         foreach($datos as $anio=>$valor){
				          
				          $html .="<td>$anio</td>";
				              
				          
				          } 
				          $html .="</tr>
				          <tr class=\"rEven\">
				              <td>Habitaciones</td>";
				         foreach($datos as $anio=>$valor){
				          
				              $html .="<td class=\"data\">".number_format($valor['habitaciones'],2)."</td>";
				              
				          
				         } 
				          $html .="</tr>
				          <tr class=\"rEven\">
				              <td>Porcentaje de ocupación</td>";
				          foreach($datos as $anio=>$valor){ 
				          
				             $html .="<td class=\"data\">".number_format($valor['ocupacion'],2)."</td>";
				              
				          
				           }
				          $html .="</tr>";
  
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap8Ind3($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	



  //aÃ±os 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


$url = $baseUrl. "/index.php/api/ap8Ind3?anios=$a&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">COMERCIO</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                 <h3>$titulos[titulo3]</h3>
                
               
        </div>";   
  


   
$anio = $config['anios_fin'];
$anio_ant=$anio-1;
$trim_inicio=1;
$trim_fin=5;



//print_r($actividad);

foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                
            }
                foreach ($valor2 as $indice3 => $valor3) {
                    
                        $datos[$indice3]= $valor3;
                     

            }

    }
                

}


$anio_tiendas=2012;
$anio=2014;
						
$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">
        <tr class=\"rEven\"> 
                <td>Año</td>
                <td>Mes</td>
                <td>Nacional</td>
                <td>Área Metropolitana de la Ciudad de México</td>
                
            </tr>";
           
            $i=0;

            foreach($datos as $mes=>$valor){
            $i++;
          
            $html .="<tr class=\"rEven\">";
                $rowspan=count($datos); 
                if($i==1){
               
                $html .="<td rowspan=\"$rowspan\">";
                  
                $html .="$anio</td>"; 
                 } 

                $html .="<td>";
                 switch ($mes){
                    
                    case 1:
                       $mesd='Enero';
                       break;
                   case 2:
                       $mesd='Febrero';
                       break;
                   case 3:
                       $mesd='Marzo';
                       break;
                   case 4:
                       $mesd='Abril';
                       break;
                   case 5:
                       $mesd='Mayo';
                       break;
                   case 6:
                       $mesd='Junio';
                       break;
                   case 7:
                       $mesd='Julio';
                       break;
                   case 8:
                       $mesd='Agosto';
                       break;
                   case 9:
                       $mesd='Septiembre';
                       break;
                   case 10:
                       $mesd='Octubre';
                       break;
                   case 11:
                       $mesd='Noviembre';
                       break;
                   case 12:
                       $mesd='Diciembre';
                       break;
                } 
                $html .="$mesd</td>
                <td class=\"data\">".number_format($valor['nacional'],1)."</td>
                <td class=\"data\">".number_format($valor['df'],1)."</td>
                
            </tr>";
             } 
            
  
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap8Ind21($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	




$url = $baseUrl. "/index.php/api/ap8Ind21?anios=".$config['anios_ini']."&anio_tiendas=".$config['anios_fin']."&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">COMERCIO</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
               
        </div>";   
  


   

$anio = $config['anios_fin'];
$anio_ant=$anio-1;
$trim_inicio=1;
$trim_fin=5;

                             

//print_r($actividad);

foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                
                        $datos[$indice2]= $valor2;
                      
                   

               

            }

    }
                

}




 
//echo "<pre>";
//print_r($model['u_comercio'][2014]);
//echo "</pre>";
$anio_tiendas=2012;
$anio=$config['anios_fin'];
						
/*$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">
            <tr class=\"rEven\"> 
                <td>Total</td>
                <td class=\"data\">".number_format($model['tiendas'][$anio_tiendas][1]['valor'],0)."</td>
            </tr>
            <tr class=\"rEven\"> 
                <td>Tiendas que se aperturaron en el <?php echo $anio_tiendas; ?></td>
                <td class=\"data\" >".number_format($model['tiendas'][$anio_tiendas][2]['valor'],0)."</td>
            </tr>
    </table>
    <p><br></p>
    <p class=\"table_title default text-center\">
      <h5 class=\"text-center\">Unidades de comercio y de abasto en operación <br>al 31 de diciembre de 2013 en el Distrito federal</h5 >
    </p>
    <p><br></p>*/
    $html .="<table class=\"table600 table-bordered table-condensed defaultTable\">
            <tr class=\"rEven\"> 

                <td>Canal de distribución</td>
                <td>No. de unidades</td>
                <td>Personal que operan</td>

            </tr>";




            foreach($model['u_comercio'][$anio] as $rubro=>$dato){ 
            $html .="<tr class=\"rEven\"><td>"; 
                switch ($rubro){
                    case 1:
                        $rubro="Tianguis";
                        break;
                    case 2:
                        $rubro="Mercados públicos<sup>1</sup>";
                        break;
                    case 3:
                        $rubro="Mercados sobre ruedas<sup>1</sup>";
                        break;
                    case 4:
                        $rubro="Concentraciones<sup>2</sup>";
                        break;
                }
                $html .="$rubro</td>


                <td class=\"data\">".number_format($dato['unidades'],0)."</td>
                <td class=\"data\">".number_format($dato['personal'],0)."</td>

            </tr>";
             } 
    
            
  
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[nota2]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap8Ind12($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	




//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);

$url = $baseUrl. "/index.php/api/ap8Ind12?anios=$a&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">COMERCIO</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                <h3>$titulos[titulo3]</h3>
                
               
        </div>";   
  


						
$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">";
                



$anio = $config['anios_fin'];
$anio_ant=$anio-1;
$trim_inicio=1;
$trim_fin=5;

                             


foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                
                        $datos[$indice2]= $valor2;
                      
                   

               

            }

    }
                

}



$html .="<tr class=\"rEven\"> 
        
        <td colspan=\"2\" rowspan=\"2\">Periodo</td>
        <td colspan=\"2\">Indice General</td>
        <td colspan=\"2\">Distrito federal</td>
      
    </tr>
    
    <tr class=\"rEven\"> 
        
        
        <td>Comercio al por mayor</td>
        <td>Comercio al por menor</td>
        <td>Comercio al por mayor</td>
        <td>Comercio al por menor</td>
      
    </tr>";
    
    

    foreach($datos as $anio=>$dat){
    
    foreach($dat as $mes=>$dato){ 
    $html .="<tr class=\"rEven\">"; 
      
        $columna = count($datos[$anio]);
        
        if($mes==1){
        
        $html .="<td rowspan=\"$columna\">$anio</td>";
         } 
        $html .="<td>";
        switch ($mes){
                    
                    case 1:
                       $mesd='Ene';
                       break;
                   case 2:
                       $mesd='Feb';
                       break;
                   case 3:
                       $mesd='Mar';
                       break;
                   case 4:
                       $mesd='Abr';
                       break;
                   case 5:
                       $mesd='May';
                       break;
                   case 6:
                       $mesd='Jun';
                       break;
                   case 7:
                       $mesd='Jul';
                       break;
                   case 8:
                       $mesd='Ago';
                       break;
                   case 9:
                       $mesd='Sep';
                       break;
                   case 10:
                       $mesd='Oct';
                       break;
                   case 11:
                       $mesd='Nov';
                       break;
                   case 12:
                       $mesd='Dic';
                       break;
                }  
                $html .="$mesd</td>
        <td class=\"data\">".number_format($dato['compras_n_ma'],2)."</td>
        <td class=\"data\">".number_format($dato['compras_n_me'],2)."</td>
        <td class=\"data\">".number_format($dato['compras_df_ma'],2)."</td>
        <td class=\"data\">".number_format($dato['compras_df_me'],2)."</td>
    </tr>";
    
        }
    }
    
   
            
  
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap8Ind11($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	




//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);
//meses
$m = HistoricoPeriodos::model()->listaSimple($config['config']);


$url = $baseUrl. "/index.php/api/ap8Ind11?anios=$a&meses=$m&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">COMERCIO</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                <h3>$titulos[titulo3]</h3>
                
               
        </div>";   
  


						
$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">";
                


$anio = $config['anios_fin'];
$anio_ant=$anio-1;
$trim_inicio=1;
$trim_fin=5;

                             


foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                
                        $datos[$indice2]= $valor2;
                      
                   

               

            }

    }
                

}

 
    $anio=$config['anios_fin'];
    $anio_ref=$anio-1; 
    $html .="<tr class=\"rEven\"> 
        
        <td></td>
        <td colspan=\"10\">Comercio al por mayor</td>
        
        
    </tr>
    <tr class=\"rEven\"> 
        
        <td></td>
        <td colspan=\"2\">Personal ocupado</td>
        <td colspan=\"2\">Remuneraciones totales</td>
        <td colspan=\"2\">Remuneraciones por persona</td>
        <td colspan=\"2\">Ingreso por suministro de bienes y servicios</td>
        <td colspan=\"2\">Comercio total</td>
        
    </tr>
    <tr class=\"rEven\"> 
        
        <td></td>
        <td>Indice</td>
        <td>Variación % anual</td>
        <td>Indice</td>
        <td>Variación % anual</td>
        <td>Indice</td>
        <td>Variación % anual</td>
        <td>Indice</td>
        <td>Variación % anual</td>
        <td>Indice</td>
        <td>Variación % anual</td>
        
    </tr>
    
    
    <tr class=\"rEven\"> 
        <td>DF</td>
        <td class=\"data\">".number_format($datos['pormayor'][$anio]['p_ocupadas_df_ma']['total']/3,1)."</td>
        <td class=\"data\">".round((($datos['pormayor'][$anio]['p_ocupadas_df_ma']['total']/$datos['pormayor'][$anio_ref]['p_ocupadas_df_ma']['total'])-1)*100,1)."</td>
        
        <td class=\"data\">".number_format($datos['pormayor'][$anio]['remuneraciones_df_ma']['total']/3,1)."</td>
        <td class=\"data\">".round((($datos['pormayor'][$anio]['remuneraciones_df_ma']['total']/$datos['pormayor'][$anio_ref]['remuneraciones_df_ma']['total'])-1)*100,1)."</td>
        
        <td class=\"data\">".number_format($datos['pormayor'][$anio]['remuneraciones_pp_df_ma']['total']/3,1)."</td>
        <td class=\"data\">".round((($datos['pormayor'][$anio]['remuneraciones_pp_df_ma']['total']/$datos['pormayor'][$anio_ref]['remuneraciones_pp_df_ma']['total'])-1)*100,1)."</td>
        
        <td class=\"data\">".number_format($datos['pormayor'][$anio]['ingreso_df_ma']['total']/3,1)."</td>
        <td class=\"data\">".round((($datos['pormayor'][$anio]['ingreso_df_ma']['total']/$datos['pormayor'][$anio_ref]['ingreso_df_ma']['total'])-1)*100,1)."</td>
        
        <td class=\"data\">".number_format($datos['pormayor'][$anio]['compras_df_ma']['total']/3,1)."</td>
        <td class=\"data\">".round((($datos['pormayor'][$anio]['compras_df_ma']['total']/$datos['pormayor'][$anio_ref]['compras_df_ma']['total'])-1)*100,1)."</td>";

        if($rubro=='pormayor'){$sufx="ma";}else{$sufx="me";}
    $html .="</tr>
    
    <tr class=\"rEven\"> 
        
        <td>Nacional</td>
        <td class=\"data\">".number_format($datos['pormayor'][$anio]['p_ocupadas_n_ma']['total']/3,1)."</td>
        <td class=\"data\">".round((($datos['pormayor'][$anio]['p_ocupadas_n_ma']['total']/$datos['pormayor'][$anio_ref]['p_ocupadas_n_ma']['total'])-1)*100,1)."</td>
        
        <td class=\"data\">".number_format($datos['pormayor'][$anio]['remuneraciones_n_ma']['total']/3,1)."</td>
        <td class=\"data\">".round((($datos['pormayor'][$anio]['remuneraciones_n_ma']['total']/$datos['pormayor'][$anio_ref]['remuneraciones_n_ma']['total'])-1)*100,1)."</td>
        
        <td class=\"data\">".number_format($datos['pormayor'][$anio]['remuneraciones_pp_n_ma']['total']/3,1)."</td>
        <td class=\"data\">".round((($datos['pormayor'][$anio]['remuneraciones_pp_n_ma']['total']/$datos['pormayor'][$anio_ref]['remuneraciones_pp_n_ma']['total'])-1)*100,1)."</td>
        
        <td class=\"data\">".number_format($datos['pormayor'][$anio]['ingreso_df_ma']['total']/3,1)."</td>
        <td class=\"data\">".round((($datos['pormayor'][$anio]['ingreso_n_ma']['total']/$datos['pormayor'][$anio_ref]['ingreso_n_ma']['total'])-1)*100,1)."</td>
        
        <td class=\"data\">".number_format($datos['pormayor'][$anio]['compras_n_ma']['total']/3,1)."</td>
        <td class=\"data\">".round((($datos['pormayor'][$anio]['compras_n_ma']['total']/$datos['pormayor'][$anio_ref]['compras_n_ma']['total'])-1)*100,1)."</td>
        
    </tr>
    
    
    
    
    
    
    <tr class=\"rEven\"> 
        
        <td></td>
        <td colspan=\"10\">Comercio al por menor</td>
        
        
    </tr>
    <tr class=\"rEven\"> 
        
        <td></td>
        <td colspan=\"2\">Personal ocupado</td>
        <td colspan=\"2\">Remuneraciones totales</td>
        <td colspan=\"2\">Remuneraciones por persona</td>
        <td colspan=\"2\">Ingreso por suministro de bienes y servicios</td>
        <td colspan=\"2\">Comercio total</td>
        
    </tr>
    <tr class=\"rEven\"> 
        
        <td></td>
        <td>Indice</td>
        <td>Variación % anual</td>
        <td>Indice</td>
        <td>Variación % anual</td>
        <td>Indice</td>
        <td>Variación % anual</td>
        <td>Indice</td>
        <td>Variación % anual</td>
        <td>Indice</td>
        <td>Variación % anual</td>
        
    </tr>
    
    
    <tr class=\"rEven\"> 
        <td>DF</td>
        <td class=\"data\">".number_format($datos['pormenor'][$anio]['p_ocupadas_df_me']['total']/3,1)."</td>
        <td class=\"data\">".round((($datos['pormenor'][$anio]['p_ocupadas_df_me']['total']/$datos['pormenor'][$anio_ref]['p_ocupadas_df_me']['total'])-1)*100,2)."</td>
        
        <td class=\"data\">".number_format($datos['pormenor'][$anio]['remuneraciones_df_me']['total']/3,1)."</td>
        <td class=\"data\">".round((($datos['pormenor'][$anio]['remuneraciones_df_me']['total']/$datos['pormenor'][$anio_ref]['remuneraciones_df_me']['total'])-1)*100,2)."</td>
        
        <td class=\"data\">".number_format($datos['pormenor'][$anio]['remuneraciones_pp_df_me']['total']/3,1)."</td>
        <td class=\"data\">".round((($datos['pormenor'][$anio]['remuneraciones_pp_df_me']['total']/$datos['pormenor'][$anio_ref]['remuneraciones_pp_df_me']['total'])-1)*100,2)."</td>
        
        <td class=\"data\">".number_format($datos['pormenor'][$anio]['ingreso_df_me']['total']/3,1)."</td>
        <td class=\"data\">".round((($datos['pormenor'][$anio]['ingreso_df_me']['total']/$datos['pormenor'][$anio_ref]['ingreso_df_me']['total'])-1)*100,2)."</td>
        
        <td class=\"data\">".number_format($datos['pormenor'][$anio]['compras_df_me']['total']/3,1)."</td>
        <td class=\"data\">".round((($datos['pormenor'][$anio]['compras_df_me']['total']/$datos['pormenor'][$anio_ref]['compras_df_me']['total'])-1)*100,2)."</td>";
        
        if($rubro=='pormayor'){$sufx="ma";}else{$sufx="me";}
    
    $html .="</tr>
    
    <tr class=\"rEven\"> 
        
        <td>Nacional</td>
        <td class=\"data\">".number_format($datos['pormenor'][$anio]['p_ocupadas_n_me']['total']/3,1)."</td>
        <td class=\"data\">".round((($datos['pormenor'][$anio]['p_ocupadas_n_me']['total']/$datos['pormenor'][$anio_ref]['p_ocupadas_n_me']['total'])-1)*100,2)."</td>
        
        <td class=\"data\">".number_format($datos['pormenor'][$anio]['remuneraciones_n_me']['total']/3,1)."</td>
        <td class=\"data\">".round((($datos['pormenor'][$anio]['remuneraciones_n_me']['total']/$datos['pormenor'][$anio_ref]['remuneraciones_n_me']['total'])-1)*100,2)."</td>
        
        <td class=\"data\">".number_format($datos['pormenor'][$anio]['remuneraciones_pp_n_me']['total']/3,1)."</td>
        <td class=\"data\">".round((($datos['pormenor'][$anio]['remuneraciones_pp_n_me']['total']/$datos['pormenor'][$anio_ref]['remuneraciones_pp_n_me']['total'])-1)*100,2)."</td>
        
        <td class=\"data\">". number_format($datos['pormenor'][$anio]['ingreso_df_me']['total']/3,1)."</td>
        <td class=\"data\">".round((($datos['pormenor'][$anio]['ingreso_n_me']['total']/$datos['pormenor'][$anio_ref]['ingreso_n_me']['total'])-1)*100,2)."</td>
        
        <td class=\"data\">".number_format($datos['pormenor'][$anio]['compras_n_me']['total']/3,1)."</td>
        <td class=\"data\">".round((($datos['pormenor'][$anio]['compras_n_me']['total']/$datos['pormenor'][$anio_ref]['compras_n_me']['total'])-1)*100,2)."</td>
        
    </tr>";
    
    
    
        
    
    
    
            
  
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}
	

public function tabla_ap7Ind3($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	




//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);



$url = $baseUrl. "/index.php/api/ap7Ind3?anios=$a&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">FINANZAS</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                <h3>$titulos[titulo3]</h3>
                
               
        </div>";   
  


						
$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">";
                



               


$anio = $config['anios_fin'];
$anio_ant=$anio-1;
$trim_inicio=1;
$trim_fin=5;

                             


foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                
                        $datos[$indice2]= $valor2;
                      
                   

               

            }

    }
                

}





$anio=$config['anios_fin'];
$anio_ref=$anio-1;
$maximo = count($anio);
 

$html .="<tr  class=\"rEven\">
       <td rowspan=\"2\">Concepto</td>
        <td rowspan=\"2\">Saldo<sup>3</sup> al 31 de Dic. del año anterior</td>
        <td colspan=\"2\">$config[anios_fin]<sup>1</sup></td>
        <td colspan=\"3\">$config[anios_fin]<sup>2</sup></td>
        <td rowspan=\"2\">Saldo<sup>3</sup> al corte del periodo</td>
        <td rowspan=\"2\">Endeudamiento neto acumulado en el año</td>
    </tr>
    <tr class=\"rEven\"> 
        
        <td>Colocación</td>
        <td>Amortización<sup>2</sup></td>
        <td>Colocación</td>
        <td>Amortización<sup>2</sup></td>
        <td>Actualizacion<sup>3</sup></td>
        
    </tr>";
   foreach ($datos['rubro'] as $rubro=>$dato){ 
    $html .="<tr class=\"rEven\">
        
        
        <td>";
            switch ($rubro){
                case 1:
                    $html .="Gobierno del Distrito federal";
                    break;
                case 2:
                    $html .="Sector gobierno";
                    break;
                case 3:
                    $html .="Sector paraestatal no financiero";
                    break;
            }
        
       $html .="</td>
        <td class=\"data\">".number_format($dato['saldo1'],2)."</td>
        <td class=\"data\">".number_format($dato['colocacion1'],2)."</td>
        <td class=\"data\">".number_format($dato['amortizacion1'],2)."</td>
        <td class=\"data\">".number_format($dato['colocacion2'],2)."</td>
        <td class=\"data\">".number_format($dato['amortizacion2'],2)."</td>
        <td class=\"data\">".number_format($dato['actualizacion2'],2)."</td>
        <td class=\"data\">".number_format($dato['saldo2'],2)."</td>
        <td class=\"data\">".number_format($dato['endeudamiento'],2)."</td>
    </tr>";

    } 
   
    
        
    
    
            
  
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap7Ind2($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	




//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap7Ind2?anios=$a&grafico=0&periodo=".$periodo;

$data = file_get_contents($url);
$model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">FINANZAS</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                <h3>$titulos[titulo3]</h3>
                
               
        </div>";   
  


						
$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">";
                


$anio = $config['anios_fin'];
$anio_ant=$anio-1;
$trim_inicio=1;
$trim_fin=5;

                             


foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                
                        $datos[$indice2]= $valor2;
                      
                   

               

            }

    }
                

}




$anio=$config['anios_fin'];
$anio_ref=$anio-1;
$maximo = count($anio);
 

$html .="<tr class=\"rEven\"> 
       <td class=\"invisible\"></td>
       <td colspan=\"2\">Enero-Junio 2014</td>
        
    </tr>
    <tr class=\"rEven\"> 
        <td>Concepto</td>
        <td>Ejercicio</td>
        <td>Estructura (%)</td>
    </tr>";
    
    foreach($datos[$anio]['rubro'] as $rubro=>$datos){
        $html .="<tr class=\"rEven\">"; 
             
                $sql1 = "SELECT titulo from relaciones where indicador = 'ap7Ind2' and columna=".$rubro; 
                $nombre = Yii::app()->db->createCommand($sql1)->queryRow();
                
                $html .="<td>".$nombre['titulo']."</td>"; 
               $html .="<td class='data'>".number_format($datos['ejercicio'],2)."</td><td class='data'>".number_format($datos['estructura'],2)."%</td>";
                   
         
            
            
        $html .="</tr>";
        } 
        
        
        
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap7Ind11($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


$url = $baseUrl. "/index.php/api/ap7Ind11?anios=$a&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">FINANZAS</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                 <h3>$titulos[titulo3]</h3>
                
               
        </div>";   
  


						
$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">";
                


$anio = $config['anios_fin'];
$anio_ant=$anio-1;
$trim_inicio=1;
$trim_fin=5;



foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                
                        $datos[$indice2]= $valor2;
                      
                   

               

            }

    }
                

}




$anio=$config['anios_fin'];
$anio_ref=$anio-1;
$maximo = count($anio);
 

   
$html .="<tr class=\"rEven\"> 
        <td>Concepto</td>
        <td>Estimado</td>
        <td>Registrado</td>
    </tr>";
    
        foreach($datos[$anio]['rubro'] as $rubro=>$datos){ 
        $html .="<tr class=\"rEven\">"; 
         
                $sql1 = "SELECT titulo from relaciones where indicador = 'ap7Ind11' and columna=".$rubro; 
                $nombre = Yii::app()->db->createCommand($sql1)->queryRow();
                
                $html .="<td>".$nombre['titulo']."</td>"; 
                $html .="<td class='data'>".number_format($datos['estimado'],2)."</td><td class='data'>".number_format($datos['registrado'],2)."</td>";
                   
         
            
            
        $html .="</tr>";
        } 
        
        
        
        
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap6Ind11($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);
//meses
$m = HistoricoPeriodos::model()->listaSimple($config['config']);

$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap6Ind11?anios=$a&meses=$m,0&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">INVERSIÓN</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                 <h3>$titulos[titulo3]</h3>
                
               
        </div>";   
  


						
$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">";
                


$anio = $config['anios_fin'];
$anio_ant=$config['anios_ini'];

                             

foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                
                        $datos[$indice2]= $valor2;
                      
                   

               

            }

    }
                

}



$anio=$config['anios_fin'];
$anio_ref=$config['anios_ini'];
$maximo = count($datos[$anio][1]);

 
$max =$maximo+1;
   
    $html .="<tr class=\"rEven\"> 
        <td rowspan=\"2\">IED por tipo de inversión</td>
        <td colspan=\"$max\">Distrito Federal</td>
        <td colspan=\"$max\">Nacional</td>
    </tr>
    <tr class=\"rEven\">"; 
        
       foreach($datos[$anio][1] as $key => $value){ 
        if($key<=$maximo){ 
            
            switch ($key){
                            case 1:
                                $trimestre_romano=$config['anios_fin']."."."1";
                                break;
                            case 2:
                                $trimestre_romano=$config['anios_fin']."."."2";
                                break;
                            case 3:
                                $trimestre_romano=$config['anios_fin']."."."3";
                                break;
                            case 4:
                                $trimestre_romano=$config['anios_fin']."."."4";
                                break;
                            case 0:
                                $trimestre_romano="Total";
                                break;
                                
                        }
      
        $html .="<td>$trimestre_romano</td>";
        
         }} 
        foreach($datos[$anio][1] as $key => $value){ 
        if($key<=$maximo){   
            
            switch ($key){
                            case 1:
                                $trimestre_romano=$config['anios_fin']."."."1";
                                break;
                            case 2:
                                $trimestre_romano=$config['anios_fin']."."."2";
                                break;
                            case 3:
                                $trimestre_romano=$config['anios_fin']."."."3";
                                break;
                            case 4:
                                $trimestre_romano=$config['anios_fin']."."."4";
                                break;
                            case 0:
                                $trimestre_romano="Total";
                                break;
                                
                        }
         
        
        $html .="<td>$trimestre_romano</td>";
        
        }} 
    $html .="</tr>";
    
    foreach($datos[$anio] as $rubro=>$da){ 
    $html .="<tr class=\"rEven\">";
        
        
       foreach($datos[$anio][$rubro] as $key => $value){ 
            
        if($key==1){
           $sql1 = "SELECT titulo from relaciones where indicador='ap6Ind11' and columna=".$rubro; 
           $nombre = Yii::app()->db->createCommand($sql1)->queryRow(); 
           
           $html .="<td>".$nombre['titulo']."</td>";
        }    
        if($key<=$maximo){      
        
        $html .="<td class=\"data\">".number_format($datos[$anio][$rubro][$key]['df'],1)."</td>";
        
        }} 
    
        
        foreach($datos[$anio][$rubro] as $key => $value){ 
        if($key<=$maximo){    
        
        $html .="<td class=\"data\">".number_format($datos[$anio][$rubro][$key]['nacional'],1)."</td>";
       
       }} 
    $html .="</tr>";  
    }
        
   
    

                               
  $html .="<tr class=\"rEven\"> 
            <td  class=\"invisible\"></td>";
              
                foreach($datos[$anio][1] as $key => $value){ 
                    $html .="<td class=\"invisible\">";
                    
                    $html .="</td>";
                } 

             
                foreach($datos[$anio][1] as $key => $value){ 
                    $html .="<td class=\"invisible\">";
                    
                    $html .="</td>";
                } 
        $html .="</tr> 
    
        <tr class=\"rEven\"> 
            <td >Var. % anual total</td>";
              
                foreach($datos[$anio][1] as $key => $value){ 
                    $html .="<td class=\"data\">";
                    if($key==0){  
                    $html .=number_format($model['informe']['df_total'],0); 
                    } 
                    $html .="</td>";
                } 

                foreach($datos[$anio][1] as $key => $value){ 
                    $html .="<td class=\"data\">";
                    if($key==0){  
                    $html .=number_format($model['informe']['nacional_total'],0); 
                    } 
                    $html .="</td>";
                } 
        $html .="</tr>
        <tr class=\"rEven\"> 
            <td  class=\"invisible\"></td>";
               
                foreach($datos[$anio][1] as $key => $value){ 
                    $html .="<td class=\"invisible\">";
                    
                    $html .="</td>";
                } 

               
                foreach($datos[$anio][1] as $key => $value){ 
                    $html .="<td class=\"invisible\">";
                    
                    $html .="</td>";
                } 
        $html .="</tr> 
        <tr class=\"rEven\"> 
            <td>% de IED del Distrito Federal</td>
            <td class=\"data\">".number_format(($model['informe']['df_v']/$model['informe']['nal_v'])*100,0)."%</td>
        </tr>";
         
   
        
   
        
        
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap6Ind2($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


$baseUrl = Yii::app()->params['baserecm'];
 $url = $baseUrl. "/index.php/api/ap6Ind2?anios=$a&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">INVERSIÓN</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                 <h3>$titulos[titulo3]</h3>
                
               
        </div>";   
  


						
$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">";
                


$anio = 2014;
$anio_ant=$anio-1;
$trim_inicio=1;
$trim_fin=6;

                             

foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

               
                        $datos[$indice2]= $valor2;
                      
                  

            }

    }
                

}

$html .="<tr class=\"rEven\"> 
            <td class=\"invisible\"></td>
            <td colspan=\"2\">Área Metropolitana de la Ciudad de México</td>
            <td colspan=\"2\">Nacional</td>
           
    </tr>
    <tr class=\"rEven\"> 
            <td></td>
            <td>Absoluto</td>
            <td>Variación % anual</td>
            <td>Absoluto</td>
            <td>Variación % anual</td>
           
    </tr>
   
    <tr>";
       
        //este es el numero de ciclos para hacer la division ***********checar si son todos incluyendo el nulo??
        $divisor=count($datos['anio']);
        $divisor=$divisor-1;
        $dividendodf=0;
        $dividendonal=0;
        foreach($datos['anio'] as $anio=>$valor){
           
           if($anio!='promediodf' or $anio!='promnal') {
           //estos son los meses
            $html .="<tr class='rEven'><td>".$anio."</td>";
                $anio_ref=$anio-1;
                $df_val=round((($datos['anio'][$anio]['df']/$datos['anio'][$anio_ref]['df'])-1)*100,0);
                if($df_val==-100){ $df_val="";}
                
                $nal_val=round((($datos['anio'][$anio]['nacional']/$datos['anio'][$anio_ref]['nacional'])-1)*100,0);
                if($nal_val==-100){ $nal_val="";}
                //esta es la sumatoria de los promedios del df
                $dividendodf+=$df_val;
                
                //esta es la sumatoria de los promedios de nacionales
                $dividendonal+=$nal_val;
                $html .="<td class='data'>".number_format($datos['anio'][$anio]['df'],0)."</td><td class='data'>".$df_val."</td><td class='data'>".number_format($datos['anio'][$anio]['nacional'],0)."</td><td class='data'>".$nal_val."</td>";
            $html .="</tr>";
           }
        }
            
            $promedio_nacional=($dividendonal/$divisor);
            $promedio_df=($dividendodf/$divisor);
//******estos son los promedios del periodo a consultar
            $html .="<tr class='rEven'><td>Promedio</td>";
            $html .="<td class='data'>".number_format($datos['promedios']['promdf'],0)."</td><td class='data'>".round($promedio_df,0)."</td><td class='data'>".number_format($datos['promedios']['promnal'],0)."</td><td class='data'>".round($promedio_nacional,0)."</td>";
            $html .="</tr>";
        
        
     
   
    $html .="</tr>";    
        
   
        
        
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap6Ind13($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap6Ind13?anio=".$a."&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">INVERSIÓN</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                 <h3>$titulos[titulo3]</h3>
                
               
        </div>";   
  


						
$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">";
                


$anio = 2014;
$anio_ant=$anio-1;
$trim_inicio=1;
$trim_fin=5;

                             

foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                
                        $datos[$indice2]= $valor2;
                      
                   

               

            }

    }
                

}




$anio=2014;


$html .="<tr class=\"rEven\">
        <td>Tasa de ocupación en condiciones críticas</td>";
        foreach($datos[$anio][1] as $k=>$d){ 
        $html .="<td>";    
        if($k==5){ $html .="Total"; }else{ $html .="".$anio.".".$k; }
        $html .="</td>";
      
        
       
        
      }
    $html .="</tr>";       
    foreach($datos[$anio] as $rubro=>$dat){
    $html .="<tr class=\"rEven\">";
        
        foreach($datos[$anio][$rubro] as $key=>$valor){ 
           if($key==1){ 
            $sql1 = "SELECT titulo from relaciones where indicador= 'ap6Ind13' and columna=".$rubro; 
            $nombre = Yii::app()->db->createCommand($sql1)->queryRow();
            
            $html .="<td>".$nombre['titulo']."</td>";
           
        
         } 
        $html .="<td class=\"data\">".number_format($valor['valor'],1)."</td>";
       }
            
    $html .="</tr>";
   }
  
    

             
        
        
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap5Ind4($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);

$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap5Ind4?grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">EMPRESAS</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                 <h3>$titulos[titulo3]</h3>
                
               
        </div>";   
  


						
$html .="<table class=\"table400 table-bordered table-condensed table400\">";
                

$anio = 2014;
$anio_ant=$anio-1;
$trim_inicio=1;
$trim_fin=5;

                             

foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                
                        $datos[$indice2]= $valor2;
                      
                   

               

            }

    }
                

}


 $html .="<tr class=\"rEven\">
            <td colspan=\"2\"> Distrito Federal </td> 
            
        </tr>";
        
       foreach($datos as $entidad => $valores){ 
            
         $html .="<tr class=\"rEven\">
                <td>";

                $sql1 = "SELECT titulo from relaciones where indicador= 'ap5Ind4' and columna=".$entidad; 
                $nombre = Yii::app()->db->createCommand($sql1)->queryRow();
                
                 $html .="$nombre[titulo]</td>";
                foreach($valores as $key=>$columna){ 
                    foreach($columna as $col=>$val){ 
                         $html .="<td class=\"data\">$val[0]</td>";
                    } 
                 }
                
             $html .="</tr>";
            
        }     
   
             
        
        
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap5Ind3($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);
//meses
$e = HistoricoPeriodos::model()->listaSimple($config['config']);


$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap5Ind3?entidades=".$e."&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">EMPRESAS</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                 <h3>$titulos[titulo3]</h3>
                
               
        </div>";   
  


						
$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">";
                


$anio = 2014;
$anio_ant=$anio-1;
$trim_inicio=1;
$trim_fin=5;

                             

foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                
                        $datos[$indice2]= $valor2;
                      
                   

               

            }

    }
                

}


$html .="<tr class=\"rEven\">
            <td></td> 
            <td>Facilidad de hacer negocios</td> 
            <td>Apertura de un negocio</td>
            <td>Manejo de permisos de construcción</td> 
            <td>Registro de propiedades</td>
            <td>Cumplimiento de contratos</td>
        </tr>";
        
        foreach($datos as $entidad => $valores){ 
            
            $html .="<tr class=\"rEven\">";
                $html .="<td>";
               
                $sql1 = "SELECT titulo from relaciones where indicador= 'ap5Ind3' and columna=".$entidad; 
                $nombre = Yii::app()->db->createCommand($sql1)->queryRow();
                
                $html .="$nombre[titulo]</td>";
                foreach($valores as $key=>$columna){ 
                    foreach($columna as $col=>$val){
                        $html .="<td class=\"data\">$val[0]</td>";
                     } 
                } 
            $html .="</tr>";
            
     }    
   
    

             
        
        
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}


public function tabla_ap5Ind23($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);

$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap5Ind23?anios=".$a."&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">EMPRESAS</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                 <h3>$titulos[titulo3]</h3>
                
               
        </div>";   
  


						
$html .=" <table class=\"table600_stats\">";
                

foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                
                foreach ($valor2 as $indice3 => $valor3) {
              
                        $datos[$indice3]= $valor3;
                      
                }


            }

    }
                

}
                         


//es la sumatoria de todos los rubros para el periodo actual
$total=$datos['suma'];

$html .="<tr class=\"rEven\">
        <td rowspan=\"2\">Delegación / Tamaño de empresa</td>";
  foreach($datos['rubro'][1]['delegacion'] as $delegacion=>$valores){ 
    
        $html .="<td  colspan=\"2\">";
        
        $sql1 = "SELECT nombre from delegaciones where id =".$delegacion; 
        $nombre = Yii::app()->db->createCommand($sql1)->queryRow();
            
        $html .="$nombre[nombre]</td>";
    
} 
    $html .="</tr>         
    <tr class=\"rEven\">";
        
   foreach($datos['rubro'][1]['delegacion'] as $delegacion=>$valores){ 
    
        
        
        $html .="<td >Numero de unidades económicas</td>
        <td >%</td>";
        
        
        
        
    
    } 
    $html .="</tr>";
    
    foreach($datos['rubro'] as $rubro=>$dato){ 
    $html .="<tr class=\"rEven\">
        <td>";
        $sql = "SELECT titulo from relaciones where indicador= 'ap5Ind23' and columna=".$rubro; 
        $nombre = Yii::app()->db->createCommand($sql)->queryRow();
            
        
        $html .="".utf8_encode($nombre['titulo'])."</td>";
        foreach($dato['delegacion'] as $delegacion=>$valores){
        
        $html .="<td class=\"data\">".number_format($valores['unidades'],0)."</td>
        <td class=\"data\">".number_format($valores['porcentual'],2)."%</td>";
        
        } 
        
    $html .="</tr>";
    } 
    
    
   
        
        
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap5Ind22($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);

$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap5Ind22?anios=".$a."&grafico=0&periodo=".$periodo;
        //$url = $baseUrl;
        $data = file_get_contents($url);
        $model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">EMPRESAS</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                 <h3>$titulos[titulo3]</h3>
                
               
        </div>";   
  


						
$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">";
                

foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                
                foreach ($valor2 as $indice3 => $valor3) {
              
                        $datos[$indice3]= $valor3;
                      
                }


            }

    }
                

}
                         


//es la sumatoria de todos los rubros para el periodo actual
$total=$datos['suma'];

$html .="<tr class=\"rEven\">
        <td>Subsector</td>
        <td>Total</td>
        <td>porcentaje</td>
    </tr>";       
   foreach($datos['rubro'] as $rubro=>$dato){
    $html .="<tr class=\"rEven\"><td>";


        $sql = "SELECT titulo from relaciones where indicador= 'ap5Ind22' and columna=".$rubro; 
        $nombre = Yii::app()->db->createCommand($sql)->queryRow();
            
        
        $html .="$nombre[titulo]</td>
        
        <td class=\"data\">".number_format($dato['total']['valor'],0)."</td>
        <td class=\"data\">".number_format(($dato['total']['valor']/$datos['rubro'][21]['total']['valor'])*100,2)."</td>
        
    </tr> ";
  } 
    
        
        
    $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}


public function tabla_ap5Ind21($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);

$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap5Ind21?anios=".$a."&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">EMPRESAS</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                 <h3>$titulos[titulo3]</h3>
                
               
        </div>";   
  


						
$html .="<table class=\"table600 table-bordered table-condensed table300\">";
                


$html .="<tr class=\"rEven\">";
        
        foreach($model['informe'] as $rubro=>$valor){
        
            $html .="<td>";

            
            if($rubro==1){ $html .="Numero de unidades económicas en el Distrito Federal"; }
            
            $html .="</td>";
            
            
         } 
    $html .="</tr> 
    <tr class=\"rEven\">
        <td class=\"data\">".number_format($valor['valor'],0)."</td>
    </tr>";
    
    
   
    
    
        
   
        
   $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}

public function tabla_ap5Ind1($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap5Ind1?anios=$a&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);


     $html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">EMPRESAS</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                 <h3>$titulos[titulo3]</h3>
                
               
        </div>";   
  


						
$html .="<table class=\"table600 table-bordered table-condensed defaultTable\">";
                


foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    
                foreach ($valor2 as $indice3 => $valor3) {
                    
                    foreach ($valor3 as $indice4 => $valor4) {

                        $datos[$indice4]= $valor4;
                    }

                }

               

            }

    }
                

}

    $i=0;
    foreach ($datos as $entidad=>$rubros){
    $i++;    
    
    if($i==1){
      
    $html .="<tr class=\"rEven\">
        <td rowspan=\"2\">Delegación</td>";
        foreach($datos[$entidad]['rubro'] as $rubro=>$d){ 
        
            $html .="<td colspan=\"6\">";
            
            if($rubro==2){ $html .="Registros de solicitudes de permisos de impacto vecinal autorizados (numero)"; }
            if($rubro==1){ $html .="Registros de establecimientos mercantiles de bajo impacto (numero)"; }
            $html .="</td>";
            
      } 
    $html .="</tr> 
    <tr class=\"rEven\">";
        
        foreach ($datos[$entidad]['rubro'][1]['mes'] as $mes=>$d){
        
            $html .="<td >".$this->mes($mes)."</td>";
            
         }
      foreach ($datos[$entidad]['rubro'][2]['mes'] as $mes=>$d){ 
        
            $html .="<td >".$this->mes($mes)."</td>";
            
       } 
    $html .="</tr>"; 
     } 
    $html .="<tr class=\"rEven\"><td>";

        $sql1 = "SELECT nombre from delegaciones where id =".$entidad; 
        $ent = Yii::app()->db->createCommand($sql1)->queryRow();
            
        
        if($entidad!=9000){
            $html .="$ent[nombre]";
        }else{
            $html .="Total Distrito Federal";
        }
        
        $html .="</td>";
        foreach($rubros['rubro'] as $rubro=>$meses){
        
            foreach ($meses['mes'] as $mes=>$dato){
                $html .="<td class=\"data\">$dato[valor]</td>";
            }
                
      } 
    $html .="</tr>";
  } 
    
    
        
   
    
   
        
   $html .="</table>
   </div>";

$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}


function mes($mes){
    switch ($mes){
                    
                    case 1:
                       $mesd='Enero';
                       break;
                   case 2:
                       $mesd='Febrero';
                       break;
                   case 3:
                       $mesd='Marzo';
                       break;
                   case 4:
                       $mesd='Abril';
                       break;
                   case 5:
                       $mesd='Mayo';
                       break;
                   case 6:
                       $mesd='Junio';
                       break;
                   case 7:
                       $mesd='Julio';
                       break;
                   case 8:
                       $mesd='Agosto';
                       break;
                   case 9:
                       $mesd='Septiembre';
                       break;
                   case 10:
                       $mesd='Octubre';
                       break;
                   case 11:
                       $mesd='Noviembre';
                       break;
                   case 12:
                       $mesd='Diciembre';
                       break;
                } 
                return $mesd;
}

public function tabla_ap4Ind12($periodo)
	{
	error_reporting(0);
	$config=HistoricoPeriodos::model()->periodo_back($periodo);
	$var = HistoricoPeriodos::model()->listaSimple($config['config']);

	$baseUrl = Yii::app()->params['baserecm'];	
	$titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);	


//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);

$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap4Ind12?anios=".$config['anios_ini']."&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

$anio=$config['anios_ini'];

foreach ($model['informe'] as $indice => $valor) {

    if (is_array($valor)){ 
            
        $datos[$indice]= $valor;
                  

    }
                

}

//aqui paso el arreglo para la segunda serie de datos
foreach ($model['informe2'] as $indice => $valor) {

    if (is_array($valor)){ 
            
        $datos2[$indice]= $valor;
                  

    }
                

}

//aqui paso el arreglo para la segunda serie de datos
foreach ($model['informe3'] as $indice => $valor) {

    if (is_array($valor)){ 
            
        $datos3[$indice]= $valor;
                  

    }
                

}



$anio=$config['anios_ini'];
$anio_ref=$anio-1;
$tim_actual=$config['config'][0];

$html="<br><br><div class=\"col-md-3\">
            <h2 class=\"indicadorTitulo\">SALARIOS E INGRESOS</h2>
            </div>";
    $html.="<div class=\"table-responsive\">

        <div class=\"col-md-12 text-center\">
                <h3>$titulos[titulo1]</h3>
                <h3>$titulos[titulo2]</h3>
                 <h3>$titulos[titulo3]</h3>
                
               
        </div>";   

    

foreach ($model['informe'] as $trimestre=>$d){
    
if( $trimestre ==$tim_actual){ 
    
 $html.="<table class=\"table600 table-bordered table-condensed defaultTable\">
    <tr class=\"rEven\">
        <td rowspan=\"3\">Promedio según posición en la ocupación Trimestre $trimestre</td>
        <td colspan=\"3\">Distrito Federal</td>
        <td rowspan=\"3\">% de variacion del total respecto al Trimestre $trimestre $anio_ref</td>
        <td colspan=\"6\">Nacional</td>
        <td colspan=\"2\" rowspan=\"2\">% de variacion del total respecto al Trimestre $trimestre $anio_ref</td>
    </tr>   
    <tr class=\"rEven\">
        <td rowspan=\"2\">Total</td>
        <td rowspan=\"2\">Hombres</td>
        <td rowspan=\"2\">Mujeres</td>
        
        <td rowspan=\"2\">Total</td>
        <td rowspan=\"2\">Áreas más urbanizadas</td>
        
        <td colspan=\"2\">Hombres</td>
        <td colspan=\"2\">Mujeres</td>
    </tr>
    <tr class=\"rEven\">
        <td>Total</td>
        <td>Áreas más urbanizadas</td>
        
        <td>Total</td>
        <td>Áreas más urbanizadas</td>
        
        <td>Total</td>
        <td>Áreas más urbanizadas</td>
    </tr>";
 
    
    foreach ($datos[$trimestre][$anio]['rubro'] as $rubro=>$dato){ 
        
    
     $html.="<tr class=\"rEven\"><td>";
        
        //esta info sale del primer arreglo del json, y trae los rubros para desplegar, y los tres valores para df
        $sql = "SELECT titulo from relaciones where indicador = 'ap4Ind12' and columna =".$rubro; 
        $rubro1 = Yii::app()->db->createCommand($sql)->queryRow();
            
        //echo utf8_encode($rubro1['titulo']);
        $html.=utf8_encode($rubro1['titulo']) ."</td>";
        
        
        $html.="<td class=\"data\">".number_format($dato['columna'][1]['valor'],2)."</td>";
        $html.="<td class=\"data\">".number_format($dato['columna'][2]['valor'],2)."</td>";
        $html.="<td class=\"data\">".number_format($dato['columna'][3]['valor'],2)."</td>";
       
        
        $html.="<td class=\"data\">".number_format((($dato['suma']/$datos[$tim_actual][$anio_ref]['rubro'][$rubro]['suma'])-1)*100,2)."</td>";
      
        
        $html.="<td class=\"data\">".number_format($datos2[$trimestre][$anio]['rubro'][$rubro]['columna'][1]['valor'],2)."</td>";
        $html.="<td class=\"data\">".number_format($datos2[$trimestre][$anio]['rubro'][$rubro]['columna'][2]['valor'],2)."</td>";
        
        $html.="<td class=\"data\">".number_format($datos2[$trimestre][$anio]['rubro'][$rubro]['columna'][1]['valor'],2)."</td>";
        $html.="<td class=\"data\">".number_format($datos2[$trimestre][$anio]['rubro'][$rubro]['columna'][2]['valor'],2)."</td>";
        
        $html.="<td class=\"data\">".number_format($datos2[$trimestre][$anio]['rubro'][$rubro]['columna'][1]['valor'],2)."</td>";
        $html.="<td class=\"data\">".number_format($datos2[$trimestre][$anio]['rubro'][$rubro]['columna'][2]['valor'],2)."</td>";
        
      
        
        //operacion final pata la columan totales
        $trimestref=$config['config'][0];
        $sumatoria_totales[$trimestre] = $datos3[1][$trimestre][$anio]['rubro'][$rubro]['columna'][1]['valor'] + $datos3[2][$trimestre][$anio]['rubro'][$rubro]['columna'][1]['valor'] + $datos3[3][$trimestre][$anio]['rubro'][$rubro]['columna'][1]['valor'];
        $sumatoria_totales_pasado[$trimestre] = $datos3[1][$trimestref][$anio_ref]['rubro'][$rubro]['columna'][1]['valor'] + $datos3[2][$trimestref][$anio_ref]['rubro'][$rubro]['columna'][1]['valor'] + $datos3[3][$trimestre][$anio_ref]['rubro'][$rubro]['columna'][1]['valor'];
        
        $total_n[$trimestre]=(($sumatoria_totales[$trimestre]/$sumatoria_totales_pasado[$trimestre])-1)*100;
        
        
        //operacion final para la columna urbanizadas
        
        $sumatoria_ur[$trimestre] = $datos3[1][$trimestre][$anio]['rubro'][$rubro]['columna'][2]['valor'] + $datos3[2][$trimestre][$anio]['rubro'][$rubro]['columna'][2]['valor'] + $datos3[3][$trimestre][$anio]['rubro'][$rubro]['columna'][2]['valor'];
        $sumatoria_ur_pasado[$trimestre] = $datos3[1][$trimestref][$anio_ref]['rubro'][$rubro]['columna'][2]['valor'] + $datos3[2][$trimestref][$anio_ref]['rubro'][$rubro]['columna'][2]['valor'] + $datos3[3][$trimestref][$anio_ref]['rubro'][$rubro]['columna'][2]['valor'];
        
        
        $urbanizadas_n[$trimestre]=(($sumatoria_ur[$trimestre]/$sumatoria_ur_pasado[$trimestre])-1)*100;
        
        
        $html.="<td class=\"data\">".number_format($total_n[$trimestre],2) ."</td>";
        $html.="<td class=\"data\">".number_format($urbanizadas_n[$trimestre],2) ."</td>";
        
        
        
        
    $html.="</tr>";
     } 
   
   $html .="</table></div>";
    
		
}
}




$html .="<div class=\"table_explanation\">
        <p>$titulos[nota1]</p>
        <p>$titulos[fuente]</p>
</div> "; 
		
        return $html;
	}
 

}