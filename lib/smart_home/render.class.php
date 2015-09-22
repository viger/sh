<?php
namespace lib\SmartHome;

class Render{
    private $_tpl_root_path    = APP_ROOT.'app'.__DS__.'views'.__DS__;
    private $_tpl_current_path = '';
    private $_tpl_default_path = '.';
    private $layout_data       = [];
    private $method_layout     = '';

    public function set_tpl_path($path){
        $this -> _tpl_current_path = realpath(($this -> _tpl_root_path).$path);
        if( !$this -> _tpl_current_path ){
            $error_path = ($this -> _tpl_root_path).$path;
            throw new Exception("Error template path: {$error_path}", 1);
        }
        else{
            $this -> _tpl_current_path .= __DS__;
        }
    }

    public function load_default_layout($default_layout, $default_path="."){
        $this -> _tpl_default_path = realpath(($this -> _tpl_root_path).$default_path);
        if(!$this -> _tpl_default_path ){
            $this -> _tpl_default_path = $this -> _tpl_root_path;
        }
        else{
            $this -> _tpl_default_path .= __DS__;
        }

        $default_layout_file = ($this -> _tpl_default_path).$default_layout.'.tpl.php';
        include_once($default_layout_file);
    }

    public function load_layout($layout){
        $tpl_layout_file = ($this -> _tpl_current_path).$layout.'.tpl.php';
        if( is_file($tpl_layout_file) ){
            $this -> method_layout          = $layout;
            $this -> layout_data[$layout]   = $tpl_layout_file;
        }
    }

    public function show(){

    }

    public function render($layout_name){
        if( array_key_exists($layout_name, $this -> layout_data) ){
            include_once($this -> layout_data[$layout_name]);
        }
    }
};