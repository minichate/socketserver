<?php
#
$address = "192.168.2.13";
$port = "2000";

$mysock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_bind($mysock, $address, $port);
socket_listen($mysock, 5);

// This server is a blocking server... it will handle requests in sequence, not in parallel
while (true) {
	$client = socket_accept($mysock);
	$input = socket_read($client, 1024);
	$output = "thanks for connecting, you wrote: ".$input."\r\n";
	socket_write($client, $output);
	socket_close($client);
}

socket_close($mysock);
?>