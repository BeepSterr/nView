<? 

	$debug = false;
	
	session_start();
	require('../pagebuilder.php');
	
	if(!isset($_SERVER[REQUEST_URI])){
		$nspace = ['default', 'home'];
	}else{
		
		$nspace = [];
		$url = $_SERVER[REQUEST_URI];
		
		//Test if the URL ends on a / if so remove it because i dont care about it.
		if(substr($url, -1) == "/"){ $url = substr($url, 0, -1); }

		$urs = explode( '/', $url);
		unset($urs[0]);

		if($urs[1] == ''){ $nspace = [ 'default', 'home' ]; }
		elseif($urs[1] != '' && $urs[2] == ''){ $nspace = [ 'default', $urs[1] ]; }
		elseif($urs[1] != '' && $urs[2] != ''){ $nspace = [ $urs[1] , implode('/', $urs)]; }
		
		
		new layoutBuilder($nspace[1], $nspace[0]);
		if($debug == true){ echo "<hr><b>Layout: </b>" . $nspace[0] . "<br><b>Page:</b> " . $nspace[1]; }
	}
	

 ?>