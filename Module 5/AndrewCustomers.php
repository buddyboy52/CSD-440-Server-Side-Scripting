<!--

Andrew McCloud

September 1, 2023

Professor Voelcker

Module 5 Coding Assignment

-->

<?php 

$customers = array(
            array("first-name"=>"Billy","last-name"=>"Joe","age"=>22,"phone-number"=>'111-222-3333'),
            array("first-name"=>"Tom","last-name"=>"Brady","age"=>38,"phone-number"=>'444-555-6666'),
            array("first-name"=>"Will","last-name"=>"Smith","age"=>48,"phone-number"=>'777-888-9999'),
            array("first-name"=>"Billy", "last-name"=>"Malone", "age"=>38, "phone-number"=>'123-456-7890'),
            array("first-name"=>"Antonia", "last-name"=>"Key", "age"=>26, "phone-number"=>'222-333-4444'),
            array("first-name"=>"Casper", "last-name"=>"Hendricks", "age"=>42, "phone-number"=>'333-444-5555'),
            array("first-name"=>"Herman", "last-name"=>"Buck", "age"=>18, "phone-number"=>'444-555-6666'),
            array("first-name"=>"Hector", "last-name"=>"Benton", "age"=>22, "phone-number"=>'555-666-7777'),
            array("first-name"=>"Ricardo", "last-name"=>"Winter", "age"=>32, "phone-number"=>'666-777-8888'),
            array("first-name"=>"Sidney", "last-name"=>"Elliot", "age"=>32, "phone-number"=>'789-012-3456'));

?>

<!DOCTYPE html>

<!-- Make a html document -->
<html lang='en'>

    <head>

        <meta charset='UTF-8'>

        <meta name='viewport' content='width=device-width, initial-scale=1.0'>

        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM' crossorigin='anonymous'>

        <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js' integrity='sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r' crossorigin='anonymous'></script>

        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js' integrity='sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS' crossorigin='anonymous'></script>

        <!-- Give our site a title for the tab at the top -->
        <title>AndrewCustomers</title>

    </head>

    <body>

        <!-- Link for bootstrap -->
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js' integrity='sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz' crossorigin='anonymous'></script>

        <!-- Create a div with bootstrap class container. This will hold all the items on the site -->
        <div class="container mt-3">

            <!-- Create a div to hold the search table and the search form -->
            <div id="searchForm">

                <!-- Create a div for the search table -->
                <div id="searchTable">

                    <!-- Create a table to display the search results when submit has been clicked -->
                    <table class="table table-bordered table-striped text-center">

                        <!-- Give the table headers to title the columns -->
                        <tr class="text-center" id="tableHeader">

                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>Phone Number</th>

                        </tr>

                        <!-- The PHP code for when the submit button is clicked -->
                        <?php
                        
                            // If the submit button is clicked
                            if(isset($_POST['submit'])){

                                // Create a counter to display an error if there are no results 
                                $counter = 0;

                                // Create a variable named $choice and
                                // assign it to the value chosen in the dropdown menu
                                $choice = $_POST['criteria'];

                                // Create a variable named $search and
                                // assign it to the value that was typed into the criteriaTxt textbox
                                $search = $_POST['criteriaTxt'];

                                $regex = '^[A-Z0-9]{3}-[A-Z0-9]{3}-[A-Z0-9]{4}^';

                                // Use an if statement to see if the user clicked on the phone-number option
                                if($choice == 'phone-number'){

                                    // If the phone number that was typed in
                                    // does not match the format of xxx-xxx-xxxx
                                    if(!(preg_match($regex, $search))){

                                        // Use one more if statement to check if the phone number
                                        // is equal to 10 (the length of a standard phone number)
                                        if(strlen($search) == 10){

                                            // Format the string that was typed in to xxx-xxx-xxxx
                                            $search = preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $search);
    
                                        }

                                    }

                                }

                                // Use foreach to loop through the customer array
                                // that is filled with single customer arrays
                                foreach($customers as $customer){

                                    // Use array search to search through each individual array 
                                    // in the customers array and check if it is equal to the text
                                    // typed into the textbox
                                    if((array_search($search, $customer)) == $choice){

                                        // Add 1 to the counter variable
                                        $counter++;

                                        // Close the php tag so we can use html in this foreach loop
                                        ?>

                                        <!-- Create a new row in the display search table -->
                                        <tr class="text-center">

                                            <!-- Use td and echo the 4 values from the customer array_search
                                                 that contains the search value -->
                                            <td><?php echo $customer['first-name'] ?></td>
                                            <td><?php echo $customer['last-name'] ?></td>
                                            <td><?php echo $customer['age'] ?></td>
                                            <td><?php echo $customer['phone-number'] ?></td>


                                        </tr>

                                        <!-- Create a new php tag -->
                                        <?php

                                    }

                                }

                                // Use an if statement to check if the counter variable equals 0
                                if($counter == 0){

                                    ?>

                                        <!-- Create a new row that displays 1 cell that spans over
                                            all 4 tables columns and display an error for no search results -->
                                        <tr><td colspan="4" id="errorCol"><b>No Results Found.</b></td></tr>

                                    <?php

                                }

                            }
                        
                        ?>

                    </table>

                </div>

                <!-- Create a form for the inputs from the user -->
                <form class="form text-center" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <!-- Create a div to hold the dropdown -->
                    <div class="form-outline mb-4">

                        <!-- Create a label for the dropdown -->
                        <label class="form-label mt-3" for="headerNames"><b>Choose Criteria:</b></label>

                        <br>

                        <!-- Use select with enclosed options to create a dropdown -->
                        <select name="criteria" id="criteria" required>

                            <!-- This option will display when the page is loaded. It can not be chosen -->
                            <option value="" selected disabled>-- Choose Criteria --</option>

                            <option value="first-name" name="first-name">First Name</option>
                            
                            <option value="last-name" name="last-name">Last Name</option>

                            <option value="age" name="age">Age</option>

                            <option value="phone-number" name="phone-number">Phone Number</option>

                        </select>

                    </div>

                    <!-- Create a div to hold the text input box from the user -->
                    <div class="form-outline mb-4">

                        <!-- The text box for the user input to search a specific text -->
                        <input type="text" name="criteriaTxt" placeholder="Criteria.." required>

                        <br>

                    </div>

                    <!-- Create a submit button -->
                    <button class="btn btn-primary my-2" type="submit" name="submit">Submit</button>

                </form>

            </div>

            <!-- Create a div to hold the example table so users can test the search functionality -->
            <div class="mt-5" id="customerTable">

                <!-- Create a div specifically for the custom text at the top -->
                <div class="text-center mt-2 mx-2" id="cTableTitle">

                    <h2>List of all the customers</h2>
                    <h4>for testing the search feaure</h4>

                </div>

                <!-- Create a div for the table -->
                <div class="mx-2">

                    <table class="table table-bordered table-striped text-center">

                        <!-- Give the table headers -->
                        <tr id="tableHeader">

                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>Phone Number</th>

                        </tr>

                            <!-- Our PHP code to display the array values -->
                            <?php
                            
                                // Use foreach to loop through the $customer array full of arrays
                                foreach($customers as $customer){

                                    ?>
                                        <!-- Display each array and their values -->
                                        <tr>

                                            <td><?php echo $customer['first-name']; ?></td>
                                            <td><?php echo $customer['last-name']; ?></td>
                                            <td><?php echo $customer['age']; ?></td>
                                            <td><?php echo $customer['phone-number']; ?></td>

                                        </tr>

                                    <?php

                                }
                            
                            ?>

                    </table>

                </div>

            </div>

        </div>

        <!-- Give our webpage some pizzazz -->
        <style>

            #errorCol{

                color: red;

            }

            #customerTable{

                border: 4px solid black;

            }

            #tableHeader{

                border-bottom: 4px solid black;
                color: lightblue;

            }

            #tableHeader th{

                color: darkblue;

            }

            #cTableTitle{

                background-color: lightblue;

            }

            #searchForm{

                border: 2px solid black;

            }

            #searchTable{

                border: 1px solid black;

            }

        </style>

    </body>

</html>