/**
 * YUI menu styles
 *
 * Copyright (c) 2007 Trinity Western University
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
 * This CSS file is used by all yui menu pages.
 *
 * The prefix 'yui_menu' is used for all classes and ids 
 */

/* styles based off YUI */

/* first or middle sibling */
.ygtvtn,           /* no children */
.ygtvtm, .ygtvtmh, /* collapsable */
.ygtvtp, .ygtvtph, /* expandable */
/* last sibling */
.ygtvln,           /* no children */
.ygtvlm, .ygtvlmh, /* collapsable */
.ygtvlp, .ygtvlph, /* expandable */
.ygtvloading, /* Loading icon */
.ygtvdepthcell, /* empty cells used for rendering the node's depth */
.ygtvblankdepthcell /*yui missed this one */
{
	width: 16px;
	height: 22px;
	background: 0 0 no-repeat; 
}
.ygtvtm, .ygtvtmh, .ygtvtp, .ygtvtph,
.ygtvlm, .ygtvlmh, .ygtvlp, .ygtvlph
{
    cursor: pointer;
}
<?php

$yui = $CFG->wwwroot . '/lib/yui/treeview/assets';
if ($THEME->custompix) {
    $ico = '../'.$CFG->theme.'/pix';
} else {
    $ico = '../../pix';
}

$items = array('tn','tm','tmh','tp','tph', 'ln','lm','lmh','lp','lph', 'loading');
foreach ($items as $item ) {
    echo ".ygtv$item { background-image: url('$yui/$item.gif'); }\n";
}
echo ".ygtvdepthcell { background-image: url('$yui/vline.gif'); }\n";
?>
/* the style of the div around each node's collection of children */
* html .ygtvchildren { height:2%; } /* IE hack */
/* the style of the text label in ygTextNode */
.ygtvlabel, .ygtvlabel:link, .ygtvlabel:visited, .ygtvlabel:hover { 
	margin-left: 2px;
	text-decoration: none;
}
.ygtvspacer {
    height: 10px;
    width: 10px;
    margin: 2px;
}
/* end styles from YUI */

#yui_menu_config_list {
    border: 0;
    margin: auto;
    border-collapse: collapse;
    padding: .5em;
    margin-bottom: 1em;
}
#yui_menu_config_list td {
    padding: 1em .3em 0;
}
.yui_menu_outline_tree {
    clear: both;
    padding: 0;
}
.yui_menu_item_outline .icon {
    /* dots behind the outine menu */
    background: url('<?php echo $yui ?>/vline.gif') no-repeat 0 10px;
    line-height: 1;
}
/* Note: this is a CSS 2 selector pattern, it's not supported in
IE 6 and earlier, but the browser will degrade nicely */
.ygtvtm + td, .ygtvtmh + td,
.ygtvlm + td, .ygtvlmh + td {
    /* dots behind the section menus */
    background: url('<?php echo $yui ?>/vline.gif') no-repeat 0 10px;
}
.yui_menu_outline_tree .ygtvloading {
    /* disable the loading icon */
    background-image: url('<?php echo $yui ?>/lp.gif');
}
.yui_menu_outline_tree .highlight {
 font-weight: bold;
}
<?php
$mods = get_records("modules", 'visible', 1);
if (!$mods) $mods = array();

// styles for child nodes
print ".yui_menu_icon_section";
foreach ($mods as $mod) print ", .yui_menu_mod_{$mod->name}";
print " {
    padding-left: 20px;
    display: block;
    min-height: 16px;
    background: no-repeat;
}
";
// set background images
// section nodes
print ".yui_menu_icon_section {
    background-image: url('$ico/i/one.gif');
}
";
// individual modules
foreach ($mods as $mod) { // print icons for each module
    print "
.yui_menu_mod_{$mod->name} {
    background-image: url('{$CFG->modpixpath}/{$mod->name}/icon.gif');
}";
}
?>
