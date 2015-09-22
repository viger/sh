<?php
class ApplicationController {
    protected $_data = [
                        '_class_name' => '',
                        '_tpl_path'   => '',
                        '_method'     => ''
                        ];

    protected $_default_layout      = 'application';
    protected $_default_layout_path = '.';

    public function __construct(){
    }

    public function __call($method_name, $params){
        echo "404";
    }

    public function render($render_opts=''){
        if( empty($render_opts) )
            $render_opts = $this -> _data['_method'];

        $render = new lib\SmartHome\Render();
        $render -> set_tpl_path($this -> _data['_tpl_path']);
        $render -> load_layout($render_opts);
        $render -> load_default_layout($this -> _default_layout, $this -> _default_layout_path);
        $render -> show();
    }

    public function auth_user_status(){
        if( "login" != $this -> _data['_method'] ){
            //echo "验证用户是否登陆";
        }
    }

    public function __set($_key, $_val){
        if( array_key_exists($_key, $this -> _data)){
            $this -> _data[$_key] = $_val;
        }
    }

    public function __get($_key){
        if( array_key_exists($_key, $this -> _data)){
            return $this -> _data[$_key];
        }

        return null;
    }

    public function __initlize(){
    }
}