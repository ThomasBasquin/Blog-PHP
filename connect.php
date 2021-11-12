<?php
    try { 
        $objPdo = new PDO ('mysql:host=devbdd.iutmetz.univ-lorraine.fr;port=3306;dbname=krebs47u_php' , 'krebs47u_appli' , 'jonas2010' );  
        
    }  catch( Exception $exception ) {  
        die($exception->getMessage()); 
    }
?>