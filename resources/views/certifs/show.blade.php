@extends('layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Modify</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/certificate</span>
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
   
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="pull-right">
            <a class="btn btn-primary" href="{{ route('certifs.index') }}"> Back</a>
        </div> <br>
				<!-- row -->
				<div class="row">
                @can('test edit')
                <form action="/certifs/update/{{$certif->id}}}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="{{$certif->title}}">
            </div>
        </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>status</strong>
                                     <select id="status" class="form-control " name="st">
                                        
                                        <option value="empty">empty</option>
                                        <option value="ready">ready</option>
                                    
    
                                    </select>
                                </div>

                                 </div>
       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
     
</form>
                </div>
@endcan
				</div> 
				<br>
				<br>
                <div class="row">
                <div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">questions </h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div> 
                            @can('question index')
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table key-buttons text-md-nowrap">
										<thead>
											<tr>
												<th class="border-bottom-0">#</th>
												<th class="border-bottom-0">question</th>
											
												
											</tr>
                                            <?php $i=0  ?>
										</thead>
										@foreach($questions as $question)
                                        @if($question->certif_id== $certif->id)
                                        <?php $i++ ?>
										<tbody>
											<tr>
												<td>{{$i}}</td>
												<td>{{$question->title }}</td>
                                                
												@can('question edit')
                                           <td><a href="/questions/{{$question->id}}" class="btn btn-sm btn-info"
                                                title="edit"> edit<i class="las la-pen"></i></a></td> 
                                                @endcan

                                                @can('question delete')
												<td> <form action="/destroy/question/{{$question->id}}" method="DELETE" class="submit-form">
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
                            @endcan
						</div>
					</div> 
                    @can('question create')
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add questions</h2>
        </div>
        
    </div>


  
                </div>
<form action="{{ route('questions.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Your question :</strong>
                <input type="text" name="title" class="form-control" placeholder="your question">
            </div>
        </div> 
        <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Certifcate :</strong>
                                     <select id="certif_id" class="form-control " name="certif_id">
                                        
                                        <option value="{{$certif->id}}">{{$certif->title}}</option>
                                        
                                    
    
                                    </select>
                                </div>

        </div>
    
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
     
</form>
<br><br>
				</div>
                @endcan
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