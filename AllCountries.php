<?php
require 'core/init.php';

$country = new Country();
$countries = $country->GetAll();
echo $countries;
$countries = json_decode($countries);
session_start();
