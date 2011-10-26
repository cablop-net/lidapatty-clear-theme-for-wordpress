<?php
$socialsOnOff = get_option('invent-socials-onoff');
if( get_option('invent-socials-onoff') ) {
	$socialData = get_option('invent-socials');
	echo '<ul id="social">';
	foreach($socialData as $name => $value) {
		if(($value || $name=='rss') && $socialsOnOff && !empty($socialsOnOff[$name])){

			switch($name){
				case 'email':
					$url = 'mailto:'.$value;
					$title = 'E-mail';
					break;
				case 'rss':
					$url = home_url().'/rss/';
					$title = 'RSS';
					break;
				case 'skype':
					$url = 'callto://'.$value;
					$title = 'Skype';
					break;
				default:
					$url = 'http://'.$value;
					$title = ucfirst($name);
					break;
				if($title == 'Youtube') $title = 'YouTube';
				elseif($title == 'Linkedin') $title = 'LinkedIn';
				elseif($title == 'Myspace') $title = 'MySpace';
				elseif($title == 'Stumbleupon') $title = 'StumbleUpon';
			}
			?><li><a href="<?php echo $url ?>" title="<?php echo $title ?>"><span><img src="<?php echo get_template_directory_uri(); ?>/images/social/<?php echo $name ?>.png" alt="<?php echo $title ?>" /></span></a></li><?php
		}
	}
	echo '</ul>';
}