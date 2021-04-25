<?php
header("Content-Type: application/json; charset=UTF-8");
require 'core/init.php';
class Country
{
    public function __construct()
    {

    }

    public $id;
    public $name;
    public $code;
    public function GetAll()
    {

        $countries = [];
        $pdo = Connect::getInstance();
        $data = $pdo->prepare('SELECT * FROM api.countries');
        $data->execute();
        while($OutPutData = $data->fetch(PDO::FETCH_ASSOC))
        {
           $countries[$OutPutData['id']] = array(
              'id' => $OutPutData['id'],
               'code' => $OutPutData['code'],
               'name' => $OutPutData['name']
           );
        }
        $_SESSION['countries'] = $countries;
       return json_encode($countries, JSON_PRETTY_PRINT);


    }

    public function GetCountryById($id)
    {
        $pdo = Connect::getInstance();
        $data =$pdo->prepare("SELECT * FROM api.countries  WHERE id =?");
        $data->bindValue(1,$id);
        $data->execute();
        $country = $data->fetch(PDO::FETCH_ASSOC);

        return  json_encode($country);
    }



}


