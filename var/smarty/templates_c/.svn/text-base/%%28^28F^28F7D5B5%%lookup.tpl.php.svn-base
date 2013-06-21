<?php /* Smarty version 2.6.18, created on 2012-03-25 05:14:44
         compiled from pc/qa/lookup.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'pc/qa/lookup.tpl', 5, false),array('modifier', 'replace', 'pc/qa/lookup.tpl', 8, false),)), $this); ?>
<table id="list">
    <tr><th>category</th><th>id</th><th>title</th><th>question</th><th>answer</th></tr>
    <?php $_from = $this->_tpl_vars['qa_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['qa_list']):
?>
    <tr style="font-size:smaller" >
        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['qa_list']['category'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</td>
        <td><?php echo $this->_tpl_vars['qa_list']['id']; ?>
</td>
        <td><a href="javascript:;" onclick="append('<?php echo $this->_tpl_vars['qa_list']['id']; ?>
', '<?php echo $this->_tpl_vars['qa_list']['title']; ?>
')"><?php echo ((is_array($_tmp=$this->_tpl_vars['qa_list']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</a></td>
        <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['qa_list']['qu'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('replace', true, $_tmp, "\n", "<br/>") : smarty_modifier_replace($_tmp, "\n", "<br/>")); ?>
</td>
        <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['qa_list']['ans'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('replace', true, $_tmp, "\n", "<br/>") : smarty_modifier_replace($_tmp, "\n", "<br/>")); ?>
</td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
</table>
<?php echo '
<script type="text/javascript"><!--

function append(id, value){
  if(document.getElementById("link_" + id)){
      return; 
  }
  var el = document.getElementById("link");
  var cb = document.createElement("input");
  var label = document.createTextNode(value);
  cb.type = "checkbox";
  cb.name = "link_" + id;
  cb.id = "link_" + id;
  cb.value = id;
  el.appendChild(cb); 
  el.appendChild(label); 
  cb.checked = true;
}
--></script>
'; ?>
