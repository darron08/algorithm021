# 数组 array

## 时间复杂度

- 随机访问 O(1)

- 插入 O(n)

- 删除 O(n)



# 链表 linked list

## 时间复杂度

- prepend O(1)

- append O(1)

- lookup O(n)

- insert O(1)

- delete O(1)



# 跳表 skip list

设计出来是对标平衡树（AVL tree）和二分查找

## 时间复杂度

- 插入 O(logn)

- 删除 O(logn)

- 搜索 O(logn)

## 优势

原理简单、容易实现、方便扩展、效率更高

在很多热门项目里用来代替平衡树，如Redis、LevelDB等

## 原理

在链表的基础上，通过升维，也就是添加索引，来提高查询效率，由O(n)提升为O(logn)

## 跳表查询操作的时间复杂度推导

影响查询效率的因素主要是跳表的高度。在有n个数据的链表中，第k层索引的数量是n/2^k。假设最高层的索引节点数量是2，索引层高度值是h，那么就有2 = n/2^h，=> n = 2^(h+1)， => h = log2n - 1

因此，链表的高度为 log2n，查找时间复杂度就是是O(logn)。



## 空间复杂度

O(n)

## 空间复杂度推导

假设原始链表大小为 n，那第一级索引大约有 n/2 个结点，第二级索引大约有 n/4 个结点，以此类推，每上升一级就减少一半，直到剩下 2 个结点。如果我们把每层索引的结点数写出来，就是一个**等比数列**。

这几级索引的结点总和就是 n/2+n/4+n/8…+8+4+2=n-2。所以，跳表的空间复杂度是 O(n)。

又或者说，每层索引的数量是：n/2，n/4, n/8, ..., 8, 4, 2，因为是收敛的，所以空间复杂度是O(n)。



# 三数之和

## 地址

<https://leetcode-cn.com/problems/3sum/solution/3sumpai-xu-shuang-zhi-zhen-yi-dong-by-jyd/>

## 常见解法

1. 暴力：三重循环
2. hash：两重暴力+hash
3. 夹逼：因为不需要下标，可以排序后夹逼

## 疑问

夹逼法中，排序能不能直接用语言的API？



# 需要熟练的代码套路

## 数组遍历

对数组遍历，保证$i和$j不重复，这种代码必须要很熟悉

```
for ($i = 0; i < count($arr) - 2; $i++) {
    for ($j = 0; j < count($arr) - 1; $j++ {
        //do sth...
    }
}
```

## 双指针

双指针是一种很常用的手法，在三数之和和环形链表中都能用到。



# Stack 栈

先入后出 first in last out FILO

## 时间复杂度

添加 O(1)

删除 O(1)

查询 O(n)


# Queue 队列

先入先出 first in first out FIFO

## 时间复杂度

添加 O(1)

删除 O(1)

查询 O(n)



## 队列的实现

1. 用数组实现，叫做顺序队列
2. 用链表实现，叫做链式队列



### 数组实现

用数组实现有个问题：随着head指针和tail指针不断往后移动，当tail移动到最右边，即使数组中还有空闲空间，也无法继续往队列中添加数据了。为了解决这个问题，在入队的时候，需要进行数据搬移。代码如下：

```java
publi boolean enqueue(String item) {
    //tail == n表示队列末尾没有空间了
    if (tail == n) {
        //tail == n && head == 0表示整个队列都占满了
        if (head == 0) {
            return false;
        }
        //数据搬移
        for (int i = head; i < tail; ++i) {
			items[i-head] = items[i];
        }
        //搬移完之后重新更新head和tail
        tail -= head;
        head = 0;
    }
    
    items[tail] = item;
    ++tail;
    return true;
}
```



## 循环队列

上面用数组来实现队列的情况，在tail == n时，会有数据搬移操作，这样入队性能会受到影响。



## 非循环队列

队空条件: head == tail

队满条件: tail == n

### 循环队列

队空条件: head == tail

队满条件: (tail +1)%n == head



# Deque 双端队列 Double-End Queue

## 时间复杂度

添加 O(1)

删除 O(1)

查询 O(n)

实战、高级语言中更常用



# Priority Queue 优先队列

## 时间复杂度

插入操作 O(1)

取出操作 O(logn) 按照元素优先级取出



底层具体实现的数据结构较为多样和复杂，可以是heap，BST(binary search tree),  treap

heap实现：

二叉树实现，Fibonacci堆

面试出现比较多



# 学习链接

## Java源码分析（ArrayList）

<http://developer.classpath.org/doc/java/util/ArrayList-source.html>

## Linked List的标准实现代码

<https://www.geeksforgeeks.org/implementing-a-linked-list-in-java-using-class/>

## Java源码分析（LinkedList）

<http://developer.classpath.org/doc/java/util/LinkedList-source.html>

## LRU Cache - Linked list: LRU缓存机制

<https://leetcode-cn.com/problems/lru-cache/>

## Redis - Skip List: 跳跃表、为啥Redis使用跳表而不是红黑树？

<https://www.zhihu.com/question/20202931>