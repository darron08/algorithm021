<?php

class Solution {

    private $_res = [];

    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n) {
        $this->_generate(0, 0, $n, '');
        return $this->_res;
    }

    function _generate($left, $right, $n, $s){
        if ($left == $n && $right == $n) {
            $this->_res[] = $s;
        }

        if ($left < $n) $this->_generate($left + 1, $right, $n, $s.'(');
        if ($right < $left)  $this->_generate($left, $right + 1, $n, $s.')');
    }
}