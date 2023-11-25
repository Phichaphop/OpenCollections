<div class="menu-page">
    <?php for ($page_no = 1; $page_no <= count($chunks); $page_no++) {
        echo "<a class='menu-page-no' href='?page=$page_no'>$page_no</a> ";
    } ?>
</div>