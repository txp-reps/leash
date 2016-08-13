<?php

require('Service.php');
$service = new Service('config.json', getcwd() . '/..');
if ($service->valid_token($_GET['token'])) {
    if (isset($_GET['filename']) && file_exists($_GET['filename'])) {
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"" . basename($_GET['filename']) . "\"");
        readfile($_GET['filename']); // do the double-download-dance (dirty but worky)
    } else {
        echo 'wrong file';
    }
} else {
    echo 'invalid token';
}

?>
