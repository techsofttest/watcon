@extends('layouts.app')

@section('head_metas')

<title>{{$seo->meta_title}}</title>

<meta name="description" content="{{$seo->meta_description}}">


<style>

	.ff-right-mainsec
	{
		height:100%;
	}

	.docu-row
	{
		height:100%;
	}


	.headnote-text {
    display: -webkit-box;
    -webkit-line-clamp: 2; /* Limit to 2 lines */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    transition: max-height 0.3s ease;
	}

	/* Expanded state */
	.headnote-text.expanded {
		-webkit-line-clamp: unset;
		max-height: none;
	}

</style>

@endsection


@section('content')


<div class="databb-ma-sec">
	     


<div class="container">

 
	<div class="title-area text-center">
      
	<h2 class="sec-title mb-40">Database of Water-related Legal Instruments and Cases</h2>
	  
    </div>
	
	<div class="row">


<div class="col-lg-12 col-md-12">
  
<div class="ff-right-mainsec">
  
  <!--  start   -->

  
	<style>
	.spinner {
		width: 60px;
    	height: 60px;
		border: 4px solid #ddd;
		border-top: 4px solid #3498db;
		border-radius: 50%;
		animation: spin 0.9s linear infinite;
	}
	@keyframes spin {
		100% { transform: rotate(360deg); }
	}
	</style>
	
  <div class="row docu-row">

  <div id="loader" style="display:none;align-items:center;justify-content: center;text-align:center;padding:15px;">
    <div class="spinner"></div>
  </div>

  <div class="col-md-12 d-flex document-box justify-content-center" style="margin: 10px 0px;">
  <!-- Search Form -->
  <form class="d-flex" action="{{ url('/search') }}" method="get" id="search-form" >
    <input
      type="text"
      class="form-control me-2"
      id="search-input"
      placeholder="Search..."
      aria-label="Search"
      name="q"
      value="{{ request('q') }}"
    />
    <button type="submit" class="btn btn-primary">Search</button>
  </form>
</div>

@if($cl->count() > 0 || $li->count())

    @foreach ($cl as $item)
        <div class="col-md-12 d-flex document-box">
            <div class="data-sec">

                <h4>{{ $item->categories->pluck('name')->join(', ') }}</h4>
               

                <h3>{{ $item->title ?? $item->parties }}</h3>

                <p class="headnote-text">
                {{ $item->headnote }}
                 </p>

                <a href="javascript:void(0);" class="rr-daa read-more-btn">Read More</a>

                <span>{{ $item->year }}</span>
            </div>
        </div>
    @endforeach


     @foreach ($li as $item)
        <div class="col-md-12 d-flex document-box">
            <div class="data-sec">

                <h4>{{ $item->categories->pluck('name')->join(', ') }}</h4>
               

                <h3>{{ $item->title}}</h3>

                <p class="headnote-text">
                {{ $item->headnote }}
                 </p>

                <a href="javascript:void(0);" class="rr-daa read-more-btn">Read More</a>

                <span>{{ $item->year }}</span>
            </div>
        </div>
    @endforeach
   
@else
    <div class="col-md-12 text-center py-4">
        <p style="font-size:18px; color:#888;">No documents found</p>
    </div>
@endif


			 
            </div>
  <!-------- end --->
  </div>
  </div>
  
  </div>
	
	
	</div>
	
	
	 

</div>

@endsection


@section('footer_extras')


  <script>
	function openprofile(evt, profileName) {
    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("mtabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("mtablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(profileName).style.display = "block";
    evt.currentTarget.className += " active";

    if (typeof AOS !== "undefined") {
        AOS.refresh();
    }
}
	</script>
	
		<script>
	document.getElementById("chooseBox").addEventListener("change", function () {
    let value = this.value;

    // hide all divs
    document.querySelectorAll(".box").forEach(div => div.style.display = "none");

    // show selected div
    if (value === "India") document.getElementById("boxA").style.display = "block";
    if (value === "b") document.getElementById("boxB").style.display = "block";
    if (value === "c") document.getElementById("boxC").style.display = "block";
});
	</script>
	
	
	
<script>
function accordion(section, heading, list) {
  $(section).each(function() {
    var $section = $(this);
    var $list = $section.find(list);

    // Collapse all by default
    $list.hide();

    $section.find(heading).click(function() {
      $(this).toggleClass("plus minus"); // swap classes for +/- icon
      $list.slideToggle(250);
    });
  });
}

accordion('.filter-item', '.filter-item-inner-heading', '.filter-attribute-list');
</script>


<script>
    $('#country-attribute-2').on('change', function () {
        if ($(this).is(':checked')) {
            $('#countryDiv').slideDown(); // show
        } else {
            $('#countryDiv').slideUp();   // hide
        }
    });
</script>

<script>
    $('#country-attribute-3').on('change', function () {
        if ($(this).is(':checked')) {
            $('#indiaDiv').slideDown(); // show
        } else {
            $('#indiaDiv').slideUp();   // hide
        }
    });
</script>


<script>
    $('#india-attribute-4').on('change', function () {
        if ($(this).is(':checked')) {
            $('#stateDiv').slideDown(); // show
        } else {
            $('#stateDiv').slideUp();   // hide
        }
    });
</script>


<script>
    $('#india-attribute-4').on('change', function () {
        if ($(this).is(':checked')) {
            $('#stateDiv').slideDown(); // show
        } else {
            $('#stateDiv').slideUp();   // hide
        }
    });
</script>


<script>
    $('#caselaw-attribute-2').on('change', function () {
        if ($(this).is(':checked')) {
            $('#courtDiv').slideDown(); // show
        } else {
            $('#courtDiv').slideUp();   // hide
        }
    });
</script>


<script>
    $('#highcourt-attribute').on('change', function () {
        if ($(this).is(':checked')) {
            $('#HighCourtDiv').slideDown(); // show
        } else {
            $('#HighCourtDiv').slideUp();   // hide
        }
    });
</script>


<script>
    $('#ngt-checkbox').on('change', function () {
        if ($(this).is(':checked')) {
            $('#NgtDiv').slideDown(); // show
        } else {
            $('#NgtDiv').slideUp();   // hide
        }
    });
</script>






<script>

function loadMore() {
	$("#document-container").fadeOut(300);
	$("#document-container").html("");
    let page = $("#loadMoreBtn").data("page");
    let fromYear = $("select[name=from_year]").val();
    let toYear = $("select[name=to_year]").val();

	let selectedTypes = [];
	$('.doc-type-filter:checked').each(function () {
		selectedTypes.push($(this).val());
	});

	let states = [];
	$('.state-filter:checked').each(function () {
		states.push($(this).val());
	});

	let categories = [];
	$("input[name='categories[]']:checked").each(function () {
        categories.push($(this).val());
    });

    $("#loader").show();

    $.ajax({
        url: "/load-more-documents",
        method: "GET",
        data: {
            page: page,
            from_year: fromYear,
            to_year: toYear,
			categories: categories,
			types: selectedTypes,
			states:states
        },
        success: function(res) {
            $("#document-container").append(res.html);

			$("#document-container").fadeIn(300);


            if (res.hasMore) {
                $("#loadMoreBtn").data("page", res.nextPage).show();
            } else {
                $("#loadMoreBtn").hide();
            }

           $("#loader").hide();
        }
    });
}

</script>



<script>

	$("#loadMoreBtn").on("click", function () {
    loadMore();
	});

	$("select[name=from_year], select[name=to_year], .doc-type-filter,.category-filter,.state-filter").on("change", function() {

    // Reset container
    $("#document-container").html("");

    // Reset pagination
    $("#loadMoreBtn").data("page", 1).show();

    // Load with filters
    loadMore();
	});

</script>


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(function () {
    // build years array 1900 -> current year
    const start = 1900;
    const end = new Date().getFullYear();
    const years = [];
    for (let y = start; y <= end; y++) {
        years.push({ id: String(y), text: String(y) });
    }

    // helper that returns filtered + paginated results
    function getPagedResults(term, page, perPage = 10) {
        term = (term || '').trim().toLowerCase();

        // filter by term (case-insensitive). If empty term -> include all.
        const filtered = term === ''
            ? years
            : years.filter(item => item.text.toLowerCase().indexOf(term) !== -1);

        const startIndex = (page - 1) * perPage;
        const endIndex = startIndex + perPage;
        const pageItems = filtered.slice(startIndex, endIndex);

        return {
            results: pageItems,
            pagination: {
                more: endIndex < filtered.length
            }
        };
    }

    // initialize both selects (matching your class)
    $('.select-year').each(function () {
        $(this).select2({
            placeholder: $(this).attr('data-placeholder') || 'Select year',
            width: '100%',
            allowClear: true,
            ajax: {
                transport: function (params, success, failure) {
                    // params.data.term  -> search term
                    // params.data.page  -> page number
                    const term = params.data.term || '';
                    const page = params.data.page ? parseInt(params.data.page) : 1;
                    const data = getPagedResults(term, page, 10);
                    // Select2 expects the object exactly as { results, pagination }
                    success(data);
                },
                processResults: function (data /* = {results, pagination} */) {
                    return data;
                },
                delay: 150 // small debounce
            },
            // send page param (Select2 uses "page")
            escapeMarkup: function (m) { return m; },
            minimumInputLength: 0
        });

        // ensure initial placeholder / empty option exists so select2 shows placeholder
        if ($(this).find('option:selected').length === 0) {
            $(this).append('<option value=""></option>');
        }
    });

    // optional: keep 'to' minimum >= 'from' (basic enforcement)
    $('#from_year').on('change', function () {
        const from = parseInt($(this).val()) || null;
        const toEl = $('#to_year');

        if (from) {
            const selectedTo = parseInt(toEl.val()) || null;
            if (selectedTo && selectedTo < from) {
                // clear to_year if it's less than from
                toEl.val(null).trigger('change.select2');
            }
        }
        // trigger reload of results (if you auto-load on change)
        // loadDocuments(true);
    });
});
</script>


<script>
// Use event delegation for dynamically added "Read More" links
document.querySelector('#document-container').addEventListener('click', function(e) {
    if (e.target.classList.contains('read-more-btn')) {
        let p = e.target.previousElementSibling; // <p> tag
        p.classList.toggle('expanded');
        e.target.textContent = p.classList.contains('expanded') ? 'Read Less' : 'Read More';
    }
});


loadMore();

</script>


@endsection





