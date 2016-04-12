---
title: 讨论区开发tips
tags: TODO,Question
---
## 遗留问题
### whh
* <font color=blue>DONE:需要进行的服务器上的测试</font>
    * <font color=blue>DONE:使用session的地方</font>
    * <font color=blue>DONE:回帖(==fatherID==)</font>
* <font color=blue>DONE:图片的引用</font>
* @列表第二次点开取消选择某人没用
* <font color=blue>DONE:删除帖子同时要删除包含的图片视频等</font>
* 回帖时的@问题
* <font color=blue>NDONE:orderBy分页问题</font>
* 提交新帖子之后，前段动画效果与后台刷新之间的配合

### ykd
* 发帖界面复选框,按钮的美化
* <font color=blue>N:remind页面点击之后要能回退(修改url)</font>
* <font color=green>各种需要匿名的时候进行屏蔽</font>
* <font color=blue>N:进入具体的帖子跳转到具体位置</font>
* <font color=blue>N:showWholeRemind的折叠问题</font>
* <font color=blue>提醒还有bug，点击失效，ABC帖子不能分开</font>

### wjf
* ***发帖模型存在一些字符串处理的漏洞***
* 所有功能都确认之后，离开表单的警告功能需要规整代码
* <font color=blue>**匿名帖子的回复之后的提醒问题**</font>

## 经验
* 打开对外服务器的方法:php -S 0.0.0.0:8080
* 直接访问http://59.66.134.208:8080/course/discussion/discussion
* 加入图片形式 img src="/img/discussion/XX.png"
* $(this).destory();析构元素
* <font color=red>reset之前一定要commit!</font>

## TODO
1. <font color=blue>DONE@列表的美化:whh</font>
2. <font color=blue>DONE:*回帖和@的测试*:whh</font>
5. <font color=blue>DONE:**离开编辑框需要进行询问(JS):wjf**</font>
6. <font color=blue>DONE:增加返回顶部的js特效:whh</font>
7. <font color=blue>DONE:发帖之后的动画效果:whh</font>
9. <font color=blue>NDONE:列表分页或者自动加载:whh</font>
1. <font color=blue>NDONE:解决帖子列表的重叠，混乱问题，测试长帖子的显示:wjf</font>
1. <font color=blue>NDONE:发帖失败的处理:wjf</font>
4. <font color=green>主页背景使用一个模糊图片:ykd</font>
1. <font color=blue>阅读之间相差的时间,可能导致刷新还是未读:whh</font>
1. <font color=blue>NDONE:showholepost页面用到piazza的样式要更改:whh</font>
1. <font color=green>打开帖子时应对帖子不存在的问题,提醒方面也要做处理:wjf</font>
1. <font color=green>发帖/回帖之后刷新显示当前的帖子(调用JS):ykd</font>

# **大家有问题或者什么经验都记在这里呀**