<?php
header("Cache-Control: max-age=0, no-cache, no-store, must-revalidate"); // HTTP/1.1
header("Expires: Wed, 11 Jan 1984 05:00:00 GMT"); // Date in the past
$name = file_get_contents("php://input");
if(isset($_POST)){
  echo"<strong>POST recieved</strong>";
}
else{
  echo"<p>post NOT recieved</p>";
}
$myFile="test.txt";
$cont=file_get_contents("test.txt");

  if(strpos($name,"del") ===false){
    $rem = array( '[' , ']' ,',', '"');
    $ram = array(" ");
    $newname=str_replace($rem,$ram,$name);
    file_put_contents("test.txt",$newname,FILE_APPEND | LOCK_EX);
}
  else{
    $fh = fopen($myFile, 'w+') or die("can't open file");
    $newname_=str_replace("del ","",$name);
    $write = str_replace($newname_,"",$cont);
    #$write_=str_replace(" ","",$write);
    $write=ltrim($write);
    fwrite($fh,$write);
    $cont='';
    fclose($fh);

}

?>
