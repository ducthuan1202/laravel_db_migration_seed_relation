<?php

header('content-type: application/json');

$expired = time() + 60 * 60 * 24;
setcookie('_curl_role', 'admin', $expired, '/');

# httpOnly cookie
setcookie('_curl_permission', 'full', $expired, '/', '', false, true);

echo json_encode([
    'cookie' => $_COOKIE,
    'request' => $_REQUEST,
    'header' => getallheaders(),
    'server' => $_SERVER,
], JSON_PRETTY_PRINT);

exit();
