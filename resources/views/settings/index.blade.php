@extends('layouts.app')

@section('content')


	<!-- Titlebar -->
	<div id="titlebar">
		<div class="row">
			<div class="col-md-12">
				<h2>System Settings</h2>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">

			<form method="POST" action="{{ route('settings.update') }}">
				@csrf

				<div id="add-listing">

					<!-- Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Payment Informations</h3>
						</div>

						<!-- Row -->
						<div class="row with-forms">

							<!-- Status -->
							<div class="col-md-6">
								<h5>Payment Amount</h5>
								<input type="number" name="payment_amount" min="0" step="0.01" value="{{$config->payment_amount}}" required>
							</div>

							<!-- Type -->
							<div class="col-md-6">
								<h5>Keywords</h5>
								<select class="chosen-select" name="currency">
									<option value="USD" <?php if($config->currency == 'USD') echo "selected";?> >USD</option>
									<option value="EUR" <?php if($config->currency == 'EUR') echo "selected";?> >EUR</option>
								</select>
							</div>

						</div>
						<!-- Row / End -->

					</div>
					<!-- Section / End -->

					<div class="form-row">
                            <button type="submit" class="button border margin-top-5">Save <i class="fa fa-arrow-circle-right"></i> </button>
                    </div>

				</div>
			</form>
		</div>

		<!-- Copyrights -->
		<div class="col-md-12">
			<div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
		</div>

	</div>


	@endsection
