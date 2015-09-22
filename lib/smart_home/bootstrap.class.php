<?php
namespace lib\SmartHome;
class Bootstrap{
    public function __construct(){
        $controller_path = $this -> router();
        $this -> _auto_load_class();
        $this -> auto_load($controller_path);
    }

    private function auto_load($controller_path){
        $class_info = explode("#", $controller_path);
        $class_name = $this -> auto_load_analyze_class_name($class_info[0]);
        $class_obj  = new $class_name();
        $class_obj -> _class_name = $class_name;
        $class_obj -> _tpl_path   = $this -> get_view_path($class_name);
        $class_obj -> _method     = $class_info[1];
        $class_obj -> __initlize();
        call_user_func(array($class_obj, $class_info[1]));
    }

    private function get_view_path($class_name){
        $_path = strtolower(preg_replace('/[\\\\]+|Controller$/', __DS__, $class_name));
        return $_path;
    }

    private function auto_load_analyze_class_name($class_name){
        $class_name = preg_replace('/([\/]+)/', "\ ", $class_name);
        $class_name = ucwords($class_name);
        $class_name = str_replace(" ", "", $class_name);
        return ucfirst($class_name)."Controller";
    }

    private function _auto_load_class(){
        require_once(dirname(__FILE__).__DS__."loader.class.php");
        new Loader();
    }

    private function router(){
        $app_router_arr = preg_split("/[\/]+/i", ROUTER_PATH);
        $router_config  = ROTUER_CONFIG;
        while ( count($app_router_arr) > 0 ) {
            $current_path = "/".array_shift($app_router_arr);
            // if( empty($current_path) )
            //     $current_path = "/";

            if( !array_key_exists($current_path, $router_config) ){
                return "NotFound#index";
            }

            $controller_path = $router_config[$current_path];
            if(is_array($controller_path)){
                $router_config = $controller_path;
            }
        }

        /**
         * 如果返回的控制器数据为数组，那么则找其下/路径的控制器
         * 否则为404
         */
        if( is_array($controller_path) ){
            if( array_key_exists("/", $controller_path) ){
                return $controller_path["/"];
            }
            else{
                return "NotFound#index";
            }
        }

        return $controller_path;
    }
}