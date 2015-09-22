<?php
namespace admin;

class ApplicationController extends \ApplicationController{
    protected $_default_layout = 'application';

    public function __construct(){
        parent::__construct();
    }
}