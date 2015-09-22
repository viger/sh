<?php
namespace lib\SmartHome;

class Exception extends \Exception {
    public function __construct($msg="", $code=0, \Exception $previous = NULL){
        parent::__construct($msg, $code, $previous);
    }
}