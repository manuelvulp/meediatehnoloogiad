<?php

class Home_Controller extends Base_Controller 
{
    public function action_index()
    {   
        $this->content = View::make('home.index');

        return $this->render_page();
    }

}