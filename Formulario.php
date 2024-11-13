<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Alumnos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    *{
        font-family: "Poppins" sans-serif;
    }
    /* Cambiar el fondo de la página */
    body {
        background: url(https://th.bing.com/th/id/OIP.Ur0rR7-Bx0gz0tFxXB04PQHaDt?rs=1&pid=ImgDetMain) no-repeat center;
    }

    /* Formulario */
    .form-container {
        background-color: #ffffff;
        border-radius: 10px; /* Bordes redondeados */
        padding: 30px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Sombra sutil */
        max-width: 80%; /* Limitar el ancho máximo */
        margin: 0 auto; /* Centrar el formulario */
    }

    .form-container .form-floating input, 
    .form-container .form-floating select {
        font-size: 0.9rem;
    }

    /* Boton Volver*/
    .navbar-form{
        margin: 20px;
        border-radius: 16px;
    }

    .volver-button{
        background-color: #009970;
        color: #fff;
        font-size: 14px;
        padding: 8px 20px;
        border-radius: 50px;
        text-decoration: none;
        transition: 0.3s background-color;
    }

    .volver-button:hover{
        background-color: #00b383;
    }

    /* Boton Volver*/
    .enviar-boton{
    margin-top: 6%;
    }

    .enviar-button {
        background-color: #009970;
        color: #fff;
        font-size: 14px;
        padding: 15px 100px;
        text-decoration: none;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .enviar-button:hover {
        background-color: #00b383;
    }
    </style>
</head>
<body>
    
    <nav class="navbar-form navbar-expand-lg">
        <div class="container-fluid">
            <a href="index.php" class="volver-button">Volver</a>
        </div>
    </nav>
    
    <div class="form-container">
        <h2 class="text-center mb-4">Formulario de Inscripción</h2>
        <form>
            <div class="row">
                <!-- Columna 1 -->
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nombreApellido" placeholder="Nombre y Apellido">
                        <label for="nombreApellido">Nombre y Apellido</label>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="direccion" placeholder="Dirección">
                                <label for="direccion">Dirección</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="correo" placeholder="Correo electrónico">
                                <label for="correo">Correo</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" id="telefono" placeholder="Teléfono">
                        <label for="telefono">Teléfono</label>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="anoEgreso" placeholder="Año de egreso">
                                <label for="anoEgreso">Año de Egreso</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select" id="curso">
                                    <option value="">Seleccionar curso</option>
                                    <option value="curso1">Curso 1</option>
                                    <option value="curso2">Curso 2</option>
                                    <option value="curso3">Curso 3</option>
                                </select>
                                <label for="curso">Curso</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Columna 2 -->
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="tecnicatura">
                            <option value="">Seleccionar tecnicatura</option>
                            <option value="tecnicatura1">Tecnicatura 1</option>
                            <option value="tecnicatura2">Tecnicatura 2</option>
                            <option value="tecnicatura3">Tecnicatura 3</option>
                        </select>
                        <label for="tecnicatura">Tecnicatura</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" id="empresaPasantias">
                            <option value="">Seleccionar empresa</option>
                            <option value="empresa1">Empresa 1</option>
                            <option value="empresa2">Empresa 2</option>
                            <option value="empresa3">Empresa 3</option>
                        </select>
                        <label for="empresaPasantias">Empresa Pasantías</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" id="mentor">
                            <option value="">Seleccionar mentor</option>
                            <option value="mentor1">Mentor 1</option>
                            <option value="mentor2">Mentor 2</option>
                            <option value="mentor3">Mentor 3</option>
                        </select>
                        <label for="mentor">Mentor</label>
                    </div>

                    <div class="enviar-boton text-center mb-3">
                        <a href="indexx.php" class="enviar-button mt-4">Enviar</a>
                        <button class="navbar-toggler pe-0" type="submit" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>