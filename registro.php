<!DOCTYPE html>
<html lang="es">
<?php
    include("registrar.php");
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet"> <!-- Archivo CSS separado -->
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form method="post">
                <h2 class="text-center mb-4">Registro</h2>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" id="correo" name="correo" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <div class="password-container">
                        <input type="password" id="password" name="password" class="form-control" oninput="validatePassword()" required>
                    </div>
                    <div id="error-message" class="error"></div>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Repetir Contraseña:</label>
                    <div class="password-container">
                        <input type="password" id="confirm-password" name="confirm-password" class="form-control" oninput="validateConfirmPassword()" required>
                    </div>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="show-password" onclick="togglePassword()">
                    <label class="form-check-label" for="show-password">Mostrar Contraseñas</label>
                </div>
                <div class="form-group">
                    <label for="genero">Género:</label>
                    <select id="genero" name="genero" class="form-control" required>
                        <option value="">Selecciona tu género</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pais_id">País:</label>
                    <select id="pais_id"  name="pais" class="form-control" onchange="updateCities()" required>
                        <option value="">Selecciona tu país</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ciudad">Ciudad:</label>
                    <select id="ciudad" name="ciudad" class="form-control" required>
                        <option value="">Selecciona tu ciudad</option>
                    </select>
                </div>
                <div class="g-recaptcha" data-sitekey=""></div>

                <div class="btn-center">
                    <button type="submit" id="registrar" name="registrar" class="btn btn-primary btn-lg btn-lg-custom">Registrar</button>
                </div>
                <div class="btn-center mt-3">
                    <button type="button" class="btn btn-secondary btn-lg btn-lg-custom">Registrarse con Facebook</button>
                </div>
                <div class="btn-center mt-3">
                    <button type="button" class="btn btn-danger btn-lg btn-lg-custom">Registrarse con Gmail</button>
                </div>
                <div class="form-links">
                    <a href="#">¿Ya tienes una cuenta? Inicia sesión</a> | 
                    <a href="#">¿Olvidaste tu contraseña?</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="scripts/scripts.js"></script> <!-- Archivo JS separado -->
</body>
</html>
