<?php
date_default_timezone_set('UTC');

$post_date_time = '2017-05-04 23:50:09';

$post_year = substr($post_date_time, 0, 4);

// echo substr(date("Y - M jS H:i:s", strtotime($post_date_time)), 0, 4);
echo substr(date("Y - M jS H:i:s", strtotime($post_date_time)), 7, 7);

if (substr(date("Y - M jS H:i:s", strtotime($post_date_time)), 7, 7) == 'May 4th') {
    echo "\nyaah";
}
