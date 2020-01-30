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
                  if(isset($_GET["id_tipo"])){
                        $tipo=$_GET["id_tipo"];
                    }else{
                        $tipo=1;
                    }
                ?>
            </div>
            <!-- Body -->
            <div class="col-sm-8"><br>
                
                <form enctype="multipart/form-data" action="../controlador/CTransparencia.php" method="POST">
                    <div class="form-group">
                        <label for="infoPublica">INFORMACIÓN PÚBLICA OBLIGATORIA</label>
                        <select class="form-control" name="infoPublica" id="infoPublica" required="true">
                            <?php
                                $datos = $objArch->listarInfoPublica();
                                while ($reg = mysqli_fetch_row($datos)) {
                                        echo "<option value='" . $reg[0] . "'>" . $reg[0] . " | " .$reg[1]. " </option>";  
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="trimestre">Trimestre (Periodo)</label>
                        <select class="form-control" name="trimestre" id="trimestre" required="true">
                            <?php
                                $datos = $objArch->listarPeriodo();
                                while ($reg = mysqli_fetch_row($datos)) {
                                    echo "<option value='" . $reg[0] . "'>" . $reg[0] . " | " .$reg[1] . " </option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="titulo">Titulo Art | Frac | Normatividad</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required="true"
                            placeholder="Art | Frac | Normatividad">
                    </div>
                    <div class="form-group">
                        <label for="fecha">Anualidad</label>
                        <select class="form-control" name="fecha" id="fecha" required="true">
                            <?php
                                $datos = $objArch->listarAnual();
                                while ($reg = mysqli_fetch_row($datos)) {
                                    echo "<option value='" . $reg[0] . "'>" . $reg[0] . " | " .$reg[1] . " </option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" rows="3" id="descripcion" name="descripcion"
                            placeholder="Descripción" required="true"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Seleccionar documento</label>
                        <input type="file" id="uploadedfile" name="uploadedfile" required="true">
                    </div>
                    <button type="submit" name="Etransparencia" class="btn btn-info btn-lg">Enviar</button>
                </form><br>
            </div>
        </div>
        <?php
            include_once '../vista/footer.php';
         ?>
    </div>
    <?php
        require_once '../vista/script.php';
     ?>
</body>

</html>