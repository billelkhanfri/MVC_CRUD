<?php
require_once(__DIR__ . '/variables.php');

// Function to generate select options from a given array of values
function generateSelectOptions($array, $fieldName) {
    // Extract unique values of the specified field from the array
    $uniqueValues = array_unique(array_column($array, $fieldName));

    // Initialize an empty string to accumulate the options
    $options = "";

    // Loop through the unique values and generate options
    foreach ($uniqueValues as $value) {
        $options .= "<option value=\"$value\">$value</option>";
    }

    return $options;
}






if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Assuming $films contains your data
    
    // Initialize $filterData with all films
    $filterData = $employee;

    // Apply gender filter if provided
    if (isset($_GET['gender'])) {
        $filterData = array_filter($filterData, function($film) {
            return $film['gender'] == $_GET['gender'];
        });
    }

     // Apply project filter if provided
    if (isset($_GET['projet'])) {
        $filterData = array_filter($filterData, function($projet) {
            return $projet['projet'] == $_GET['projet'];
        });
    }

    // Apply search filter if search term is not empty
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $searchTerm = $_GET['search'];
        // Filter films whose titles contain the search term
        $filterData = array_filter($filterData, function($name) use ($searchTerm) {
            // Perform a case-insensitive partial match on the title
            return stripos($name['last_name'], $searchTerm) === 0;
        });
    }

    // Apply descending order if requested
    if (isset($_GET['order']) && $_GET['order'] == "DESC") {
        // Sort the filtered data by title in descending order
        usort($filterData, function($a, $b) {
            return strcasecmp($b['last_name'], $a['last_name']);
        });
    }


      // Apply Ascending order if requested
    if (isset($_GET['order']) && $_GET['order'] == "ASC") {
        // Sort the filtered data by title in descending order
        usort($filterData, function($a, $b) {
            return strcasecmp($a['last_name'], $b['last_name']);
        });
    }
}




?>
