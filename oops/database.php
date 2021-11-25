<?php 

class Database{
    //Define variable
    public $dbconnection;
    public $records;

    //fuction use to open connection with the database
    function openConnection(): bool{} 

    //this fuction can be used to fetch the record from database
    function fetchRecord($id):array{}

    //insert record
    function insertRecord($data): bool{} 

    //update the records
    function updateRecords($id,$data): bool{} 

    //delete the records
    function deleteRecords($id): bool{} 
}
?>