---
title: 讨论区开发tips
tags: TODO,Question
---
## 遗留问题
### whh
* 需要进行的服务器上的测试
    * <font color=blue>DONE:使用session的地方</font>
    * <font color=blue>DONE:回帖(==fatherID==)</font>
    * 阅读之间相差的时间,可能导致刷新还是未读
* 发帖之后的动画效果
* showholepost页面用到piazza的样式要更改
* <font color=red>**打开帖子时应对帖子不存在的问题,提醒方面也要做处理</font>**
* 图片的引用
* @列表第二次点开取消选择某人没用
* <font color=blue>DONE:删除帖子同时要删除包含的图片视频等</font>

### ykd
* 发帖界面复选框,按钮的美化
* remind页面点击之后要能回退(==修改url==):cry:
* 各种需要匿名的时候进行屏蔽
* 进入具体的帖子跳转到具体位置
* 匿名帖子的回复之后的提醒问题
* showWholeRemind的折叠问题

### wjf
* 发帖模型存在一些字符串处理的漏洞
* 所有功能都确认之后，离开表单的警告功能需要规整代码


## 经验
* 打开对外服务器的方法:php -S 0.0.0.0:8080
* 直接访问http://59.66.134.208:8080/course/discussion/discussion
* 加入图片形式 img src="/img/discussion/XX.png"
* $(this).destory();析构元素
* 提交新帖子之后，前段动画效果与后台刷新之间的配合

## TODO
1. <font color=blue>DONE:@列表的美化:whh</font>
2. *回帖和@的测试*
3. **删除之后及时更新其他在线用户的列表**
4. <font color=green>主页背景使用一个模糊图片:ykd</font>
5. <font color=blue>DONE:**离开编辑框需要进行询问(JS):wjf**</font>
6. <font color=blue>DONE:增加返回顶部的js特效:whh</font>
7. 精简帖子列表，滚动条美化
8. 列表分页或者自动加载
9. 解决帖子列表的重叠，混乱问题，测试长帖子的显示

# **大家有问题或者什么经验都记在这里呀**