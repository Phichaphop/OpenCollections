<?php
    function DateTimeFormat($timestamp) {
        $DateTime = date("Y-m-d H:i:s", strtotime($timestamp));
        return $DateTime;
    }

    function DateFormat($timestamp) {
        $DateTime = date("d M Y", strtotime($timestamp));
        return $DateTime;
    }

    function TimeFormat($timestamp) {
        $DateTime = date("H:i:s", strtotime($timestamp));
        return $DateTime;
    }
?>