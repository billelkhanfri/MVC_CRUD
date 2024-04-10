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



$filterData = [];

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Assuming $films contains your data
    
    // Apply category filter
    if (isset($_GET['category'])) {
        $filterData = array_filter($films, function($film) {
            return $film['category'] == $_GET['category'];
        });
    } else {
        $filterData = $films; 
    }

    // Apply descending order if requested
    if (isset($_GET['order']) && $_GET['order'] == "DESC") {
        // Sort the filtered data by title in descending order
        usort($filterData, function($a, $b) {
            return strcmp($b['title'], $a['title']);
        });
    }
}
?>
