<?php
//including the database connection file

$databaseHost = 'localhost';
$databaseUsername = 'pi';
$databasePassword = 'raspberry';
$databaseName = 'proyectodellamadas';
 
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
$sql =  "SELECT * FROM users ORDER BY id DESC";
$result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistema de llamadas por voz ip">
  <meta name="author" content="8A_2">
  <title>Sistema de llamadas</title>
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
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container">
        <a class="navbar-brand" href="pages/dashboards/dashboard.html">
          <img src="assets/img/brand/">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="pages/dashboards/dashboard.html">
                  <img src="assets/img/brand/">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a href="register.php" class="nav-link">
                <span class="nav-link-inner--text">Crear usuario</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="dashboard.php" class="nav-link">
                <span class="nav-link-inner--text">Inicio</span>
              </a>
            </li>
           
          </ul>
          <hr class="d-lg-none" />
          
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Listado de usuarios</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">Nuevo usuario</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
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
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th></th>
              </tr>
            </thead>
            <tbody>

            <?php
		$i=0;
		while($row = mysqli_fetch_array($result)) {
		if($i%2==0)
		$classname="evenRow";
		else
		$classname="oddRow";
		?>
			<tr class="table-user">
				<td><?php echo $row["username"]; ?></td>
				<td><?php echo $row["email"]; ?></td>
				<td><?php echo $row["phone"]; ?></td>
				<td class="table-actions">
        <a href="update.php?id=<?php echo $row["id"]; ?>" class="link"><i class="fas fa-user-edit"></i>
        </a> 
         <a href="delete.php?id=<?php echo $row["id"]; ?>"  class="link"> <i class="fas fa-trash"></i>
        </a></td>
			</tr>
		<?php
		$i++;
		}
		?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
       
      </footer>
    </div>
  </div>
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.1.0"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="assets/js/demo.min.js"></script>
</body>

</html>
