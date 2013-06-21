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
        <td>{html_checkboxes name='tag_chkbox' options=$tag_checkboxes selected=$tag_selected separator='<br />'}</td>
    </tr>
    <tr>
        <th>category</th>
        <td style="text-align:left">
            <input type="text" name="category_input" value="{$qa.category}" id="category_input" style="display:none"/>
            <select name="category_select" id="category_select" style="display:block">
                <option value="" />-- 選択してください --
                {foreach from=$category_list item=cate_arr}
                    <option value="{$cate_arr.category}" {if $cate_arr.category == $qa.category|default:""} selected = "selected" {/if}/>{$cate_arr.category}
                {/foreach}
            </select>
            <input type="hidden" name="category" value="{$qa.category}" />
            <input type="radio" id="mode" name="mode" value="input" onclick="switchDisplay('category_input', 'category_select')" />入力
            <input type="radio" id="mode" name="mode" value="select" onclick="switchDisplay('category_input', 'category_select')" checked/>選択
        </td>
    </tr>
    <tr>
        <th>src</th>
        <td style="text-align:left">
            <input type="text" name="src_input" value="{$qa.src}" id="src_input" style="display:none"/>
            <select name="src_select" id="src_select" style="display:block">
                <option value="" />-- 選択してください --
                {foreach from=$src_list item=src_arr}
                    <option value="{$src_arr.src}" {if $src_arr.src == $qa.src|default:""} selected = "selected" {/if}/>{$src_arr.src}
                {/foreach}
            </select>
            <input type="hidden" name="src" value="{$qa.src}" />
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

{literal}
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
   title = document.getElementById("title").value.replace(/\./g,"");
   document.getElementById("alc").innerHTML = "<a href=\"http://eow.alc.co.jp/search?q=" + title + "\" target=\"_blank\">" + title + "</a>";
}

window.onload = new function(){
    document.getElementById("title").focus();
}

// -->
</script>
{/literal}

