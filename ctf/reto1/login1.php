<!DOCTYPE html>
<html>
    <head>
        <title>Login 1</title>

        <style>
            * {
                box-sizing: border-box;
            }

            body {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2;
                display: flex;
                flex-direction: column;       /* Para colocar el h1 encima del form */
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                text-align: center;
            }

            h1 {
                margin-bottom: 20px;
                font-size: 28px;
                color: #333;
            }

            form {
                background: white;
                padding: 25px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0,0,0,0.15);
                width: 300px;
            }

            label {
                font-weight: bold;
            }

            input[type="text"],
            input[type="password"] {
                width: 100%;
                padding: 8px;
                margin-top: 5px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            button {
                width: 100%;
                padding: 10px;
                margin-top: 15px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
            }

            button:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <body>
        <h1>Login 1</h1>
        <form action="./respuesta.php" method="POST">
            <label>Usuario:</label><br>
            <!-- Default: admin -->
            <input type="text" name="usuario"><br><br>

            <label>Contraseña:</label><br>
            <input type="password" name="password"><br><br>

            <button type="submit">Iniciar sesión</button>
        </form>
    </body>
    <!-- Pista:
    A veces, para encontrar lo que buscas,
    no debes entrar por la puerta... sino mirar el pasillo que la rodea.
    Prueba a observar la dirección sin su última pieza.
    -->

</html>
