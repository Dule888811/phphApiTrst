<?php
require 'core/init.php';
$country = new Country();
$country = $country->GetCountryById($_GET['countries']);
echo $country;