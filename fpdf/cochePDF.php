<?php
require('./fpdf.php'); // Incluye la librería FPDF

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Título principal
        $this->SetFont('Arial', 'B', 30);
        $this->Cell(0, 10, 'The University of Driving', 0, 1, 'C');
        $this->Ln(10);

        // Subtítulo
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 10, 'Detalles del Coche', 0, 1, 'C');
        $this->Ln(10);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 3 cm del final
        $this->SetY(-30);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Datos de contacto de la empresa
        $this->Cell(0, 10, 'Telefono: +34 123 456 789', 0, 1, 'C');
        $this->Cell(0, 10, 'Email: contacto@universityofdriving.com', 0, 1, 'C');
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Número de página
        $this->Cell(0, 10, 'Página ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    // Función para crear una tabla con los detalles del coche
    function CreateCarDetailsTable($data)
    {
        // Configurar la fuente
        $this->SetFont('Arial', '', 12);

        // Configurar el ancho de las columnas
        $w = array(50, 120); // Anchos de las columnas

        // Cabecera de la tabla
        $this->Cell($w[0], 10, 'Campo', 1, 0, 'C');
        $this->Cell($w[1], 10, 'Detalle', 1, 0, 'C');
        $this->Ln();

        // Filas de la tabla
        foreach ($data as $key => $value) {
            $this->Cell($w[0], 10, $key, 1);
            $this->Cell($w[1], 10, $value, 1);
            $this->Ln();
        }
    }
}

// Crear instancia de la clase
$pdf = new PDF();
$pdf->AliasNbPages();

// Añadir página
$pdf->AddPage();

// Incluir el archivo donde se define la variable $conexion
include("../PHP/modelo/conexion.php");

// Verificar si se recibió el parámetro id_coche en la URL
if (isset($_GET['id_coche'])) {
    // Obtener el ID del coche de la URL
    $id_coche = $_GET['id_coche'];

    // Consulta para obtener los detalles del coche con el ID proporcionado
    $instruccion = "SELECT c.id AS coche_id, concat('./img/foto', c.id, '.jpg') AS foto, c.nombre AS nombre_coche, 
    c.modelo, c.fecha_fabricacion AS fecha, c.matricula AS matricula, c.observaciones AS comentario, 
    c.precio, marca.nombre AS marca_nombre, tipocombustible.descripcion AS combustible, 
    c.potencia, distintivo.descripcion AS distintivo
    FROM coche c
    INNER JOIN marca ON c.marca = marca.id
    INNER JOIN tipocombustible ON c.id_combustible = tipocombustible.id
    INNER JOIN distintivo ON c.id_distintivo = distintivo.id
    WHERE c.id = $id_coche";

    $consulta = mysqli_query($conexion, $instruccion);

    if ($consulta === false) {
        echo "Error en la ejecución de la consulta: " . mysqli_error($conexion);
    }

    // Verificar si la consulta SQL devuelve resultados
    if ($consulta !== false && mysqli_num_rows($consulta) > 0) {
        // Obtener el primer resultado
        $resultado = mysqli_fetch_assoc($consulta);

        // Preparar los datos para la tabla
        $data = array(
            'REF' => $resultado['coche_id'],
            'Nombre' => $resultado['nombre_coche'],
            'Marca' => $resultado['marca_nombre'],
            'Modelo' => $resultado['modelo'],
            'Fecha Fabricacion' => $resultado['fecha'],
            'Matricula' => $resultado['matricula'],
            'Precio' => number_format($resultado['precio'], 0, '', '.') . ' euros',
            'Potencia' => $resultado['potencia'] . ' CV',
            'Combustible' => $resultado['combustible'],
            'Distintivo Ambiental' => $resultado['distintivo']
        );

        // Añadir observaciones si no están vacías
        if (!empty($resultado['comentario'])) {
            $data['Observaciones'] = $resultado['comentario'];
        }

        // Añadir la tabla de detalles del coche
        $pdf->CreateCarDetailsTable($data);
        $pdf->Ln(10);

        // Cambiar la fuente, el tamaño y centrar el texto "Imagen del Coche"
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetTextColor(0, 0, 0); // Negro es el color predeterminado, pero se puede especificar explícitamente
        $pdf->Cell(0, 20, 'Imagen del Coche', 0, 1, 'C');
        $pdf->Ln(5);

        // Añadir imagen del coche
        $pdf->Image($resultado['foto'], ($pdf->GetPageWidth() - 60) / 2, $pdf->GetY(), 60, 0, 'JPG');
    } else {
        $pdf->Cell(0, 10, 'No se encontraron detalles del coche.', 0, 1);
    }
} else {
    $pdf->Cell(0, 10, 'No se ha proporcionado un ID de coche válido.', 0, 1);
}

// Mostrar PDF
$pdf->Output();
?>