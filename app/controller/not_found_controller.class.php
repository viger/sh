<?php
class NotFoundController extends ApplicationController {
    public function index(){
        ob_end_clean();
        header("HTTP/1.0 404 Not Found");
        include_once(APP_ROOT.'public'.__DS__.'404.html');
        exit;
    }
}