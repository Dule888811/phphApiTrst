<?php
require 'core/init.php';
$card = new Card();
$cards = $card->GetPinCard($_GET['cards']);