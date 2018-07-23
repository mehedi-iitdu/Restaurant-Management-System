<div class="widget-view">
	<div class="booking-form-wrapper">
		<div class="widget-header">
            <div class="back">
                <a class="back-button" onclick="backToAllVouchers()">
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
					<h1>Easy to give. Fun to receive.</h1>
				</div>

				<div class="voucher-preview">
                    <div class="voucher">
                        <div class="voucher-visual" style="background:url('https://ftstorageprod.blob.core.windows.net/images/ticket/9d7144c6/191f509b-e2d0-4f77-a0b0-17d56ee60687')">
                        </div>
                        <div class="voucher-footer">
                            <div class="restaurant-name">The French Connection</div>
                            <div class="voucher-code">
                                <span>XXXXXXXX</span>
                            </div>
                        </div>
                    </div>
                    <div class="voucher-title">
                        <h3>4 course dinner all-in</h3>
                        <p>This package includes 4 matching wines, water and coffee or tea. For the Gift vouchers our chef curated an extra festive menu with amuse bouches following a 4-course festive surprise menu.</p>
                    </div>
                    <div class="voucher-info">
                        <div class="voucher-info-row select-people">
                            <div>People:</div>
                            <div class="select-quantity-wrap">
                                <a onclick="changeQuantity('minus')">-</a>
                                <div class="quantity-value">
                                    <input type="number" min="1" max="4" class="" value="2">
                                </div>
                                <a onclick="changeQuantity('plus')">+</a>
                            </div>
                            <div class="quantity-total">
                                <span class="currency">€</span>78
                            </div>
                        </div>
                        <div class="voucher-info-row">
                            <div>Expiration date </div>
                            <div>
                                <strong>June 24th, 2019</strong>
                            </div>
                        </div>
                    </div>
                </div>

				<div class="checkout-step">
                    <div class="step-indicator"><span>1</span></div>
                    <div class="step-intro">
                        <p>Your contact details</p>
                        <p class="step-help">You will receive a confirmation of your reservation by email.</p>
                    </div>
                    <div class="billing clear">
                        <div class="reservation-gender">
                            <div>
                                <label for="gender_0">
                                    <span>Mr.</span>
                                </label>
                                <input type="radio" name="orderInfo.title" value="MALE" id="gender_0" required="" class="">
                            </div>
                            <div>
                                <label for="gender_1">
                                    <span>Ms.</span>
                                </label>
                                <input type="radio" name="orderInfo.title" value="FEMALE" id="gender_1" required="" class="">
                            </div>
                            <div>
                                <label for="gender_2">
                                    <span>Family</span>
                                </label>
                                <input type="radio" name="orderInfo.title" value="FAMILY" id="gender_2" required="" class="">
                            </div>
                            <div>
                                <label for="company">
                                    <span>Company</span>
                                </label>
                                <input type="checkbox" id="company" class="">
                            </div>
                        </div>
                        <div class="billing-type-inputs">
							<input name="orderInfo.company" type="text" class="full" required="" placeholder="Company">

							<script type="text/javascript">
								$(function () {
								    $('input[name="orderInfo.company"]').hide();

								    //show it when the checkbox is clicked
								    $('input#company').on('click', function () {
								        if ($(this).prop('checked')) {
								            $('input[name="orderInfo.company"]').show();
								        } else {
								            $('input[name="orderInfo.company"]').hide();
								        }
								    });
								});
							</script>

                            <input name="orderInfo.firstName" class="billing-firstname" required="" type="text" placeholder="First name">
                            <input name="orderInfo.lastName" class="billing-lastname" required="" type="text" placeholder="Last name">
                            <input name="orderInfo.email" class="billing-email" required="" type="email" placeholder="Email">
                            <input name="orderInfo.telephone" class="billing-tel" required="" type="tel" placeholder="Phone number">
                        </div>
                    </div>
                </div>
				<div class="checkout-step order-receiver">
                    <div class="step-indicator"><span> 2</span></div>
                    <div class="step-intro">
                        <p>Send to a friend?</p>
                        <p class="step-help">Add a personal message and send on a time you choose.</p>
                    </div>
                    <div class="checkbox-option">
                        <div class="checkbox-wrap">
                            <input type="checkbox" class="checkbox" id="sendToFriend">
                        </div>
                        <label for="sendToFriend">Yes, send a nice gift mail to a friend</label>
                    </div>
					<script type="text/javascript">
						$(function () {
							$('#sendToFriendForm').hide();

							//show it when the checkbox is clicked
							$('input#sendToFriend').on('click', function () {
								if ($(this).prop('checked')) {
									$('#sendToFriendForm').show();
									$('input#sendAt').parent().parent().removeClass('disabled');
								} else {
									$('#sendToFriendForm').hide();
									$('input#sendAt').parent().parent().addClass('disabled');
								}
							});
						});
					</script>
					<div class="billing clear" id="sendToFriendForm">
                        <div class="reservation-gender">
                            <div>
                                <label for="gender_0b">
                                    <span>Mr.</span>
                                </label>
                                <input type="radio" name="voucherInfo.title" required="" value="MALE" id="gender_0b">
                            </div>
                            <div>
                                <label for="gender_1b">
                                    <span>Ms.</span>
                                </label>
                                <input type="radio" name="voucherInfo.title" required="" value="FEMALE" id="gender_1b">
                            </div>
                            <div>
                                <label for="gender_2b">
                                    <span>Family</span>
                                </label>
                                <input type="radio" name="voucherInfo.title" required="" value="FAMILY" id="gender_2b">
                            </div>

                        </div>
                        <div class="billing-type-inputs">
                            <input name="voucherInfo.firstName" required="" type="text" placeholder="First name" class="">
                            <input name="voucherInfo.lastName" required="" type="text" placeholder="Last name" class="">
                            <input class="full" name="voucherInfo.email" required="" type="email" placeholder="Email">
                            <textarea class="full" placeholder="Write a personal message. Congratulate, for example, your friend on the occasion and describe what makes The French Connection a nice restaurant."></textarea>
                        </div>
                    </div>

                    <div class="checkbox-option disabled">
                        <div class="checkbox-wrap">
                            <input type="checkbox" id="sendAt" class="checkbox">
                        </div>
                        <label for="sendAt">Send giftcard on another time</label>
                    </div>
					<script type="text/javascript">
						$(function () {
							$('#sendAtForm').hide();

							//show it when the checkbox is clicked
							$('input#sendAt').on('click', function () {
								if ($(this).prop('checked')) {
									$('#sendAtForm').show();
								} else {
									$('#sendAtForm').hide();
								}
							});
						});
					</script>

					<div class="sub-options" id="sendAtForm">
                        <div class="option-settings-col">
                            <span class="select-label">Date</span>
							<div class="dp-date-picker">
								<input class="dp-date-picker-alt dp-select" type="text" readonly onclick="dpOpen()">
								<div class="dp-calendar-container">
								</div>
							</div>
							<script type="text/javascript">
								function dpOpen(){
									$(".dp-calendar-container").toggleClass("active");
								}
								$( ".dp-calendar-container" ).datepicker({
									altField: ".dp-date-picker-alt",
									altFormat: "dd-mm-yy",
									defaultDate: 1,
									minDate: 0,
									firstDay: 1,
									dayNamesMin: [ "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat" ],
									onSelect: function(){
										$(".dp-calendar-container").removeClass("active");
									}
								}).datepicker("setDate", new Date());
							</script>
                        </div>
                        <div class="option-settings-col">
                            <span class="select-label">Time</span>
                            <select class="select" style="font-weight:600">
								<option value="00:00">12:00 AM</option>
								<option value="00:15">12:15 AM</option>
								<option value="00:30">12:30 AM</option>
								<option value="00:45">12:45 AM</option>
								<option value="01:00">1:00 AM</option>
								<option value="01:15">1:15 AM</option>
								<option value="01:30">1:30 AM</option>
								<option value="01:45">1:45 AM</option>
								<option value="02:00">2:00 AM</option>
								<option value="02:15">2:15 AM</option>
								<option value="02:30">2:30 AM</option>
								<option value="02:45">2:45 AM</option>
								<option value="03:00">3:00 AM</option>
								<option value="03:15">3:15 AM</option>
								<option value="03:30">3:30 AM</option>
								<option value="03:45">3:45 AM</option>
								<option value="04:00">4:00 AM</option>
								<option value="04:15">4:15 AM</option>
								<option value="04:30">4:30 AM</option>
								<option value="04:45">4:45 AM</option>
								<option value="05:00">5:00 AM</option>
								<option value="05:15">5:15 AM</option>
								<option value="05:30">5:30 AM</option>
								<option value="05:45">5:45 AM</option>
								<option value="06:00">6:00 AM</option>
								<option value="06:15">6:15 AM</option>
								<option value="06:30">6:30 AM</option>
								<option value="06:45">6:45 AM</option>
								<option value="07:00">7:00 AM</option>
								<option value="07:15">7:15 AM</option>
								<option value="07:30">7:30 AM</option>
								<option value="07:45">7:45 AM</option>
								<option value="08:00">8:00 AM</option>
								<option value="08:15">8:15 AM</option>
								<option value="08:30">8:30 AM</option>
								<option value="08:45">8:45 AM</option>
								<option value="09:00">9:00 AM</option>
								<option value="09:15">9:15 AM</option>
								<option value="09:30">9:30 AM</option>
								<option value="09:45">9:45 AM</option>
								<option value="10:00">10:00 AM</option>
								<option value="10:15">10:15 AM</option>
								<option value="10:30">10:30 AM</option>
								<option value="10:45">10:45 AM</option>
								<option value="11:00">11:00 AM</option>
								<option value="11:15">11:15 AM</option>
								<option value="11:30">11:30 AM</option>
								<option value="11:45">11:45 AM</option>
								<option value="12:00">12:00 PM</option>
								<option value="12:15">12:15 PM</option>
								<option value="12:30">12:30 PM</option>
								<option value="12:45">12:45 PM</option>
								<option value="13:00">1:00 PM</option>
								<option value="13:15">1:15 PM</option>
								<option value="13:30">1:30 PM</option>
								<option value="13:45">1:45 PM</option>
								<option value="14:00">2:00 PM</option>
								<option value="14:15">2:15 PM</option>
								<option value="14:30">2:30 PM</option>
								<option value="14:45">2:45 PM</option>
								<option value="15:00">3:00 PM</option>
								<option value="15:15">3:15 PM</option>
								<option value="15:30">3:30 PM</option>
								<option value="15:45">3:45 PM</option>
								<option value="16:00">4:00 PM</option>
								<option value="16:15">4:15 PM</option>
								<option value="16:30">4:30 PM</option>
								<option value="16:45">4:45 PM</option>
								<option value="17:00">5:00 PM</option>
								<option value="17:15">5:15 PM</option>
								<option value="17:30">5:30 PM</option>
								<option value="17:45">5:45 PM</option>
								<option value="18:00">6:00 PM</option>
								<option value="18:15">6:15 PM</option>
								<option value="18:30">6:30 PM</option>
								<option value="18:45">6:45 PM</option>
								<option value="19:00">7:00 PM</option>
								<option value="19:15">7:15 PM</option>
								<option value="19:30">7:30 PM</option>
								<option value="19:45">7:45 PM</option>
								<option value="20:00">8:00 PM</option>
								<option value="20:15">8:15 PM</option>
								<option value="20:30">8:30 PM</option>
								<option value="20:45">8:45 PM</option>
								<option value="21:00">9:00 PM</option>
								<option value="21:15">9:15 PM</option>
								<option value="21:30">9:30 PM</option>
								<option value="21:45">9:45 PM</option>
								<option value="22:00">10:00 PM</option>
								<option value="22:15">10:15 PM</option>
								<option value="22:30">10:30 PM</option>
								<option value="22:45">10:45 PM</option>
								<option value="23:00">11:00 PM</option>
								<option value="23:15">11:15 PM</option>
								<option value="23:30">11:30 PM</option>
								<option value="23:45">11:45 PM</option>
							</select>

                        </div>
                    </div>
                </div>

				<div class="checkout-step payment-methods">
                    <div class="step-indicator"><span>3</span></div>
                    <div class="step-intro">
                        <p>Choose a payment method</p>
                        <p class="step-help">Your payment will take place in the next screen</p>
                    </div>
                    <div class="step-options">
                        <div class="step-option payment-method" onclick="selectPaymentMethod(this)">
                            iDEAL
							<!-- <span class="checkout-payment-fee">€ 0.29</span> -->
                            <img src="https://www.mollie.com/images/payscreen/methods/ideal.png">
                        </div>
						<div class="step-option payment-method" onclick="selectPaymentMethod(this)">
                            Credit card
							<!-- <span class="checkout-payment-fee">€ 2.43</span> -->
                            <img src="https://www.mollie.com/images/payscreen/methods/creditcard.png">
                        </div>
						<div class="step-option payment-method" onclick="selectPaymentMethod(this)">
                            Bancontact
							<!-- <span class="checkout-payment-fee">€ 1.42</span> -->
                            <img src="https://www.mollie.com/images/payscreen/methods/mistercash.png">
                        </div>
						<div class="step-option payment-method" onclick="selectPaymentMethod(this)">
                            SOFORT Banking
							<!-- <span class="checkout-payment-fee">€ 0.95</span> -->
                            <img src="https://www.mollie.com/images/payscreen/methods/sofort.png">
                        </div>
						<div class="step-option payment-method" onclick="selectPaymentMethod(this)">
                            Bitcoin
							<!-- <span class="checkout-payment-fee">€ 0.25</span> -->
                            <img src="https://www.mollie.com/images/payscreen/methods/bitcoin.png">
                        </div>
						<div class="step-option payment-method" onclick="selectPaymentMethod(this)">
                            KBC/CBC Payment Button
							<!-- <span class="checkout-payment-fee">€ 0.95</span> -->
                            <img src="https://www.mollie.com/images/payscreen/methods/kbc.png">
                        </div>
						<div class="step-option payment-method" onclick="selectPaymentMethod(this)">
                            Belfius Pay Button
							<!-- <span class="checkout-payment-fee">€ 0.95</span> -->
                            <img src="https://www.mollie.com/images/payscreen/methods/belfius.png">
                        </div>
                        <input name="paymentMethod" type="hidden" required="" class="">
                    </div>
                    <div class="step-option-settings" style="overflow:hidden;">
                        <div class="setup-content">
                            <div class="method-header">
                                <img>
                            </div>
                            Please note that refunds are not possible if you choose .
                        </div>
                    </div>
                </div>

				<div class="checkout-summary voucher-summary">
                    <div class="checkout-total">
                        <div class="total-price">
                            <div>Total</div>
                            <div class="total-price-span">
                                <span class="currency">€</span>78
                            </div>
                        </div>
                    </div>
                </div>

				<div class="checkout-footer">
                    <div class="footer-button">
                        <a class="payment-button" ng-click="ctrl.checkout()">
							Confirm &amp; Pay
							<span class="total-price-span">
								<span class="currency">€</span>
								78
							</span>
						</a>
                    </div>
                    <div class="checkout-disclaimer">
                        <p>By buying a product you agree to our <a href="/side/en/cce8ca42/terms">Terms &amp; Privacy</a>.</p>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>





<script type="text/javascript">

	var vourcherPrice = $('.quantity-total').clone().children().remove().end().text()/2;
	function changeQuantity(type){
		var totalPrice = parseFloat($('.quantity-total').clone().children().remove().end().text());
		var unitCache = $('.quantity-total').children();
		var quantityValue = $('.quantity-value input').val();

		var paymentFee;
		paymentFee = parseFloat($(type).children('.checkout-payment-fee').text().slice(1));

		if(type == 'plus'){
			if (quantityValue < 10) {
				quantityValue++;
				$('.quantity-total, .total-price-span').text(totalPrice + vourcherPrice).prepend(unitCache);
	            $('.quantity-value input').val(quantityValue);
			}
		}
		if(type == 'minus'){
			if (quantityValue > 1) {
				quantityValue--;
				$('.quantity-total, .total-price-span').text(totalPrice - vourcherPrice).prepend(unitCache);
	            $('.quantity-value input').val(quantityValue);
			}
		}
		// if(paymentFee !== 0){
		// 	$('.quantity-total, .total-price-span').text(totalPrice + paymentFee).prepend(unitCache);
		// }
	}
</script>
