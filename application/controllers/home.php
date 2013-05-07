<?php

class Home_Controller extends Base_Controller 
{
    public function action_index()
    {   
        $this->content = View::make('home.index');

        $this->js_post_load('events/add');
        $this->js_post_load('bootstrap/bootstrap.min');
        $this->js_post_load('bootstrap/bootstrap-fileupload.min');
        $this->load_css('events/add');

        $news = News::get_all_news();
        $this->content->news = $news;

        return $this->render_page();
    }

}