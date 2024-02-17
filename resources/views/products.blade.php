<!DOCTYPE html>
<html>
<head>
    <title>Add To Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <div class="container">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('/home') }}">Home</a>
        </li>
    </ul>
    <a class="btn btn-outline-dark" href="{{ route('shopping.cart') }}">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge bg-danger">{{ count((array) session('cart')) }}</span>
    </a>
    <form action="{{ route('logout') }}" method="POST" role="search">
        @csrf
        @method('DELETE')
    <button class="btn btn-danger" type="submit">Logout</button>
</form>
  </div>
</nav>
     
<div class="row">
    @foreach($books as $book)
        <div class="col-md-3 col-6 mb-4">
            <div class="card">
                <img style="height:150px;width:150px;" src="{{ asset('images') }}/{{ $book->image }}" class="card-img-top"/>
                <div class="card-body">
                    <h4 class="card-title">{{ $book->name }}</h4>
                    <p>{{ $book->author }}</p>
                    <p class="card-text"><strong>Price: </strong> ${{ $book->price }}</p>
                    <p class="btn-holder"><a href="{{ route('addbook.to.cart', $book->id) }}" class="btn btn-outline-danger">Add to cart</a> </p>
                </div>
            </div>
        </div>
    @endforeach
</div>