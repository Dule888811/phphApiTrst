<?php
require 'core/init.php';
?> <form class="action" action="GetHistoryTransactionCard.php">
    <label for="cadr">Choose a card by pin:</label>
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
    <label for startDate>Start Date</label><br>
    <input type="date" id="start" name="startDate"><br>
    <!-- <label for endDate>End Date</label><br>
     <input type="date" id="end" name="endDate"><br>
   --!>  <input type="submit" value="Submit"><br>

</form>