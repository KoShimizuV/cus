<?php /* Smarty version 2.6.18, created on 2013-06-09 15:44:49
         compiled from pc/qa/regist_init.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_checkboxes', 'pc/qa/regist_init.tpl', 46, false),array('modifier', 'default', 'pc/qa/regist_init.tpl', 55, false),)), $this); ?>
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


<h3>add</h3>
<form method="POST" name="regist_form" action="index.php">
<input type="hidden" name="c" value="pc">
<input type="hidden" name="p" value="qa">
<input type="hidden" name="a" value="regist_do">
<br/>
<table>
    <tr>
        <th style="width:100px;">title</th>
        <td style="text-align:left;"><input type="text" name="title" id="title" onkeydown="createAlc();" style="ime-mode:inactive" /> &nbsp;&nbsp;&nbsp; <span id="alc"></span></td>
    </tr>
    <tr>
        <th>question</th>
        <td style="text-align:left"><textarea type="text" name="qu"  onkeydown="change_lenght_height(this)" onfocus="change_lenght_height(this)" style="width:300px; ime-mode:inactive" ></textarea></td>
    </tr>
    <tr>
        <th>answer</th>
        <td style="text-align:left"><textarea type="text" name="ans" onkeydown="change_lenght_height(this)" onfocus="change_lenght_height(this)" style="width:300px; ime-mode:active" ></textarea></td>
    </tr>
    <tr>
        <th>link</th>
        <td><div id="link" style="text-align:left"></div></td>
    </tr>
    <tr>
        <th>tag</th>
        <td><?php echo smarty_function_html_checkboxes(array('name' => 'tag_chkbox','options' => $this->_tpl_vars['tag_checkboxes'],'selected' => $this->_tpl_vars['tag_selected'],'separator' => '<br />'), $this);?>
</td>
    </tr>
    <tr>
        <th>category</th>
        <td style="text-align:left">
            <input type="text" name="category_input" value="<?php echo $this->_tpl_vars['qa']['category']; ?>
" id="category_input" style="display:none"/>
            <select name="category_select" id="category_select" style="display:block">
                <option value="" />-- 選択してください --
                <?php $_from = $this->_tpl_vars['category_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cate_arr']):
?>
                    <option value="<?php echo $this->_tpl_vars['cate_arr']['category']; ?>
" <?php if ($this->_tpl_vars['cate_arr']['category'] == ((is_array($_tmp=@$this->_tpl_vars['qa']['category'])) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, ""))): ?> selected = "selected" <?php endif; ?>/><?php echo $this->_tpl_vars['cate_arr']['category']; ?>

                <?php endforeach; endif; unset($_from); ?>
            </select>
            <input type="hidden" name="category" value="<?php echo $this->_tpl_vars['qa']['category']; ?>
" />
            <input type="radio" id="mode" name="mode" value="input" onclick="switchDisplay('category_input', 'category_select')" />入力
            <input type="radio" id="mode" name="mode" value="select" onclick="switchDisplay('category_input', 'category_select')" checked/>選択
        </td>
    </tr>
    <tr>
        <th>src</th>
        <td style="text-align:left">
            <input type="text" name="src_input" value="<?php echo $this->_tpl_vars['qa']['src']; ?>
" id="src_input" style="display:none"/>
            <select name="src_select" id="src_select" style="display:block">
                <option value="" />-- 選択してください --
                <?php $_from = $this->_tpl_vars['src_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['src_arr']):
?>
                    <option value="<?php echo $this->_tpl_vars['src_arr']['src']; ?>
" <?php if ($this->_tpl_vars['src_arr']['src'] == ((is_array($_tmp=@$this->_tpl_vars['qa']['src'])) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, ""))): ?> selected = "selected" <?php endif; ?>/><?php echo $this->_tpl_vars['src_arr']['src']; ?>

                <?php endforeach; endif; unset($_from); ?>
            </select>
            <input type="hidden" name="src" value="<?php echo $this->_tpl_vars['qa']['src']; ?>
" />
            <input type="radio"  id="src_mode" name="src_mode" value="input" onclick="switchDisplay('src_input', 'src_select')" />入力
            <input type="radio"  id="src_mode" name="src_mode" value="select" onclick="switchDisplay('src_input', 'src_select')" checked/>選択
        </td>
    </tr>
    <tr>
        <th></th>
        <td style="text-align:left"><input type="button" value="追加" onclick="save();" /></td>
    </tr>
</table>
</form>
<input type="text" id="search_word"/>
<input type="button" id="search" value="search" />
<div id="res"></div>

<?php echo '
<script type="text/javascript"><!--
function save() {
    if (document.regist_form.mode[0].checked) {
        tmp = document.regist_form.category_input.value;
    } else {
        tmp = document.regist_form.category_select.value;
    }
    document.regist_form.category.value = tmp;

    if (document.regist_form.src_mode[0].checked) {
        tmp = document.regist_form.src_input.value;
    } else {
        tmp = document.regist_form.src_select.value;
    }
    document.regist_form.src.value = tmp;
    document.regist_form.submit();
}

function createAlc(){
   title = document.getElementById("title").value.replace(/\\./g,"");
   document.getElementById("alc").innerHTML = "<a href=\\"http://eow.alc.co.jp/search?q=" + title + "\\" target=\\"_blank\\">" + title + "</a>";
}

window.onload = new function(){
    document.getElementById("title").focus();
}

// -->
</script>
'; ?>

