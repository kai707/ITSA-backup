<?php  // $Id: lib.php,v 0.2 2009/02/21 matbury Exp $
/**
* Library of functions and constants for module flv
* 
* @author Matt Bury - matbury@gmail.com - http://matbury.com/
* @version $Id: index.php,v 0.2 2009/02/21 matbury Exp $
* @licence http://www.gnu.org/copyleft/gpl.html GNU Public Licence
* @package flv
*/

/**    Copyright (C) 2009  Matt Bury
*
*    This program is free software: you can redistribute it and/or modify
*    it under the terms of the GNU General Public License as published by
*    the Free Software Foundation, either version 3 of the License, or
*    (at your option) any later version.
*
*    This program is distributed in the hope that it will be useful,
*    but WITHOUT ANY WARRANTY; without even the implied warranty of
*    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*    GNU General Public License for more details.
*
*    You should have received a copy of the GNU General Public License
*    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

/**
 * Given an object containing all the necessary data, 
 * (defined by the form in mod.html) this function 
 * will create a new instance and return the id number 
 * of the new instance.
 *
 * @param object $instance An object from the form in mod.html
 * @return int The id of the newly inserted flv record
 **/
function flv_add_instance($flv) {
    
    $flv->timecreated = time();

    # May have to add extra stuff in here #
	
	return insert_record('flv', $flv);
}

/**
 * Given an object containing all the necessary data, 
 * (defined by the form in mod.html) this function 
 * will update an existing instance with new data.
 *
 * @param object $instance An object from the form in mod.html
 * @return boolean Success/Fail
 **/
function flv_update_instance($flv) {

    $flv->timemodified = time();
    $flv->id = $flv->instance;
	
	# May have to add extra stuff in here #
		
    return update_record("flv", $flv);
}

/**
 * Given an ID of an instance of this module, 
 * this function will permanently delete the instance 
 * and any data that depends on it. 
 *
 * @param int $id Id of the module instance
 * @return boolean Success/Failure
 **/
function flv_delete_instance($id) {

    if (! $flv = get_record("flv", "id", "$id")) {
        return false;
    }

    $result = true;

    # Delete any dependent records here #

    if (! delete_records("flv", "id", "$flv->id")) {
        $result = false;
    }

    return $result;
}

/**
 * Return a small object with summary information about what a 
 * user has done with a given particular instance of this module
 * Used for user activity reports.
 * $return->time = the time they did it
 * $return->info = a short text description
 *
 * @return null
 * @todo Finish documenting this function
 **/
function flv_user_outline($course, $user, $mod, $flv) {
    return $return;
}

/**
 * Print a detailed representation of what a user has done with 
 * a given particular instance of this module, for user activity reports.
 *
 * @return boolean
 * @todo Finish documenting this function
 **/
function flv_user_complete($course, $user, $mod, $flv) {
    return true;
}

/**
 * Given a course and a time, this module should find recent activity 
 * that has occurred in flv activities and print it out. 
 * Return true if there was output, or false is there was none. 
 *
 * @uses $CFG
 * @return boolean
 * @todo Finish documenting this function
 **/
function flv_print_recent_activity($course, $isteacher, $timestart) {
    global $CFG;

    return false;  //  True if anything was printed, otherwise false 
}

/**
 * Function to be run periodically according to the moodle cron
 * This function searches for things that need to be done, such 
 * as sending out mail, toggling flags etc ... 
 *
 * @uses $CFG
 * @return boolean
 * @todo Finish documenting this function
 **/
function flv_cron () {
    global $CFG;

    return true;
}

/**
 * Must return an array of grades for a given instance of this module, 
 * indexed by user.  It also returns a maximum allowed grade.
 * 
 * Example:
 *    $return->grades = array of grades;
 *    $return->maxgrade = maximum allowed grade;
 *
 *    return $return;
 *
 * @param int $flvid ID of an instance of this module
 * @return mixed Null or object with an array of grades and with the maximum grade
 **/
function flv_grades($flvid) {
   return NULL;
}

/**
 * Must return an array of user records (all data) who are participants
 * for a given instance of flv. Must include every user involved
 * in the instance, independient of his role (student, teacher, admin...)
 * See other modules as example.
 *
 * @param int $flvid ID of an instance of this module
 * @return mixed boolean/array of students
 **/
function flv_get_participants($flvid) {
    return false;
}

/**
 * This function returns if a scale is being used by one flv
 * it it has support for grading and scales. Commented code should be
 * modified if necessary. See forum, glossary or journal modules
 * as reference.
 *
 * @param int $flvid ID of an instance of this module
 * @return mixed
 * @todo Finish documenting this function
 **/
function flv_scale_used ($flvid,$scaleid) {
    $return = false;

    //$rec = get_record("flv","id","$flvid","scale","-$scaleid");
    //
    //if (!empty($rec)  && !empty($scaleid)) {
    //    $return = true;
    //}
   
    return $return;
}

/**
 * Checks if scale is being used by any instance of flv.
 * This function was added in 1.9
 *
 * This is used to find out if scale used anywhere
 * @param $scaleid int
 * @return boolean True if the scale is used by any flv
 */
function flv_scale_used_anywhere($scaleid) {
    if ($scaleid and record_exists('flv', 'grade', -$scaleid)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Execute post-install custom actions for the module
 * This function was added in 1.9
 *
 * @return boolean true if success, false on error
 */
function flv_install() {
     return true;
}

/**
 * Execute post-uninstall custom actions for the module
 * This function was added in 1.9
 *
 * @return boolean true if success, false on error
 */
function flv_uninstall() {
    return true;
}

/*
---------------------------------------- view.php ----------------------------------------
*/

/**
* Construct Javascript flvObject embed code for <head> section of view.php
*
* @param $flv (mdl_flv DB record for current flv module instance)
* @return string
*/
function flv_print_header_js($flv) {
	global $CFG;
	global $COURSE;
	
	// Build URL to moodledata directory
	// This is where flv files and media should be stored
	$flv_moodledata = $CFG->wwwroot.'/file.php/'.$COURSE->id.'/';
	
	// If it's a sound, image or video, we need the moodledata path
	if($flv->type == 'sound' || $flv->type == 'image' || $flv->type == 'video' || $flv->type == '') {
		$flv_prefix = $CFG->wwwroot.'/file.php/'.$COURSE->id.'/';
	} else {
		$flv_prefix = '';
	}
	
	// Check for configuration XML file URL
	if($flv->configxml == '') {
		$flv_configxml = '';
	} else {
		$flv_configxml = $flv_moodledata.$flv->configxml.'?'.time();
	}
	
	// Check for HD-Video content URL
	if($flv->hdfile == '') {
		$flv_hdfile = '';
	} else {
		$flv_hdfile = $flv_prefix.$flv->hdfile.'?'.time();
	}
	
	// Check for poster image URL
	if($flv->image == '') {
		$flv_image = '';
	} else {
		$flv_image = $flv_moodledata.$flv->image.'?'.time();
	}
	
	// Check for JW FLV Player skin URL
	if($flv->skin == '') {
		$flv_skin = '';
	} else {
		$flv_skin = $CFG->wwwroot.'/mod/flv/skins/'.$flv->skin.'?'.time();
	}
	
	// Check for logo URL
	if($flv->logo == '') {
		$flv_logo = '';
	} else {
		$flv_logo = $flv_moodledata.$flv->logo.'?'.time();
	}
	
	// Check for captions XML URL
	if($flv->captions == '') {
		$flv_captions = '';
	} else {
		$flv_captions = $flv_moodledata.$flv->captions.'?'.time();
		$flv->plugins = 'accessibility-1';
	}
	
	// Build Javascript code for view.php print_header() function
	$flv_header_js = '<script type="text/javascript" src="swfobject/swfobject.js"></script>
		<script type="text/javascript">
			var flashvars = {};
			flashvars.author = "'.$flv->author.'";
			flashvars.configxml = "'.$flv_configxml.'";
			flashvars.date = "'.$flv->flvdate.'";
			flashvars.description = "'.$flv->description.'";
			flashvars.file = "'.$flv_prefix.$flv->flvfile.'";
			flashvars.hd.file = "'.$flv_hdfile.'";
			flashvars.image = "'.$flv_image.'";
			flashvars.link = "'.$flv->link.'";
			flashvars.start = "'.$flv->flvstart.'";
			flashvars.tags = "'.$flv->tags.'";
			flashvars.title = "'.$flv->title.'";
			flashvars.type = "'.$flv->type.'";
			flashvars.backcolor = "'.$flv->backcolor.'";
			flashvars.frontcolor = "'.$flv->frontcolor.'";
			flashvars.lightcolor = "'.$flv->lightcolor.'";
			flashvars.screencolor = "'.$flv->screencolor.'";
			flashvars.controlbar = "'.$flv->controlbar.'";
			flashvars.playlist = "'.$flv->playlist.'";
			flashvars.playlistsize = "'.$flv->playlistsize.'";
			flashvars.skin = "'.$flv_skin.'";
			flashvars.autostart = "'.$flv->autostart.'";
			flashvars.bufferlength = "'.$flv->bufferlength.'";
			flashvars.displayclick = "'.$flv->displayclick.'";
			flashvars.icons = "'.$flv->icons.'";
			flashvars.item = "'.$flv->item.'";
			flashvars.linktarget = "'.$flv->linktarget.'";
			flashvars.logo = "'.$flv_logo.'";
			flashvars.mute = "'.$flv->mute.'";
			flashvars.quality = "'.$flv->quality.'";
			flashvars.repeat = "'.$flv->flvrepeat.'";
			flashvars.resizing = "'.$flv->resizing.'";
			flashvars.shuffle = "'.$flv->shuffle.'";
			flashvars.state = "'.$flv->state.'";
			flashvars.stretching = "'.$flv->stretching.'";
			flashvars.volume = "'.$flv->volume.'";
			flashvars.abouttext = "'.$flv->abouttext.'";
			flashvars.aboutlink = "'.$flv->aboutlink.'";
			flashvars.client = "'.$flv->client.'";
			flashvars.id = "'.$flv->flvid.'";
			flashvars.plugins = "'.$flv->plugins.'";
			flashvars.captions = "'.$flv_captions.'";
			flashvars.streamer = "'.$flv->streamer.'";
			flashvars.tracecall = "'.$flv->tracecall.'";
			flashvars.version = "'.$flv->version.'";
			var params = {};
			params.play = "true";
			params.loop = "true";
			params.menu = "true";
			params.quality = "best";
			params.scale = "noscale";
			params.salign = "tl";
			params.wmode = "opaque";
			params.bgcolor = "";
			params.devicefont = "true";
			params.seamlesstabbing = "true";
			params.allowfullscreen = "'.$flv->fullscreen.'";
			params.allowscriptaccess = "always";
			params.allownetworking = "all";
			var attributes = {};
			attributes.align = "middle";
			swfobject.embedSWF("jw/player.swf", "myAlternativeContent", "'.$flv->width.'", "'.$flv->height.'", "'.$flv->fpversion.'", "swfobject/expressInstall.swf", flashvars, params, attributes);
		</script>';
	
	return $flv_header_js;
}

/**
* Construct Javascript flvObject embed code for <body> section of view.php
*
* @param $flv (mdl_flv DB record for current flv module instance)
* @return string
*/
function flv_print_body($flv) {
	global $CFG;
	global $COURSE;
	
	// Build URL to moodledata directory
	// This is where flv files and media should be stored
	$flv_moodledata = $CFG->wwwroot.'/file.php/'.$COURSE->id.'/';
	
	// If it's a sound, image or video, we need the moodledata path
	if($flv->type == 'sound' || $flv->type == 'image' || $flv->type == 'video' || $flv->type == '') {
		$flv_prefix = $CFG->wwwroot.'/file.php/'.$COURSE->id.'/';
	} else {
		$flv_prefix = '';
	}
	
	// Check for configuration XML file URL
	if($flv->configxml == '') {
		$flv_configxml = '';
	} else {
		$flv_configxml = $flv_moodledata.$flv->configxml.'?'.time();
	}
	
	// Check for HD-Video content URL
	if($flv->hdfile == '') {
		$flv_hdfile = '';
	} else {
		$flv_hdfile = $flv_prefix.$flv->hdfile.'?'.time();
	}
	
	// Check for poster image URL
	if($flv->image == '') {
		$flv_image = '';
	} else {
		$flv_image = $flv_moodledata.$flv->image.'?'.time();
	}
	
	// Check for JW FLV Player skin URL
	if($flv->skin == '') {
		$flv_skin = '';
	} else {
		$flv_skin = $CFG->wwwroot.'/mod/flv/skins/'.$flv->skin.'?'.time();
	}
	
	// Check for logo URL
	if($flv->logo == '') {
		$flv_logo = '';
	} else {
		$flv_logo = $flv_moodledata.$flv->logo.'?'.time();
	}
	
	// Check for captions XML URL
	if($flv->captions == '') {
		$flv_captions = '';
	} else {
		$flv_captions = $flv_moodledata.$flv->captions.'?'.time();
		$flv->plugins = 'accessibility-1';
	}
	
	$flv_body = '<div align="center">
		<div id="myAlternativeContent">
			<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="'.$flv->width.'" height="'.$flv->height.'" id="myFlashContent" align="middle">
				<param name="movie" value="jw/player.swf" />
				<param name="play" value="true" />
				<param name="loop" value="true" />
				<param name="menu" value="true" />
				<param name="quality" value="best" />
				<param name="scale" value="noscale" />
				<param name="salign" value="tl" />
				<param name="wmode" value="opaque" />
				<param name="bgcolor" value="" />
				<param name="devicefont" value="true" />
				<param name="seamlesstabbing" value="true" />
				<param name="allowfullscreen" value="'.$flv->fullscreen.'" />
				<param name="allowscriptaccess" value="sameDomain" />
				<param name="allownetworking" value="all" />
				<param name="flashvars" value="configxml='.$flv_configxml.'author='.$flv->author.'&amp;date='.$flv->flvdate.'&amp;description='.$flv->description.'&amp;file='.$flv_prefix.$flv->flvfile.'&amp;image='.$flv_image.'&amp;link='.$flv->link.'&amp;start='.$flv->flvstart.'&amp;tags='.$flv->tags.'&amp;title='.$flv->title.'&amp;type='.$flv->type.'&amp;backcolor='.$flv->backcolor.'&amp;frontcolor='.$flv->frontcolor.'&amp;lightcolor='.$flv->lightcolor.'&amp;screencolor='.$flv->screencolor.'&amp;controlbar='.$flv->controlbar.'&amp;playlist='.$flv->playlist.'&amp;playlistsize='.$flv->playlistsize.'&amp;skin='.$flv_skin.'&amp;autostart='.$flv->autostart.'&amp;bufferlength='.$flv->bufferlength.'&amp;displayclick='.$flv->displayclick.'&amp;icons='.$flv->icons.'&amp;item='.$flv->item.'&amp;linktarget='.$flv->linktarget.'&amp;logo='.$flv_logo.'&amp;mute='.$flv->mute.'&amp;quality='.$flv->quality.'&amp;repeat='.$flv->flvrepeat.'&amp;resizing='.$flv->resizing.'&amp;shuffle='.$flv->shuffle.'&amp;state='.$flv->state.'&amp;stretching='.$flv->stretching.'&amp;volume='.$flv->volume.'&amp;abouttext='.$flv->abouttext.'&amp;aboutlink='.$flv->aboutlink.'&amp;client='.$flv->client.'&amp;id='.$flv->flvid.'&amp;plugins='.$flv->plugins.'&amp;captions='.$flv_captions.'&amp;streamer='.$flv->streamer.'&amp;tracecall='.$flv->tracecall.'&amp;version='.$flv->version.'" />
				<!--[if !IE]>-->
				<object type="application/x-shockwave-flash" data="jw/player.swf" width="'.$flv->width.'" height="'.$flv->height.'" align="middle">
					<param name="play" value="true" />
					<param name="loop" value="true" />
					<param name="menu" value="true" />
					<param name="quality" value="best" />
					<param name="scale" value="noscale" />
					<param name="salign" value="tl" />
					<param name="wmode" value="opaque" />
					<param name="bgcolor" value="" />
					<param name="devicefont" value="true" />
					<param name="seamlesstabbing" value="true" />
					<param name="allowfullscreen" value="'.$flv->fullscreen.'" />
					<param name="allowscriptaccess" value="sameDomain" />
					<param name="allownetworking" value="all" />
					<param name="flashvars" value="configxml='.$flv_configxml.'author='.$flv->author.'&amp;date='.$flv->flvdate.'&amp;description='.$flv->description.'&amp;file='.$flv_prefix.$flv->flvfile.'&amp;image='.$flv_image.'&amp;link='.$flv->link.'&amp;start='.$flv->flvstart.'&amp;tags='.$flv->tags.'&amp;title='.$flv->title.'&amp;type='.$flv->type.'&amp;backcolor='.$flv->backcolor.'&amp;frontcolor='.$flv->frontcolor.'&amp;lightcolor='.$flv->lightcolor.'&amp;screencolor='.$flv->screencolor.'&amp;controlbar='.$flv->controlbar.'&amp;playlist='.$flv->playlist.'&amp;playlistsize='.$flv->playlistsize.'&amp;skin='.$flv_skin.'&amp;autostart='.$flv->autostart.'&amp;bufferlength='.$flv->bufferlength.'&amp;displayclick='.$flv->displayclick.'&amp;icons='.$flv->icons.'&amp;item='.$flv->item.'&amp;linktarget='.$flv->linktarget.'&amp;logo='.$flv_logo.'&amp;mute='.$flv->mute.'&amp;quality='.$flv->quality.'&amp;repeat='.$flv->flvrepeat.'&amp;resizing='.$flv->resizing.'&amp;shuffle='.$flv->shuffle.'&amp;state='.$flv->state.'&amp;stretching='.$flv->stretching.'&amp;volume='.$flv->volume.'&amp;abouttext='.$flv->abouttext.'&amp;aboutlink='.$flv->aboutlink.'&amp;client='.$flv->client.'&amp;id='.$flv->flvid.'&amp;plugins='.$flv->plugins.'&amp;captions='.$flv_captions.'&amp;streamer='.$flv->streamer.'&amp;tracecall='.$flv->tracecall.'&amp;version='.$flv->version.'" />
				<!--<![endif]-->
					<div align="center">
  						<p><strong><a href="http://longtailvideo.com/" target="_blank">JW FLV Player 4.3</a> requires <a href="http://www.adobe.com/products/flashplayer/">Flash Player 9.0.114</a> or above installed to function correctly.</strong></p>
  						<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" border="0" /></a></p>
					</div>
				<!--[if !IE]>-->
				</object>
				<!--<![endif]-->
			</object>
		</div>
	</div><div><p>'.$flv->notes.'</p></div>';
	
	return $flv_body;
}

/*
---------------------------------------- mod_form.php ----------------------------------------
*/

/**
* true/false options
* @return array
*/
function flv_list_truefalse() {
	return array('true' => 'true',
				'false' => 'false');
}

/**
* Define target of link when user clicks on 'link' button
* @return array
*/
function flv_list_linktarget() {
	return array('_blank' => 'new window',
				'_self' => 'same page',
				'none' => 'none');
}

/**
* Define target of link when user clicks on 'link' button
* @return array
*/
/*function flv_list_plugins() {
	return array('' => 'none',
				'accessibility-1' => 'XML Captions');
}*/

/**
* Define type of media to serve
* @return array
*/
function flv_list_type() {
	return array('url' => 'Full URL',
				'sound' => 'Sound',
				'image' => 'Image',
				'video' => 'Video',
				'youtube' => 'YouTube',
				'' => 'XML Playlist',
				'camera' => 'Camera',
				'http' => 'HTTP Streaming',
				'lighttpd' => 'Lighttpd Streaming',
				'rtmp' => 'RTMP Streaming');
}

/**
* HTTP streaming (Xmoov-php) not yet working!
* 
* For Lighttpd streaming or RTMP (Flash Media Server or Red5),
* enter the path to the gateway in the corresponding empty quotes
* and uncomment the appropriate lines
* e.g. 'path/to/your/gateway.jsp' => 'RTMP');
*
* For RTMP streaming, uncomment and edit this line: //, 'rtmp://yourstreamingserver.com/yourmediadirectory' => 'RTMP'
* to reflect your streaming server's details. It's probably a good idea to change the 'RTMP' bit to the name of your streaming service,
* i.e. 'My Media Server' or 'Acme Media Server'.
* Remember not to include the ".flv" file extensions in video file names when using RTMP.
* @return array
*/
function flv_list_streamer() {
	global $CFG;
	return array('' => 'none'
				 //, $CFG->wwwroot.'/mod/flv/xmoov/xmoov.php' => 'Xmoov-php (http)'
				 //, '' => 'Lighttpd'
				 //, 'rtmp://yourstreamingserver.com/yourmediadirectory' => 'RTMP'
				 );
}

/**
* Define position of player control bar
* @return array
*/
function flv_list_controlbar() {
	return array('bottom' => 'bottom',
				'over' => 'over',
				'none' => 'none');
}

/**
* Define position of playlist
* @return array
*/
function flv_list_playlistposition() {
	return array('bottom' => 'bottom',
				'right' => 'right',
				'over' => 'over',
				'none' => 'none');
}

/**
* Skins define the general appearance of the JW FLV Player
* @return array
*/
function flv_list_skins() {
	return array('' => '',
				'3dpixelstyle.swf' => '3D Pixel Style',
				'atomicred.swf' => 'Atomic Red',
				'bekle.swf' => 'Bekle',
				'bluemetal.swf' => 'Blue Metal',
				'comet.swf' => 'Comet',
				'controlpanel.swf' => 'Control Panel',
				'dangdang.swf' => 'Dangdang',
				'fashion.swf' => 'Fashion',
				'festival.swf' => 'Festival',
				'grungetape.swf' => 'Grunge Tape',
				'icecreamsneaka.swf' => 'Ice Cream Sneaka',
				'kleur.swf' => 'Kleur',
				'magma.swf' => 'Magama',
				'metarby10.swf' => 'Metarby 10',
				'modieus.swf' => 'Modieus',
				'nacht.swf' => 'Nacht',
				'neon.swf' => 'Neon',
				'pearlized.swf' => 'Pearlized',
				'pixelize.swf' => 'Pixelize',
				'playcasso.swf' => 'Playcasso',
				'silverywhite.swf' => 'Silvery White',
				'simple.swf' => 'Simple',
				'snel.swf' => 'Snel',
				'stijl.swf' => 'Stijl',
				'stylish_slim.swf' => 'Stylish Slim',
				'traganja.swf' => 'Traganja');
}

/**
* Define number of seconds of video stream to buffer before playing
* @return array
*/
function flv_list_bufferlength() {
	return array('0' => '0',
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',
				'7' => '7',
				'8' => '8',
				'9' => '9',
				'10' => '10',
				'11' => '11',
				'12' => '12',
				'13' => '13',
				'14' => '14',
				'15' => '15',
				'16' => '16',
				'17' => '17',
				'18' => '18',
				'19' => '19',
				'20' => '20',
				'21' => '21',
				'22' => '22',
				'23' => '23',
				'24' => '24',
				'25' => '25',
				'26' => '26',
				'27' => '27',
				'28' => '28',
				'29' => '29',
				'30' => '30');
}

/**
* Define action when user clicks on video
* @return array
*/
function flv_list_displayclick() {
	return array('play' => 'play',
				'link' => 'link',
				'fullscreen' => 'fullscreen',
				'none' => 'none',
				'mute' => 'mute',
				'next' => 'next');
}

/**
* Define playlist repeat behaviour
* @return array
*/
function flv_list_repeat() {
	return array('none' => 'none',
				'always' => 'always',
				'single' => 'single');
}

/**
* Define scaling properties of video stream
* @return array
*/
function flv_list_stretching() {
	return array('uniform' => 'uniform',
				'exactfit' => 'exactfit',
				'fill' => 'fill');
}

/**
* Define playback volume
* @return array
*/
function flv_list_volume() {
	return array('0' => '0',
				'5' => '5',
				'10' => '10',
				'15' => '15',
				'20' => '20',
				'25' => '25',
				'30' => '30',
				'35' => '35',
				'40' => '40',
				'45' => '45',
				'50' => '50',
				'55' => '55',
				'60' => '60',
				'65' => '65',
				'70' => '70',
				'75' => '75',
				'80' => '80',
				'85' => '85',
				'90' => '90',
				'95' => '95',
				'100' => '100');
}
/// End of mod/flv/lib.php

?>