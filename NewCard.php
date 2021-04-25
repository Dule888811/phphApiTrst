<?php
require 'core/init.php';
$card = new Card();

$card->create($_POST["countryId"],$_POST["first_name"],$_POST["last_name"],$_POST["address"],$_POST["city"],$_POST["pin"],$_POST["currency"],$_POST["balance"],$_POST["phone"],$_POST["status"],$_POST["transaction"]);