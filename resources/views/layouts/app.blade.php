<!doctype html>
<html class="no-js" lang="zxx">

<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

@yield('head_metas')


<link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/app.min.css')}}">
<link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
<link rel="stylesheet" href="{{asset('css/style.css?v1.2.8')}}">
<link rel="stylesheet" href="{{asset('css/responsive.css')}}">

@yield('head_extras')

</head>


<body class="theme-red">


@include('layouts/partials/header')


@yield('content')


@include('layouts/partials/footer')



<button class="floating-button enquireBtn" id="enquireBtn">CONTACT US</button>



 <div class="popup-overlay" id="popupOverlay">
        <div class="popup-form">
            <button class="close-button" id="closeBtn">×</button>
            <h2>Get in Touch</h2>
            <form id="enquiryForm" method="POST" action="{{ route('contact.send') }}">
            @csrf
                <div class="form-group">
                    <input type="text"  id="name" name="name" required placeholder="Name">
                </div>
                <div class="form-group">
                    
                    <input type="email" id="email" name="email" required placeholder="Email">
                </div>
                <div class="form-group">
                    
                    <input type="tel" id="phone" name="phone" required placeholder="Phone">
                </div>
                <div class="form-group">
                    <textarea id="message" name="message" required placeholder="Message"></textarea>
                </div>
                <button type="submit" class="submit-button">Submit</button>
            </form>
        </div>
    </div>




<script src="{{asset('js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('js/app.min.js')}}"></script>
<!--<script src="{{asset('js/particles-config.js')}}"></script>-->
<script src="{{asset('js/main.js')}}"></script>

 <!-- scripts new start-->

  
  
    <!-- scripts end start-->
 	<script>
    var header = $('#header-sticky');
    var win = $(window);
    
    win.on('scroll', function() {
        if ($(this).scrollTop() > 400) {
           
			 $(".fixedRit").addClass("fixedRit-sticky");
			 
        } else {
           
		$(".fixedRit").removeClass("fixedRit-sticky");
			
        }
    });
    </script> 


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css" integrity="sha512-IXuoq1aFd2wXs4NqGskwX2Vb+I8UJ+tGJEu/Dc0zwLNKeQ7CW3Sr6v0yU3z5OQWe3eScVIkER4J9L7byrgR/fA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/themes/default.min.css" integrity="sha512-RgUjDpwjEDzAb7nkShizCCJ+QTSLIiJO1ldtuxzs0UIBRH4QpOjUU9w47AF9ZlviqV/dOFGWF6o7l3lttEFb6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<script>
        const enquireBtns = document.querySelectorAll('.enquireBtn');
        const popupOverlay = document.getElementById('popupOverlay');
        const closeBtn = document.getElementById('closeBtn');
        const enquiryForm = document.getElementById('enquiryForm');

        // For multiple buttons
        enquireBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                popupOverlay.classList.add('active');
            });
        });

        closeBtn.addEventListener('click', () => {
            popupOverlay.classList.remove('active');
        });

        popupOverlay.addEventListener('click', (e) => {
            if (e.target === popupOverlay) {
                popupOverlay.classList.remove('active');
            }
        });

        enquiryForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const formData = {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value,
                message: document.getElementById('message').value
            };
            //console.log('Form submitted:', formData);
            //alert('');

            alertify.success("Thank you for your enquiry! We will get back to you soon.");

            enquiryForm.reset();
            popupOverlay.classList.remove('active');
        });
    </script>


@yield('footer_extras')


</body>

</html>






