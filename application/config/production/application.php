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
$config['app_name'] = 'Intelligence Perception Analysis';
$config['app_description'] = '';
$config['app_title_sparator'] = '|';
$config['app_default_media'] = 'twitter';
$config['app_media'] = array(
    'twitter',
    'forum_comments',
    'news_comments'
);
$config['app_timezone'] = 'Asia/Jakarta';

$config['app_url_api'] = 'http://192.168.150.25:9000';
$config['app_api_account_twitter'] = 'http://192.168.150.25:9100';
$config['app_api_topic_twitter'] = 'http://192.168.150.25:9200';
$config['app_api_topic_news_comment'] = 'http://192.168.150.25:9300';
$config['app_api_topic_forum'] = 'http://192.168.150.25:9400';
$config['app_api_home_twitter'] = 'http://192.168.150.25:9500';
$config['writelog_access'] = '/var/log/access_production.log';