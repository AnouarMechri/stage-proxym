@extends('layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
@can('test create')
				<!-- breadcrumb -->
				
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
                <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Certificate</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('certifs.index') }}"> Back</a>
        </div>
    </div>
</div>
     
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
                </div>
<form action="{{ route('certifs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Name">
            </div>
        </div>
       
                
                    
                     
                        <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>status</strong>
                                     <select id="status" class="form-control " name="status">
                                        
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
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
        @endcan
@endsection
@section('js')
<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection