<?php
$file = file_get_contents("print_queue.log");
$file = explode(" ", $file);
echo $file[5];
?>