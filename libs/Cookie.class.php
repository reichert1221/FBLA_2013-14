<?php

	class Cookie {

		/*
		 * bakeCookie() : set a cookie
		 * @param string $name: name of the cookie
		 * @param string $value (optional): default is null; value the cookie holds
		 * @param string $expire (optional): default is null; when the cookie expires
		 * @param string $path (optional): default is "/"; where the cookie will be available
		 * @param string $domain (optional): default is null; domain the cookie is available to
		 * @param boolean $secure (optional): default is false; cookie should be transfered over HTTPS ONLY
		 * @param boolean $httpOnly (optional): default is false; cookie is accessible ONLY through HTTP protocol
		 *
		 * More information on setting cookies: http://php.net/manual/en/function.setcookie.php
		 */
		public static function bakeCookie($name, $value = null, $expire = null, $path = "/", $domain = null, $secure = false, $httpOnly = false) {
			setcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
		}

		/*
		 * get()
		 * @param string $key: name of cookie to be returned
		 * @return: value of cookie
		 */
		public static function get($key) {
			if(isset($_COOKIE[$key])){
				return $_COOKIE[$key];
			}
		}
		/*
		 * change()
		 * @param string $key: name of cookie
		 * @param string $newVal: new value for cookie
		 */
		public static function change($key, $newVal) {
			$_COOKIE[$key] = $newVal;
		}

		/*
		 * delete()
		 * @param string $key: name of cookie to be deleted
		 */
		public static function delete($key) {
			setcookie($key, null, time()-3600);
		}
	}
