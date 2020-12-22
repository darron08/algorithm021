<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums) {
        $len = count($nums);
        $res = [];
        if ($len == 0) {
            return $res;
        }
        $used = [];
        $path = [];
        $this->dfs($nums, $len, 0, $path, $used, $res);
        return $res;
    }

    /**
     * @param Integer[] $nums
     * @param Integer $len
     * @param Integer $depth
     * @param Integer[] $path
     * @param Boolean[] $used
     * @param Integer[][] $res
     * @return null
     */
    function dfs($nums, $len, $depth, $path, $used, &$res){
        if ($len == $depth) {
            $res[] = $path;
            return;
        }

        // 在非叶子结点处，产生不同的分支，这一操作的语义是：在还未选择的数中依次选择一个元素作为下一个位置的元素，这显然得通过一个循环实现。
        for ($i = 0; $i < $len; $i++) {
            if (!$used[$i]) {
                $path[] = $nums[$i];
                $used[$i] = true;
                $this->dfs($nums, $len, $depth + 1, $path, $used, $res);
                // 注意：下面这两行代码发生 「回溯」，回溯发生在从 深层结点 回到 浅层结点 的过程，代码在形式上和递归之前是对称的
                $used[$i] = false;
                array_pop($path);
            }
        }
    }
}