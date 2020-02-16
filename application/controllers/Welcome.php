<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    var $_user;
    var $_account;
    var $_self = 'account/facebook/audience/';
    var $_current_menu = 'Audience';
    var $_header_name = 'ACCOUNT ANALYZE';

    function __construct() {
        
    }

    public function index() {
        $data = array(
            '_title' => 'Statistic',
            '_content' => 'account/facebook/audience/statistic',
            '_js' => array(
//                'assets/include/highcharts/highcharts.min.js',
//                'assets/include/highcharts/highcharts-more.min.js',
//                'assets/include/highcharts/modules/exporting.min.js',
//                'assets/include/highcharts/modules/drilldown.min.js',
//                'assets/include/highcharts/plugins/customEvents.min.js',
//                'assets/include/highcharts/themes/ebdesk.min.js',
//                'assets/include/d3/d3.min.js',
//                'assets/include/d3/d3.layout.cloud.min.js',
//                'assets/js/account/facebook/audience/statistic.js'
            ),
            '_css' => array(
//                'assets/css/account/facebook/audience/statistic.css'
            ),
            'account' => $this->_account
        );
        $this->load->view('template/layout-default', $data);
    }

    public function statistic() {
        $data = array(
            '_title' => 'Statistic',
            '_content' => 'account/facebook/audience/statistic',
            '_js' => array(
//                'assets/include/highcharts/highcharts.min.js',
//                'assets/include/highcharts/highcharts-more.min.js',
//                'assets/include/highcharts/modules/exporting.min.js',
//                'assets/include/highcharts/modules/drilldown.min.js',
//                'assets/include/highcharts/plugins/customEvents.min.js',
//                'assets/include/highcharts/themes/ebdesk.min.js',
//                'assets/include/d3/d3.min.js',
//                'assets/include/d3/d3.layout.cloud.min.js',
//                'assets/js/account/facebook/audience/statistic.js'
            ),
            '_css' => array(
//                'assets/css/account/facebook/audience/statistic.css'
            ),
            'account' => $this->_account
        );
        $this->load->view('template/layout-default', $data);
    }

    public function maps() {
        $data = array(
            '_title' => 'Maps',
            '_content' => 'account/facebook/audience/maps',
            '_js' => array(
                'assets/include/highcharts/highcharts.min.js',
                'assets/include/highcharts/themes/ebdesk.min.js',
                'https://www.google.com/jsapi?.js',
//                'https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places,visualization&language=id',
                'https://maps.google.com/maps/api/js?key=AIzaSyBWmcSo6HvniqEMbRWwSzrRqiK5WIzaRZk&amp;v=3.3&amp;sensor=false',
                'assets/js/account/facebook/audience/maps.js'
            ),
            '_css' => array(
                'assets/css/account/facebook/audience/maps.css'
            ),
            'account' => $this->_account
        );
        $this->load->view('template/layout-default', $data);
    }

    public function network() {
        $data = array(
            '_title' => 'Network',
            '_content' => 'account/facebook/audience/network',
            '_js' => array(
                'assets/js/account/facebook/audience/network.js'
            ),
            '_css' => array(
                'assets/css/account/facebook/audience/network.css'
            ),
            'account' => $this->_account
        );
        $this->load->view('template/layout-default', $data);
    }

}
