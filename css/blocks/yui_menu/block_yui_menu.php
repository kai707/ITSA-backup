<?php
/**
 * The course navigation menu block
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * This course menu is inspired by the Course Menu+ from NetSapiensis.com
 * and the one from Humbolt State University.
 *
 * @author Alan Trick
 * @copyright Copyright (c) 2007 Trinity Western University
 * @license http://www.gnu.org/copyleft/gpl-3.0.html
 */


require_once $CFG->dirroot.'/mod/resource/lib.php';

/**
 * The main class
 *
 * I don't think we support muliple instances, but it should be that difficult to do so.
 */
class block_yui_menu extends block_base {
    
    function init() {
        $this->title = get_string('blockname','block_yui_menu');
        $this->content_type = BLOCK_TYPE_TEXT;
        $this->version = '2007092000';
    }
    
	function instance_allow_config() {
	    return true;
	}
	function applicable_formats() {
        return array(
            'course' => true,
            'my-index' => false,
         );
    }
  
    function get_content() {
        // cache content
        if (isset($this->content)) return $this->content;
        
        global $USER, $CFG;
	    require_once $CFG->dirroot . '/course/lib.php';
        require_once $CFG->libdir . '/ajax/ajaxlib.php';
        
		$course = get_record('course', 'id', $this->instance->pageid);
	    
        // if we're looking at the course home page
        if (strpos($_SERVER['REQUEST_URI'],'course/view.php')!=0) {
			# get current section being displayed
			$week = optional_param('week', -1, PARAM_INT);
			if ($week != -1) {
			    $display = course_set_display($course->id, $week);
			} else {
			    if (isset($USER->display[$course->id])) {
			        $display = $USER->display[$course->id];
			    } else {
			        $display = course_set_display($course->id, 0);
			    }
			}
        } elseif(strpos($_SERVER['REQUEST_URI'],'/mod/')!==false) {
        	// use on a module page
        	$sql='select section from '.$CFG->prefix.'course_sections where id=(select section from '.$CFG->prefix.'course_modules where id='.$_GET['id'].')';
        	$row=get_record_sql($sql);
        	$display=$row->section;	    
        } else {
        	$display = 0;
        }
        
        if (in_array($course->format, array('topics','twu'))) {
            $format = 'topic';
        } else {
            $format = 'week';
        }
        
	    get_all_mods($course->id, $mods, $modnames, $modnamesplural, $modnamesused);
        
        $items = $this->visible_items($course);
        
        if (isset($items['outline'])) {
            //echo require_js(array('yui_yahoo','yui_event','yui_treeview')); 
			echo require_js(array('yui_yahoo','yui_event','yui_dom-event','yui_treeview')); 
        }
        
		// merge items
        $script = '';
        $menu = '';
        $menuid = 'yui_menu_tree_'.$this->instance->id;
        $even = true;
        $script = '';
        foreach ($items as $item=>$v) {
            // add them to the tree in the order from configuration
            // even/odd classes
            $mod = 'r' . ($even ? '0' : '1');
            $even = !$even;
            // required parameters
            $url = htmlspecialchars($CFG->wwwroot . $v['url']);
            $ico = htmlspecialchars($v['icon']);
            $txt = htmlspecialchars($v['text']);
            // optional title attribute
            if (isset($v['title'])) {
                $title = " title = '".htmlspecialchars($v['title'])."'";
            } else {
                $title = '';
            }
            // add to menu
            $menu .= "
<li class='$mod yui_menu_item_$item'>
<div class='icon column c0'><img src='$ico' alt='' /></div>
<div class='column c1'><a href='$url'$title>$txt</a></div>";
            if ($item == "outline") {
                if ($course->format != 'course-view-social') {
                    $menu .= "<div id='$menuid' class='yui_menu_outline_tree'></div>";
                    $script .= $this->course_sections($course, $mods, $display);
                }
            }
            $menu .= "</li>";
        }
	    // print the tree
        // note: YUI treeview css must be included in theme
        $output = "
        <ul class='list'>
        $menu
        </ul>";
        if (isset($items['outline'])) {
            $output .= "
<script type='text/javascript'>//<![CDATA[

function addTreeIcons(node) {
    for(var c in node.children) {
        child = node.children[c];
        // e might be null, meaning the child hasn't been expanded yet
        if (child._yui_menu_icon && (e = child.getLabelEl())) {
            e.style.backgroundImage = 'url('+child._yui_menu_icon+')';
            // more efficent if this is added as and event
            child._yui_menu_icon = null;
        }
    }
}

var tree = new YAHOO.widget.TreeView('$menuid');
var root = tree.getRoot();
$script
tree.draw();
// configure icons for elements that have already been loaded
for(var c in root.children) addTreeIcons(root.children[c]);
// for icons not yet loaded
tree.subscribe('expandComplete', addTreeIcons);
//]]>
</script>
";
        }
        $this->content = new stdClass;
        $this->content->text = $output;
        $this->content->footer = '';
        return $this->content;
    }
    /**
     * initialize menu items
     */
    function available_items($course) {
        global $CFG, $USER;
        // ordered array of name => array(text, url, icon)
        $context = get_context_instance(CONTEXT_COURSE, $course->id);
        if (in_array($course->format, array('weeks','weekscss'))) {
            $viewall = 'week=0';
        } else {
            $viewall = 'topic=all';
        }
        $base = array( 
            'outline'   => array('text' => get_string('outline', 'block_yui_menu'),
                                 'url'  => "/course/view.php?id={$course->id}&$viewall",
                                 'icon' => "{$CFG->wwwroot}/blocks/yui_menu/icons/viewall.gif",
                                 'default' => false),
            'messages'  => array('text' => get_string('messages', 'message'),
                                 'url'  => '/message/',
                                 'icon' => "{$CFG->pixpath}/i/email.gif",
                                 'default' => false),
            'calendar'  => array('text' => get_string('calendar', 'calendar'),
                                 'url'  => "/calendar/view.php?view=upcoming&course={$course->id}",
                                 'icon' => "{$CFG->pixpath}/c/event.gif",
                                 'default' => false),
        );
        // add on extra things
        if ($course->showgrades) {
            $base['gradebook'] = array(
                'text' => get_string('gradebook', 'grades'),
                'url'  => "/grade/?id={$course->id}",
                'icon' => "{$CFG->pixpath}/i/grades.gif",
                'default' => true);
        };
        if (has_capability('moodle/course:viewparticipants', $context)) {
            $base['participants'] = array(
                'text' => get_string('participants'),
                'title' => get_string('listofallpeople'),
                'url'  => "/user/?contextid={$context->id}",
                'icon' => "{$CFG->pixpath}/i/users.gif",
                'default' => true);
        }
        // add module items
        // list of all mods
        $allmods = $allmods = get_records('modules', 'visible', '1');
        $modrecords = get_records_sql(
"SELECT DISTINCT m.id
FROM {$CFG->prefix}modules m, {$CFG->prefix}course_modules cm
WHERE cm.course = '{$course->id}'
    AND cm.module = m.id
    AND cm.visible > 0;");
        // get list of mods used in course
        $coursemods = array();
        if ($modrecords) {
            foreach ($modrecords as $r) {
                $coursemods[] = $r->id;
            }
        }
        foreach ($allmods as $mod) {
            // ignore labels
            if ($mod->name == 'label') continue;
            // add mod to available list
           if (isset($this->instance->pinned)) {
            	$default = 'show';        	
            } else {
                $default = in_array($mod->id, $coursemods);
            }
            $base["mod_{$mod->name}"] = array(
                'text' => get_string('modulenameplural', $mod->name),
                'url'  => "/mod/{$mod->name}/?id={$course->id}",
                'icon' => "{$CFG->modpixpath}/{$mod->name}/icon.gif",
                'default' => $default,
            );
        }
        // build final list
        $items = array();
        // order items
        // $this->config->order_k = k-th entry in the tree
        $baseorder = array_keys($base);
        $order = array();
        
        for ($i=0; $i < count($baseorder); $i++) {
            $item = 'order_'.$i;
            if (!isset($this->config->$item)) continue;
            $attr = $this->config->$item;
            if (array_key_exists($attr, $base)) {
                // use stored value
                $order[$i] = $attr;

            }
        }
        foreach ($baseorder as $item) {
            if (!in_array($item, $order)) {
                array_push($order, $item);
            }
        }
        foreach ($order as $item) {
            $items[$item] = $base[$item];
        }
        return $items;
    }
    
    /**
     * Filters the available items based on configuration
     */ 
    function visible_items($course) {
        $all_items = $this->available_items($course);
		// filter undisplayed items
        $visible = array();
        foreach ($all_items as $k=>$v) {
            $item = 'item_'.$k;
            if (!empty($this->config->$item)) {
                if ($this->config->$item == 'show') $visible[$k] = $v;
            } else if ($v['default']) $visible[$k] = $v;
        }
        return $visible;
    }
    
    function course_sections($course, $mods, $displaysection) {
        global $CFG, $USER;
        
        // sections
	    $sections = get_all_sections($course->id);
	    // name for sections
	    $sectionname = get_string("name" . $course->format);
        // buffer of ouput to return and print
        $out = "";
        // check what the course format is like
        if (in_array($course->format, array('topics','twu'))) {
            $format = 'topic';
        } else {
            $format = 'week';
        }
        // highlight for current week or highlighted topic
        if (in_array($course->format, array('weeks', 'weekscss'))) {
            $highlight = ceil((time()-$course->startdate)/604800);
        } else {
            $highlight = $course->marker;
        }
        foreach ($sections as $section) {
            // don't show the flowing sections
            if (!($section->visible && // invisible ones
                  $section->section && // the one at the very top
                  // anything above the courses section limit
                  $section->section <= $course->numsections
                  )) { continue;}
            
            $summary = trim($section->summary);

            if (empty($summary)) {
                $summary = ($sectionname)." ".$section->section; //ucwords($sectionname)." ".$section->section;
            } else {
                $summary = $this->truncate_html($summary);
            }
            // expand section if it's the one currently displayed
            $expand = 'false';
            if ($section->section == $displaysection) {
                $expand = 'true';
            }
            // highlight marked section
            if ($section->section == $highlight) {
                $sectionstyle = 'yui_menu_icon_section highlight';
            } else {
                $sectionstyle = 'yui_menu_icon_section';
            }
            // js name mangling
            $summary = addslashes(htmlspecialchars($summary, ENT_QUOTES));
            $name = 'yui_menu_section_'.$section->section;
            $introaction = (isset($this->config->introaction) ? $this->config->introaction : 'introhide');
	       // check what the course format is like
	        $hidden=false;
            foreach(array('topic','week') as $param) {
            	if (isset($_GET[$param]) && $_GET[$param]!='all'){
            		$hidden = true;
            	}
            }
	            
            if ($introaction == 'introhide' || $hidden) {
                $url = "{$CFG->wwwroot}/course/view.php?id={$course->id}&$format={$section->section}";
            } else {
                if (strpos($_SERVER['REQUEST_URI'],'course/view.php')!=0) {
                	$url = "#section-{$section->section}";
                } else {
                	$url = "{$CFG->wwwroot}/course/view.php?id={$course->id}#section-{$section->section}";
                }
            }
            $url = htmlspecialchars($url);
            $out .= "
var $name = new YAHOO.widget.TextNode('$summary', root, $expand);
{$name}.href = '$url';
{$name}.labelStyle = '$sectionstyle';";
            // add any resources inside
            $out .= $this->course_section($course, $section, $name, $mods);
        }
        return $out;
    }
    
    /**
     * Prints a section full of activity modules
     */
    function course_section($course, $section, $parent, $mods) {
        global $CFG, $USER;
        
        $out =  '';
        $modinfo = unserialize($course->modinfo);
        
        if (!empty($section->sequence)) {
            $sectionmods = explode(",", $section->sequence);
            
            foreach ($sectionmods as $modnumber) {
                if (empty($mods[$modnumber])) continue;
                $mod = $mods[$modnumber];
                // don't do anything invisible or labels
                if (!$mod->visible || $mod->modname == 'label') continue;
                
                $instancename = urldecode($modinfo[$modnumber]->name);
                if (!empty($CFG->filterall)) {
                    $instancename = filter_text($instancename, $course->id);
                }
                if (!empty($modinfo[$modnumber]->extra)) {
                    $extra = urldecode($modinfo[$modnumber]->extra);
                } else {
                    $extra = "";
                }
                if (trim($instancename) == '') {
                    $instancename = $mod->modfullname;
                }
                $instancename = $this->truncate_html($instancename);
                $instancename = addslashes(htmlspecialchars($instancename , ENT_QUOTES));
                $url = htmlspecialchars($CFG->wwwroot .
                    "/mod/{$mod->modname}/view.php?id={$mod->id}");
                $name = "yui_menu_mod_{$mod->modname}_$modnumber";
                $style = "yui_menu_mod_{$mod->modname}";
                $out .= "
var $name = new YAHOO.widget.TextNode('$instancename', $parent, false);
{$name}.href = '$url';
{$name}.labelStyle = '$style';";
                if ($mod->modname == 'resource') {
                    $info = resource_get_coursemodule_info($mod);
                    if (isset($info) && isset($info->icon)) {
                        $out .= "
{$name}._yui_menu_icon = '$CFG->pixpath/$info->icon';";
                    }
                }
            }
        }
        return $out;
    }

	/**
	 * Filters html and junk, truncates result
	 *
	 * @param $html: string to filter
	 * @param $max_size: length of largest piece when done
	 * @param $trunc: string to append to truncated pieces
	 */
    function truncate_html($html) {
        $max_size = (isset($this->config->maxsize) ? $this->config->maxsize : '19');
        $trunc = (isset($this->config->trunc) ? $this->config->trunc : '...');
    	$text = preg_replace_callback('|</?([^\s>]*).*?>|smi',
            array($this, 'filter_tag'), $html);
        // decode html entities, they will be encoded later with
        // htmlspecialchars
        $text= html_entity_decode($text, ENT_QUOTES, 'UTF-8');
        // trim ends of whitespace
        $text = trim($text);
        // filter any extra whitespace
        //$text = preg_replace('|\s\s+|m', ' ', $text);
        // trunkcate string size
		//by Eric Hsin
        //if (strlen($text) > $max_size) {
        //    $text = substr($text, 0, ($max_size - strlen($trunc))).$trunc;
        //}
        if (strlen($text) > $max_size) {
            $text = mb_substr($text, 0, ($max_size - strlen($trunc)), 'UTF-8') . $trunc; //by Shaojung (use the mb_string extension function)
        }
        return $text;
    }
    
    /**
     * Strip html tags
     *
     * replaces it with a single space or and emtpy string depending
     * one wheth it looks like a block or inline level element.
     */
    function filter_tag($matches) {
        $inline = array('a','abbr','acronym','b','big','cite','code',
            'del','dfn','em','i','ins','kbd','q','strong','s','samp',
            'small','span','sup','sub','tt','u','var');
        $tag = strtolower($matches[1]);
        // inline elements are displayed inline
        if (in_array($tag, $inline)) return '';
        // block level elements are given a single space separation
        return ' ';
    }
}

?>
