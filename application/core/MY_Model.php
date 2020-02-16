<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Model extends CI_Model {
    
}

class Api_response extends CI_Model {

    private $_api_host, $_error_msg;

    public function _get_response($url, $method = 'GET', $params = NULL) {
        $this->_error_msg = NULL;
        set_time_limit(0);
        $curl = curl_init();

        // Set curl options
        curl_setopt($curl, CURLOPT_HEADER, false);
        switch (strtolower($method)) {
            case 'get':
                if ($params) {
                    preg_replace('/\?$/', '', $url);
                    if (strpos('?', $url)) {
                        $url .= '&' . http_build_query($params);
                    } else {
                        $url .= '?' . http_build_query($params);
                    }
                }
                break;
            case 'post':
                if ($params) {
                    curl_setopt($curl, CURLOPT_POST, TRUE);
                    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));
                }
                break;
            case 'delete':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
                break;
        }
//        echo $url; 
//        exit;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT_MS, 120000); // 2 minutes

        $result = json_decode(curl_exec($curl), TRUE);

        if (curl_error($curl)) {
            show_error(curl_error($curl), 500, "Error API");
        }

        curl_close($curl);
        $data = FALSE;
        if ($result) {
            if ($result['status']) {
                $data = $result['data'];
            } else {
                $this->_error_msg = $result['message'];
                log_message('debug', $this->_error_msg);
            }
        } else {
            $message = array('<b>URL</b><code>' . anchor($url) . '</code>');
            if ($params) {
                $message[] = '<b>POST PARAMS</b><code>' . json_encode($params, JSON_PRETTY_PRINT) . '</code>';
            }
            show_error($message, 500, 'Empty result from API');
            log_message('error', "Empty result from API: " . $url);
        }
        return $data;
    }
    
    public function _get_report($url) {
        set_time_limit(0);
        $session = curl_init($url);

        // Set curl options
        curl_setopt($session, CURLOPT_HEADER, false);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($session, CURLOPT_TIMEOUT_MS, 120000);

        $response = curl_exec($session);
        $curl_errno = curl_errno($session);
        curl_close($session);
        return $response;
    }

    public function get_error_msg() {
        return $this->_error_msg;
    }

}
