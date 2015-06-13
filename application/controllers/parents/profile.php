<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 1/9/15
 * Time: 5:37 PM
 */

require PARSE_SDK_INC;
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

class Profile extends CI_Controller{

    public function __construct(){

        parent::__construct();
        //TODO:  Add extra constructor Code
        session_start();
        if(!gf_isLoginParents()) redirect('/');

        $this->load->model('parsewrapper');
        $this->load->model('mcategory');
        $this->load->model('muser');

    }

    public function index(){

        //TODO:  called when method name is requested.

        $this->profile();
    }

    public function profile($data = array()) {

        $user_id = gf_cu_id();

        $userinfo = $this->muser->getUser($user_id);
        $data['userinfo'] = $userinfo;
        $data['arr_state'] = $this->mcategory->getCategoryList("State");

        if($userinfo->phoneNumber &&
            $userinfo->address1 &&
            $userinfo->city &&
            $userinfo->state &&
            $userinfo->zipCode) {

            $data['complete'] = true;

        } else {
            $data['complete'] = false;
        }

        $this->load->view('parents/profile/profile', $data);
    }

    public function update() {

        $user_id = gf_cu_id();

        $this->form_validation->set_rules('FirstName', 'First Name', 'required');
        $this->form_validation->set_rules('MiddleInitial', 'Middle Initial', 'trim');
        $this->form_validation->set_rules('LastName', 'Last Name', 'required');
        $this->form_validation->set_rules('PhoneNumber', 'Phone Number', 'required');
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

                $data['error'] = 'Failed to update profile!';
                $this->profile($data);
            }

        }

    }

    function updateAddress()
    {

        $user_id = gf_cu_id();
        $phoneNumber = $this->input->get('phoneNumber');
        $address1 = $this->input->get('address1');
        $address2 = $this->input->get('address2');
        $city = $this->input->get('city');
        $state = $this->input->get('state');
        $zipCode = $this->input->get('zipCode');

        if($this->muser->updateAddress(
            $user_id,
            $phoneNumber,
            $address1,
            $address2,
            $city,
            $state,
            $zipCode
        )) {

            $object = $this->muser->getUser($user_id);

            if($object)
                gf_registerCurrentUser($object);
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

}