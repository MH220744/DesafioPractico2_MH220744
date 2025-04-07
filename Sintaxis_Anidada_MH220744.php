<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Academia de idiomas_MH220744(Anidado)</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h1 class="mb-4">Academia de idiomas</h1>
    <?php

    function datos() {
        $matriz = array(
            array(25, 10, 8, 12, 30, 90),  
            array(15, 5, 4, 8, 15, 25),    
            array(10, 2, 1, 4, 10, 67)  
        );
        return $matriz;
    }

    function crear_encabezado($idiomas) {
        echo '<tr><th>Nivel / Idioma</th>';
        foreach ($idiomas as $idioma) {
            echo "<th>$idioma</th>";
        }
        echo '</tr>';
    }

    function crear_filas($matriz, $niveles) {
        for ($i = 0; $i < count($matriz); $i++) {
            echo "<tr>";
            echo "<th>" . $niveles[$i] . "</th>";
            for ($j = 0; $j < count($matriz[$i]); $j++) {
                echo "<td>" . $matriz[$i][$j] . " alumnos</td>";
            }
            echo "</tr>";
        }
    }

    function ver_datos($matriz, $niveles, $idiomas) {
        echo '<table class="table table-bordered table-hover">';
        echo '<thead class="table-dark">';
        crear_encabezado($idiomas); 
        echo '</thead>';
        echo '<tbody>';
        crear_filas($matriz, $niveles); 
        echo '</tbody>';
        echo '</table>';
    }

    $niveles = array("Básico", "Intermedio", "Avanzado");
    $idiomas = array("Inglés", "Francés", "Mandarín", "Ruso", "Portugués", "Japonés");

    $alumnos = datos();
    ver_datos($alumnos, $niveles, $idiomas);
    ?>
  </div>
</body>
</html>
