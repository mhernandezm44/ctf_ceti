<?php
// --- PROCESAR FORMULARIO ANTES DE ENVIAR NADA DE HTML ---
$mensajeCorrecto = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $codigo = $_POST['codigo'] ?? '';

    // Código correcto (hash)
    $hashGuardado = '$2a$12$sTjIUss.7IbiUCjdxzRlAOSC4mFOdQjCMN7JjWKlt11c8RFF7IGfS';

    if (password_verify($codigo, $hashGuardado)) {

        // Guardamos mensaje que se mostrará después en el HTML
        $mensajeCorrecto = "¡Código correcto. Enhorabuena!";

    } else {
        header("Location: ./login4.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Validación Futurista</title>

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

<?php if (!empty($mensajeCorrecto)): ?>
    <h2><?= $mensajeCorrecto ?></h2>
<?php endif; ?>

</body>
</html>
