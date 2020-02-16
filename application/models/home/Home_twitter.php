<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Home_twitter extends Api_response {

    function __construct() {
        parent::__construct();
        $this->_api_host = $this->config->item('app_api_home_twitter');
        $this->_url_report = $this->config->item('app_url_report');
    }

    /**
     * 
     * @param type $period
     * @param type $location
     * @param type $hashtag
     * @param type $keyword
     * @return type
     */
    public function get_age($params, $period) {
        $url = $this->_api_host . "/get_age";
        if ($params) {
            $default = array(
                'location' => NULL,
                'hashtag' => NULL,
                'keyword' => NULL,
                'source' => NULL
            );
            $query = get_clean_params($params, $default);
        }
        if ($period) {
            if (preg_match('/\d{4}-\d{2}-\d{2}&\d{4}-\d{2}-\d{2}/', $period) || $period == "all") {
                $date = get_period($period);
                if (preg_match('/^h/', $period)) {
                    $query['s_hour'] = $date['start_date'];
                    $query['e_hour'] = $date['end_date'];
                } else {
                    $query['s_date'] = $date['start_date'];
                    $query['e_date'] = $date['end_date'];
                }
            } else {
                $query['tr'] = $period;
            }
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $period
     * @param type $location
     * @param type $hashtag
     * @param type $keyword
     * @return type
     */
    public function get_gender($params, $period) {
        $url = $this->_api_host . "/get_gender";
        if ($params) {
            $default = array(
                'location' => NULL,
                'hashtag' => NULL,
                'keyword' => NULL,
                'source' => NULL
            );
            $query = get_clean_params($params, $default);
        }
        if ($period) {
            if (preg_match('/\d{4}-\d{2}-\d{2}&\d{4}-\d{2}-\d{2}/', $period) || $period == "all") {
                $date = get_period($period);
                if (preg_match('/^h/', $period)) {
                    $query['s_hour'] = $date['start_date'];
                    $query['e_hour'] = $date['end_date'];
                } else {
                    $query['s_date'] = $date['start_date'];
                    $query['e_date'] = $date['end_date'];
                }
            } else {
                $query['tr'] = $period;
            }
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $period
     * @param type $location
     * @param type $hashtag
     * @param type $keyword
     * @param type $limit
     * @return type
     */
    public function get_religion($params, $period) {
        $url = $this->_api_host . "/get_religion";
        if ($params) {
            $default = array(
                'location' => NULL,
                'hashtag' => NULL,
                'keyword' => NULL,
                'source' => NULL
            );
            $query = get_clean_params($params, $default);
        }
        if ($period) {
            if (preg_match('/\d{4}-\d{2}-\d{2}&\d{4}-\d{2}-\d{2}/', $period) || $period == "all") {
                $date = get_period($period);
                if (preg_match('/^h/', $period)) {
                    $query['s_hour'] = $date['start_date'];
                    $query['e_hour'] = $date['end_date'];
                } else {
                    $query['s_date'] = $date['start_date'];
                    $query['e_date'] = $date['end_date'];
                }
            } else {
                $query['tr'] = $period;
            }
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $period
     * @param type $location
     * @param type $hashtag
     * @param type $limit
     * @return type
     */
    public function get_source($params, $period) {
        $url = $this->_api_host . "/get_source";
        if ($params) {
            $default = array(
                'location' => NULL,
                'hashtag' => NULL,
                'keyword' => NULL,
                'source' => NULL
            );
            $query = get_clean_params($params, $default);
        }
        if ($period) {
            if (preg_match('/\d{4}-\d{2}-\d{2}&\d{4}-\d{2}-\d{2}/', $period) || $period == "all") {
                $date = get_period($period);
                if (preg_match('/^h/', $period)) {
                    $query['s_hour'] = $date['start_date'];
                    $query['e_hour'] = $date['end_date'];
                } else {
                    $query['s_date'] = $date['start_date'];
                    $query['e_date'] = $date['end_date'];
                }
            } else {
                $query['tr'] = $period;
            }
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $location
     * @param type $hashtag
     * @param type $keyword
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
                'location' => NULL,
                'hashtag' => NULL,
                'keyword' => NULL
            );
            $query = array_merge($query, get_clean_params($params, $default));
        }
        if ($period) {
            $date = get_period($period);
            if (preg_match('/^h/', $period)) {
                $query['s_hour'] = $date['start_date'];
                $query['e_hour'] = $date['end_date'];
            } else {
                $query['s_date'] = $date['start_date'];
                $query['e_date'] = $date['end_date'];
            }
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $loc
     * @param type $period
     * @param type $order
     * @return type
     */
    public function get_location_account_statistic($params, $period = NULL, $order = NULL) {
        $url = $this->_api_host . "/get_location_account_statistic";
        if ($params) {
            $default = array(
                'location' => NULL,
                'max_level' => NULL,
                'source' => NULL
            );
            $query = get_clean_params($params, $default);
        }
        $query['order'] = $order;
        if ($period) {
            if (preg_match('/\d{4}-\d{2}-\d{2}&\d{4}-\d{2}-\d{2}/', $period) || $period == "all") {
                $date = get_period($period);
                $query['s_date'] = $date['start_date'];
                $query['e_date'] = $date['end_date'];
            } else {
                $query['tr'] = $period;
            }
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $loc
     * @param type $period
     * @param type $order
     * @return type
     */
    public function get_location_emotion_statistic($params, $period = NULL, $order = 'name, ASC') {
        $url = $this->_api_host . "/get_location_emotion_statistic";
        if ($params) {
            $default = array(
                'location' => NULL,
                'max_level' => NULL
            );
            $query = get_clean_params($params, $default);
        }
        $query['order'] = $order;
        if ($period) {
            $date = get_period($period);
            if (preg_match('/^h/', $period)) {
                $query['s_hour'] = $date['start_date'];
                $query['e_hour'] = $date['end_date'];
            } else {
                $query['s_date'] = $date['start_date'];
                $query['e_date'] = $date['end_date'];
            }
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $loc
     * @param type $period
     * @param type $order
     * @return type
     */
    public function get_location_hashtag_statistic($params, $period = NULL, $order = 'name, ASC') {
        $url = $this->_api_host . "/get_location_hashtag_statistic";
        if ($params) {
            $default = array(
                'location' => NULL
            );
            $query = get_clean_params($params, $default);
        }
        $query['order'] = $order;
        if ($period) {
            $date = get_period($period);
            if (preg_match('/^h/', $period)) {
                $query['s_hour'] = $date['start_date'];
                $query['e_hour'] = $date['end_date'];
            } else {
                $query['s_date'] = $date['start_date'];
                $query['e_date'] = $date['end_date'];
            }
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $loc
     * @param type $period
     * @param type $order
     * @return type
     */
    public function get_location_issue_statistic($params, $period = NULL, $order = 'name, ASC') {
        $url = $this->_api_host . "/get_location_issue_statistic";
        if ($params) {
            $default = array(
                'location' => NULL
            );
            $query = get_clean_params($params, $default);
        }
        $query['order'] = $order;
        if ($period) {
            $date = get_period($period);
            if (preg_match('/^h/', $period)) {
                $query['s_hour'] = $date['start_date'];
                $query['e_hour'] = $date['end_date'];
            } else {
                $query['s_date'] = $date['start_date'];
                $query['e_date'] = $date['end_date'];
            }
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
    public function get_tweets($params, $start = 0, $rows = 15, $keyword = NULL, $period = NULL) {
        $url = $this->_api_host . "/get_tweets";
        $query = array(
            'start' => $start,
            'row' => $rows
        );
        if ($params) {
            $default = array(
                'location' => NULL,
                'hashtag' => NULL,
                'issue' => NULL,
                'emotion' => NULL,
                'sentiment' => NULL,
                'ids' => NULL,
                'language' => NULL,
                'screen_name' => NULL,
                'latest_tweets' => NULL,
                'query_keyword' => NULL,
            );
            $query = array_merge($query, get_clean_params($params, $default));
        }
        if ($keyword && $keyword != "") {
            $query['keyword'] = $keyword;
        }
        if ($period) {
            $date = get_period($period);
            if (preg_match('/^h/', $period)) {
                $query['s_hour'] = $date['start_date'];
                $query['e_hour'] = $date['end_date'];
            } else {
                $query['s_date'] = $date['start_date'];
                $query['e_date'] = $date['end_date'];
            }
        }
        return $this->_get_response($url, 'GET', $query);
    }
    
    /**
     * Get Generate Overview
     * @param int $topic_id
     * @param string $media
     * @param date $date
     * @param string $keyword
     * @return null
     */
    public function get_generate_overview($topic_id, $media, $date, $keyword) {
        $url = NULL;
        if (isset($topic_id))
            $url = $this->_url_report . "/report/home/{$topic_id}/{$date}/" . urlencode($keyword) . "/{$media}/xls/Overview";
            
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
    public function get_check_overview($topic_id, $media, $date) {
        // Bandung Overview Twitter report (17 July 2017).xlsx
        $return = array();
        $file_type = ".xlsx";
        
        $topic = $this->topic_twitter->get_topic($topic_id);
        $topic['t_name'] = str_replace(" ", "_", $topic['t_name']);

        $date = date("d F Y", strtotime($date));

        $url = "assets/overview_report/{$topic['t_name']} Overview " . ucfirst($media) . " report (" . $date . ")" . $file_type;

        $return["url"] = $url;
        if (file_exists($url)) {
            $return["status"] = "berhasil";
        } else {
            $return["status"] = "gagal";
        }
        
        echo json_encode($return);
    }

}
