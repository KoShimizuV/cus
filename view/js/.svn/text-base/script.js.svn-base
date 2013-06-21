/**
 * テキストエリアの行数を動的に変化させます。
 *
 */
function changeLine(T){
    var n;
    var len;
    n = T.value.match(/([\n])/g);
    if(n){
        len = n.length + 2 ;
    }else{
        len = 2;
    }
  
    if( len < 20 ){
        T.style.height = len * 20 + 'px';
    }else{
        T.style.height = 500 + 'px';
    }
    return true;
}

/**
 * 高さを2に設定します。
 *
 */
function setLineHeight(T){
        T.style.height = 40 + 'px';;
}

/**
 * テキストボックスの横幅を動的に変化させます。
 * 
 * @param T 対象のフォームオブジェクト
 */
function changeLength(T){

    var max_char_num=50;
    var len = T.value.length;

    // 10文字より多く、マックス文字より小さい場合
    if( (10<len) && (len<max_char_num) ){
        T.style.width = len*15 + 'px';;
    }else if( len>max_char_num ){
        T.style.width = max_char_num*15 + 'px';
    }
    
}

function change_lenght_height(form_obj ){
    changeLength(form_obj);
    changeLine(form_obj);
}

function set_length_height(form_obj, length, height){
    form_obj.style.width = length + 'px';;
    form_obj.style.height = height + 'px';;
}


/**
 * 
 *
 */
function styleSwitch(strID){
  strStatus = document.getElementById(strID).style.display;
  if(strStatus == 'none'){
    document.getElementById(strID).style.display = '';
  }else{
    document.getElementById(strID).style.display = 'none';
  }
}


//********************************************************
// @function  送信
// @
// @return true:送信  false:未送信
//********************************************************

function confirmSubmit(formName,msg){
  //確認ダイアログ
  if( !confirm(msg) ){return false;}
  
  //内容の送信
  formName.submit();
}

function submitForm(formObj){
  formObj.submit();
}

// ********************************************************
// 表示・非表示を切り替える
// 
// @
// @return true:送信  false:未送信
// ********************************************************
function switchShowHide(id){
    if (document.getElementById) {
        if (document.getElementById(id).style.display == "block") {
            document.getElementById(id).style.display = "none";
        } else {
            document.getElementById(id).style.display = "block";
        }
    }
}

function switchDisplay(one, two){
    var arr = [one, two];
    for (var i =0 ; i < arr.length; i++){
        changeDisplay(arr[i]);
    }
}

function changeDisplay(id){
    var elem = document.getElementById(id);
    elem.style.display = elem.style.display == "none" ? "block" : "none";
}

function find(needle_key,id){
    word = document.getElementById(needle_key).value;
    table = document.getElementById(id);
    rowN = table.rows.length;
    for (i = 1; i < rowN ; i++) {
	cellN = table.children.length;
       // cellN = table.cells.length;
        disp = "none";
        for (j = 0; j < cellN ; j++) {
            cel = table.rows[i].cells[j];
            if ((cel == null) || (cel.innerHTML == "")) { continue; }
            if (cel.innerHTML.toLowerCase().search(word.toLowerCase()) >= 0){
                disp = "";
                break;
            }
        }
        table.rows[i].style.display = disp;
    }
}
