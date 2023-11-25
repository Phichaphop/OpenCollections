<?php
    function CutNameList($data) {
        $wordCount = str_word_count($data);

        if ($wordCount > 3) {
            $words = explode(' ', $data);
            $limited = implode(' ', array_slice($words, 0, 3));
            return $limited . "...";
        } else {
            return $data;
        }
    }

    function CutDetailList($data) {
        $wordCount = str_word_count($data);
        if ($wordCount > 3) {
            $words = explode(' ', $data);
            $limited = implode(' ', array_slice($words, 0, 3));
            return $limited . "...";
        } else {
            return $data;
        }
    }

    function CutAbstract($data) {
        $wordCount = str_word_count($data);
        if ($wordCount > 50) {
            $words = explode(' ', $data);
            $limitedData = implode(' ', array_slice($words, 0, 50));
            return $limitedData . "...";
        } else {
            return $data;
        }
    }
?>