<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function firstUniqChar($s) {
        $map = [];
        $len = strlen($s);
        for ($i = 0; $i < $len; $i++) {
            $map[$s[$i]]++;
        }
        for ($i = 0; $i < $len; $i++) {
            if ($map[$s[$i]] == 1) return $i;
        }
        return -1;
    }
}