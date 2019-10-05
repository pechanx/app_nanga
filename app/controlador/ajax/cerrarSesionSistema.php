<?php

require $_SERVER['DOCUMENT_ROOT'] . '/app/config/constantes.php';
session_start();
session_destroy();
echo '<script>location.href="' . BASE_URL . 'index.php"</script>';
exit();
