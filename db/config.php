<?php
		$hostname="localhost";
		$dbname="softcodetest";
		$user="postgres";
		$password="postgres123";

  		$conn = pg_connect("host=localhost port=5432 dbname=softcodetest user=postgres password=postgres123")
      					or die ("Not able to connect to PostGres --> " . pg_last_error($conn));
?> 