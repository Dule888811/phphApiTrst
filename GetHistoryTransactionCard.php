<?php
require 'core/init.php';
require 'core/init.php';
$card = new Card();
$cards = $card->GetHistoryTransactionCard($_GET['cards'],$_GET["startDate"]);
