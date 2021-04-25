<?php
require 'core/init.php';
?> <form class="action" action="DeactivateCard.php" method="POST" enctype="multipart/form-data">
    <label for="countries">Choose a card to deactive:</label>
    <select name="DeactivateCard"
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