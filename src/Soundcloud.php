<?php

namespace Tolgatasci\Soundcloud;
class Soundcloud
{
   public static function api(){
       $api = new Api();
       return $api;
   }
    public static function tools(){
        $tools = new Tools();
        return $tools;
    }

}
