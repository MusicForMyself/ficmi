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
							
							<?php 
							$table = new tableController();
							$results = $table->populateTable("gb_contacts"); 

							//Exclude array
							$exclude = array("created", "other");?>
							
							<thead>
								<tr>
									<?php
									foreach ($results[0] as $index =>  $param) {
										if(!array_search($index, $exclude))
											echo "<th>".$index."</th>";
									}
									?>

								</tr>
							</thead>
							<tbody id="tableBody">

								<?php
								//Exclude array
								foreach ($results as $row) {
									echo '<tr>';
									foreach ($row as $cell_value) {
										echo "<th>".$cell_value."</th>";
									}
									echo '</tr>';
										
								}
								?>

							</tbody>
						</table>
					</div><!-- table-resposive -->

					<button id="add_row" type="button" class="btn btn-default btn-sm">
						<span class="glyphicon glyphicon-plus"></span> Add
					</button>
				</div><!-- container -->
			</div><!-- fluid -->
 
<?php include_once('footer.php'); ?>
