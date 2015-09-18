<!DOCTYPE HTML>
<html>
<head>
	<!-- META TAGS -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title><?php echo $title_page?></title>
	
	<!-- CSS TAGS -->
	<link href="<?php echo base_url();?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<!-- Modal Trigger -->
  <a class="modal-trigger waves-effect waves-light btn" href="#modal1">Modal</a>

  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
    </div>
  </div>
<!-- JS TAGS -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-2.1.4.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.js"></script>
	<script>
		 $(document).ready(function(){
			// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
			$('.modal-trigger').leanModal();
		  });
		  
	</script>
</body>
</html>