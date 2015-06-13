<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 1/13/15
 * Time: 5:11 PM
 */

require STRIPE_SDK_INC;

class Stripewrapper {

    private static $SECRET_API_KEY = 'sk_test_7DMqxJUZ8VhLTk8Dxn77exj8';//
    private static $PUBLIC_API_KEY = 'pk_test_Z82tAPHFPTp6TQ7muLN3gYlC';//

    public function __construct(){

        Stripe::setApiKey(self::$SECRET_API_KEY);
    }

    public function getPubicApiKey()
    {
        return self::$PUBLIC_API_KEY;
    }

    public static function createCoupon($id, $percent_off, $amount_off, $duration, $duration_in_months) {

        try {



            Stripe_Coupon::create(array(
                    "percent_off" => $percent_off,
                    "amount_off" => $amount_off,
                    "duration" => $duration,
                    "duration_in_months" => $duration_in_months,
                    "currency" => "usd",
                    "id" => $id)
            );

            return true;

        } catch(Exception $ex) {

            return false;
        }
    }

    public static function getCoupon($id) {


    }

    public static function deleteCoupon($id) {

        try {



            $cpn = Stripe_Coupon::retrieve($id);
            $cpn->delete();

            return true;

        } catch(Exception $ex) {

            return false;
        }
    }


    public static function createPlan($id, $name, $price) {

        try {



            Stripe_Plan::create(array(
                    "amount" => $price,
                    "interval" => "week",
                    "name" => $name,
                    "currency" => "usd",
                    "id" => $id)
            );

            return true;

        } catch(Exception $ex) {

            return false;
        }

    }


    public static function getPlan($id) {

        try {



            $plan = Stripe_Plan::retrieve($id);

            return $plan;

        } catch(Exception $ex) {

            return null;
        }

    }

    public static function deletePlan($id) {

        try {

            Stripe::setApiKey(self::$STRIPE_API_KEY);

            $plan = Stripe_Plan::retrieve($id);
            $plan->delete();

            return true;

        } catch(Exception $ex) {

            return false;
        }
    }


    public static function createCustomer($user_id, $email, $fullname) {

        try {



            $customer = Stripe_Customer::create(array(
                    "email" => $email,
                    "description" => $fullname.'-'.$user_id
                    )
            );

            return $customer->id;

        } catch(Exception $ex) {

            return null;

        }
    }

    public static function customer_addCard($customer_id, $card_id) {

        try {



            $customer = Stripe_Customer::retrieve($customer_id);
            $customer->card = $card_id;
            $customer->save();

            return true;

            /*
            foreach($customer->cards as $card) {

                if($card->id == $card_id) {
                    return true;
                }
            }
            */


        } catch(Exception $ex) {

            return false;

        }
    }

    public static function customer_addDiscount($customer_id, $discountCode) {

        try {



            $customer = Stripe_Customer::retrieve($customer_id);
            $customer->coupon = $discountCode;

            $customer->save();

            return true;

            /*
            foreach($customer->cards as $card) {

                if($card->id == $card_id) {
                    return true;
                }
            }
            */


        } catch(Exception $ex) {

            return false;

        }
    }

    public static function customer_addPayment($customer_id, $amount, $desc) {

        try {



            Stripe_Charge::create(array(
                "customer" => $customer_id,
                "amount" => $amount,
                "currency" => "usd",
                "description" => $desc
            ));

            return true;

        } catch(Exception $ex) {

            return false;

        }
    }

    public static function customer_addSubscription($customer_id, $plan_id) {

        try {



            $cutomer = Stripe_Customer::retrieve($customer_id);

            $cutomer->subscriptions->create(array("plan" => $plan_id));

            return true;

        } catch(Exception $ex) {

            return false;

        }
    }


}