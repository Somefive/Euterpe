需要进行的服务器上的测试
    使用session的地方 [OK]
        回帖（fatherID）[OK]
        阅读之间相差的时间 [OK]
    涉及localhost的地方 [OK]
        discussion.js [OK]
打开对外服务器的方法:php -S 0.0.0.0:8080 直接访问http://[59.66.134.208]:8080/course/discussion/discussion

ykd:发帖的界面优化，复选框的美化
wjf:离开编辑框需要进行询问
whh:


2016/3/19:
任务清单:
ykd:设计新表以及模型
    数据：  reminded{remindManId1:remindPostId1,remindManId2:remindPostId2,...}
            replyedOfA{replyedPostId:[replyManId1:replyPostId1,replyManId2:replyId2,...],...}
            replyedOfBC{格式如上}
    提供接口：
        对数据插入提供的函数：addRemindedData(remindedManId,remindedPostId,remindManId,remindPostId)
                              addReplyedOfA(replyedManId,replyedPostId,replyManId,replyPostId)
                              addReplyedOfBC(参数如上)
        对数据查询提供的函数: getRemindedData(remindedManId) return array("remindedPostId"=>["remindManId" => "remindPostId"],...)
                              getReplyedData(manId) return array("replyedPostId"=>["replyManId" => "replyPostId"],...)
        对数据删除提供的函数: deleteRemindedData(remindedManId,remindPostId)
                              deleteReplyedData(replyedManId,replyPostId)

wjf:写出action&view，可以简单显示有n未读，
                    postManName在帖子"引用帖子的部分内容"中@我，
                    postManName回复我的帖子"引用帖子的部分内容"
        点击链接可以showWholePost(相应postId)
whh:@功能的简单实现(阅读模态框使用方法，监控输入事件,与新数据表进行交互)
任务安排:
1.设计表
2.ykd先做关于回复帖子的插入查询操作，wjf先做关于回复帖子的显示，进行合并调试
  两人再进行关于@的插入查询显示操作，与whh合并调试