<?php

require_once('./phpoffice/bootstrap.php');


			
			/*
			Si estas trabajando en el 19 quitas esta linea, pero si estas en el 24 la colocas
			
			Esto es por que la varibale open_basedir  de php tiene los sigeuintes valores
			19: no value
			24: /opt/swsi/htdocs:/usr/local/lib/php:/tmp
			
			La variable open_basedir te restringe los accesos al arbol de directorios en el caso del
			19 no te restringe el acceso, pero en el 24 solo puedes escribir archivos temporales en 
			los directorios /opt/swsi/htdocs:/usr/local/lib/php:/tmp 
			
			y Parece que phpoffice por default el directorio temporal es /var/tmp entonces el 24 no te
			deja crear el archivo, asi que tienes que configurar el archivo temporal, con la sigeuinte linea
			*/
			//\PhpOffice\PhpWord\Settings::setTempDir('/tmp');
			
			$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("template/oficio.docx");
			
			$templateProcessor->setValue('folio', "www");
			$templateProcessor->setValue('solicitane', "dsad");
			//$templateProcessor->setValue('pwd', $juez->pwd);
			//$templateProcessor->setValue('fechas', '5 y 6 de abril del 2017');
			//$templateProcessor->setValue('today', self::get_fecha());
			//$templateProcessor->setValue('fecha_limite', '3 de marzo');
			
			//$templateProcessor->cloneRow('rowTipo', $juez->num_proyectos);
			
			/*
			$i=1;
			foreach($juez->proyectos as $p){
				//print_r($p); die();
				$templateProcessor->setValue('r#'.$i, $i);
				$templateProcessor->setValue('rowTitulo#'.$i, $p->titulo);
				$templateProcessor->setValue('rowArea#'.$i, $p->nom_area);
				$templateProcessor->setValue('rowDisciplina#'.$i, $p->nom_disciplina);
				$templateProcessor->setValue('rowTipo#'.$i, $p->nom_tipo);
				$i++;
			}
			*/
			
			//$name = "carta_".$juez->id_juez.".docx";
			
			//echo $dir_template.$name; die();
			
			//$templateProcessor->saveAs(self::$dir_template.$name);
			$templateProcessor->saveAs("./sss.docx");
			
			//return (object)array("error" => false, "carta" => self::$dir_template.$name);
	
		
?>