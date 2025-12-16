<?php
// --- PROCESAR LOGIN ANTES DE ENVIAR HTML ---
$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

    // Usuario correcto
    $usuarioCorrecto = "admin2";
    $hashGuardado = '$2y$10$JZJkGrYBarJspU1dysLWSOTzH..bW5u/RvAZgcLQ6hrXL6NdBx/GO';

    if ($usuario === $usuarioCorrecto && password_verify($password, $hashGuardado)) {
        $mensaje = "Login correcto. Bienvenido, " . htmlspecialchars($usuario) . "!";
    } else {
        header("Location: ./login3.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Login Futurista</title>

<style>
@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap');

* {
    box-sizing: border-box;
}
body {
    font-family: 'Orbitron', sans-serif;
    background: radial-gradient(circle at center, #2a1f4f 0%, #0c0918 100%);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    color: #0ff;
}
h2 {
    font-size: 28px;
    color: #0ff;
    text-shadow: 0 0 12px #00ffff;
    margin-bottom: 20px;
    background: rgba(255, 255, 255, 0.05);
    padding: 15px 25px;
    border-radius: 10px;
    backdrop-filter: blur(8px);
    box-shadow: 0 0 18px rgba(0, 255, 255, 0.25);
    border: 1px solid rgba(0, 255, 255, 0.3);
}
form {
    width: 350px;
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    border-radius: 12px;
    padding: 25px;
    position: relative;
    box-shadow: 0 0 20px rgba(0, 255, 255, 0.2);
    overflow: hidden;
}
form::before {
    content: "";
    position: absolute;
    top: -2px;
    left: -2px;
    right: -2px;
    bottom: -2px;
    background: linear-gradient(
        45deg,
        #00ffff,
        #0066ff,
        #00ffff,
        #0066ff
    );
    z-index: -1;
    background-size: 300% 300%;
    animation: neonBorder 6s ease infinite;
    border-radius: 12px;
}
@keyframes neonBorder {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}
button {
    width: 100%;
    padding: 12px;
    background: #00ffff;
    border: none;
    color: #000;
    font-size: 18px;
    font-weight: bold;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.3s;
    box-shadow: 0 0 15px #00ffff;
}
button:hover {
    background: #00e5e5;
    box-shadow: 0 0 25px #00ffff;
    transform: scale(1.05);
}
</style>
</head>

<body>

<?php if (!empty($mensaje)): ?>
    <h2><?= $mensaje ?></h2>

    <form action="http://192.168.90.132:8084/login4.php" method="GET">
        <button type="submit">Ir a Login 4</button>
    </form>
<?php endif; ?>

</body>
</html>
