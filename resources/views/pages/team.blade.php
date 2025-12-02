@extends('layouts.app')

@section('head_metas')

<title>{{$seo->meta_title}}</title>

<meta name="description" content="{{$seo->meta_description}}">

{{$seo->custom_head_scripts}}

<style>
    .modal-content-bg{
    background-color: var(--title-color2) !important;
    color: black;
    }
    .modal-header
    {
    padding: 5px 5px !important;
    border-bottom: none !important;
    font-size: 25px;
    }

    .modal.show .modal-dialog
    {
        margin:125px auto !important;
    }

</style>

@endsection


@section('content')

{{$seo->custom_body_scripts}}


 <div  class="Teanm-secc home-three">

 <!--<div class="tto-mainsecs ">

 </div>-->
 <div class="container">
 <div class="title-area text-center">
      <h2 class="sec-title mb-20 tt-team">Meet The Team</h2>

    </div>


	<div class="row ">
		<div class="col-lg-12 ">
	<ul class="About-menu mtab">

    @foreach($categories as $category)

    <li><a href="javascript:void(0);" onclick="openprofile(event, 'c{{$category->id}}')" <?php if($loop->iteration==1){ echo 'id="defaultOpen"'; } ?> class="tablink mtablinks active">{{$category->name}}</a></li>
           
    @endforeach

          </ul>
	 </div>
	  </div>



 	<div class="row">

    <div class="col-lg-12">

 <div class="tabmain produc-rightsec aucc-tab">

        @foreach($categories as $category)

    <div id="c{{ $category->id }}" class="mtabcontent" style="display: none;">
        <div class="row justify-content-center">

            @foreach($team_members[$category->id] ?? [] as $member)

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
                    <div class="single-offer-box">

                        <div class="single-offer-thumb">
                
                    @if(!empty($member->profile_url))
                        <a  href="{{ $member->profile_url }}" target="_blank">
                    @else
                       <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#teamModal{{$member->id}}">
                    @endif
                                <img src="{{ asset('storage/'.$member->image) }}" alt="">

                                <div class="offer-bottom-title">
                                    <h4>{{ $member->name }}</h4>
                                    <h5>{{ $member->university }}</h5>
                                    <h6>{{ $member->designation }}</h6>

                                    <div class="btn-group">
                                        <a target="_blank" href="mailto:{{ $member->email_address }}">
                                            <i class="fas fa-envelope"></i>
                                        </a>

                                        @if(!empty($member->linkedin))
                                        <a target="_blank" href="{{ $member->linkedin }}">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                        @endif

                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>


                @if(empty($member->profile_url))
                <div class="modal fade" data-bs-backdrop="false" id="teamModal{{$member->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content modal-content-bg">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        {!! $member->description !!}
                    </div>
                    <!--<div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>-->
                    </div>
                </div>
                </div>
                @endif

            @endforeach

        </div>
    </div>

@endforeach



 </div>
  </div>
 </div>




 </div>
 </div>


 <div class="temm-hr"></div>


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
   //AOS.refresh();
 
}
document.getElementById("defaultOpen").click();

</script> 

@endsection
