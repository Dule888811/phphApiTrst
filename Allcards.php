<?php
require 'core/init.php';

$card = new Card();
$cards = $card->GetAllCards();
echo $cards;
$cards = json_decode($cards);
session_start();
$_SESSION['cards'] = $cards;