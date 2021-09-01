@extends('layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Home</h4>
						</div>
					</div>
				
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

@if (session()->has('success'))
        <script>
            window.onload = function() {
                notif({
                    msg: "operation succeded",
                    type: "success"
                })
            }
        </script>
    @endif







<div class="pull-right">
            <a class="btn btn-primary" href="{{ route('certifs.index') }}"> Back</a>
        </div> <br>
				<!-- row -->
				<div class="row">
				@foreach($certif as $c) 
				@if($c->status == 'ready')
				<div class="card" style="margin: 0px 30px 30px 30px;">
  <div class="card-header">
    
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$c->title}}</h5>
    <p class="card-text">Hello {{Auth::user()->name}} check only one answer</p>
    <a href="/index/{{$c->id}}" class="btn btn-primary">Take the test</a>
  </div>
</div>
@endif
				@endforeach
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection