<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TwitterAPIExchange;
use Intervention\Image\ImageManagerStatic as Image;

class PagesController extends Controller
{
    public function createStory(Request $request){
        $settings = array(
            'oauth_access_token' => "736459597-SWOhi44BIUzuUTdOrZ4XYVpYlbwFSjldP8OjzeFH",
            'oauth_access_token_secret' => "hsROJ4uFyLaNrF4One56u5bnxzxv6KIAh5qkwTlpFMwUJ",
            'consumer_key' => "fblz9XthCfG6m9iqCBbEWdJYF",
            'consumer_secret' => "Yj7k0ltvGQFPzN5tGN1ZFjXcF5caf0zFvQ2YZbiO8JVSNfMh1e"
        );
        $tweeUrl = "https://twitter.com/FaridArzpeyma/status/1341981136306593793";
        $url = 'https://api.twitter.com/1.1/statuses/show/'.basename($tweeUrl).'.json';
        $getfield = '&tweet_mode=extended&texst=';
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);
        $tweet = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();
        
        $tweet = get_object_vars(json_decode($tweet));
        $user = get_object_vars($tweet['user']);

        $text = $tweet['full_text'];
        $max_len = 65;
        $lines = explode("\n", wordwrap($text, $max_len));
        
        
        // configure with favored image driver (gd by default)
        Image::configure(array('driver' => 'imagick'));
        
        $width       = 1080;
        $height      = 1920;
        
        if($tweet['lang'] == 'en') {
            $center_x    =  25;
        } else {
            $center_x    = $width - 25;
        
        }
        $center_y    = $height / 2;
        $font_size   = 50;
        $font_height = 50;
        $max_len     = 80;
        $y     = $center_y - ((count($lines) - 1) * $font_height);

        $img = Image::make(asset('images/template.png'));


// Name
$img->text($this->per_text($user['name']), ($width / 2), 300, function($font) use ($font_size){
	$font->file('/var/www/html/pikaso/fonts/IRANSansWeb.ttf');
	$font->size(41);
	$font->color('#000');
	$font->align('center');
	$font->valign('top');
});

// Username
$img->text('(@'.$user['screen_name'].')', ($width / 2), 360, function($font) use ($font_size){
	$font->file('/var/www/html/pikaso/fonts/IRANSansWeb.ttf');
	$font->size(37);
	$font->color('#909090');
	$font->align('center');
	$font->valign('top');
});

// Date
$img->text($this->per_text(\Morilog\Jalali\Jalalian::forge($tweet['created_at'])->format('l j F Y - H:i')), ($width / 2), 420, function($font) use ($font_size){
	$font->file('/var/www/html/pikaso/fonts/IRANSansWeb.ttf');
	$font->size(35);
	$font->color('#00dcff');
	$font->align('center');
	$font->valign('top');
});

$watermark = Image::make(str_replace("_normal","",$user['profile_image_url']))->resize(250, 250);
$img->insert($watermark, 'top-center', 30, 30);
foreach ($lines as $line)
{
    $img->text( $this->per_text($line), ($width / 2), $y, function($font) use ($font_size, $font_height, $tweet){
		$font->file('/var/www/html/pikaso/fonts/IRANSansWeb.ttf');
		$font->size($font_size);
        $font->color('#111');
        if($tweet['lang'] == 'en') {
            $font->align('center');
        } else {
            $font->align('center');        
        }
		$font->valign('top');
    });

    $y += $font_height + ($font_height - $font_height / 3);
}


$fileName = hash ( "sha256" , time() . basename($tweeUrl) ) .'.png';
$img->save($fileName);

echo $fileName;



    }


    protected function per_text($str)
    {
        include_once('bidi.php');
    
        $text = explode("\n", $str);
    
        $str = array();
    
        foreach($text as $line){
            $chars = bidi::utf8Bidi(bidi::UTF8StringToArray($line), 'R');
            $line = '';
            foreach($chars as $char){
                $line .= bidi::unichr($char);
            }
    
            $str[] = $line;
        }
    
        return $str = implode("\n", $str);
    }
}
