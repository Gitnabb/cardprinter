<?php
$ip = getHostByName(getHostName());
$status = 1;
error_log("trying to get: "."https://www.astudent.no/admin/?printerip=".$ip."&printerstatus=".$status);
file_get_contents("https://www.astudent.no/admin/?printerip=".$ip."&printerstatus=".$status);

?>