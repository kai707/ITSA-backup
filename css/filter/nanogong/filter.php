<?php

function nanogong_filter($courseid, $text) {
    $search = '/(<nanogong.*?>\s*)+/is';
    return preg_replace_callback($search, 'nanogong_filter_callback', $text);
}

function nanogong_filter_callback($nanogong_tag) {
    global $CFG;
    static $nanogong_index = 0;

    $CFG->currenttextiscacheable = false;   // Cannot cache a nanogong filter

    $search = '/caption="([^"]*)"/is';
    preg_match_all($search, $nanogong_tag[0], $matches, PREG_SET_ORDER);
    $caption = (isset($matches[0][1]))? $matches[0][1] : null;
    $matches = null;

    $search = '/url="([^"]*)"/is';
    preg_match_all($search, $nanogong_tag[0], $matches, PREG_SET_ORDER);
    $url = (isset($matches[0][1]))? $matches[0][1] : null;
    $matches = null;

    $search = '/showRecordButton="(true|false)"/is';
    preg_match_all($search, $nanogong_tag[0], $matches, PREG_SET_ORDER);
    $showRecordButton = (isset($matches[0][1]))? $matches[0][1] : "false";
    $matches = null;

    $search = '/showAudioLevel="(true|false)"/is';
    preg_match_all($search, $nanogong_tag[0], $matches, PREG_SET_ORDER);
    $showAudioLevel = (isset($matches[0][1]))? $matches[0][1] : "false";
    $matches = null;

    $search = '/showSpeedButton="(true|false)"/is';
    preg_match_all($search, $nanogong_tag[0], $matches, PREG_SET_ORDER);
    $showSpeedButton = (isset($matches[0][1]))? $matches[0][1] : "true";
    $matches = null;

    $search = '/showSaveButton="(true|false)"/is';
    preg_match_all($search, $nanogong_tag[0], $matches, PREG_SET_ORDER);
    $showSaveButton = (isset($matches[0][1]))? $matches[0][1] : "true";
    $matches = null;

    $param = "";
    if ($url != "") {
        if ($CFG->slasharguments)
            $url = "{$CFG->wwwroot}/file.php$url";
        else
            $url = "{$CFG->wwwroot}/file.php?file=$url";
        $param .= "<param name=\"SoundFileURL\" value=\"$url\" />";
    }
    if ($showRecordButton == "false")
        $param .= "<param name=\"ShowRecordButton\" value=\"false\" />";
    if ($showAudioLevel == "false")
        $param .= "<param name=\"ShowAudioLevel\" value=\"false\" />";
    if ($showSpeedButton == "false")
        $param .= "<param name=\"ShowSpeedButton\" value=\"false\" />";
    if ($showSaveButton == "false")
        $param .= "<param name=\"ShowSaveButton\" value=\"false\" />";

    $width = 180;
    if ($showRecordButton == "false") $width -= 30;
    if ($showAudioLevel == "false") $width -= 20;
    if ($showSpeedButton == "false") $width -= 35;
    if ($showSaveButton == "false") $width -= 30;

    if ($caption == null) $caption = "";

    $nanogong_span = "";
    if ($nanogong_index == 0) {
        $nanogong_span = <<<NANOGONG_SCRIPT
<script language="Javascript" type="text/javascript">
var current_nanogong_id = -1;

function set_nanogong_visible(id, visible) {
    var div = document.getElementById("nanogong_applet_" + id);
    if (div) div.style.visibility = (visible)? "visible" : "hidden";
}

function show_nanogong_applet(id) {
    if (current_nanogong_id == id) return false;
    if (current_nanogong_id >= 0)
        set_nanogong_visible(current_nanogong_id, false);
    set_nanogong_visible(id, true);
    current_nanogong_id = id;
    return false;
}

function hide_nanogong_applet(id) {
    if (current_nanogong_id != id) return false;
    set_nanogong_visible(id, false);
    current_nanogong_id = -1;
    return false;
}

function onclick_nanogong_applet(id) {
    if (current_nanogong_id == id)
        hide_nanogong_applet(id);
    else
        show_nanogong_applet(id);
    return false;
}
</script>

NANOGONG_SCRIPT;
    }
    $nanogong_span .= <<<NANOGONG_SPAN
<span style="position:relative;font-size:7pt;font-weight:bold;text-decoration:none;color:black">
    <a alt="Show/Hide NanoGong" href="#" onclick="return onclick_nanogong_applet($nanogong_index)">
        <img alt="Show/Hide NanoGong" src="$CFG->wwwroot/filter/nanogong/pix/sound.gif" /></a>
    $caption
    <span id="nanogong_applet_$nanogong_index" style="position:absolute;left:18px;top:-2px;width:$width;visibility:hidden">
        <applet archive="$CFG->wwwroot/filter/nanogong/nanogong.jar"
             code="gong.NanoGong" width="{$width}px" height="40px">$param</applet></span>
</span>
NANOGONG_SPAN;
    $nanogong_index++;

    return $nanogong_span;
}

?>
