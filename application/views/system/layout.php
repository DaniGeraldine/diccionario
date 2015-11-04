<!DOCTYPE html>
<html lang="en">
	<head>
		<?php if(isset($head)) echo $head;?>
	</head>
  	<body>
  		<?php if(isset($navbar)) echo $navbar; ?>
  		<div class="container">
	  		<?php if(isset($header)) echo $header; ?>
	  		<?php if(isset($content)) echo $content; ?>
	  		<?php if(isset($footer)) echo $footer; ?>
  		</div>
  	</body>
</html>