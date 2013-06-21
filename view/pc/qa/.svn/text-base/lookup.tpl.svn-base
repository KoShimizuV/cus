<table id="list">
    <tr><th>category</th><th>id</th><th>title</th><th>question</th><th>answer</th></tr>
    {foreach from=$qa_list item=qa_list}
    <tr style="font-size:smaller" >
        <td>{$qa_list.category|escape:'html'}</td>
        <td>{$qa_list.id}</td>
        <td><a href="javascript:;" onclick="append('{$qa_list.id}', '{$qa_list.title}')">{$qa_list.title|escape:'html'}</a></td>
        <td>{$qa_list.qu|escape:'html'|replace:"\n":"<br/>"}</td>
        <td>{$qa_list.ans|escape:'html'|replace:"\n":"<br/>"}</td>
    </tr>
    {/foreach}
</table>
{literal}
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
{/literal}
