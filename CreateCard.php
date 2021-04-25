<?php
require 'core/init.php';

?> <form class="action" action="NewCard.php" method="POST" enctype="multipart/form-data">
    <label for="country_id">Choose a card by pin:</label>
    <select name="countryId"
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
    <label for="first_name">First Name</label><br>
    <input type="text" name="first_name"></input required><br>
    <label for="last_name">Last Name</label><br>
    <input type="text" name="last_name"></input required><br>
    <label for="address">address</label><br>
    <input type="text" name="address"></input required><br>
    <label for="city">city</label><br>
    <input type="text" name="phone"></input required><br>
    <label for="city">phone</label><br>
    <input type="text" name="city"></input required><br>
     <label for="currency">currency</label><br>
    <input type="text" name="currency"></input required><br>
      <label for="balance">balance</label><br>
    <input type="text" name="balance"></input required><br>
    <label for="pin">pin</label><br>
    <input type="text" name="pin"></input required><br>
    <label for="status">status</label><br>
    <input type="text" name="status"></input required><br>
     <label for="transaction">transaction</label><br>
    <input type="text" name="transaction"></input><br>
    <input type="submit" value="Submit">
</form>
