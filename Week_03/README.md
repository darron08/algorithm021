# 递归 Recursion

## 为什么树的面试题一般都是用递归来解决？

1. 节点的定义
2. 重复性（自相似性）



## python代码模板

```python
def recursion(level, param1, param2, ...):
    # recursion terminator
    if level > MAX_LEVEL:
        process_result
        return
    
    # process logic in current level
    process(level, data...)
    
    # dirll down
    self.recursion(level + 1, p1, ...)
    
    # reverse the current level status if needed
```



## Java代码模板

```java
public void recur(int level, int param) {
	// terminator
    if (level > MAX_LEVEL) {
        // process result
        return;
    }
    
    // process current logic
    process(level, param);
    
    // drill down
    recur( level: level + 1, newParam);
    
    // restore current status
}
```



## 递归模板总结

1. terminator
2. process
3. drill down
4. reverse states



## 思维要点

1. 不要人肉进行递归（最大误区）
2. 找到最近最简方法，将其拆解成可重复解决的问题（重复子问题）
3. 数学归纳法思维



## 爬楼梯

- n等于1时，f(n) = 1

- n等于2时，f(n) = 2
- n等于3时，f(n) = f(1) + f(2), mutual exclusive, complete exhaustive 分项互斥，加在一起把所有可能性包含了
- n等于4时，f(n) = f(2) + f(3)

- ...
- f(n) = f(n-1) + f(n-2)



## 三种解法

1. 傻递归
2. 动态规划（一个数组进行循环）
3. 二维矩阵



# 分治 回溯

- 最近重复性：分治、回溯

- 最优重复性：动态规划



# 分治 Divide & Conquer

## 分治代码模板

```python
def divide_conquer(problem, param1, param2, ...):
    # recursion terminator
    if problem is None:
        print_result
        return
    
    # prepare data
    data = prepare_data(problem)
    subproblems = split_problem(problem, data)
    
    # conquer subproblems
    subresult1 = self.divide_conquer(subproblems[0], p1, ...)
    subresult2 = self.divide_conquer(subproblems[1], p1, ...)
    subresult3 = self.divide_conquer(subproblems[2], p1, ...)
    ...
    
    # process and generate the final result
    result = process_result(subresult1, subresult2, subresult3, ...)
    
    # revert the current level states
```



# 回溯 backtracking

回溯法采用试错的思想，它尝试分步的去解决一个问题。在分步解决问题的过程中，当它通过尝试发现现有的分步答案不能得到有效的正确的解答的时候，它将取消上一步甚至是上几步的计算，再通过其它的可能的分步解答再次尝试寻找问题的答案。

回溯法通常用最简单的递归方法来实现，在反复重复上述的步骤后可能出现两种情况：

1. 找到一个可能存在的正确的答案；
2. 在尝试了所有可能的分步方法后宣告该问题没有答案。

在最坏的情况下，回溯法会导致一次复杂度为指数时间的计算。 

回溯算法的时间复杂度是指数级别的。



## 应用

深度优先搜索算法利用的是回溯算法思想。

在很多实际的软件开发场景中，比如正则表达式匹配、编译原理中的语法分析等。

很多经典的数学问题都可以用回溯算法解决，比如数独、八皇后、0-1 背包、图的着色、旅行商问题、全排列等等。



## 代码模板

```
result = []
def backtrack(路径, 选择列表):
    if 满足结束条件:
        result.add(路径)
        return

    for 选择 in 选择列表:
        做选择
        backtrack(路径, 选择列表)
        撤销选择
```



# 深度优先搜索 Depth First Search

深度优先搜索是一种用于遍历或搜索树或图的算法。这个算法会尽可能深的搜索树的分支。当结点 v 的所在边都己被探寻过，搜索将回溯到发现结点 v 的那条边的起始结点。这一过程一直进行到已发现从源结点可达的所有结点为止。如果还存在未被发现的结点，则选择其中一个作为源结点并重复以上过程，整个进程反复进行直到所有结点都被访问为止。

- 状态：每一个结点表示了求解问题的不同阶段

- 深度优先遍历在回到上一层结点时需要“状态重置”

- 深度优先遍历相对广度优先遍历更节约空间

- 树形问题上的深度优先遍历，就是大名鼎鼎的回溯算法

- 状态重置就是回溯算法里的回溯的意思