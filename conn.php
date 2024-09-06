<?php
   $serverName='localhost';
   $userName='root';
   $password='';
   $dbname= 'customer';
   $conn =mysqli_connect($serverName, $userName, $password, $dbname);
   if(!$conn) {
       echo'Failed to connect';
   }
   // $sql="CREATE DATABASE customer";
   
