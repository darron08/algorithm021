<?php


class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return String
     */
    function reverseStr($s, $k) {
        $len = strlen($s);
        for ($i = 0; $i < $len; $i += 2 * $k) {
            $left = $i;
            $right = $i + $k - 1 < $len - 1 ? $i + $k - 1 : $len - 1;
            while ($left < $right) {
                $tmp = $s[$left];
                $s[$left++] = $s[$right];
                $s[$right--] = $tmp;
            }
        }
        return $s;
    }
}