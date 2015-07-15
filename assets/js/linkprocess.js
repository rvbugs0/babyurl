var ax=null;
function getXMLHttpRequest()
{
    var abc=null;
    if(window.XMLHttpRequest)
    {
        abc=new XMLHttpRequest();
    }
    return abc;
}

function containsHttp(str) {
    if (str.indexOf("http") >= 0) {
return true;   
 } else {
      return false;
 }
}


function escapeRegExp(string) {
    return string.replace(/([.*+?^=!:${}()|\[\]\/\\])/g, "\\$1");
}

function replaceAll(string, find, replace) {
  return string.replace(new RegExp(escapeRegExp(find), 'g'), replace);
}




 function learnRegExp(s) {    
      var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
      return regexp.test(s);    
 }

function getShortLink()
{
var longLinkInput=document.getElementById("longLink");
var longLink=longLinkInput.value.trim();
if(longLink.length==0 )
{
var output=document.getElementById("shortLink");
output.innerHTML="";
output.innerHTML="no input provided";
return;
}

var valid=containsHttp(longLink);

if(valid==false)
{
longLink="http://"+longLink;
}

longLink=replaceAll(longLink,"&","ampersand");

ax=getXMLHttpRequest();
var qs="longLink="+encodeURI(longLink);
        ax.open('POST','GenerateShortURL.php',true);
        ax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ax.send(qs);
        ax.onreadystatechange=function()
{
if(ax.readyState===4 && ax.status===200)
{
var response=eval("("+ax.responseText+")");

if(response.success)
{
var link=response.shortLink;
var output=document.getElementById("shortLink");
output.innerHTML="";

output.innerHTML="<a href=\""+link+"\" target='_blank' >"+link+"</a> &nbsp;&gt;&nbsp; Clicks : "+response.click_count;
}
if(!response.success)
{
var output=document.getElementById("shortLink");
output.innerHTML="";
output.innerHTML=response.errorMessage;
}
}
};
}
