@extends('layouts.app')

@section('head_metas')

<title>{{$seo->meta_title}}</title>

<meta name="description" content="{{$seo->meta_description}}">

{{$seo->custom_head_scripts}}


@endsection


@section('content')

<style>

 .title-area .sec-title
 {
    margin-bottom: 10px;
    /*color: #cd650f !important;*/
    color: #fff7cb !important;
 }

</style>

{{$seo->custom_body_scripts}}

 <div class="Jobseccc">
  
 
 <div class="container">
 
 <div class="row justify-content-center">
<div class="col-lg-8">
<div class="jobbb-bg">
 <div class="title-area text-center">
      <h2 class="sec-title mb-20">Work Opportunities</h2>
	  
    </div>
	 <div class="text-center no-current">

	 @if(!empty(strip_tags($jobs->content)))
     {!! $jobs->content !!}
	 @else
	 <p style="color:white">No Vacancies At The Moment</p>
	 @endif

	    </div>
		   </div>
		      </div>
			     </div>
	
 </div>
</div>
 

@endsection



