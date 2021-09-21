<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$phone    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	
	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
		//echo 'Use Windows';
		$db = new mysqli("localhost", "root", "","proyectodellamadas");
		
	} else {
		//echo 'didnt Windows';
    	$db = new mysqli("localhost", "pi", "raspberry","proyectodellamadas");
    	
	}

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		
		
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$phone = mysqli_real_escape_string($db, $_POST['phone']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$typeUser = mysqli_real_escape_string ($db,$_POST['typeUser']);
		$ip = mysqli_real_escape_string ($db,'1.0.0.0');

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Usuario requerido"); }
		if (empty($email)) { array_push($errors, "Correo requerido"); }
		if (empty($phone)) { array_push($errors, "Telefono requerido"); }
		if (empty($password_1)) { array_push($errors, "Contraseña requerida"); }

		if ($password_1 != $password_2) {
			array_push($errors, "Las dos contraseñas no concuerdan");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			
			$password = ($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email,phone, password, perfil,ip) 
					  VALUES('$username', '$email','$phone', '$password','$typeUser','$ip')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "Has iniciado sesión";

		}   echo("Error description: " .$db -> error);

		
		header('location: dashboard.php');
	}

	// REGISTER USER
	if (isset($_POST['reg_cliuser'])) {

		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$phone = mysqli_real_escape_string($db, $_POST['phone']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$typeUser = mysqli_real_escape_string ($db,$_POST['typeUser']);
		$ip = mysqli_real_escape_string ($db,$_POST['ip']);
		
		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Usuario requerido"); }
		if (empty($email)) { array_push($errors, "Correo requerido"); }
		if (empty($phone)) { array_push($errors, "Telefono requerido"); }
		if (empty($password_1)) { array_push($errors, "Contraseña requerida"); }

		if ($password_1 != $password_2) {
			array_push($errors, "Las dos contraseñas no concuerdan");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			
			$password = ($password_1);//encrypt the password before saving in the database
			
			$query = "INSERT INTO users (username, email, phone, password, perfil, ip) 
					  VALUES('$username', '$email','$phone', '$password','$typeUser','$ip')";
			
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			//$_SESSION['id'] = $id;
			$_SESSION['success'] = "Has iniciado sesión";
			
			
			
		} 
		header ('location:index.php');

	}
	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, $db);
		}
		if (empty($password)) {
			array_push($errors, "Se requiere la contraseña");
		}

		if (count($errors) == 0) {
			$password = ($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);
			$row=$results->fetch_assoc();
		
			
			if (mysqli_num_rows($results) == 1) {
				$_SESSION['usuario'] = $row['username'];
				$_SESSION['id'] = $row['id'];
				$_SESSION['ip'] = $row['ip'];
				$_SESSION['success'] = "'¡Has iniciado sesión!'";
					if ($row['perfil'] == 1)
					{			
						//$localIP = getHostByName(getHostName());
				
						header ('location:dashboard.php');
						
					}
					else{
						header ('location:https://camiloflorezc.github.io/videollamadas/index.html');
						
					}
			}else {
				array_push($errors, "Usuario/Contraseña erroneos, intente de nuevo");
			}
		}
	}

?>
