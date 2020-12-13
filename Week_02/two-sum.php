<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $map = [];
        for ($i = 0; $i < count($nums); $i++) {
            if (isset($map[$target - $nums[$i]])) {
                return [$i, $map[$target-$nums[$i]]];
            }
            $map[$nums[$i]] = $i;
        }
        return [];
    }
}