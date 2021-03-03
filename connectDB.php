<?php
	$mysqli = false;
	function connectDB(){
		global $mysqli;
		$mysqli = new mysqli("localhost","root","","mahara2004");
		//$mysqli->quary("SET NAMES 'utf8'");
	}
	function closeDB (){
		global $mysqli;
		$mysqli->close();
	}

	function getDataComment($selected){
		global $mysqli;
		connectDB();
		$result=NULL;
		$result = $mysqli->query("SELECT title, description,ctime FROM artefact WHERE title = 'comment' and description !=' ' and author = $selected ORDER BY ctime DESC");
		closeDB();
		return $result;
	}
	function getDataImg($selected){
		global $mysqli;
		connectDB();
		$result=NULL;
		$result = $mysqli->query("SELECT id,title,ctime FROM artefact WHERE (allowcomments = 1 OR parent = 11) and author = $selected ORDER BY ctime DESC");
		closeDB();
		return $result;
	}
	

?>