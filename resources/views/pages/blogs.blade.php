@extends('layouts.app')

@section('head_metas')

<title>{{$seo->meta_title}}</title>

<meta name="description" content="{{$seo->meta_description}}">

<style>
.blog-author
{
    font-size: 16px !important;
    color: #cd652c !important;
}


</style>

@endsection


@section('content')


<div class=" New-blogsec ">
	       
<div class="container">
 <div class="title-area text-center">
      <h2 class="sec-title mb-20">{{$title}}</h2>
	  
    </div>
 <div class="row">
 
 
 
 <div class="row justify-content-center">
 
 
 
 
 <div class="col-lg-10 col-md-12  ">
 <div class="row justify-content-center">
	


@foreach($blogs as $blog)


<div class="col-lg-3 col-md-3 col-sm-6 d-flex  " data-aos="zoom-in" data-aos-duration="800">
	
	<div class="blog-card">
						 <div class="blog-card__date">
                                    <h4 class="blog-card__date-number">@php echo date('M',strtotime($blog->publish_date)) @endphp</h4>
                                    <h4 class="blog-card__date-month"> @php echo date('Y',strtotime($blog->publish_date)) @endphp</h4>
                                    

                                </div><!-- /.blog-card__date -->
                            <a href="{{url('blogs')}}/{{$blog->slug}}" class="blog-card__image-link">
								
                                <img src="{{asset('storage')}}/{{$blog->featured_image}}" alt="{{$blog->title}}" width="100%" class="blog-card__image">
                                <div class="blog-card__overlay">
                                   
                                </div><!-- /.blog-card__overlay -->
                            </a><!-- /.blog-card__image-link -->
                            <div class="blog-card__content">
                              
                               
                                <h3 class="blog-card__title"><a href="{{url('blogs')}}/{{$blog->slug}}">{{$blog->title}}</a></h3><!-- /.blog-card__title -->
                           

                                @if(!empty($blog->author))<h4 class="blog-card__title blog-author">By {{$blog->author}}</h4>@endif

                                <!--
								<a href="{{url('blogs')}}/{{$blog->slug}}" class="blog-card__link">
                                    Read more
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                                -->
                                
                                <!-- /.blog-card__link -->
                            </div><!-- /.blog-card__content -->
                        </div>
	
</div>


@endforeach


	
	</div>
 
 </div>
 
 
 </div>
 
   </div>
</div>
</div>


@endsection



