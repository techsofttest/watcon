@extends('layouts.app')

@section('head_metas')

<title>{{$seo->meta_title}}</title>

<meta name="description" content="{{$seo->meta_description}}">

{{$seo->custom_head_scripts}}

@endsection


@section('content')

{{$seo->custom_body_scripts}}

<div class="Blog-ma-sec Desti-innersec destimations-three">
	       <div class="blog-video_video">
            <video poster="{{asset('img/video_bg.jpg')}}" playsinline="" autoplay="" loop="" muted="muted">
                
                <source src="{{asset('img/video.mp4')}}" type="video/mp4">
            </video>

</div>
	<div class="ss">
 <section class="landing_slider">
 <div class="content">
  <div class="hero-slider-1 as-carousel" data-fade="true" data-autoplay="false" data-autoplay-speed="3600" data-slide-show="1" data-md-slide-show="1" >
    <div class="as-hero-slide">
     
      <div class="container">
	  
	  <div class="row justify-content-between  ">
	  
	  <div class="col-lg-8 col-md-12 d-flex horder2">
	       <div class="hero-style1 text-center">
         
		  <p class="hero-text " data-ani="slideinup" data-ani-delay="0.1s" >
        
Addressing the Multi-scalar Dimensions of Sectoral Water Conflicts Through the Lens of Water Security: Lessons from South Asia (WATCON) </p>
     
        </div>
	  
	  </div>
	  
	  	  
	  <div class="col-lg-4 col-md-12 d-flex horder1">
	  
	  <img src="{{asset('img/logo.png')}}" class="bb-imm" alt="">
	  </div>
	  
	  </div>
	  
   
      </div>
    </div>

</div>
</div>
            </div>
     
 
    </section>

	</div>
	
	</div> 
	
	


@endsection