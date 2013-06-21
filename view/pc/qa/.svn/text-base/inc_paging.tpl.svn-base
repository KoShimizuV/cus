{if $paging.pre_flg}
    <a href="/asset/index.php?c=pc&p=spec&a=list&search_word={$search_cond.search_word}&category_code={$search_cond.category_code}&req_page={$paging.req_page-1}">前へ</a>
{/if}
{section name=bar start=$paging.start_page loop=$paging.end_page+1 step=1}
{if $search_cond.req_page == $smarty.section.bar.index}
    {$smarty.section.bar.index}
{else}
    <a href="/asset/index.php?c=pc&p=spec&a=list&search_word={$search_cond.search_word}&category_code={$search_cond.category_code}&req_page={$smarty.section.bar.index}">{$smarty.section.bar.index}</a>
{/if}
{/section}
{if $paging.next_flg}
    <a href="/asset/index.php?c=pc&p=spec&a=list&search_word={$search_cond.search_word}&category_code={$search_cond.category_code}&req_page={$paging.req_page+1}">次へ</a>
{/if}
