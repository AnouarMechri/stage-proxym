@extends('layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
@can('option edit')
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
            <a class="btn btn-primary" href="/questions/{{$option->questions_id}}"> Back</a>
        </div>
				<!-- row -->
				<div class="row">
				<form action="/options/update/{{$option->id}}}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Modify Option</strong>
                <input type="text" name="title" class="form-control" placeholder="{{$option->title}}">
            </div>
        </div> 
        <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>status :</strong>
                                     <select id="o_status" class="form-control " name="o_status">
                                        
                                        <option value="1">True</option>
                                        <option value="0">false</option>
                                        
                                    
    
                                    </select>
                                </div>

        </div>
      
    
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">modify</button>
        </div>
    </div>
     
</form>
				</div> 
				<br>
				<br>
                
                 </div>
                 
<br><br>
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