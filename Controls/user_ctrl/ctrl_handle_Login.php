<?php
session_start();
require_once("../../Models/clsDatabase.php");
require_once("../../Models/clsUser.php");
$clsUser= new clsUser();
$userName=$_REQUEST["userName"];
$userPassword=$_REQUEST["userPassword"];


if($clsUser->checkAccount($userName,$userPassword)==true){
   $_SESSION["logined"]=true;// dang nhap thanh cong
  $_SESSION["user"]["id"]= $clsUser->getUserId($userName);
  $olderUrl=$_SERVER["HTTP_REFERER"];
  if($olderUrl=="http://localhost:8080/project2/login.php" || $olderUrl=="http://localhost:8080/project2/login.php?loginFalse=1")
  header("Location:http://localhost:8080/project2/index.php");// quay tro lai trang home
  else if($olderUrl=="http://localhost:8080/project2/checkout.php?loginFalse=1"||$olderUrl=="http://localhost:8080/project2/checkout.php"){
   header("Location:http://localhost:8080/project2/checkout.php ");
  }


}
else{
   $_SESSION["logined"]=false;
    $olderUrl=$_SERVER["HTTP_REFERER"];
    if($olderUrl=="http://localhost:8080/project2/login.php?loginFalse=1"||$olderUrl=="http://localhost:8080/project2/login.php")
    header("Location: http://localhost:8080/project2/login.php?loginFalse=1");
    else if($olderUrl=="http://localhost:8080/project2/checkout.php?loginFalse=1"||$olderUrl=="http://localhost:8080/project2/checkout.php"){
      header("Location:http://localhost:8080/project2/checkout.php?loginFalse=1 ");
    }
}
?>