<?php
require 'core/init.php';
?> <form class="action" action="GetPinCard.php">
    <label for="cadr">Choose a pin by address:</label>
    <select name="cards"
    <?php
    foreach($_SESSION['cards'] as $card)
    {
        ?>
        <option value= <?php   echo $card->id   ?> ><?php echo $card->address ?></option>
        <?php

    }
    ?>
    </select>
    <br><br>
    <input type="submit" value="Submit">

</form>