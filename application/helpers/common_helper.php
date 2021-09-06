<?php
if( !function_exists('print_array')){
    function print_array($data = []){
        echo "<pre>";print_r($data);exit();
    }
}
?>