<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Account_facebook extends Api_response {

    function __construct() {
        parent::__construct();
        $this->_api_host = config_item('app_api_account_facebook');
        $this->_api_search_facebook_private = config_item('app_api_search_facebook_private');
        $this->_api_search_facebook_personal = config_item('app_api_search_facebook_personal');
    }

    /**
     * API Searching Facebook Fans Page By Keyword Name Facebook
     * @param string $keyword Name Of Facebook
     * @param int $rows Numrows Result Data per Request <i>Default value 10</i>
     * @return json Rows Data
     */
    public function search_facebook_account($keyword, $rows = 12, $page_type = NULL, $page_id = NULL) {
        $url = $this->_api_host . "/search_facebook_account/";
        $query = array(
            urlencode($keyword),
            $rows
            );
        $url .= join("/", $query);
        if($page_type && $page_id){
            $url .= '?' . $page_type . '=' . $page_id;
        }
        return $this->_get_response($url);
    }
    
    /**
     * API Searching Facebook Page Account By Keyword Name Facebook
     * @param string $keyword Name Of Facebook
     * @param int $rows Numrows Result Data per Request <i>Default value 10</i>
     * @return json Rows Data
     */
    public function search_facebook_page($keyword, $limit = 12) {
        $url = $this->_api_search_facebook_private . "/search_facebook_account";
        $query = array(
            'query' => $keyword,
            'limit' => $limit
            );
        return $this->_get_response($url, 'GET', $query);
    }
    
    /**
     * API Searching Facebook Personal Account By Keyword Name Facebook
     * @param string $keyword Name Of Facebook
     * @param int $rows Numrows Result Data per Request <i>Default value 10</i>
     * @return json Rows Data
     */
    public function search_facebook_user($keyword, $limit = 12) {
//        $url = $this->_api_search_facebook_private . "/search_facebook_user";
//        $url = $this->_api_search_facebook_personal . "/search_facebook";
        $url = $this->_api_host . "/search_facebook_user";
        $query = array(
            'query' => $keyword,
            'limit' => $limit
            );
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * API Get data accounts per Workspace ID
     * @param array $params [workspace_id,user_id]
     * @param int $start Offset Result Data <i>Default value 0</i>
     * @param int $rows Numrows Result Data per Request <i>Default value 10</i>
     * @return json Rows Data
     */
    public function get_subscribed_acccounts($params, $start = 0, $rows = 10, $sort = 'name', $keyword = NULL) {
        $url = $this->_api_host . "/get_subscribed_accounts";
        $query = array(
            'start' => $start,
            'row' => $rows,
            'sort' => $sort
            );
        if ($params) {
            $default = array(
                'workspace' => NULL,
                'exc_user_id' => NULL
                );
            $query = array_merge($query, get_clean_params($params, $default));
        }
        if ($keyword && $keyword != "") {
            $query['keyword'] = $keyword;
        }
        if ($sort != 'name') {
            $query['reverse'] = TRUE;
        }

        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * API For get detail account by ID
     * @param string $account_id ID Profile
     * @return json Row Data
     */
    public function get_account($account_id) {
        $url = $this->_api_host . "/get_accounts";
        $query = array(
            'account_id' => $account_id
            );
        return $this->_get_response($url, 'GET', $query);
    }
    
    /**
     * API For get account interest by ID
     * @param string $account_id ID Profile
     * @return json Row Data
     */
    public function get_account_interest($account_id) {
        $url = $this->_api_host . "/get_account_interest";
        $query = array(
            'account_id' => $account_id
            );
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param array $params[account_id,location,type_tweet,emotion,sentiment,ids,language,retweet_account,reply_account,influencer_id,screen_name]
     * @param int $start
     * @param int $rows
     * @param string $keyword
     * @param string $period
     * @return array
     */
    public function get_posts($params, $start = 0, $rows = 15, $keyword = NULL, $period = NULL) {
        $url = $this->_api_host . "/get_posts";
        $query = array(
            'start' => $start,
            'row' => $rows
            );
        if ($params) {
            $default = array(
                'account_id' => NULL,
                'location' => NULL,
                'type' => NULL,
                'emotion' => NULL,
                'sentiment' => NULL,
                'ids' => NULL,
                'language' => NULL,
                'screen_name' => NULL,
                'name' => NULL,
                'keyword' => NULL
                );
            $query = array_merge($query, get_clean_params($params, $default));
        }
        if ($keyword && $keyword != "") {
            $query['keyword'] = $keyword;
        }
        if ($period) {
            $date = get_period($period);
            $query['s_date'] = $date['start_date'];
            $query['e_date'] = $date['end_date'];
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $params
     * @param type $start
     * @param type $rows
     * @param type $keyword
     * @param type $period
     * @return type
     */
    public function get_pictures($params, $start = 0, $rows = 20, $keyword = NULL, $period = NULL) {
        $url = $this->_api_host . "/get_pictures";
        $query = array(
            'start' => $start,
            'row' => $rows
            );
        if ($params) {
            $default = array(
                'account_id' => NULL
                );
            $query = array_merge($query, get_clean_params($params, $default));
        }
        if ($keyword && $keyword != "") {
            $query['keyword'] = $keyword;
        }
        if ($period) {
            $date = get_period($period);
            $query['s_date'] = $date['start_date'];
            $query['e_date'] = $date['end_date'];
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $params
     * @return type
     */
    public function set_subscribe($params) {
        $url = $this->_api_host . "/post_account";
        return $this->_get_response($url, 'POST', $params);
    }
    
    /**
     * 
     * @param type $params
     * @return type
     */
    public function set_add_account($params) {
        $url = $this->_api_host . "/post_user";
        return $this->_get_response($url, 'POST', $params);
    }

    /**
     * 
     * @param type $params
     * @return type
     */
    public function remove_subscribe($params) {
        $url = $this->_api_host . "/remove_subscribe";
        return $this->_get_response($url, 'POST', $params);
    }

    /**
     * 
     * @param type $account_id
     * @param type $type [all, tweet, rtm]
     * @param type $year
     * @param type $month
     * @return type
     */
    public function get_activity_statistic($params, $period = NULL, $year = NULL, $month = NULL) {
        $url = $this->_api_host . "/get_activity_statistic";
        $query = array(
            'year' => $year,
            'month' => $month,
            );
        if ($params) {
            $default = array(
                'account_id' => NULL,
                'type' => NULL,
                'keyword' => NULL
                );
            $query = array_merge($query, get_clean_params($params, $default));
        }
        if ($period) {
            $date = get_period($period);
            $query['s_date'] = $date['start_date'];
            $query['e_date'] = $date['end_date'];
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $account_id
     * @param type $year
     * @param type $month
     * @return type
     */
    public function get_follower_growth($account_id, $year, $month = NULL) {
        $url = $this->_api_host . "/get_follower_growth";
        $query = array(
            'account_id' => $account_id,
            'year' => $year,
            'month' => $month
            );
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $account_id
     * @param type $period
     * @param type $year
     * @param type $month
     * @return type
     */
    public function get_emotion_statistic($params, $period = NULL, $year = NULL, $month = NULL, $day = NULL) {
        $url = $this->_api_host . "/get_emotion_statistic";
        $query = array(
            'year' => $year,
            'month' => $month,
            'day' => $day
            );
        if ($params) {
            $default = array(
                'account_id' => NULL,
                'gender' => NULL,
                'age' => NULL,
                'religion' => NULL,
                'account_status' => NULL,
                'emotion' => NULL,
                'sentiment' => NULL,
                'hashtag' => NULL,
                'source' => NULL
                );
            $query = array_merge($query, get_clean_params($params, $default));
        }
        if ($period) {
            $date = get_period($period);
            $query['s_date'] = $date['start_date'];
            $query['e_date'] = $date['end_date'];
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $account_id
     * @param type $period
     * @param type $limit
     * @return type
     */
    public function get_most_comment_to($account_id, $period = NULL, $limit = 5) {
        $url = $this->_api_host . "/get_most_comment_to";
        $query = array(
            'account_id' => $account_id,
            'limit' => $limit
            );
        if ($period) {
            $date = get_period($period);
            $query['s_date'] = $date['start_date'];
            $query['e_date'] = $date['end_date'];
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $account_id
     * @param type $period
     * @param type $limit
     * @return type
     */
    public function get_most_retweet_by($account_id, $period = NULL, $limit = 5) {
        $url = $this->_api_host . "/get_most_retweet_by";
        $query = array(
            'account_id' => $account_id,
            'limit' => $limit
            );
        if ($period) {
            $date = get_period($period);
            $query['s_date'] = $date['start_date'];
            $query['e_date'] = $date['end_date'];
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $account_id
     * @param type $period
     * @param type $limit
     * @return type
     */
    public function get_most_active_follower($account_id, $period = NULL, $limit = 12) {
        $url = $this->_api_host . "/get_most_active_follower";
        $query = array(
            'account_id' => $account_id,
            'limit' => $limit
            );
        if ($period) {
            $date = get_period($period);
            $query['s_date'] = $date['start_date'];
            $query['e_date'] = $date['end_date'];
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $account_id
     * @param type $period
     * @param type $limit
     * @return type
     */
    public function get_hashtags($account_id = NULL, $period = NULL, $limit = 20) {
        $url = $this->_api_host . "/get_hashtags";
        $query = array(
            'account_id' => $account_id,
            'limit' => $limit
            );
        if ($period) {
            $date = get_period($period);
            $query['s_date'] = $date['start_date'];
            $query['e_date'] = $date['end_date'];
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param array $params[account_id,age,gender,religion,account_status,emotion,sentiment]
     * @param type $period
     * @param type $limit
     * @return type
     */
    public function get_gender($params, $period = NULL) {
        $url = $this->_api_host . "/get_gender";
        if ($params) {
            $default = array(
                'account_id' => NULL,
                'age' => NULL,
                'gender' => NULL,
                'religion' => NULL,
                'account_status' => NULL,
                'emotion' => NULL,
                'sentiment' => NULL
                );
            $query = get_clean_params($params, $default);
        }
        if ($period) {
            $date = get_period($period);
            $query['s_date'] = $date['start_date'];
            $query['e_date'] = $date['end_date'];
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param array $params[account_id,age,gender,religion,account_status,emotion,sentiment]
     * @param type $period
     * @param type $limit
     * @return type
     */
    public function get_religion($params, $period = NULL) {
        $url = $this->_api_host . "/get_religion";
        if ($params) {
            $default = array(
                'account_id' => NULL,
                'age' => NULL,
                'gender' => NULL,
                'religion' => NULL,
                'account_status' => NULL,
                'emotion' => NULL,
                'sentiment' => NULL
                );
            $query = get_clean_params($params, $default);
        }
        if ($period) {
            $date = get_period($period);
            $query['s_date'] = $date['start_date'];
            $query['e_date'] = $date['end_date'];
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param array $params[account_id,age,gender,religion,account_status,emotion,sentiment]
     * @param type $period
     * @param type $limit
     * @return type
     */
    public function get_age($params, $period = NULL) {
        $url = $this->_api_host . "/get_age";
        if ($params) {
            $default = array(
                'account_id' => NULL,
                'age' => NULL,
                'gender' => NULL,
                'religion' => NULL,
                'account_status' => NULL,
                'emotion' => NULL,
                'sentiment' => NULL
                );
            $query = get_clean_params($params, $default);
        }
        if ($period) {
            $date = get_period($period);
            $query['s_date'] = $date['start_date'];
            $query['e_date'] = $date['end_date'];
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $account_id
     * @param type $period
     * @param type $limit
     * @return type
     */
    public function get_source($account_id, $period = NULL) {
        $url = $this->_api_host . "/get_source";
        $query = array(
            'account_id' => $account_id
            );
        if ($period) {
            $date = get_period($period);
            $query['s_date'] = $date['start_date'];
            $query['e_date'] = $date['end_date'];
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $user_id
     * @return type
     */
    public function get_catalogs($user_id) {
        $url = $this->_api_host . "/get_catalog";
        $query = array(
            'user_id' => $user_id,
            );
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $params
     * @return type
     */
    public function set_catalogs_user($user_id, $array_subscribe) {
        $params = array(
            'user_id' => $user_id,
            'sub_ids' => json_encode($array_subscribe)
            );
        $url = $this->_api_host . "/post_catalog";
        return $this->_get_response($url, 'POST', $params);
    }

    /**
     * Set Compare
     * @param mixed $compare_data Compare Data
     * @return int Compare ID
     */
    public function set_compare($compare_data) {
        $url = $this->_api_host . "/set_compare";
        return $this->_get_response($url, 'POST', $compare_data);
    }

    /**
     * Get Compare Data
     * @param int $compare_id Compare ID
     * @return mixed
     */
    public function get_compare($compare_id) {
        $url = $this->_api_host . "/get_compare_detail";
        $query = array(
            'compare_id' => $compare_id
            );
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * Get Compares Data
     * @param int $workspace_id
     * @param int $start
     * @param int $row
     * @param string $keyword
     * @return mixed
     */
    public function get_compares($workspace_id, $start = 0, $row = 10, $keyword = NULL) {
        $url = $this->_api_host . "/get_compares";
        $query = array(
            'workspace_id' => $workspace_id,
            'start' => $start,
            'row' => $row
            );
        if ($keyword && $keyword != "") {
            $query['keyword'] = $keyword;
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $compare_id
     * @return type
     */
    public function delete_compare($compare_id) {
        $url = $this->_api_host . "/delete_compare";
        $query = array(
            'compare_id' => $compare_id
            );
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $account_id
     * @param type $limit
     * @return type
     */
    public function get_emotion_streaming($account_id = NULL, $limit = NULL) {
        $url = $this->_api_host . "/get_emotion_stream";
        $query = array(
            'account_id' => $account_id,
            'limit' => $limit
            );
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $account_id
     * @param type $limit
     * @return type
     */
    public function get_exposure_streaming($account_id = NULL, $limit = NULL) {
        $url = $this->_api_host . "/get_exposure_stream";
        $query = array(
            'account_id' => $account_id,
            'limit' => $limit
            );
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $account_id
     * @param type $period
     * @param type $type
     * @param type $result
     * @return type
     */
    public function get_cluster($params, $period = NULL, $result = 200) {
        $url = $this->_api_host . "/get_clustering";
        if ($params) {
            $default = array(
                'account_id' => NULL,
                'type' => NULL
                );
            $query = get_clean_params($params, $default);
        }
        $query['result'] = $result;
        if ($period) {
            $date = get_period($period);
            $query['s_date'] = $date['start_date'];
            $query['e_date'] = $date['end_date'];
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $account_ids
     * @param type $period
     * @return type
     */
    public function get_compare_activity($account_ids, $period = NULL) {
        $url = $this->_api_host . "/get_compare_activity";
        $query = array(
            'account_ids' => json_encode($account_ids),
            'tr' => $period
            );
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $workspace_id
     * @param type $account_id
     * @return type
     */
    public function check_subscribed_account($workspace_id, $account_id) {
        $url = $this->_api_host . "/check_subscribed_account";
        $query = array(
            'workspace_id' => $workspace_id,
            'account_id' => $account_id
            );
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $account_id
     * @param type $period
     * @return type
     */
    public function get_emotion_keywords($account_id, $period = NULL) {
        $url = $this->_api_host . "/get_emotion_keywords";
        $query = array(
            'account_id' => $account_id
            );
        if ($period) {
            $date = get_period($period);
            $query['s_date'] = $date['start_date'];
            $query['e_date'] = $date['end_date'];
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $account_id
     * @param type $location
     * @param type $period
     * @return type
     */
    public function get_location_account_statistic($params, $period = NULL) {
        $url = $this->_api_host . "/get_location_account_statistic";
        if ($params) {
            $default = array(
                'account_id' => NULL,
                'location' => NULL,
                'max_level' => NULL
                );
            $query = get_clean_params($params, $default);
        }
        if ($period) {
            $date = get_period($period);
            $query['s_date'] = $date['start_date'];
            $query['e_date'] = $date['end_date'];
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $account_id
     * @param type $location
     * @param type $period
     * @param type $order
     * @return type
     */
    public function get_location_emotion_statistic($params, $period = NULL, $order = 'name, ASC') {
        $url = $this->_api_host . "/get_location_emotion_statistic";
        if ($params) {
            $default = array(
                'account_id' => NULL,
                'location' => NULL,
                'max_level' => NULL
                );
            $query = get_clean_params($params, $default);
        }
        $query['order'] = $order;
        if ($period) {
            $date = get_period($period);
            $query['s_date'] = $date['start_date'];
            $query['e_date'] = $date['end_date'];
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $accounts
     * @param type $location
     * @param type $period
     * @return type
     */
    public function get_location_account_statistic_compare($params, $period = NULL) {
        $url = $this->_api_host . "/get_location_account_statistic_compare";
        if ($params) {
            $default = array(
                'account_id' => NULL,
                'location' => NULL
                );
            $query = get_clean_params($params, $default);
        }
        if ($period) {
            $date = get_period($period);
            $query['s_date'] = $date['start_date'];
            $query['e_date'] = $date['end_date'];
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $account_id
     * @param type $period
     * @param type $year
     * @param type $month
     * @param type $day
     * @return type
     */
    public function get_sentiment_statistic($params, $period = NULL, $year = NULL, $month = NULL, $day = NULL) {
        $url = $this->_api_host . "/get_sentiment_statistic";
        $query = array(
            'year' => $year,
            'month' => $month,
            'day' => $day
            );
        if ($params) {
            $default = array(
                'account_id' => NULL,
                'gender' => NULL,
                'age' => NULL,
                'religion' => NULL,
                'account_status' => NULL,
                'emotion' => NULL,
                'sentiment' => NULL
                );
            $query = array_merge($query, get_clean_params($params, $default));
        }
        if ($period) {
            $date = get_period($period);
            $query['s_date'] = $date['start_date'];
            $query['e_date'] = $date['end_date'];
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * Depicrated
     * @param type $account_id
     * @param type $period
     * @return type
     */
    public function get_summary($account_id, $period = NULL) {
        $url = $this->_api_host . "/get_summary";
        $query = array(
            'account_id' => $account_id,
            );
        if ($period) {
            $date = get_period($period);
            $query['s_date'] = $date['start_date'];
            $query['e_date'] = $date['end_date'];
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $account_id
     * @param type $period
     * @return type
     */
    public function get_audience_network($account_id, $period = NULL) {
        $url = $this->_api_host . "/get_audience_network";
        $query = array(
            'account_id' => $account_id,
            );
        if ($period) {
            $date = get_period($period);
            $query['s_date'] = $date['start_date'];
            $query['e_date'] = $date['end_date'];
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $account_id
     * @return type
     */
    public function get_measurement($account_id) {
        $url = $this->_api_host . "/get_measurement";
        $query = array(
            'account_id' => $account_id,
            );

        return $this->_get_response($url, 'GET', $query);
    }

    public function get_engagement_history($account_id, $year = NULL, $month = NULL) {
        $url = $this->_api_host . "/get_engagement_history";
        $query = array(
            'account_id' => $account_id,
            'year' => $year,
            'month' => $month
            );
        return $this->_get_response($url, 'GET', $query);
    }

    public function get_engagement_history_detail($account_id, $day) {
        $url = $this->_api_host . "/get_engagement_history_detail";
        $query = array(
            'account_id' => $account_id,
            'pub_day' => $day
            );
        return $this->_get_response($url, 'GET', $query);
    }
    
    /**
     * 
     * @param type $params
     * @return type
     */
    public function save_compare_issue($params)
    {
        $url = $this->_api_host . '/save_compare_issue';
        $default = array(
            'compare_id' => NULL,
            'user_id' => NULL,
            'account_id' => NULL,
            'compare_name' => NULL,
            'keyword' => NULL
            );
        $params = get_clean_params($params, $default);
        return $this->_get_response($url, 'POST', $params);
    }

    /**
     * 
     * @param type $compare_id
     * @return type
     */
    public function delete_compare_issue($compare_id)
    {
        $url = $this->_api_host . "/delete_compare_issue";
        $query = array(
            'compare_id' => $compare_id
            );
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * Get Compare Data
     * @param int $compare_id Compare ID
     * @return mixed
     */
    public function get_compare_issue($compare_id = NULL)
    {
        $url = $this->_api_host . "/get_compare_issue_detail";
        $query = array(
            'compare_id' => $compare_id
            );
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * Get Compares Data
     * @param int $workspace_id
     * @param int $start
     * @param int $rows
     * @param string $keyword
     * @return mixed
     */
    public function get_compares_issue($params, $start = 0, $rows = 10, $keyword = NULL)
    {
        $url = $this->_api_host . "/get_compares_issues";
        $query = array(
            'start' => $start,
            'row' => $rows
            );
        if ($params) {
            $default = array(
                'account_id' => NULL,
                'user_id' => NULL
                );
            $query = array_merge($query, get_clean_params($params, $default));
        }
        if ($keyword && $keyword != "") {
            $query['keyword'] = $keyword;
        }
        return $this->_get_response($url, 'GET', $query);
    }
    
    public function get_density($account_id){
        $url = $this->_api_host . "/get_density";
        $query = array(
            'account_id' => $account_id
            );
        return $this->_get_response($url, 'GET', $query);
    }
    
    public function get_location_friends($account_id){
        $url = $this->_api_host . "/get_location_friends";
        $query = array(
            'account_id' => $account_id
            );
        return $this->_get_response($url, 'GET', $query);
    }
    
    public function get_school_friends($account_id){
        $url = $this->_api_host . "/get_school_friends";
        $query = array(
            'account_id' => $account_id
            );
        return $this->_get_response($url, 'GET', $query);
    }
    
    public function get_works_at_friends($account_id){
        $url = $this->_api_host . "/get_works_at_friends";
        $query = array(
            'account_id' => $account_id
            );
        return $this->_get_response($url, 'GET', $query);
    }
    
    public function get_gender_friends($account_id){
        $url = $this->_api_host . "/get_gender_friends";
        $query = array(
            'account_id' => $account_id
            );
        return $this->_get_response($url, 'GET', $query);
    }

    public function get_generate_report_resume($account_id, $media, $sdate, $edate, $timeframe) {
        // $url = NULL;
        // if (isset($topic_id))
        //     $url = $this->_url_report . "/report/account_id/{$topic_id}/{$sdate}&{$edate}/{$timeframe}/{$media}/xls/ResumeAnalyze";

        $url = NULL;
        $return = array();
        
        // $timeframe = str_replace("month", "monthly", $timeframe);
        $timeframe = $timeframe . "ly";
        $timeframe = str_replace("dayly", "daily", $timeframe);
        $sdate = str_replace("-", "", $sdate);
        $edate = str_replace("-", "", $edate);
        $query = array(
            'media' => $media,
            'account_id' => $account_id,
            'type' => $timeframe,
            's_date' => $sdate,
            'e_date' => $edate
            
            );



        $url = '192.168.150.132:9090/generate_report_account?media='.$media.'&account_id='.$account_id.'&type='.$timeframe.'&s_date='.$sdate.'&e_date='.$edate;
        // echo $url;
        $file = $this->_get_report($url);
        

        $file_type = ".xlsx";

        $topic = $this->get_account($account_id);

        // print_r($topic);exit;
        $topic['screen_name'] = str_replace(" ", "_", $topic['screen_name']);

        $sdate = date("d F Y", strtotime($sdate));
        $edate = date("d F Y", strtotime($edate));

        $newfile = "assets/resume_report/Account {$topic['screen_name']} Resume " . ucfirst($media) . " {$timeframe}ly report (" . $sdate . " until " . $edate . ")" . $file_type ;
        // print_r($newfile);exit;

        // echo $_SERVER['DOCUMENT_ROOT']."/test";
        $files = fopen($newfile, "w");
        fwrite($files, $file);
        fclose($files);

        // if ( copy($file, $newfile) ) {
        //     echo "Copy success!";
        // }else{
        //     echo "Copy failed.";
        // }

        return $this->_get_report($url);
    }
    public function get_check_report_resume($account_id, $media, $sdate, $edate, $timeframe) {
        // Bandung Resume Twitter monthly report (17 July 2017 until 15 August 2017).xlsx
        $return = array();
        $file_type = ".xlsx";

        $topic = $this->get_account($account_id);
        // print_r($topic);exit;
        $topic['screen_name'] = str_replace(" ", "_", $topic['screen_name']);

        $sdate = date("d F Y", strtotime($sdate));
        $edate = date("d F Y", strtotime($edate));

        $url = "assets/resume_report/Account {$topic['screen_name']} Resume " . ucfirst($media) . " {$timeframe}lyly report (" . $sdate . " until " . $edate . ")" . $file_type;

        $return["url"] = $url;
        if (file_exists($url)) {
            $return["status"] = "berhasil";
        } else {
            $return["status"] = "gagal";
        }

        echo json_encode($return);
    }

}
