<!--

Andrew McCloud

September 29, 2023

Professor Voelcker

Module 10 Coding Assignment

-->

<?php

// If the Book Trip Button was clicked
if(isset($_POST['bookTripBtn'])){

    // Create an error status to track if there is an error
    // and assign the errorStatus to what went wrong
    $errorStatus = "";

    // Create an error flag that only becomes false if every test passes
    $errorFlag = "true";

    // If the firstName textbox is not empty and is a string
    if(!empty($_POST['firstNameTxt']) && is_string($_POST['firstNameTxt'])){

        // Create a firstName variable and assign it to the text entered into the firstNameTxt
        $firstName = $_POST['firstNameTxt'];

        // If the lastName textbox is not empty and is a string
        if(!empty($_POST['lastNameTxt']) && is_string($_POST['lastNameTxt'])){

            // Create a lastName variable and assign it to the text entered into the lastNameTxt
            $lastName = $_POST['lastNameTxt'];

            // If the leaveDate textbox is not empty and is a validated date
            if(!empty($_POST['leaveDate']) && dateValidation($_POST['leaveDate'])){

                // Create a leaveDate variable and assign it to the text entered into the leaveDate textbox
                $leaveDate = $_POST['leaveDate'];

                // If the returnDate textbox is not empty and is a validated date
                if(!empty($_POST['returnDate']) && dateValidation($_POST['returnDate'])){

                    // Create a returnDate variable and assign it to the text entered into the returnDate textbox
                    $returnDate = $_POST['returnDate'];

                    // If the leaveDate is before the returnDate
                    if(strtotime($leaveDate) < strtotime($returnDate)){

                        // If the value from the guestDropDown is not empty
                        if(!empty($_POST['guestsDropDown'])){

                            // Create a variable and assign it to the choice chosen in the guestDropDown dropdown
                            $guestCount = $_POST['guestsDropDown'];

                            // If the value from the specialBoardingRadio is not empty
                            // (meaning one of the choices has to be selected)
                            if(!empty($_POST['specialBoardingRadio'])){

                                // Create a specialBoarding variable and assign it to the option selected from the radio buttons 
                                $specialBoarding = $_POST['specialBoardingRadio'];

                                // If the emailTxt textbox is not empty
                                if(!empty($_POST['emailTxt'])){

                                    // Create an email variable and assign it to the value entered into the emailTxt textbox
                                    $email = $_POST['emailTxt'];

                                    // If a choice has been selected in the seatChoice dropdown
                                    if(!empty($_POST['seatChoice'])){

                                        // Create a seatingChoice variable and assign it to the choice from the seatchoice dropdown
                                        $seatingChoice = $_POST['seatChoice'];

                                        // Create an associative array with all of the data entered into the form
                                        $flightInfo = array("First Name"=>$firstName, "Last Name"=>$lastName, "Leave Date"=>$leaveDate, "Return Date"=>$returnDate, "Guest Count"=>$guestCount, "Special Boarding"=>$specialBoarding, "Email"=>$email, "Seating Choice"=>$seatingChoice);

                                        // Use Try/Catch to encode the array of data into a JSON format
                                        try{

                                            // Encode the array into a JSON format
                                            $data = json_encode($flightInfo, JSON_PRETTY_PRINT);

                                            // Set the errorFlag to false showing every variable passed
                                            $errorFlag = "false";


                                        // If there was an error encoding the array to JSON
                                        }catch (Exception $e){

                                            // Assign an error to the errorStatus variable
                                            $errorStatus = "There was an error encoding the data to JSON";

                                        }

                                    }else{

                                        // Assign an error to the errorStatus variable
                                        $errorStatus = "There was an error with the seating choice";

                                    }

                                }else{

                                    // Assign an error to the errorStatus variable
                                    $errorStatus = "There was an error with the email entered";

                                }

                            }else{

                                // Assign an error to the errorStatus variable
                                $errorStatus = "Special Boarding choice is required";

                            }

                        }else{

                            // Assign an error to the errorStatus variable
                            $errorStatus = "There was an error with the number of guests choice";

                        }

                    }else{

                        // Assign an error to the errorStatus variable
                        $errorStatus = "The return date has to be after the leave date!";

                    }

                }else{
    
                    // Assign an error to the errorStatus variable
                    $errorStatus = "There was an error with the leave date entered..";
    
                }

            }else{

                // Assign an error to the errorStatus variable
                $errorStatus = "There was an error with the leave date entered..";

            }

        }else{
    
            // Assign an error to the errorStatus variable
            $errorStatus = "There was an error with the last name entered..";
    
        }

    }else{

        // Assign an error to the errorStatus variable
        $errorStatus = "There was an error with the first name entered..";

    }

    // Use an if/else statement to determine what is to be output
    // If the errorFlag is false (meaning every validation passed)
    if($errorFlag == "false"){

        ?>
            <!-- Display the JSON file -->
            <div class="text-center" style="font-size: 24px; border: 2px solid black">
        
                <pre class="text-left my-3" style="display: inline-block; text-align: left"><?php echo $data; ?></pre>
        
            </div>

        <?php

    // If the errorFlag is true (meaning there was an error with one of the values entered)
    }else{

        ?>
        <!-- Display the error -->
        <div class="text-center" style="border: 2px solid black">
        
            <h2 class="text-center"><?php echo $errorStatus; ?></h2>
        
        </div>
        

        <?php

    }

}

// Create a function to validate the date entered
function dateValidation($date){

    // Use regex and a pattern to make sure the entered value was yyyy-mm-dd
    // Return true if it does and false if it doesn't
    return preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $date);

}



?>