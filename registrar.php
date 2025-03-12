<?php 

include("con_db.php"); 

if(isset($_POST['registrar'])) {
    if (strlen($_POST['nombre']) >= 1 && 
        strlen($_POST['apellido']) >= 1 &&
        strlen($_POST['telefono']) >= 1 &&
        strlen($_POST['correo']) >= 1 &&
        strlen($_POST['password']) >= 1 &&
        strlen($_POST['confirm-password']) >= 1) {

        // Validar el reCAPTCHA
        $recaptcha_secret = '';
        $recaptcha_response = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : '';

        if (empty($recaptcha_response)) {
            echo '<h3 class="bad"> Por favor completa el CAPTCHA.</h3>';
        } else {
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response");
            $response_keys = json_decode($response, true);

            if (intval($response_keys["success"]) !== 1) {
                echo '<h3 class="bad"> La verificación del CAPTCHA falló. Inténtalo nuevamente.</h3>';
            } else {
                // Campos del formulario
                $name = trim($_POST['nombre']);
                $apellido = trim($_POST['apellido']);
                $telefono = trim($_POST['telefono']);
                $ciudad = trim($_POST['ciudad']);
                $email = trim($_POST['correo']);
                $pass = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
                $pass2 = password_hash(trim($_POST['confirm-password']), PASSWORD_DEFAULT);
                $genero = trim($_POST['genero']);
                $pais = trim($_POST['pais']);

                // Consulta SQL
                $consulta = "INSERT INTO usuario(nombre, paterno, telefono, correo, genero, pais, ciudad, pass, pass2) VALUES ('$name','$apellido','$telefono','$email','$genero','$pais','$ciudad','$pass','$pass2')";
                $resultado = mysqli_query($conn, $consulta);
				header("Location: registro.php");
				exit();
            }
        }
    } 
}
?>
