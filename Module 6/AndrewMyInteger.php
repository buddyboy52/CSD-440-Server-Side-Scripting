<!--

Andrew McCloud

September 3, 2023

Professor Voelcker

Module 6 Coding Assignment

-->

<!-- Our PHP code to delcare our class that holds the functions -->
<?php

// Create a class titles AndrewMyInteger
class AndrewMyInteger{

    // Declare a private variable for an integer
    private $integer;

    // Create a constructor to with a integer parameter
    public function __construct($integer){

        // Assign the parameter given to our integer variable
        $this->integer = $integer;

    }

    // Create a setter to set a new number if given
    public function setInt($integer){

        $this->integer = $integer;

    }

    // Create a getter to get the integer every time it is called
    public function getInt(){

        return $this->integer;

    }

    // Create a function to test if the integer is even
    public function isEven($num){

        // Initialize a variable for the result
        // We will always assume the integer is not even
        // until told otherwise
        $result = "False";

        // Use an if statement to check if the integer can be divided by 2
        // If the integer divided by 2 has a remainder, it is even
        if(($num % 2) == 0){

            // Set the result variable to true
            $result = "True";

        }

        // Return the result
        return $result;

    }

    // Create a function to test if the integer is odd
    public function isOdd($num){

        // Initialize a variable for the result
        // We will always assume the integer is not odd
        // until told otherwise
        $result = "False";

        // Use an if statement to check if the integer can not be divided by 2 without having a remainder
        // If the integer divided by 2 has a remainder, it is odd
        if(!(($num % 2) == 0)){

            $result = "True";

        }

        // Return the result
        return $result;

    }

    // Create a function to test if the integer is a prime number
    public function isPrime($num){

        // Initialize a variable for the result
        // We will always assume the integer is a prime number
        // until told otherwise
        $primeResult = "True";

        // Because 1 and 0 are not prime numbers, use an if statement to check
        // if the integer is 1 or 0 and if it is, return false
        // This if statement is special because 1 and 0 would pass the isPrime test
        if($num == 1 or $num == 0){

            return "False";

        }

        // Check if the number is not 2 because 2 is the smallest prime number
        // and it would pass this test, which would say it isn't a prime number
        if($num != 2){

            // Use a for loop to test dividing the integer by every number
            // from 2 up until 1 less than the integer to see if it can be divided 
            // by more than itself and 1 without having a remainder
            for($x = 2; $x < $num; $x++){

                // Test if the integer divided by a number has no decimals (remainders)
                if(($num % $x) == 0){
    
                    // If it does not have any decimals (remainders),
                    // set the primeResult to false and stop the for loop
                    $primeResult = "False";
    
                    break;
    
                }
    
            }

        }else{

            // If the integer is 2, set the primeResult to true
            // because 2 is a prime number
            $primeResult = "True";

        }

        // Return the primeResult variable
        return $primeResult;

    }

}

// Create 2 objects to test the class and functions with
$intOneObj = new AndrewMyInteger(11);

$intTwoObj = new AndrewMyInteger(8);

// Create an array and add the 2 objects to it
$testArray = array($intOneObj, $intTwoObj);

?>

<!-- Create a html document to display our results -->
<!DOCTYPE html>

<html lang='en'>

    <head>

        <meta charset='UTF-8'>

        <meta name='viewport' content='width=device-width, initial-scale=1.0'>

        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM' crossorigin='anonymous'>

        <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js' integrity='sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r' crossorigin='anonymous'></script>

        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js' integrity='sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS' crossorigin='anonymous'></script>

        <title>AndrewMyInteger</title>

    </head>

    <body>

        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js' integrity='sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz' crossorigin='anonymous'></script>

        <!-- Use a table to display the results -->
        <table class="table table-bordered table-striped text-center">

        <!-- Give the table headers to title the columns -->
            <tr style="border-bottom: 4px solid black">

                <th>Integer</th>
                <th>Even?</th>
                <th>Odd?</th>
                <th>Prime?</th>

            </tr>

            <?php

            // Use foreach to loop through the array and call the functions within the objects
            foreach($testArray as $test){

                // Get the integer that was given
                $testInt = $test->getInt();

                // Call the isEven function and assign the result to a variable
                $testEven = $test->isEven($testInt);

                // Call the isOdd function and assign the result to a variable                
                $testOdd = $test->isOdd($testInt);

                // Call the isPrime function and assign the result to a variable
                $testPrime = $test->isPrime($testInt);

            ?>

            <!-- Display the results of each function test -->
            <tr>
                
                <td><?php echo $testInt; ?></td>
                <td><?php echo $testEven; ?></td>
                <td><?php echo $testOdd; ?></td>
                <td><?php echo $testPrime; ?></td>


            </tr>

            <?php
            }
            ?>

        </table>

    </body>

</html>
