<!--

Andrew McCloud

August 25, 2023

Professor Voelcker

Module 3 Coding Assignment

-->

<?php
// Inlcude the php file that contains the functions so we can use it
include 'getSum.php';

?>

<!DOCTYPE html>

<html lang='en'>

    <head>

        <meta charset='UTF-8'>

        <meta name='viewport' content='width=device-width, initial-scale=1.0'>

        <!-- Add links and scripts for Bootstrap to style our webpage -->

        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM' crossorigin='anonymous'>

        <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js' integrity='sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r' crossorigin='anonymous'></script>

        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js' integrity='sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS' crossorigin='anonymous'></script>

        <title>AndrewTable2</title>

    </head>

    <body>

        <!-- Add a script for bootstrap css -->
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js' integrity='sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz' crossorigin='anonymous'></script>

        <!-- Create a div to hold our table and center it with Bootstrap -->
        <div class="row justify-content-center">

            <!-- Create a table -->
            <table border=1 class="table table-bordered table-striped text-center">

                <!-- Give our table headers -->
                <tr>
                    <th>Set 1</th>
                    <th>Set 2</th>
                    <th>Set 3</th>
                    <th>Set 4</th>
                    <th>Set 5</th>
                </tr>

                <!-- Use PHP to make a for loop -->
                <?php for($x = 0; $x < 20; $x++){ ?>

                    <!-- Create a table row -->
                    <tr>

                    <!-- Use PHP to make another for loop to handle the columns -->
                    <?php for($y = 0; $y < 5; $y++){ ?>

                        <!-- Create a randNum integer that will get a
                            random number every time the for loop runs -->
                        <?php 
                        
                            // Get the first random number
                            $randOne = rand(1, 20); 
                        
                            // Get the second random number
                            $randTwo = rand(1, 20);

                            // Call the getSum function with the two rand numbers
                            // and assign it to a variable
                            $randSum = getSum($randOne, $randTwo);
                        
                        ?>

                        <!-- Display the randSum in the table data
                            Which will generate 5 td in one row -->
                        <td><?php echo $randSum ?></td>

                    <?php }?>

                    </tr>

                <?php } ?>

            </table>

        </div>

    </body>

</html>