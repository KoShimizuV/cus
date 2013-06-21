{include file="pc/common/inc_header.tpl"}
{include file="pc/common/inc_search_window.tpl"}
<br/>

<form action="index.php" method="post" >
    <table>
        <th>UPD_TGT</th>
        <th>REAL_DATE</th>
        <th>TITLE</th>
        <th>IN</th>
        <th>OUT</th>
        <th>FREQ</th>
        <th>PURPOSE</th>
        <th>MANAGE</th>
        <th>MEMO</th>
        <th>REGIST_DATE</th>
        <th>UPDATE_DATE</th>
        {foreach from=$record_list_key item=record_list}
        <tr style="font-size:smaller {if $record_list.real_date|date_format:"%Y%m%d" == $smarty.now|date_format:"%Y%m%d" } ;background-color:yellow" {else}" {/if}>
            <td><input type="checkbox" name="{$record_list.asset_spec_id|string_format:"%010s"}_upd_flg" value="on" /></td>
            <td><input type="text" name="{$record_list.asset_spec_id|string_format:"%010s"}_real_date" value="{$record_list.real_date|date_format:"%Y-%m-%d"}" /></td>
            <td><input type="text" name="{$record_list.asset_spec_id|string_format:"%010s"}_title" value="{$record_list.title}" /></td>
            <td><input type="text" name="{$record_list.asset_spec_id|string_format:"%010s"}_input" value="{$record_list.input}" /></td>
            <td><input type="text" name="{$record_list.asset_spec_id|string_format:"%010s"}_output" value="{$record_list.output}" /></td>
            <td>
                <select name="{$record_list.asset_spec_id|string_format:"%010s"}_frequency">
                    {foreach from=$frequency_list_key item=frequency_list}
                        <option value="{$frequency_list.frequency}" {if $frequency_list.frequency == $record_list.frequency} selected = "selected" {/if}/>
                        {$frequency_list.frequency}
                    {/foreach}
                </select>
            </td>
            <td>
                <select name="{$record_list.asset_spec_id|string_format:"%010s"}_purpose_name">
                    {foreach from=$purpose_list_key item=purpose_list}
                        <option value="{$purpose_list.purpose_name}" {if $purpose_list.purpose_name == $record_list.purpose_name} selected = "selected" {/if}/>
                        {$purpose_list.purpose_name}
                    {/foreach}
                </select>
            </td>
            <td>
                <select name="{$record_list.asset_spec_id|string_format:"%010s"}_manage_name">
                    {foreach from=$manage_list_key item=manage_list}
                        <option value="{$manage_list.manage_name}" {if $manage_list.manage_name == $record_list.manage_name} selected = "selected" {/if}/>
                        {$manage_list.manage_name}
                    {/foreach}
                </select>
            </td>
            <td><textarea name="{$record_list.asset_spec_id|string_format:"%010s"}_memo" >{$record_list.memo}</textarea></td>
            <td>{$record_list.regist_date|date_format:"%Y/%m/%d"}</td>
            <td>{$record_list.update_date|date_format:"%Y/%m/%d %H:%M"}</td>
            <input type="hidden" name="{$record_list.asset_spec_id|string_format:"%010s"}_asset_spec_id" value="{$record_list.asset_spec_id}" /></td>
        </tr>
        {/foreach}
    </table>
    <p style="font-size:smaller; color:red">※金額には桁区切りを付けないこと</p>
    <input type="hidden" name="c" value="pc"/>
    <input type="hidden" name="p" value="spec"/>
    <input type="hidden" name="a" value="list_update_do"/>
    <input type="submit" value="update"/>
</form>
<br/>
{include file="pc/common/inc_footer.tpl"}
