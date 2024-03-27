<?php
// Include the necessary files and classes


$act = "SearchController"; // Default action

// Check if the 'act' parameter is set in the URL
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

// Switch based on the action
switch ($act) {
    case 'search_act':
        // Get the search term from the URL parameters
        $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

        // Instantiate the SearchModel class
        $searchModel = new SearchModel();

        // Call the searchProducts method
        $results = $searchModel->searchProducts($searchTerm);
        include './View/SearchPage.php'; // Include the view file
        break;

    // Add more cases for other actions if needed
}
?>
