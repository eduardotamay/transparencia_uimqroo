<!DOCTYPE html>
<html lang="es">
<?php
  include_once '../vista/head.php';
?>

<body>
    <div class="container">
        <?php
          include_once '../vista/header.php';
        ?>
        <div class="row">
            <div class="col-sm-4">
                <!-- Navbar -->
                <?php
                  require_once '../vista/navbar.php';
                ?>
            </div>
            <!-- Body -->
            <div class="col-sm-8">
                <h3 class="text-center">Información Pública Obligatoria</h3>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php
                     $datos = $objArch->listarInfoPublica(); //Instanciar el objeto
                     while ($reg = mysqli_fetch_array($datos)) { //Listar los valores en un Array
                    echo "<div class='panel panel-default'>";
                        echo "<a class='collapsed collapse-link' role='button' data-toggle='collapse' data-parent='#accordion'
                            href='#collapseOne".$reg[0]."' aria-expanded='false' aria-controls='collapseOne".$reg[0]."'>";
                            echo "<div class='panel-heading' role='tab' id='headingOne".$reg[0]."'>";
                                echo "<h4 class='panel-title'>";
                                    echo $reg['titulo_publica'];
                                echo "</h4>";
                            echo "</div>";
                        echo "</a>";
                        echo "<div id='collapseOne".$reg[0]."' class='panel-collapse collapse' role='tabpanel'
                            aria-labelledby='headingOne".$reg[0]."'>";
                            echo "<div class='panel-body'>";
                                echo $reg['descripcion_publica']."<br><br>";
                                    $anualidad = $objArch->listarAnual();
                                    while ($regA = mysqli_fetch_array($anualidad)) {
                                        echo "<a class='btn btn-primary' href=../vista/detalleNormas.php?anual=".$regA[0]."&idM=".$reg[0].">";
                                        echo $regA[1]."</a> ";
                                    }
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                    }
                    ?>
                </div>
                <!--END col-grou-->
            </div>
            <!--END col---->
        </div>
        <!--END row--->
    </div>
    </div>
    </div>
    <?php
        require_once '../vista/script.php';
     ?>
</body>

</html>