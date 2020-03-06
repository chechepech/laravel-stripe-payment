@extends('layouts.app')
@section('title','Update Payment Method')
@section('content')
	<div class="container">
      <div class="row">
        <div class="col-12 col-sm-8 col-lg-4 mx-auto">
            <h1 class="text-center">Add Card</h1>
            <div class="form-group">
                <input id="card-holder-name" class="form-control" type="text" placeholder="Name">
            </div>

            <!-- Stripe Elements Placeholder -->
            <div id="card-element"></div>
            <br>
            <button id="card-button" class="btn btn-primary btn-sm" data-secret="{{ $intent->client_secret }}">
                Update Payment Method
            </button>
        </div>
      </div>
    </div>
@endsection