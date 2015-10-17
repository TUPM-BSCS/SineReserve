<!DOCTYPE HTML>
<html>
	<head>
		<!-- META TAGS -->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title><?php echo $title_page?></title>
		
		<!-- CSS TAGS -->
		<link href="<?php echo base_url();?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		
		<style>
			main {
				padding-left: 260px;
				padding-right: 10%;
			}
			
			.side_nav{
				top: inherit;
			}
			
			.modal{
				max-height: 100%;
			}
			
			@media only screen and (max-width : 992px) {
				main {
					padding-left: 20px;
				}
			}
		</style>
	</head>
	<body>
		<div class="navbar-fixed">
			<nav>
				<div class="nav-wrapper container">
					<a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
					<a href="#!" class="brand-logo">Sinereserve</a>
					<ul class="right hide-on-med-and-down">
						<li><a href="sass.html">Log Out</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<ul id="slide-out" class="side-nav fixed side_nav">
			<li><a href="http://localhost/SineReserve/index.php/Admin_controller/branch">Branches</a></li>
			<li><a href="#!">Cinemas</a></li>
			<li><a href="#!">Movies</a></li>
			<li><a href="#!">Shows</a></li>
		</ul>
		<main>
			<h1> Branches </h1>
			<a class="waves-effect waves-light btn modal-trigger" id='addbtn_modal' href="#add-branch">Add</a>
			<a class="waves-effect waves-light btn modal-trigger" id='editbtn_modal' href="#edit-branch">Edit</a>
			<table class="responsive">
				<thead>
				  <tr>
					  <th data-field="id">Name</th>
					  <th data-field="name">Address</th>
				  </tr>
				</thead>
				<tbody>
				<?php foreach ($branch as $row): ?>
				  <tr>
					<td><?php echo $row->bran_name?></td>
					<td><?php echo $row->bran_address?></td>
				  </tr>
				<?php endforeach ?>
				</tbody>
			</table>			
			<!-- Modals -->
			
			<div id="add-branch" class="modal">
				<div class="modal-content">
				<form method="post" action="http://localhost/SineReserve/index.php/Admin_controller/add_branch">
					<div class='row'>
						<h4 class = 'col s12'>Add Branch</h4>
						<div class="input-field col s12">
							<input placeholder="Insert Name Here" id="add_branch_name" type="text" class="validate">
							<label for="add_branch_name">Branch Name</label>
						</div>
						<div class="input-field col s12">
							<input placeholder="Insert Address Here" id="add_branch_address" type="text" class="validate">
							<label for="add_branch_address">Branch Address</label>
						</div>
					</div>
				</div>
				<div class="modal-footer">
				 <button class="btn waves-effect waves-light signup-button" type="submit" name="action">Confirm</button>
				</div>
				</form>
			</div>
			<div id="edit-branch" class="modal">
				<div class="modal-content">
				<div class='row'>
					<h4 class = 'col s12'>Edit Branch</h4>
					<div class="input-field col s12">
						<input placeholder="Insert Name Here" id="edit_branch_name" type="text" class="validate">
						<label for="edit_branch_name">Branch Name</label>
					</div>
					<div class="input-field col s12">
						<input placeholder="Insert Address Here" id="edit_branch_address" type="text" class="validate">
						<label for="edit_branch_address">Branch Address</label>
					</div>
				</div>
				</div>
				<div class="modal-footer">
				  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Edit</a>
				</div>
			</div>
		</main>
		<!-- JS TAGS -->
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-2.1.4.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.js"></script>
		<script>
			$('.button-collapse').sideNav();
			$('.modal-trigger').leanModal();
			$('#addbtn_modal').click(function(){
				$('#add_branch_name').val('');
				$('#add_branch_address').val('');
			});
			$('#editbtn_modal').click(function(){
				$('#edit_branch_name').val('');
				$('#edit_branch_address').val('');
			});
		</script>
	</body>
</html>