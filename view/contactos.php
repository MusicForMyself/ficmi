<?php 
	include_once('gb_header.php');
	include_once('includes/tables/tableController.class.php');
?>
	
	<div class="container-fluid">

				<?php include_once('sidebar.php'); ?>

				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				
					<h1 class="page-header">Contactos</h1>

					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Nombre</th>
									<th>Apellidos</th>
									<th>Email</th>
									<th>Teléfono</th>
								</tr>
							</thead>
							<?php 
							$table = new tableController();
							$results = $table->populateTable("gb_contacts"); 
								file_put_contents(
													'/Users/maquilador8/Desktop/php.log', 
													var_export($results, true), 
													FILE_APPEND);
							?>
							<!-- <tbody>
								<tr>
									<td>1,001</td>
									<td>Lorem</td>
									<td>ipsum</td>
									<td>dolor</td>
									<td>sit</td>
								</tr>
								<tr>
									<td>1,002</td>
									<td>amet</td>
									<td>consectetur</td>
									<td>adipiscing</td>
									<td>elit</td>
								</tr>
								
							</tbody> -->
						</table>
					</div><!-- table-resposive -->

					<button id="add_row" type="button" class="btn btn-default btn-sm">
						<span class="glyphicon glyphicon-plus"></span> Add
					</button>
				</div><!-- container -->
			</div><!-- fluid -->
 
<?php include_once('footer.php'); ?>
