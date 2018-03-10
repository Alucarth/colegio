<?php
  session_start();
  session_destroy();
   $url="http://".$_SERVER["HTTP_HOST"]."/colegio/";
   header("Location:".$url."");
  exit(0);
?>