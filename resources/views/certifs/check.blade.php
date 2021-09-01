@extends('layouts.master')
@section('css')
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
			<h1>{{$certif->title}}</h1>
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
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table key-buttons text-md-nowrap">
										<thead>
											<tr>
												<th class="border-bottom-0">#</th>
												<th class="border-bottom-0">Option</th>
												<th class="border-bottom-0">Status</th>
											</tr>
										</thead>
                                        @foreach($options as $option)
                                        @if($option->questions_id== $question->id)
										<tbody>
											<tr>
												<td>{{$option->id }}</td>
												<td>{{$option->title }}</td>
                                                @if($option->o_status== 1)
                                                <td>True</td>
                                                @else
                                                <td>False</td>
                                                @endif
											</tr>
										</tbody>
                                        @endif
							            @endforeach
									</table>
								</div>
							</div>
						</div>
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
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>

<!--Internal  Datatable js -->

@endsection