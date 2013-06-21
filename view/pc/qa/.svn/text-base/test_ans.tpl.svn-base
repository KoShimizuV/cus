{include file="pc/common/inc_header.tpl"}
<h2>問題</h2>
<h3>カテゴリー : {$qa.category}</h3>
<br/>
ID : {$qa.id}<br/>
正答率 : {$qa.correct_rate}<br/>
○ : {$qa.correct_cnt} <br/>
× : {$qa.uncorrect_cnt} <br/>
<div style="text-align:left">
<h4>タイトル</h4>
{$qa.title|escape:'html'|replace:"\n":"<br/>"}
<br/>
<h4>問題</h4>
{$qa.qu|escape:'html'|replace:"\n":"<br/>"}
<br/>
<h4>回答</h4>
{$qa.ans|escape:'html'|replace:"\n":"<br/>"}
</div>
<br/>
<form action="index.php" method="post">
	<input type="hidden" name="c" value="pc" />
	<input type="hidden" name="p" value="qa" />
	<input type="hidden" name="a" value="test_determine" />
	<input type="hidden" name="id" value="{$qa.id}" />
	<input type="radio" name="result" value="correct" />正解
	<input type="radio" name="result" value="uncorrect" checked/>不正解
	<br/>
	<input type="submit" value="決定" />
</form>
{include file="pc/common/inc_footer.tpl"}