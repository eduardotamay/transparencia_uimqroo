<?php
require_once("../datos/connection.php");

class Archivo
{  private $id_transparencia;
   private $nom_transpa;
   private $descrip_transpa;
   private $fecha_transpa;
   private $id_periodo;
   private $id_tipoInfo;
   private $link;
 
   public function __construct(){}

   public function Archivo(
    $id_transparencia,
    $nom_transpa,
    $descrip_transpa,
    $fecha_transpa,
    $id_periodo,
    $id_tipoInfo,
    $link
    )
   { 
    $this->id_transparencia=$id_transparencia;
    $this->nom_transpa=$nom_transpa;
    $this->descrip_transpa=$descrip_transpa;
    $this->fecha_transpa=$fecha_transpa;
    $this->id_periodo=$id_periodo;
    $this->id_tipoInfo=$id_tipoInfo;
    $this->link=$link;
    }
 

   //ACCESADORES
    public function getId_transparencia()           {return $this->id_transparencia;}
    public function getNom_transparencia()          {return $this->nom_transpa;}
    public function getDescrip_transparencia()      {return $this->descrip_transpa;}
    public function getFecha_transparencia()        {return $this->fecha_transpa;}
    public function getIdPeriodo_transparencia()    {return $this->id_periodo;}
    public function getIdTipoInfo_transparencia()   {return $this->id_tipoInfo;}
    public function getLink()                       {return $this->link;}



   //MUTANTES
    public function setId_transparencia($id_transparencia)        {$this->id_transparencia=$id_transparencia;}
    public function setNom_transparencia($nom_transpa)            {$this->nom_transpa=$nom_transpa;}
    public function setDescrip_transparencia($descrip_transpa)    {$this->descrip_transpa=$descrip_transpa;}
    public function setFecha_transparencia($fecha_transpa)        {$this->fecha_transpa=$fecha_transpa;}
    public function setIdPeriodo_transparencia($id_periodo)       {$this->id_periodo=$id_periodo;}
    public function setIdTipoInfo_transparencia($id_tipoInfo)     {$this->id_tipoInfo=$id_tipoInfo;}
    public function setLink($link)                                {$this->link=$link;}
  

  public function ingresarArchivo()
  { 
    $objConex=new Conexion();
    $sql="INSERT INTO archivo_transparencia
    (id_transparencia,
    nom_transpa,
    descrip_transpa,
    fecha_transpa,
    periodo_id,
    id_tipoInfo,
    link_archivo) values
    (null,
    '".$this->nom_transpa."',
    '".$this->descrip_transpa."', 
    ".$this->fecha_transpa.", 
    ".$this->id_periodo.",
    ".$this->id_tipoInfo.",
    '".$this->link."')";
    $resul=$objConex->generarTransaccion($sql);
    return $resul;
  }
   //trae cualquier tipo de producto pero le debes pasar el parametro para saber si el libro cuento poesia o leyenda
  public function listarInfoPublica()
  { 
    $objConex=new Conexion();//Instanciar clase Conexion
    $sql='SELECT * FROM tipo_info_publica';
    $vector=$objConex->generarTransaccion($sql);
    return $vector;
  }

  public function listarPeriodo()
  { 
    $objConex=new Conexion();//Instanciar clase Conexion
    $sql="SELECT * FROM periodo";
    $vector=$objConex->generarTransaccion($sql);
    return $vector;
  }
  public function listarPeriodoId($id)
  { 
    $objConex=new Conexion();//Instanciar clase Conexion
    $sql="SELECT * FROM periodo where (id_periodo=".$id.")";
    $vector=$objConex->generarTransaccion($sql);
    return $vector;
  }
  public function listarAnual()
  { 
    $objConex=new Conexion();//Instanciar clase Conexion
    $sql="SELECT * FROM anualidad";
    $vector=$objConex->generarTransaccion($sql);
    return $vector;
  }
  public function buscarInfoPublica($id)
  { 
    $objConex=new Conexion();//Instanciar clase Conexion
    $sql="SELECT * FROM tipo_info_publica WHERE(id_tipoInfoPublica=".$id.")";
    $vector=$objConex->generarTransaccion($sql);
    return $vector;
  }
  public function buscarPeriodo($id)
  { 
    $objConex=new Conexion();//Instanciar clase Conexion
    $sql="SELECT * FROM periodo WHERE(id_periodo=".$id.")";
    $vector=$objConex->generarTransaccion($sql);
    return $vector;
  }
  public function buscarAnual($id)
  { 
    $objConex=new Conexion();//Instanciar clase Conexion
    $sql="SELECT * FROM anualidad WHERE(id_anual=".$id.")";
    $vector=$objConex->generarTransaccion($sql);
    return $vector;
  }
  public function buscarArchivoT()
  { 
    $objConex=new Conexion();//Instanciar clase stream_context_set_option(stream_or_context, wrapper, option, value)
    $sql="SELECT 
    *
    from archivo_transparencia";
    $vector=$objConex->generarTransaccion($sql);
    return $vector;
  }
} //clase
?>
