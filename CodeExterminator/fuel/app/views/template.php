<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='http://fonts.googleapis.com/css?family=Lora|Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php echo Asset::css('bootstrap-responsive.css'); ?>
</head>
<div class="header-bar">
	<a href="/mdd0413/MDD/codeexterminator/public/entry"><img src="/mdd0413/MDD/CodeExterminator/public/assets/img/codeexter-logo.png" width="350" height="32" alt="logo"></a>
</div>
<body style="body { margin: 40px; }">
	<div class="container">
		<div class="span12">
			<?php echo $content; ?>
		</div>
	</div>
</body>
</html>
