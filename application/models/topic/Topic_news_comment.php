<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Topic_news_comment extends Api_response {

    function __construct() {
        parent::__construct();
        $this->_api_host = config_item('app_api_topic_news_comment');
        $this->_url_report = $this->config->item('app_url_report');
    }

    /**
     * 
     * @param type $params
     * @param type $start
     * @param type $rows
     * @param type $keyword
     * @param type $period
     * @param type $sort ['comment_like']
     * @return type
     */
    public function get_news_comments($params, $start = 0, $rows = 15, $keyword = NULL, $period = NULL) {
        $url = $this->_api_host . "/get_news_comments";
        $query = array(
            'start' => $start,
            'row' => $rows
        );
        if ($params) {
            $default = array(
                'topic_id' => NULL,
                'type' => NULL,
                'emotion' => NULL,
                'sentiment' => NULL,
                'ids' => NULL,
                'language' => NULL,
                'comment_account' => NULL,
                'sort' => NULL,
                'query_keyword' => NULL
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
    public function get_activity_statistic($params, $year, $month = NULL, $keyword = NULL) {
        $url = $this->_api_host . "/get_activity_statistic";
        $query = array(
            'year' => $year,
            'month' => $month,
        );
        if ($params) {
            $default = array(
                'topic_id' => NULL,
                'keyword' => NULL
            );
            $query = array_merge($query, get_clean_params($params, $default));
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
                'topic_id' => NULL
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
     * @param type $params
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
    public function get_emotion_keywords($topic_id, $period) {
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
     * @param type $limit
     * @param type $year
     * @param type $month
     * @return type
     */
    public function get_media_share($topic_id, $period = NULL, $limit = NULL, $year = NULL, $month = NULL) {
        $url = $this->_api_host . "/get_media_share";
        $query = array(
            'topic_id' => $topic_id,
            'limit' => $limit,
            'year' => $year,
            'month' => $month
        );
        $query = $query + get_period_redis($period);
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $params
     * @return type
     */
    public function save_compare_issue($params) {
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
    public function delete_compare_issue($compare_id) {
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
    public function get_compare_issue($compare_id = NULL) {
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
    public function get_compares_issue($params, $start = 0, $rows = 10, $keyword = NULL) {
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
            $url = $this->_url_report . "/report/{$topic_id}/{$sdate}&{$edate}/{$timeframe}/{$media}/xls/ResumeAnalyze";
            
        
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
        // Bandung Resume News Comment monthly report (17 July 2017 until 15 August 2017).xlsx
        $return = array();
        $file_type = ".xlsx";
        
        $topic = $this->topic_twitter->get_topic($topic_id);

        $sdate = date("d F Y", strtotime($sdate));
        $edate = date("d F Y", strtotime($edate));

        $url = "assets/resume_report/{$topic['t_name']} Resume " . ucfirst($media) . " Comment {$timeframe}ly report (" . $sdate . " until " . $edate . ")" . $file_type;

        $return["url"] = $url;
        if (file_exists($url)) {
            $return["status"] = "berhasil";
        } else {
            $return["status"] = "gagal";
        }
        
        echo json_encode($return);
    }

}
