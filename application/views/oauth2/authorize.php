<html>
	<head>
		<title></title>
	</head>
	<body>
		<h1>Authorization Required!</h1>
		<p><?=$user->username ?> Authorize to Client ID <?=$client->client_id ?></p>
		<form method="post" action="">
			<?php foreach ($auth_params as $k => $v): ?>
				<?php if ($v !== NULL): ?>
					<input type="hidden" name="<?php echo $k ?>" value="<?php echo $v ?>" />
				<?php endif; ?>
			<?php endforeach; ?>
			Do you authorize the app to do its thing?
			<p>
				<input type="submit" name="authorized" value="Yes" />
				<input type="submit" name="authorized" value="No" />
			</p>
		</form>
	</body>
</html>