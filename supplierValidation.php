<?php
$config = parse_ini_file("config.ini", true);
header($config['Headers']['ContentType']);
http_response_code($config['Headers']['HttpResponseCode']);
$error = array();
$count = 0;
foreach ($config['Errors'] as $errorFromConfig) {
	$splitError = explode(",", $errorFromConfig);
	$error[$count] = array('field' => $splitError[0], 'message' => $splitError[1],'classification' => $splitError[2],'path' => $splitError[3]);
	$count++;
}
/*$data = array('message' => $config['Response']['Message'], 'errors' => $error);*/
$data = array('message' => $config['Response']['Message']);
echo json_encode($data);
?>