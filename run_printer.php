<?php
// Query method
function query($query, $array) {
    // Try to establish connection to the database
    $dbh = new PDO("mysql:host=astudent5.mysql.domeneshop.no;dbname=astudent5;charset=utf8", "astudent5", "yJCXBaz3", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    // Get result from query
    $sth = $dbh->prepare($query);
    $sth->execute($array);
    $result = $sth->fetchAll();
    // Disconnect from database
    $dbh = null;
    // Return result
    return $result;
}

// Get all printable cards
$q = query("SELECT PrintQueue.idPrint, PrintQueue.filename, PrintQueue.addedOn FROM PrintQueue ORDER BY PrintQueue.addedOn", array(""));

foreach($q as $card){
    // print kortet (http://www.astudent.no/admin/cards/$filename)
    $filename = $card['filename'];
    $idprint = $card['idPrint'];

    file_put_contents($filename, fopen("https://www.astudent.no/admin/cards/".$filename, 'r'));
    //$printer_status = file_get_contents("printer_status.log"); // Henter printer status fra printerDetecter agenten. 
    $printer_status = 1;
    if($printer_status == 1) {
	exec('C:\xampp\htdocs\printer\exec_printer.bat '.$filename);
	file_put_contents("temp.log", fopen("https://www.astudent.no/admin/?printid=".$idprint, 'r'));
    }
}

?>