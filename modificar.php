<?php
include("conect.php");
$query="SELECT * FROM users";
$answer = $conexion -> query($query);

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistema de llamadas por voz ip">
  <meta name="author" content="8A_2">
  <title>Sistema de llamadas </title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.1.0" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="pages/dashboards/dashboard.html">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">Menú</span>
              </a>
              <div class="collapse show" id="navbar-dashboards">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="register.php" class="nav-link">Crear Usuarios</a>
                  </li>
                  <li class="nav-item">
                    <a href="dashboard.php" class="nav-link">Lista Usuario</a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php" class="nav-link">Salir</a>
                  </li>
                </ul>
              </div>
            </li>
          
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item dropdown">
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Bienvenido,</h6>
                </div>
                <div class="dropdown-divider"></div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Salir</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Modificaión de  usuarios</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                </ol>
              </nav>
            </div>
        
          </div>
          <!-- Card stats -->
      
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">

    <div class="container-fluid mt--6">
     
     <div class="card">
       <!-- Card header -->
       <div class="card-header border-0">
         <div class="row">
           <div class="col-6">
           </div>
           <div class="col-6 text-right">
            
           </div>
         </div>
       </div>
       <!-- Light table -->
    
       
           <?php 
              $id=$_REQUEST['id'];
              include("conect.php");
              $query=" SELECT * FROM users WHERE id='$id' ";
              $answer=$conexion->query($query);
              $row=$answer->fetch_assoc();
            ?>
        <form action ="change.php?id=<?php echo $row ['id'];?>" method="POST" style="
    padding-left: 4%;
    padding-right: 7%;
">
        <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input  class="form-control" type="text" REQUIRED name="username" placeholder ="Nombre" value="<?php echo $row['username']; ?>"/> <br/>
                     </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input  class="form-control" type="text" REQUIRED name="email" placeholder ="Correo" value="<?php echo $row['email']; ?>"/> <br/>
         
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input  class="form-control" type="text" REQUIRED name="phone" placeholder ="Telefono" value="<?php echo $row['phone']; ?>"/> <br/>
          

                  </div>
                </div>



                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input   class="form-control" type="text" REQUIRED name="password" placeholder ="Contraseña" value="<?php echo $row['password']; ?>"/> <br/>
                  </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="exampleFormControlSelect1">Perfil actual <?php echo $row['perfil']; ?></label>
                    <select class="form-control"  name="perfil">
                    <option selected="true" disabled="disabled" value=<?php echo $row['perfil']; ?>><?php echo $row['perfil']; ?></option>
                    <option value= 0> Usuario normal </option>
                    <option value = 1> Administrador </option>
                    </select>
                </div>



                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4"  name="reg_user" >Actualizar usuario</button>
                </div> 

     
        
       </div>
     </div>
    
    </div>
      <!-- Footer -->
      <footer class="footer pt-0">
       
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.1.0"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="assets/js/demo.min.js"></script>
</body>

</html>
