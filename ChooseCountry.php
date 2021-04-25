<?php
require 'core/init.php';
?> <form class="action" action="GetCountry.php">
    <label for="countries">Choose a card by pin:</label>
    <select name="countries"
    <?php
    foreach($_SESSION['countries'] as $country)
    {
        ?>
        <option value= <?php   echo $country->id   ?> ><?php echo $country->name ?></option>
        <?php

    }
    ?>
    </select>
    <br><br>
    <input type="submit" value="Submit">
</form>