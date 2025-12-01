@extends('layouts.app')

@section('head_metas')

<title>{{$seo->meta_title}}</title>

<meta name="description" content="{{$seo->meta_description}}">

{{$seo->custom_head_scripts}}

<style>
    
    .col-lg-2 { flex: 0 0 auto !important; width: 16.6666666667% !important; }
    
</style>


<style>

    img.blog-card__image
    {
    /*height: 350px !important;
    background: white;*/

    height: 310px !important;
    width: 200px;
    background: white;
    margin: 0px auto;
    }

</style>


@endsection


@section('content')

{{$seo->custom_body_scripts}}


<div class="Blog-bbsec"  >
 
<div class="container">
<div class="title-area  text-center">
      <h2 class="sec-title mb-20">{{$title}}</h2>
	   
    </div>
<div class="row" style="justify-content:center">


@foreach($publications as $book)


<div class="col-lg-3 col-md-3 col-sm-12 d-flex  " data-aos="zoom-in" data-aos-duration="800">
	
	<div class="blog-card">
						 <div class="blog-card__date">
                                </div><!-- /.blog-card__date -->
                            <a target="_blank" href="{{$book->url}}" class="blog-card__image-link">
								
                                <img src="{{asset('storage')}}/{{$book->image}}" alt="{{$book->title}}" width="100%" class="blog-card__image">
                                <div class="blog-card__overlay">
                                   
                                </div><!-- /.blog-card__overlay -->
                            </a><!-- /.blog-card__image-link -->
                            <div class="blog-card__content">
                              
                               
                                <h3 class="blog-card__title"><a target="_blank" href="{{$book->url}}">{{$book->title}}</a></h3>
                           
                                
								                <a href="{{$book->url}}" class="blog-card__link">
                                    Read more
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                                
                                
                                <!-- /.blog-card__link -->
                            </div><!-- /.blog-card__content -->
                        </div>
	
</div>




@php /*
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
*/ @endphp

@endforeach

 
</div>
 

</div>

</div>
 
 

@endsection



