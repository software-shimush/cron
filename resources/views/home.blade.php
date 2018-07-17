@extends('layouts.app') 
@section('style') body { padding-top: 54px; } @media (min-width: 992px) { body { padding-top: 56px;
} } .business-header { height: 50vh; min-height: 300px; background: url('http://placehold.it/1920x400') center center no-repeat
scroll; -webkit-background-size: cover; -moz-background-size: cover; background-size: cover; -o-background-size: cover; }
.card { height: 100%; }
@endsection
 
@section('content')
{{-- <header class="business-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="display-3 text-center text-white mt-4">Cron Job</h1>
      </div>
    </div>
  </div>
</header> --}}

<!-- Page Content -->
<div class="container">

  {{-- <div class="row">
    <div class="col-sm-8">
      <h2 class="mt-4">What We Do</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores
        rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi,
        natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.</p>
    </div>
    <div class="col-sm-4">
      <h2 class="mt-4">Contact Us</h2>
      <address>
            <strong>Start Bootstrap</strong>
            <br>3481 Melrose Place
            <br>Beverly Hills, CA 90210
            <br>
          </address>
      <address>
            <abbr title="Phone">P:</abbr>
            (123) 456-7890
            <br>
            <abbr title="Email">E:</abbr>
            <a href="mailto:#">name@example.com</a>
          </address>
    </div>
  </div> --}}
  <!-- /.row -->

  <div class="row">
    <div class="col-sm-4 my-4">
      <div class="card">
        <img class="card-img-top" src="{{ asset('images/cron-text.png') }}" alt="">
        <div class="card-body">
          <h4 class="card-title">Send A Text</h4>
          {{-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus.</p> --}}
        </div>
        <div class="card-footer">
          <form action="/jobs/create" method="get">
            @csrf
            <input type="hidden" name="type" value="text">
            <button type="submit" class="btn btn-primary">Create A Text Job</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-sm-4 my-4">
      <div class="card">
        <img class="card-img-top" src="{{ asset('images/cron-email.png') }}" alt="">
        <div class="card-body">
          <h4 class="card-title">Send A Email</h4>
          {{-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus totam --}}
            {{-- ut praesentium aut.</p> --}}
        </div>
        <div class="card-footer">
          <form action="/jobs/create" method="get">
            @csrf
            <input type="hidden" name="type" value="email">
            <button type="submit" class="btn btn-primary">Create A Email Job</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-sm-4 my-4">
      <div class="card">
        <img class="card-img-top" src="{{ asset('images/postimg.png') }}" alt="">
        <div class="card-body">
          <h4 class="card-title">Post to A URL</h4>
          {{-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p> --}}
        </div>
        <div class="card-footer">
          <form action="/jobs/create" method="get">
            @csrf
            <input type="hidden" name="type" value="post">
            <button type="submit" class="btn btn-primary">Create A Post Job</button>
          </form>
        </div>
      </div>
    </div>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Cron Job 2018</p>
  </div>
  <!-- /.container -->
</footer>
@endsection