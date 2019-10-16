<?php

namespace App\Middleware;


class Admin{
    public function handle(){
        if(1 !== 1){
            die('test');
        }
    }
}