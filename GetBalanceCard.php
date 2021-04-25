<?php
require 'core/init.php';
$card = new Card();
$cards = $card->GetBalanceCard($_GET['cards']);