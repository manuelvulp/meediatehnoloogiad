<?php

class Users extends Eloquent {

    public static $key = 'user_id';

    public static function get_user_by_pk($pk = null)
    {
        $pk = (int) $pk;
        return Users::find($pk);
    }

}