<?php

	class query_master{

		private $error_handler;
		private $pdo_con;

		public function __construct($pdo){
			global $error_handler;
			$this->error_handler = $error_handler;
			$this->pdo_con = $pdo;
		}
		

		public function insert($table, $columns, $values){
			$param_count = count($columns);
			$value_count = count($values);

			if($param_count !== $value_count){
				$this->error_handler->logError('Table Insert', 'The number of arguments does not match the number of values given', TRUE);
			}

			// Insert the new user into the database 
			// TODO: Sanitize table name before including it to the query
			$query_keys = '';
			$query_values = '';
			foreach ($columns as $index => $col_name) {
				$separator = ($index+1 !== $param_count) ? "," : "" ; 
				$query_keys .= $col_name.$separator;
			}
			foreach ($values as $index => $col_value) {
				$separator = ($index+1 !== $param_count) ? "," : "" ; 
				$query_values .= "?".$separator;
			}

			$string_query = "INSERT INTO $table ($query_keys) VALUES ($query_values)";
			
			$insert_stmt = $this->pdo_con->prepare($string_query);

			foreach ($values as $key => $param) {

				$insert_stmt->bindValue( $key+1, $param);
			}

			if (! $insert_stmt->execute()) {
				$this->error_handler->logError('Insert error', 'There was a problem executing the query', TRUE);
				return FALSE;
			}
			$this->error_handler->logError('Success', 'Successfully inserted new row', TRUE);
			return TRUE;
		}

		public function update($table, $columns, $values, $condition){
			$param_count = count($columns);
			$value_count = count($values);

			if($param_count !== $value_count){
				$this->error_handler->logError('Table Insert', 'The number of arguments does not match the number of values given', TRUE);
				return FALSE;
			}
			$values_final = array_combine($columns, $values);
			// Insert the new user into the database 
			// TODO: Sanitize table name before including it to the query
			
			$compare = '';

			foreach ($values_final as $key => $value) {
				$compare .= "$key = '$value' , ";
			}

			$compare = rtrim($compare, ', ');
			$string_query = "UPDATE $table SET $compare WHERE $condition";

			$insert_stmt = $this->pdo_con->prepare($string_query);

			if (! $insert_stmt->execute()) {
				$this->error_handler->logError('Update error', 'There was a problem executing the query', TRUE);
				return FALSE;
			}
			$this->error_handler->logError('Success', 'Successfully updated row', TRUE);
			return TRUE;
		}

		public function removeRow($tableName, $id = array()){
			if (empty($id)) {
				$this->error_handler->logError('Delete error', 'No id selected', TRUE);
				return FALSE;
			}
			$local_array = json_decode($id);
			$param_count = count($local_array);

			file_put_contents(
								'/Users/maquilador8/Desktop/php.log', 
								var_export($param_count, true), 
								FILE_APPEND);
			file_put_contents(
								'/Users/maquilador8/Desktop/php.log', 
								var_export($local_array, true), 
								FILE_APPEND);
			$values = '';
			foreach ($local_array as $key => $value) {
				$separator = ($key+1 !== $param_count) ? "," : "" ; 
				$values .= "$value $separator";
			}
			file_put_contents(
								'/Users/maquilador8/Desktop/php.log', 
								var_export($values, true), 
								FILE_APPEND);
			$alter_statement = $this->pdo_con->prepare("DELETE FROM $tableName WHERE id IN ($values);");
			if($alter_statement->execute()){
				$this->error_handler->logError('Success', 'Successfully deleted selected row', TRUE);
				return TRUE;
			}
			$this->error_handler->logError('Delete error', 'Couldn\'t delete row', TRUE);
			return FALSE;
		}

		public function addColumn($tableName, $newColumn, $type = "VARCHAR(100)", $firstValue = ""){

			$alter_statement = $this->pdo_con->prepare("ALTER TABLE $tableName ADD $newColumn $type;");
			if($alter_statement->execute()){
				$this->error_handler->logError('Success', 'Successfully inserted new column', TRUE);
				return TRUE;
			}
			$this->error_handler->logError('Alter error', 'Couldn\'t add column', TRUE);
			return FALSE;
		}

		public function removeColumn($tableName, $removeColumn){

			$alter_statement = $this->pdo_con->prepare("ALTER TABLE $tableName DROP $removeColumn;");
			if($alter_statement->execute()){
				$this->error_handler->logError('Success', 'Successfully removed new column', TRUE);
				return TRUE;
			}
			$this->error_handler->logError('Alter error', 'Couldn\'t remove column', TRUE);
			return FALSE;
		}

		public function getTable($tableName, $filterCol = NULL, $filterValue = NULL){
			return;
		}


	}