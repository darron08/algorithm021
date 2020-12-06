<?php

class MyCircularDeque {
    private $capacity;
    private $arr;
    private $front;
    private $rear;
    
    /**
     * Initialize your data structure here. Set the size of the deque to be k.
     * @param Integer $k
     */
    function __construct($k) {
        $this->capacity = $k + 1;
        $this->arr = [];
        $this->front = 0;
        $this->rear = 0;    
    }
  
    /**
     * Adds an item at the front of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function insertFront($value) {
        if ($this->isFull()) {
            return false;
        }
        $this->front = ($this->front - 1 + $this->capacity) % $this->capacity;
        $this->arr[$this->front] = $value;
        return true;
    }
  
    /**
     * Adds an item at the rear of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function insertLast($value) {
        if ($this->isFull()) {
            return false;
        }
        $this->arr[$this->rear] = $value;
        $this->rear = ($this->rear + 1) % $this->capacity;
        return true;
    }
  
    /**
     * Deletes an item from the front of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteFront() {
        if ($this->isEmpty()) {
            return false;
        }
        $this->front = ($this->front + 1) % $this->capacity;
        return true;
    }
  
    /**
     * Deletes an item from the rear of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteLast() {
        if ($this->isEmpty()) {
            return false;
        }
        // rear 被设计在数组的末尾，所以是 -1
        $this->rear = ($this->rear - 1 + $this->capacity) % $this->capacity;
        return true;
    }
  
    /**
     * Get the front item from the deque.
     * @return Integer
     */
    function getFront() {
        if ($this->isEmpty()) {
            return -1;
        }
        return $this->arr[$this->front];
    }
  
    /**
     * Get the last item from the deque.
     * @return Integer
     */
    function getRear() {
        if ($this->isEmpty()) {
            return -1;
        }
        // 当 rear 为 0 时防止数组越界
        return $this->arr[($this->rear - 1 + $this->capacity) % $this->capacity];
    }
  
    /**
     * Checks whether the circular deque is empty or not.
     * @return Boolean
     */
    function isEmpty() {
        return $this->front == $this->rear;
    }
  
    /**
     * Checks whether the circular deque is full or not.
     * @return Boolean
     */
    function isFull() {
        return (($this->rear + 1) % $this->capacity) == $this->front;
    }
}

/**
 * Your MyCircularDeque object will be instantiated and called as such:
 * $obj = MyCircularDeque($k);
 * $ret_1 = $obj->insertFront($value);
 * $ret_2 = $obj->insertLast($value);
 * $ret_3 = $obj->deleteFront();
 * $ret_4 = $obj->deleteLast();
 * $ret_5 = $obj->getFront();
 * $ret_6 = $obj->getRear();
 * $ret_7 = $obj->isEmpty();
 * $ret_8 = $obj->isFull();
 */