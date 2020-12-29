<?php

class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        if (count($prices) < 2) {
            return 0;
        }

        $profit = 0;
        for ($i = 1; $i < count($prices); $i++) {
            $diff = $prices[$i] - $prices[$i - 1];
            if ($diff > 0) {
                $profit += $diff;
            }
        }
        return $profit;
    }
}