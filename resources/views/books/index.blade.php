@extends('layouts.app')


@section('content')
    <h1> books index </h1>
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
                        <form action="your-server-side-code" method="POST">
                            <script
                              src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                              data-key="pk_test_R8G6A7uRfWob7sgZg8lIhc0I006ifYvM5j"
                              data-amount="1000"


                              data-name="Stripe.com"
                              data-description="Widget"
                              data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                              data-locale="auto"
                              data-zip-code="true">
                            </script>
                          </form>
                        <p><a href="#" class="btn btn-success" role="button">Add To Cart</a> </p>
                        
                    </div>
                    </div>
            </div>
         @endforeach
    </div>
    {{$books -> links()}}
    @else
        <p> there are no books </p>
    @endif
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('pk_test_TYooMQauvdEDq54NiTphI7jx');
        var elements = stripe.elements();
    </script>
@endsection
