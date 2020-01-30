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
                <br>
                <?php
                    $idMP = $_GET['idM']; //Id del marco J
                    $anual = $_GET['anual'];
                    $datos = $objArch->buscarInfoPublica($idMP);//Se llama al objeto por el ID
                    $datos1 = $objArch->buscarAnual($anual);
                    while ($regAn = mysqli_fetch_array($datos1)){
                        $anua = $regAn[1];
                    }
                    while ($reg = mysqli_fetch_array($datos)){
                        if ($reg[3]=$anual) { //Condicion para imprimir por año
                ?>
                <ol class="breadcrumb dir-bread">
                    <li><a href="../vista/informacion-publica-obligatoria.php"><?php echo $reg[1]; ?></a></li>
                    <li class="active"><?php echo $anua; ?></li>
                </ol>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                            aria-expanded="false" aria-controls="collapseOne">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    I Trimestre
                                </h4>
                            </div>
                        </a>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                            aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <!--Table-responsive-->
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="active">
                                                <th class="table-icon" scope="col">#</th>
                                                <th class="table-icon" scope="col">Nombre</th>
                                                <th class="table-icon" scope="col">Descripción</th>
                                                <th class="table-icon" scope="col">Trimestre</th>
                                                <th class="table-icon" scope="col">Consultar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $datosT = $objArch->buscarArchivoT();
                                            // $datosP = $objArch->listarPeriodo();
                                            while ($regT = mysqli_fetch_array($datosT)){  
                                                if ($regT[4]==1 and $regT[3]==$anual and $regT[5]==$idMP) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $regT[0];?></th>
                                                <td><?php echo $regT[1];?></td>
                                                <td><?php echo $regT[2];?></td>
                                                <td>
                                                    <?php 
                                    
                                                            $idTp = $regT[4];
                                                            $datosPid = $objArch->listarPeriodoId($idTp);
                                                            while ($regIdt = mysqli_fetch_array($datosPid)){
                                                            echo $regIdt[1];
                                                        }
                                        
                                                    ?>
                                                </td>
                                                <td class="table-icon"><a href="#"><i
                                                            class="fas fa-file-alt"></i></i></a></td>
                                            </tr>
                                            <?php 
                                            } //End if    
                                            } //End While
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!--END Table-responsive-->
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                            href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    II Trimestre
                                </h4>
                            </div>
                        </a>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <!--Table-responsive-->
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="active">
                                                <th class="table-icon" scope="col">#</th>
                                                <th class="table-icon" scope="col">Nombre</th>
                                                <th class="table-icon" scope="col">Descripción</th>
                                                <th class="table-icon" scope="col">Trimestre</th>
                                                <th class="table-icon" scope="col">Consultar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $datosT = $objArch->buscarArchivoT();
                                            // $datosP = $objArch->listarPeriodo();
                                            while ($regT = mysqli_fetch_array($datosT)){  
                                                if ($regT[4]==2 and $regT[3]==$anual and $regT[5]==$idMP) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $regT[0];?></th>
                                                <td><?php echo $regT[1];?></td>
                                                <td><?php echo $regT[2];?></td>
                                                <td>
                                                    <?php
                                                            $idTp = $regT[4];
                                                            $datosPid = $objArch->listarPeriodoId($idTp);
                                                            while ($regIdt = mysqli_fetch_array($datosPid)){
                                                            echo $regIdt[1];
                                                        }
                                                    ?>
                                                </td>
                                                <td class="table-icon"><a href="#"><i
                                                            class="fas fa-file-alt"></i></i></a></td>
                                            </tr>
                                            <?php 
                                            } //End If
                                            } //End while
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!--END Table-responsive-->
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                            href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    III Trimestre
                                </h4>
                            </div>
                        </a>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <!--Table-responsive-->
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="active">
                                                <th class="table-icon" scope="col">#</th>
                                                <th class="table-icon" scope="col">Nombre</th>
                                                <th class="table-icon" scope="col">Descripción</th>
                                                <th class="table-icon" scope="col">Trimestre</th>
                                                <th class="table-icon" scope="col">Consultar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $datosT = $objArch->buscarArchivoT();
                                            // $datosP = $objArch->listarPeriodo();
                                            while ($regT = mysqli_fetch_array($datosT)){  
                                                if ($regT[4]==3 and $regT[3]==$anual and $regT[5]==$idMP) {
                                       ?>
                                            <tr>
                                                <th scope="row"><?php echo $regT[0];?></th>
                                                <td><?php echo $regT[1];?></td>
                                                <td><?php echo $regT[2];?></td>
                                                <td>
                                                    <?php 
                                                            $idTp = $regT[4];
                                                            $datosPid = $objArch->listarPeriodoId($idTp);
                                                            while ($regIdt = mysqli_fetch_array($datosPid)){
                                                            echo $regIdt[1];
                                                        }
                                                    ?>
                                                </td>
                                                <td class="table-icon"><a href="#"><i
                                                            class="fas fa-file-alt"></i></i></a></td>
                                            </tr>
                                            <?php 
                                            }   
                                        } 
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!--END Table-responsive-->
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                            href="#collapseFourt" aria-expanded="false" aria-controls="collapseFourt">
                            <div class="panel-heading" role="tab" id="headingFourt">
                                <h4 class="panel-title">
                                    IV Trimestre
                                </h4>
                            </div>
                        </a>
                        <div id="collapseFourt" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingFourt">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <!--Table-responsive-->
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="active">
                                                <th class="table-icon" scope="col">#</th>
                                                <th class="table-icon" scope="col">Nombre</th>
                                                <th class="table-icon" scope="col">Descripción</th>
                                                <th class="table-icon" scope="col">Trimestre</th>
                                                <th class="table-icon" scope="col">Consultar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $datosT = $objArch->buscarArchivoT();
                                            // $datosP = $objArch->listarPeriodo();
                                            while ($regT = mysqli_fetch_array($datosT)){  
                                            if ($regT[4]==4 and $regT[3]==$anual and $regT[5]==$idMP) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $regT[0];?></th>
                                                <td><?php echo $regT[1];?></td>
                                                <td><?php echo $regT[2];?></td>
                                                <td>
                                                    <?php 
                                                       
                                                            $idTp = $regT[4];
                                                            $datosPid = $objArch->listarPeriodoId($idTp);
                                                            while ($regIdt = mysqli_fetch_array($datosPid)){
                                                            echo $regIdt[1];
                                                        }
                                                    ?>
                                                </td>
                                                <td class="table-icon"><a href="#"><i
                                                            class="fas fa-file-alt"></i></i></a></td>
                                            </tr>
                                            <?php
                                            }    
                                        } 
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!--END Table-responsive-->
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                            href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            <div class="panel-heading" role="tab" id="headingFive">
                                <h4 class="panel-title">
                                    V Trimestre
                                </h4>
                            </div>
                        </a>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingFive">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <!--Table-responsive-->
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="active">
                                                <th class="table-icon" scope="col">#</th>
                                                <th class="table-icon" scope="col">Nombre</th>
                                                <th class="table-icon" scope="col">Descripción</th>
                                                <th class="table-icon" scope="col">Trimestre</th>
                                                <th class="table-icon" scope="col">Consultar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $datosT = $objArch->buscarArchivoT();
                                            // $datosP = $objArch->listarPeriodo();
                                            while ($regT = mysqli_fetch_array($datosT)){  
                                            if ($regT[4]==5 and $regT[3]==$anual and $regT[5]==$idMP) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $regT[0];?></th>
                                                <td><?php echo $regT[1];?></td>
                                                <td><?php echo $regT[2];?></td>
                                                <td>
                                                    <?php
                                                            $idTp = $regT[4];
                                                            $datosPid = $objArch->listarPeriodoId($idTp);
                                                            while ($regIdt = mysqli_fetch_array($datosPid)){
                                                            echo $regIdt[1];
                                                        }
                                                    ?>
                                                </td>
                                                <td class="table-icon">
                                                    <a href='<?php echo $regT[6];?>' target="_blank"><i class='fas fa-file-alt'></i></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                            }    
                                        } 
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!--END Table-responsive-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--End collapse-->
                <?php 
                    } //End IF
                    } //End while 
                ?>
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