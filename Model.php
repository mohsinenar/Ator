<?php

class ApiAtor {
    private $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->ReflectionClass = new ReflectionClass($model);  

        $this->create();
    }

    public  function  create()
    {
        $this->GenerateApi();
        $this->GenerateMigration();
        $this->GenerateModel();
        $this->GenerateService();
        $this->GenerateRipository();
    }

    public function GenerateApi()
    {
        echo "\n api/".$this->ReflectionClass->getName();
    }

    
    public function GenerateMigration()
    {
        echo "\n GenerateMigration";
    }

    public function GenerateModel()
    {
        echo "\n GenerateModel";
    }

    public function GenerateService()
    {
        echo "\n GenerateService";
    }

    public function GenerateRipository()
    {
        echo "\n GenerateRipository";
    }


}

/**
 * Model base class
 */
class Model 
{

    public $columns = [];
    public $Config = [];
    public function __construct ()
    {
        $this->Integer("id",true);
    }

    public function string($name,$required=false)
    {
        $this->addColumn($name,"string",$required);
    }

    public function Float($name,$required=false)
    {
        $this->addColumn($name,"Float",$required);
    }

    public function Integer($name,$required=false)
    {
        $this->addColumn($name,"Integer",$required);
    }

    private function addColumn($name,$type,$required=false){
        $this->columns[] = array(
            "name"=>$name,
            "type"=>$type,
            "required"=>$required
        );
    }
}

class Car extends Model {
    public function __construct(){
        parent::__construct();
        $this->string("Car");
        $this->Float("me",true);
    }
}

$my_car = new ApiAtor(new Car);
$my_car->GenerateApi();

?>