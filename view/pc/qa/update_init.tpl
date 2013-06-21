{include file="pc/common/inc_header.tpl"}
<script type="text/javascript" src="./jquery-latest.js"></script>
{literal}
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
{/literal}
<h3>Update</h3>
<form method="POST" name="update_form" action="index.php">
<input type="hidden" name="c" value="pc">
<input type="hidden" name="p" value="qa">
<input type="hidden" name="a" value="update_do">
<input type="hidden" name="id" value="{$qa.id}">
<table>
    <tr>
        <th style="width:100px;">title</th>
        <td style="text-align:left;"><input type="text" name="title" id="title" onkeydown="createAlc();" style="ime-mode:inactive" value="{$qa.title}"/> &nbsp;&nbsp;&nbsp; <span id="alc"></span></td>
    </tr>
    <tr>
        <th>question</th>
        <td style="text-align:left;"><textarea type="text" name="qu"  onkeydown="change_lenght_height(this)" onfocus="change_lenght_height(this)" style="width:300px" >{$qa.qu}</textarea></td>
    </tr>
    <tr>
        <th>link</th>
        <td id="link">
            {foreach from=$qa.link item=link}<input type="checkbox" name="link_{$link.id}" id="link_{$link.id}" value="{$link.id}" checked="checked" style="display:inline"/>{$link.title}{/foreach}
        </td>
    </tr>
    <tr>
        <th>answer</th>
        <td style="text-align:left;"><textarea type="text" name="ans" onkeydown="change_lenght_height(this)" onfocus="change_lenght_height(this)" style="width:300px" >{$qa.ans}</textarea></td>
    </tr>
     <tr>
        <th>category</th>
        <td style="text-align:left">
            <input type="text" name="category_input" value="{$qa.category}" id="category_input"/>
            <select name="category_select" id="category_select" style="display:none">
                <option value="" />-- 選択してください --
                {foreach from=$category_list item=cate_arr}
                    <option value="{$cate_arr.category}" {if $cate_arr.category == $qa.category} selected = "selected" {/if}/>{$cate_arr.category}
                {/foreach}
            </select>
            <input type="hidden" name="category" value="{$qa.category}" />
            <input type="radio" id="mode" name="mode" value="input" onclick="switchDisplay('category_input', 'category_select')" checked/>入力
            <input type="radio" id="mode" name="mode" value="select" onclick="switchDisplay('category_input', 'category_select')"  />選択
        </td>
    </tr> 
    <tr>
        <th>src</th>
        <td style="text-align:left">
            <input type="text" name="src_input" value="{$qa.src}" id="src_input"/>
            <select name="src_select" id="src_select" style="display:none">
                <option value="" />-- 選択してください --
                {foreach from=$src_list item=src_arr}
                    <option value="{$src_arr.src}" {if $src_arr.src == $qa.src} selected = "selected" {/if}/>{$src_arr.src}
                {/foreach}
            </select>
            <input type="hidden" name="src" value="{$qa.src}" />
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
            {if $qa.del_flg == 1 }
                <a href="./index.php?c=pc&p=qa&a=update_do&id={$qa.id}&del_flg=0">有効化</a>
            {else}
                <a href="./index.php?c=pc&p=qa&a=update_do&id={$qa.id}&del_flg=1">無効化</a>
            {/if}
        </td>
    </tr>
</table>
{literal}
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
   title = document.getElementById("title").value.replace(/\./g,"");
   document.getElementById("alc").innerHTML = "<a href=\"http://eow.alc.co.jp/search?q=" + title + "\" target=\"_blank\">" + title + "</a>";
}


// -->
</script>
{/literal}
</form>

<input type="text" id="search_word"/>
<input type="button" id="search" value="search" />
<div id="res"></div>

{include file="pc/common/inc_footer.tpl"}
