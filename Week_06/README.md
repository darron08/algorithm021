# 动态规划定义

“Simplifying a complicated problem by breaking it down into simpler sub-problems” (in a recursive manner)



Divide & Conquer + Optimal substructure
分治 + 最优子结构 



不需要把所有状态存下来，只需要存最优的状态。当然我们需要证明如果每一步都只存最优的值，最后能推导出一个全局的最优的值。因此，需要引入缓存（或者叫状态的存储数组），并且每一步都把次优的状态淘汰掉，只保留在这一步里面最优或者较优的一些状态来推导出最后的全局最优。



# 动态规划和递归、分治

动态规划和递归或者分治没有根本上的区别（关键看有无最优的子结构） 

- 共性：找到重复子问题 

- 差异性：最优子结构、中途可以淘汰次优解  



动态规划往往可以把时间复杂度从指数级将为O(n^2)或O(n)，即多项式级别。



# 斐波那契数列

## 递归代码

```java
int fib(int n) {
	return n <= 1 ? n : fib(n - 1) + fib(n - 2);
}
```



## 递归 + 缓存

```java
int fib(int n) {
    if (n <= 1) {
		return n;
    }
    if (memo[n] == 0) {
		memo[n] = fib(n - 1) + fib(n - 2);
    }
	return memo[n];
}
```



# 自顶向下
## 递归

![](E:\算法训练营\自顶向下.png)

## 自底向上 bottom up
## 循环
```java
a[0] = 0, a[1] = 1;
for (int i = 2; i <= n; ++i) {
	a[i] = a[i-1] + a[i-2];
}
```



# 复杂dp的特点

1. 维度不一样，二维或者三维
2. 中间会取舍最优子结构



# 动态规划关键点

1. 最优子结构 opt[n] = best_of(opt[n-1], opt[n-2], ...)

2. 存储中间状态：opt[i]

3. 递推公式（状态转移方程或者DP方程）

   fib: opt[i] = opt[n-1] + opt[n-2]

   二维路径：opt[i, j] = opt\[i+1][j] + opt\[i][j+1]

