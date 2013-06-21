{include file="pc/common/inc_header.tpl"}
<h2>問題</h2>
<h3>カテゴリー : {$qa.category}</h3>
<br/>
ID : {$qa.id}<br/>
正答率 : {$qa.correct_rate}<br/>
○ : {$qa.correct_cnt} <br/>
× : {$qa.uncorrect_cnt} <br/>
<br/>
<div style="text-align:left">
<h4>タイトル</h4>
<br/>
{$qa.title|escape:'html'|replace:"\n":"<br/>"}
<br/>
<br/>
<h4>問題</h4>
{$qa.qu|escape:'html'|replace:"\n":"<br/>"}
</div>
<br/>
<a href="./index.php?c=pc&p=qa&a=test_ans&id={$qa.id}">回答を見る</a>
<br/>
<a href="./index.php?c=pc&p=qa&a=list" >一覧へ戻る</a>

<br/>
<br/>
{foreach from=$qa_list item=qa}
<li>{$qa.id}</li>
{/foreach}

{include file="pc/common/inc_footer.tpl"}