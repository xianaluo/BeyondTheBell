<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 1/10/15
 * Time: 4:17 PM
 */

function gf_isLogin()
{

    // get the superobject
    $CI =& get_instance();

    $cu_userType = $CI->session->userdata('cu_userType');

    if($cu_userType == "Sysadmin" ||
        $cu_userType == "Staff" ||
        $cu_userType == "Teacher") {
        return true;
    } else {
        return false;
    }
}

function gf_isAction()
{
    // get the superobject
    $CI =& get_instance();

    $cu_userType = $CI->session->userdata('cu_userType');

    if($cu_userType == "Sysadmin" ||
        $cu_userType == "Staff") {
        return true;
    } else {
        return false;
    }
}

function gf_isAdmin()
{
    // get the superobject
    $CI =& get_instance();

    $cu_userType = $CI->session->userdata('cu_userType');

    if($cu_userType == "Sysadmin") {
        return true;
    } else {
        return false;
    }
}

function gf_isLoginParents()
{

    // get the superobject
    $CI =& get_instance();

    $cu_userType = $CI->session->userdata('cu_userType');

    if($cu_userType == "Parent") {
        return true;
    } else {
        return false;
    }
}
    
function gf_registerCurrentUser($userObject)
{
    // get the superobject
    $CI =& get_instance();

    $arr = array(
        'logged_in' => true,
        'logged_in_time' => time(),
        'cu_id' => $userObject->user_id,
        'cu_email' => $userObject->emailAddress,
        'cu_firstName' => $userObject->firstName,
        'cu_middleInitial' => $userObject->middleInitial,
        'cu_lastName' => $userObject->lastName,
        'cu_userType' => $userObject->userType,
        'cu_profilePicture' => $userObject->profilePicture,
        'cu_phoneNumber' => $userObject->phoneNumber,
        'cu_address1' => $userObject->address1,
        'cu_address2' => $userObject->address2,
        'cu_city' => $userObject->city,
        'cu_state' => $userObject->state,
        'cu_zipCode' => $userObject->zipCode,
        'cu_rightsView' => $userObject->rightsView,
        'cu_rightsAdd' => $userObject->rightsAdd,
        'cu_rightsEdit' => $userObject->rightsEdit,
        'cu_rightsDelete' => $userObject->rightsDelete,
        'cu_rightsSchoolAdd' => $userObject->rightsSchoolAdd,
        'cu_rightsSchoolEdit' => $userObject->rightsSchoolEdit,
        'cu_rightsSchoolView' => $userObject->rightsSchoolView,
        'cu_rightsSchoolDelete' => $userObject->rightsSchoolDelete,
        'cu_rightsActivityAdd' => $userObject->rightsActivityAdd,
        'cu_rightsActivityEdit' => $userObject->rightsActivityEdit,
        'cu_rightsActivityView' => $userObject->rightsActivityView,
        'cu_rightsActivityDelete' => $userObject->rightsActivityDelete,
        'cu_rightsDiscountAdd' => $userObject->rightsDiscountAdd,
        'cu_rightsDiscountEdit' => $userObject->rightsDiscountEdit,
        'cu_rightsDiscountView' => $userObject->rightsDiscountView,
        'cu_rightsDiscountDelete' => $userObject->rightsDiscountDelete,
        'cu_rightsMsgAdd' => $userObject->rightsMsgAdd,
        'cu_rightsMsgEdit' => $userObject->rightsMsgEdit,
        'cu_rightsMsgView' => $userObject->rightsMsgView,
        'cu_rightsMsgDelete' => $userObject->rightsMsgDelete,
        'cu_rightsStudentAdd' => $userObject->rightsStudentAdd,
        'cu_rightsStudentEdit' => $userObject->rightsStudentEdit,
        'cu_rightsStudentView' => $userObject->rightsStudentView,
        'cu_rightsStudentDelete' => $userObject->rightsStudentDelete,
        'cu_rightsAttendanceAdd' => $userObject->rightsAttendanceAdd,
        'cu_rightsAttendanceEdit' => $userObject->rightsAttendanceEdit,
        'cu_rightsAttendanceView' => $userObject->rightsAttendanceView,
        'cu_rightsAttendanceDelete' => $userObject->rightsAttendanceDelete,
        'cu_rightsReportsAdd' => $userObject->rightsReportsAdd,
        'cu_rightsReportsEdit' => $userObject->rightsReportsEdit,
        'cu_rightsReportsView' => $userObject->rightsReportsView,
        'cu_rightsReportsDelete' => $userObject->rightsReportsDelete,
        'cu_rightsDaily' => $userObject->rightsDaily,
        'cu_rightsChat' => $userObject->rightsChat
    );                                              
    $CI->session->set_userdata($arr);
}

function gf_unregisterCurrentUser()
{
    $CI =& get_instance();

    $arr = array(
        'logged_in' => '',
        'logged_in_time' => '',
        'cu_id' => '',
        'cu_email' => '',
        'cu_firstName' => '',
        'cu_middleInitial' => '',
        'cu_lastName' => '',
        'cu_userType' => '',
        'cu_profilePicture' => '',
        'cu_phoneNumber' => '',
        'cu_address1' => '',
        'cu_address2' => '',
        'cu_city' => '',
        'cu_state' => '',
        'cu_zipCode' => '',
        'cu_rightsView' => '',
        'cu_rightsAdd' => '',
        'cu_rightsEdit' => '',
        'cu_rightsDelete' => '',
        'cu_rightsSchoolAdd' => '',
        'cu_rightsSchoolEdit' => '',
        'cu_rightsSchoolView' => '',
        'cu_rightsSchoolDelete' => '',
        'cu_rightsActivityAdd' => '',
        'cu_rightsActivityEdit' => '',
        'cu_rightsActivityView' => '',
        'cu_rightsActivityDelete' => '',
        'cu_rightsDiscountAdd' => '',
        'cu_rightsDiscountEdit' => '',
        'cu_rightsDiscountView' => '',
        'cu_rightsDiscountDelete' => '',
        'cu_rightsMsgAdd' => '',
        'cu_rightsMsgEdit' => '',
        'cu_rightsMsgView' => '',
        'cu_rightsMsgDelete' => '',
        'cu_rightsStudentAdd' => '',
        'cu_rightsStudentEdit' => '',
        'cu_rightsStudentView' => '',
        'cu_rightsStudentDelete' => '',
        'cu_rightsAttendanceAdd' => '',
        'cu_rightsAttendanceEdit' => '',
        'cu_rightsAttendanceView' => '',
        'cu_rightsAttendanceDelete' => '',
        'cu_rightsReportsAdd' => '',
        'cu_rightsReportsEdit' => '',
        'cu_rightsReportsView' => '',
        'cu_rightsReportsDelete' => '',
        'cu_rightsDaily' => '',
        'cu_rightsChat' => ''
    );

    $CI->session->unset_userdata($arr);
}

function gf_isCurrentUser($user_id)
{

    $CI =& get_instance();

    $cu_id = $CI->session->userdata('cu_id');

    if($cu_id == $user_id)
        return true;
    else
        return false;
}

function gf_cu_id()
{

    $CI =& get_instance();

    $cu_id = $CI->session->userdata('cu_id');

    return $cu_id;
}

function gf_cu_email()
{

    $CI =& get_instance();

    $cu_email = $CI->session->userdata('cu_email');

    return $cu_email;
}

function gf_cu_firstName()
{

    $CI =& get_instance();

    $firstName = $CI->session->userdata('cu_firstName');

    return $firstName;
}


function gf_cu_fullName()
{
    $CI =& get_instance();

    $first = $CI->session->userdata('cu_firstName');
    $middle = $CI->session->userdata('cu_middleInitial');
    $last = $CI->session->userdata('cu_lastName');

    $fullName = $first;
    if($middle)
        $fullName .= ' '.$middle;
    $fullName .= ' '.$last;

    return $fullName;
}

function gf_cu_phoneNumber()
{
    $CI =& get_instance();

    return $CI->session->userdata('cu_phoneNumber');
}

function gf_cu_address1()
{
    $CI =& get_instance();

    return $CI->session->userdata('cu_address1');
}

function gf_cu_address2()
{
    $CI =& get_instance();

    return $CI->session->userdata('cu_address2');
}

function gf_cu_city()
{
    $CI =& get_instance();

    return $CI->session->userdata('cu_city');
}

function gf_cu_state()
{
    $CI =& get_instance();

    return $CI->session->userdata('cu_state');
}

function gf_cu_zipCode()
{
    $CI =& get_instance();

    return $CI->session->userdata('cu_zipCode');
}


function gf_cu_rightsView()
{
    $CI =& get_instance();

    return $CI->session->userdata('cu_rightsView');
}

function gf_cu_rightsAdd()
{
    $CI =& get_instance();

    return $CI->session->userdata('cu_rightsAdd');
}

function gf_cu_rightsEdit()
{
    $CI =& get_instance();

    return $CI->session->userdata('cu_rightsEdit');
}

function gf_cu_rightsDelete()
{
    $CI =& get_instance();

    return $CI->session->userdata('cu_rightsDelete');
}

function gf_cu_logged_in_time()
{
    $CI =& get_instance();

    $time = $CI->session->userdata('logged_in_time');

    return $time;
}

function gf_profile_picture()
{
    $CI =& get_instance();

    $user_id = $CI->session->userdata('cu_id');
    $profilePicture = $CI->session->userdata('cu_profilePicture');

    $profile_url = '/images/users/'.$user_id.'_'.$profilePicture;
    $real_path = $_SERVER['DOCUMENT_ROOT'].$profile_url;

    if(file_exists($real_path)) {
        return $profile_url;
    } else {
        return '/images/users/default';
    }
}

function gf_profile_picture2($user_id, $profilePicture)
{

    $profile_url = '/images/users/'.$user_id.'_'.$profilePicture;
    $real_path = $_SERVER['DOCUMENT_ROOT'].$profile_url;

    if(file_exists($real_path)) {
        return $profile_url;
    } else {
        return '/images/users/default';
    }
}

//function gf_unreadMsg() {
//    $CI =& get_instance();

//    $user_msg = $CI->session->userdata('cu_unreadMsg');
    //$profilePicture = $CI->session->userdata('cu_profilePicture');

//    $profile_url = '/images/users/'.$user_id.'_'.$profilePicture;
//    $real_path = $_SERVER['DOCUMENT_ROOT'].$profile_url;

//    if(file_exists($real_path)) {
//        return $user_msg;
    //} else {
//        return '/images/users/default';
//    }
//}
                                                               
function gf_cu_msg(){$CI =& get_instance(); return $CI->session->userdata('sysMsg');}
function gf_cu_msg_link(){$CI =& get_instance(); return $CI->session->userdata('sysMsgLink');}
function gf_cu_msg_act_link(){$CI =& get_instance(); return $CI->session->userdata('sysMsgLink')=='/'?$CI->session->userdata('sysMsgOther'):$CI->session->userdata('sysMsgLink');}
function gf_cu_msg_cat(){$CI =& get_instance(); return $CI->session->userdata('sysMsgCat');}
function gf_cu_msg_other(){$CI =& get_instance(); return $CI->session->userdata('sysMsgOther');}
function gf_cu_rightsSchoolAdd(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsSchoolAdd');}
function gf_cu_rightsSchoolEdit(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsSchoolEdit');}
function gf_cu_rightsSchoolView(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsSchoolView');}
function gf_cu_rightsSchoolDelete(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsSchoolDelete');}
function gf_cu_rightsActivityAdd(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsActivityAdd');}
function gf_cu_rightsActivityEdit(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsActivityEdit');}
function gf_cu_rightsActivityView(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsActivityView');}
function gf_cu_rightsActivityDelete(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsActivityDelete');}
function gf_cu_rightsDiscountAdd(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsDiscountAdd');}
function gf_cu_rightsDiscountEdit(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsDiscountEdit');}
function gf_cu_rightsDiscountView(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsDiscountView');}
function gf_cu_rightsDiscountDelete(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsDiscountDelete');}
function gf_cu_rightsMsgAdd(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsMsgAdd');}
function gf_cu_rightsMsgEdit(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsMsgEdit');}
function gf_cu_rightsMsgView(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsMsgView');}
function gf_cu_rightsMsgDelete(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsMsgDelete');}
function gf_cu_rightsStudentAdd(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsStudentAdd');}
function gf_cu_rightsStudentEdit(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsStudentEdit');}
function gf_cu_rightsStudentView(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsStudentView');}
function gf_cu_rightsStudentDelete(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsStudentDelete');}
function gf_cu_rightsAttendanceAdd(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsAttendanceAdd');}
function gf_cu_rightsAttendanceEdit(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsAttendanceEdit');}
function gf_cu_rightsAttendanceView(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsAttendanceView');}
function gf_cu_rightsAttendanceDelete(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsAttendanceDelete');}
function gf_cu_rightsReportsAdd(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsReportsAdd');}
function gf_cu_rightsReportsEdit(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsReportsEdit');}
function gf_cu_rightsReportsView(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsReportsView');}
function gf_cu_rightsReportsDelete(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsReportsDelete');}
function gf_cu_rightsDaily(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsDaily');}
function gf_cu_rightsChat(){$CI =& get_instance(); return $CI->session->userdata('cu_rightsChat');}