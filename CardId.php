<?php
require 'core/init.php';
$card = new Card();
$cards = $card->GetCardsById($_GET['cards']);
echo $cards;