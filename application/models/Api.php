<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Api extends Api_response {

    function __construct() {
        parent::__construct();
        $this->_api_host = config_item('app_url_api');
    }

    /**
     * Login API same data like IMM
     * @param array $params
     * @param string $params['username'] Username
     * @param string $params['password'] password
     * @return json Row Data
     */
    public function authentication($params) {
        $url = $this->_api_host . "/login";
        return $this->_get_response($url, 'POST', $params);
    }

    /**
     * depecreated
     * @return array
     */
    public function emotion_keywords() {
        $url = $this->_api_host . "/get_emotion_keywords";
        return $this->_get_response($url);
    }

    /**
     * Get Detail Tweet By Tweet ID
     * @param int $tweet_id
     * @return type
     */
    public function get_tweet($tweet_id) {
        $url = $this->_api_host . "/get_tweet";
        $query = array(
            'tweet_id' => $tweet_id
        );
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $workspace_data
     * @return type
     */
    public function set_workspace($workspace_data) {
        $url = $this->_api_host . "/add_workspace";
        return $this->_get_response($url, 'POST', $workspace_data);
    }

    /**
     * 
     * @param type $workspace_id
     * @return type
     */
    public function get_workspace($workspace_id) {
        $url = $this->_api_host . "/get_workspaces";
        $query = array(
            'workspace_id' => $workspace_id
        );
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $start
     * @param type $row
     * @param type $keyword
     * @return type
     */
    public function get_workspaces($start = 0, $row = NULL, $sort = NULL, $keyword = NULL, $reverse = NULL) {
        $url = $this->_api_host . "/get_workspaces";
        $query = array(
            'start' => $start,
            'keyword' => $keyword,
            'sort' => $sort
        );
        if ($row) {
            $query['row'] = $row;
        }
        if ($reverse) {
            $query['reverse'] = $reverse;
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $workspace_id
     * @return type
     */
    public function delete_workspace($workspace_id) {
        $url = $this->_api_host . "/delete_workspace";
        $query = array(
            'workspace_id' => $workspace_id
        );
        return $this->_get_response($url, 'POST', $query);
    }

    /**
     * 
     * @param type $user_data
     * @return type
     */
    public function set_user($user_data) {
        $url = $this->_api_host . "/add_user";
        return $this->_get_response($url, 'POST', $user_data);
    }

    /**
     * 
     * @param type $user_id
     * @return type
     */
    public function get_user($user_id) {
        $url = $this->_api_host . "/get_users";
        $query = array(
            'user_id' => $user_id
        );
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $workspace_id
     * @param type $start
     * @param type $row
     * @param type $keyword
     * @return type
     */
    public function get_users($workspace_id, $start = 0, $row = 11, $sort = 'u_last_update DESC', $keyword = NULL) {
        $url = $this->_api_host . "/get_users";
        $query = array(
            'workspace_id' => $workspace_id,
            'start' => $start,
            'row' => $row,
            'sort' => $sort
        );
        if ($keyword && $keyword != "") {
            $query['keyword'] = $keyword;
        }
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $user_id
     * @return type
     */
    public function delete_user($user_id) {
        $url = $this->_api_host . "/delete_user";
        $query = array(
            'user_id' => $user_id
        );
        return $this->_get_response($url, 'POST', $query);
    }

    /**
     * 
     * @param type $comment_id
     * @return type
     */
    public function get_news_comment($comment_id) {
        $url = $this->_api_host . "/get_news_comment";
        $query = array(
            "comment_id" => $comment_id
        );
        return $this->_get_response($url, 'GET', $query);
    }

    /**
     * 
     * @param type $comment_id
     * @return type
     */
    public function get_forum($comment_id) {
        $url = $this->_api_host . "/get_forum";
        $query = array(
            "comment_id" => $comment_id
        );
        return $this->_get_response($url, 'GET', $query);
    }

    public function check_available($username = NULL, $email = NULL) {
        $url = $this->_api_host . "/check_available";
        $query = array(
            "username" => $username,
            "email" => $email
        );
        return $this->_get_response($url, 'GET', $query);
    }

    public function get_all_location() {
        $url = $this->_api_host . "/get_all_location";
        return $this->_get_response($url, 'GET');
    }

    public function get_workspace_menu($params) {
        $url = $this->_api_host . "/get_menus";
        if ($params) {
            $default = array(
                'workspace_id' => NULL,
                'staging' => NULL,
                'raw' => NULL
            );
            $query = get_clean_params($default, $params);
        }
        
        return $this->_get_response($url, 'GET', $query);
    }

    public function update_workspace_menu($params) {
        $url = $this->_api_host . "/set_workspace_menus";
        if ($params) {
            $default = array(
                'workspace_id' => NULL,
                'hidden_menus' => NULL
            );
            $query = get_clean_params($default, $params);
        }

        return $this->_get_response($url, 'POST', $query);
    }

    public function set_menu($params) {
        $url = $this->_api_host . "/set_menu";
        if ($params) {
            $default = array(
                'parent_id' => NULL,
                'menu_id' => NULL,
                'text' => NULL,
                'url' => NULL,
                'basic' => NULL,
                'staging' => NULL
            );
            $query = get_clean_params($default, $params);
        }
        
        return $this->_get_response($url, 'POST', $query);
    }

    public function delete_menu($params) {
        $url = $this->_api_host . "/delete_menu";
        if ($params) {
            $default = array(
                'menu_id' => NULL
            );
            $query = get_clean_params($params, $default);
        }
        
        return $this->_get_response($url, 'POST', $query);
    }

}
