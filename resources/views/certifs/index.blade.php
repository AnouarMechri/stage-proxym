@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Tests</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Index</span>
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

				<!-- row -->
				<div class="row">
				
					
					<!--/div-->

					<!--div-->
					
					<!--/div-->

					<!--div-->
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">all certifs</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
							<div class="table-responsive hoverable-table">
							<table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
										<thead>
											<tr>
												<th class="border-bottom-0">#</th>
												<th class="border-bottom-0">Title</th>
												<th class="border-bottom-0">status</th>
												<th class="border-bottom-0">Added date</th>
												
											</tr>
										</thead>
										<?php $i=0  ?>
										@foreach($certifs as $certif)
										<?php $i++ ?>
										<tbody>
											<tr>
												<td>{{$i}}</td>
												<td>{{$certif->title }}</td></a>
												<td>{{$certif->status }}</td>
												<td>{{ $certif->created_at}}</td>
												<td>
												@can('test show')
                                            <a class="btn btn-success btn-sm"
                                                href="/certifs/check/{{$certif->id}}">show</a></td>
                                        @endcan
												@can('test edit')
                                           <td><a href="/certifs/{{$certif->id}}" class="btn btn-sm btn-info"
                                                title="edit"> edit<i class="las la-pen"></i></a></td> 
                                        @endcan

										@can('test delete')
												<td> <form action="/destroy/{{$certif->id}}" method="DELETE" class="submit-form">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-sm btn-danger">Delete <i class="las la-trash"></i></button>
						
						
                    </form></td> @endcan
											</tr>
										</tbody>
										@endforeach
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->

					<!--div-->
					
					
				
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
<!-- Internal Modal js-->
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>

@endsection 