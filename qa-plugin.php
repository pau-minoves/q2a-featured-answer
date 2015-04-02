<?php

/*
 * Plugin Name: Featured Answers
 * Plugin URI: https://github.com/pau-minoves/q2a-featured-answers
 * Plugin Update Check URI: https://raw.github.com/pau-minoves/q2a-featured-answers/master/qa-plugin.php
 * Plugin Description: Keep answers from experts featured on top of the answer list
 * Plugin Version: 1
 * Plugin Date: 2015-3-30
 * Plugin Author: pau-minoves
 * Plugin Author URI: https://github.com/pau-minoves
 * Plugin License: GPLv2
 * Plugin Minimum Question2Answer Version: 1.4
 */

if (! defined ( 'QA_VERSION' )) { // don't allow this page to be requested directly from browser
	header ( 'Location: ../../' );
	exit ();
}

qa_register_plugin_module ( 'module', 'qa-fa-admin.php', 'qa_fa_admin', 'Featured Answers' );
qa_register_plugin_layer ( 'qa-fa-layer.php', 'Featured Answers Layer' );

/*
 Omit PHP closing tag to help avoid accidental output
 */
