<?php
require 'core/init.php';
$country = new Card();
 $country->ActivateCard($_POST['id'],$_POST['countries']);
