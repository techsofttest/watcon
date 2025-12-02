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


	.select2-container--default .select2-selection--single .select2-selection__rendered
	{
		background: var(--title-color2) !important;
	}

	.ff-price .field__input
	{
		background-color: var(--title-color2) !important;
	}

	.select2-search__field
	{
	height:30px !important;
	}

	.select2-container .select2-selection--single {
    height: unset !important;
	}

	.select2-container--default .select2-selection--single .select2-selection__clear
 	{
    background: var(--title-color2) !important;
 	}

	.select2-container--default .select2-selection--single .select2-selection__arrow {
    background: var(--title-color2);
	}

	.select2-dropdown {
    background-color: var(--title-color2) !important;
	}

	.select2-search__field
	{
	background-color: var(--title-color2) !important;
	}


	.select2-container--default .select2-results>.select2-results__options
	{
		scrollbar-color: #325671 #fff7cb;
		scrollbar-width: thin;
	}




	.pdf-btn
	{
	color: #cd650f;
    font-weight: 700;
    font-size: 18px;
    margin-bottom: 0px;
    content: "";
    position: absolute;
    top: 20px;
    right: 30px;
	}

	.pdf-btn i
	{
	color: #cd650f;
	}

	.fa-download:before {
    content: "\f019";
	}



 .table-container {
            max-width: 900px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .table-bordered {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            margin: 0;
        }

        .table-bordered td {
            padding: 12px 0px;
            /*border: 1px solid #ddd;*/
            vertical-align: middle;
        }

        .table-bordered tr td:nth-child(odd) {
            background-color: #325671;
			font-weight: 600;
			color: #ffffff;
			/*width: 25%;*/
        }

        .table-bordered tr td:nth-child(even) {
           background-color: #325671;
			color: #ffffff;
			/*width: 25%;*/
        }


		.parties_filter
		{
		height: 35px !important;
		background: var(--title-color2) !important;
		}

		.parties-filter-label
		{
		font-size: 15px;
    	font-weight: 600;
    	color: var(--title-color2);
		}


	.category-container {
      border-radius: 12px;
      margin-bottom: 15px;
    }

    .category-pill {
      display: inline-flex;
      align-items: center;
      padding: 6px 10px;
	  margin: 3px 0px;
      background-color: #fff7cb;
	  position:unset  !important;
      border-radius: 9999px;
      font-size: 14px;
      font-weight: 500;
      user-select: none;
    }
        

	.title-area .sec-title
	{
	margin-bottom: 50px !important;
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
  <div class="col-lg-4 col-md-4">
  
    <div class="ff-side-mainsec">
	<div class="ff-filter">
	
	<h3 class="ff-filter-heading">Search Options</h3>
	
	</div>
	
 

		<aside class="sidebar-aa">
		  <ul class="filter ul-reset">
				<li class="filter-item">
					<section class="filter-item-inner">
						<h3 class="filter-item-inner-heading minus">
							Country/International
						</h3>
						<ul class="filter-attribute-list ul-reset" style="display: none;">
							<div class="filter-attribute-list-inner">
								<li class="filter-attribute-item">
									<input type="checkbox" id="country-attribute-1" class="country_filter filter-attribute-checkbox ib-m">
									<label for="country-attribute-1" class="filter-attribute-label ib-m">
					International

									</label>
								</li>
								 
							 
							 	<li class="filter-attribute-item">
									<input type="checkbox" id="country-attribute-2" value="other" class="country_filter filter-attribute-checkbox ib-m">
									<label for="country-attribute-2" class="filter-attribute-label ib-m">
					Other Countries
									</label>
									
									<div id="countryDiv" class="orter-padd" style="display:none;">
 	  <ul class="filter ul-reset">


			 <li class="filter-item">
						<ul class="filter-attribute-list ul-reset"  >
							<div class="filter-attribute-list-inner">


							<li class="filter-attribute-item">
									<input type="checkbox" id="other-attribute-all" value="all" class="country_filter filter-attribute-checkbox ib-m">
									<label for="other-attribute-all" class="filter-attribute-label ib-m">
								
									Select All

									</label>
							</li>


							@foreach($countries as $country)
								<li class="filter-attribute-item">
									<input type="checkbox" id="other-attribute-{{$country->name}}" value="{{$country->id}}" class="country_filter filter-attribute-checkbox ib-m">
									<label for="other-attribute-{{$country->name}}" class="filter-attribute-label ib-m">

									{{$country->name}}

									</label>
								</li>
							@endforeach

									 
							</div>
						</ul>
		 
				</li>

			 

		 
			</ul>
</div>
								</li>
							  	<li class="filter-attribute-item">
									<input type="checkbox" id="country-attribute-3" value="1" class="country_filter filter-attribute-checkbox ib-m">
									<label for="country-attribute-3" class="filter-attribute-label ib-m">
					India

									</label>
									
									
										<div id="indiaDiv" class="orter-padd" style="display:none;">
 	  <ul class="filter ul-reset">
			 <li class="filter-item">
						<ul class="filter-attribute-list ul-reset"  >
							<div class="filter-attribute-list-inner">
								<li class="filter-attribute-item">
									<input type="checkbox" id="india-attribute-1" value="all" class="filter-attribute-checkbox countrytype-checkbox ib-m">
									<label for="india-attribute-1" class="filter-attribute-label ib-m">
									
									Select All

									</label>
								</li>
								<li class="filter-attribute-item">
									<input type="checkbox" id="india-attribute-2" value="union" class="countrytype-checkbox filter-attribute-checkbox ib-m">
									<label for="india-attribute-2" class="filter-attribute-label ib-m">
										
									Union

									</label>
								</li>
								<li class="filter-attribute-item">
									<input type="checkbox" id="india-attribute-3" value="inter" class="countrytype-checkbox filter-attribute-checkbox ib-m">
									<label for="india-attribute-3" class="filter-attribute-label ib-m">
				Inter-state

									</label>
								</li>
								<li class="filter-attribute-item">
									<input type="checkbox" id="india-attribute-4" value="state" class="countrytype-checkbox filter-attribute-checkbox ib-m">
									<label for="india-attribute-4" class="filter-attribute-label ib-m">
				State

									</label>
									
									
																	
										<div id="stateDiv" class="orter-padd" style="display:none;">
 	  <ul class="filter ul-reset">
			 <li class="filter-item">
						<ul class="filter-attribute-list ul-reset"  >
							<div class="filter-attribute-list-inner">


							<li class="filter-attribute-item">
									<input type="checkbox" id="state-cc-attribute-all" value="all" class="state-filter filter-attribute-checkbox ib-m">
									<label for="state-cc-attribute-all" class="filter-attribute-label ib-m">

										Select All

									</label>
								</li>


								@foreach($states as $state)
								<li class="filter-attribute-item">
									<input type="checkbox" id="cc-attribute-{{$state->id}}" value="{{$state->id}}" class="state-filter filter-attribute-checkbox ib-m">
									<label for="cc-attribute-{{$state->id}}" class="filter-attribute-label ib-m">

										{{$state->name}}

									</label>
								</li>
								@endforeach
								
							 
									 
							 
									 
							</div>
						</ul>
		 
				</li>

			 

		 
			</ul>
</div>
									
									
									
								</li>
							
							 
									 
							 
									 
							</div>
						</ul>
		 
				</li>

			 

		 
			</ul>
</div>
								</li>
									 
							</div>
						</ul>
					</section>
				</li>

			 

		 
			</ul>
		</aside>
		
		<aside class="sidebar-aa">
		  <ul class="filter ul-reset">
				<li class="filter-item">
					<section class="filter-item-inner">
						<h3 class="filter-item-inner-heading minus">
						Type of documents
						</h3>
						<ul class="filter-attribute-list ul-reset" style="display: none;">
							<div class="filter-attribute-list-inner">
							
							<li class="filter-attribute-item">
								<input type="checkbox" 
									id="ksize-attribute-0" 
									class="filter-attribute-checkbox doc-type-filter" 
									value="all">
								<label for="ksize-attribute-0" class="filter-attribute-label ib-m">
									<span class="color-codd cc1"></span> Select All
								</label>
							</li>

							<li class="filter-attribute-item">
								<input type="checkbox" 
									id="ksize-attribute-1" 
									class="filter-attribute-checkbox doc-type-filter" 
									value="legal">
								<label for="ksize-attribute-1" class="filter-attribute-label ib-m">
									Legal Instruments
								</label>
							</li>

							<li class="filter-attribute-item">
								<input type="checkbox" 
									id="caselaw-attribute-2" 
									class="filter-attribute-checkbox doc-type-filter" 
									value="caselaw">
								<label for="caselaw-attribute-2" class="filter-attribute-label ib-m">
									Case Law
								</label>

@php
    $courts = [
        'Allahabad HC',
        'Andhra Pradesh HC',
        'Bombay HC',
        'Calcutta HC',
        'Chhattisgarh HC',
        'Delhi HC',
        'Gauhati HC',
        'Gujarat HC',
        'Himachal HC',
        'J & K HC',
        'Karnataka HC',
        'Kerala HC',
        'Madhya Pradesh HC',
        'Madras HC',
        'Manipur HC',
        'Meghalaya HC',
        'Mysore HC',
        'Orissa HC',
        'Patna HC',
        'Punjab & Haryana HC',
        'Rajasthan HC',
        'Sikkim HC',
        'Telangana HC',
        'Tripura HC',
        'Uttarakhand HC',
    ];
@endphp

								<div id="courtDiv" class="orter-padd" style="display:none;">
								<ul class="filter ul-reset">
									<li class="filter-item">
										<ul class="filter-attribute-list ul-reset">
											<div class="filter-attribute-list-inner">


											<li class="filter-attribute-item">
													<input type="checkbox" id="cc-attribute-all" value="all" class="court-filter filter-attribute-checkbox ib-m">
													<label for="cc-attribute-all" class="filter-attribute-label ib-m">
														Select All
													</label>
											</li>


												<li class="filter-attribute-item">
													<input type="checkbox" id="cc-attribute-sc" value="sc" class="court-filter filter-attribute-checkbox ib-m">
													<label for="cc-attribute-sc" class="filter-attribute-label ib-m">
														Supreme Court
													</label>
												</li>

												<li class="filter-attribute-item">
													<input type="checkbox" id="highcourt-attribute" value="hc" class="court-filter filter-attribute-checkbox ib-m">
													<label for="highcourt-attribute" class="filter-attribute-label ib-m">
														High Courts
													</label>

													<div id="HighCourtDiv" class="orter-padd" style="display:none;">
													<ul class="filter ul-reset">
														<li class="filter-item">
															<ul class="filter-attribute-list ul-reset">
																<div class="filter-attribute-list-inner">

																	<li class="filter-attribute-item">
																		<input type="checkbox" id="hcc-attribute-all" value="all" class="hcourt-filter filter-attribute-checkbox ib-m">
																		<label for="hcc-attribute-all" class="filter-attribute-label ib-m">
																			Select All
																		</label>
																	</li>

																	@foreach($courts as $index => $court)
																	<li class="filter-attribute-item">
																		<input type="checkbox" id="hcc-attribute-{{$index}}" value="{{$court}}" class="hcourt-filter filter-attribute-checkbox ib-m">
																		<label for="hcc-attribute-{{$index}}" class="filter-attribute-label ib-m">
																			{{$court}}
																		</label>
																	</li>
																	@endforeach

																</div>
															</ul>
														</li>
													</ul>
												</div>



												</li>

												<li class="filter-attribute-item">
													<input type="checkbox" id="ngt-checkbox" value="ngt" class="court-filter filter-attribute-checkbox ib-m">
													<label for="ngt-checkbox" class="filter-attribute-label ib-m">
														NGT
													</label>

													<div id="NgtDiv" class="orter-padd" style="display:none;">
													<ul class="filter ul-reset">
														<li class="filter-item">
															<ul class="filter-attribute-list ul-reset">
																<div class="filter-attribute-list-inner">
																	

																	<li class="filter-attribute-item">
																		<input type="checkbox" id="ngt-attribute-all" value="all" class="ngt-filter filter-attribute-checkbox ib-m">
																		<label for="ngt-attribute-all" class="filter-attribute-label ib-m">
																			Select All
																		</label>
																	</li>


																	<li class="filter-attribute-item">
																		<input type="checkbox" id="ngt-attribute-1" value="Principal Bench" class="ngt-filter filter-attribute-checkbox ib-m">
																		<label for="ngt-attribute-1" class="filter-attribute-label ib-m">
																			Principal Bench
																		</label>
																	</li>

																	<li class="filter-attribute-item">
																		<input type="checkbox" id="ngt-attribute-2" value="Central Zone Bench" class="ngt-filter filter-attribute-checkbox ib-m">
																		<label for="ngt-attribute-2" class="filter-attribute-label ib-m">
																			Central Zone Bench
																		</label>
																	</li>

																	<li class="filter-attribute-item">
																		<input type="checkbox" id="ngt-attribute-3" value="Eastern Zone Bench" class="ngt-filter filter-attribute-checkbox ib-m">
																		<label for="ngt-attribute-3" class="filter-attribute-label ib-m">
																			Eastern Zone Bench
																		</label>
																	</li>


																	<li class="filter-attribute-item">
																		<input type="checkbox" id="ngt-attribute-4" value="Southern Zone Bench" class="ngt-filter filter-attribute-checkbox ib-m">
																		<label for="ngt-attribute-4" class="filter-attribute-label ib-m">
																			Southern Zone Bench
																		</label>
																	</li>

																	<li class="filter-attribute-item">
																		<input type="checkbox" id="ngt-attribute-5" value="Western Zone Bench" class="ngt-filter filter-attribute-checkbox ib-m">
																		<label for="ngt-attribute-5" class="filter-attribute-label ib-m">
																			Western Zone Bench
																		</label>
																	</li>

																	<li class="filter-attribute-item">
																		<input type="checkbox" id="ngt-attribute-6" value="NGT Special Branch" class="ngt-filter filter-attribute-checkbox ib-m">
																		<label for="ngt-attribute-6" class="filter-attribute-label ib-m">
																			NGT Special Branch
																		</label>
																	</li>

																</div>
															</ul>
														</li>
													</ul>
												</div>


												</li>

												<li class="filter-attribute-item">
													
													<input type="checkbox" id="cc-attribute-dc" value="dc" class="court-filter filter-attribute-checkbox ib-m">
													
													<label for="cc-attribute-dc" class="filter-attribute-label ib-m">
														District Courts
													</label>



													<div id="DistrictCourtDiv" class="orter-padd" style="display:none;">
													<ul class="filter ul-reset">
														<li class="filter-item">
															<ul class="filter-attribute-list ul-reset">
																<div class="filter-attribute-list-inner">


													<li class="filter-attribute-item">
														<input type="checkbox" id="dc-attribute-1" value="1" class="dcourt-filter filter-attribute-checkbox ib-m">
														<label for="dc-attribute-1" class="filter-attribute-label ib-m">
														East Khasi Hills
														</label>
													</li>


													<li class="filter-attribute-item">
														<input type="checkbox" id="dc-attribute-2" value="1" class="dcourt-filter filter-attribute-checkbox ib-m">
														<label for="dc-attribute-2" class="filter-attribute-label ib-m">
														West Khasi Hills
														</label>
													</li>


													<li class="filter-attribute-item">
														<input type="checkbox" id="dc-attribute-3" value="1" class="dcourt-filter filter-attribute-checkbox ib-m">
														<label for="dc-attribute-3" class="filter-attribute-label ib-m">
														East Jaintia Hills
														</label>
													</li>


													<li class="filter-attribute-item">
														<input type="checkbox" id="dc-attribute-4" value="1" class="dcourt-filter filter-attribute-checkbox ib-m">
														<label for="dc-attribute-4" class="filter-attribute-label ib-m">
														West Jaintia Hills
														</label>
													</li>

													
																</div>
															</ul>
														</li>
													</ul>
												</div>




												</li>

												<li class="filter-attribute-item">
													<label for="cc-attribute-dc" class="filter-attribute-label ib-m parties-filter-label">
														Parties
													</label>
													<input type="text" value="" class="parties_filter filter-attribute-checkbox ib-m">
													
												</li>

											</div>
										</ul>
									</li>
								</ul>
							</div>







							</li>
							
							 
									 
							 
									 
							</div>
						</ul>
					</section>
				</li>

			 

		 
			</ul>
		</aside>
		
		
		
			<aside class="sidebar-aa">
		  <ul class="filter ul-reset">
				<li class="filter-item">
					<section class="filter-item-inner">
						<h3 class="filter-item-inner-heading minus">
					Themes
						</h3>
						<ul class="filter-attribute-list ul-reset" style="display: none;">
							<div class="filter-attribute-list-inner">
							
							<li class="filter-attribute-item">
									<input type="checkbox" id="state-attribute-0" value="all" class="filter-attribute-checkbox category-filter ib-m">
									<label for="state-attribute-0" class="filter-attribute-label ib-m">
									<span class="color-codd cc1"></span>Select All

									</label>
								</li>

								@foreach($categories as $category)
								<li class="filter-attribute-item">

									<input 
										type="checkbox"
										name="categories[]"
										id="category-{{ $category->id }}"
										value="{{ $category->id }}"
										class="filter-attribute-checkbox category-filter ib-m"
									>

									<label for="category-{{ $category->id }}" class="filter-attribute-label ib-m">
										{{ $category->name }}
									</label>

								</li>
							@endforeach

								
							
							

 
							 
									 
							</div>
						</ul>
					</section>
				</li>

			 

		 
			</ul>
		</aside>
	<div class="ff-price">
	
 
	@php /*
	<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <select class="field__input" name="from_year"> 
            <option selected disabled>Year (from)</option>
            <option value="1999">1999</option>
            <option value="2000">2000</option>
            <option value="2001">2001</option>
            <option value="2002">2002</option>
            <option value="2003">2003</option>
            <option value="2004">2004</option>
            <option value="2005">2005</option>
			<option value="2010">2010</option>
			<option value="2012">2012</option>
        </select>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6">
        <select class="field__input" name="to_year"> 
            <option selected disabled>Year (to)</option>
            <option value="1999">1999</option>
            <option value="2000">2000</option>
            <option value="2001">2001</option>
            <option value="2002">2002</option>
            <option value="2003">2003</option>
            <option value="2004">2004</option>
			<option value="2010">2010</option>
            <option value="2025">2025</option>
        </select>
    </div>
</div>
*/ @endphp


<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <select data-placeholder="Year (From)" class="field__input select-year" id="from_year" name="from_year"></select>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6">
        <select data-placeholder="Year (To)" class="field__input select-year" id="to_year" name="to_year"></select>
    </div>
</div>



	</div>
	
	</div>
  </div>
    <div class="col-lg-8 col-md-8">
  
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

  <div id="document-container">
	
    <div class="col-md-12 text-center py-4">
        <p style="font-size:18px; color:#888;"></p>
    </div>

	</div>

<!--
<div class="text-center mt-4">
    <button id="load-more-btn" class="btn btn-primary" data-page="1">Load More</button>
</div>
-->

			 
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
    $('#cc-attribute-dc').on('change', function () {
        if ($(this).is(':checked')) {
            $('#DistrictCourtDiv').slideDown(); // show
        } else {
            $('#DistrictCourtDiv').slideUp();   // hide
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



let currentRequest = null;

function loadMore() {
    
	//$("#document-container").fadeOut(300);
	$("#document-container").html("");
    let page = $("#loadMoreBtn").data("page");
    let fromYear = $("select[name=from_year]").val();
    let toYear = $("select[name=to_year]").val();

	let parties = $(".parties_filter").val();

	let countries = [];
	$('.country_filter:checked').each(function () {
		countries.push($(this).val());
	});

	let selectedTypes = [];
	$('.doc-type-filter:checked').each(function () {
		selectedTypes.push($(this).val());
	});
	
	let countrytypes = [];
	$('.countrytype-checkbox:checked').each(function () {
		countrytypes.push($(this).val());
	});

	let states = [];
	$('.state-filter:checked').each(function () {
		states.push($(this).val());
	});

	let categories = [];
	$("input[name='categories[]']:checked").each(function () {
        categories.push($(this).val());
    });

	let courttypes = [];
	$(".court-filter:checked").each(function () {
        courttypes.push($(this).val());
    });

	let highcourts = [];
	$(".hcourt-filter:checked").each(function () {
        highcourts.push($(this).val());
    });

	let ngtfilter = [];
	$(".ngt-filter:checked").each(function () {
        ngtfilter.push($(this).val());
    });

    if (currentRequest) {
        currentRequest.abort();
    }
    
    $("#loader").show();

    currentRequest = $.ajax({
        url: "/load-more-documents",
        method: "GET",
        data: {
            page: page,
            from_year: fromYear,
            to_year: toYear,
			categories: categories,
			types: selectedTypes,
			countries:countries,
			states:states,
			highcourts:highcourts,
			courttypes:courttypes,
			ngtfilter:ngtfilter,
			parties:parties,
			countrytypes:countrytypes,
        },
        success: function(res) {
            
            $("#document-container").html(res.html);

			//$("#document-container").fadeIn(300);


            if (res.hasMore) {
                //$("#loadMoreBtn").data("page", res.nextPage).show();
            } else {
                //$("#loadMoreBtn").hide();
            }

           //$("#loader").hide();
        },
        complete: function() {
            $("#loader").hide();
            currentRequest = null; // reset
        }
    });
}

</script>



<script>

	$("#loadMoreBtn").on("click", function () {
    loadMore();
	});

	$(".country_filter,select[name=from_year], select[name=to_year], .doc-type-filter,.category-filter,.state-filter,.countrytype-checkbox,.hcourt-filter,.court-filter,.ngt-filter").on("change", function() {


	if ($(this).hasClass("country_filter")) {

    const value = $(this).val();

    // CASE 1: User clicks "all"
    if (value === "all") {

        // Uncheck all EXCEPT "all" and "other"
        $('.country_filter').each(function() {
            if ($(this).val() !== "all" && $(this).val() !== "other" && $(this).val() != "1") {
                $(this).prop('checked', false);
            }
        });
    }

    // CASE 2: User clicks any other (including "other")
    else {
        // Uncheck only "all"
        $('.country_filter[value="all"]').prop('checked', false);
    }
	}




	if ($(this).hasClass("category-filter")) {

        if ($(this).val() === "all") {
            // If "all" is checked
            $('.category-filter').not(this).prop('checked', false);
        } else {
            // If any other checkbox is checked → uncheck "all"
            $('.category-filter[value="all"]').prop('checked', false);
        }
    }



	if ($(this).hasClass("state-filter")) {

        if ($(this).val() === "all") {
            // If "all" is checked
            $('.state-filter').not(this).prop('checked', false);
        } else {
            // If any other checkbox is checked → uncheck "all"
            $('.state-filter[value="all"]').prop('checked', false);
        }
    }


	if ($(this).hasClass("doc-type-filter")) {

        if ($(this).val() === "all") {
            // If "all" is checked
            $('.doc-type-filter').not(this).prop('checked', false);
        } else {
            // If any other checkbox is checked → uncheck "all"
            $('.doc-type-filter[value="all"]').prop('checked', false);
        }
    }


	if ($(this).hasClass("countrytype-checkbox")) {

        if ($(this).val() === "all") {
            // If "all" is checked
            $('.countrytype-checkbox').not(this).prop('checked', false);
        } else {
            // If any other checkbox is checked → uncheck "all"
            
           $('.countrytype-checkbox[value="all"]').prop('checked', false);
            
            if ($(this).val() === "state" && !$(this).is(':checked')) {
            $('.state-filter').prop('checked', false);
            }
        
        }
    }



	if ($(this).hasClass("court-filter")) {

        if ($(this).val() === "all") {
            // If "all" is checked
            $('.court-filter').not(this).prop('checked', false);
        } else {
            // If any other checkbox is checked → uncheck "all"
            $('.court-filter[value="all"]').prop('checked', false);
        }
    }



	if ($(this).hasClass("hcourt-filter")) {

        if ($(this).val() === "all") {
            // If "all" is checked
            $('.hcourt-filter').not(this).prop('checked', false);
        } else {
            // If any other checkbox is checked → uncheck "all"
            $('.hcourt-filter[value="all"]').prop('checked', false);
        }
    }


	if ($(this).hasClass("ngt-filter")) {

        if ($(this).val() === "all") {
            // If "all" is checked
            $('.ngt-filter').not(this).prop('checked', false);
        } else {
            // If any other checkbox is checked → uncheck "all"
            $('.ngt-filter[value="all"]').prop('checked', false);
        }
    }


	



	


    // Reset container
    $("#document-container").html("");

    // Reset pagination
    $("#loadMoreBtn").data("page", 1).show();

    // Load with filters
    loadMore();
	});


	function debounce(func, delay) {
    let timer;
    return function() {
        clearTimeout(timer);
        timer = setTimeout(() => func.apply(this, arguments), delay);
    };
	}

	$(".parties_filter").on("keyup", debounce(function() {
    // call your filter function / ajax here
    loadMore();
	}, 500)); // delay in ms

</script>


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>

$(function () {
    // build years array 1900 -> current year
    const start = 1900;
    const end = new Date().getFullYear();
    const years = [];
    for (let y = end; y >= start; y--) {
        years.push({ id: String(y), text: String(y) });
    }

    // helper that returns filtered + paginated results
    function getPagedResults(term, page, perPage = 10, minYear = null) {
        term = (term || '').trim().toLowerCase();

        // filter by term (case-insensitive). If empty term -> include all.
        let filtered = term === ''
            ? years
            : years.filter(item => item.text.toLowerCase().indexOf(term) !== -1);

        // if minYear is provided, filter out years less than minYear
        if (minYear !== null) {
            filtered = filtered.filter(item => parseInt(item.id) >= minYear);
        }

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

    // initialize FROM year select
    $('#from_year').select2({
        placeholder: $('#from_year').attr('data-placeholder') || 'Select from year',
        width: '100%',
        allowClear: true,
        ajax: {
            transport: function (params, success, failure) {
                const term = params.data.term || '';
                const page = params.data.page ? parseInt(params.data.page) : 1;
                const data = getPagedResults(term, page, 10);
                success(data);
            },
            processResults: function (data) {
                return data;
            },
            delay: 150
        },
        escapeMarkup: function (m) { return m; },
        minimumInputLength: 0
    });

    // initialize TO year select
    $('#to_year').select2({
        placeholder: $('#to_year').attr('data-placeholder') || 'Select to year',
        width: '100%',
        allowClear: true,
        ajax: {
            transport: function (params, success, failure) {
                const term = params.data.term || '';
                const page = params.data.page ? parseInt(params.data.page) : 1;
                
                // get the selected from_year value
                const fromYear = parseInt($('#from_year').val()) || null;
                
                const data = getPagedResults(term, page, 10, fromYear);
                success(data);
            },
            processResults: function (data) {
                return data;
            },
            delay: 150
        },
        escapeMarkup: function (m) { return m; },
        minimumInputLength: 0
    });

    // ensure initial placeholder / empty option exists
    if ($('#from_year').find('option:selected').length === 0) {
        $('#from_year').append('<option value=""></option>');
    }
    if ($('#to_year').find('option:selected').length === 0) {
        $('#to_year').append('<option value=""></option>');
    }

    // when from_year changes, update to_year
    $('#from_year').on('change', function () {
        const from = parseInt($(this).val()) || null;
        const toEl = $('#to_year');

        if (from) {
            const selectedTo = parseInt(toEl.val()) || null;
            
            // if to_year is less than from_year, clear it
            if (selectedTo && selectedTo < from) {
                toEl.val(null).trigger('change.select2');
            }
            
            // reset the to_year dropdown to refresh available options
            toEl.select2('close');
            
            // Optional: show a message
            // alert('Please select a "To Year" greater than or equal to ' + from);
        }
    });

    // when to_year changes, validate it's >= from_year
    $('#to_year').on('change', function () {
        const from = parseInt($('#from_year').val()) || null;
        const to = parseInt($(this).val()) || null;

        if (from && to && to < from) {
            alert('To Year must be greater than or equal to From Year (' + from + ')');
            $(this).val(null).trigger('change.select2');
        }
    });
});

$(document).on('select2:open', function () {
    setTimeout(() => {
        document.querySelector('.select2-container--open .select2-search__field').focus();
    }, 10);
});

</script>


<script>
// Use event delegation for dynamically added "Read More" links
document.querySelector('#document-container').addEventListener('click', function(e) {
    if (e.target.classList.contains('read-more-btn')) {
        // find the closest parent .data-sec
        let dataSec = e.target.closest('.data-sec');
        if (!dataSec) return;

        // select the <p> inside that data-sec
        let p = dataSec.querySelector('p.headnote-text');
        if (!p) return;

        // toggle expanded class
        p.classList.toggle('expanded');

        // change button text
        e.target.textContent = p.classList.contains('expanded') ? 'Read Less' : 'Read More';
    }
});


</script>


@endsection





