<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 1/13/15
 * Time: 5:11 PM
 */

require MANDRILL_SDK_INC;

class Emailwrapper {

    private static $MANDRILL_KEY = '7W-450bbdB6ZxgHt7ll0oQ';//

    public function __construct(){

    }

    public function getApiKey()
    {
        return self::$MANDRILL_KEY;
    }

    public static function send($from_name, $from, $to, $subject, $contents, $cc, $bcc)
    {

        try {


            $emails_to = explode(',', $to);
            $emails_cc = explode(',', $cc);
            $emails_bcc = explode(',', $bcc);

            $to_arr = array();

            foreach($emails_to as $email) {

                if($email) {
                    $one = array('email' => $email, 'type' => 'to');
                    $to_arr[] = $one;
                }
            }
            foreach($emails_cc as $email) {

                if($email) {
                    $one = array('email' => $email, 'type' => 'cc');
                    $to_arr[] = $one;
                }
            }
            foreach($emails_bcc as $email) {

                if($email) {
                    $one = array('email' => $email, 'type' => 'bcc');
                    $to_arr[] = $one;
                }
            }

            $mandrill = new Mandrill(self::$MANDRILL_KEY);

            $message = array(
                'subject' => $subject,
                'from_email' => $from,
                'from_name' => $from_name,
                'html' => $contents,
                'to' => $to_arr
            );

            $result = $mandrill->messages->send($message);

            //print_r($result);

            //die();

        } catch(Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
            echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
            throw $e;

        }
    }

    public static function sendfromAdmin($subject, $msg, $to_email, $to_firstName, $to_lastName, $from_email, $from_name)
    {
        try {
            $mandrill = new Mandrill(self::$MANDRILL_KEY);
            //$result = $mandrill->users->info();
            //print_r($result);
            //die();

            $message = array(
                'subject' => $subject,
                'from_email' => $from_email,
                'from_name' => $from_name,
                'html' => $msg,
                'to' => array(array('email' => $to_email, 'name' => $to_firstName, 'type'=>'to')),
                'merge_vars' => array(array(
                    'rcpt' => $to_email,
                    'vars' =>
                        array(
                            array(
                                'name' => 'FIRSTNAME',
                                'content' => $to_firstName),
                            array(
                                'name' => 'LASTNAME',
                                'content' => $to_lastName)
                        ))));

            $result = $mandrill->messages->send($message);

            //print_r($result);

            //die();

        } catch(Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
            echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
            throw $e;

        }
    }

}