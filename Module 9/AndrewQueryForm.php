<!DOCTYPE html>

<html lang='en'>

    <head>

        <meta charset='UTF-8'>

        <meta name='viewport' content='width=device-width, initial-scale=1.0'>

        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM' crossorigin='anonymous'>

        <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js' integrity='sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r' crossorigin='anonymous'></script>

        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js' integrity='sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS' crossorigin='anonymous'></script>

        <title>Document</title>

    </head>

    <body>

        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js' integrity='sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz' crossorigin='anonymous'></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
        <div class="container">

            <form method="post" class="text-center mt-5">

                <div class="row">

                    <div class="col-md-8 offset-md-2">

                        <select name="searchOptions" class="text-center" id="searchDropDown">

                            <option disabled selected> -- Choose a search option -- </option>

                            <option value="firstName">First Name</option>
                            
                            <option value="lastName">Last Name</option>

                            <option value="age">Age</option>

                            <option value="birthCountry">Birth Country</option>

                            <option value="dateOfBirth">Birth Date</option>

                        </select>

                        <div class="w-50 mx-auto mt-4">

                            <input type="text" class="form-control border border-dark text-center" id="searchInput" name="searchTxt" placeholder="Criteria..">

                        </div>

                        <button type="submit" name="searchBtn" class="btn btn-primary my-4">Search</button>

                    </div>

                </div>

            </form>

        </div>

        <div class="container text-center">

            <table class="table table-striped table-bordered text-center">

            <?php
            
                include 'AndrewSearchTable.php';
            
            ?>

            </table>

            <a href="AndrewIndex.php" class="btn btn-warning mt-5">Return to home</a>

        </div>

        <script>

            var searchChoice = $('#searchDropDown');

            searchChoice.on('change', function(){

                var searchTextBox = $('#searchInput');

                searchTextBox.show();

                switch($(this).val()){

                    case 'firstName':

                        searchTextBox.attr('type', 'text');

                        searchTextBox.attr('placeholder', 'Enter First Name..');

                        break;

                    case 'lastName':

                        searchTextBox.attr('type', 'text');

                        searchTextBox.attr('placeholder', 'Enter Last Name..');

                        break;

                    case 'age':

                        searchTextBox.attr('type', 'number');

                        searchTextBox.attr('placeholder', 'Enter Age..');

                        break;

                    case 'birthCountry':

                        searchTextBox.attr('type', 'text');

                        searchTextBox.attr('placeholder', 'Enter Birth Country..');

                        break;

                    case 'dateOfBirth':

                        searchTextBox.attr('type', 'date');

                        break;

                    

                }

            })

        </script>

    </body>

</html>