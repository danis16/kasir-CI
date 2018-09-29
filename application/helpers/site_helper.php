<?php 

function bCrypt($pass,$cost)
{
	$chars='./QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890';

	$salt=sprintf('$2a$%02d$',$cost);

	mt_srand();

	for ($i=0; $i<22  ; $i++) { 
		$salt.=$chars[mt_rand(0,63)];
		# code...
	}

	return crypt($pass,$salt);
	# code...
}

 ?>