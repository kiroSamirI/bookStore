
   @extends('layouts.app')



@section('content')
<script src="https://js.stripe.com/v3/"></script>
   <div class="jumbotron text-center">
      <h1> Welcome to Online Book Store </h1>
      @if(count($books) > 0)
      <div class="row">
          @foreach($books as $book)
              <div class="col-sm-6 col-md-3">
                      <div class="thumbnail">
                      <img src="/storage/book_images/{{$book->book_image}}" height="200" width="150"/>
                          <div class="caption">
  
                          <small> uploaded at {{$book -> created_at}} </small>
                          <small> price {{$book -> price}} </small>
                          <h4><a href="/books/{{$book->id}}">{{$book->title}}</a></h4>
                          <p> Description <br> {{$book -> description}} </p>
                          <p><a href="#" class="btn btn-success" role="button">Add To Cart</a> </p>
                          
                          
                      </div>
                      </div>
              </div>
           @endforeach
      </div>
      
      @else
          <p> there are no books </p>
      @endif

      {{--  <p> <a class="btn btn-primary btn-leg" href="/login" role="button" > Login</a> <a class="btn btn-primary btn-leg" href="/register" role="button" > Register</a>  --}}
   </div>

   <form action="/payment" method="post" id="payment-form">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-row">
        <label for="card-element">
          Credit or debit card
        </label>
        <div id="card-element" #stripecardelement style="width: 30em">
          <!-- A Stripe Element will be inserted here. -->
        </div>
    
        <!-- Used to display Element errors. -->
        <div id="card-errors" role="alert"></div>
      </div>
    
      <button>Submit Payment</button>
    </form>


    <script>
         var stripe = Stripe('pk_test_HFIkTWP5aMmP4FWvprjI6PKK');
          var elements = stripe.elements();
    
          // Custom styling can be passed to options when creating an Element.
          var style = {
          base: {
             // Add your base input styles here. For example:
             fontSize: '16px',
             color: "#32325d",
          }
          };
    
          // Create an instance of the card Element.
          var card = elements.create('card', {style: style});
    
          // Add an instance of the card Element into the `card-element` <div>.
          card.mount('#card-element');
    
          card.addEventListener('change', function(event) {
          var displayError = document.getElementById('card-errors');
          if (event.error) {
             displayError.textContent = event.error.message;
          } else {
             displayError.textContent = '';
          }
          });
    
          // Create a token or display an error when the form is submitted.
          var form = document.getElementById('payment-form');
          form.addEventListener('submit', function(event) {
              event.preventDefault();
      
              stripe.createToken(card).then(function(result) {
              if (result.error) {
                  // Inform the customer that there was an error.
                  var errorElement = document.getElementById('card-errors');
                  errorElement.textContent = result.error.message;
              } else {
                  // Send the token to your server.
                  stripeTokenHandler(result.token);
              }
              });
          });
    
    
          function stripeTokenHandler(token) {
      // Insert the token ID into the form so it gets submitted to the server
      console.log(token);
          var form = document.getElementById('payment-form');
          var hiddenInput = document.createElement('input');
          hiddenInput.setAttribute('type', 'hidden');
          hiddenInput.setAttribute('name', 'stripeToken');
          hiddenInput.setAttribute('value', token.id);
          form.appendChild(hiddenInput);
    
          // Submit the form
          form.submit();
          }
       </script>
@endsection