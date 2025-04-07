<?php
session_start();

// Leer los libros desde el archivo de texto
$libros = [];
$archivo = 'libros.txt';

// Verificar si el archivo existe 
if (file_exists($archivo)) {
    $lineas = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    // Convertir a un array asociativo
    foreach ($lineas as $linea) {
        $datos = explode('|', $linea);  
        if (count($datos) == 9) {
            $libros[] = [
                'autor' => $datos[0],
                'titulo' => $datos[1],
                'edicion' => $datos[2],
                'lugar' => $datos[3],
                'editorial' => $datos[4],
                'anio' => $datos[5],
                'paginas' => $datos[6],
                'notas' => $datos[7],
                'isbn' => $datos[8]
            ];
        }
    }
}

// Verificar si se debe vaciar el archivo
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['vaciar_libros'])) {
    file_put_contents($archivo, '');
    header('Location: resultado.php'); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario_Biblioteca</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Libros Registrados</h1>

        <!-- Tabla de libros -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped shadow">
                <thead class="thead-dark">
                    <tr>
                        <th>Autor</th>
                        <th>Título</th>
                        <th>Edición</th>
                        <th>Lugar de Publicación</th>
                        <th>Editorial</th>
                        <th>Año de la Edición</th>
                        <th>Número de Páginas</th>
                        <th>Notas</th>
                        <th>ISBN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($libros)) {
                        foreach ($libros as $libro) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($libro['autor']) . "</td>";
                            echo "<td>" . htmlspecialchars($libro['titulo']) . "</td>";
                            echo "<td>" . htmlspecialchars($libro['edicion']) . "</td>";
                            echo "<td>" . htmlspecialchars($libro['lugar']) . "</td>";
                            echo "<td>" . htmlspecialchars($libro['editorial']) . "</td>";
                            echo "<td>(" . htmlspecialchars($libro['anio']) . ")</td>"; 
                            echo "<td>" . htmlspecialchars($libro['paginas']) . "</td>";
                            echo "<td>" . htmlspecialchars($libro['notas']) . "</td>";
                            echo "<td>" . htmlspecialchars($libro['isbn']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9' class='text-center'>No hay libros registrados</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Botones -->
        <div class="text-center mt-4">
            <div class="d-flex flex-column align-items-center">
                <!-- Botón Agregar Nuevo Libro -->
                <form action="Biblioteca_MH220744.php" method="get" class="mb-3">
                    <button type="submit" class="btn btn-primary btn-lg">Agregar Nuevo Libro</button>
                </form>

                <form action="resultado.php" method="POST">
                    <button type="submit" name="vaciar_libros" class="btn btn-danger btn-lg">Vaciar la tabla</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
