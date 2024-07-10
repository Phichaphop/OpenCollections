<?php
require_once 'config.php';
if (isset($_GET['file']) && isset($_GET['project'])) {
    $fileName = basename($_GET['file']);
    $filePath = '../resource/doc/project/' . $fileName;
    if (!empty($fileName) && file_exists($filePath)) {
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        readfile($filePath);
        exit;
    } else {
        echo 'This file does not exist.';
        $_SESSION['error'] = "ไม่พบไฟล์";
        echo '<script>window.history.back();</script>';
    }
}
if (isset($_GET['file']) && isset($_GET['manual'])) {
    $fileName = basename($_GET['file']);
    $filePath = '../resource/doc/manual/' . $fileName;
    if (!empty($fileName) && file_exists($filePath)) {
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        readfile($filePath);
        exit;
    } else {
        echo 'This file does not exist.';
        $_SESSION['error'] = "ไม่พบไฟล์";
        echo '<script>window.history.back();</script>';
    }
}
