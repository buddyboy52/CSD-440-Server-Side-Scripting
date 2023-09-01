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
                        
                            if(isset($_POST['submit'])){

                                $counter = 0;

                                $choice = $_POST['criteria'];

                                $search = $_POST['criteriaTxt'];

                                $newWord = "";

                                if($choice == 'phone-number'){

                                    if(strlen($search) == 10){

                                        $search = preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $search);

                                    }

                                }

                                foreach($customers as $customer){

                                    if((array_search($search, $customer)) == $choice){

                                        $counter++;

                                        ?>

                                        <tr class="text-center">

                                            <td><?php echo $customer['first-name'] ?></td>
                                            <td><?php echo $customer['last-name'] ?></td>
                                            <td><?php echo $customer['age'] ?></td>
                                            <td><?php echo $customer['phone-number'] ?></td>


                                        </tr>

                                        <?php

                                    }

                                }

                                if($counter == 0){

                                    ?>

                                        <tr><td colspan="4" id="errorCol"><b>No Results Found.</b></td></tr>

                                    <?php

                                }

                            }
                        
                        ?>

                    </table>

                </div>

                <form class="form text-center" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

                    <div class="form-outline mb-4">

                        <label class="form-label mt-3" for="headerNames"><b>Choose Criteria:</b></label>

                        <br>

                        <select name="criteria" id="criteria" required>

                            <option value="" selected disabled>-- Choose Criteria --</option>

                            <option value="first-name" name="first-name">First Name</option>
                            
                            <option value="last-name" name="last-name">Last Name</option>

                            <option value="age" name="age">Age</option>

                            <option value="phone-number" name="phone-number">Phone Number</option>

                        </select>

                    </div>

                    <div class="form-outline mb-4">

                        <input type="text" name="criteriaTxt" placeholder="Criteria.." required>

                        <br>

                    </div>

                    <button class="btn btn-primary my-2" type="submit" name="submit">Submit</button>

                </form>

            </div>

            <div class="mt-5" id="customerTable">

                <div class="text-center mt-2 mx-2" id="cTableTitle">

                    <h2>List of all the customers</h2>
                    <h4>for testing the search feaure</h4>

                </div>

                <div class="mx-2">

                    <table class="table table-bordered table-striped text-center">

                        <tr id="tableHeader">

                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>Phone Number</th>

                        </tr>

                            <?php
                            
                                foreach($customers as $customer){

                                    ?>

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