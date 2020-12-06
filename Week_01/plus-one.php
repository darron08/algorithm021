<?php

class Solution {

    /**
    * @param Integer[] $digits
    * @return Integer[]
    */
    function plusOne($digits) {
        for ($i = count($digits) - 1; $i >= 0; $i--) {
            $digits[$i] += 1;
            $digits[$i] = $digits[$i] % 10;
            if ($digits[$i] != 0) {
                return $digits;
            }
        }
        return array_merge([1], $digits);
    }
}