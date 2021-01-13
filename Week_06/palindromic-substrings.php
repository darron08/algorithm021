<?php

class Solution {
    /**
     * @param String $s
     * @return Integer
     */
    function countSubstrings($s) {
        $len = strlen($s);
        $cnt = 0;
        for ($j = 0; $j < $len; $j++) {
            for ($i = 0; $i <= $j; $i++) {
                if ($i == $j) {
                    $dp[$i][$j] = true;
                    $cnt++;
                } elseif ($j - $i == 1 && $s[$i] == $s[$j]) {
                    $dp[$i][$j] = true;
                    $cnt++;
                } elseif ($j - $i > 1 && $s[$i] == $s[$j] && $dp[$i+1][$j-1]) {
                    $dp[$i][$j] = true;
                    $cnt++;
                } else {
                    $dp[$i][$j] = false;
                }
            }
        }
        return $cnt;
    }
}