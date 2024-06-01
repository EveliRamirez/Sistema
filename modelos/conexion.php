<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=posclone",
			            "root",
			            "R4m1r3z20?");

		$link->exec("set names utf8");

		return $link;

	}

}