<?php

include 'customers.php';

?>

<!DOCTYPE html>

<html lang='en'>

    <head>

        <meta charset='UTF-8'>

        <meta name='viewport' content='width=device-width, initial-scale=1.0'>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <title>Document</title>

    </head>

    <body>

        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js' integrity='sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz' crossorigin='anonymous'></script>

        <div class="container">

            <label for="headerNames">Choose Criteria:</label>

            <select name="criteria" id="criteria">

              <option value="" selected disabled>-- Choose Criteria --</option>

              <option value="firstName">First Name</option>
              
              <option value="lastName">Last Name</option>

              <option value="age">Age</option>

              <option value="phoneNum">Phone Number</option>

            </select>

            <input type="text" placeholder="Criteria..">

        </div>

    </body>

</html>