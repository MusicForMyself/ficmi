<?php
require 'includes/db/the_query_master.class.php';
/**
 * Class: tableController
 * In charge of every operation with the tables module
 * @see routes
 */
class tableController{

	//TODO: Remove global $con object, pass it as a parameter to the constructor
	
	private $tableData;
	private $pdo_con;
	private $error_handler;
	private $my_mustache;

	function __construct(){

		global $con, $error_handler, $mustache;
		//Initialize local connection instance
		$this->pdo_con = $con;
		$this->error_handler = $error_handler;
		$this->my_mustache = $mustache;
	}

	/**
	 * Gets the data from the database to populate a table
	 * @param  String  $tableName The name of the table in the database we want to retrieve
	 * @param  array   $exclude   Columns to exclude from results
	 * @param  integer $offset    Offset number to paginate results
	 * @return self             Method returns itself for chaining purposes
	 */
	function populateFromDB($tableName, $exclude = array(), $offset = 0){

		//TODO: Validate and sanitize tableName
		$stmt = $this->pdo_con->prepare("SELECT * FROM $tableName LIMIT 15 OFFSET ?");
	 	$stmt->bindParam( 1, $offset, PDO::PARAM_INT, 12);

		if ($stmt->execute()) {

			$this->tableData = $stmt->fetchAll(PDO::FETCH_OBJ);
			foreach ($this->tableData as $object) {
				foreach ($exclude as $value) {
					unset($object->{$value});
				}
			}
			return $this;
		}else {

			$this->error_handler->logError("Table population", "Error executing query", true);
		}
		return false;

	}

	function getKeys(){
		if(!isset($this->tableData)){
			return FALSE;
		}
		$assoc_keys = array();
		$keys = array_keys((array)$this->tableData[0]);
		foreach ($keys as $key) {
			$assoc_keys[] = array("name" => $key );
		}
		return $assoc_keys;
	}

	function getEntries(){
		$entries = array();
		foreach ($this->tableData as $entry) {
			$entries[] = (array)$entry;
		}

		return $entries;
	}

	function column(){

		$queryMaster = new query_master($con);
		$queryMaster->addColumn('gb_contacts', $_GET['column']);
		return $this;
	}

	function dropColumn(){

		require 'includes/db/the_query_master.class.php';
		$queryMaster = new query_master($con);
		$queryMaster->removeColumn('gb_contacts', $_GET['remove']);
	}

	function insert(){

		$array_keys = array_keys($_POST);
		//$array_values = array_values($_POST);
		$queryMaster = new query_master($con);

		$array_values = array_values($_POST);
		unset($array_values[0]);
		$array_values = array_values($array_values);

		$queryMaster->insert("gb_contacts", $column_slugs, $array_values );

		return $this;
	}

	function delete(){

		require 'includes/db/the_query_master.class.php';
		$queryMaster = new query_master($con);
		$queryMaster->removeRow('gb_contacts', $_POST['delete']);
		return $this;
	}

	function update(){

		$update_id = $_POST['update'];
		unset($_POST['update']);
		$array_keys = array_keys($_POST);
		$array_values = array_values($_POST);
		
		$queryMaster = new query_master($con);
		
		$queryMaster->update("gb_contacts", $column_slugs, $array_values, "id = $update_id");
		return $this;
	}



	/**
	 * Renders de table template with the information fetched from the database
	 * 
	 */
	function render(){
		// file_put_contents(
		// 					'/Users/maquilador8/Desktop/php.log', 
		// 					var_export($this->tableData, true), 
		// 					FILE_APPEND);
		
		$keys = $this::getKeys();
		$entries = $this::getEntries();

		// file_put_contents(
		// 	'/Users/johnfalcon/Desktop/php.txt',
		// 	var_export( $entries, true ) . PHP_EOL,
		// 	FILE_APPEND
		// );
		// 
		$m = new Mustache_Engine(array(
			    'loader' => new Mustache_Loader_FilesystemLoader('includes/tables/')
			));
		$data = array("keys" => $keys, "data" => $entries);
		$table =  $m->render('table', $data);
		file_put_contents(
			'/Users/johnfalcon/Desktop/php.txt',
			var_export( $table, true ) . PHP_EOL,
			FILE_APPEND
		);
		echo $this->my_mustache->render('contacts', 
										array(	"title" => "Contactos de FICM" ), 
										array(
											"table"	=> $table
										));
	}


}