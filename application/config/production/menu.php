<?php

$config['app_menu'] = array(
    'Home' => array(
        'Home' => 'main',
        'Perception Maps' => array(
            'Heatmaps' => 'home/twitter/perception_maps/heatmaps',
            'Issue Maps' => 'home/twitter/perception_maps/issue',
            'Hashtag Maps' => 'home/twitter/perception_maps/hashtag'
        ),
        'Demography' => array(
            'Graph Analysis' => 'home/twitter/demography/graph',
            'Maps Analysis' => 'home/twitter/demography/maps'
        ),
        'Personalize' => array(
            'My Accounts' => 'home/personalize/my_catalogs',
            'My Topics' => 'home/personalize/my_topics',
            'Share Topics' => 'home/personalize/share_topics',
            'My Profile' => 'home/personalize/my_profile'
        ),
        'Admin' => array(
            'Workspace' => 'home/workspace',
            'User Management' => 'home/usermanagement',
//                    'Keywords' => 'home/keywords'
        ),
        'Sign Out' => 'logout'
    ),
    'Account' => array(
        'twitter' => array(
            'Index' => 'account/twitter/main',
            'Dashboard' => 'account/twitter/dashboard',
            'Chronology' => array(
                'Timeline' => 'account/twitter/chronology/timeline',
                'Pictures' => 'account/twitter/chronology/pictures',
                //'Issues' => 'account/twitter/chronology/issues',
                //'Stories' => 'account/twitter/chronology/stories',
                'Streaming' => 'account/twitter/chronology/streaming'
            ),
            'Issues' => array(
                'Cluster' => 'account/twitter/issues/cluster',
                'Comparison' => 'account/twitter/issues/comparison'
            ),
            'Audience' => array(
                'Statistic' => 'account/twitter/audience/statistic',
                'Network' => 'account/twitter/audience/network',
                'Relations' => 'account/twitter/audience/relations',
            //'Maps' => 'account/twitter/audience/maps',
            ),
            'Engagement' => array(
                'Engagement' => 'account/twitter/engagement',
                'History' => 'account/twitter/engagement/history',
            ),
            'Demography' => array(
                'Graph Analysis' => 'account/twitter/demography/graph',
                'Maps Analysis' => 'account/twitter/demography/maps',
            ),
            'Emotion' => array(
                'Graph Analysis' => 'account/twitter/emotion/graph',
                'Demography Analysis' => 'account/twitter/emotion/demography',
                'Text Analysis' => 'account/twitter/emotion/text',
                'Maps Analysis' => 'account/twitter/emotion/maps',
                'History' => 'account/twitter/emotion/history',
                'Streaming' => 'account/twitter/emotion/streaming'
            ),
            'Sentiments' => array(
                'Text Analysis' => 'account/twitter/sentiments',
                'Demography Analysis' => 'account/twitter/sentiments/demography'
            ),
//            'Data_explorer' => array(
//                'Index' => 'account/twitter/data_explorer/main',
//                'Comparison' => 'account/twitter/data_explorer/comparison',
//                'Explore' => 'account/twitter/data_explorer/explore',
//                'Timeline' => 'account/twitter/data_explorer/timeline'
//            ),
        //'Tracking' => array(
        //'Tweets Maps' => 'account/twitter/tracking/maps',
        //'Tweets Network' => 'account/twitter/tracking/network',
        //)
        ),
        'facebook' => array(
            'Index' => 'account/facebook/main',
            'Dashboard' => 'account/facebook/dashboard',
            'Chronology' => array(
                'Timeline' => 'account/facebook/chronology/timeline',
//                        'Media' => 'account/facebook/chronology/pictures',
            //'Issues' => 'account/facebook/chronology/issues',
            //'Stories' => 'account/facebook/chronology/stories',
//                        'Streaming' => 'account/facebook/chronology/streaming'
            ),
            'Issues' => array(
                'Cluster' => 'account/facebook/issues/cluster',
                'Comparison' => 'account/facebook/issues/comparison'
            ),
            'Audience' => array(
                'Statistic' => 'account/facebook/audience/statistic',
            //'Network' => 'account/facebook/audience/network',
            //'Maps' => 'account/facebook/audience/maps',
            ),
            //'Engagement' => array(
            //'Engagement' => 'account/facebook/engagement',
            //'History' => 'account/facebook/engagement/history',
            //),
            //'Demography' => array(
            //'Graph Analysis' => 'account/facebook/demography/graph',
            //'Maps Analysis' => 'account/facebook/demography/maps',
            //),
//                    'Emotion' => array(
//                        'Graph Analysis' => 'account/facebook/emotion/graph',
//                        //'Demography Analysis' => 'account/facebook/emotion/demography',
//                        'Text Analysis' => 'account/facebook/emotion/text',
//                        //'Maps Analysis' => 'account/facebook/emotion/maps',
//                        'History' => 'account/facebook/emotion/history',
//                        //'Streaming' => 'account/facebook/emotion/streaming'
//                    ),
            'Emotion' => array(
                'Graph Analysis' => 'account/facebook/emotion/graph',
//                'Demography Analysis' => 'account/facebook/emotion/demography',
                'Text Analysis' => 'account/facebook/emotion/text',
                'History' => 'account/facebook/emotion/history',
//                'Streaming' => 'account/facebook/emotion/streaming'
            ),
            'Sentiments' => array(
                'Text Analysis' => 'account/facebook/sentiments',
//                'Demography Analysis' => 'account/facebook/sentiments/demography'
            ),
        ),
        'youtube' => array(
            'Index' => 'account/youtube/main',
            'Dashboard' => 'account/youtube/dashboard',
            'Chronology' => array(
                'Timeline' => 'account/youtube/chronology/timeline',
//                'Pictures' => 'account/twitter/chronology/pictures',
                //'Issues' => 'account/twitter/chronology/issues',
                //'Stories' => 'account/twitter/chronology/stories',
//                'Streaming' => 'account/twitter/chronology/streaming'
            ),
            'Issues' => array(
                'Cluster' => 'account/youtube/issues/cluster',
                'Comparison' => 'account/youtube/issues/comparison'
            ),
            'Audience' => array(
                'Statistic' => 'account/youtube/audience/statistic',
            ),
            'Emotion' => array(
                'Graph Analysis' => 'account/youtube/emotion/graph',
                'Text Analysis' => 'account/youtube/emotion/text',
                'History' => 'account/youtube/emotion/history',
            ),
            'Sentiments' => array(
                'Text Analysis' => 'account/youtube/sentiments',
            ),
        ),
        'instagram' => array(
            'Index' => 'account/instagram/main',
            'Dashboard' => 'account/instagram/dashboard',
            'Chronology' => array(
                'Timeline' => 'account/instagram/chronology/timeline',
//                'Pictures' => 'account/twitter/chronology/pictures',
            //'Issues' => 'account/twitter/chronology/issues',
            //'Stories' => 'account/twitter/chronology/stories',
//                'Streaming' => 'account/twitter/chronology/streaming'
            ),
            'Issues' => array(
                'Cluster' => 'account/instagram/issues/cluster',
                'Comparison' => 'account/instagram/issues/comparison'
            ),
            'Audience' => array(
                'Statistic' => 'account/instagram/audience/statistic',
            //'Network' => 'account/instagram/audience/network',
            //'Maps' => 'account/instagram/audience/maps',
            ),
            'Emotion' => array(
                'Graph Analysis' => 'account/instagram/emotion/graph',
//                'Demography Analysis' => 'account/instagram/emotion/demography',
                'Text Analysis' => 'account/instagram/emotion/text',
//                'Maps Analysis' => 'account/instagram/emotion/maps',
                'History' => 'account/instagram/emotion/history',
//                'Streaming' => 'account/instagram/emotion/streaming'
            ),
            'Sentiments' => array(
                'Text Analysis' => 'account/instagram/sentiments'
            ),
        )

    ),
    'Topic' => array(
        'twitter' => array(
            'Index' => 'topic/twitter/main',
            'Dashboard' => 'topic/twitter/dashboard',
            'Chronology' => array(
                'Timeline' => 'topic/twitter/chronology/timeline',
                'Pictures' => 'topic/twitter/chronology/pictures',
                //'Issues' => 'topic/twitter/chronology/issues',
                //'Stories' => 'topic/twitter/chronology/stories',
                'Streaming' => 'topic/twitter/chronology/streaming'
            ),
            'Issues' => array(
                'Cluster' => 'topic/twitter/issues/cluster',
                'Comparison' => 'topic/twitter/issues/comparison'
            ),
            'Audience' => array(
                'Statistic' => 'topic/twitter/audience/statistic',
                'Network' => 'topic/twitter/audience/network',
                'Relations' => 'topic/twitter/audience/relations',
            //'Maps' => 'topic/twitter/audience/maps',
            ),
            'Engagement' => array(
                'Engagement' => 'topic/twitter/engagement',
                'History' => 'topic/twitter/engagement/history',
            ),
            'Demography' => array(
                'Graph Analysis' => 'topic/twitter/demography/graph',
                'Maps Analysis' => 'topic/twitter/demography/maps',
            ),
            'Emotion' => array(
                'Graph Analysis' => 'topic/twitter/emotion/graph',
                'Demography Analysis' => 'topic/twitter/emotion/demography',
                'Text Analysis' => 'topic/twitter/emotion/text',
                'Maps Analysis' => 'topic/twitter/emotion/maps',
                'History' => 'topic/twitter/emotion/history',
                'Streaming' => 'topic/twitter/emotion/streaming'
            ),
            // 'Pilkada' => array(
            //     'Streaming' => 'topic/twitter/pilkada/emotion/streaming',
            //     'History' => 'topic/twitter/pilkada/emotion/history'
            // ),
            'Sentiments' => array(
                'Text Analysis' => 'topic/twitter/sentiments',
                'Demography Analysis' => 'topic/twitter/sentiments/demography'
            ),
            'Data_explorer' => array(
                'Index' => 'topic/twitter/data_explorer/main',
                'Comparison' => 'topic/twitter/data_explorer/comparison',
                'Explore' => 'topic/twitter/data_explorer/explore',
                'Timeline' => 'topic/twitter/data_explorer/timeline'
            ),
        //'Tracking' => array(
        //'Tweets Maps' => 'topic/twitter/tracking/maps',
        //'Tweets Network' => 'topic/twitter/tracking/network',
        //)
        ),
//                'facebook' => array(
//                    'Index' => 'topic/main',
//                    'Dashboard' => 'topic/facebook/dashboard',
//                    'Chronology' => array(
//                        'Timeline' => 'topic/facebook/chronology/timeline',
//                        'Pictures' => 'topic/facebook/chronology/pictures',
//                        //'Issues' => 'topic/twitter/chronology/issues',
//                        //'Stories' => 'topic/twitter/chronology/stories',
//                        'Streaming' => 'topic/facebook/chronology/streaming'
//                    ),
//                    'Issues' => array(
//                        'Cluster' => 'topic/facebook/issues/cluster',
//                        'Comparison' => 'topic/facebook/issues/comparison'
//                    ),
//                    'Audience' => array(
//                        'Statistic' => 'topic/facebook/audience/statistic',
//                        'Network' => 'topic/facebook/audience/network',
//                        'Relations' => 'topic/facebook/audience/relations',
//                    //'Maps' => 'topic/twitter/audience/maps',
//                    ),
//                    'Engagement' => array(
//                        'Engagement' => 'topic/facebook/engagement',
//                        'History' => 'topic/facebook/engagement/history',
//                    ),
//                    'Demography' => array(
//                        'Graph Analysis' => 'topic/facebook/demography/graph',
//                        'Maps Analysis' => 'topic/facebook/demography/maps',
//                    ),
//                    'Emotion' => array(
//                        'Graph Analysis' => 'topic/facebook/emotion/graph',
//                        'Demography Analysis' => 'topic/facebook/emotion/demography',
//                        'Text Analysis' => 'topic/facebook/emotion/text',
//                        'Maps Analysis' => 'topic/facebook/emotion/maps',
//                        'History' => 'topic/facebook/emotion/history',
//                        'Streaming' => 'topic/facebook/emotion/streaming'
//                    ),
//                    'Sentiments' => array(
//                        'Text Analysis' => 'topic/facebook/sentiments',
//                        'Demography Analys' => 'topic/facebook/sentiments/demography'
//                    ),
//                ),
        'forum_comments' => array(
            'Index' => 'topic/forum_comments/main',
            'Dashboard' => 'topic/forum_comments/dashboard',
            'Chronology' => array(
                'Timeline' => 'topic/forum_comments/chronology/timeline',
            ),
            'Issues' => array(
                'Cluster' => 'topic/forum_comments/issues/cluster',
                'Comparison' => 'topic/forum_comments/issues/comparison'
            ),
            'Audience' => array(
                'Statistic' => 'topic/forum_comments/audience/statistic',
            ),
            'Emotion' => array(
                'Graph Analysis' => 'topic/forum_comments/emotion/graph',
                'Text Analysis' => 'topic/forum_comments/emotion/text',
                'History' => 'topic/forum_comments/emotion/history'
            )
        ),
        'news_comments' => array(
            'Index' => 'topic/news_comments/main',
            'Dashboard' => 'topic/news_comments/dashboard',
            'Chronology' => array(
                'Timeline' => 'topic/news_comments/chronology/timeline',
            ),
            'Issues' => array(
                'Cluster' => 'topic/news_comments/issues/cluster',
                'Comparison' => 'topic/news_comments/issues/comparison'
            ),
            'Audience' => array(
                'Statistic' => 'topic/news_comments/audience/statistic',
            ),
            'Emotion' => array(
                'Graph Analysis' => 'topic/news_comments/emotion/graph',
                'Text Analysis' => 'topic/news_comments/emotion/text',
                'History' => 'topic/news_comments/emotion/history'
            )
        ),
    ),
    'Action' => array(
        'Compare_topic' => array(
            'twitter' => array(
                'Index' => 'action/compare_topic/main',
                'Dashboard' => array(
                    'Exposures' => 'action/compare_topic/twitter/dashboard/exposures',
                    'Hashtags' => 'action/compare_topic/twitter/dashboard/hashtags',
                ),
                'Demography' => array(
                    'Gender' => 'action/compare_topic/twitter/demography/gender',
                    'Age' => 'action/compare_topic/twitter/demography/age',
                    'Religion' => 'action/compare_topic/twitter/demography/religion',
                    'Location' => 'action/compare_topic/twitter/demography/location',
                    'Devices' => 'action/compare_topic/twitter/demography/devices',
                    'Account Status' => 'action/compare_topic/twitter/demography/account_status',
                ),
                'Emotion' => 'action/compare_topic/twitter/emotion',
                'Sentiments' => 'action/compare_topic/twitter/sentiments',
                'Streaming' => 'action/compare_topic/twitter/streaming'
            ),
            'forum_comments' => array(
                'Index' => 'action/compare_topic/main',
                'Dashboard' => array(
                    'Exposures' => 'action/compare_topic/forum_comments/dashboard/exposures',
                    'Hashtags' => 'action/compare_topic/forum_comments/dashboard/hashtags',
                ),
                'Emotion' => 'action/compare_topic/forum_comments/emotion',
            ),
            'news_comments' => array(
                'Index' => 'action/compare_topic/main',
                'Dashboard' => array(
                    'Exposures' => 'action/compare_topic/news_comments/dashboard/exposures',
                    'Hashtags' => 'action/compare_topic/news_comments/dashboard/hashtags',
                ),
                'Emotion' => 'action/compare_topic/news_comments/emotion',
            )
        ),
        'Compare_account' => array(
            'twitter' => array(
                'Index' => 'action/compare_account/main',
                'Dashboard' => array(
                    'Exposures' => 'action/compare_account/twitter/dashboard/exposures',
                    'Hashtags' => 'action/compare_account/twitter/dashboard/hashtags',
                ),
                'Demography' => array(
                    'Gender' => 'action/compare_account/twitter/demography/gender',
                    'Age' => 'action/compare_account/twitter/demography/age',
                    'Religion' => 'action/compare_account/twitter/demography/religion',
                    'Location' => 'action/compare_account/twitter/demography/location',
                    'Devices' => 'action/compare_account/twitter/demography/devices',
                ),
                'Emotion' => 'action/compare_account/twitter/emotion',
                'Sentiments' => 'action/compare_account/twitter/sentiments',
                'Streaming' => 'action/compare_account/twitter/streaming'
            )
        )
    )
);
