@extends('layouts.app')

@section('head_metas')

<title>{{$seo->meta_title}}</title>

<meta name="description" content="{{$seo->meta_description}}">

{{$seo->custom_head_scripts}}

<style>
    
    .col-lg-2 { flex: 0 0 auto !important; width: 16.6666666667% !important; }
    
</style>


@endsection


@section('content')

{{$seo->custom_body_scripts}}


<div class="Blog-bbsec"  >
 
<div class="container">
<div class="title-area  text-center">
      <h2 class="sec-title mb-20">{{$title}}</h2>
	   
    </div>
<div class="row">


@foreach($publications as $book)

<div class="col-lg-2 col-md-4 col-sm-4  ">
          <div class="blog-item" data-aos="zoom-in" data-aos-duration="1200">
          <div class="blog-thumb">
                            
          <img src="{{asset('storage')}}/{{$book->image}}" alt="{{$book->title}} Image">
                        
          </div>
                       
              </div>
</div>


<div class=" col-lg-10 col-md-8 col-sm-8  ">
          <div class="blog-item" data-aos="zoom-in" data-aos-duration="1200">
          
          <div class="blog-content">
                            
          <h3 class="title"><a target="_blank" href="{{$book->url}}">{{$book->title}}</a></h3>
							
					<div class="btn-group">
							<a target="_blank" href="{{$book->url}}" class="as-btn ss1 ">Read More</a>
							 
					</div>
                             
          </div>
          </div>
</div>

@endforeach

 
</div>
 

</div>

</div>
 
 

@endsection



