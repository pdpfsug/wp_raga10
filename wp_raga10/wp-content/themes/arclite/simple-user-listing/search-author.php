<?php
/**
 * The Template for displaying Author Search
 *
 * Override this template by copying it to yourtheme/simple-user-listing/search-author.php
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$search = ( get_query_var( 'as' ) ) ? get_query_var( 'as' )  : '';

?>
