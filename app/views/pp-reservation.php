<?php 
$roomid=$_GET['roomid'];
$checkin=$_GET['checkin'];
$checkout=$_GET['checkout'];
$pax=$_GET['pax'];


$date1 = new DateTime($checkin);
$date2 = new DateTime($checkout);
$nights= $date2->diff($date1)->format("%a");

$price = get_post_meta($roomid,'room_price',true);
$price = floatval( str_replace(',','', $price) );
$price = number_format( $price, 2, '.', '' );


$subtotal = $nights * $price * $pax;
$tax = 12;
$subtotalTax = ($subtotal * $tax) / 100; 
$total_price = $subtotal + $subtotalTax;

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
</style>
<form role="form" action="<?php echo home_url('pp_checkout')?>/" method="get" class="pp-form pp-reservation-form">
    <div class="pp-main-post">
        <div class="dd-left-post">
            <h3 class="pp-booking-title">Guest Details</h3>
            <input type="hidden" value="<?php echo $roomid ?>" name="roomid" >
            <input type="hidden" value="<?php echo $checkin ?>" name="checkin" >
            <input type="hidden" value="<?php echo $checkout ?>" name="checkout" >
            <input type="hidden" value="<?php echo $pax ?>" name="pax" >
            <input class="pp-width-input" type="text" name="first_name" placeholder="First Name" required>
            <input class="pp-width-input" type="text" name="last_name" placeholder="Last Name" required>
            <input class="pp-width-input" type="text" name="email_address" placeholder="Email Address" required>
            <input class="pp-width-input" type="text" name="phone" placeholder="Phone Number" required>
            <input class="pp-width-input" type="text" name="address" placeholder="Address" required>
            <input class="pp-width-input" type="text" name="city" placeholder="City" required>
            <input class="pp-width-input" type="text" name="country" placeholder="Country" required>
            <textarea class="pp-width-input" rows="5" type="text" name="special_request" placeholder="Special request"></textarea>
            <p><?php _e('This information will be used as your billing information. If you need to change this please check the box below and fill up the fields.', 'pp') ?></p>
            <label><input type="checkbox" id="test" value="supress" name="billing_active"> Use different info for billing</label>

            <div id="pp-billing-details" class="pp-hidden">	
                <h3 class="pp-booking-title">Billing Details</h3>
                <input class="pp-width-input" type="text" name="billing_first-name" placeholder="First Name">
                <input class="pp-width-input" type="text" name="billing_last-name" placeholder="Last Name">
                <input class="pp-width-input" type="text" name="billing_email-address" placeholder="Email Address">
                <input class="pp-width-input" type="text" name="billing_phone" placeholder="Phone Number">
                <input class="pp-width-input" type="text" name="billing_address" placeholder="Address">
                <input class="pp-width-input" type="text" name="billing_city" placeholder="City">
                <input class="pp-width-input" type="text" name="billing_country" placeholder="Country">
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