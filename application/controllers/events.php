<?php

class Events_Controller extends Base_Controller 
{
    private static $background_image;
    private static $image;

    public function action_index()
    {   
        $this->content = View::make('events.index');

        $this->load_css('events/index');
        $this->js_post_load('events/index');

        $this->set_venues();

        $this->content->events = null;

        $this->content->events = Events::get_all_events();

        return $this->render_page();
    }

    public function action_view($venue_id = null)
    {
        $event = Events::get_event_by_pk($venue_id);
        $event_venues = EventVenues::get_venues_by_event_pk($venue_id);

        $this->content = View::make('events.view');
        $this->load_css('events/view');
        $this->js_post_load('events/view');

        $this->content->image    = URL::to_asset('img/venue_images/');
        
        $this->content->event = $event;
        $this->content->event_venues = $event_venues;

        return $this->render_page();
    }

    public function action_add()
    {
        $input = Input::all();

        $this->content = View::make('events.add');
        $this->js_post_load('events/add');
        $this->js_post_load('bootstrap/bootstrap.min');
        $this->js_post_load('bootstrap/bootstrap-fileupload.min');
        $this->load_css('events/add');

        if ($input) {
            $errors = $this->validate($input);

            if (isset($errors) AND !empty($errors)) {
                $this->content->error = $errors;
            } else {
                Events::add_event($input, $this->user->user_id);
                return Redirect::back()->with('flash_notice', 'Successfully added event');
            }
        }

        return $this->render_page();
    }

    public function action_edit($event_id = null)
    {
        if (isset($event_id)) {
            $this->edit_event($event_id);
        } else {
            $this->content = View::make('events.edit');
            $this->js_post_load('events/edit');
            $this->js_post_load('bootstrap/bootstrap.min');
            $this->js_post_load('bootstrap/bootstrap-fileupload.min');
            $this->load_css('events/edit');

            $this->content->events = Events::get_events_by_user($this->user->user_id);
        }

        $this->js_post_load('events/add');
        $this->js_post_load('bootstrap/bootstrap.min');
        $this->js_post_load('bootstrap/bootstrap-fileupload.min');
        $this->load_css('events/add');

        return $this->render_page();

    }

    public function edit_event($event_id = null) 
    {
        $this->content = View::make('events.editevent');
        $this->js_post_load('events/edit');
        $this->js_post_load('bootstrap/bootstrap.min');
        $this->js_post_load('bootstrap/bootstrap-fileupload.min');
        $this->load_css('events/edit');

        $this->content->event = Events::get_event_by_pk($event_id);
    }

    public function action_update($event_id = null) {
        $input = Input::all();

        if ($input) {
            $errors = $this->validate($input);

            if (isset($errors) AND !empty($errors)) {
                $this->content->error = $errors;
            } else {
                Events::update_event($input, $this->user->user_id);
                return Redirect::back()->with('flash_notice', 'Successfully updated event');
            }
        }
    }

    public function action_delete($event_id = null)
    {
        Events::delete_event($event_id);
        return Redirect::back()->with('flash_notice', 'Successfully deleted event');
    }

    public function validate($input = null)
    {
        $rules = $this->return_array(Bundle::get('rules'));
        $error_messages = $this->return_array(Bundle::get('error_msgs'));

        $validation = Validator::make($input, $rules);
        // $validation = Validator::make($input, $rules, $error_messages);

        if($validation->fails()) {
            return $validation->errors->messages;
        }

    }

    public function action_validate_field()
    {
        $inputName = Input::get('inputName');
        $inputValue = Input::get('inputValue');

        // var_dump("input name : " . $inputName);
        // var_dump("input value : " . $inputValue);

        $validation_rules = $this->return_array(Bundle::get('rules'));
        $error_messages = $this->return_array(Bundle::get('error_msgs'));

        foreach ($validation_rules as $key => $val) {
            if ($key === $inputName) {
                $input[$inputName] = $inputValue;
            }
        }

        foreach ($validation_rules as $key => $val) {
            if ($inputName === $key) {
                $rules[$inputName] = $val;
            }
        }

        $validation = Validator::make($input, $rules);

        $return['inputName'] = $inputName;
        $return['inputValue'] = $inputValue;
        $return['errors'] = 'none';

        if($validation->fails()) {
            $return['errors'] = $validation->errors->messages[$inputName][0];
            die(json_encode($return));
        } else {
            die(json_encode($return));
        }

        // $validation = Validator::make($input, $rules, $error_messages);
    }

    public function action_get_all_events() 
    {
        $query_string = $_POST['queryString'];
        die(json_encode(Events::get_events_by_string($query_string)));
    }
}