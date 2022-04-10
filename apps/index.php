<?php

if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
    $uri = 'https://';
} else {
    $uri = 'http://';
}

echo $uri .= $_SERVER['HTTP_HOST'];
header('Location: ' . $uri . '/laundrymgt/apps/view/login.php');
//header('Location: ' . $uri . '/wastemgt/internal/view/website/index.html');
exit;
