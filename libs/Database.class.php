<?php

	class Database extends PDO {
		public function __construct() {
			parent::__construct(DBTYPE . ":host=" . DBHOST . ";dbname=" . DBNAME . ";", DBUSER, DBPASS);
		}

		/*
		 * select()
		 * @param array $params: Array containing parameters that should be selected - array('username', 'role')
		 * @param string $table: Table that should be used
		 * @param string $endSQL (optional): default is nothing; WHERE clauses and LIMITS, anything else you need
		 * @param string $fetchMode (optional): default is PDO::FETCH_ASSOC; PDO fetch mode
		 * @return: mixed
		 */
		public function select($params, $table, $endSQL = "", $fetchMode = PDO::FETCH_ASSOC) {
			if(empty($endSQL)){
				$keys = implode(', ', array_values($params));

				$sth = $this->prepare("SELECT $keys FROM $table");

				$sth->execute();
				return $sth->fetchAll($fetchMode);
			} else {
				$keys = implode(', ', array_values($params));

				$sth = $this->prepare("SELECT $keys FROM $table $endSQL");

				$sth->execute();
				return $sth->fetchAll($fetchMode);
			}
		}

		/*
		 * selectOne()
		 * @param array $params: Array containing parameters that should be selected - array('username', 'role')
		 * @param string $table: Table that should be used
		 * @param string $endSQL: WHERE clauses and LIMITS
		 * @return: mixed
		 */
		public function selectOne($params, $table, $endSQL) {
			$keys = implode(', ', array_values($params));

			$sth = $this->prepare("SELECT $keys FROM $table $endSQL");

			$sth->execute();
			return $sth->fetch();
		}

		/*
		 * insert()
		 * @param string $table: DB table that should be accessed
		 * @param array $data: Data to be entered into the table- associative array
		 */
		public function insert($table, $data) {

			ksort($data);

			$fieldNames = implode('`, `', array_keys($data));
			$fieldValues = ':' . implode(', :', array_keys($data));

			$sth = $this->prepare("INSERT INTO $table(`$fieldNames`) VALUES($fieldValues)");

			foreach($data as $key => $value) {
				$sth->bindValue(":$key", $value);
			}

			$sth->execute();
		}


		/*
		 * update()
		 * @param string $table: DB table that should be accessed
		 * @param array $data: Data to be entered into the table- associative array
		 * @param string $where: The WHERE clause of an UPDATE query
		 */
		public function update($table, $data, $where) {

			ksort($data);

			$fieldDetails = NULL;
			foreach($data as $key => $value){
				$fieldDetails .= "`$key`=:$key,";
			}
			$fieldDetails = rtrim($fieldDetails, ',');

			$sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
			foreach($data as $key => $value) {
				$sth->bindValue(":$key", $value);
			}
			$sth->execute();
		}

		/*
		 * delete(): deletes a row in a database
		 * @param string $table: the table to delete from
		 * @param string $where: the where clause of the query
		 * @param string $limit (optional): default is 1; limits the query from deleting more than a specified number or rows
		 */
		public function delete($table, $where, $limit = 1) {
			$sth = $this->prepare("DELETE FROM $table WHERE $where LIMIT $limit");
			$sth->execute();
		}

	}