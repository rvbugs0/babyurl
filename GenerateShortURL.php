<?php
include_once("DatabaseConnection.php");

$myBaseURL="http://localhost";

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function generateUniqueLink()
{
$suffix=generateRandomString();
try
{
$c=DatabaseConnection::getConnection();
$ps=$c->prepare("select * from tbl_url_mapping where link_suffix = ?");
$ps->bindParam(1,$suffix);
$ps->execute();
$row=null;
$row=$ps->fetch(PDO::FETCH_ASSOC);
if($row)
{
$ps=null;
$c=null;
return null;
}
else
{
$ps=null;
$c=null;
return $suffix;
}

}
catch(Exception $exception)
{
return null;
}
}


if(isset($_POST["longLink"]))
{
$longUnformattedLink= $_POST["longLink"];
$longLink=str_replace("ampersand","&",$longUnformattedLink);
if(filter_var($longLink, FILTER_VALIDATE_URL)==FALSE)
{
print "{\"errorMessage\":\"Invalid url\",\"success\":false}";
}
else
{
try
{
$c=DatabaseConnection::getConnection();
$ps=$c->prepare("select * from tbl_url_mapping where long_link = ?");
$ps->bindParam(1,$longLink);
$ps->execute();
$row =null;
$row=$ps->fetch(PDO::FETCH_ASSOC);
$shortLink="";
$clickCount=0;
if($row)
{
$shortLink=$row["short_link"];
$clickCount=$row["click_count"];
}
else
{
$linkSuffix=null;
while(true)
{
$linkSuffix=generateUniqueLink();
if($linkSuffix)
{
break;
}
}
$shortLink=$myBaseURL."/".$linkSuffix;
$ps=$c->prepare("insert into tbl_url_mapping (long_link,short_link,link_suffix,click_count) values (?,?,?,0)");
$ps->bindParam(1,$longLink);
$ps->bindParam(2,$shortLink);
$ps->bindParam(3,$linkSuffix);
$ps->execute();

}
print "{\"shortLink\":\"$shortLink\",\"success\":true,\"click_count\":$clickCount}";
$ps=null;
$c=null;
}//try
catch(Exception $exception)
{
echo $exception->getMessage();
print "{\"errorMessage\":\"Server Error \",\"success\":false}";
$c=null;
}

} // else ends
}


//} //isset ends

?>
