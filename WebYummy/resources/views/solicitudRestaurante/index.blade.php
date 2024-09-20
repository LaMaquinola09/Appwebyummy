<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Restaurante</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        input[type=text],
        input[type=email],
        input[type=time],
        input[type=password],
        input[type=tel] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus,
        input[type=email]:focus,
        input[type=time]:focus,
        input[type=password]:focus,
        input[type=tel]:focus {
            background-color: #ddd;
            outline: none;
        }

        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        button:hover {
            opacity: 1;
        }

        .cancelbtn {
            padding: 14px 20px;
            background-color: #e11e00;
        }

        .signupbtn {
            padding: 14px 20px;
            background-color: #e18f00;
        }

        .cancelbtn,
        .signupbtn {
            float: left;
            width: 50%;
        }

        .container {
            padding: 16px;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        @media screen and (max-width: 300px) {
            .cancelbtn,
            .signupbtn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <form action="{{ route('solicitudes.store') }}" method="POST">
        @csrf
        <div class="container">
            <h1>Solicitud de Restaurante</h1>

            <p>Ingresa tus datos personales.</p>
            <hr>

            <!-- Datos para la tabla Users -->
            <label for="nombre"><b>Nombre</b></label>
            <input type="text" placeholder="Ingresa tu nombre" name="nombre" id="nombre" required>

            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Ingresa tu Email" name="email" id="email" required>

            <label for="direccion"><b>Dirección</b></label>
            <input type="text" placeholder="Ingresa tu dirección" name="direccion" id="direccion" required>

            <label for="telefono"><b>Teléfono</b></label>
            <input type="tel" placeholder="Ingresa tu número de teléfono" name="telefono" id="telefono" required>

            <label for="password"><b>Contraseña</b></label>
            <input type="password" placeholder="Ingresa tu contraseña" name="password" id="password" required>

            <label for="password_confirmation"><b>Repite la contraseña</b></label>
            <input type="password" placeholder="Repite la contraseña" name="password_confirmation" id="password_confirmation" required>

            <p>Ingresa los datos de tu negocio.</p>
            <hr>

            <label for="nombre_negocio"><b>Nombre del negocio</b></label>
            <input type="text" placeholder="Nombre del negocio" name="nombre_negocio" id="nombre_negocio" required>

            <label for="categoria"><b>Categoría de su negocio</b></label>
            <select name="categoria" id="categoria" required>
                <option value="pizza">Pizza</option>
                <option value="sushi">Sushi</option>
                <option value="pasteleria">Pastelería</option>
                <option value="cafe">Cafetería</option>
            </select>

            <label for="hora_apertura"><b>Horario de apertura</b></label>
            <input type="time" name="hora_apertura" id="hora_apertura" required>

            <label for="hora_cierre"><b>Horario de cierre</b></label>
            <input type="time" name="hora_cierre" id="hora_cierre" required>

            <div class="clearfix">
                <button type="button" class="cancelbtn">Cancelar</button>
                <button type="submit" class="signupbtn">Registrar</button>
            </div>
        </div>
    </form>

</body>

</html>
