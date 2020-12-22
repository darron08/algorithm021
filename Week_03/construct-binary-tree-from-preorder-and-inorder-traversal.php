<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution {

    private $inorderMap = null;

    /**
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    function buildTree($preorder, $inorder) {
        for ($i = 0; $i < count($inorder); $i++) {
            $this->inorderMap[$inorder[$i]] = $i;
        }
        return $this->buildTreeHelper($preorder, 0, count($preorder), $inorder, 0, count($inorder));
    }

    function buildTreeHelper($preorder, $pStart, $pEnd, $inorder, $iStart, $iEnd) {
        if ($pStart == $pEnd) {
            return null;
        }
        $rootVal = $preorder[$pStart];
        $root = new TreeNode($rootVal);
        $iRootIndex = $this->inorderMap[$rootVal];
        $leftNum = $iRootIndex - $iStart;
        $root->left = $this->buildTreeHelper($preorder, $pStart + 1, $pStart + $leftNum + 1, $inorder, $iStart, $iRootIndex);
        $root->right = $this->buildTreeHelper($preorder, $pStart + $leftNum + 1, $pEnd, $inorder, $iRootIndex + 1, $iEnd);
        return $root;
    }
}