# 位运算

## 位运算符

注意：这里演示用的是4位，但是老式的计算机一般是32位，新式的计算机一般是64位。

### 左移

运算符：<<

示例：0011 => 0110

### 右移

运算符：>>

示例：0110 => 0011

### 按位或

运算符：|

### 按位与

运算符：&

### 按位取反

运算符：~

### 按位异或 XOR

运算符：^

示例：0011 ^ 1011 = 1000

相同为0不同为1，也可以用“不进位加法”来理解。

#### 异或操作的一些特点：

- x ^ 0 = x
- x ^ 1s = ~x //注意，1s = ~0
- x ^ (~x) = 1s
- x ^ x = 0
- c = a ^ b => a ^ c = b, b ^ c = a //交换两个数
- a ^ b ^ c = a ^ (b ^ c) = (a ^ b) ^ c //associative



## 指定位置的位运算

注意，以下斜体加粗的运算比较常用，需要记一下。

1. 将x最右边的n位清零：x & (~0 << n)
2. ***获取x的第n位值（0或者1）：(x >> n) & 1***
3. 获取x的第n位的幂值：x & (1 << n)
4. ***仅将第n位置为1：x | (1 << n)***
5. ***仅将第n位置为0：x & (~(1 << n))***
6. 将x最高位至第n位（含）清零：x & ((1 << n) - 1)



## 实战位运算要点

### 判断奇偶

x % 2 == 1 等价于 (x & 1) == 1

x % 2 == 0 等价于 (x & 1) == 0

### 除以2

x >> 1 等价于 x/2

x = x/2 等价于 x = x >> 1

mid = (left + right) / 2 等价于 mid = (left + right) >> 1

### 清零最低位的1

x & (x - 1)，注意不是第0位，而是最低位

### 得到最低位的1

x & -x

### x & ~x => 0



## 实战题目

### 位1的个数

x & (x - 1)，清零最低位的1

### 2的幂

如果一个整数是2的幂次，那么它的二进制表达式里有且仅有一个二进制位是1。

也是用了x & (x - 1)，清零最低位的1

### 比特位计数

动态规划



# 布隆过滤器 Bloom Filter

一个很长的二进制向量和一系列随机映射函数。布隆过滤器可以用于检索一个元素是否在一个集合中。

- 优点：空间效率和查询时间都远远超过一般的算法。

- 缺点：有一定的误识别率和删除困难。



## 案例

1. 比特币网络
2. 分布式系统（Map-Reduce）— Hadoop、search engine
3. Redis缓存
4. 垃圾邮件、评论等的过滤



# LRU Cache

LRU: Least Recently Used

- 两个要素：大小、替换策略
- Hash Table + Double LinkedList
- 查询 O(1)
- 修改、更新 O(1)



除了LRU，常见的内存替换算法还有LFU (least frequently used)



# 排序算法

1. 比较类排序：通过比较来决定元素间的相对次序，由于其时间复杂度不能突破O(nlogn)，因此也称为非线性时间比较类排序。

2. 非比较类排序：不通过比较来决定元素间的相对次序，它可以突破基于比较排序的时间下界，以线性时间运行，因此也称为线性时间非比较类排序。一般只能用于整型数据类型。



## 比较类排序

### 交换排序

1. 冒泡排序
2. 快速排序

### 插入排序

1. 简单插入排序
2. 希尔排序

### 选择排序

1. 简单选择排序
2. 堆排序

### 归并排序

1. 二路归并排序
2. 多路归并排序



## 非比较类排序

- 计数排序
- 桶排序
- 基数排序



## 初级排序 - O(n^2)

1. 选择排序（Selection Sort）：每次**找最小值**，然后放到待排序数组的**起始位置**。
2. 插入排序（Insertion Sort）：从前到后逐步构建有序序列；对于未排序数据，在已排序序列中从后往前扫描，找到相应位置插入。
3. 冒泡排序（Bubble Sort）：嵌套循环，每次查看相邻的元素，如果逆序则交换。



## 高级排序 - O(nlogn)

### 快速排序 Quick Sort — 分治

数组取标杆pivot，将小元素放pivot左边，大元素放右侧，然后依次对左边和右边的子数组继续快排；以达到整个序列有序。

pivot可以选中间，也可以选最左边或最右边，其实没有太大的区别。



#### 示例代码

```java
// 调用方式：quickSort(a, 0, a.length - 1);
public static void quickSort(int[] array, int begin, int end) {
    if (end <= begin) return;
    int pivot = partition(array, begin, end);
    quickSort(array, begin, pivot - 1);
    quickSort(array, pivot + 1, end);
}

static int partition(int[] a, int begin, int end) {
    // pivot: 标杆位置，counter: 小于pivot的元素的个数
    int pivot = end, counter = begin;
    for (int i = begin; i < end; i++) {
        if (a[i] < a[pivot]) {
            int temp = a[counter];
            a[counter] = a[i];
            a[i] = temp;
            counter++;
        }
    }
    int temp = a[pivot];
    a[pivot] = a[counter];
    a[counter] = temp;
    return counter;
}
```



### 归并排序 Merge Sort — 分治

1. 把长度为n的输入序列分成两个长度为n/2的子序列；
2. 对这两个子序列分别采用归并排序；
3. 将两个排序好的子序列合并成一个最终的排序序列。



#### 示例代码

```java
public static void mergeSort(int[] array, int left, int right) {
    if (right <= left) return;
    int mid = (left + right) >> 1; // (left + right) / 2
    mergeSort(array, left, mid);
    mergeSort(array, mid + 1, right);
    merge(array, left, mid, right);
}

public static void merge(int[] arr, int left, int mid, int right) {
    int[] temp = new int[right - left + 1]; // 中间数组
    int i = left, j = mid + 1, k = 0;
    while (i <= mid && j <= right) {
        temp[k++] = arr[i] <= arr[j] ? arr[i++] : arr[j++];
    }
    while (i <= mid)   temp[k++] = arr[i++];
    while (j <= right) temp[k++] = arr[j++];
    for (int p = 0; p < temp.length; p++) {            
        arr[left + p] = temp[p];
    }
    // 也可以用 System.arraycopy(a, start1, b, start2, length)
}
```



### 快排和归并总结

快排和归并具有相似性，但步骤相反。

归并：先排序左右子数组，然后合并两个有序子数组。

快排：先调配出左右子数组，然后对于左右子数组进行排序。



### 堆排序 Heap Sort

堆插入 O(logn)，取最大/最小值 O(1)

1. 数组元素依次建立小顶堆
2. 依次取堆元素，并删除



#### 示例代码

```java
static void heapify(int[] array, int length, int i) {
	int left = 2 * i + 1, right = 2 * i + 2;
	int largest = i;
	if (left < length && array[left] > array[largest]) {
		largest = left;
	}
	if (right < length && array[right] > array[largest]) {
		largest = right;
	}
	if (largest != i) {
		int temp = array[i];
		array[i] = array[largest];
		array[largest] = temp;
		heapify(array, length, largest);
	}
}

public static void heapSort(int[] array) {
	if (array.length == 0) return;
	int length = array.length;
	for (int i = length / 2-1; i >= 0; i-)
		heapify(array, length, i);
	for (int i = length - 1; i >= 0; i--) {
		int temp = array[0]; array[0] = array[i]; array[i] = temp;
		heapify(array, i, 0);
	}
}
```



## 特殊排序 O(n)

### 计数排序（Counting Sort）

计数排序要求输入的数据必须是有确定范围的整数。将输入的数据值转化为键存储在额外开辟的数组空间中；然后依次把计数大于1的填充回原数组。

### 桶排序（Bucket Sort）

桶排序的工作原理：假设输入数据服从均匀分布，将数据分到有限数量的桶里，每个桶再分别排序（有可能再使用别的排序算法或是以递归方式继续使用桶排序来排）。

### 基数排序（Radix Sort）

按照低位先排序，然后收集；再按照高位排序，然后再收集；依次类推，直到最高位。有时候有些属性是有优先级顺序的，先按低优先级排序，再按高优先级排序。