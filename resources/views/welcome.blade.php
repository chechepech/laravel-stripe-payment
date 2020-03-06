@extends('layouts.app')
@section('title','My Products')
@section('content')
<section class="jumbotron text-center">
	<div class="container">
		<h1>Stripe Payment</h1>
		<p class="lead text-muted">Welcome to the website, choose a product o subscription monthly</p>
	</div>
</section>
<div class="album py-5 bg-light">
	<div class="container">
		<div class="row">
			@foreach($skus as $sku)
			<div class="col-md-4">
				<div class="card mb-4 shadow-sm">
					<img class="bd-placeholder-img card-img-top" src="{{$sku->image}}" alt="">
{{-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"></svg> --}}
					<div class="card-body">
						<h5 class="card-title">{{$sku->attributes->name}}</h5>
						<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group">
							<a class="btn btn-sm btn-outline-secondary pay" href="{{route('product-buy',$sku->id)}}">Buy</a>
								<!--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>-->
							</div>
							<small class="text-muted">{{$sku->price}}</small>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			@foreach($plans as $plan)
			<div class="col-md-4">
				<div class="card mb-4 shadow-sm">
					<img class="bd-placeholder-img card-img-top" src="{{asset('img/magazine.jpg')}}" alt="">
					<div class="card-body">
						<h5 class="card-title">Subscription {{$plan->nickname}}</h5>
						<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group">
							<a class="btn btn-sm btn-outline-secondary pay-subscription" href="{{route('plan-buy',$plan->id)}}">Buy</a>
								<!--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>-->
							</div>
							<small class="text-muted">{{$plan->amount}}</small>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection