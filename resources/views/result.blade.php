@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				
				<div class="row">
				<div>
				<?php	
				$b=0; ?>
				@foreach($questions as $q)
				@if($q->certif_id== $answer->certif_id)

				@foreach($options as $p)
				@if($p->questions_id== $q->id)
				<?php $b=$b+$p->o_status;?> 

				@endif
				@endforeach
				@endif
				@endforeach
			
				<?php	
				$res=0; 
				$i=0;
				$obj = json_decode($op,true);
				foreach($obj as $value){

				
				$res=$res+$obj[$i];
				
				$i++;
			}
		
             if($res > $b/2 ) { ?>
</div>
            <div><h4>((: you passed </h4></div> <br> <br>
			 <form action="/result/store" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 60px;">
                                <div class="form-group">
                                    <strong>: score </strong>
                                     <select id="score" class="form-control " name="score">
                                        
                                        <option value="{{$res}}">{{$res}}</option>
                                 </select>
								                   </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong> : Certif </strong>
                                     <select id="certif_id" class="form-control " name="certif_id">
                                        
                                        <option value="{{$answer->certif_id}}">{{$answer->certif['title']}}</option>
                  
                                    </select>
                                </div>

        </div>
    
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit Your Result</button> <br> <br><br>
        </div>
    </div>
     
</form>
			 <?php  }else { ?>

		<h4>): you failed  </h4>

			
		<?php  }
				?>

			<h2>Your score is : <?php print $res ?> Out of <?php print $b ?> </h2> <br> <br>
			<div class="pull-right">
            <a class="btn btn-primary" href="/home"> Back to home</a> <br> <br>
        </div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection