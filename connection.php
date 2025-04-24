<?php
$db=new PDO('mysql:host=localhost; dbname=mypro_bbms', 'root',''); 
if ($db)
{
echo "Coonnect";
}
else
{
echo "Not Connect";
}
?>