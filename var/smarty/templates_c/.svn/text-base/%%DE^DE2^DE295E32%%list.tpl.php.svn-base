<?php /* Smarty version 2.6.18, created on 2013-05-06 18:34:34
         compiled from pc/qa/list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'pc/qa/list.tpl', 51, false),array('modifier', 'replace', 'pc/qa/list.tpl', 56, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pc/common/inc_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script type="text/javascript">
<!--
function dispatch(target) {
 	document.form1.a.value = target;
	document.form1.submit();
}

// -->
</script>
'; ?>

<div style="text-align:right; margin:auto;">
<a href="./index.php?c=pc&p=account&a=login"><?php echo $_SESSION['account']['name']; ?>
</a>
</div>
<a href="./index.php?c=pc&p=qa&a=regist_init" accesskey="r"><span style="font-size:15px;font-weight:bold">R</span>egist</a>
<a href="./index.php?c=pc&p=qa&a=import_init" accesskey="i"><span style="font-size:15px;font-weight:bold">I</span>mport</a>
<a href="./index.php?c=pc&p=qa&a=export_do" accesskey="e"><span style="font-size:15px;font-weight:bold">E</span>xport</a>
<form action="./index.php" method="post"  name="form1">
    <select name="category" id="category" onChange="dispatch('list');">
        <option value="" />-- 選択してください --
        <?php $_from = $this->_tpl_vars['category_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cate_arr']):
?>
            <option value="<?php echo $this->_tpl_vars['cate_arr']['category']; ?>
" <?php if ($this->_tpl_vars['cate_arr']['category'] == $_SESSION['search_cond']['category']): ?> selected = "selected" <?php endif; ?>/><?php echo $this->_tpl_vars['cate_arr']['category']; ?>

        <?php endforeach; endif; unset($_from); ?>
        </select>
    <input type="hidden" name="c" value="pc" />
    <input type="hidden" name="p" value="qa" />
    <input type="hidden" name="a" value="" />
    <input type="button" name="search" onClick="dispatch('list');" value="search">
    <input type="button" name="test" onClick="dispatch('test_qu');" value="test">
</form>

<input type="text" id="list_key" onkeyup="find('list_key','list')" />
<table id="list">
<thead>
    <tr><th width="20%">category</th>
    <th>問題</th>
    <th>正答率</th>
    <th>○</th>
    <th>×</th>
</tr>
</thead>
<tbody>
    <?php $_from = $this->_tpl_vars['qa_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['qa_list']):
?>
    <tr style="font-size:smaller" >
        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['qa_list']['category'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</td>
        <td style="text-align:left;">
            <!-- 問題 -->
            <a href="javascript:;" onclick="switchShowHide('qu_<?php echo $this->_tpl_vars['qa_list']['id']; ?>
')" id="qu_title_<?php echo $this->_tpl_vars['qa_list']['id']; ?>
" ><?php echo ((is_array($_tmp=$this->_tpl_vars['qa_list']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</a>
            <div id="qu_<?php echo $this->_tpl_vars['qa_list']['id']; ?>
" style="display:none" >
                <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['qa_list']['qu'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('replace', true, $_tmp, "\n", "<br/>") : smarty_modifier_replace($_tmp, "\n", "<br/>")); ?>
<br/><br/>
                <?php echo ((is_array($_tmp=$this->_tpl_vars['qa_list']['src'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>

                <!-- 正解 -->
                <a href="javascript:;" onclick="switchShowHide('ans_<?php echo $this->_tpl_vars['qa_list']['id']; ?>
')">正解を見る</a>
                <div id="ans_<?php echo $this->_tpl_vars['qa_list']['id']; ?>
" style="display:none" >
                    <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['qa_list']['ans'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('replace', true, $_tmp, "\n", "<br/>") : smarty_modifier_replace($_tmp, "\n", "<br/>")); ?>
<br/>
                    <hr/>
                    <div>
                    <?php $_from = $this->_tpl_vars['qa_list']['link']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
                    <?php echo $this->_tpl_vars['link']['title']; ?>
<br/><?php echo $this->_tpl_vars['link']['ans']; ?>
<br/><br/>
                    <?php endforeach; endif; unset($_from); ?>
                    </div>
                    <!-- 回答結果 -->
                    <div style="text-align:right"> 
                        <a href="./index.php?c=pc&p=qa&a=correctup_do&id=<?php echo $this->_tpl_vars['qa_list']['id']; ?>
">正解</a>
                        &nbsp;<a href="./index.php?c=pc&p=qa&a=uncorrectup_do&id=<?php echo $this->_tpl_vars['qa_list']['id']; ?>
">不正解</a>
                        &nbsp;<a href="http://eow.alc.co.jp/search?q=<?php echo ((is_array($_tmp=$this->_tpl_vars['qa_list']['title'])) ? $this->_run_mod_handler('replace', true, $_tmp, ".", "") : smarty_modifier_replace($_tmp, ".", "")); ?>
" target="_blank">alc</a>
                       <br/><br/>
                       <a href="./index.php?c=pc&p=qa&a=update_init&id=<?php echo $this->_tpl_vars['qa_list']['id']; ?>
">修正</a>
                    </div>
                </div>
            </div>
        </td>
        <td><?php echo $this->_tpl_vars['qa_list']['correct_rate']; ?>
</td>
        <td><?php echo $this->_tpl_vars['qa_list']['correct_cnt']; ?>
 </td>
        <td><?php echo $this->_tpl_vars['qa_list']['uncorrect_cnt']; ?>
 </td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
</tbody>
</table>
<script type="text/javascript"><!--
<?php if ($_GET['bfr_id'] != ""): ?>
window.onload = 
<?php echo '
    function() { 
'; ?>

       get_focus('qu_title_<?php echo $_GET['bfr_id']; ?>
')
<?php endif; ?>
<?php echo '
    };
'; ?>

// --></script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pc/common/inc_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>