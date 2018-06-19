@extends('layouts.app')

@section('style')
    body {
        padding-top: 54px;
        }

        @media (min-width: 992px) {
            body {
                padding-top: 56px;
            }
        }
@endsection
@section('content')
<!-- Page Content -->
    <div class="container">

    <!-- Heading Row -->
    <div class="row my-4">
        <div class="col-lg-8">
        <img class="img-fluid rounded" src="{{ asset('images/cron.png') }}" alt="">
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">
        <h1>Business Name or Tagline</h1>
        <p>This is a template that is great for small businesses. It doesn't have too much fancy flare to it, but it makes a great use of the standard Bootstrap core components. Feel free to use this template for any project you want!</p>
        </div>
        <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
            <h2 class="card-title">Card One</h2>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
            </div>
        </div>
        </div>
        <!-- /.col-md-4 -->
        <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
            <h2 class="card-title">Card Two</h2>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod tenetur ex natus at dolorem enim! Nesciunt pariatur voluptatem sunt quam eaque, vel, non in id dolore voluptates quos eligendi labore.</p>
            </div>
        </div>
        </div>
        <!-- /.col-md-4 -->
        <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
            <h2 class="card-title">Card Three</h2>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
            </div>
        </div>
        </div>
        <!-- /.col-md-4 -->

    </div>
    <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Cron 2018</p>
    </div>
    <!-- /.container -->
    </footer>
    @endsection
