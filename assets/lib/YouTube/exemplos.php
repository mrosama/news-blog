<?php
	ini_set('display_errors',1);
	include "youtube_class.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Youtube Class</title>
</head>
<body>
<?php
	$obj = new youtube;
	$obj->url = "https://www.youtube.com/watch?v=8du9JOwbWMs&amp;feature=youtube_gdata_player";
	$obj->player("480","385");
	print '<br>**********************';
	print $obj->url2id();
	print '<br>';
	print $obj->url2id_("http://www.youtube.com/watch?v=TNMpa5yBf5o&feature=channel");
	print '<br>';
	print $obj->thumb_url("maior").'***path1';
	print '<br>';
	print $obj->thumb_url().'***path2';
	print '<br>';
	print $obj->thumb();
	print '<br>';
	print $obj->thumb("maior");
	print '<br>';
	$info = $obj->info();
	print $info["titulo"].'title*********************';
	print '<br>';
	print $info["descricao"];
	print '<br>';
	print $info["views"];
	print '<br>';
	print $info["tempo"];
	print '<br>';
	print $info["estrelas"];
	print '<br>';
	$busca = $obj->busca("alice wonders");
	foreach($busca as $campo => $valor)
	{
		foreach($valor as $campo2 => $valor2)
		{
			print $campo2.' = '.$valor2.'<br>';
		}
		print '--------------<br>';
	}
	
?>
</body>
</html>