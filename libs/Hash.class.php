<?php

	require_once(PATH . DS . "Config" . DS . "pbkdf2.php"); //Password hashing. DO NOT REMOVE!
	class Hash extends Database {

		protected $_algo = HASHTYPE; //Hashing algorithm defined in configuration.php
		protected $_salt = null; // Generated salt
		protected $_rPass = null; //Return password

		public function __construct() {
			parent::__construct();
		}

		/*
		 * mkSalt()
		 * Generates a random number with the smallest allowed 476
		 * The random number is then md5 hashed with the return value from the time() function
		 */
		protected function _mkSalt() {
   			$this->_salt =  mt_rand(476, mt_getrandmax());
   			$this->_salt = md5(time() . $this->_salt);
		}

		/*
		 * mkPass()
		 * @param string $pass: user-entered password
		 * @param boolean $noSalt (optional): default is false; if true, the function doesn't generate a salt
		 * $this->mkSalt: Calls function mkSalt() to generate a random salt
		 * $this->_rPass: holds a hashed password from the PBKDF2 hashing function
		 */
		protected function _mkPass($pass, $noSalt = false) {
			if($noSalt) {
				$this->_rPass = pbkdf2($this->_algo, $pass, $this->_salt, 1000, 25, false);
			} else {
				$this->_mkSalt();
				$this->_rPass = pbkdf2($this->_algo, $pass, $this->_salt, 1000, 25, false);
			}
		}

		/*
		 * sys_hash()
		 * @param string $string: item to be hashed
		 * @param boolean $salt (optional): default is false- will create a hash; !false- the enter string will be used as a salt
		 */
		protected function sys_hash($string, $salt = false) {
			if(!$salt) {
				$salt = $this->_mkSalt();
				$hash = pbkdf2($this->_algo, $string, $salt, 1000, 25, false);
			} else {
				$hash = pbkdf2($this->_algo, $string, $salt, 1000, 25, false);
			}
		}

		/*
		 * addUser(): creates a salt, hashes password, and stores new user
		 * @param string $username: Username of the new user
		 * @param string $password: Plain-text password of the user (will be hashed)
		 * @param string $role (optional): default is "default"; Role of the user
		 */
		public function addUser($username, $password, $role = "default") {

			$this->_mkPass($password);

			$pass = $this->_rPass;
			$salt = $this->_salt;

			$sth = $this->prepare("INSERT INTO users(username, password, role, salt) VALUES(:username, :password, :role, :salt)");
			$sth->execute(array(
				":username" => $username,
				":password" => $pass,
				":role" => $role,
				":salt" => $salt
			));

		}//addUser FUNCTION


		/*
		 * checkLogin(): Checks to see if user-entered values produce a valid user in the users table
		 * @param string $username: User's username
		 * @param string $password: non-salted, non-hashed, plain-text password
		 * @return array $array: associative array containing true for the login (showing that the user is real) and the user's role
		 * @return boolean: returns false if the user or username/password combination is invalid
		 */
		public function checkLogin($username, $password){

			$sth = $this->prepare("SELECT password, role, salt FROM users WHERE username = :username");
			$sth->execute(array(
				":username" => $username
			));
			$values = $sth->fetch();

			$count = $sth->rowCount();
			if($count > 0) {

				$uPass = $values['password'];
				$this->_salt = $values['salt'];
				$uRole = $values['role'];

				$this->_mkPass($password, true);

				if($this->_rPass == $uPass) {
					$array = array(
						"login" => true,
						"role" => $uRole,
						"username" => $username
					);
					return $array;
				/*	Session::set('loggedIn', true);
					Session::set('role', $uRole);
					header("Location: /dashboard");		*/
				} else {
					return false;
				}//PASS CHECK IF

			} else {
				return false;
			} //COUNT IF
		}//FUNCTION

	}//CLASS