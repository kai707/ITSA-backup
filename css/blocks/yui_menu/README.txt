Installation
============

1. Drop this module into the blocks directory
2. Go to the main admin notifications page, Moodle will install the block
3. Go into a class and add the “Course Menu” block

Upgrades
========

Those who are upgrading from the old course_menu block need to follow a few
steps. First, go to the blocks directory and remove course_menu (don’t do
the “Delete” from the Moodle admin page though). Then drop this new module
into the blocks directory.

After that, you need to the script to do migration. It’s called
`course_menu_migrate.php`  and it’s in the `blocks/yui_menu/db` directory.
If you have access to the command line, you can just run the the program
using `php course_menu_migrate.php`. This will convert any of the old
menus to the new ones and remove the old block from the database.

If you only have access via FTP or something you can run the script
from your web browser by temporarily commenting out a line. Instructions
are in the file. You should also drop your web host as soon as possible.
FTP is *really bad* for security, you’d probably be safer yelling out
your passwords in the middle of Times Square.

Customisation
=============

You can edit the order of the items in the block instance configuration
(turn editing on, and an edit button should appear under the title of
the block).

Menu labels
-----------

All of the items are generated using language strings. A few of the strings
are defined in this module (see the language files for which ones), but most
of them are just pulled from Moodles language files. To find which ones,
look under the `available_items` function in `block_yui_menu.php`.
It’s generated from ‘text’ fields in the big array.

Icons
-----

The icons set in 3 different sources.

1. The top-level icons for each item is set in the `available_items`
   function in `block_course_menu.php`.

2. Most of the other icons are set in the `styles.php` css file.
   Some things like the + and - icons for the menu come from YUI.
   Other parts, like the icons for the section nodes and individual
   modules are pulled from standard moodle icons.

3. The resources are a bit funny. A resource is an activity module, and
   it will get the default resource icon set in `styles.php` like
   the other activities. However, a resource can specify an icon that
   overrides this. Because this is done on an individual basis, so it
   needs to be done when the javascript creates that tree item.
   
   The end result is that the icons for each resource is overridden
   by setting the the `_yui_menu_icon` near the end of the
   `course_section` function in `block_yui_menu.php`. The
   actual setting of the background image is done elsewhere.

The menu items
==============

The block get’s a list of available items and their default settings.
Individual blocks can be future customized to turn each item on or off.

The first three items (Outline, Messages, and Calendar) are always
available, but disabled by default. The Gradebook is only available if
the “Show Grades” setting is enabled in the course. The Participants is
only available if you have the permission ‘moodle/course:viewparticipants’.
Both are enabled by default.

After that, it will add a list of all the visible activity modules on
the site. Only the items fo modules which are in the course are visible
by default though.

Editing the items
-----------------

You may add/removed the available menu items. To edit items you have to
go to the `available_items` function in `block_course_menu.php` and
change the contents of the `$base` array.

Removing items is pretty straight forward, just remove it’s entry there.

To add an item, create an entry in there. Here’s a description of the fields:

text : string
    The text inside the label
url : string
    the url the item’s link points to, it will prefixed with $CFG->wwwroot.
icon : string
    the url of the icon, it won’t be prefixed with anything.
default : boolean
    whether or not the item is displayed by default on unconfigured menus.
title : string
    Optional. Will put a tooltip on the item with the given text.

Also you need to make sure that the `$max` variable in `config_instance.php`
is greater than or equal to the maximum number of available items.

License
=======

See COPYING.txt