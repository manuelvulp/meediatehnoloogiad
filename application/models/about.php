<?php

class About extends Eloquent {

    public static $table = 'about';
    public static $key = 'about_id';

    public static function get_content_by_position($position = null)
    {
        return About::where('position', '=', $position)->first()->text;
    }
}