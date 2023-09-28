<!--

Andrew McCloud

September 20, 2023

Professor Voelcker

Module 9 Coding Assignment

-->

<!DOCTYPE html>

<html lang='en'>

    <head>

        <meta charset='UTF-8'>

        <meta name='viewport' content='width=device-width, initial-scale=1.0'>

        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM' crossorigin='anonymous'>

        <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js' integrity='sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r' crossorigin='anonymous'></script>

        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js' integrity='sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS' crossorigin='anonymous'></script>

        <title>AndrewSearchForm</title>

    </head>

    <body>

        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js' integrity='sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz' crossorigin='anonymous'></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
        <div class="container">

            <form method="post" class="text-center mt-5">

                <div class="row">

                    <div class="col-md-8 offset-md-2">

                        <!-- Create a dropdown to specify search type -->
                        <select name="searchOptions" class="text-center" id="searchDropDown">

                            <option disabled selected> -- Choose a search option -- </option>

                            <option value="firstName">First Name</option>
                            
                            <option value="lastName">Last Name</option>

                            <option value="age">Age</option>

                            <option value="birthCountry">Birth Country</option>

                            <option value="dateOfBirth">Birth Date</option>

                        </select>

                        <!-- Create a input textbox for the criteria to search -->
                        <div class="w-50 mx-auto mt-4">

                            <input type="text" class="form-control border border-dark text-center" id="searchInput" name="searchTxt" placeholder="Criteria..">

                        </div>

                        <button type="submit" name="searchBtn" class="btn btn-primary my-4">Search</button>

                    </div>

                </div>

            </form>

        </div>

        <div class="container text-center">

            <!-- Create a table to display the results of the search -->
            <table class="table table-striped table-bordered text-center">

            <?php
            
                include 'AndrewSearchTable.php';
            
            ?>

            </table>
        
            <!-- Create a link to go back to the index -->
            <a href="AndrewIndex.php" class="btn btn-warning mt-5">Return to home</a>

        </div>

        <!-- Create a Javascript JQuery to change the type of text box depending on choice in the dropdown -->
        <script>

            // Create a variable for the dropdown object
            var searchChoice = $('#searchDropDown');

            // When the option in the dropdown is changed, this runs
            searchChoice.on('change', function(){

                // Create a variable for the input criteria text box
                var searchTextBox = $('#searchInput');

                // Show the input criteria text box
                searchTextBox.show();

                // Use a switch statement for the 5 options in the dropdown
                switch($(this).val()){

                    // If the firstName option was chosen
                    case 'firstName':

                        // Change the attribute of the input to 'text'
                        searchTextBox.attr('type', 'text');

                        // Change the placeholder text on the input
                        searchTextBox.attr('placeholder', 'Enter First Name..');

                        // End the switch statement
                        break;

                    // If the lastName option was chosen
                    case 'lastName':

                        // Change the attribute of the input to 'text'
                        searchTextBox.attr('type', 'text');

                        // Change the placeholder text on the input
                        searchTextBox.attr('placeholder', 'Enter Last Name..');

                        // End the switch statement
                        break;

                    // If the age option was chosen
                    case 'age':

                        // Change the attribute of the input to 'number'
                        searchTextBox.attr('type', 'number');

                        // Change the placeholder text on the input
                        searchTextBox.attr('placeholder', 'Enter Age..');

                        // End the switch statement
                        break;

                    // If the birth country option was chosen
                    case 'birthCountry':

                        // Change the attribute of the input to 'text'
                        searchTextBox.attr('type', 'text');

                        // Change the placeholder text on the input
                        searchTextBox.attr('placeholder', 'Enter Birth Country..');

                        // End the switch statement
                        break;

                    // If the Date Of Birth option was chosen
                    case 'dateOfBirth':

                        // Change the attribute of the input to 'date'
                        searchTextBox.attr('type', 'date');

                        // End the switch statement
                        break;

                }

            })

        </script>

    </body>

</html>