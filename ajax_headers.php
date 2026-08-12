<?php
$content = "This resource response is used to demonstrate getResponseHeader() calls.\n";
$etag = '"resource-' . md5($content) . '"';
$lastModified = gmdate('D, d M Y H:i:s') . ' GMT';

header('Content-Type: text/plain; charset=UTF-8');
header('Content-Length: ' . strlen($content));
header('Last-Modified: ' . $lastModified);
header('ETag: ' . $etag);
echo $content;
