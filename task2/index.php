<?php

// call config file to establish connection to db, file to log and to process response
require_once __DIR__ . '/helper/config.php';
require_once __DIR__ . '/helper/log.php';
require_once __DIR__ . '/helper/response_formater.php';

// Get the user's input from the AJAX request
$searchInput = isset($_POST['searchInput']) ? $_POST['searchInput'] : '';

function receive_input($searchInput)
{
    // check if search input is passed and not empty
    if (!empty($searchInput)) {
        try {
            $connection = db_connection();
            
            // Select where match using a prepared statement to query the database
            $sql =
                'SELECT sureName, firstName, emailaddress
                 FROM profiles 
                 join emails 
                 on profiles.userRefID = emails.userRefID 
                 where sureName like ? or  firstName like ? ';
            
            // Prepare the statemente
            $stmt = $connection->prepare($sql);

            // Bind the parameter with a wildcard character for partial matching
            $nameParam = '%' . $searchInput . '%';

            // Bind the parameter to the statement
            $stmt->bind_param('ss', $nameParam, $nameParam);

            // Execute the query
            $stmt->execute();

            // Get the results
            $result = $stmt->get_result();
            
            // Fetch the results as an associative array
            $resultsArray = [];
            
            while ($row = $result->fetch_assoc()) {
                $resultsArray[] = $row;
            }

            // // Close the database connection
            $stmt->close();
            $connection->close();
            
            // Return the results as JSON using reusable response helper
            if (empty($resultsArray)) {
                response(null, 300, 'No Record Found');
            } else {
                response($resultsArray);
            }

        } catch (Exception $ex) {
            // log error exception if thrown
            logger($ex->getMessage());
            
            response(null, 400, 'Server Error!! Please try again later');
        }
    } else {
        response(null, 302, 'Please input Name');
    }
}

receive_input($searchInput);