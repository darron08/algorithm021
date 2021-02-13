<?php

class Solution {
    /**
     * @param Integer $n
     * @return Integer
     */
    function hammingWeight($n) {
        $cnt = 0;
        while ($n) {
            $n &= $n - 1;
            $cnt++;
        }
        return $cnt;
    }
}