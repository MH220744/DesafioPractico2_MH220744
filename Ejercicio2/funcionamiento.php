<?php

// Clase Libro
class Libro {
    public $autor;
    public $tit;
    public $edit;
    public $lugar;
    public $editorial;
    public $anio;
    public $paginas;
    public $notas;
    public $isbn;

    public function __construct($autor, $tit, $edit, $lugar, $editorial, $anio, $paginas, $notas, $isbn) {
        $this->autor = $autor;
        $this->tit = $tit;
        $this->edit = $edit;
        $this->lugar = $lugar;
        $this->editorial = $editorial;
        $this->anio = $anio;
        $this->paginas = $paginas;
        $this->notas = $notas;
        $this->isbn = $isbn;
    }

    // Función para convertir el objeto a una cadena
    public function toString() {
        return implode('|', [
            $this->autor,
            $this->tit,
            $this->edit,
            $this->lugar,
            $this->editorial,
            $this->anio,
            $this->paginas,
            $this->notas,
            $this->isbn
        ]) . "\n";
    }
}

// Función para manejar errores
function M_error($errores) {
    session_start();
    $_SESSION['errores'] = $errores;
    header('Location: Biblioteca_MH220744.php');
    exit();
}

// Función para guardar el libro en un archivo de texto
function G_Libro($libro) {
    $archivo = 'libros.txt';
    file_put_contents($archivo, $libro->toString(), FILE_APPEND);
}

// Función para listar los libros desde el archivo de texto
function L_libros() {
    $archivo = 'libros.txt';
    $libros = file($archivo, FILE_IGNORE_NEW_LINES);
    $listado = [];
    foreach ($libros as $libro) {
        $datos = explode('|', $libro);
        $listado[] = new Libro(
            $datos[0],  
            $datos[1],  
            $datos[2],  
            $datos[3], 
            $datos[4],  
            $datos[5],  
            $datos[6],  
            $datos[7],  
            $datos[8]  
        );
    }
    return $listado;
}

// Función para validar los datos del formulario
function V_datos($data) {
    $errores = [];

    if (empty($data['autor']) || !preg_match('/^(VARIOS AUTORES|AUTORES VARIOS|([A-Za-zÑñÁáÉéÍíÓóÚúÜü\s,]+))$/', $data['autor'])) {
        $errores[] = "El autor es obligatorio y debe estar en el formato correcto.";
    }
    if (empty($data['tit']) || !preg_match('/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\s]+$/', $data['tit'])) {
        $errores[] = "El título es obligatorio y no debe estar entre comillas.";
    }
    if (empty($data['edit']) || !preg_match('/^[0-9]+$/', $data['edit'])) {
        $errores[] = "La edición debe ser un número válido.";
    }
    if (empty($data['lugar']) || !preg_match('/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$/', $data['lugar'])) {
        $errores[] = "El lugar de publicación es obligatorio y debe estar en el formato correcto.";
    }
    if (empty($data['editorial']) || !preg_match('/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$/', $data['editorial'])) {
        $errores[] = "La editorial es obligatoria y debe estar en el formato correcto.";
    }
    if (empty($data['anio']) || !preg_match('/^[0-9]{4}$/', $data['anio'])) {
        $errores[] = "El año de la edición debe ser un número de 4 dígitos.";
    }
    if (empty($data['pag']) || !preg_match('/^[0-9]+$/', $data['pag'])) {
        $errores[] = "El número de páginas debe ser un número válido.";
    }
    if (empty($data['isbn']) || !preg_match('/^[0-9\-]+$/', $data['isbn'])) {
        $errores[] = "El ISBN debe ser un número válido.";
    }

    return $errores;
}

// Validación de datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['agregar_libro'])) {
    // Validar los datos
    $errores = V_datos($_POST);

    if (!empty($errores)) {
        M_error($errores);
    } else {
        // Crear el libro usando la clase Libro
        $libro = new Libro(
            $_POST['autor'],
            $_POST['tit'],
            $_POST['edit'],
            $_POST['lugar'],
            $_POST['editorial'],
            $_POST['anio'],
            $_POST['pag'],
            $_POST['not'],
            $_POST['isbn']
        );
        G_Libro($libro);
    }
}
?>
