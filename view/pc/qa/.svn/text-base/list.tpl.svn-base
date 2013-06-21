{include file="pc/common/inc_header.tpl"}
{literal}
<script type="text/javascript">
<!--
function dispatch(target) {
 	document.form1.a.value = target;
	document.form1.submit();
}

// -->
</script>
{/literal}
<div style="text-align:right; margin:auto;">
<a href="./index.php?c=pc&p=account&a=login">{$smarty.session.account.name}</a>
</div>
<a href="./index.php?c=pc&p=qa&a=regist_init" accesskey="r"><span style="font-size:15px;font-weight:bold">R</span>egist</a>
<a href="./index.php?c=pc&p=qa&a=import_init" accesskey="i"><span style="font-size:15px;font-weight:bold">I</span>mport</a>
<a href="./index.php?c=pc&p=qa&a=export_do" accesskey="e"><span style="font-size:15px;font-weight:bold">E</span>xport</a>
{* 検索処理の実装 *}
<form action="./index.php" method="post"  name="form1">
    <select name="category" id="category" onChange="dispatch('list');">
        <option value="" />-- 選択してください --
        {foreach from=$category_list item=cate_arr}
            <option value="{$cate_arr.category}" {if $cate_arr.category == $smarty.session.search_cond.category} selected = "selected" {/if}/>{$cate_arr.category}
        {/foreach}
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
{* 
    <th>created</th>
    <th>modified</th>
*}
</tr>
</thead>
<tbody>
    {foreach from=$qa_list item=qa_list}
    <tr style="font-size:smaller" >
        <td>{$qa_list.category|escape:'html'}</td>
        <td style="text-align:left;">
            <!-- 問題 -->
            <a href="javascript:;" onclick="switchShowHide('qu_{$qa_list.id}')" id="qu_title_{$qa_list.id}" >{$qa_list.title|escape:'html'}</a>
            <div id="qu_{$qa_list.id}" style="display:none" >
                {$qa_list.qu|escape:'html'|replace:"\n":"<br/>"}<br/><br/>
                {$qa_list.src|escape:'html'}
                <!-- 正解 -->
                <a href="javascript:;" onclick="switchShowHide('ans_{$qa_list.id}')">正解を見る</a>
                <div id="ans_{$qa_list.id}" style="display:none" >
                    {$qa_list.ans|escape:'html'|replace:"\n":"<br/>"}<br/>
                    <hr/>
                    <div>
                    {foreach from=$qa_list.link item=link}
                    {$link.title}<br/>{$link.ans}<br/><br/>
                    {/foreach}
                    </div>
                    <!-- 回答結果 -->
                    <div style="text-align:right"> 
                        <a href="./index.php?c=pc&p=qa&a=correctup_do&id={$qa_list.id}">正解</a>
                        &nbsp;<a href="./index.php?c=pc&p=qa&a=uncorrectup_do&id={$qa_list.id}">不正解</a>
                        &nbsp;<a href="http://eow.alc.co.jp/search?q={$qa_list.title|replace:".":""}" target="_blank">alc</a>
                       <br/><br/>
                       <a href="./index.php?c=pc&p=qa&a=update_init&id={$qa_list.id}">修正</a>
                    </div>
                </div>
            </div>
        </td>
        <td>{$qa_list.correct_rate}</td>
        <td>{$qa_list.correct_cnt} </td>
        <td>{$qa_list.uncorrect_cnt} </td>
{* 
        <td>{$qa_list.created|date_format:"%y/%m/%d"}</td>
        <td>{$qa_list.modified|date_format:"%y/%m/%d"}</td>
*}
    </tr>
    {/foreach}
</tbody>
</table>
<script type="text/javascript"><!--
{if $smarty.get.bfr_id != ""}
window.onload = 
{literal}
    function() { 
{/literal}
       get_focus('qu_title_{$smarty.get.bfr_id}')
{/if}
{literal}
    };
{/literal}
// --></script>
{include file="pc/common/inc_footer.tpl"}
