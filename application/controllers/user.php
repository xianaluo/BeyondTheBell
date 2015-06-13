<?php
/**
 * Created by PhpStorm.
 * User: bok
 * Date: 9/21/14
 * Time: 9:19 PM
 */
require PARSE_SDK_INC;

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

class User extends CI_Controller{

    public function __construct(){

        parent::__construct();
        //TODO:  Add extra constructor Code
        session_start();
        if(!gf_isLogin()) redirect('/');

        $this->load->model('parsewrapper');
        $this->load->model('mcategory');
        $this->load->model('muser');
        $this->load->model('mchat');
        $this->load->model('mforgotpw');
        $this->load->library('emailwrapper');
        $this->load->library('session');

    }

    public function index(){
        //TODO:  called when method name is requested.
          $this->gotoUserlist();
    }
    public function gotoUserlist(){

        $userlist = $this->muser->getUserlist();
        foreach ($userlist as &$user) {
            $uMsg = $this->mchat->getMessagesUnread($user->user_id, gf_cu_id(), 1);
            if (count($uMsg)==0) $user->unreadMsg = "No new Messages";
            else $user->unreadMsg = $uMsg[0][2]; 
        }
        $data['userlist'] = $userlist;
        //$data['userlist'] = $this->muser->getUserlist();
//        $data['msglist'] = $this->mchat->getMessagesUnread();

        $this->load->view('user/userlist', $data);

    }

    public function gotoAddUser() {



        $arr_usertype = $this->mcategory->getCategoryList("UserType");
        $arr_state = $this->mcategory->getCategoryList("State");

        $data['arr_usertype'] = $arr_usertype;
        $data['arr_state'] = $arr_state;

        $this->load->view('user/adduser', $data);
    }

    public function gotoAddUserWithError($error) {



        $arr_usertype = $this->mcategory->getCategoryList("UserType");
        $arr_state = $this->mcategory->getCategoryList("State");

        $data['arr_usertype'] = $arr_usertype;
        $data['arr_state'] = $arr_state;
        $data['error'] = $error;

        $this->load->view('user/adduser', $data);
    }

    public function gotoEditUser() {



        $user_id = $_REQUEST['user_id'];

        $arr_usertype = $this->mcategory->getCategoryList("UserType");
        $arr_state = $this->mcategory->getCategoryList("State");
        $userinfo = $this->muser->getUser($user_id);

        $data['arr_usertype'] = $arr_usertype;
        $data['arr_state'] = $arr_state;
        $data['userinfo'] = $userinfo;
        
        if (isset($_GET['cat'])) {
            $this->mchat->setMarkRead($_GET['user_id'], gf_cu_id());
        }
        
        $this->load->view('user/edituser', $data);
    }

    public function gotoEditUserWithError($error) {



        $user_id = $_REQUEST['user_id'];

        $arr_usertype = $this->mcategory->getCategoryList("UserType");
        $arr_state = $this->mcategory->getCategoryList("State");
        $userinfo = $this->muser->getUser($user_id);

        $data['arr_usertype'] = $arr_usertype;
        $data['arr_state'] = $arr_state;
        $data['userinfo'] = $userinfo;
        $data['error'] = $error;
        
        if (isset($_GET['cat'])) {
            $this->mchat->setMarkRead(gf_cu_id());
        }

        $this->load->view('user/edituser', $data);
    }

    public function addUser() {


        if(!gf_cu_rightsAdd()) redirect('/error');


        $this->form_validation->set_rules('UserType', 'UserType', 'required');
        $this->form_validation->set_rules('FirstName', 'FirstName', 'required');
        $this->form_validation->set_rules('MiddleInitial', 'MiddleInitial', 'trim');
        $this->form_validation->set_rules('LastName', 'LastName', 'required');
        $this->form_validation->set_rules('EmailAddress', 'EmailAddress', 'required|valid_email');
        $this->form_validation->set_rules('PhoneNumber', 'PhoneNumber', 'required');
        $this->form_validation->set_rules('Address1', 'Address1', 'required');
        $this->form_validation->set_rules('Address2', 'Address2', 'trim');
        $this->form_validation->set_rules('City', 'City', 'required');
        $this->form_validation->set_rules('State', 'State', 'required');
        $this->form_validation->set_rules('ZipCode', 'ZipCode', 'required');
        $this->form_validation->set_rules('RightsView', 'RightsView', 'trim');
        $this->form_validation->set_rules('RightsAdd', 'RightsAdd', 'trim');
        $this->form_validation->set_rules('RightsDelete', 'RightsDelete', 'trim');
        $this->form_validation->set_rules('RightsEdit', 'RightsEdit', 'trim');
        $this->form_validation->set_rules('RightsSchoolAdd', 'RightsSchoolAdd', 'trim');
        $this->form_validation->set_rules('RightsSchoolEdit', 'RightsSchoolEdit', 'trim');
        $this->form_validation->set_rules('RightsSchoolView', 'RightsSchoolView', 'trim');
        $this->form_validation->set_rules('RightsSchoolDelete', 'RightsSchoolDelete', 'trim');
        $this->form_validation->set_rules('RightsActivityAdd', 'RightsActivityAdd', 'trim');
        $this->form_validation->set_rules('RightsActivityEdit', 'RightsActivityEdit', 'trim');
        $this->form_validation->set_rules('RightsActivityView', 'RightsActivityView', 'trim');
        $this->form_validation->set_rules('RightsActivityDelete', 'RightsActivityDelete', 'trim');
        $this->form_validation->set_rules('RightsDiscountAdd', 'RightsDiscountAdd', 'trim');
        $this->form_validation->set_rules('RightsDiscountEdit', 'RightsDiscountEdit', 'trim');
        $this->form_validation->set_rules('RightsDiscountView', 'RightsDiscountView', 'trim');
        $this->form_validation->set_rules('RightsDiscountDelete', 'RightsDiscountDelete', 'trim');
        $this->form_validation->set_rules('RightsMsgAdd', 'RightsMsgAdd', 'trim');
        $this->form_validation->set_rules('RightsMsgEdit', 'RightsMsgEdit', 'trim');
        $this->form_validation->set_rules('RightsMsgView', 'RightsMsgView', 'trim');
        $this->form_validation->set_rules('RightsMsgDelete', 'RightsMsgDelete', 'trim');
        $this->form_validation->set_rules('RightsStudentAdd', 'RightsStudentAdd', 'trim');
        $this->form_validation->set_rules('RightsStudentEdit', 'RightsStudentEdit', 'trim');
        $this->form_validation->set_rules('RightsStudentView', 'RightsStudentView', 'trim');
        $this->form_validation->set_rules('RightsStudentDelete', 'RightsStudentDelete', 'trim');
        $this->form_validation->set_rules('RightsAttendanceAdd', 'RightsAttendanceAdd', 'trim');
        $this->form_validation->set_rules('RightsAttendanceEdit', 'RightsAttendanceEdit', 'trim');
        $this->form_validation->set_rules('RightsAttendanceView', 'RightsAttendanceView', 'trim');
        $this->form_validation->set_rules('RightsAttendanceDelete', 'RightsAttendanceDelete', 'trim');
        $this->form_validation->set_rules('RightsReportsAdd', 'RightsReportsAdd', 'trim');
        $this->form_validation->set_rules('RightsReportsEdit', 'RightsReportsEdit', 'trim');
        $this->form_validation->set_rules('RightsReportsView', 'RightsReportsView', 'trim');
        $this->form_validation->set_rules('RightsReportsDelete', 'RightsReportsDelete', 'trim');
        $this->form_validation->set_rules('RightsDaily', 'RightsDaily', 'trim');
        $this->form_validation->set_rules('RightsChat', 'RightsChat', 'trim');

        if($this->form_validation->run() == FALSE) {

            $this->gotoAddUser();

        } else {

            $profile_picture = $_FILES['ProfilePicture'];
            $profilePictureName = $profile_picture['name'];

            $userType = $this->input->post('UserType');
            $firstName = $this->input->post('FirstName');
            $middleInitial = $this->input->post('MiddleInitial');
            $lastName = $this->input->post('LastName');
            $emailAddress = $this->input->post('EmailAddress');
            $phoneNumber = $this->input->post('PhoneNumber');
            $address1 = $this->input->post('Address1');
            $address2 = $this->input->post('Address2');
            $city = $this->input->post('City');
            $state = $this->input->post('State');
            $zipCode = $this->input->post('ZipCode');
            $rightsView = $this->input->post('RightsView');
            $rightsAdd = $this->input->post('RightsAdd');
            $rightsEdit = $this->input->post('RightsEdit');
            $rightsDelete = $this->input->post('RightsDelete');
            
            $rightsSchoolAdd = $this->input->post('RightsSchoolAdd');
            $rightsSchoolEdit = $this->input->post('RightsSchoolEdit');
            $rightsSchoolView = $this->input->post('RightsSchoolView');
            $rightsSchoolDelete = $this->input->post('RightsSchoolDelete');
            $rightsActivityAdd = $this->input->post('RightsActivityAdd');
            $rightsActivityEdit = $this->input->post('RightsActivityEdit');
            $rightsActivityView = $this->input->post('RightsActivityView');
            $rightsActivityDelete = $this->input->post('RightsActivityDelete');
            $rightsDiscountAdd = $this->input->post('RightsDiscountAdd');
            $rightsDiscountEdit = $this->input->post('RightsDiscountEdit');
            $rightsDiscountView = $this->input->post('RightsDiscountView');
            $rightsDiscountDelete = $this->input->post('RightsDiscountDelete');
            $rightsMsgAdd = $this->input->post('RightsMsgAdd');
            $rightsMsgEdit = $this->input->post('RightsMsgEdit');
            $rightsMsgView = $this->input->post('RightsMsgView');
            $rightsMsgDelete = $this->input->post('RightsMsgDelete');
            $rightsStudentAdd = $this->input->post('RightsStudentAdd');
            $rightsStudentEdit = $this->input->post('RightsStudentEdit');
            $rightsStudentView = $this->input->post('RightsStudentView');
            $rightsStudentDelete = $this->input->post('RightsStudentDelete');
            $rightsAttendanceAdd = $this->input->post('RightsAttendanceAdd');
            $rightsAttendanceEdit = $this->input->post('RightsAttendanceEdit');
            $rightsAttendanceView = $this->input->post('RightsAttendanceView');
            $rightsAttendanceDelete = $this->input->post('RightsAttendanceDelete');
            $rightsReportsAdd = $this->input->post('RightsReportsAdd');
            $rightsReportsEdit = $this->input->post('RightsReportsEdit');
            $rightsReportsView = $this->input->post('RightsReportsView');
            $rightsReportsDelete = $this->input->post('RightsReportsDelete');
            $rightsDaily = $this->input->post('RightsDaily');
            $rightsChat = $this->input->post('RightsChat');

            $username = $firstName;
            if($middleInitial) $username .= ' '.$middleInitial;
            $username .= ' '.$lastName;
            $password = $username;

            if($this->muser->findAccount($emailAddress)) {

                $this->gotoAddUserWithError('The email address already exists!');

            } else {



                $user_id = $this->muser->insertUser(
                    $username,
                    $password,
                    $userType,
                    $firstName,
                    $middleInitial,
                    $lastName,
                    $emailAddress,
                    $phoneNumber,
                    $address1,
                    $address2,
                    $city,
                    $state,
                    $zipCode,
                    $rightsView,
                    $rightsAdd,
                    $rightsEdit,
                    $rightsDelete,
                    $rightsSchoolAdd,
                    $rightsSchoolEdit,
                    $rightsSchoolView,
                    $rightsSchoolDelete,
                    $rightsActivityAdd,
                    $rightsActivityEdit,
                    $rightsActivityView,
                    $rightsActivityDelete,
                    $rightsDiscountAdd,
                    $rightsDiscountEdit,
                    $rightsDiscountView,
                    $rightsDiscountDelete,
                    $rightsMsgAdd,
                    $rightsMsgEdit,
                    $rightsMsgView,
                    $rightsMsgDelete,
                    $rightsStudentAdd,
                    $rightsStudentEdit,
                    $rightsStudentView,
                    $rightsStudentDelete,
                    $rightsAttendanceAdd,
                    $rightsAttendanceEdit,
                    $rightsAttendanceView,
                    $rightsAttendanceDelete,
                    $rightsReportsAdd,
                    $rightsReportsEdit,
                    $rightsReportsView,
                    $rightsReportsDelete,
                    $rightsDaily,
                    $rightsChat,
                    $profilePictureName
                );

                if($user_id) {

                    if($profile_picture['tmp_name']) {

                        $src_file = $profile_picture['tmp_name'];
                        $dst_file = gf_profile_picture_path() . $user_id.'_'.$profilePictureName;

                        $this->thumbImage($src_file, $dst_file, 300, 300);

                    }

                    $account_one = $this->muser->findAccount($emailAddress);

                    $forgotpw_id = $this->mforgotpw->create($emailAddress);

                    $this->_sendEmailToLive($account_one, $forgotpw_id);


                    $this->gotoUserlist();


                } else {

                    $this->gotoAddUserWithError('Failed to add!');
                }

            }

        }

    }

    function thumbImage($src_file, $dst_file, $width, $height)
    {
        // load an image
        $i = new Imagick($src_file);
        // get the current image dimensions
        $geo = $i->getImageGeometry();

        // crop the image
        if (($geo['width'] / $width) < ($geo['height'] / $height)) {
            $i->cropImage($geo['width'], floor($height * $geo['width'] / $width), 0, (($geo['height'] - ($height * $geo['width'] / $width)) / 2));
        } else {
            $i->cropImage(ceil($width * $geo['height'] / $height), $geo['height'], (($geo['width'] - ($width * $geo['height'] / $height)) / 2), 0);
        }
        // thumbnail the image
        $i->ThumbnailImage($width, $height, true);
        $i->writeImage($dst_file);
    }

    public function editUser() {

        if(!gf_cu_rightsEdit()) redirect('/error');


        $user_id = $_REQUEST['user_id'];

        $this->form_validation->set_rules('UserType', 'UserType', 'required');
        $this->form_validation->set_rules('FirstName', 'FirstName', 'required');
        $this->form_validation->set_rules('MiddleInitial', 'MiddleInitial', 'trim');
        $this->form_validation->set_rules('LastName', 'LastName', 'required');
        $this->form_validation->set_rules('EmailAddress', 'EmailAddress', 'required|valid_email');
        $this->form_validation->set_rules('PhoneNumber', 'PhoneNumber', 'required');
        $this->form_validation->set_rules('Address1', 'Address1', 'required');
        $this->form_validation->set_rules('Address2', 'Address2', 'trim');
        $this->form_validation->set_rules('City', 'City', 'required');
        $this->form_validation->set_rules('State', 'State', 'required');
        $this->form_validation->set_rules('ZipCode', 'ZipCode', 'required');
        $this->form_validation->set_rules('RightsView', 'RightsView', 'trim');
        $this->form_validation->set_rules('RightsAdd', 'RightsAdd', 'trim');
        $this->form_validation->set_rules('RightsDelete', 'RightsDelete', 'trim');
        $this->form_validation->set_rules('RightsEdit', 'RightsEdit', 'trim');
        $this->form_validation->set_rules('RightsSchoolAdd', 'RightsSchoolAdd', 'trim');
        $this->form_validation->set_rules('RightsSchoolEdit', 'RightsSchoolEdit', 'trim');
        $this->form_validation->set_rules('RightsSchoolView', 'RightsSchoolView', 'trim');
        $this->form_validation->set_rules('RightsSchoolDelete', 'RightsSchoolDelete', 'trim');
        $this->form_validation->set_rules('RightsActivityAdd', 'RightsActivityAdd', 'trim');
        $this->form_validation->set_rules('RightsActivityEdit', 'RightsActivityEdit', 'trim');
        $this->form_validation->set_rules('RightsActivityView', 'RightsActivityView', 'trim');
        $this->form_validation->set_rules('RightsActivityDelete', 'RightsActivityDelete', 'trim');
        $this->form_validation->set_rules('RightsDiscountAdd', 'RightsDiscountAdd', 'trim');
        $this->form_validation->set_rules('RightsDiscountEdit', 'RightsDiscountEdit', 'trim');
        $this->form_validation->set_rules('RightsDiscountView', 'RightsDiscountView', 'trim');
        $this->form_validation->set_rules('RightsDiscountDelete', 'RightsDiscountDelete', 'trim');
        $this->form_validation->set_rules('RightsMsgAdd', 'RightsMsgAdd', 'trim');
        $this->form_validation->set_rules('RightsMsgEdit', 'RightsMsgEdit', 'trim');
        $this->form_validation->set_rules('RightsMsgView', 'RightsMsgView', 'trim');
        $this->form_validation->set_rules('RightsMsgDelete', 'RightsMsgDelete', 'trim');
        $this->form_validation->set_rules('RightsStudentAdd', 'RightsStudentAdd', 'trim');
        $this->form_validation->set_rules('RightsStudentEdit', 'RightsStudentEdit', 'trim');
        $this->form_validation->set_rules('RightsStudentView', 'RightsStudentView', 'trim');
        $this->form_validation->set_rules('RightsStudentDelete', 'RightsStudentDelete', 'trim');
        $this->form_validation->set_rules('RightsAttendanceAdd', 'RightsAttendanceAdd', 'trim');
        $this->form_validation->set_rules('RightsAttendanceEdit', 'RightsAttendanceEdit', 'trim');
        $this->form_validation->set_rules('RightsAttendanceView', 'RightsAttendanceView', 'trim');
        $this->form_validation->set_rules('RightsAttendanceDelete', 'RightsAttendanceDelete', 'trim');
        $this->form_validation->set_rules('RightsReportsAdd', 'RightsReportsAdd', 'trim');
        $this->form_validation->set_rules('RightsReportsEdit', 'RightsReportsEdit', 'trim');
        $this->form_validation->set_rules('RightsReportsView', 'RightsReportsView', 'trim');
        $this->form_validation->set_rules('RightsReportsDelete', 'RightsReportsDelete', 'trim');
        $this->form_validation->set_rules('RightsDaily', 'RightsDaily', 'trim');
        $this->form_validation->set_rules('RightsChat', 'RightsChat', 'trim');


        if($this->form_validation->run() == FALSE) {

            $this->gotoEditUser();

        } else {

            $profile_picture = $_FILES['ProfilePicture'];
            $profilePictureName = $profile_picture['name'];

            $userType = $this->input->post('UserType');
            $firstName = $this->input->post('FirstName');
            $middleInitial = $this->input->post('MiddleInitial');
            $lastName = $this->input->post('LastName');
            $emailAddress = $this->input->post('EmailAddress');
            $phoneNumber = $this->input->post('PhoneNumber');
            $address1 = $this->input->post('Address1');
            $address2 = $this->input->post('Address2');
            $city = $this->input->post('City');
            $state = $this->input->post('State');
            $zipCode = $this->input->post('ZipCode');
            $rightsView = $this->input->post('RightsView');
            $rightsAdd = $this->input->post('RightsAdd');
            $rightsEdit = $this->input->post('RightsEdit');
            $rightsDelete = $this->input->post('RightsDelete');
            
            $rightsSchoolAdd = $this->input->post('RightsSchoolAdd');
            $rightsSchoolEdit = $this->input->post('RightsSchoolEdit');
            $rightsSchoolView = $this->input->post('RightsSchoolView');
            $rightsSchoolDelete = $this->input->post('RightsSchoolDelete');
            $rightsActivityAdd = $this->input->post('RightsActivityAdd');
            $rightsActivityEdit = $this->input->post('RightsActivityEdit');
            $rightsActivityView = $this->input->post('RightsActivityView');
            $rightsActivityDelete = $this->input->post('RightsActivityDelete');
            $rightsDiscountAdd = $this->input->post('RightsDiscountAdd');
            $rightsDiscountEdit = $this->input->post('RightsDiscountEdit');
            $rightsDiscountView = $this->input->post('RightsDiscountView');
            $rightsDiscountDelete = $this->input->post('RightsDiscountDelete');
            $rightsMsgAdd = $this->input->post('RightsMsgAdd');
            $rightsMsgEdit = $this->input->post('RightsMsgEdit');
            $rightsMsgView = $this->input->post('RightsMsgView');
            $rightsMsgDelete = $this->input->post('RightsMsgDelete');
            $rightsStudentAdd = $this->input->post('RightsStudentAdd');
            $rightsStudentEdit = $this->input->post('RightsStudentEdit');
            $rightsStudentView = $this->input->post('RightsStudentView');
            $rightsStudentDelete = $this->input->post('RightsStudentDelete');
            $rightsAttendanceAdd = $this->input->post('RightsAttendanceAdd');
            $rightsAttendanceEdit = $this->input->post('RightsAttendanceEdit');
            $rightsAttendanceView = $this->input->post('RightsAttendanceView');
            $rightsAttendanceDelete = $this->input->post('RightsAttendanceDelete');
            $rightsReportsAdd = $this->input->post('RightsReportsAdd');
            $rightsReportsEdit = $this->input->post('RightsReportsEdit');
            $rightsReportsView = $this->input->post('RightsReportsView');
            $rightsReportsDelete = $this->input->post('RightsReportsDelete');
            $rightsDaily = $this->input->post('RightsDaily');
            $rightsChat = $this->input->post('RightsChat');

            if($this->muser->checkToChangeEmail($user_id, $emailAddress)) {


                $username = $firstName;
                if($middleInitial) $username .= ' '.$middleInitial;
                $username .= ' '.$lastName;

                if($this->muser->editUser(
                    $user_id,
                    $username,
                    $userType,
                    $firstName,
                    $middleInitial,
                    $lastName,
                    $emailAddress,
                    $phoneNumber,
                    $address1,
                    $address2,
                    $city,
                    $state,
                    $zipCode,
                    $rightsView,
                    $rightsAdd,
                    $rightsEdit,
                    $rightsDelete,
                    $rightsSchoolAdd,
                    $rightsSchoolEdit,
                    $rightsSchoolView,
                    $rightsSchoolDelete,
                    $rightsActivityAdd,
                    $rightsActivityEdit,
                    $rightsActivityView,
                    $rightsActivityDelete,
                    $rightsDiscountAdd,
                    $rightsDiscountEdit,
                    $rightsDiscountView,
                    $rightsDiscountDelete,
                    $rightsMsgAdd,
                    $rightsMsgEdit,
                    $rightsMsgView,
                    $rightsMsgDelete,
                    $rightsStudentAdd,
                    $rightsStudentEdit,
                    $rightsStudentView,
                    $rightsStudentDelete,
                    $rightsAttendanceAdd,
                    $rightsAttendanceEdit,
                    $rightsAttendanceView,
                    $rightsAttendanceDelete,
                    $rightsReportsAdd,
                    $rightsReportsEdit,
                    $rightsReportsView,
                    $rightsReportsDelete,
                    $rightsDaily,
                    $rightsChat,
                    $profilePictureName
                )) {

                    if($profile_picture['tmp_name']) {

                        $src_file = $profile_picture['tmp_name'];
                        $dst_file = gf_profile_picture_path() . $user_id.'_'.$profilePictureName;

                        $this->thumbImage($src_file, $dst_file, 300, 300);

                    }


                    //update my session
                    if(gf_isCurrentUser($user_id)) {

                        $object = $this->muser->getUser($user_id);

                        if($object)
                            gf_registerCurrentUser($object);

                    }

                    $this->gotoUserlist();

                } else {

                    $this->gotoEditUserWithError('Failed to edit!');
                }

            } else {

                $this->gotoEditUserWithError('Could not change email address, The email address is already used!');

            }

        }

    }

    public function deleteUser()
    {

        if(!gf_cu_rightsDelete()) redirect('/error');


        $user_id = $_REQUEST['user_id'];

        $this->muser->deleteUser($user_id);

        $this->gotoUserlist();

    }

    public function profile()
    {
        $user_id = gf_cu_id();

        $arr_usertype = $this->mcategory->getCategoryList("UserType");
        $arr_state = $this->mcategory->getCategoryList("State");
        $userinfo = $this->muser->getUser($user_id);

        $data['arr_usertype'] = $arr_usertype;
        $data['arr_state'] = $arr_state;
        $data['userinfo'] = $userinfo;

        $this->load->view('user/profile', $data);

    }

    public function profileWithError($error)
    {
        $user_id = gf_cu_id();

        $arr_usertype = $this->mcategory->getCategoryList("UserType");
        $arr_state = $this->mcategory->getCategoryList("State");
        $userinfo = $this->muser->getUser($user_id);

        $data['arr_usertype'] = $arr_usertype;
        $data['arr_state'] = $arr_state;
        $data['userinfo'] = $userinfo;
        $data['error'] = $error;

        $this->load->view('user/profile', $data);

    }

    public function editProfile() {


        $user_id = gf_cu_id();

        $this->form_validation->set_rules('FirstName', 'FirstName', 'required');
        $this->form_validation->set_rules('MiddleInitial', 'MiddleInitial', 'trim');
        $this->form_validation->set_rules('LastName', 'LastName', 'required');
        $this->form_validation->set_rules('PhoneNumber', 'PhoneNumber', 'required');
        $this->form_validation->set_rules('Address1', 'Address1', 'required');
        $this->form_validation->set_rules('Address2', 'Address2', 'trim');
        $this->form_validation->set_rules('City', 'City', 'required');
        $this->form_validation->set_rules('State', 'State', 'required');
        $this->form_validation->set_rules('ZipCode', 'ZipCode', 'required');

        if($this->form_validation->run() == FALSE) {

            $this->profile();

        } else {

            $profile_picture = $_FILES['ProfilePicture'];
            $profilePictureName = $profile_picture['name'];

            $firstName = $this->input->post('FirstName');
            $middleInitial = $this->input->post('MiddleInitial');
            $lastName = $this->input->post('LastName');
            $phoneNumber = $this->input->post('PhoneNumber');
            $address1 = $this->input->post('Address1');
            $address2 = $this->input->post('Address2');
            $city = $this->input->post('City');
            $state = $this->input->post('State');
            $zipCode = $this->input->post('ZipCode');

            if($this->muser->editProfile(
                $user_id,
                $firstName,
                $middleInitial,
                $lastName,
                $phoneNumber,
                $address1,
                $address2,
                $city,
                $state,
                $zipCode,
                $profilePictureName
            )) {

                if($profile_picture['tmp_name']) {

                    $src_file = $profile_picture['tmp_name'];
                    $dst_file = gf_profile_picture_path() . $user_id.'_'.$profilePictureName;

                    $this->thumbImage($src_file, $dst_file, 300, 300);

                }

                $object = $this->muser->getUser($user_id);

                if($object)
                    gf_registerCurrentUser($object);


                $this->profile();

            } else {

                $this->profileWithError('Failed to update profile!');
            }

        }

    }


    public function _sendEmailToLive($userinfo, $forgotpw_id)
    {
        // subject
        $subject = 'Activate your account';

        $linkurl = $this->config->base_url().'auth/setUpAccount?newAccount='.$forgotpw_id;

        // message
        $msg = '
            <html>
            <head>
              <title>Activate your account</title>
            </head>
            <body>
                <p>Hey, '.$userinfo->firstName.'</p>
                <p>We have created your account. Please click on the link below to activate your account!</p>
                <p>Click here:</p>
                <p><a href="'.$linkurl.'">'.$linkurl.'</a></p>
                <p>Thanks.</p>
                <p>Beyond the bell.</p>
            </body>
            </html>
        ';

        $to_email  = $userinfo->emailAddress;
        $to_firstName = $userinfo->firstName;
        $to_lastName = $userinfo->lastName;
        $from_email = 'keyseen@outlook.com';
        $from_name = 'Beyond the bell';

        $this->emailwrapper->sendfromAdmin(
            $subject,
            $msg,
            $to_email,
            $to_firstName,
            $to_lastName,
            $from_email,
            $from_name);

    }

}