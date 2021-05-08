<?php

if (isset($rutas[0]) && isset($rutas[2]) && $rutas[2] == 'kerdex-fichas') {
    require_once 'app/view/kardex-fichas.php';
} elseif (isset($rutas[0]) && isset($rutas[2]) && $rutas[2] == 'kerdex-pagos') {
    require_once 'app/view/kardex-pagos.php';
} elseif (isset($rutas[0]) && isset($rutas[2]) && $rutas[2] == 'subir-documentos') {
    require_once 'app/view/subir-documentos.php';
} else{
    require_once 'app/view/ver-documentos.php';
}
