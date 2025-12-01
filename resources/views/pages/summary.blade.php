@extends('layouts.app')

@section('head_metas')

<title>{{$seo->meta_title}}</title>

<meta name="description" content="{{$seo->meta_description}}">

{{$seo->custom_head_scripts}}


<style>

.partner-box img {
    width: 100%;
    height: 95px !important;
    object-fit: contain;
}

.partner-area h3
{
    color: #cd650f;
    font-weight: 700;
    font-size: 25px;
}

</style>

@endsection


@section('content')

{{$seo->custom_body_scripts}}


<div class="Abb-sec">

 
<div class="container">

<div class="row justify-content-center">
<div class="col-lg-10">
<div class="text-center about-logo"><img src="{{asset('img/about-logo.avif')}}" alt=""></div>

{!! $summary->content !!}

</div>
</div>
 </div>
</div>
<div class="Partner-sec">
 
 
<div class="container">


<div class="row justify-content-center">
<div class="col-lg-10">
		<div class="title-area partner-area mb-50 text-center">
      <h3 class=""><strong> Our Partners</strong></h3>
	   
    </div>
<div class="row justify-content-center">


@foreach($partners as $partner)
<div class="col-auto">
<div class="partner-box">

<img src="{{asset('storage')}}/{{$partner->logo}}" alt="{{$partner->name}}">

</div>
</div>
@endforeach




</div>
</div>

</div>
</div>
</div>
	


@endsection