<?php
    $itemsPerPage = 10;

    // Get current page and name from GET parameters, or set default values
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $page_no = isset($_GET['name']) ? $_GET['name'] : '';

    // Ensure currentPage is at least 1
    if ($currentPage < 1) {
        $currentPage = 1;
    }

    // Split data into chunks
    $chunks = array_chunk($data, $itemsPerPage);

    // Check if there is data for the current page
    if (!empty($data)) {
        // Ensure currentPage does not exceed total pages
        $totalPages = count($chunks);
        if ($currentPage > $totalPages) {
            $currentPage = $totalPages;
        }
        $currentPageData = $chunks[$currentPage - 1];
    } else {
        $currentPageData = []; // No data available
    }
?>