@extends('layouts.app')

@section('head_metas')

<title>{{$publication->meta_title}}</title>

<meta name="description" content="{{$publication->meta_description}}">


<style>

	/* Bootstrap Button Base Styles (purged CSS recovery) */
        .btn {
            display: inline-block;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            border-radius: 0.375rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn:hover {
            color: #212529;
        }

        .btn:focus {
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .btn:disabled {
            pointer-events: none;
            opacity: 0.65;
        }

        /* Primary Button */
        .btn-primary {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }

        .btn-primary:focus {
            color: #fff;
            background-color: #0b5ed7;
            border-color: #0a58ca;
            box-shadow: 0 0 0 0.25rem rgba(49, 132, 253, 0.5);
        }

        /* Secondary Button */
        .btn-secondary {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            color: #fff;
            background-color: #5c636a;
            border-color: #565e64;
        }

        .btn-secondary:focus {
            color: #fff;
            background-color: #5c636a;
            border-color: #565e64;
            box-shadow: 0 0 0 0.25rem rgba(130, 138, 145, 0.5);
        }

        /* Outline Primary Button */
        .btn-outline-primary {
            color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-outline-primary:hover {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-outline-primary:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.5);
        }

        /* Outline Secondary Button */
        .btn-outline-secondary {
            color: #6c757d;
            border-color: #6c757d;
        }

        .btn-outline-secondary:hover {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-outline-secondary:focus {
            box-shadow: 0 0 0 0.25rem rgba(108, 117, 125, 0.5);
        }

        /* Button Sizes */
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            border-radius: 0.25rem;
        }

        .btn-lg {
            padding: 0.5rem 1rem;
            font-size: 1.25rem;
            border-radius: 0.5rem;
        }

        /* Margin utilities */
        .mb-3 {
            margin-bottom: 1rem !important;
        }

        .me-2 {
            margin-right: 0.5rem !important;
        }

        /* Display utilities */
        .d-flex {
            display: flex !important;
        }

        .align-items-center {
            align-items: center !important;
        }

</style>


@endsection


@section('content')

<div class=" New-blogsecdetaikl">
 
<div class="container">
 

	<div class="title-area  ">

    <h2 class="sec-title mb-20"><i>{{$publication->title}}</i></h2>

  </div>
	
	<div class="row align-items-center">

	<div class="col-12" style="text-align:right;margin:5px 0px"><button type="button" class="btn btn-secondary" onclick="window.history.back()">
                    ← Back
                </button></div>

	<div class="col-lg-6">
	
	<div class="bb-right">
	<img src="{{asset('storage')}}/{{$publication->image}}" alt="{{$publication->title}}" width="100%"  >
	</div>

	</div>
	<div class="col-lg-6">
	
	<div class="bb-left">
	
	
  {!! $publication->description !!}
	
	</div>
	</div>
	
	</div>

 
   </div>
</div>
 

@endsection



