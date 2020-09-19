<?php
echo "";
?>
<!DOCTYPE html>
<html>
<head>
	<title>password validation</title>
</head>
<body>
	<form method="POST" action="<?php echo base_url('test/check')?>" class="">
		<input type="password" name="password" class="" autocomplete="off">
		<input type="submit" name="check" value="check">
	</form>

</body>
</html>