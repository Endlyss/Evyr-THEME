<?php
	header("Content-type: text/css;"); //Sets the stage for CSS
	
	require('../../../../../wp-load.php'); //Allows access to any functions necessary


	function hex2rgb( $colour ) {
        if ( $colour[0] == '#' ) {
                $colour = substr( $colour, 1 );
        }
        if ( strlen( $colour ) == 6 ) {
                list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
        } elseif ( strlen( $colour ) == 3 ) {
                list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
        } else {
                return false;
        }
        $p_r = hexdec( $r );
        $p_g = hexdec( $g );
        $p_b = hexdec( $b );
        global $p_rgba, $choose_link_color;
        $p_rgba = $p_r . ', ' . $p_g . ', ' . $p_b;
        $choose_link_color = $p_r . $p_g . $p_b;
        $choose_link_color = (int) $choose_link_color;

        if($choose_link_color > 204204203){
        	global $link_color, $contrast_color;
        	$link_color = '#000000';
        	$contrast_color = '#e6e6e6';
        	$dark_light = "light";
        }else{
        	global $link_color, $contrast_color;
        	$link_color = '#e6e6e6';
        	$contrast_color = '#000000';
	       	$dark_light = "light";

        }
	}
	global $hexString, $link_color, $contrast_color;
	$hexString = of_get_option('evyr_primary_color_picker');
	if(!$hexString){
		$hexString = '#171717';
	}
	hex2rgb($hexString);
/*--

Options to make: 
	Base: Light or Dark Light Default
		Body Background

	Primary Color: #2c3e50 default;
		Widget-titles
		mp-main-title (border and text color)
		Submit Buttons
		Text Input Borders
		Upper Footer Bar
		Header-1
		Navi-Item Hover and Active
		Sub Menu main bg.


	Secondary Color: #151e26 default;
		Top Bar
		Nav-bar
		Submit Buttons Hover
		Header-2
		Header-3
		Header-4
		Header-5
		Header-6

	Tertiary Color: #466380 Default;
		Sub Menu Item Hover


	Font-Default: #222222;
		Paragraphs
		Hyperlinks (bold weight)

	Blockquote Background: 50% opaque #777;

	Navigation font color (Default #eeeeee;)

--*/


echo "
body
{
	background: #f5f5f5;
}
.mwrapp
{
	background: #f5f5f5;
}
/*---------
--General--
---------*/

#content thead th
{
	background: rgba(" . $p_rgba .  ", 1.0);
	color: #e6e6e6;
}

/*----------------
--Top Header Bar--
----------------*/
.uheader
{
	background: rgba(" . $p_rgba .  ", 1.0);
}
	.swidget input[type='text'], .swidget input[type='search']
	{
		background: rgba(119,119,119,0.4);
		border-color: rgba(" . $p_rgba .  ", 0.4);
		color: " . $link_color .";
	}
	.swidget svg *
	{
		fill: " . $link_color . ";
	}
	.socialb
	{
		background: rgba(" . $p_rgba .  ", 1.0);
	}
	.socialb svg *
	{
		fill: rgba(" . $p_rgba .  ", 1.0);
	}
	.tnavi li a 
	{
		color: " . $link_color .";
	}
/*--------------
--Lower Header--
--------------*/
.line-lheader
{
	background: rgba(" . $p_rgba .  ", 1.0);
}
.lheader
{
	background: rgba(" . $p_rgba .  ", 1.0);
}
	.mnavi>div>ul>li>a
	{
		color: " . $link_color .";
	}
		.mnavi>div>ul>li.current-menu-item>a, .mnavi>div>ul>li:hover>a, .mnavi>div>ul>li.focused>a
		{
			background-color: rgba(119,119,119,0.5)
		}
		.mnavi>div>ul>li ul>li
		{
			background: rgba(" . $p_rgba .  ", 1.0);
		}
			.mnavi>div>ul>li ul>li>a
			{
				color: " . $link_color .";
			}
			.mnavi>div>ul>li ul>li:hover>a, .mnavi>div>ul>li ul>li.focused>a
			{
				color: " . $link_color .";
				background: rgba(119,119,119,0.5)
			}
.fixed-menu
{
}
.fixed-menu .lheader
{
	background: rgba(" . $p_rgba .  ", 1.0)!important;
	-webkit-transition: all .1s ease;
	-moz-transition: all .1s ease;
	-ms-transition: all .1s ease;
	-o-transition: all .1s ease;
	transition: all .1s ease;
}
.fixed-menu .lheader.opaque-bg
{
	background: rgba(" . $p_rgba .  ", 0.9)!important;
	-webkit-transition: all .1s ease;
	-moz-transition: all .1s ease;
	-ms-transition: all .1s ease;
	-o-transition: all .1s ease;
	transition: all .1s ease;
}

/*------------------------
--Home Page Feed Content--
------------------------*/
.divider
{
	background: rgba(119,119,119,0.3);
}
.fs-wrapp
{
}
.sfeatured li
{
}
.tfeatured .tf-title
{
	color: #0e0e0e;
}
.tfeatured .tf-excerpt
{
	color: #222;
}
.tfeatured .tf-date, .tf-postcount, .tf-readmore
{
	color: #222;
}
/*------------------------
--Home Page Left Sidebar--
------------------------*/
.left-sidebar .widget-container
{
	background: #f1f1f1;
	color: #0e0e0e;
}
	.left-sidebar .widget-title
	{
		background: rgba(" . $p_rgba .  ", 1.0);
		color: " . $link_color .";
	}
	.left-sidebar .widget_archive, .left-sidebar .widget_categories, .left-sidebar .widget_meta, .left-sidebar .widget_pages, .left-sidebar .widget_recent_comments, .left-sidebar .widget_recent_entries
	{
		color: rgba(" . $p_rgba .  ", 1.0);
	}
		.left-sidebar .widget_archive li, .left-sidebar .widget_categories li, .left-sidebar .widget_meta li, .left-sidebar .widget_pages li, .left-sidebar .widget_recent_comments li, .left-sidebar .widget_recent_entries li
		{
			border-color: rgba(" . $p_rgba .  ", 0.7);
		}
			.left-sidebar .widget_archive a, .left-sidebar .widget_categories a, .left-sidebar .widget_meta a, .left-sidebar .widget_pages a, .left-sidebar .widget_recent_comments a, .left-sidebar .widget_recent_entries a
			{
				color: #0e0e0e;
			}
			.left-sidebar .widget_archive li:hover, .left-sidebar .widget_categories li:hover, .left-sidebar .widget_meta li:hover, .left-sidebar .widget_pages li:hover, .left-sidebar .widget_recent_comments li:hover, .left-sidebar .widget_recent_entries li:hover
			{
			}
			.left-sidebar .widget_archive li:hover a, .left-sidebar .widget_categories li:hover a, .left-sidebar .widget_meta li:hover a, .left-sidebar .widget_pages li:hover a, .left-sidebar .widget_recent_comments li:hover a, .left-sidebar .widget_recent_entries li:hover a
			{
				color: " . $link_color .";
				background: rgba(" . $p_rgba .  ", 1.0);

			}
			.left-sidebar .widget_recent_comments a
			{
				color: rgba(" . $p_rgba .  ", 1.0)!important;
			}

	.left-sidebar .widget_calendar
	{

	}
		.left-sidebar .widget_calendar table caption
		{
			color: #0e0e0e;
		}
		.left-sidebar .widget_calendar a
		{
			color: #0e0e0e;
		}
		.left-sidebar .widget_calendar td:hover, .left-sidebar .widget_calendar td:hover a
		{
			background: rgba(" . $p_rgba .  ", 1.0);
			color: " . $link_color .";
		}
.left-sidebar .widget_nav_menu
{
	color: #0e0e0e;
}
	.left-sidebar .widget_nav_menu li
	{
		border-color: rgba(" . $p_rgba .  ", 0.2);
	}
		.left-sidebar .widget_nav_menu>div>ul>li>a
		{
			color: #000;
		}
			.left-sidebar .widget_nav_menu>div>ul>li:hover>a
			{
				background: rgba(" . $p_rgba .  ", 1.0);
				color: " . $link_color .";
			}
		.left-sidebar .widget_nav_menu .sub-menu
		{
			background: rgba(" . $p_rgba .  ", 1.0);
		}
			.left-sidebar .widget_nav_menu .sub-menu a
			{
				color: " . $link_color .";
			}
.left-sidebar .widget_search form
{
	background: rgba(" . $p_rgba .  ", 0.2);
	border-color: rgba(" . $p_rgba .  ", 0.4);
}
	.left-sidebar .widget_search input[type='text'], .left-sidebar .widget_search input[type='search'], .left-sidebar .widget_search input[type='submit']
	{

			color: rgba(" . $p_rgba .  ", 1.0);
	}
.left-sidebar .widget_tag_cloud a
{
	color: #000000; 
}
	.left-sidebar .widget_tag_cloud a:hover
	{
		background: rgba(" . $p_rgba .  ", 1.0);
		color: " . $link_color .";
	}
/*----------------
--Main Post Feed--
----------------*/
.mpostfeed .mp-main-title
{
	color: #222222;
	border-color:  #222222;
}
.mpostfeed .fp-holder
{
	background: rgba(" . $p_rgba .  ", 0.1) url(../img/samples/placeholder.png) no-repeat center;
}
.mpostfeed .mp-title
{
	color:  #222222;
}
.mpostfeed .mp-excerpt, .mp-panel *
{
	color: #222222;
}
.mp-pagi, .mp-pagi a
{
color: #0e0e0e;
}
	.mp-pagi svg *
	{
		stroke: #0e0e0e;
	}
/*--------------
--Lower footer--
--------------*/
.lfooter
{
	background: rgba(" . $p_rgba .  ", 0.8)
}
	.lfooter .sidebar-wrapp>li, .lfooter .widget-title, .lfooter .sidebar-wrapp>li a
	{
		color: " . $link_color .";
		border-color: " . $link_color .";
	}
/*------------------------------------
--Main footer (Notice and Copyright)--
------------------------------------*/
.mfooter
{
	background: rgba(" . $p_rgba .  ", 1.0)
}
.mfooter .notice, .mfooter .copyright
{
	color: " . $link_color .";
}
/*------------------
--Interior Content--
------------------*/
#content
{
}
	#content h1, #content h2, #content h3, #content h4, #content h5, #content h6
	{
		color: #0e0e0e;
	}
	#content p, #content li
	{
		color: #0e0e0e;
	}
	#content a
	{
		color: #0e0e0e;
	}
		#content a:hover
		{
			color: #000000;
		}
	#content blockquote, #content code, #content pre, #content tt
	{
		background: rgba(" . $p_rgba .  ", 0.1);
	}
/*---------------------
--Attachment Template--
---------------------*/
.attachment-template h1
{
	color: #0e0e0e;
}
.attachment-template .post-edit-link
{
	color: #222222;
}
/*--------------------
--Error 404 Template--
--------------------*/
.error-404-template *
{
	color: #0e0e0e;
}
	.error-404-search input[type='text']
	{
		background: rgba(" . $p_rgba .  ", 0.2);
		border-color: rgba(" . $p_rgba .  ", 0.4);
		color: rgba(" . $p_rgba .  ", 1.0);
	}
	.error-404-search .search-icon-svg *
	{
		fill: rgba(" . $p_rgba .  ", 1.0);
	}
/*------------------
--Comments Section--
-----------------*/
#comments input[type='submit']
{
	background: rgba(" . $p_rgba . ", 1);
	color: " . $link_color . ";
}
	#comments textarea, #comments input[type='email'], #comments input[type='text'], #comments input[type='url']
	{
		border-color: rgba(" . $p_rgba .  ", 1.0);
	}
";
?>