<?php

session_start();

// Definir DIR como el directorio raíz
if (!defined('DIR')) {
    define('DIR', __DIR__);
}

include_once DIR . '/funcionamiento.php';

$errores = [];
if (isset($_SESSION['errores']) && !empty($_SESSION['errores'])) {
    $errores = $_SESSION['errores'];
    unset($_SESSION['errores']);
}

// Verificar que no hay errores para enviarlo
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['agregar_libro']) && empty($errores)) {
    header('Location: resultado.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca MH220744</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-dark">
    <div class="container mt-4 bg-white p-4 rounded shadow" style="max-width: 600px;">
        <h1 class="text-center mb-4">Biblioteca</h1>

        <?php if (!empty($errores)): ?>
            <div class="alert alert-danger">
                <?php foreach ($errores as $error): ?>
                    <p><?= htmlspecialchars($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Form para agregar libro -->
        <form action="Biblioteca_MH220744.php" method="POST">
            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" class="form-control bg-light text-dark" id="autor" name="autor" required>
            </div>
            <div class="form-group">
                <label for="tit">Título del libro:</label>
                <input type="text" class="form-control bg-light text-dark" id="tit" name="tit" required>
            </div>
            <div class="form-group">
                <label for="edit">Número de edición:</label>
                <input type="text" class="form-control bg-light text-dark" id="edit" name="edit" required>
            </div>
            <div class="form-group">
                <label for="lugar">Lugar de la publicación:</label>
                <input type="text" class="form-control bg-light text-dark" id="lugar" name="lugar" required>
            </div>
            <div class="form-group">
                <label for="editorial">Editorial:</label>
                <input type="text" class="form-control bg-light text-dark" id="editorial" name="editorial" required>
            </div>
            <div class="form-group">
                <label for="anio">(AÑO DE LA EDICIÓN):</label>
                <input type="text" class="form-control bg-light text-dark" id="anio" name="anio" required>
            </div>
            <div class="form-group">
                <label for="pag">Número de páginas:</label>
                <input type="number" class="form-control bg-light text-dark" id="pag" name="pag" required>
            </div>
            <div class="form-group">
                <label for="not">Notas:</label>
                <textarea class="form-control bg-light text-dark" id="not" name="not"></textarea>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" class="form-control bg-light text-dark" id="isbn" name="isbn" pattern="\d{13}" required>
                <small class="form-text text-muted">Formato: 13 dígitos</small>
            </div>
            <button type="submit" name="agregar_libro" class="btn btn-secondary btn-block">Agregar Libro</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
