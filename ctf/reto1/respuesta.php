<?php
// Si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

    // Usuario "correcto" hardcodeado
    $usuarioCorrecto = "admin";
    $hashGuardado = '$2y$10$M4L.ju8/jlUGtg9XaWjksOKloiSR3WySCBWTnexKfKEsbLqkSB4ee';

    if ($usuario === $usuarioCorrecto && password_verify($password, $hashGuardado)) {
        // Login correcto → redirigir directamente al Reto 2
        echo "<h2>Login correcto. Bienvenido, " . htmlspecialchars($usuario) . "!</h2>";
        echo '<form action="http://192.168.90.132:8082/login2.php" method="GET">
                   <button type="submit">Ir a Login 2</button>
                </form>';
        exit;
    } else {
        // Login incorrecto → volver a login1.php
        header("Location: ./login1.php");
        exit;
    }
}
?>
