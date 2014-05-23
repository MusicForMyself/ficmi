<?php 
	include_once('gb_header.php');
	include_once('includes/tables/tableController.class.php');
?>
	
	<div class="container-fluid">

				<?php include_once('sidebar.php'); ?>

				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				
					<h1 class="page-header">Contactos</h1>

					<div class="table-responsive">
						<form id="new_column_form" class="inline-form hidden">
							<input type="text" name="column" placeholder="Nombre de la columna">
						</form>

						<button id="add_col" type="button" class="btn btn-default btn-sm pull-right">
							<span class="glyphicon glyphicon-plus"></span> Column
						</button>
						<button id="done_adding_col" type="button" class="btn btn-default btn-sm pull-right hidden done-btn" >
							<span class="glyphicon glyphicon-ok"></span> Done
						</button>

						<table class="table table-striped">
							
						<?php 
							$table = new tableController();
							// $results = $table->populateFromDB("gb_contacts"); 

							//Exclude array
							$exclude = array("created", "other");

							$results = $table->populateFromDB("gb_contacts", $exclude)->render(); 
						?>
							
							<thead>
								<tr>
									<?php

									global $column_slugs;
									$indexUnique = TRUE;
									echo "<th class='check'><input type='checkbox' class='disabled' value='select_all'></th>";
									foreach ($results[0] as $index =>  $param) {

										if(!in_array($index, $exclude)){

											$column_slugs[] = $index;
											$removeBtn = (!$indexUnique) ? "<a class='fill-anchor' href='?remove=".$index."'><span class='remove_col glyphicon glyphicon-remove glyph-absolute' ></span></a>" : "";
											echo "<th>".$index.$removeBtn."</th>";
											$indexUnique = FALSE;
										}
									}
									unset($column_slugs[array_search("id", $column_slugs)]);
									$column_slugs = array_values($column_slugs);
									?>

								</tr>
							</thead>
							<tbody id="tableBody">

								<?php
								//TODO: Be able to pass different unique identifier
								//Exclude array
								foreach ($results as $row) {
									echo '<tr>';
										
										echo "<th class='check'><input type='checkbox' data-delete='$row->id' value='select_single'></th>";
									foreach ($row as $index => $cell_value) {
										if(!in_array($index, $exclude)){

											$class = ($index == 'id') ? 'unique' : '';
											$save = ($index == 'id') ? "<span data-update='$cell_value' class='save-absolute glyphicon glyphicon-floppy-disk hidden'></span>" : "";
											echo "<th class='$class'>".$save.$cell_value."</th>";
										}
										echo "<span data-update='$cell_value' class='save-absolute glyphicon glyphicon-floppy-disk hidden'></span>";
									}
									echo '</tr>';
										
								}
								?>

							</tbody>
						</table>
					</div><!-- table-resposive -->

					<form id="insert_row_form" method="POST" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" class="hidden">
						<!-- Inputs will be appended here -->
					</form>

					<form id="update_row_form" method="POST" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" class="hidden">
						<!-- Inputs will be appended here -->
						<input id="update_id" name="update" type="text" value="">
					</form>

					<form id="delete_row_form" class="hidden">
						<!-- Inputs will be appended here -->
						<input id="delete_id" name="delete" type="text" value="">
					</form>

					<?php

						global $con;
		
						// TODO: sacar esta lógica del view cuando se integre handlebars
						if($_SERVER['REQUEST_METHOD']=='POST')
						{
							require 'includes/db/the_query_master.class.php';
							if(isset($_POST['update'])){
								//UPDATE ALREADY MOVED
							}
							$array_keys = array_keys($_POST);
							//$array_values = array_values($_POST);
							$queryMaster = new query_master($con);

							$array_values = array_values($_POST);
							unset($array_values[0]);
							$array_values = array_values($array_values);
							

							$queryMaster->insert("gb_contacts", $column_slugs, $array_values );

							//TODO: this mehod fucks up the error_reporter
							header("Location: {$_SERVER['REDIRECT_URL']}");
						}

						if(isset($_GET['column'])){
							require 'includes/db/the_query_master.class.php';
							$queryMaster = new query_master($con);
							$queryMaster->addColumn('gb_contacts', $_GET['column']);

							//TODO: this mehod fucks up the error_reporter
							header("Location: {$_SERVER['REDIRECT_URL']}");
						}

						if(isset($_GET['remove'])){
							require 'includes/db/the_query_master.class.php';
							$queryMaster = new query_master($con);
							$queryMaster->removeColumn('gb_contacts', $_GET['remove']);
							
							//TODO: this mehod fucks up the error_reporter
							header("Location: {$_SERVER['REDIRECT_URL']}");
						}

						if(isset($_GET['delete'])){
							require 'includes/db/the_query_master.class.php';
							$queryMaster = new query_master($con);
							$queryMaster->removeRow('gb_contacts', $_GET['delete']);
							
							//TODO: this mehod fucks up the error_reporter
							header("Location: {$_SERVER['REDIRECT_URL']}");
						}
					?>

					<button id="add_row" type="button" class="btn btn-default btn-sm">
						<span class="glyphicon glyphicon-plus"></span> Add
					</button>

					<button id="done_adding" type="button" class="btn btn-default btn-sm hidden done-btn">
						<span class="glyphicon glyphicon-ok"></span> Done
					</button>

					<button id="delete_row" type="button" class="btn btn-default btn-sm rm-btn">
						<span class="glyphicon glyphicon-remove"></span> Delete
					</button>
				</div><!-- container -->
			</div><!-- fluid -->
 
<?php include_once('footer.php'); ?>
