<?php 

header('Content->type: text/javascript');

class Person{
    public $id;
    public $name;
    public function __construct(array $data)
    {
        $this->id=$data['id'];
        $this->name=$data['name'];

    }
}

$person= new Person(array("id"=>1,"name"=>"Ayush"));

echo json_encode($person , JSON_PRETTY_PRINT);