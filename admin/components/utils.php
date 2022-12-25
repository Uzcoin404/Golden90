<?php

class Utils
{
    public function getUrlParams()
    {
        
        return parse_url($_SERVER['REQUEST_URI'])['query'];
    }
}
