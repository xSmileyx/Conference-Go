<?php

$myconnection=mysql_connect('localhost','root','');
if (!$myconnection)
{

die('Could not connect '.mysql_error());
}

$selectdb=mysql_select_db('testing');
if (!$selectdb)
{
die('Database Not Found'.mysql_error());
}


?>