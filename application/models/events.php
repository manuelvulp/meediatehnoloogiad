<?php

class Events extends Eloquent {

    public static $key = 'event_id';

    public static function get_event_by_pk($pk = null)
    {
        $pk = (int) $pk;
        return DB::table('events')
            ->where('events.event_id', '=', $pk)
            ->join('users', 'events.user_id', '=', 'users.user_id')
            ->first();
        // return Events::find($pk);
    }

    public static function get_all_events()
    {
        return DB::table('events')
            ->join('users', 'events.user_id', '=', 'users.user_id')
            ->order_by('date', 'asc')
            ->get();
    }

    public static function add_event($input, $user_id)
    {
        $event = new Events;
        // $event->save();

        $path_to_images =   'public/img/venue_images/';
        $background_image = $input['background_image'];
        $header_image =     $input['image'];

        if ($background_image['size']) {
            $filename =  $background_image['name'];
            $event->background_image = $filename;
            Input::upload('background_image', $path_to_images, $filename);
        }

        if ($header_image['size']) {
            $filename =  $header_image['name'];
            $event->image = $filename;
            Input::upload('image', $path_to_images, $filename);
        }

        $event->title                       = $input['title'];
        $event->description                 = $input['description'];
        $event->date                        = $input['date'];
        $event->video_url                   = $input['video_url'];
        $event->facebook_url                = $input['facebook_url'];
        $event->user_id                     = $user_id;
        $event->customizable_left_title     = $input['customizable_left_title'];
        $event->customizable_left_content   = $input['customizable_left_content'];
        $event->customizable_right_title    = $input['customizable_right_title'];
        $event->customizable_right_content  = $input['customizable_right_content'];

        $event->save();
    }

    public static function update_event($input, $user_id) 
    {
        $affected = DB::table('events')
            ->where('event_id', '=', $input['id'])
            ->update(array(
                'title'                         => $input['title'],
                'description'                   => $input['description'],
                'date'                          => $input['date'],
                'video_url'                     => $input['video_url'],
                'facebook_url'                  => $input['facebook_url'],
                'customizable_left_title'       => $input['customizable_left_title'],
                'customizable_left_content'     => $input['customizable_left_content'],
                'customizable_right_title'      => $input['customizable_right_title'],
                'customizable_right_content'    => $input['customizable_right_content']
        ));
    }

    public static function get_events_by_user($user_id)
    {
        $user_id = (int) $user_id;
        return DB::table('events')
            ->where('users.user_id', '=', $user_id)
            ->join('users', 'events.user_id', '=', 'users.user_id')
            ->order_by('date', 'asc')
            ->get();
    }

    public static function delete_event($event_id)
    {
        $affected = DB::table('events')->where('event_id', '=', $event_id)->delete();
    }

    public static function get_events_by_string($string)
    {
        return DB::table('events')
            ->where('title', 'LIKE', '%' . $string . '%')
            ->get();
    }

}