<!DOCTYPE html>
<html lang="tr">
<head>
	<?php
	$this->load->view('includes/head');
	$this->load->view("{$this->viewFolder}/{$subViewFolder}/page_style");

	?>
</head>

<body class="simple-page">


				<?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?>

</body>
</html>
