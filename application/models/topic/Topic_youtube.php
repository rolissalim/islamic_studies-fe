<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Topic_youtube extends Api_response {

    function __construct() {
        parent::__construct();
        $this->_api_host = $this->config->item('app_api_topic_youtube');
        $this->_url_report = $this->config->item('app_url_report');
    }

    /**
     * Set Topic Data
     * @param mixed $topic_data Topic Data
     * @return int Topic ID
     */
    public function set_topic($topic_data) {
        $url = $this->_api_host . '/set_topic';
        return $this->_get_response($url, 'POST', $topic_data);
    }

    /**
     * 
     * @param type $topic_id
     * @return type
     */
    public function delete_topic($topic_id) {
        $url = $this->_api_host . '/delete_topic';
        $params = array(
            'topic_id' => $topic_id
        );
        return $this->_get_response($url, 'POST', $params);
    }

    /**
     * Set Topic User
     * @param array $array_topic Array Topic ID
     * @return boolean
     */
    public function set_topic_user($user_id, $array_topic) {
        $url = $this->_api_host . '/set_topic_user';
        $params = array(
            'user_id' => $user_id,
            'topic_ids' => json_encode($array_topic)
        );
        return $this->_get_response($url, 'POST', $params);
    }

    /**
     * Get Topic Per User ID 
     * @param int $user_id
     * @return array Topics Data
     */
    public function get_user_topics($user_id) {
        $url = $this->_api_host . "/get_user_topic";
        $query = array(
            'user_id' => $user_id
        );
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * Get Topic Detail 
     * @param int $topic_id
     * @return array Topic Data
     */
    public function get_topic($topic_id) {
        $url = $this->_api_host . "/get_topic_detail";
        $query = array(
            'topic_id' => $topic_id
        );
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * Get Topics Data by workspace
     * @param int $workspace_id
     * @param int $start
     * @param int $rows
     * @param string $keyword
     * @param string $sort
     * @return array
     */
    public function get_topics($params, $start = 0, $rows = 10, $sort = 't_last_update', $keyword = NULL) {
        $url = $this->_api_host . "/get_topic";
        $query = array(
            'start' => $start,
            'row' => $rows,
            'sort' => $sort,
            'reverse' => true,
        );
        if ($params) {
            $default = array(
                'workspace_id' => NULL
            );
            $query = array_merge($query, get_clean_params($params, $default));
        }
        if ($keyword && $keyword != "") {
            $query['keyword'] = $keyword;
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
    public function get_youtube_posts($params, $start = 0, $rows = 15, $keyword = NULL, $period = NULL) {
        $url = $this->_api_host . "/get_posts";
        $query = array(
            'start' => $start,
            'row' => $rows
        );
        if ($params) {
            $default = array(
                'topic_id' => NULL,
                'location' => NULL,
                'type' => NULL,
                'emotion' => NULL,
                'sentiment' => NULL,
                'ids' => NULL,
                'language' => NULL,
                'fb_user' => NULL,
                'influencer_id' => NULL,
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
                'topic_id' => NULL
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
     * @param type $topic_id
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
                'topic_id' => NULL,
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
     * @param type $topic_id
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
                'topic_id' => NULL,
                'gender' => NULL,
                'age' => NULL
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
     * @param type $topic_id
     * @param type $period
     * @param type $limit
     * @return type
     */
    public function get_hashtags($topic_id, $period = NULL, $limit = 20) {
        $url = $this->_api_host . "/get_hashtags";
        $query = array(
            'topic_id' => $topic_id,
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
     * @param type $topic_id
     * @param type $period
     * @param type $limit
     * @return type
     */
    public function get_gender($topic_id, $period = NULL) {
        $url = $this->_api_host . "/get_gender";
        $query = array(
            'topic_id' => $topic_id
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
     * @param type $topic_id
     * @param type $period
     * @param type $limit
     * @return type
     */
    public function get_religion($topic_id, $period = NULL, $limit = 5) {
        $url = $this->_api_host . "/get_religion";
        $query = array(
            'topic_id' => $topic_id,
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
     * @param type $topic_id
     * @param type $period
     * @param type $limit
     * @return type
     */
    public function get_age($topic_id, $period = NULL, $limit = 5) {
        $url = $this->_api_host . "/get_age";
        $query = array(
            'topic_id' => $topic_id,
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
     * @param type $topic_id
     * @param type $period
     * @param type $limit
     * @return type
     */
    public function get_source($topic_id, $period = NULL, $limit = 10) {
        $url = $this->_api_host . "/get_source";
        $query = array(
            'topic_id' => $topic_id,
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
     * Get Languages
     * @return array
     */
    public function get_languages() {
        $url = $this->_api_host . "/get_language";
        return $this->_get_response($url);
    }

    /**
     * 
     * @param type $topic_id
     * @param type $period
     * @param string $sort ['count','follower_count','statuses_count']
     * @param type $limit
     * @return type
     */
    public function get_most_active_account($topic_id, $period = NULL, $sort = 'count', $limit = 10) {
        $url = $this->_api_host . "/get_most_active_account";
        $query = array(
            'topic_id' => $topic_id,
            'sort' => $sort,
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
     * @param type $topic_id
     * @param type $year
     * @param type $month
     * @return type
     */
    public function get_active_account_statistic($topic_id, $year, $month = NULL) {
        $url = $this->_api_host . "/get_active_account_statistic";
        $query = array(
            'topic_id' => $topic_id,
            'year' => $year,
            'month' => $month
        );
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $compare_data
     * @return type
     */
    public function set_compare($compare_data) {
        $url = $this->_api_host . '/set_compare';
        return $this->_get_response($url, 'POST', $compare_data);
    }

    /**
     * Get Compare Data
     * @param int $compare_id Compare ID
     * @return mixed
     */
    public function get_compare($compare_id = NULL) {
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
     * @param int $rows
     * @param string $keyword
     * @return mixed
     */
    public function get_compares($workspace_id, $start = 0, $rows = 10, $keyword = NULL) {
        $url = $this->_api_host . "/get_compares";
        $query = array(
            'workspace_id' => $workspace_id,
            'start' => $start,
            'row' => $rows
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
     * @param type $topic_id
     * @param type $limit
     * @param type $first
     * @return type
     */
    public function get_emotion_streaming($topic_id, $limit = NULL, $first = NULL) {
        $url = $this->_api_host . "/get_emotion_stream";
        $query = array(
            'topic_id' => $topic_id,
            'limit' => $limit,
            'first' => $first
        );
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $topic_id
     * @param type $limit
     * @param type $first
     * @return type
     */
    public function get_exposure_streaming($topic_id, $limit = NULL, $first = NULL) {
        $url = $this->_api_host . "/get_exposure_stream";
        $query = array(
            'topic_id' => $topic_id,
            'limit' => $limit,
            'first' => $first
        );
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $topic_id
     * @param type $period
     * @param type $result
     * @return type
     */
    public function get_cluster($params, $period = NULL, $result = 200) {
        $url = $this->_api_host . "/get_clustering";
        if ($params) {
            $default = array(
                'topic_id' => NULL
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
     * @param type $topic_ids
     * @param type $period
     * @return type
     */
    public function get_compare_activity($topic_ids, $period = NULL) {
        $url = $this->_api_host . "/get_compare_activity";
        $query = array(
            'topic_ids' => json_encode($topic_ids),
            'tr' => $period
        );
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $topic_id
     * @param type $period
     * @return type
     */
    public function get_emotion_keywords($topic_id, $period = NULL) {
        $url = $this->_api_host . "/get_emotion_keywords";
        $query = array(
            'topic_id' => $topic_id
        );
        $query = $query + get_period_redis($period);
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $topic_id
     * @param type $location
     * @param type $period
     * @return type
     */
    public function get_location_account_statistic($params, $period = NULL) {
        $url = $this->_api_host . "/get_location_account_statistic";
        if ($params) {
            $default = array(
                'topic_id' => NULL,
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
     * @param type $topic_id
     * @param type $location
     * @param type $period
     * @param type $order
     * @return type
     */
    public function get_location_emotion_statistic($params, $period = NULL, $order = 'name, ASC') {
        $url = $this->_api_host . "/get_location_emotion_statistic";
        if ($params) {
            $default = array(
                'topic_id' => NULL,
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
     * @param type $topics
     * @param type $location
     * @param type $period
     * @return type
     */
    public function get_location_account_statistic_compare($params, $period = NULL) {
        $url = $this->_api_host . "/get_location_account_statistic_compare";
        if ($params) {
            $default = array(
                'topic_id' => NULL,
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
     * @param type $topic_id
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
                'topic_id' => NULL,
                'gender' => NULL,
                'age' => NULL
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
     * @param type $topic_id
     * @param type $period
     * @return type
     */
    public function get_audience_network($topic_id, $period = NULL) {
        $url = $this->_api_host . "/get_audience_network";
        $query = array(
            'topic_id' => $topic_id,
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
     * @param type $topic_id
     * @return type
     */
    public function get_measurement($topic_id) {
        $url = $this->_api_host . "/get_measurement";
        $query = array(
            'topic_id' => $topic_id,
        );

        return $this->_get_response($url, 'GET', $query);
    }

    public function get_engagement_history($topic_id, $year = NULL, $month = NULL) {
        $url = $this->_api_host . "/get_engagement_history";
        $query = array(
            'topic_id' => $topic_id,
            'year' => $year,
            'month' => $month
        );
        return $this->_get_response($url, 'GET', $query);
    }

    public function get_engagement_history_detail($topic_id, $day) {
        $url = $this->_api_host . "/get_engagement_history_detail";
        $query = array(
            'topic_id' => $topic_id,
            'pub_day' => $day
        );
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $topic_id
     * @param type $period
     * @return type
     */
    public function get_audience_network_advanced($topic_id, $period = NULL) {
        $url = $this->_api_host . "/get_audience_network_advanced";
        $query = array(
            'topic_id' => $topic_id,
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
     * @param type $params
     * @return type
     */
    public function save_compare_issue($params)
    {
        $url = $this->_api_host . '/save_compare_issue';
        $default = array(
            'compare_id' => NULL,
            'user_id' => NULL,
            'topic_id' => NULL,
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
                'topic_id' => NULL,
                'user_id' => NULL
            );
            $query = array_merge($query, get_clean_params($params, $default));
        }
        if ($keyword && $keyword != "") {
            $query['keyword'] = $keyword;
        }
        return $this->_get_response($url, 'GET', $query);
    }
    
    /**
     * Get Generate Report Resume
     * @param int $topic_id
     * @param string $media
     * @param date $sdate
     * @param date $edate
     * @param string $timeframe
     * @return null
     */
    public function get_generate_report_resume($topic_id, $media, $sdate, $edate, $timeframe) {
        $url = NULL;
        if (isset($topic_id))
            $url = $this->_url_report . "/report/topic/{$topic_id}/{$sdate}&{$edate}/{$timeframe}/{$media}/xls/ResumeAnalyze";
            
        
        return $this->_get_report($url);
    }
    
    /**
     * Get Check Generate Report Resume
     * @param int $topic_id
     * @param string $media
     * @param date $sdate
     * @param date $edate
     * @param string $timeframe
     * @return array
     */
    public function get_check_report_resume($topic_id, $media, $sdate, $edate, $timeframe) {
        // Bandung Resume Youtube monthly report (17 July 2017 until 15 August 2017).xlsx
        $return = array();
        $file_type = ".xlsx";
        
        $topic = $this->topic_twitter->get_topic($topic_id);
        $topic['t_name'] = str_replace(" ", "_", $topic['t_name']);

        $sdate = date("d F Y", strtotime($sdate));
        $edate = date("d F Y", strtotime($edate));

        $url = "assets/resume_report/Topic {$topic['t_name']} Resume " . ucfirst($media) . " {$timeframe}ly report (" . $sdate . " until " . $edate . ")" . $file_type;

        $return["url"] = $url;
        if (file_exists($url)) {
            $return["status"] = "berhasil";
        } else {
            $return["status"] = "gagal";
        }
        
        echo json_encode($return);
    }

}
