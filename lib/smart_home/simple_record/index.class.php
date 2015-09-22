<?php
namespace lib\SmartHome\SimpleRecord;

class Index {
    public $_index_format = "c*name/Istart/Ilen";
    public  $_index_len = 0;

    public function __construct($bin){
        if( !empty($bin) ){
            $this -> unpack($bin);
        }
    }

    private function unpack($bin){
        $unpacked_bin_arr = \unpack($this -> _index_format, $bin);

    }

    public function set_format($format){
        if( !empty($format) ){
            $this -> _index_format = $format;
        }
    }

    public static function search($key){

    }
};