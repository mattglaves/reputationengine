<?php
$data = json_decode(file_get_contents('php://input'), true);
if ($data['type'] == 'webhook_event') {
	$myfile = fopen("/tmp/dump_output.txt", "w");
	//fwrite($myfile, "File ID:  " . $data['source']['id']."\n");
	//fwrite($myfile, "File Name:  " . $data['source']['name']."\n");
	//fwrite($myfile, "File Owner:  " . $data['source']['owned_by']['id']."\n");
	//fclose($myfile);
	$command = '/usr/bin/python3 /var/www/repengine/repengine.py '
		. $data['source']['id']
		. ' "'. $data['source']['name'] .'" '
		. $data['source']['owned_by']['id'];
	#fwrite($myfile, $command);
	#fclose($myfile);
	exec($command);

}
?>
