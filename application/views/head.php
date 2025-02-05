<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Incluye solo el JavaScript de Bootstrap para el modal -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .table-responsive-custom {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch; /* Para un desplazamiento suave en dispositivos táctiles */
        }

        .table-responsive-custom table {
            width: 100%; /* Asegura que la tabla ocupe el espacio disponible */
            min-width: 800px; /* Fija un ancho mínimo para tablas grandes */
        }

        /* Opcional: Ajustar las fuentes en pantallas pequeñas */
        @media (max-width: 576px) {
            .table-responsive-custom table {
                font-size: 0.75em; /* Reduce el tamaño de fuente */
            }
        }
        table img {
            max-width: 100%; /* Asegura que la imagen no exceda el contenedor */
            max-height: 175px; /* Establece un alto máximo para la imagen */
            object-fit: cover; /* Asegura que la imagen cubra el espacio sin deformarse */
            display: block; /* Bloque para que las imágenes se comporten correctamente */
            margin: auto; /* Centra la imagen dentro de la celda */
        }

        /* Ajustes para dispositivos móviles */
        @media (max-width: 576px) {
            table img {
                width: 100%; /* Hacer la imagen responsiva */
                height: 150px; /* Altura fija para mantener el recorte correcto */
                object-fit: cover; /* Asegura el recorte apropiado en pantallas pequeñas */
            }
        }
    </style>

</head>