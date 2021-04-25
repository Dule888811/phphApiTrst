<?php
require 'core/init.php';


    $id= $_GET['countries'];
    $pdo = Connect::getInstance();
    $data =$pdo->prepare("SELECT * FROM api.countries  WHERE id =?");
    $data->bindValue(1,$id);
    $data->execute();
    $country = $data->fetch(PDO::FETCH_ASSOC);

    echo  json_encode($country);



?>
