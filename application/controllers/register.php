<?php

class Register_Controller extends Base_Controller 
{
    public function action_index()
    {
        $this->content = View::make('register.index');
        $this->load_css('register/index');

        $this->set_data();

        return $this->render_page();
    }

}