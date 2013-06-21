<div id="header">
  <form action="index.php" method="post">
    <p>
        データ
          <a href="./index.php?c=pc&p=spec&a=regist_init">登録</a>
          <a href="./index.php?c=pc&p=spec&a=list&req_page=1">検索</a>
          カテゴリ
          <a href="./category/registInit.php">登録</a>
          <a href="./category/search.php">検索</a>
          <a href="./menu/categoryList.php">カテゴリー一覧</a>
    </p>
    <p>
          <input type="text" name="search_word" value="{$search_cond.search_word}" class="search_input" />
          <input type="submit" value="検索" />
          <input type="hidden" name="c" value="pc" />
          <input type="hidden" name="p" value="spec" />
          <input type="hidden" name="a" value="list" />
          <input type="hidden" name="req_page" value="1" />
        </p>
  </form>
</div>
<div id="search_result_header">
  <small>
  {if $paging.req_page==1 }
    {$paging.req_page}
  {else}
    {$paging.req_page*GLOBAL_PG_SPEC_UNIT-49}
  {/if}
  件目から表示
  </small>
  <b>「{$search_cond.search_word}」の検索結果</b>
  {$record_count.record_count}件
</div>