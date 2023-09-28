<!--

Andrew McCloud

September 20, 2023

Professor Voelcker

Module 9 Coding Assignment

-->

<?php

// Include the database connection file
include 'AndrewDatabaseConnection.php';

// If the 'Add Golfer' Button is clicked
if(isset($_POST['addGolferBtn'])){

    // Create a result text to display a status on creating a golfer
    $resultText = "";

    // Create an errorFlag to determine if the creation was a success
    $errorFlag = "true";

    // If the text entered into the fNameTxt input is not empty and is a string
    if(!empty($_POST['fNameTxt']) && is_string($_POST['fNameTxt'])){

        // Create a variable assigned to the text entered into the fNameTxt input
        $firstNameInput = $_POST['fNameTxt'];

        // If the text entered into the lNameTxt input is not empty and is a string
        if(!empty($_POST['lNameTxt']) && is_string($_POST['lNameTxt'])){

            // Create a variable assigned to the text entered into the lNameTxt input
            $lastNameInput = $_POST['lNameTxt'];

            // If the text entered into the ageTxt input is not empty and is numeric
            if(!empty($_POST['ageTxt']) && is_numeric($_POST['ageTxt'])){

                // Create a variable assigned to the int entered into the ageTxt input
                $ageInput = $_POST['ageTxt'];

                // If the text entered into the birthCountryTxt input is not empty and is a string
                if(!empty($_POST['birthCountryTxt']) && is_string($_POST['birthCountryTxt'])){

                    // Create a variable assigned to the text entered into the birthCountryTxt input
                    $birthCountryInput = $_POST['birthCountryTxt'];

                    // If the date entered into the dateOfBirthTxt input is not empty
                    if(!empty($_POST['dateOfBirthTxt'])){

                        // Create a variable assigned to the date entered into the dateOfBirthTxt input
                        $dateOfBirthInput = $_POST['dateOfBirthTxt'];

                        // Create a prepared statement for inserting the data into the database
                        $sqlAddGolfer = "INSERT INTO golfers (firstName, lastName, age, birthCountry, dateOfBirth) VALUES (?, ?, ?, ?, ?)";

                        // Prepare the statement
                        $statement = $conn->prepare($sqlAddGolfer);

                        // Bind the variables to the prepared statement
                        $statement->bind_param("ssiss", $firstNameInput, $lastNameInput, $ageInput, $birthCountryInput, $dateOfBirthInput);

                        // Use Try/Catch to try and execute the SQL statement
                        try{

                            // Execute the SQL statement
                            $statement->execute();

                            // Assign a success message to the resultText variable
                            $resultText = "Success! Golfer has been added to the database!";

                            // Make the errorFlag true
                            $errorFlag = "false";

                        // If there was an error executing the SQL statement
                        }catch (Exception $e){

                            // Give the resultText variable an error message
                            $resultText = "There was an error creating the golfer!";

                        }

                    }else{

                        // Give the resultText variable an error message
                        $resultText = "There was an issue with the date of birth entered..";

                    }

                }else{

                    // Give the resultText variable an error message
                    $resultText = "There was an issue with the birth country entered..";

                }

            }else{

                // Give the resultText variable an error message
                $resultText = "There was an issue with the age entered..";

            }

        }else{

            // Give the resultText variable an error message
            $resultText = "There was an issue with the last name entered..";

        }

    }else{

        // Give the resultText variable an error message
        $resultText = "There was an issue with the first name entered..";

    }

    // If the errorFlag is true, make the <h2> tag color green
    if($errorFlag == "false"){

        ?>

        <h2 style="color: green"><?php echo $resultText; ?></h2>

        <?php

    // Else if the errorFlag is false, make the <h2> tag color red
    }else{

        ?>

        <h2 style="color: red"><?php echo $resultText; ?></h2>

        <?php

    }

}

?>