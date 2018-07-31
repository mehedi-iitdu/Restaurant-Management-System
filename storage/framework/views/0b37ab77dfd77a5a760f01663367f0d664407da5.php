<div class="widget-view">
    <div class="booking-form-wrapper">
        <div class="widget-header">
            <div class="back">
                <a class="back-button" onclick="backToBooking()">
                    <svg class="back-icon">
                        <path class="st0" d="M0.3,4.5L0.3,4.5L1,3.8l3.5-3.5c0.4-0.4,1-0.4,1.4,0c0.4,0.4,0.4,1,0,1.4L2.4,5.2L6,8.8c0.4,0.4,0.4,1,0,1.4
                c-0.4,0.4-1,0.4-1.4,0L1,6.7L0.3,6l0,0C0.1,5.8,0,5.5,0,5.2C0,5,0.1,4.7,0.3,4.5z"></path>
                    </svg>
                </a>
            </div>
            <div class="widget-title">Checkout</div>
            <div class="checkout-icon">
                <svg class="secure" width="20px" height="20px">
                    <polygon points="12.6,7.9 9.4,10.5 8.1,9.6 7.2,10.4 9.4,12.8 9.4,12.8 9.4,12.8 13.3,8.8 "></polygon>
                    <path d="M10,20c5.5,0,10-4.5,10-10c0-5.5-4.5-10-10-10C4.5,0,0,4.5,0,10S4.5,20,10,20z M4.5,6.8L10,4.5h0l5.5,2.3
            c0,0-0.4,8.7-5.5,8.7C4.9,15.5,4.5,6.8,4.5,6.8z"></path>
                </svg>
            </div>
        </div>
        <div class="widget-content scroll">
            <div class="widget-content-wrap">
                <div class="checkout-intro">
                    <h1>
                        Your reservation is for <span id="checkout-people"></span>, <br><span id="checkout-date"></span> at <span id="checkout-time"></span>
                    </h1>
                </div>
                <div class="checkout-summary">
                    <div class="extra-res-info">
                    </div>
                    <div class="checkout-total payment-summary">
                        <div class="redeem-row summary-row">
                            <input type="text" placeholder="Voucher code" class="">

                            <script type="text/javascript">
                                $(function () {
                                    $('.redeem-row a.button').addClass('disabled');

                                    //show it when the something is typed
                                    $('.redeem-row input:text').keyup(function(){
                                        if($(this).val() !== ''){
                                            $('.redeem-row a.button').removeClass('disabled');
                                        }else {
                                            $('.redeem-row a.button').addClass('disabled');
                                        }
                                    });
                                });
                            </script>

                            <a href="#" onclick="" class="button disabled">To apply</a>
                            <div class="voucher-validation">
                            </div>
                        </div>
                        <div class="refund-info">
                            <p>If you redeem a gift voucher, the amount will be deducted from your account</p>
                        </div>
                    </div>
                </div>
                <div class="checkout-step">
                    <div class="step-indicator"><span>1</span></div>
                    <div class="step-intro">
                        <p>Your contact details</p>
                        <p class="step-help">
                            You will receive a confirmation of your reservation by email.
                        </p>
                    </div>
                    <div class="billing clear">
                        <div class="reservation-gender">
                            <div>
                                <label for="gender_0">
                                    <span>Mr.</span>
                                </label>
                                <input type="radio" name="orderInfo_title" value="MALE" id="gender_0" required="true" class="">
                            </div>
                            <div>
                                <label for="gender_1">
                                    <span>Ms.</span>
                                </label>
                                <input type="radio" name="orderInfo_title" value="FEMALE" id="gender_1" required="true" class="">
                            </div>
                            <div>
                                <label for="gender_2">
                                    <span>Family</span>
                                </label>

                                <input type="radio" name="orderInfo_title" value="FAMILY" id="gender_2" required="true" class="">
                            </div>
                            <div>
                                <label for="company">
                                    <span>Company</span>
                                </label>
                                <input type="checkbox" id="company" class="" name="orderInfo_title" value="COMPANY">
                            </div>
                        </div>
                        <div class="billing-type-inputs">
                            <input name="orderInfo_company" type="text" class="full" required="" placeholder="Company">

                            <script type="text/javascript">
                                $(function () {
                                    $('input[name="orderInfo_company"]').hide();

                                    //show it when the checkbox is clicked
                                    $('input#company').on('click', function () {
                                        if ($(this).prop('checked')) {
                                            $('input[name="orderInfo_company"]').show();
                                        } else {
                                            $('input[name="orderInfo_company"]').hide();
                                        }
                                    });
                                });
                            </script>

                            <input name="orderInfo_firstName" class="billing-firstname" required="true" type="text" placeholder="First name">
                            <input name="orderInfo_lastName" class="billing-lastname" required="true" type="text" placeholder="Last name">
                            <input name="orderInfo_email" class="billing-email" required="true" type="email" placeholder="Email">
                            <input name="orderInfo_telephone" class="billing-tel" required="true" type="tel" placeholder="Phone number">
                            <textarea placeholder="Do you have important dietary requirements, allergies or other remarks?" class="full" name="orderInfo_note"></textarea>
                        </div>
                    </div>
                </div>
                <div class="checkout-signup">
                    <div class="checkbox-wrap">
                        <input class="checkbox" type="checkbox" name="terms" id="newsletter-checkbox">
                    </div>
                    <div>
                        <p><label for="newsletter-checkbox">Please subscribe me for the newsletter of the restaurant</label></p>
                        <p class="signup-sub"></p>
                    </div>
                </div>
                <div class="checkout-footer">
                    <div class="footer-button">
                        <a class="payment-button" onclick="checkout()">Book now</a>
                    </div>
                    <div class="checkout-disclaimer">
                        <p>By booking a table you agree to our <a href="">Terms &amp; Privacy</a>. A table is instantly reserved for you. You will receive a confirmation by email.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
