<?php
    // Si el formulario fue enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $usuario = $_POST['usuario'] ?? '';
        $password = $_POST['password'] ?? '';

        // Usuario "correcto" también hardcodeado
        $usuarioCorrecto = "userCeti";
        $hashGuardado = '$2y$10$ZmzJFTBBhiY.IjbQKD9peOBVyBYJfdPKjO/HeUVBAGNTEOyrF0kke';

        if ($usuario === $usuarioCorrecto && password_verify($password, $hashGuardado)) {
            // Login correcto
            echo "<h2>Login correcto. Bienvenido, " . htmlspecialchars($usuario) . "!</h2>";
            echo '<form action="http://192.168.90.132:8083/login3.php" method="GET">
                    <button type="submit">Ir a Login 3</button>
                </form>';
               
            exit;
        } else {
            // Login incorrecto → redirigir a login2.php
            
            header("Location: ./login2.php");
            exit;
        }
    }
?>