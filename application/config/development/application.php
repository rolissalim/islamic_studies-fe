<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
/*
  |--------------------------------------------------------------------------
  | Web Site Configuration
  |--------------------------------------------------------------------------
  |
  | Please create config with preffix "app_", thanks
  |
 */
$config['app_author'] = 'eBdesk Teknologi';
$config['app_name'] = 'Intelligence Perception Analyziz';
$config['app_description'] = '';
$config['app_title_sparator'] = '|';
$config['app_default_media'] = 'twitter';
$config['app_media'] = array(
    'twitter',
    'facebook',
    'youtube',
    'instagram',
    'forum_comments',
    'news_comments'
);
$config['app_timezone'] = 'Asia/Jakarta';
$config['app_maintenance_mode'] = FALSE;
$config['app_is_staging'] = TRUE;
$config['app_wp_menu'] = TRUE;

$config['app_url_report'] = 'http://192.168.150.26:8100';

$config['app_url_api'] = 'http://192.168.150.41:9000';
$config['app_api_account_twitter'] = 'http://192.168.150.41:9100';
$config['app_api_topic_twitter'] = 'http://192.168.150.41:9200';
$config['app_api_topic_news_comment'] = 'http://192.168.150.25:9300';
$config['app_api_topic_forum'] = 'http://192.168.150.25:9400';
$config['app_api_home_twitter'] = 'http://192.168.150.41:9500';
$config['app_api_account_youtube'] = 'http://192.168.150.41:9010';
$config['app_api_account_instagram'] = 'http://192.168.150.41:9800';
$config['app_api_account_facebook'] = 'http://192.168.150.41:9600';
$config['app_api_search_facebook_private'] = 'http://192.168.150.41:9600';
$config['app_api_topic_facebook'] = 'http://192.168.150.41:9700';
$config['app_api_topic_instagram'] = 'http://192.168.150.41:9900';
$config['app_api_topic_youtube'] = 'http://192.168.150.41:9020';

$config['app_api_topic_twitter_explorer'] = 'http://192.168.150.41:9090';
$config['app_api_search_facebook_personal'] = 'http://192.168.20.164:9020';
//$config['writelog_access'] = '/var/log/access_ipa_stagings.log';
$config['yubico'] = array(
    "id" => '40259',
    "key" => 'evLF+CxVTKGkFB1CJjzvFj1V+b8='
);