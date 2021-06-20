<?php
namespace Tolgatasci\Soundcloud;
class Tools
{
    /*
     * @param $milliseconds int
     * return String
     */
    public function time_to_text($milliseconds){
        $seconds = floor($milliseconds / 1000);
        $minutes = floor($seconds / 60);
        $hours = floor($minutes / 60);
        $milliseconds = $milliseconds % 1000;
        $seconds = $seconds % 60;
        $minutes = $minutes % 60;

        $format = '%u:%02u:%02u';
        $time = sprintf($format, $hours, $minutes, $seconds, $milliseconds);
        return rtrim($time, '0');
    }

}
