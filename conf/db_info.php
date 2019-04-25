<?php

require_once(dirname(__FILE__).'/../common/db_access.php');

/*
 * DBの接続情報を設定
 */
	// 設定内容を変数に格納
	$dbName = 'php_training_database';
	$host = '172.20.0.35';
	$port = '5432';
	$user = 'php_training_user';
	$password ='7890';

	// 定数を設定
	define('DSN', "pgsql:dbname=$dbName host=$host port=$port");
	define('DB_USER', $user);
	define('DB_PWD', $password);

?>