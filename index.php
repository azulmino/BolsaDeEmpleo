<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bolsa_empleo";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Inicializar variables
$nombre_apellido = $gmail = $telefono = $direccion = $empresa_pasantias = $anio_egreso = $tecnicatura_id = $curso_id = "";
$error = "";

// Procesar el formulario de "Bolsa de Empleo" cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit_formulario'])) {
        // Validar y asignar valores del formulario de bolsa de empleo
        $nombre_apellido = !empty($_POST['nombre_apellido']) ? $_POST['nombre_apellido'] : null;
        $gmail = !empty($_POST['gmail']) ? $_POST['gmail'] : null;
        $telefono = !empty($_POST['telefono']) ? $_POST['telefono'] : null;
        $direccion = !empty($_POST['direccion']) ? $_POST['direccion'] : null;
        $empresa_pasantias = !empty($_POST['empresa_pasantias']) ? $_POST['empresa_pasantias'] : null;
        $anio_egreso = !empty($_POST['anio_egreso']) ? $_POST['anio_egreso'] : null;
        $tecnicatura_id = !empty($_POST['tecnicatura_id']) ? $_POST['tecnicatura_id'] : null;
        $curso_id = !empty($_POST['curso_id']) ? $_POST['curso_id'] : null;

        // Verificar que todos los campos requeridos estén presentes
        if ($nombre_apellido && $gmail && $telefono && $direccion && $empresa_pasantias && $anio_egreso && $tecnicatura_id && $curso_id) {
            $sql = "INSERT INTO formulario (nombre_apellido, gmail, telefono, direccion, empresa_pasantias, anio_egreso, Tecnicatura_idTecnicatura, Curso_idCurso) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssii", $nombre_apellido, $gmail, $telefono, $direccion, $empresa_pasantias, $anio_egreso, $tecnicatura_id, $curso_id);
            
            if ($stmt->execute()) {
                echo "<p class='success'>Formulario enviado con éxito.</p>";
            } else {
                $error = "Error al enviar el formulario: " . $stmt->error;
            }
            
            $stmt->close();
        } else {
            $error = "Por favor, complete todos los campos del formulario.";
        }
    }
    
    // Procesar la adición de una nueva tecnicatura
    if (isset($_POST['submit_tecnicatura'])) {
        $nombre_tecnicatura = !empty($_POST['nombre_tecnicatura']) ? $_POST['nombre_tecnicatura'] : null;
        
        if ($nombre_tecnicatura) {
            $sql = "INSERT INTO tecnicatura (nombre) VALUES (?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $nombre_tecnicatura);
            
            if ($stmt->execute()) {
                echo "<p class='success'>Tecnicatura agregada con éxito.</p>";
            } else {
                $error = "Error al agregar la tecnicatura: " . $stmt->error;
            }
            
            $stmt->close();
        } else {
            $error = "Por favor, ingrese el nombre de la tecnicatura.";
        }
    }

    // Procesar la adición de un nuevo curso
    if (isset($_POST['submit_curso'])) {
        $anio_curso = !empty($_POST['anio_curso']) ? $_POST['anio_curso'] : null;
        $division_curso = !empty($_POST['division_curso']) ? $_POST['division_curso'] : null;
        
        if ($anio_curso && $division_curso) {
            $sql = "INSERT INTO curso (anio, division) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $anio_curso, $division_curso);
            
            if ($stmt->execute()) {
                echo "<p class='success'>Curso agregado con éxito.</p>";
            } else {
                $error = "Error al agregar el curso: " . $stmt->error;
            }
            
            $stmt->close();
        } else {
            $error = "Por favor, ingrese el año y la división del curso.";
        }
    }
}

// Obtener tecnicaturas
$sql_tecnicaturas = "SELECT * FROM tecnicatura";
$result_tecnicaturas = $conn->query($sql_tecnicaturas);

// Obtener cursos
$sql_cursos = "SELECT * FROM curso";
$result_cursos = $conn->query($sql_cursos);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Bolsa de Empleo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: grid;
            gap: 15px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .success {
            color: green;
            font-weight: bold;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Formulario de Bolsa de Empleo</h2>
        <?php
        if (!empty($error)) {
            echo "<p class='error'>$error</p>";
        }
        ?>
        
        <!-- Formulario Bolsa de Empleo -->
        <form method="POST" action="">
            <label for="nombre_apellido">Nombre y Apellido:</label>
            <input type="text" id="nombre_apellido" name="nombre_apellido" required value="<?php echo htmlspecialchars($nombre_apellido); ?>">

            <label for="gmail">Correo Electrónico:</label>
            <input type="email" id="gmail" name="gmail" required value="<?php echo htmlspecialchars($gmail); ?>">

            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required value="<?php echo htmlspecialchars($telefono); ?>">

            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required value="<?php echo htmlspecialchars($direccion); ?>">

            <label for="empresa_pasantias">Empresa de Pasantías:</label>
            <input type="text" id="empresa_pasantias" name="empresa_pasantias" required value="<?php echo htmlspecialchars($empresa_pasantias); ?>">

            <label for="anio_egreso">Año de Egreso:</label>
            <input type="date" id="anio_egreso" name="anio_egreso" required value="<?php echo htmlspecialchars($anio_egreso); ?>">

            <label for="tecnicatura_id">Tecnicatura:</label>
            <select id="tecnicatura_id" name="tecnicatura_id" required>
                <option value="">Seleccione una tecnicatura</option>
                <?php
                if ($result_tecnicaturas->num_rows > 0) {
                    while($row = $result_tecnicaturas->fetch_assoc()) {
                        $selected = ($tecnicatura_id == $row['idTecnicatura']) ? "selected" : "";
                        echo "<option value='".$row['idTecnicatura']."' $selected>".$row['nombre']."</option>";
                    }
                }
                ?>
            </select>

            <label for="curso_id">Curso:</label>
            <select id="curso_id" name="curso_id" required>
                <option value="">Seleccione un curso</option>
                <?php
                if ($result_cursos->num_rows > 0) {
                    while($row = $result_cursos->fetch_assoc()) {
                        $selected = ($curso_id == $row['idCurso']) ? "selected" : "";
                        echo "<option value='".$row['idCurso']."' $selected>".$row['anio']." - ".$row['division']."</option>";
                    }
                }
                ?>
            </select>

            <input type="submit" name="submit_formulario" value="Enviar Formulario">
        </form>

        
    </div>
    <h3>Agregar Nueva Tecnicatura</h3>
        <form method="POST" action="">
            <label for="nombre_tecnicatura">Nombre de la Tecnicatura:</label>
            <input type="text" id="nombre_tecnicatura" name="nombre_tecnicatura" required>

            <input type="submit" name="submit_tecnicatura" value="Agregar Tecnicatura">
        </form>

        <h3>Agregar Nuevo Curso</h3>
        <form method="POST" action="">
            <label for="anio_curso">Año:</label>
            <input type="text" id="anio_curso" name="anio_curso" required>

            <label for="division_curso">División:</label>
            <input type="text" id="division_curso" name="division_curso" required>

            <input type="submit" name="submit_curso" value="Agregar Curso">
        </form>
</body>
</html>

<?php
$conn->close();
?>
