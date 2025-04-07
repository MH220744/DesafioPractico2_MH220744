<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Academia de idiomas_MH220744(Combinado)</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h1 class="mb-4">Academia de idiomas</h1>
    <?php

    function datos() {
        $matriz = array(
            "Básico" => array(25, 10, 8, 12, 30, 90),
            "Intermedio" => array(15, 5, 4, 8, 15, 25),
            "Avanzado" => array(10, 2, 1, 4, 10, 67)
        );
        return $matriz;
    }

    function crear_encabezados($idiomas) {
        echo '<thead class="table-dark"><tr>';
        echo '<th>Nivel / Idioma</th>';
        foreach ($idiomas as $idioma) {
            echo "<th>$idioma</th>";
        }
        echo '</tr></thead>';
    }

    function crear_filas($matriz, $niveles) {
        echo '<tbody>';
        foreach ($matriz as $nivel => $datos) {
            echo "<tr>";
            echo "<th>$nivel</th>";
            foreach ($datos as $cantidad) {
                echo "<td>$cantidad alumnos</td>";
            }
            echo "</tr>";
        }
        echo '</tbody>';
    }

    function ver_datos($matriz) {
        $idiomas = array("Inglés", "Francés", "Mandarín", "Ruso", "Portugués", "Japonés");
        $niveles = array("Básico", "Intermedio", "Avanzado");

        echo '<table class="table table-bordered table-hover">';
        crear_encabezados($idiomas);
        crear_filas($matriz, $niveles);
        echo '</table>';
    }
    $alumnos = datos();
    ver_datos($alumnos);
    ?>
  </div>
</body>
</html>
