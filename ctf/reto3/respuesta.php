<?php
    // Si el formulario fue enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $usuario = $_POST['usuario'] ?? '';
        $password = $_POST['password'] ?? '';

        // Usuario "correcto" también hardcodeado
        $usuarioCorrecto = "admin2";
        $hashGuardado = '$2y$10$JZJkGrYBarJspU1dysLWSOTzH..bW5u/RvAZgcLQ6hrXL6NdBx/GO';

        if ($usuario === $usuarioCorrecto && password_verify($password, $hashGuardado)) {
            // Login correcto
            echo "<h2>Login correcto. Bienvenido, " . htmlspecialchars($usuario) . "!</h2>";
            exit;
        } else {
            // Login incorrecto → redirigir a login1.php
            //echo password_hash($password, PASSWORD_DEFAULT);
            header("Location: ./login3.php");
            exit;
        }
    }
?>
