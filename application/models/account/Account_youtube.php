<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account_youtube extends Api_response {

    public function __construct() {
        parent::__construct();
        $this->_api_host = config_item('app_api_account_youtube');
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
     * 
     * @param type $account_id
     * @param type $period
     * @param type $sort
     * @param type $limit
     * @return type
     */
    public function get_most_active_account($account_id, $period = NULL, $sort = 'count', $limit = 10) {
        $url = $this->_api_host . "/get_most_active_account";
        $query = array(
            'account_id' => $account_id,
//            'sort' => $sort,
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
     * @param type $year
     * @param type $month
     * @return type
     */
    public function get_active_account_statistic($account_id, $year, $month = NULL) {
        $url = $this->_api_host . "/get_active_account_statistic";
        $query = array(
            'account_id' => $account_id,
            'year' => $year,
            'month' => $month
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
    public function get_subscribed_accounts($params, $start = 0, $rows = 10, $sort = 'screen_name', $keyword = NULL) {
        $url = $this->_api_host . "/get_subscribed_accounts";
        $query = array(
            'start' => $start,
            'row' => $rows,
            'sort' => $sort
        );
        if ($params) {
            $default = array(
                'workspace' => NULL,
//                'exc_user_id' => NULL
            );
            $query = array_merge($query, get_clean_params($params, $default));
        }
        if ($keyword && $keyword != "") {
            $query['keyword'] = $keyword;
        }
        if ($sort != 'screen_name') {
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
                'retweet_account' => NULL,
                'reply_account' => NULL,
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
     * @param type $account_id
     * @param type $type [all, post, comment]
     * @param type $year
     * @param type $month
     * @return type
     */
    public function get_activity_statistic($params, $year, $month = NULL) {
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
     * @param type $params
     * @return type
     */
    public function set_subscribe($params) {
        $url = $this->_api_host . "/post_account";
        return $this->_get_response($url, 'POST', $params);
    }

    /**
     * 
     * @param type $subs_id
     * @return type
     */
    public function delete_subscribe($subs_id) {
        $url = $this->_api_host . "/remove_subscribe";
        $params = array(
            'subs_id' => $subs_id
        );
        return $this->_get_response($url, 'POST', $params);
    }

    /**
     * 
     * @param type $workspace_id
     * @param type $account_id
     * @return type
     */
    public function is_subscribed_account($workspace_id, $account_id) {
        $url = $this->_api_host . "/check_subscribed_account";
        $query = array(
            'workspace_id' => $workspace_id,
            'account_id' => $account_id
        );
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $keyword
     * @param type $page
     * @param type $rows
     * @return type
     */
    public function search_account($keyword, $clipper, $page = 1, $rows = 10) {
        $url = $this->_api_host . "/search_youtube_account";
        $query = array(
            'keyword' => $keyword,
            'start' => $page,
            'row' => $rows,
            'clipper' => $clipper
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
