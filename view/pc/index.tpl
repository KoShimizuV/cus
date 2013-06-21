{include file="pc/common/inc_header.tpl"}
<div><a href="./index.php/user/login/init">Sign In</a></div>
<br/>
<div style="font-weight:bold;">Career UP System</div>
<br/>
Hello {$smarty.session.account.name} !
<br/>
<br/>
{literal}
<script type="text/javascript"><!--
function doSubmit(cate){
    document.getElementById("search").category.value = cate;
    document.getElementById("search").submit();
}
--></script>
{/literal}

<table style="width:80%">
<tr><th>category</th><th>rate</th><th>Num</th></tr>
{foreach from=$rate_list item=rates}
<tr><td><a href="javascript:;" onclick='doSubmit("{$rates.category}")'>{$rates.category}</a></td><td>{$rates.rate}</td><td>{$rates.count}</td></tr> 
{/foreach}
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

{include file="pc/common/inc_footer.tpl"}
