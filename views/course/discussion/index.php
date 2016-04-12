<?php
/**
 * Created by PhpStorm.
 */

$this->title = 'Discussion';
$this->params['breadcrumbs'][] = ['label'=>'course','url'=>'/course/index'];
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('/js/course/discussion/discussion.js');
//$this->registerJsFile('/js/jquery.pjax.js');
?>
<h2>Discussion</h2>
<?php 
//http://localhost:8080/course/discussion/index?user=whh&pass=123
//SELECT * FROM `user` WHERE `name`=whh AND `pass`= "1 OR 1=1"
$user = strstrip($_GET['user']);
$pass = strstrip($_GET['pass']);
$sql  = "SELECT * FROM `user` WHERE `name`='$user' AND `pass`= '$pass' ";  

$query='SELECT * FROM users WHERE name=\''.$user.'\' AND pass=\''.$pass.'\';';
print ($user);
print "<br/>";
print ($pass);
print "<br/>";
print ($query);

function strstrip($str){
	if(get_magic_quotes_gpc()){
		$str=stripslashes($str);
	}
	return htmlentities($str, ENT_QUOTES);
}
?>
