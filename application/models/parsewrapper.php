<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 1/9/15
 * Time: 6:40 PM
 */

require PARSE_SDK_INC;

use Parse\ParseClient;
use Parse\ParseSessionStorage;
use Parse\ParseUser;
use Parse\ParseException;
use Parse\ParseObject;
use Parse\ParseQuery;

class Parsewrapper extends CI_Model  {

    private static $app_id     =   '51vQg70Im4u8hpbqcyZ2wXAnR2JSnbbjOKsVudhO';
    private static $rest_key   =   'lu2PKRACCaUFCw6xWoQv51CfKwQ6COiQ1GJZuOhO';
    private static $master_key =   'GQsHsfjyw7pO0M3bkJ1kkaj2qiL4qSSEU2ppPtYu';

    public function __construct()
    {
        parent::__construct();
        ParseClient::initialize(self::$app_id, self::$rest_key, self::$master_key);
        ParseClient::setStorage( new ParseSessionStorage() );
    }

}
