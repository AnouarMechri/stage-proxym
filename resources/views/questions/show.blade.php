@extends('layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Modify</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/question</span>
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
            <a class="btn btn-primary" href="/certifs/{{$question->certif_id}}"> Back</a>
        </div> <br>
				<!-- row --> 
                @can ('question edit')
				<div class="row">
				<form action="/questions/update/{{$question->id}}}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Modify question</strong>
                <input type="text" name="title" class="form-control" placeholder="{{$question->title}}">
            </div>
        </div> 
      
    
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">modify</button>
        </div>
    </div>
     
</form>
				</div> 
                @endcan
				<br>
				<br>
                @can('option index')
                 <div class="row">
                <div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">options </h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table key-buttons text-md-nowrap">
										<thead>
											<tr>
												<th class="border-bottom-0">#</th>
												<th class="border-bottom-0">option</th>
                                                <th class="border-bottom-0">answer</th>
											
												
											</tr>
                                            <?php $i=0 ?>
										</thead>
										@foreach($options as $option)
                                        @if($option->questions_id== $question->id)
                                        <?php $i++ ?>
										<tbody>
											<tr>
												<td>{{$i}}</td>
												<td>{{$option->title }}</td>
                                                @if($option->o_status== 1)
                                                <td>True</td>
                                                @else
                                                <td>False</td>
                                                @endif
												@can('option edit')
                                           <td><a href="/options/{{$option->id}}" class="btn btn-sm btn-info"
                                                title="edit"> edit<i class="las la-pen"></i></a></td> 
                                                @endcan
											
                                                @can('option delete')
												<td> <form action="/destroy/option/{{$option->id}}" method="DELETE" class="submit-form">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-sm btn-danger">Delete <i class="las la-trash"></i></button>
                    </form></td> @endcan
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
                 @endcan

              @can('option create')
    <form action="{{ route('options.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Write your option</strong>
                <input type="text" name="title" class="form-control" placeholder="your option">
            </div>
        </div> 
        <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>status :</strong>
                                     <select id="o_status" class="form-control " name="o_status">
                                        
                                        
                                        <option value="0">false</option>
                                        <option value="1">True</option>
                                        
                                    
    
                                    </select>
                                </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>question :</strong>
                                     <select id="questions_id" class="form-control " name="questions_id">
                                        
                                        <option value="{{$question->id}}">{{$question->title}}</option>
                  
                                    </select>
                                </div>

        </div>
    
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
     
</form>
                 </div>
                 
<br><br>
@endcan
				</div>
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