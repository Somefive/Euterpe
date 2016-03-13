<?php
/**
 * Created by PhpStorm.
 * User: bingochen
 * Date: 2016/3/6
 * Time: 11:34
 */
use app\models\account\User;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\controllers\course\ShareController;

$this->title = 'Create';
$this->params['breadcrumbs'] = [
    ['label'=>'course','url'=>'/course/index'],
    ['label'=>'composer','url'=>'/course/share/index'],
    $this->title
];
?>
<!--<div>-->
<!--<label for = "type">请选择分享的类型</label>-->
<!--    <input type="text" name="m_type" id="type" list="kind_list" onchange="">-->
<!--        <datalist id = "kind_list">-->
<!--            <option>vocabulary</option>-->
<!--            <option>sentence</option>-->
<!--            <option>article</option>-->
<!--        </datalist>-->
<!--</div>-->

<!--<div id="1">-->
<!--    <p>1</p>-->
<!--</div>-->
<!--<div id="2">-->
<!--    <p>2</p>-->
<!--</div>-->
<!--<div id="3">-->
<!--    <p>3</p>-->
<!--</div>-->
<!---->
<!--<p>-->
<!--    <button onclick='show("1")'>vocabulary</button>-->
<!--    <button onclick='show("2")'>sentence</button>-->
<!--    <button onclick='show("3")'>article</button>-->
<!--</p>-->
<!---->
<!--<script>-->
<!--    function show(id)-->
<!--    {-->
<!--        alert(id);-->
<!--        if(id=="1")-->
<!--        {-->
<!--            $(#1).show();-->
<!--            $(#2).hide();-->
<!--            $(#3).hide();-->
<!--        }-->
<!--        else if(id=="2")-->
<!--        {-->
<!--            $(#1).hide();-->
<!--            $(#2).show();-->
<!--            $(#3).hide();-->
<!--        }-->
<!--        else-->
<!--        {-->
<!--            alert("fuck");-->
<!--            $(#1).hide();-->
<!--            $(#2).hide();-->
<!--            $(#3).show();-->
<!--        }-->
<!--    }-->
<!--</script>-->

<script type="text/javascript">
    $(document).ready(function(){});
    function hiden(i){
        $("#"+i).hide();//hide()函数,实现隐藏,括号里还可以带一个时间参数(毫秒)例如hide(2000)以2000毫秒的速度隐藏,还可以带slow,fast
    }
    function slideToggle(i){
        $("#"+i).slideToggle(500);//窗帘效果的切换,点一下收,点一下开,参数可以无,参数说明同上
    }
    function show(i){
        $("#"+i).show();//显示,参数说明同上
    }
    function toggle(i){
        $("#"+i).toggle(2000);//显示隐藏切换,参数可以无,参数说明同上
    }
    function slide(i){
        $("#"+i).slideDown();//窗帘效果展开
    }
</script>
<input type="button" value="vocabulary" onclick="slideToggle(1);hiden(2);hiden(3)"/>
<input type="button" value="sentence" onclick="slideToggle(2);hiden(1);hiden(3)"/>
<input type="button" value="article" onclick="slideToggle(3);hiden(2);hiden(1)"/>
<div id=1 style="display: none">
    <?php
    $form = ActiveForm::begin([
    'id' => 'vocabulary-form',
    'options' => ['class' => 'form-horizontal'],
    ]) ?>
    <?= $form->field($model, 'word')->textInput() ?>
    <?= $form->field($model, 'reason')->textInput() ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::SubmitButton('Create', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end() ?>
</div>
<div id=2 style="display: none">2</div>
<div id=3 style="display: none">3</div>
<!--<body>-->
<!--<h3>div里内容的显示隐藏特效</h3>-->
<!--<input type="button" value="隐藏" onclick="hiden(1)"/>-->
<!--<input type="button" value="显示" onclick="show(1)"/>-->
<!--<input type="button" value="窗帘效果显示2" onclick="slide(1)"/>-->
<!--<input type="button" value="窗帘效果的切换" onclick="slideToggle(1)"/>-->
<!--<input type="button" value="隐藏显示效果切换" onclick="toggle(1)"/>-->
<!--<div id=1 style="display:none">-->
<!--    1.测试例子<br/>-->
<!--    2.测试例子<br/>-->
<!--    3.测试例子<br/>-->
<!--    4.测试例子<br/>-->
<!--    5.测试例子<br/>-->
<!--    6.测试例子<br/>-->
<!--    7.测试例子<br/>-->
<!--    8.测试例子<br/>-->
<!--    9.测试例子<br/>-->
<!--    0.测试例子<br/>-->
<!--</div>-->
<!--</body>-->
<!--</html>-->





<!--<script>-->
<!--    function show(ifm){-->
<!--        obj = document.all[ifm];-->
<!--        display=obj.style.display;-->
<!--        obj.style.display=(display=="block")?"none":"block";-->
<!--    }-->
<!--</script>-->
<!--<input type=button onclick="show('kk')" value="Show/Hide">-->
<!--<iframe id=kk src="http://www.csdn.net" border="1" frameborder="1" width="100" height="100" style="display:none"></iframe>-->
