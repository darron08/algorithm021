<?php

class Solution {

    /**
     * @param Integer[] $bills
     * @return Boolean
     */
    function lemonadeChange($bills) {
        $five = $ten = 0;

        foreach ($bills as $bill) {
            if ($bill == 5) {
                $five += 1;
            } elseif ($bill == 10) {
                if ($five < 1) {
                    return false;
                }
                $five -= 1;
                $ten += 1;
            } elseif ($bill == 20) {
                if ($ten > 0 && $five > 0) {
                    $ten -= 1;
                    $five -= 1;
                } elseif ($five > 2) {
                    $five -= 3;
                } else {
                    return false;
                }
            }
        }
        return true;
    }
}