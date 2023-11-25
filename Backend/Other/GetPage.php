<?php
    $itemsPerPage = 10;
    if (isset($_GET['page'])) {
        $currentPage = $_GET['page'];
        $page_no = $_GET['name'] ?? '';
    } else {
        $currentPage = 1;
        $page_no = "1";
    }

    $chunks = array_chunk($data, $itemsPerPage);

    if (!$data) {
        
    } else {
        $currentPageData = $chunks[$currentPage - 1];
    }
    
    
?>