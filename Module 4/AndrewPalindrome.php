<!--

Andrew McCloud

August 25, 2023

Professor Voelcker

Module 4 Coding Assignment

-->

<?php
// Create an array to hold our test words
// This array contains 3 palindromes and 3 non-palindromes
$words = array("billy", "bob", "racecar", "computer", "school", "radar");

?>

<!DOCTYPE html>

<html lang='en'>

    <head>

        <meta charset='UTF-8'>

        <meta name='viewport' content='width=device-width, initial-scale=1.0'>

        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM' crossorigin='anonymous'>

        <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js' integrity='sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r' crossorigin='anonymous'></script>

        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js' integrity='sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS' crossorigin='anonymous'></script>

        <title>AndrewPalindrome</title>

    </head>

    <body>

        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js' integrity='sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz' crossorigin='anonymous'></script>

        <!-- Create a HTML table to display our results -->
        <table border=1 class="table table-bordered table-striped text-center">

            <!-- Create a new row for the headers -->
            <tr class="text-center">

                <th>Normal Word</th>
                <th>Word Backwards</th>
                <th>Pallindrome?</th>

            </tr>

        <?php
        // Use a for loop to loop through the array of words and get the
        // normal word, the backward word, and the result if it is a palindrome
        foreach($words as $word){

            // Call the reverseWord function to get the word backwards
            // and assign it to a variable
            $bw = reverseWord($word);

            // Use IF statements to check if the reversed word
            // is equal to the original word

            // If the reverse word and normal word are the same,
            // the word is a palindrome and make the flag equal to "Yes"
            if($bw == $word){

                $flag = "Yes.";

            // Else if the reverse word does not equal the original word,
            // the word is not a palindrome and make the flag equal to "No"
            }else{

                $flag = "No.";

            }

            ?>

            <!-- Display the results -->
            <tr>

                <td><?php echo $word?></td>
                <td><?php echo $bw?></td>
                <td><?php echo $flag?></td>
                
            </tr>

            <?php

        // Close the foreach loop
        }

        // Create a function called reverseWord()
        // This function will accept the original word as a parameter
        function reverseWord($wordCheck){

            // Create a variable to hold the original word reversed
            $newWord = "";

            // Split the original word into an array
            $newWordArray = str_split($wordCheck);

            // Use a forloop to run through the newWordArray backwards
            // Start at the size of the array and go back to 0
            // In the word 'user', the for loop would start at the letter r and
            // loop back to the letter u
            for($x = count($newWordArray) - 1; $x >= 0; $x--){

                // Take each character and assign it to the newWord variable
                $newWord .= $newWordArray[$x];

            }

            // Return the reversedWord
            return $newWord;

        }

        ?>

        </table>

    </body>

</html>
    