<!--

Andrew McCloud

September 20, 2023

Professor Voelcker

Module 9 Coding Assignment

-->

<?php

// Include the database connection file to connect to the database
include 'AndrewDatabaseConnection.php';

// If the 'Populate Table' button is clicked
if(isset($_POST['searchBtn'])){

    if(!empty($_POST['searchOptions'])){

        $searchChoice = $_POST['searchOptions'];

        if(!empty($_POST['searchTxt'])){

            $searchText = $_POST['searchTxt'];

            $sqlSearch = "SELECT * FROM golfers WHERE {$searchChoice} = ?";

            $statement = $conn->prepare($sqlSearch);

            $statement->bind_param("s", $searchText);

            $statement->execute();

            $results = $statement->get_result();

            ?>

                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Birth Country</th>
                    <th>Date of Birth</th>
                </tr>

            <?php

            while($res = $results->fetch_assoc()){

            ?>

            <tr>
                <td><?php echo $res['firstName']; ?></td>
                <td><?php echo $res['lastName']; ?></td>
                <td><?php echo $res['age']; ?></td>
                <td><?php echo $res['birthCountry']; ?></td>
                <td><?php echo $res['dateOfBirth']; ?></td>
            </tr>

            <?php

            }
            
        }else{

            ?>

                <h2>Please enter in text to search</h2>

            <?php

        }

    }else{

        ?>

        <h2>Please select an option in the dropdown!</h2>

        <?php

    }

}

?>