<?php
require("DatabaseConnection.php");
ob_start(); // ensures anything dumped out will be caught

if(isset($_GET["shortLink"]))
{
$redirectURL=$_GET["shortLink"];
// clear out the output buffer

while (ob_get_status()) 
{
    ob_end_clean();
}
try
{
$c=DatabaseConnection::getConnection();
$ps=$c->prepare("select * from tbl_url_mapping where link_suffix= ? ");
$ps->bindParam(1,$redirectURL);
$ps->execute();
$row=null;
$row=$ps->fetch(PDO::FETCH_ASSOC);
if($row)
{
$link=$row["long_link"];
$ps2=$c->prepare("update tbl_url_mapping set click_count =? where link_suffix=?");
$count=$row["click_count"]+1;
$ps2->bindParam(1,$count);
$ps2->bindParam(2,$redirectURL);
$ps2->execute();
header( "Location: $link" );
}
else
{
echo "not found";
}
}
catch(Exception $e)
{
echo $e->getMessage();
}
}

// no redirect



?>
