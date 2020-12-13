<?php

class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t) {
        $sLen = strlen($s);
        if ($sLen != strlen($t)) {
            return false;
        }
        $map = [];
        $a = ord('a');
        for ($i = 0; $i < $sLen; $i++) {
            $map[ord($s[$i]) - $a] += 1;
            $map[ord($t[$i]) - $a] -= 1;
        }
        for ($i = 0; $i < 26; $i++) {
            if ($map[$i] != 0) {
                return false;
            }
        }
        return true;
    }
}