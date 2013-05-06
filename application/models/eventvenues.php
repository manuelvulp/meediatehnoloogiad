<?php

class EventVenues extends Eloquent {

    public static $table    = 'event_venues';
    public static $key      = 'event_venue_id';

    public static function get_venues_by_event_pk($pk = null)
    {
        $pk = (int) $pk;
        return EventVenues::where('event_id', '=', $pk)->order_by('date', 'asc')->get();
    }

}