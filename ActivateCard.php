<?php
require 'core/init.php';
?> <form class="action" action="CardId.php" method="POST"enctype="multipart/form-data"
    <label for="activate">Choose a card by pin:</label>
    <select name="cards"
    <?php
    foreach($_SESSION['cards'] as $card)
    {
        ?>
        <option value= <?php   echo $card->id   ?> ><?php echo $card->pin ?></option>
        <?php

    }
    ?>
    </select>
    <br><br>
    <input type="submit" value="Submit">
</form>