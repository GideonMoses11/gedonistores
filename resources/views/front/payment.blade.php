@extends('layouter.main')

@section('content')


<br>
<br>
<div class="row">
    <div class="small-6 small-centered columns">
    <form action="{{route('payment.store')}}" method="post" id="payment-form">
            @csrf
            @method('POST')
              {{-- <div class="form-row">
                <label for="card-element">
                  Credit or debit card
                </label>
                <input id="cardno" name="cardno" type="text" size="20" data-stripe="number" required>
                </div> --}}

                {{-- <div class="form-row">
                    <label for="card-element">
                      Expiration (MM/YY)
                    </label>
                    <input id="expirationmonth" name="expirationmonth" type="text" size="2" data-stripe="exp_month" required style="width:60px; height:35px;">
                    <span>/</span>
                    <input id="expirationyear" name="expirationyear" type="text" size="2" data-stripe="exp_year" required style="width:60px; height:35px;">
                </div> --}}

                {{-- <div class="form-row">
                    <label for="card-element">
                      CVC
                    </label>
                    <input id="cvc" name="cvc" type="text" size="4" data-stripe="cvc" required>
                    </div> --}}

                <div id="card-element">
                  <!-- A Stripe Element will be inserted here. -->
                </div>


                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
                <br>
                <input class="btn btn-success" type="submit" value="Submit">
                <br>
                <br>
              </div>


            </form>
            <br>
            <br>

    </div>
</div>




<style>
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>
@endsection
