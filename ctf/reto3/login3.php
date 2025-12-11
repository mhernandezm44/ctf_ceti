<!DOCTYPE html>
<html>
    <head>
        <title>Login 3</title>
        <link rel="icon" type="image/x-icon" href="./favicon.ico">

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

        h1 {
            margin-bottom: 25px;
            font-size: 32px;
            color: #0ff;
            text-shadow: 0 0 10px #0ff;
        }

        /* --- FORM CONTENEDOR CON EFECTO FUTURISTA --- */
        form {
            width: 600px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 25px;
            position: relative;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.2);
            overflow: hidden;
        }

        /* Borde animado neon */
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

        /* Imagen */
        img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
            box-shadow: 0 0 12px rgba(0, 255, 255, 0.4);
        }

        p {
            font-weight: bold;
            color: rgb(0, 0, 0);
            text-shadow: 0 0 8px #0ff;
            text-align: center;
        }

        /* Input futurista */
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background: rgba(0, 255, 255, 0.1);
            border: 1px solid #0ff;
            border-radius: 6px;
            color: #0ff;
            font-size: 16px;
            text-shadow: 0 0 5px #0ff;
            outline: none;
            transition: 0.3s;
        }

        input[type="text"]:focus {
            box-shadow: 0 0 12px #0ff;
            background: rgba(0, 255, 255, 0.2);
        }
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background: rgba(0, 255, 255, 0.1);
            border: 1px solid #0ff;
            border-radius: 6px;
            color: #0ff;
            font-size: 16px;
            text-shadow: 0 0 5px #0ff;
            outline: none;
            transition: 0.3s;
        }

        input[type="password"]:focus {
            box-shadow: 0 0 12px #0ff;
            background: rgba(0, 255, 255, 0.2);
        }

        label {
            color: rgb(0, 0, 0);
            text-shadow: 0 0 6px #0ff;
            display: block;        /* Necesario para centrar */
            text-align: center;    /* Centra el texto */
            margin-top: 10px;
        }

        /* Botón futurista */
        button {
            width: 100%;
            padding: 12px;
            margin-top: 18px;
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
            transform: scale(1.03);
        }
    </style>
    </head>
    <body>
        <h1>Login 3</h1>
        <form action="./respuesta.php" method="POST">
            <label>Usuario:</label><br>
            <input type="text" name="usuario"><br><br>

            <label>Contraseña:</label><br>
            <input type="password" name="password"><br><br>

            <button type="submit">Iniciar sesión</button>
        </form>
    </body>
    <!-- A veces las cosas más pequeñas guardan secretos -->
</html>
