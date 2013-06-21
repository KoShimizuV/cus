<?php /* Smarty version 2.6.18, created on 2012-06-28 02:11:01
         compiled from pc/qa/update_init.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pc/common/inc_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="./jquery-latest.js"></script>
<?php echo '
<script type="text/javascript"><!--
$(function(){
    $("#search").click(function(){
       var data="title=" + document.getElementById("search_word").value;
       $.ajax({
           type: "POST",
           url: "index.php?c=pc&p=qa&a=lookup",
           data: data,
           success: function(msg){
               $("#res").html("<strong>Get Following</strong><br/>"+msg);
           }
       });
    });
});
--></script>
'; ?>

<h3>Update</h3>
<form method="POST" name="update_form" action="index.php">
<input type="hidden" name="c" value="pc">
<input type="hidden" name="p" value="qa">
<input type="hidden" name="a" value="update_do">
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['qa']['id']; ?>
">
<table>
    <tr>
        <th style="width:100px;">title</th>
        <td style="text-align:left;"><input type="text" name="title" id="title" onkeydown="createAlc();" style="ime-mode:inactive" value="<?php echo $this->_tpl_vars['qa']['title']; ?>
"/> &nbsp;&nbsp;&nbsp; <span id="alc"></span></td>
    </tr>
    <tr>
        <th>question</th>
        <td style="text-align:left;"><textarea type="text" name="qu"  onkeydown="change_lenght_height(this)" onfocus="change_lenght_height(this)" style="width:300px" ><?php echo $this->_tpl_vars['qa']['qu']; ?>
</textarea></td>
    </tr>
    <tr>
        <th>link</th>
        <td id="link">
            <?php $_from = $this->_tpl_vars['qa']['link']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?><input type="checkbox" name="link_<?php echo $this->_tpl_vars['link']['id']; ?>
" id="link_<?php echo $this->_tpl_vars['link']['id']; ?>
" value="<?php echo $this->_tpl_vars['link']['id']; ?>
" checked="checked" style="display:inline"/><?php echo $this->_tpl_vars['link']['title']; ?>
<?php endforeach; endif; unset($_from); ?>
        </td>
    </tr>
    <tr>
        <th>answer</th>
        <td style="text-align:left;"><textarea type="text" name="ans" onkeydown="change_lenght_height(this)" onfocus="change_lenght_height(this)" style="width:300px" ><?php echo $this->_tpl_vars['qa']['ans']; ?>
</textarea></td>
    </tr>
     <tr>
        <th>category</th>
        <td style="text-align:left">
            <input type="text" name="category_input" value="<?php echo $this->_tpl_vars['qa']['category']; ?>
" id="category_input"/>
            <select name="category_select" id="category_select" style="display:none">
                <option value="" />-- 選択してください --
                <?php $_from = $this->_tpl_vars['category_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cate_arr']):
?>
                    <option value="<?php echo $this->_tpl_vars['cate_arr']['category']; ?>
" <?php if ($this->_tpl_vars['cate_arr']['category'] == $this->_tpl_vars['qa']['category']): ?> selected = "selected" <?php endif; ?>/><?php echo $this->_tpl_vars['cate_arr']['category']; ?>

                <?php endforeach; endif; unset($_from); ?>
            </select>
            <input type="hidden" name="category" value="<?php echo $this->_tpl_vars['qa']['category']; ?>
" />
            <input type="radio" id="mode" name="mode" value="input" onclick="switchDisplay('category_input', 'category_select')" checked/>入力
            <input type="radio" id="mode" name="mode" value="select" onclick="switchDisplay('category_input', 'category_select')"  />選択
        </td>
    </tr> 
    <tr>
        <th>src</th>
        <td style="text-align:left">
            <input type="text" name="src_input" value="<?php echo $this->_tpl_vars['qa']['src']; ?>
" id="src_input"/>
            <select name="src_select" id="src_select" style="display:none">
                <option value="" />-- 選択してください --
                <?php $_from = $this->_tpl_vars['src_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['src_arr']):
?>
                    <option value="<?php echo $this->_tpl_vars['src_arr']['src']; ?>
" <?php if ($this->_tpl_vars['src_arr']['src'] == $this->_tpl_vars['qa']['src']): ?> selected = "selected" <?php endif; ?>/><?php echo $this->_tpl_vars['src_arr']['src']; ?>

                <?php endforeach; endif; unset($_from); ?>
            </select>
            <input type="hidden" name="src" value="<?php echo $this->_tpl_vars['qa']['src']; ?>
" />
            <input type="radio" id="src_mode" name="src_mode" value="input" onclick="switchDisplay('src_input', 'src_select')" checked/>入力
            <input type="radio" id="src_mode" name="src_mode" value="select" onclick="switchDisplay('src_input', 'src_select')"  />選択
        </td>
    </tr> 
    <tr>
        <th></th>
        <td style="text-align:left">
            <input type="button" onClick="update_do();" value="更新">
        </td>
    </tr>
    <tr>
        <th>ステータス</th>
        <td style="text-align:left">
            <?php if ($this->_tpl_vars['qa']['del_flg'] == 1): ?>
                <a href="./index.php?c=pc&p=qa&a=update_do&id=<?php echo $this->_tpl_vars['qa']['id']; ?>
&del_flg=0">有効化</a>
            <?php else: ?>
                <a href="./index.php?c=pc&p=qa&a=update_do&id=<?php echo $this->_tpl_vars['qa']['id']; ?>
&del_flg=1">無効化</a>
            <?php endif; ?>
        </td>
    </tr>
</table>
<?php echo '
<script type="text/javascript">
<!--
function update_do() {
    if (document.update_form.mode[0].checked) {
        tmp = document.update_form.category_input.value;
    } else {
        tmp = document.update_form.category_select.value;
    }
    document.update_form.category.value = tmp;
    if (document.update_form.src_mode[0].checked) {
        tmp = document.update_form.src_input.value;
    } else {
        tmp = document.update_form.src_select.value;
    }
    document.update_form.src.value = tmp;
    document.update_form.submit();
}

function createAlc(){
   title = document.getElementById("title").value.replace(/\\./g,"");
   document.getElementById("alc").innerHTML = "<a href=\\"http://eow.alc.co.jp/search?q=" + title + "\\" target=\\"_blank\\">" + title + "</a>";
}


// -->
</script>
'; ?>

</form>

<input type="text" id="search_word"/>
<input type="button" id="search" value="search" />
<div id="res"></div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pc/common/inc_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>