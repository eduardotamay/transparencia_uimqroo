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
                 <h2 class="text-center">TRANSPARENCIA</h2>
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