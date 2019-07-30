<?php
// Reservation data
$roomid     =   $_GET['roomid'];
$checkin    =   $_GET['checkin'];
$checkout   =   $_GET['checkout'];
$pax        =   $_GET['pax'];

// User data
$roomID     =   $_GET['roomid'];
$checkin    =   $_GET['checkin'];
$checkout   =   $_GET['checkout'];
$pax        =   $_GET['pax'];
$first_name =   $_GET['first_name'];
$last_name  =   $_GET['last_name'];
$email      =   $_GET['email_address'];
$phone      =   $_GET['phone'];
$address    =   $_GET['address'];
$city       =   $_GET['city'];
$country    =   $_GET['country'];
$sp_req     =   $_GET['special_request'];

$billing_active = 'false';
$b_fname    =   $_GET['first_name'];
$b_lname    =   $_GET['last_name'];
$b_email    =   $_GET['email_address'];
$b_phone    =   $_GET['phone'];
$b_address  =   $_GET['address'];
$b_city     =   $_GET['city'];
$b_country  =   $_GET['country'];

if ( isset( $_GET['billing_active'] ) ){
    $billing_active = 'true';
    $b_fname    =   $_GET['billing_first-name'];
    $b_lname    =   $_GET['billing_last-name'];
    $b_email    =   $_GET['billing_email-address'];
    $b_phone    =   $_GET['billing_phone'];
    $b_address  =   $_GET['billing_address'];
    $b_city     =   $_GET['billing_city'];
    $b_country  =   $_GET['billing_country'];
}

$date1 = new DateTime($checkin);
$date2 = new DateTime($checkout);
$nights= $date2->diff($date1)->format("%a");

$price = get_post_meta($roomid,'room_price',true);


$subtotal = $nights * $price * $pax * 1000 ;
$tax = 0;
$total_price = $subtotal + ($subtotal * $tax);

?>
<style>
    form.pp-form{
        min-width: 100%;
    }
    .pp-main-post{
        min-width: 100%;
        display: flex;
    }
    .pp-main-post *{
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;;
    }
    .pp-width-input{
        width: 100%;
        margin-bottom: 5px;
    }
    .dd-left-post{
        width: 70%;
    }
    .dd-right-post{
        width: 30%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .dd-left-post,
    .dd-right-post{
        padding: 1%;
    }
    .pp-booking-title{
        margin: 0;
        margin-bottom: 18px;
        padding: 0;
        font-size: 28px;
    }
    .pp-button{
        float: right;
    }
    .pp-align-right{
        text-align: right;
    }
    .pp-hidden{
        display: none;
    }
    .pp-reservation-details-table{
        font-size: 16px;
        color: gray;
    }
    .pp-reservation-details-table tr td{
        border: 0;
        padding: 0;
    }
    .pp-reservation-details-table .pp-td-head{
        font-weight: bold;
    }
    .pp-reservation-details-table tr td+td{
        text-align: right;
    }
    .pp-total-row{
        font-size: 24px;
        color: #1a1a1a;
    }
    .pp-payment-form label{
        display: block;
    }
    .pp-contact-info-list{
        list-style: none;
        margin: 0;
        padding: 0;
        margin-bottom: 18px;
    }
    .pp-contact-info-list li{
        font-size: 18px;
    }
</style>
<form role="form" action="<?php echo home_url('pp_thankyou')?>/" method="post" class="pp-form pp-payment-form">
    <input type="hidden" name="roomid" value="<?php echo $roomID ?>">
    <input type="hidden" name="checkin" value="<?php echo $checkin ?>">
    <input type="hidden" name="checkout" value="<?php echo $checkout ?>">
    <input type="hidden" name="pax" value="<?php echo $pax ?>">
    <input type="hidden" name="user_info_fname" value="<?php echo $first_name ?>">
    <input type="hidden" name="user_info_lname" value="<?php echo $last_name ?>">
    <input type="hidden" name="user_info_email" value="<?php echo $email ?>">
    <input type="hidden" name="user_info_phone" value="<?php echo $phone ?>">
    <input type="hidden" name="user_info_address" value="<?php echo $address ?>">
    <input type="hidden" name="user_info_city" value="<?php echo $city ?>">
    <input type="hidden" name="user_info_country" value="<?php echo $country ?>">
    <input type="hidden" name="user_info_specialrequest" value="<?php echo $sp_req ?>">
    <input type="hidden" name="billing_active" value="<?php echo $billing_active ?>">
    
    <input type="hidden" name="billing_info_fname" value="<?php echo $b_fname ?>">
    <input type="hidden" name="billing_info_lname" value="<?php echo $b_lname ?>">
    <input type="hidden" name="billing_info_email" value="<?php echo $b_email ?>">
    <input type="hidden" name="billing_info_phone" value="<?php echo $b_phone ?>">
    <input type="hidden" name="billing_info_address" value="<?php echo $b_address ?>">
    <input type="hidden" name="billing_info_city" value="<?php echo $b_city ?>">
    <input type="hidden" name="billing_info_country" value="<?php echo $b_country ?>">
    
    <div class="pp-main-post">
        <div class="dd-left-post">
            <h3 class="pp-booking-title">Contact Information</h3>
            <ul class="pp-contact-info-list">
                <li><strong><?php echo $first_name . ' ' . $last_name ?></strong></li>
                <li><?php echo $email ?></li>
                <li><?php echo $phone ?></li>
                <li><?php echo $address . ', ' . $city . ', ' . $country  ?></li>
            </ul>
            <h3 class="pp-booking-title">Billing Information</h3>
            <ul class="pp-contact-info-list">
                <li><strong><?php echo $b_fname . ' ' . $b_lname ?></strong></li>
                <li><?php echo $b_email ?></li>
                <li><?php echo $b_phone ?></li>
                <li><?php echo $b_address . ', ' . $b_city . ', ' . $b_country  ?></li>
            </ul>
            
            <h3 class="pp-booking-title">Select Payment Method</h3>
            <label for="arrival">
                <input type="radio" id="arrival" name="paymentmethods" value="arrival" required> Payment on Arrival
            </label>
            <label for="bank">
                <input type="radio" id="bank" name="paymentmethods" value="bank" required> Bank transfer
            </label>            
            <label for="creditcard">
                <input type="radio" id="creditcard" name="paymentmethods" value="creditcard" required> Credit Card
            </label>
            <label for="paypal">
                <input type="radio" id="paypal" name="paymentmethods" value="paypal" required> Pay Pal
            </label>         
            

            <div id="arrivalmethod" class="pp-payment-method pp-hidden">
                <p>If you want to make payment on arrival, you will be assigned a reservation and we will contact you as soon as possible.</p>
            </div>
            <div id="bankmethod" class="pp-payment-method pp-hidden">
                <p>Please make the deposit into the account:</p>
                <p>Bank: Santander<br>Account: 282XXXXXX828<br>Name: Playa Pikua</p>
                <p>For a value of Col<?php echo $total_price ?></p>
            </div>
            <div id="creditcardmethod" class="pp-payment-method pp-hidden">
                <div class="pp-flex-space-between pp-margin-items">
                    <strong>Card number </strong>
                    <input class="pp-width-input" type="text" name="card-number">
                </div>
                <div class="pp-flex-space-between pp-margin-items">
                    <strong>Name on card </strong>
                    <input class="pp-width-input" type="text" name="name-card">
                </div>
                <div class="pp-flex-space-between pp-margin-items">
                    <strong>Expiry date </strong>
                    <input class="pp-width-input" type="text" name="expiry-date">
                </div>
                <div class="pp-flex-space-between pp-margin-items">
                    <strong>Security code </strong>
                    <input class="pp-width-input" type="text" name="security-code">
                </div>
                <br>
            </div>
            <div id="paypalmethod" class="pp-payment-method pp-hidden">
                <p>Pay Pal - Comming soon</p>
            </div>
        </div>
        <div class="dd-right-post">
            <div class="dd-price">
                <h3 class="pp-booking-title">Order Summary</h3>
                <img src="<?php echo get_the_post_thumbnail_url($roomid,'medium')?>">
                <h3 class="pp-booking-title"><?php echo get_the_title( $roomid ); ?></h3>
                <table class="pp-reservation-details-table" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="pp-td-head">Check In</td>
                        <td><?php echo date('d-m-Y', strtotime($checkin) ) ?></td>
                    </tr>
                    <tr>
                        <td class="pp-td-head">Check Out</td>
                        <td><?php echo date('d-m-Y', strtotime( $checkout ) ) ?></td>
                    </tr>
                    <tr>
                        <td class="pp-td-head">Nights</td>
                        <td><?php echo $nights ?></td>
                    </tr>
                    <tr>
                        <td class="pp-td-head">Guests</td>
                        <td><?php echo $pax ?> Adults</td>
                    </tr>
                    <tr>
                        <td class="pp-td-head">Subtotal</td>
                        <td>COP <?php echo number_format( $subtotal, 2, '.', '' ) ?></td>
                    </tr>
                    <tr>
                        <td class="pp-td-head">Tax (<?php echo $tax ?>%)</td>
                        <td>COP <?php echo number_format( $subtotalTax, 2, '.', '' ) ?></td>
                    </tr>
                    <tr class="pp-total-row">
                        <td class="pp-td-head">Total COP</td>
                        <td class="pp-td-head"><?php echo number_format( $total_price, 2, '.', '' ) ?></td>
                    </tr>
                </table>
            </div>
            <button class="pp-button">Next</button>
        </div>
    </div>
</form>
