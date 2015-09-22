<?php
namespace lib\SmartHome\SimpleRecord;

class File{
    private $_data_file  = '';

    public function __construct($file){
        if( !empty($file) ){
            $this -> _data_file = $file;
        }
    }

    public function save_data($bin){
        if( !$this -> is_writable() ){
            return false;
        }

        $file_obj = fopen($this -> _data_file, "rw");
        fwrite($file_obj, $bin);
        fclose($file_obj);
        return true;
    }

    public function read_data(){
        if( $this -> is_readable() ){
            $fhand = fopen($this -> _data_file, 'r');
            $bin    = fread($fhand, filesize($this -> _data_file));
            fclose($fhand);
        }

        return null;
    }

    private function is_readable(){
        return (is_file($this -> _data_file) && \is_readable($this -> _data_file));
    }

    private function is_writable(){
        return (is_file($this -> _data_file) && \is_writable($this -> _data_file));
    }
}