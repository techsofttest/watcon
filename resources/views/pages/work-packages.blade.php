@extends('layouts.app')

@section('head_metas')

<title>{{$seo->meta_title}}</title>

<meta name="description" content="{{$seo->meta_description}}">

@endsection


@section('content')


<div class="workpack-ma-sec">
 

<div class="container">

	<div class="title-area text-center">

    <h2 class="sec-title mb-20">Work Packages</h2>
	  
    </div>

	<div class="row justify-content-center">
	
	@foreach($packages as $package)

	<div class="col-lg-4 col-md-6 col-sm-12 d-flex">
	<div class="workbox-bb">

	<div class="workbox-no">
	
	<h2>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</h2>
	<div class="workbox-heading">
	<h3>{{$package->title}}</h3>
	</div>
		
	</div>

	<div class="workbox-desc">

	{!! $package->description !!}

	</div>
	
	</div>
	
	</div>

	@endforeach
			
	
	
	</div>

</div>
	 
	</div> 


@endsection


@section('footer_extras')



<script>

function equalHeight() {
    let maxHeight = 0;

    document.querySelectorAll('.workbox-bb').forEach(elem => {
        elem.style.height = 'auto'; // reset first
        let h = elem.offsetHeight;
        if (h > maxHeight) maxHeight = h;
    });

    document.querySelectorAll('.workbox-bb').forEach(elem => {
        elem.style.height = maxHeight + 'px';
    });
}

$(window).on('load', function () {
    equalHeight();
});

window.addEventListener('resize', equalHeight);

</script>

@endsection



