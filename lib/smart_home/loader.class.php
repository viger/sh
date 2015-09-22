<?php
namespace lib\SmartHome;

class Loader{
    private $_lib_path        = 'lib';
    private $_app_path        = 'app';
    private $_controller_path = 'controller';
    private $_model_path      = 'models';
    private $_help_path       = 'helper';
    private $_view_path       = 'views';

    public function __construct(){
        spl_autoload_register(array($this, 'auto_load_controller'));
        spl_autoload_register(array($this, 'auto_load_model'));
        spl_autoload_register(array($this, 'auto_load_lib'));
        spl_autoload_register(array($this, 'auto_load_helper'));
        spl_autoload_register(array($this, 'auto_load_views'));
    }

    public function auto_load_controller($class_name){
        if($class_name){
            $class_name_arr = $this -> auto_load_analyze_class_name($class_name);
            $inc_path       = $this -> _app_path.__DS__.$this -> _controller_path.__DS__;
            if( array_key_exists("class_path", $class_name_arr)){
                $inc_path .= $class_name_arr["class_path"];
            }
            $this -> _load_class($class_name_arr["class_name"], $inc_path);
        }
    }

    public function auto_load_model($model_name){
        if($model_name){
            $class_name_arr = $this -> auto_load_analyze_class_name($model_name);
            $inc_path       = $this -> _app_path.__DS__.$this -> _help_path.__DS__;
            if( array_key_exists("class_path", $class_name_arr)){
                $inc_path .= substr($class_name_arr["class_path"], 4);
            }
            $this -> _load_class($class_name_arr["class_name"], $inc_path);
        }
    }

    public function auto_load_lib($lib_name){
        if($lib_name){
            $class_name_arr = $this -> auto_load_analyze_class_name($lib_name);
            $inc_path       = $this -> _lib_path.__DS__;
            if( array_key_exists("class_path", $class_name_arr)){
                $inc_path .= substr($class_name_arr["class_path"], 3);
            }
            $this -> _load_class($class_name_arr["class_name"], $inc_path);
        }
    }

    public function auto_load_helper($helper_name){
        if( $helper_name ){
            $class_name_arr = $this -> auto_load_analyze_class_name($helper_name);
            $inc_path       = $this -> _app_path.__DS__.$this -> _model_path.__DS__;
            if( array_key_exists("class_path", $class_name_arr)){
                $inc_path .= substr($class_name_arr["class_path"], 4);
            }
            $this -> _load_class($class_name_arr["class_name"], $inc_path);
        }
    }

    public function auto_load_views(){
        //var_dump(func_get_args());
    }

    private function auto_load_analyze_class_name($class_name){
        $result = [];
        $class_name_arr = preg_split('/[\\\\]+/', $class_name);
        $split_flag_reg = '/([A-Z]+)/';
        if( count($class_name_arr) > 1 ){
            $result['class_name'] = array_pop($class_name_arr);
            $class_path           = implode(__DS__, $class_name_arr);
            $class_path           = preg_replace($split_flag_reg, '_$0', $class_path);
            if('_' == $class_path[0])
                $class_path       = substr($class_path, 1);

            $class_path           = str_replace(__DS__."_", __DS__, $class_path);

            $result['class_path'] = strtolower($class_path);
        }
        else{
            $result['class_name'] = $class_name;
        }

        $class_name = preg_replace($split_flag_reg, '_$0', $result['class_name']);
        if('_' == $class_name[0])
            $class_name       = substr($class_name, 1);

        $result['class_name'] = strtolower($class_name);
        return $result;
    }

    private function _load_class($class, $include_path, $ext_name=".class.php"){
        spl_autoload_extensions($ext_name);
        set_include_path(APP_ROOT.$include_path);
        spl_autoload($class);
    }
};