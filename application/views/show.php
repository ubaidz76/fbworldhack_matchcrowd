<html lang="en">
    <head>
        <link href="<?php echo base_url()."assets/js/jquery.bracket-5.css";?>" type="text/css" rel="stylesheet" />
        <script src="<?php echo base_url()."assets/js/jquery-1.7.1.min.js";?>" type="text/javascript"></script>
        <script src="<?php echo base_url()."assets/js/jquery.bracket-5.js";?>" type="text/javascript"></script>
		<script>
		var minimalData = {
			  teams : <?php echo $team; ?>,
			  results : <?php echo $skor; ?>
			}
		$(function() {
			$('#minimal').bracket({
			  init: minimalData /* data to initialize the bracket with */ })
		  })
		</script>
	</head>
	<body>
		<?php echo $team; ?>
		<?php echo $skor; ?>
		<div id=minimal>
		</div>
	</body>
</html>