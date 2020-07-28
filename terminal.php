<?php
// $cmd="echo password | vncviewer -autopass " .$ip;
// shell_exec($cmd);
// echo $cmd;

$ip = "192.168.43.240:5902";
$cmd = "\"C:/Program Files/RealVNC/VNC Viewer/vncviewer.exe\" $ip";
$c = shell_exec($cmd);
echo $cmd;

?>