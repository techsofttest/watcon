@extends('layouts.app')

@section('head_metas')

<title>{{$seo->meta_title}}</title>

<meta name="description" content="{{$seo->meta_description}}">

{{$seo->custom_head_scripts}}

<style>

  .floating-button
  {
    display:none;
  }

</style>

@endsection


@section('content')

{{$seo->custom_body_scripts}}


<div class="cc-ma-sec">
 

<div class="cccontent">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-10">
<div class="cccontent-bg">
<div class="title-area text-center">
      <h2 class="sec-title mb-20">Contact Us</h2>
	  
    </div>
	
	
	<div class="row coniuy justify-content-center sebox">

      <div class="col-lg-4 col-md-4 col-md-4 d-flex">

                <div class=" style-eight">

                <a target="_blank" href="https://maps.app.goo.gl/r4HPQJoA9twySKiUA">
                <div class="service-box-icon"> <i class="fas fa-location-dot"></i>
                </div>
                </a>

                <div class="service-content">
                  <a target="_blank" href="https://maps.app.goo.gl/r4HPQJoA9twySKiUA"><h3>Locate Us</h3></a>
                  <p>SOAS University of London<br>
                    Russell Square, <br>
                    GB-London WC1H 0XG</p>
                  </div>
                </div>

      </div>


      <div class="col-lg-4 col-md-4 col-md-4 d-flex">
        <div class=" style-eight">
                  <div class="service-box-icon"> 
                  
                  <a href="javascript:void(0)" class="enquireBtn">
                    <i class="fal fa-envelope"></i>
                  </a>

                  </div>

                  <div class="service-content">

                  <a href="javascript:void(0)" class="enquireBtn">

                    <h3>Email Us</h3>

                  </a>
                    

                  </div>
                </div>
      </div>
	   

      <div class="col-lg-4 col-md-4 col-md-4 d-flex">
      <div class=" style-eight">
            <div class="service-box-icon"> <i class="fal fa-link"></i> </div>
            <div class="service-content">
            <h3>Follow Us</h3>
                   
					 <div class="tp-footer-social">  
	 
		  <a target="_blank" href="#"><i class="fab fa-linkedin"></i></a>
		   <a target="_blank" href="https://www.instagram.com/watcon_soas/ "><i class="fab fa-instagram"></i></a>
		     <a target="_blank" href="# "><i class="fab fa-youtube"></i></a>
		 </div>
                  </div>
                </div>
      </div>
      
    </div>
	
	</div>

</div>
	</div> 
	</div> 
    </div> 
	</div> 

 

@endsection



