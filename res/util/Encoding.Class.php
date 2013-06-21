<?php

/**
 * 文字コードを変換するクラスです。
 *
 */
class encoding{

    /**
     * Wrapperメソッドです。
     *
     * @param $string 変換対象文字列 or 配列
     * @param $to     変換後の文字コード
     * @param $from   変換前の文字コード
     * @return 変換後の文字列
     */
    public function convert_encoding($string, $to, $from) {

        // 配列かどうか
        if(is_array($string)){
            return $this->convert_encoding_array($string, $to, $from);
        }else{
            return $this->convert_encoding_string($string, $to, $from);
        };

    }

    /**
     * 指定された文字列を
     * 指定された文字コードから、
     * 指定された文字コードに変換した値を返します。
     * また、変換前に文字コードを確認します。
     *
     * @param $string 変換対象文字列
     * @param $to     変換後の文字コード
     * @param $from   変換前の文字コード
     * @return 変換後の文字列
     */
    private function convert_encoding_string($string, $to, $from){

        // 文字コードをチェックする
        $det_enc = mb_detect_encoding($string, $from . ", " . $to);

        if ($det_enc and $det_enc != $to) {

            // 変換 文字コード
            return mb_convert_encoding($string, $to, $det_enc);
        }else{
            return $string;
        }

    }

    /**
     * 指定された配列を
     * 指定された文字コードから、
     * 指定された文字コードに変換して返します。
     *
     * @param $array  変換対象の配列
     * @param $to     変換後の文字コード
     * @param $from   変換前の文字コード
     * @return 変換後の文字列
     *
     */
    private function convert_encoding_array($array, $to, $from){

        foreach($array as $key => $val){
            $array[$key] = $this->convert_encoding_string($val, $to, $from);
        }
        return $array;
    }


}

?>
