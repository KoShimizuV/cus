<?php /* Smarty version 2.6.18, created on 2012-03-25 16:37:48
         compiled from pc/login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'pc/login.tpl', 3, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pc/common/inc_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
Welecom
<div class="error_msg"><?php echo ((is_array($_tmp=@$this->_tpl_vars['error_msg'])) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, "")); ?>
</div>
<form action="./index.php" method="POST" >
id    <input type="text" name="login_id" value="<?php echo ((is_array($_tmp=@$_SESSION['account']['login_id'])) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, "")); ?>
" /><br/>
password    <input type="password" name="passwd" />
    <input type="submit" value="Sign In" />
    <input type="hidden" name="c" value="pc" />
    <input type="hidden" name="p" value="account" />
    <input type="hidden" name="a" value="login" />
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pc/common/inc_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>