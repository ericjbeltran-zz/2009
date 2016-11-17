<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/glide.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/hover.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/sprinkle.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-ui-personalized-1.5.2.packed.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/slide.js"></script>


<script type="text/javascript"><!--//--><![CDATA[//><!--
sfHover = function() {
	if (!document.getElementsByTagName) return false;
	var sfEls = document.getElementById("menu").getElementsByTagName("li");
	var sfEls1 = document.getElementById("catmenu").getElementsByTagName("li");
	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" sfhover";
		}
		sfEls[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
	for (var i=0; i<sfEls1.length; i++) {
		sfEls1[i].onmouseover=function() {
			this.className+=" sfhover1";
		}
		sfEls1[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover1\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);
//--><!]]></script>

	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
</head>
<body>


<div class="wrapper">
<div id="foxmenucontainer">
	<div id="menu">
		<ul>
			<li><a href="<?php echo get_settings('home'); ?>">Home</a></li>
			<?php wp_list_pages('title_li=&depth=4&sort_column=menu_order'); ?>
		
		</ul>
	</div>		
</div>
<div class="clear"></div>
<div id="top"> 

<div class="today">
<span class="day"><?php echo date('j '); ?></span><br/>
<span class="mony"><?php echo date(' F , Y '); ?></span><br/>
<span class="dname"><?php echo date(' l '); ?></span>
</div>

<div class="blogname">
		<div class="bloglogo"></div>
                <h1></h1>
		<h2><?php bloginfo('description'); ?></h2>
</div>

<div class="subscribe">
<span class="contacticon"><a href="<?php bloginfo('rss2_url'); ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/rsnews.jpg" alt="rss feed" <?php bloginfo('name'); ?>" /></a></span>

<span class="contacticon"><a href="http://www.facebook.com/people/Eric-Beltran/11505881" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/fb.jpg" alt="facebook" /></a></span>

<span class="contacticon"><a href="http://www.linkedin.com/in/ericbeltran" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/ln.jpg" alt="linked in" /></a></span>

<span class="contacticon"><a href="http://www.youtube.com/user/OregonBrewer" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/yt.jpg" alt="youtube" /></a></span>

<span class="contacticon">
<a href="skype:eric_beltran?add"><img src="<?php bloginfo('template_url'); ?>/images/skype.jpg" alt="skype" /></a>
</span>

</div>

</div>

<div id="catmenucontainer">
	<div id="catmenu">
			<ul>
				<?php wp_list_categories('sort_column=name&title_li=&depth=4'); ?>
			</ul>
	</div>		
</div>
<div class="clear"></div>
<div class="content">
