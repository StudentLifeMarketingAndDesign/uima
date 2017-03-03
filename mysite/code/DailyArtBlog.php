<?php

class DailyArtBlog extends Blog {

	private static $db = array(

	);

	private static $allowed_children = array(
		'DailyArtBlogPost'
	);
    private static $singular_name = 'Daily Art Blog';

    private static $plural_name = 'Daily Art Blogs';

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		return $fields;
	}

}

class DailyArtBlog_Controller extends Blog_Controller {
    
    private static $allowed_actions = array(
        'slider'
    );
  
    public function index(){

    	$currentDate = SS_Datetime::now();
    	$dayObj = DailyArtBlogDay::get()->filter(array('Month' => $currentDate->Format('n'), 'Date' => $currentDate->Format('j')))->First();
        $totalPosts = DailyArtBlogPost::get()->Count();

        if($totalPosts == 0){
            return $this->renderWith(array('DailyArtBlog', 'Page'));
        }

    	if($dayObj){
    		$posts = $dayObj->getPosts();
            while($posts->Count() == 0){
                $dayObj = $dayObj->PreviousDay();
                $posts = $dayObj->getPosts();
            }
    	}

    	$data = new ArrayData(
    		array(
    			'DailyArtBlogDay' => $dayObj,
    			'CurrentDayPosts' => $posts
    		)

    	);
    	return $this->customise($data)->renderWith(array('DailyArtBlog', 'Page'));
    
    }

    public function slider(){
        return $this->renderWith('DailyArtBlogDaySlider');
    }


}