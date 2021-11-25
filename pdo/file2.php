<?php 

$host = 'localhost';
$db   = 'testdb';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

    try{
        $pdo=new PDO($dsn,$user,$pass,$options);
        $bonus=[
            123=>2,
            234=>3,
            345=>4,
        ];
        $stmt=$pdo->prepare('UPDATE person SET sal=sal+? where id=?');
        foreach($bonus as $key => $value)
        {
            $stmt->execute([$value,$key]);
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }
        echo json_encode($data['sal'],JSON_PRETTY_PRINT);
        //echo json_encode($data,JSON_PRETTY_PRINT);
        echo "Updated Successfully";
    }
    catch (PDOException $e)
    {
        throw new PDOException($e->getMessage(), (int)$e->getCode());

    }



?>