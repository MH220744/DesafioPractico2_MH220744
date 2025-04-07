<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Academia de idiomas_MH220744(Asociativo)</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h1 class="mb-4">Academia de idiomas</h1>
    <?php

    function datos() {
        $matriz = array(
            "Básico" => array("Inglés" => 25, "Francés" => 10, "Mandarín" => 8, "Ruso" => 12, "Portugués" => 30, "Japonés" => 90),
            "Intermedio" => array("Inglés" => 15, "Francés" => 5, "Mandarín" => 4, "Ruso" => 8, "Portugués" => 15, "Japonés" => 25),
            "Avanzado" => array("Inglés" => 10, "Francés" => 2, "Mandarín" => 1, "Ruso" => 4, "Portugués" => 10, "Japonés" => 67)
        );
        return $matriz;
    }

    function crear_encabezado($matriz) {
        echo '<tr>';
        echo '<th>Nivel / Idioma</th>';

        $primera_fila = $matriz["Básico"];
        foreach ($primera_fila as $idioma => $valor) {
            echo "<th>$idioma</th>";
        }
        echo '</tr>';
    }

    function crear_filas($matriz) {
        foreach ($matriz as $nivel => $idiomas) {
            echo "<tr>";
            echo "<th>$nivel</th>";

            foreach ($idiomas as $idioma => $cantidad) {
                $texto = $cantidad . " alumnos";
                echo "<td>$texto</td>";
            }

            echo "</tr>";
        }
    }

    function ver_datos($matriz) {
        echo '<table class="table table-bordered table-hover">';
        echo '<thead class="table-dark">';
        crear_encabezado($matriz);  
        echo '</thead>';
        echo '<tbody>';
        crear_filas($matriz); 
        echo '</tbody>';
        echo '</table>';
    }

    $alumnos = datos(); 
    ver_datos($alumnos);

    ?>
  </div>
</body>
</html>
