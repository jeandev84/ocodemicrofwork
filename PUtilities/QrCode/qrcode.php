<?php
header('Content-Type: image/png');

use Endroid\QrCode\QrCode;

require_once __DIR__ . '/vendor/autoload.php';


if(isset($_GET['text']))
{
    $size =  isset($_GET['size']) ? (int) $_GET['size'] : 200;
    $padding = isset($_GET['padding']) ? $_GET['padding'] : 10;

    $qr = new QrCode();
    $qr->setText($_GET['text']);
    $qr->setSize($size);
    $qr->setPadding($padding);

    $qr->render();
}

/*
$qr = new QrCode();
$qr->setText('http://www.google.co.uk');
$qr->setSize(200);
$qr->setPadding(10);
*/
