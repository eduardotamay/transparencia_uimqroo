<?php
    require_once("../modelo/MTransparencia.php");

    if(isset($_POST["infoPublica"]))
    {
        $infoPublica=$_POST["infoPublica"];
    }else{
        $infoPublica="";
    }
    //Creando array para directorio del archivo
    $objArch = new Archivo();//Llamo la clase
    $datos = $objArch->buscarInfoPublica($infoPublica);
    while ($reg = mysqli_fetch_row($datos)) {
        $infoRomano = $reg[3];  
    }
    //Termina array
    if(isset($_POST["trimestre"]))
    {
        $trimestre=$_POST["trimestre"];
    }else{
        $trimestre="";
    }
    //Creando array para directorio del archivo
    $objArch = new Archivo();//Llamo la clase
    $datos = $objArch->listarPeriodoId($trimestre);
    while ($reg = mysqli_fetch_row($datos)) {
        $trimesRomano = $reg[2];  
    }
    //Termina array
    if(isset($_POST["titulo"]))
    {
        $titulo=$_POST["titulo"];
    }else{
        $titulo="";
    }
    if(isset($_POST["fecha"]))
    {
        $fecha=$_POST["fecha"];
    }else{
        $fecha="";
    }
    //Creando array para directorio del archivo
    $objArch = new Archivo();//Llamo la clase
    $datos = $objArch->buscarAnual($fecha);
    while ($reg = mysqli_fetch_row($datos)) {
        $anualRomano = $reg[1];  
    }
    //Termina array
    if(isset($_POST["descripcion"]))
    {
        $descripcion=$_POST["descripcion"];
    }else{
        $descripcion="";
    }

    $extDocumentos=["pdf","PDF","xls","XLS","ppt","PPT","docx","DOCX"];
    $ExtPermitida=false;
    $ext=pathinfo(basename( $_FILES['uploadedfile']['name']),PATHINFO_EXTENSION);
    //Las variables que sirven para almacenar archivo en su directorio 
    $infoRomano;
    $trimesRomano;
    $anualRomano;
    // Aqui termina
    $target_path="../Transparencia/Fracccion/$infoRomano/$anualRomano/$trimesRomano/";
    foreach ($extDocumentos as $e) {
        if($e==$ext){
            $ExtPermitida=true;
        }
    }
    $size=26214400; //25 Megas en bytes
    // 	 bytes 		kilobytes megabytes gigabytes
	//	1073741824 	1048576		1024		1
    $nombreArchivo=preg_replace('[\s+]','',$titulo);
	$target_path = $target_path.$nombreArchivo.".".$ext;    
        if ($ExtPermitida){
		// nos aseguramos que el tamaño del archivo sea menor al minimo permitido y si la extencion de archivo corresponde a la aceptada
			if ($_FILES['uploadedfile']['size']<$size){
				//move_uploaded_file sube el archivo al servidor y solo si logra hacerlo, entra en la condicion para crear una fila en la tabla producto
				if($_FILES['uploadedfile']['error']==0 || $_FILES['uploadedfile']['error']==null){
					if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
                        $link=$target_path; //Se crea el link el archivo
                        $objArch = new Archivo();//Llamo la clase
                        $objArch->Archivo(//Creo el objeto de la Clase Archivo
                            //Los atributos que envío
                            $id_transparencia,
                            $titulo,
                            $descripcion,
                            $fecha,
                            $trimestre,
                            $infoPublica,
                            $link);
                            $resul=$objArch->ingresarArchivo(); //Aqui llamo al objeto
                            if ($resul!=""){
                                echo "<script language='javascript'>alert('BIEN: Archivo y datos almecenados');
                                    window.location='../Vista/form.php'</script>";
                            }
                            else {
                                echo "<script language='javascript'>alert('ERROR: Archivo y datos perdidos');
                                window.location='../Vista/form.php'</script>";
                            }
                    }else{
                        echo "<script language='javascript'>alert('ERROR: El archivo no se subió en el directorio');
                                            window.location='../Vista/form.php'</script>";
                    }
                }else{
                    echo "<script language='javascript'>alert('ERROR: El archivo no se pudo subir');
                                        window.location='../Vista/form.php'</script>";
                }
            }else{
                echo "<script language='javascript'>alert('ERROR: Tamaño archivo permitida');
                                    window.location='../Vista/form.php'</script>";
            }			
        }else{
            echo "<script language='javascript'>alert('ERROR: Extensión no permitida');
                                window.location='../Vista/form.php'</script>";
        }
?>