<?php

class About_Controller extends Base_Controller 
{
    public function action_index()
    {
        $this->content = View::make('about.index');
        $this->load_css('about/index');

        $this->set_data();

        return $this->render_page();
    }

    public function set_data()
    {
        $this->content->heading_left    = About::get_content_by_position('heading_left');
        $this->content->heading_center  = About::get_content_by_position('heading_center');
        $this->content->heading_right   = About::get_content_by_position('heading_right');

        $this->content->content_left    = About::get_content_by_position('content_left');
        $this->content->content_center  = About::get_content_by_position('content_center');
        $this->content->content_right   = About::get_content_by_position('content_right');
    }

}