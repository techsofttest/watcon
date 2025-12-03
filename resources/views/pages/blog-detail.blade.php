@extends('layouts.app')

@section('head_metas')

<title>{{$blog->meta_title}}</title>

<meta name="description" content="{{$blog->meta_description}}">

<style>


    figure.image {
    margin: 0px;
    padding: 10px;
    }

    .image img{
    border-radius:10px;
    }
      
      



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
        
        p img
        {
        padding: 15px;
        border-radius: 25px;
        }



        /* Make CKEditor tables fully responsive */

        figure.table
        {
            margin: 0;
        }
.bb-left table {
    width: 100% !important;
    table-layout: fixed !important;
    border-collapse: collapse;
}

/* 2-column cells split into vertical layout on mobile */
.bb-left table td {
    vertical-align: top;
    padding: 10px;
    word-break: break-word;
}

/* Images should NOT keep CKEditor’s inline width */
.bb-left img {
    width: 100% !important;
    height: auto !important;
    max-width: 100% !important;
    display: block;
}

/* Remove CKEditor forced width on figure */
.bb-left figure.image,
.bb-left figure.table {
    width: 100% !important;
    max-width: 100% !important;
}

/* Remove spacing caused by CKEditor resizing classes */
.bb-left .image_resized {
    width: 100% !important;
    max-width: 100% !important;
}

/* Mobile: make each cell full width */
@media (max-width: 768px) {
    .bb-left table tr {
        display: block !important;
    }
    .bb-left table td {
        display: block !important;
        width: 100% !important;
    }
}



/* Make table responsive by stacking on mobile */
@media (max-width: 768px) {
  .ck-content table,
  .ck-content thead,
  .ck-content tbody,
  .ck-content th,
  .ck-content td,
  .ck-content tr {
      display: block;
      width: 100%;
  }

  .ck-content thead tr {
      display: none; /* hide table header */
  }

  .ck-content tr {
      margin-bottom: 15px;
      padding: 10px;
  }

  .ck-content td {
      text-align: right;
      padding-left: 50%;
      position: relative;
  }

  .ck-content td::before {
      content: attr(data-label);  /* Pull column name */
      position: absolute;
      left: 10px;
      width: 45%;
      text-align: left;
      font-weight: bold;
  }
}


/* Remove CKEditor figure margins/padding */
.ck-content figure.image {
    margin: 0 !important;
    padding: 0 !important;
}

/* Override CKEditor aspect-ratio on images */
.ck-content figure.image img {
    aspect-ratio: auto !important;
    width: 100% !important;
    height: auto !important;
    display: block !important;
}

/* Make table cells align from top */
.ck-content table td {
    vertical-align: top !important;
}

</style>


<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>


@endsection


@section('content')

<div class=" New-blogsecdetaikl ">
 
<div class="container">

@if(!empty($blog->description))  
<div class="bb-top">
<div class="row justify-content-between align-items-center">

<div class="col-auto"><img src="{{asset('img/bb-logo.png')}}" class="bb-logo" alt="Logo"></div>

<div class="col-auto"><h3 class="dattsec">@php echo date('d F Y',strtotime($blog->publish_date)) @endphp</h3></div>

</div>

</div>
    <div class="title-area  ">

      <h2 class="sec-title mb-20">{{$blog->title}}</h2>
	  
    </div>
@endif
	
        
        <div class="row">

       

       
        <div class="col-lg-12" style="text-align:right;margin:5px 0px">
        
        @if(!empty($blog->pdf_file))
        <a target="_blank" href="{{url('storage')}}/{{$blog->pdf_file}}" class="btn btn-primary">
            Download
        </a>
        @endif

        <button type="button" class="btn btn-secondary" onclick="window.history.back()">
                    ← Back
        </button>

        </div>


        </div>

        
                

	
    @if(!empty($blog->description))
	<div class="row justify-content-center">

	<div class="col-lg-10 col-12">
	
	<div class="bb-left ck-content">
	
    {!! $blog->description !!}

	</div>
	</div>

    <!--
	<div class="col-lg-6">
	
	<div class="bb-right">
	<img src="{{asset('storage')}}/{{$blog->featured_image}}" alt="{{$blog->title}}" width="100%">
	</div>
	</div>
	-->

	</div>
    @endif




    @if(empty($blog->description))

    <div class="row">

    <style>
        #pdfContainer canvas {
            width: 100% !important;     /* make each page 100% width */
            height: auto !important;
            display: block;
            margin-bottom: 20px;
        }
    </style>

<div id="pdfContainer" style="width:75%; overflow:auto;margin:0px auto;"></div>

    </div>

    @endif

 
   </div>
</div>


@endsection



@section('footer_extras')


<script>
    const pdfUrl = "{{asset('storage')}}/{{$blog->pdf_file}}"; // your PDF path

    pdfjsLib.getDocument(pdfUrl).promise.then(pdf => {
        for (let i = 1; i <= pdf.numPages; i++) {

            pdf.getPage(i).then(page => {
                const viewport = page.getViewport({ scale: 1.5 });

                const canvas = document.createElement('canvas');
                const context = canvas.getContext('2d');

                canvas.width = viewport.width;
                canvas.height = viewport.height;

                document.getElementById('pdfContainer').appendChild(canvas);

                page.render({
                    canvasContext: context,
                    viewport: viewport
                });
            });

        }
    });
</script>


@endsection


