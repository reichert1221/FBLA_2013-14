<?php

	class Session {

		/*
		 * More information about Sessions: http://php.net/manual/en/book.session.php
		 *
		 * start()
		 * Starts/retrieves a session
		 */
		public static function start() {
			session_start();
		}

		/*
		 * set()
		 * @param string $key: name of the SESSION var
		 * @param string $value: value of the SESSION var
		 */
		public static function set($key, $value) {
			$_SESSION[$key] = $value;
		}

		/*
		 * get()
		 * @param string $key: name of the SESSION var to be returned
		 * @return: value of the SESSION var
		 */
		public static function get($key) {
			if(isset($_SESSION[$key])){
				return $_SESSION[$key];
			}
		}

		public static function change($key, $newVal) {
			$_SESSION[$key] = $newVal;
		}

		//Destroys/ends a session
		public static function destroy() {
			unset($_SESSION);
			session_destroy();
		}
	}