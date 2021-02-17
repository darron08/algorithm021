# 分治

归并排序是一个典型的分而治之。



## 代码模板

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



# 动态规划

分治 + 解决子问题的重复计算，就是动态规划。

一般是用循环实现（顺推），与分治的方向是相反的。



## DP顺推模板

```
function DP():
dp = [][] # 假设是二维的情况
for i = 0 .. M {
	for j = 0 .. N {
		dp[i][j] = _Function(dp[i'][j']...)
	}
}
return dp[M][N];
```



## 关键点

动态规划和递归或分治没有根本上的区别（关键看有无最优的子结构）

拥有共性：找到重复子问题

差异性：最优子结构、中途可以淘汰次优解



## 状态转移方程串讲

### 爬楼梯

f(n) = f(n -  1) + f(n - 2), f(1) = 1, f(0) = 0



### 不同路径

f(x, y) = f(x - 1, y) + f(x, y - 1)



### 打家劫舍

#### 方式1

dp[i] = max(dp[i - 2] + nums[i] + dp[i - 1])

#### 方式2

dp[i]\[0] = max(dp[i - 1]\[0], dp[i - 1]\[1]);

dp[i]\[1] = dp[i - 1]\[0] + nums[i];



### 最小路径和

dp[i]\[j] = min(dp[i - 1]\[j], dp[i]\[j - 1]) + A[i]\[j]



## 复杂度来源

1. 状态拥有更多维度
2. 状态方程更加复杂



# 字符串匹配算法

1. 暴力法（brute force）
2. Rabin-Karp算法
3. KMP算法



## Rabin-Karp算法

在朴素算法中，我们需要挨个比较所有字符，才知道目标字符串中是否包含子串/那么，是否有别的方法可以用来判断目标字符串是否包含子串呢？

为了避免挨个字符对目标字符串和子串进行比较，我们可以尝试一次性判断两者是否相等。因此，我们需要一个好的哈希函数（hash function）。通过哈希函数，我们可以算出子串的哈希值，然后将它和目标字符串的哈希值进行比较。



### 思想

1. 假设子串的长度为M(pat)，目标字符串的c长度为N(txt)
2. 计算子串的hash值hash_pat
3. 计算目标字符串txt中每个长度为M的子串的hash值（共需要计算N - M + 1次）
4. 比较hash值：如果hash值不同，字符串必然不匹配；如果hash值相同，还需要使用朴素算法再次判断。



## KMP算法（Knuth-Morris-Pratt）

当子串与目标字符串不匹配时，其实你已经知道了前面已经匹配成功那一部分的字符（包括子串和目标字符串）。