<?php
    function pdo_connect_mysql(){
        //details below are MySQL details
        $DATABASE_HOST = 'localhost';
        $DATABASE_USER = 'root';
        $DATABASE_PASS = '';
        $DATABASE_NAME = 'my_new_shopping_store';

        try {
            return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
        } catch (PDOException $exception) {
            //if there's an error with the connection, stop the script and display the error.
            exit('Failed to connect to database!');
        }
    }

?>
