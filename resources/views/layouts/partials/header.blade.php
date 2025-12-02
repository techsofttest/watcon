<div class="as-menu-wrapper">
  <div class="as-menu-area text-center">
    <button class="as-menu-toggle"><i class="fal fa-times"></i></button>
    <div class="mobile-logo"><a href="{{url('/')}}"><img src="{{asset('img/logo.png')}}" alt=""></a></div>
    <div class="as-mobile-menu">
   <ul>
<li class="menu-item-has-children "><a href="javascript:void(0);">About  </a>
  <ul class="sub-menu">
 <li>  <a  href="{{url('summary')}}">Summary</a></li>
  <li>  <a  href="{{url('team')}}">Team</a></li>
    <li>  <a  href="{{url('contact')}}">Contact</a></li>
    <li>  <a  href="{{url('jobs')}}">Jobs</a></li>
		  <li>  
</ul>
</li>
 <li class="menu-item-has-children "><a href="javascript:void(0);">Publications  </a>
  <ul class="sub-menu">
 <li>  <a  href="{{url('books')}}">Books</a></li>
 <li>  <a  href="{{url('articles-book-chapters')}}">Articles / Book chapters</a></li>
 <li>  <a  href="{{url('blogs')}}">Blogs/Media</a></li>
</ul>
 </li>		  
<li ><a href="{{url('work-packages')}}">Work Packages</a></li>
<li  ><a href="{{url('database')}}">Database</a> </li>
<li ><a href="{{url('news')}}">Events & News</a></li>
</ul>
    </div>
  </div>
</div>

<header class="as-header header-layout2">
<div class="sticky-wrapper">
    <div class="sticky-active">
      <div class="menu-area">
        <div class="container">
          <div class="row align-items-center justify-content-between ">
		  <div class="col-auto">
		  
		<div class="header-logo"><a href="{{url('/')}}"><img src="{{asset('img/logo.avif')}}" alt=""></a></div>
				    	</div>
         <div class="col-auto">
 <nav class="main-menu d-none d-lg-block ">
   <ul>
<li class="menu-item-has-children "><a href="javascript:void(0);">About  </a>
  <ul class="sub-menu">
 <li>  <a  href="{{url('summary')}}">Summary</a></li>
  <li>  <a  href="{{url('team')}}">Team</a></li>
    <li>  <a  href="{{url('contact')}}">Contact</a></li>
    <li>  <a  href="{{url('jobs')}}">Jobs</a></li>
		
</ul>
</li>
 <li class="menu-item-has-children "><a href="javascript:void(0);">Publications  </a>
  <ul class="sub-menu">
 <li>  <a  href="{{url('books')}}">Books</a></li>
 <li>  <a  href="{{url('articles-book-chapters')}}">Articles / Book chapters</a></li>
 <li>  <a  href="{{url('blogs')}}">Blogs/Media</a></li>
</ul>
 </li>		  
<li ><a href="{{url('work-packages')}}">Work Packages</a></li>
<li  ><a href="{{url('database')}}">Database</a> </li>
<li ><a href="{{url('news')}}">Events & News</a></li>
</ul>
    </nav>
 </div>
 
    <div class="col-auto   ">
              <div class="header-button">
<div class="Searchid">
 <form action="{{ url('/search') }}" method="get">
							 <input type="text" name="q" placeholder="Search ">
							<i class="fa  fa-search"></i>
							 
							 </form>
							 </div>
 </div>
            </div>
			
			<div class="col-auto d-inline-block d-lg-none">
 <button type="button" class="as-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>			
			
			</div>
				
				 
				
				
          </div>
        </div>
	 
        
      </div>
    </div>
  </div>
</header>
