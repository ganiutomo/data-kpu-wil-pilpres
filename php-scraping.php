<?php
function scrap($grandparent = 0, $parent = 0) {
	$script = 'pilpres2014.php';
	$host   = 'tps.kpu.go.id';
	$url    = 'http://'.$host;
	$qry    = $url.'/'.$script.'?cmd=select&grandparent='.$grandparent.'&parent='.$parent;

	$opt = array(
		'http' => array(
			"method" => "GET",
			"header" =>
				"Host: ".$host."\r\n".
				"Accept: text/html\r\n".
				"Accept-Language: en\r\n".
				"Referer: ".$url.'/'.$script."\r\n".
				"Cookie: gov2portal=cookie%5Bid%5D%3D; _ga=GA1.3.643454968.1403167841\r\n",
			"proxy" => "tcp://127.0.0.1:3128",
		),
	);

	$con = stream_context_create($opt);

	$raw = file_get_contents(
		$qry,
		false,
		$con
	);

	return $raw;
}


echo scrap();
