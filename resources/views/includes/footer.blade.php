<footer class="pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 mt-5" >
                <div class="left-footer" style="max-width: 45ch;margin: 0 auto;">
                    <h1 class="text-center mb-5" style="font-size: 1.5rem;">Lets Work Together !</h1>
                    <p class="text-light text-center" >
                        Our club is open for School, College and University going students all over the country. We work on different olympiads, Scientific Magazine, publishing blogs and many other things. We organize Mega festivals, various Olympiads and competitions. We also organize camps and seminars.
                    </p>
                    <p class="text-center">Please Join us <a style="color: #ffa8ac !important;" href="{{route('register')}}">Here</a> if you haven't already.</p>
                </div>

            </div>
            <div class="col-lg-3 col-md-6 mt-5">
                <p class="text-center mb-5" style="font-size: 1.5rem;">Quick Links</p>
{{--                <hr>--}}
               <div class="row">
                   <div class="col-6">
                       <ul class="text-center">
                           <li class="pb-2">
                               <a href="{{route('home')}}" class="footer-link">Events</a>
                           </li>
                           <li class="pb-2">
                               <a href="{{route('problems')}}" class="footer-link">Gallery</a>
                           </li>
                           <li class="pb-2">
                               <a href="{{route('blog')}}" class="footer-link">About</a>
                           </li>
                           <li class="pb-2">
                               <a href="{{route('contact')}}" class="footer-link">Contact</a>
                           </li>
                           <li class="pb-2">
                               <a href="{{route('resources')}}" class="footer-link">Resources</a>
                           </li>

                       </ul>
                   </div>
                   <div class="col-6">
                       <ul class="text-center">
                           <li class="pb-2">
                               <a href="{{route('home')}}" class="footer-link">Home</a>
                           </li>
                           <li class="pb-2">
                               <a href="{{route('problems')}}" class="footer-link">Problems</a>
                           </li>
                           <li class="pb-2">
                               <a href="{{route('blog')}}" class="footer-link">Contests</a>
                           </li>
                           <li class="pb-2">
                               <a href="{{route('blog')}}" class="footer-link">Blog</a>
                           </li>
                           <li class="pb-2">
                               <a href="#" class="footer-link">Article</a>
                           </li>
                       </ul>
                   </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-5">
                <div class="footer-contact text-center">
                    <div class="contact-header mb-5" style="font-size: 1.5rem;">
                        Contact us
                    </div>
                    <div class="phone-email pb-4" style="font-size: 0.9rem;">
                        {{$contact_phone}}<br>
                        {{$contact_email}} <br>
                        Leave us a message <a href="{{route('contact')}}" style="font-size: 0.9rem; color: #ffa8ac !important;">here</a>.
                    </div>
                    <div class="footer-socials pb-4">
                        <div class="facebook">
                            <a href="{{$contact_facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        </div>
                        <div class="youtube">
                            <a href="{{$contact_youtube}}" target="_blank"><i class="fab fa-youtube"></i></a>
                        </div>
                        <div class="whatsapp">
                            <a href="{{$contact_whatsapp}}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                    <div class="creator text-center">
                        <p style="font-size: 0.9rem;">Created By <a target="_blank" href="https://www.facebook.com/asifthen00b/">Ahnaf Shahriar Asif</a></p>
                    </div>

                </div>
            </div>
        </div>

    </div>
</footer>
