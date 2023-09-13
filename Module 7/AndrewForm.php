<!--

Andrew McCloud

September 6, 2023

Professor Voelcker

Module 7 Coding Assignment

-->

<!-- Create our HTML document -->
<!DOCTYPE html>

<html lang='en'>

    <!-- Create a head tag for our links and scripts for bootstrap -->
    <head>

        <meta charset='UTF-8'>

        <meta name='viewport' content='width=device-width, initial-scale=1.0'>

        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM' crossorigin='anonymous'>

        <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js' integrity='sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r' crossorigin='anonymous'></script>

        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js' integrity='sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS' crossorigin='anonymous'></script>

        <!-- Give the webpage a title that will go in the tab bar at the top -->
        <title>AndrewForm</title>

    </head>

    <!-- Create a body tag for our webpage code -->
    <body>

        <!-- Create a script for bootstrap -->
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js' integrity='sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz' crossorigin='anonymous'></script>

        <!-- Create our PHP code for when the submit button is clicked -->
        <?php

            // If the submit button was pressed
            if(isset($_POST['submit'])){

                // Get the first name and the last name from the form
                $firstName = $_POST['firstNameTxt'];
                $lastName = $_POST['lastNameTxt'];

                // Initialize the rest of the variables
                $leaveDate = "";
                $returnDate = "";
                $numOfGuests = "";
                $sBoarding = "";
                $email = "";

                // We have to format the leave date and the return date so that we can use
                // the built in PHP function 'checkdate'
                $leaveDate = $_POST['leaveDate'];
                $returnDate = $_POST['returnDate'];

                // To format, we would first have to turn the dates we already have from the textboxes
                // into arrays so we can reorder them
                $newLeaveDate = explode('-', $leaveDate);
                $newReturnDate = explode('-', $returnDate);

                // Create a year variable for leave and return and assign it to the 1st object in the arrays
                $leaveYear = $newLeaveDate[0];
                $returnYear = $newReturnDate[0];

                // Create a month variable for the leave and return and assign it to the 2nd object in the arrays
                $leaveMonth = $newLeaveDate[1];
                $returnMonth = $newReturnDate[1];

                // Create a day variable for the leave and return and assign it to the 3rd object in the arrays
                $leaveDay = $newLeaveDate[2];
                $returnDay = $newReturnDate[2];

                // Create a form status that we will use to track if all input has been entered in correctly
                $formStatus = "false";

                // Create an error code that will be assigned if an error has occurred
                $errorCode = "";

                // Use an if statement to check if the firstname and last name entered are strings
                // If they are, move to the next if statement, if not, throw an error
                if(is_string($firstName) && is_string($lastName)){                    

                    // Use an if statement to check the leave date
                    // Use the built in PHP function 'checkdate' to check it
                    if(checkdate($leaveMonth, $leaveDay, $leaveYear)){

                        // Use an if statement to check the return date
                        // Use the built in PHP function 'checkdate' to check it. Also make sure it is greater than the leave date
                        // This insures that the user did not enter in a return date that is before the leave date
                        if(checkdate($returnMonth, $returnDay, $returnYear) && $leaveDate < $returnDate){

                            // If the return date passes, get the input for the number of guests
                            $numOfGuests = $_POST['guestsDropDown'];

                            // Use an if statement to make sure the user chose one of the options in the number of guests dropdown
                            if($numOfGuests > 0){

                                // If the user selects the 4+ guest option
                                if($numOfGuests == 'fourOrMore'){

                                    $numOfGuests = "4+";

                                }

                                // Use an if statement to check if one of the radio buttons was selected
                                if(isset($_POST['specialBoardingRadio'])){

                                    // Use an if statement to check if 'Yes' or 'No' was selected between the radio buttons
                                    if($_POST['specialBoardingRadio'] == false){

                                        $sBoarding = "Yes";

                                    }else{

                                        $sBoarding = "No";

                                    }

                                    // If the radio button input passes, get the input for the email
                                    $email = $_POST['emailTxt'];

                                    // Use an if statement to confirm that the user entered in a string in the email textbox
                                    if(is_string($email)){

                                        // If all requirements have been met, set the formStatus variable to true
                                        $formStatus = "true";

                                    // If the email is not a string, throw an error
                                    }else{

                                        // Error for the email textbox
                                        $errorCode = "There is an issue with you email";

                                    }

                                // If no radio button was selected, throw an error
                                }else{

                                    // Error for the radio buttons
                                    $errorCode = "Please select yes or no for special boarding";

                                }

                            // If the user did not select an option for the number of guests, throw an error
                            }else{

                                // Error for the number of guests dropdown
                                $errorCode = "Please select one of the options for number of guests";

                            }

                        // If the user did not select a return date or
                        // If the user selected a return date that is before the leave date, throw an error
                        }else{

                            // Error for the return date
                            $errorCode = "There was an issue with your return date";

                        }

                    // If the user did not select a leave date, throw an error
                    }else{

                        // Error for the leave date
                        $errorCode = "There was an issue with your leave date";

                    }

                // If the user did not enter in a string for the first or last name, throw an error
                }else{

                    // Error for the first or last name
                    $errorCode = "There was an issue with your first or last name";

                }

                // Call the display results function with all of the variables
                displayResults($firstName, $lastName, $leaveDate, $returnDate, $numOfGuests, $sBoarding, $email, $formStatus, $errorCode);

            }

        ?>

        <!-- Create a container div to hold the results (This will be displayed at the top of the page) -->
        <div class="container">

            <!-- This is where our PHP code for displaying the results will go -->
            <?php
            
                function displayResults($fName, $lName, $lDate, $rDate, $guestNum, $specBoarding, $emailAddress, $status, $error){

                    if($status == "true"){

                        ?>

                            <!-- If all info was entered in correctly, use Divs with bootstrap rows and columns to display the results -->
                            <div class="mt-3 mx-5 text-center" style="border: 1px solid black; background-color: lightgreen">

                                <div class="row">

                                    <div class="col-md-12">

                                        <h1>Booking Successful!</h1>

                                        <h2><?php echo "Name: {$fName} {$lName}"; ?></h2>

                                        <h2><?php echo "Leave Date: {$lDate}" ?></h2>

                                        <h2><?php echo "Return Date: {$rDate}" ?></h2>

                                        <h2><?php echo "Number of Guests: {$guestNum}" ?></h2>

                                        <h2><?php echo "Special Boarding? {$specBoarding}" ?></h2>

                                        <h2><?php echo "An confirmation email has been sent to <u>{$emailAddress}</u>" ?></h2>

                                    </div>

                                </div>

                            </div>

                        <?php

                    }else{

                        ?>

                            <!-- If not all info was entered in correctly, display an error at the top -->
                            <div class="mt-3 mx-5 text-center" style="border: 1px solid black">

                                <div class="row">

                                    <div class="col-md-12" style="background-color: red">

                                        <h1>An error has occurred!</h1>

                                        <h2><?php echo $error; ?></h2>

                                    </div>

                                </div>

                            </div>

                        <?php

                    }

                }
            
            ?>

        </div>
            
        <div class="container">

                <h1 class="text-center my-5"><b><u>Book Your Flight!</u></b></h1>

            <!-- Create a form to hold all user input options -->
            <form class="text-center" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            
                <div class="row my-3">

                    <!-- Get user first name -->
                    <div class="col-md-6">

                        <label class="form-label" for="firstNameTxt"><b>First Name</b></label>

                        <input class="form-control text-center" type="text" name="firstNameTxt" placeholder="First Name...">

                    </div>

                    <!-- Get user last name -->
                    <div class="col-md-6">

                        <label class="form-label" for="lastNameTxt"><b>Last Name</b></label>

                        <input class="form-control text-center" type="text" name="lastNameTxt" placeholder="Last Name...">

                    </div>

                </div>

                <div class="row my-3">

                    <!-- Get the date that the user will leave -->
                    <div class="col-md-6">

                        <label class="form-label" for="leaveDate"><b>Leave Date</b></label>

                        <input class="form-control text-center" type="date" name="leaveDate">

                    </div>

                    <!-- Get the date that the user will return -->
                    <div class="col-md-6">

                        <label class="form-label" for="returnDate"><b>Return Date</b></label>

                        <input class="form-control text-center" type="date" name="returnDate">

                    </div>

                </div>

                <div class="row my-3">

                    <!-- Use a dropdown to get the number of guests there will be on the trip -->
                    <div class="col-md-6 offset-md-3">

                        <label class="form-label" for="guestsDropDown"><b>How many guests?</b></label>

                        <select class="form-control text-center" name="guestsDropDown" id="guestsDropDown" required>

                            <option value=""disabled selected>-- Select number of guests --</option>

                            <option value="1">1</option>

                            <option value="2">2</option>

                            <option value="3">3</option>

                            <option value="fourOrMore">4+</option>


                        </select>

                    </div>

                </div>

                <!-- Use radio buttons to determine if anyone will need special boarding -->
                <div class="form-check mb-4">

                    <label class="form-label" for="specialBoardingRadio"><b>Do you need special boarding?</b></label>

                    <br>

                    <input type="radio" value="true" name="specialBoardingRadio">

                    <label class="form-check-label" for="specialBoardingRadio">Yes</label>

                    <input type="radio" value="false" name="specialBoardingRadio">

                    <label class="form-check-label" for="specialBoardingRadio">No</label>

                </div>

                <!-- Get an email from the user -->
                <div class="form-outline mb-4">

                    <label class="form-label" for="emailTxt"><b>Email</b></label>

                    <input class="form-control text-center" type="text" name="emailTxt" placeholder="Email...">

                </div>

                <!-- Create a submit button to submit the results -->
                <div class="form-outline mb-4">

                    <button class="btn btn-primary" type="submit" name="submit">Book Now</button>

                </div>
        
            </form>

        </div>

    </body>

</html>
