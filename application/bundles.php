<?php

/*
|--------------------------------------------------------------------------
| Bundle Configuration
|--------------------------------------------------------------------------
|
| Bundles allow you to conveniently extend and organize your application.
| Think of bundles as self-contained applications. They can have routes,
| controllers, models, views, configuration, etc. You can even create
| your own bundles to share with the Laravel community.
|
| This is a list of the bundles installed for your application and tells
| Laravel the location of the bundle's root directory, as well as the
| root URI the bundle responds to.
|
| For example, if you have an "admin" bundle located in "bundles/admin" 
| that you want to handle requests with URIs that begin with "admin",
| simply add it to the array like this:
|
|		'admin' => array(
|			'location' => 'admin',
|			'handles'  => 'admin',
|		),
|
| Note that the "location" is relative to the "bundles" directory.
| Now the bundle will be recognized by Laravel and will be able
| to respond to requests beginning with "admin"!
|
| Have a bundle that lives in the root of the bundle directory
| and doesn't respond to any requests? Just add the bundle
| name to the array and we'll take care of the rest.
|
*/

return array(
	/**
	 *	Whether to show flash notices
	 */
	'flash_notices' => array(
		'show_flash_notices' => true,
	),

	/**
	 * 	Css files to load globally
	 */
	'css_files' => array(
		'globals/reset',
		'globals/normalize',
		'bootstrap/bootstrap',
		'bootstrap/bootstrap-responsive',
		'bootstrap/bootstrap-fileupload.min',
		'layouts/layout_default',
	),

	/**
	 * Javascript files to load globally
	 */
	'js_files' => array(
		'jquery/jquery-1.9.1.min',
		'jquery/jquery.color-2.1.1.min',
		'jquery/jquery-ui-1.10.2.custom.min',
		'bootstrap/bootstrap.min',
		// 'layouts/layout_default',
	),

	/**
	 * Images to load globally
	 */
	'images' => array(
		'venue'				=> 'layouts/location.png',
		'user'				=> 'layouts/user.png',

		'facebook_black' 	=> 'logos/facebook_black.png',
		'facebook_white' 	=> 'logos/facebook_white.png',
		'facebook_pink' 	=> 'logos/facebook_pink.png',

		'googlep_black' 	=> 'logos/googlep_black.png',
		'googlep_white' 	=> 'logos/googlep_white.png',
		'googlep_pink'	 	=> 'logos/googlep_pink.png',

		'twitter_black' 	=> 'logos/twitter_black.png',
		'twitter_white' 	=> 'logos/twitter_white.png',
		'twitter_pink'	 	=> 'logos/twitter_pink.png',

		'skype_black' 		=> 'logos/skype_black.png',
		'skype_white' 		=> 'logos/skype_white.png',
		'skype_pink'	 	=> 'logos/skype_pink.png',

		'checkmark' 		=> 'layouts/checkmark.png',

		// 'crowd' 			=> 'layouts/crowd.png',

	),

	'links' => array(
		/**
		 *	HEADER LINKS
		 */
		'home'		=> 'home',
		'events'	=> 'events',
		'about'		=> 'about',

		/**
		 * TOOLBAR LINKS
		 */
		'add_event'				=> 'events/add/',
		'active_events'		=> 'events/active',
		'past_events'			=> 'events/past',
		'edit_event'			=> 'events/edit/',
		'update_event'		=> 'events/update/',
		'events'					=> 'events/',

		'view_profile'		=> 'home',
		'change_profile'	=> 'home',

		'register'		=> 'register',
		'logout' 			=> 'auth/logout',

		/**
		 *	FORM LINKS
		 */
		'login' 			=> 'auth/login',
		'add_user' 		=> 'login/add/',

		/**
		 * URI LINKS
		 */
		'delete_event' 	=> 'events/delete/',
		'view_event' 		=> 'events/view/',
		'view_profile' 		=> 'profile/view/',

	),

	/**
	 *	RULES and ERROR MESSAGES for forms
	 *	'rules' and 'error_msgs' have to have same amount of members
	 */
	'rules' => array(
		'title'  => 'required|min:5|max:50',
		'description' => 'required',
		'background_image' => 'image|max:250',
	),

	'custom_error_msgs' => array(
		'title' 			=> 'Title has to be between 5 to 20 characters',
		'description' 		=> 'You have to have event description',
		'background_image'	=> 'Image size cannot be more than 100 kilobytes',
	),
	// 'docs' => array('handles' => 'docs'),

	'error_msgs' => array(
		'required' 	=> ':attribute field is required.',
		'min' 		=> ':attribute must be atleast 5 characters long',
		'max' 		=> ':attribute must not exceed 50 characters',
	),

);