<?php

class Profile_Controller extends Base_Controller 
{

    public function action_view($user_id = null)
    {
        $this->content = View::make('profile.view');
        $this->load_css('profile/index');
        $this->load_css('events/index');
        $this->js_post_load('events/index');
        $this->content->image = URL::to_asset('img/venue_images/');

        $user = Users::get_user_by_pk($user_id);
        
        $this->content->user = $user;

        return $this->render_page();
    }
}