<?php
/* CONSTANTS */
define('FA_THEME', strtolower(str_replace(' ', '_', wp_get_theme()))); // Theme name constant
define('FA_API_NAMESPACE', FA_THEME . '-rest/v1/'); // Rest API URL