<?php

class News_Controller extends Base_Controller 
{
    public function action_add()
    {   
        $input = Input::all();

        $this->content = View::make('news.add');
        $this->js_post_load('events/add');
        $this->js_post_load('bootstrap/bootstrap.min');
        $this->js_post_load('bootstrap/bootstrap-fileupload.min');
        $this->load_css('events/add');

        if ($input) {
            $errors = $this->validate($input);

            if (isset($errors) AND !empty($errors)) {
                $this->content->error = $errors;
            } else {
                News::add_news($input, $this->user->user_id);
                return Redirect::back()->with('flash_notice', 'Successfully added entry');
            }
        }

        return $this->render_page();
    }

    public function action_edit($entry_id = null)
    {   
        $input = Input::all();

        if (isset($entry_id)) {
            $this->content = View::make('news.edit');

            $entry = News::get_news_by_pk($entry_id);

            if ($input) {
                $errors = $this->validate($input);

                if (isset($errors) AND !empty($errors)) {
                    $this->content->error = $errors;
                } else {
                    News::update_news($input, $this->user->user_id);
                    return Redirect::back()->with('flash_notice', 'Successfully changed entry');
                }
            }

            $this->content->entry = $entry;
        } else {
            $this->content = View::make('news.all');

            $news = News::get_all_news();
            $this->content->news = $news;
        }

        $this->js_post_load('events/add');
        $this->js_post_load('bootstrap/bootstrap.min');
        $this->js_post_load('bootstrap/bootstrap-fileupload.min');
        $this->load_css('events/add');

        return $this->render_page();
    }

    public function validate($input = null)
    {
        $rules = $this->return_array(Bundle::get('news_rules'));
        $error_messages = $this->return_array(Bundle::get('error_msgs'));

        $validation = Validator::make($input, $rules);
        // $validation = Validator::make($input, $rules, $error_messages);

        if($validation->fails()) {
            return $validation->errors->messages;
        }

    }

    public function action_delete($news_id = null) 
    {
        News::delete_news($news_id);
        return Redirect::back()->with('flash_notice', 'Successfully deleted entry');
    }

}