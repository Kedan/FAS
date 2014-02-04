<html>
	<head>
		<title>Bangama Invitation!</title>
	</head>
	<body>
		<h1 style="color:#F00">This is only external mailer test! Do not use link below!</h1>
		<h2>Hello <?php echo $username; ?></h2>
		<p>
			This is your invitation link for new bangama game!<br>
			<a href="<?php echo $base_url;?>i:<?php echo $invitation_code; ?>"><?php echo $base_url;?>/i:<?php echo $invitation_code; ?></a>
		</p>
		<p>
			Good luck!
		</p>
	</body>	
</html>
