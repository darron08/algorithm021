<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal($root) {
        $res = [];
        $stack = [
            [
                $root,
                0   //0 未访问过， 1 访问过
            ]
        ];
        while (!empty($stack)) {
            $top = array_pop($stack);
            if (is_null($top[0])) {
                continue;
            }
            if ($top[1] == 0) {
                $stack[] = [$top[0]->right, 0];
                $stack[] = [$top[0], 1];
                $stack[] = [$top[0]->left, 0];
            } else {
                $res[] = $top[0]->val;
            }
        }
        return $res;
    }
}