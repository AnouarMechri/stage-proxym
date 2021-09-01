@extends('layouts.master')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

@endsection
@section('page-header')
			
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

<div class="pull-left" style="margin-top: 20px;">
            <a class="btn btn-primary" href="/certifs"> Back</a> <br> <br>
			<h4> <b>Questions and options </b>
					</h4>
        </div>
        <br>
                @foreach($questions as $question)
                 @if($question->certif_id== $certif->id)
				<div class="row">
                <div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">{{$question->title}}</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							@foreach($options as $option)
                            @if($option->questions_id== $question->id)
							<form action="/answers/store/{{$certif->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
							<div class="form-check" style="margin-right: 10px;">
  <input class="form-check-input"  type="checkbox" name="option_id[]" value="{{$option->o_status}}" id="flexCheckDefault"><br>
  <label class="form-check-label" for="flexCheckDefault"> 
         {{$option->title}}
  </label>
</div>

@endif
@endforeach
				
                @endif
				@endforeach
                <button class="btn btn-primary" type="submit">Submit</button>
                </form>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
				</div>
		<!-- main-content closed -->
@endsection
@section('js')
<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>

<!--Internal  Datatable js -->

@endsection