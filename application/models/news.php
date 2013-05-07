<?php

class News extends Eloquent {

    public static $key = 'news_id';

    public static function get_news_by_pk($pk = null)
    {
        $pk = (int) $pk;
        return DB::table('news')
            ->where('news.news_id', '=', $pk)
            ->join('users', 'news.user_id', '=', 'users.user_id')
            ->first();
    }

    public static function get_all_news()
    {
        return DB::table('news')
            ->join('users', 'news.user_id', '=', 'users.user_id')
            ->order_by('news.created', 'desc')
            ->get();
    }

    public static function add_news($input, $user_id)
    {
        $entry = new News;

        $entry->title                       = $input['news_title'];
        $entry->content                     = $input['news_content'];
        $entry->created                     = date("Y-m-d H:i:s");
        $entry->user_id                     = $user_id;

        $entry->save();
    }

    public static function update_news($input, $user_id) 
    {
        $affected = DB::table('news')
            ->where('news_id', '=', $input['id'])
            ->update(array(
                'title'                         => $input['news_title'],
                'content'                       => $input['news_content'],
        ));
    }

    public static function delete_news($pk)
    {
        $affected = DB::table('news')->where('news_id', '=', $pk)->delete();
    }

}