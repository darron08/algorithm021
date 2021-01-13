<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minPathSum($grid) {
        $h = count($grid);
        $w = $grid[0] ? count($grid[0]) : 0;

        $sum = [];
        for ($i = 0; $i < $h; $i++) {
            for ($j = 0; $j < $w; $j++) {
                if ($i == 0 && $j == 0) {
                    $sum[$i][$j] = $grid[$i][$j];
                } elseif ($i == 0 && $j > 0) {
                    $sum[$i][$j] = $grid[$i][$j] + $sum[$i][$j - 1];
                } elseif ($j == 0 && $i > 0) {
                    $sum[$i][$j] = $grid[$i][$j] + $sum[$i - 1][$j];
                } else {
                    $sum[$i][$j] = $grid[$i][$j] + min($sum[$i][$j - 1], $sum[$i - 1][$j]);
                }
            }
        }
        return $sum[$h-1][$w-1];
    }
}