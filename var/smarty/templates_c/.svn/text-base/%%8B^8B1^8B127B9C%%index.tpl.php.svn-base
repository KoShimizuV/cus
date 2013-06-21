<?php /* Smarty version 2.6.18, created on 2012-03-25 16:37:53
         compiled from pc/index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pc/common/inc_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div><a href="./index.php/user/login/init">Sign In</a></div>
<br/>
<div style="font-weight:bold;">Career UP System</div>
<br/>
Hello <?php echo $_SESSION['account']['name']; ?>
 !
<br/>
<br/>
<?php echo '
<script type="text/javascript"><!--
function doSubmit(cate){
    document.getElementById("search").category.value = cate;
    document.getElementById("search").submit();
}
--></script>
'; ?>


<table style="width:80%">
<tr><th>category</th><th>rate</th><th>Num</th></tr>
<?php $_from = $this->_tpl_vars['rate_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['rates']):
?>
<tr><td><a href="javascript:;" onclick='doSubmit("<?php echo $this->_tpl_vars['rates']['category']; ?>
")'><?php echo $this->_tpl_vars['rates']['category']; ?>
</a></td><td><?php echo $this->_tpl_vars['rates']['rate']; ?>
</td><td><?php echo $this->_tpl_vars['rates']['count']; ?>
</td></tr> 
<?php endforeach; endif; unset($_from); ?>
</table>

<form action="./index.php" method="POST" id="search">
    <input type="text" name="search_word">
    <input type="submit" value="検索">
    <input type="hidden" name="c" value="pc" />
    <input type="hidden" name="p" value="qa" />
    <input type="hidden" name="a" value="list" />
    <input type="hidden" name="req_page" value="1" />
    <input type="hidden" name="category" value="" />
</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pc/common/inc_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>