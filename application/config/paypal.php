<?php
/** set your paypal credential **/

$config['client_id'] = 'AT2Z3qTvRdAI3Ue0vWOEl8feu4p5RRTj_LDIRVU2pUwt79bhiDhlxWBZfJDUIBVU6-AlZ7YFDDu59d6a';
$config['secret'] = 'EBZbvNf_SAaUdOvBR-sE3xoUjvx52itjti1LtIuvvwVavChfPbNBNHR-vhzJcQjc-zf9GBTd4bshL3Ab';

/**
 * SDK configuration
 */
/**
 * Available option 'sandbox' or 'live'
 */
$config['settings'] = array(

    'mode' => 'sandbox',
    /**
     * Specify the max request time in seconds
     */
    'http.ConnectionTimeOut' => 1000,
    /**
     * Whether want to log to a file
     */
    'log.LogEnabled' => true,
    /**
     * Specify the file that want to write on
     */
    'log.FileName' => 'application/logs/paypal.log',
    /**
     * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
     *
     * Logging is most verbose in the 'FINE' level and decreases as you
     * proceed towards ERROR
     */
    'log.LogLevel' => 'FINE'
);
