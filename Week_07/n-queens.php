<?php

class Solution {

    private $_col = [];
    private $_pie = [];
    private $_na = [];
    private $_res = [];

    /**
     * @param Integer $n
     * @return String[][]
     */
    function solveNQueens($n) {
        if ($n <= 0) {
            return $this->_res;
        }

        $this->_backtrace($n, 0, []);
        return $this->_res;
    }

    function _backtrace($n, $level, $path){
        if ($level >= $n) {
            $this->_res[] = $this->_trans($path);
            return;
        }

        for ($i = 0; $i < $n; $i++) {
            if ($this->_col[$i] || $this->_na[$i + $level] || $this->_pie[$i - $level]) {
                continue;
            }

            $this->_col[$i] = true;
            $this->_na[$i + $level] = true;
            $this->_pie[$i - $level] = true;
            $path[] = $i;
            $this->_backtrace($n, $level + 1, $path);
            array_pop($path);
            $this->_col[$i] = false;
            $this->_na[$i + $level] = false;
            $this->_pie[$i - $level] = false;
        }
    }

    function _trans($path){
        $res = [];
        $len = count($path);
        for ($i = 0; $i < $len; $i++) {
            $s = '';
            for ($j = 0; $j < $len; $j++) {
                $s = $j == $path[$i] ? $s.'Q' : $s.'.';
            }
            $res[] = $s;
        }
        return $res;
    }
}