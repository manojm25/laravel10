 @extends('frontend.main_master')
 @section('main')

 @section('title')
  Projects | Personal Portfolio
 @endsection

 @php
$allMultiImage = App\Models\MultiImage::all();
$footer = App\Models\Footer::find(1);
@endphp

  <main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb__wrap">
                <div class="container custom-container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <div class="breadcrumb__wrap__content">
                                <h2 class="title">Projects</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Projects</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="breadcrumb__wrap__icon">
                    <ul>
                        @foreach($allMultiImage as $item)
                         <li><img src="{{asset($item->multi_image)}}" alt=""></li>
                        @endforeach
                    </ul>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- portfolio-details-area -->
            <section class="services__details">
                <div class="container">
                    <div class="row">
                        @foreach($portfolioget as $portfolio)
                        <div class="col-lg-8 mt-4">
                            <div class="services__details__thumb">
                                <img src="{{asset($portfolio->portfolio_image)}}" alt="">
                            </div>
                            <div class="services__details__content">
                                <h2 class="title">{{$portfolio->portfolio_title}}</h2>
                                  {!! $portfolio->portfolio_description !!}
                                
                            </div>
                            <div class="services__details__img">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <img src="{{asset($portfolio->portfolio_support_image_one)}}" alt="">
                                        </div>
                                        <div class="col-sm-6">
                                            <img src="{{asset($portfolio->portfolio_support_image_two)}}" alt="">
                                        </div>
                                    </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 mt-4">
                            <aside class="services__sidebar">
                                <div class="widget">
                                    <h5 class="title">Get in Touch</h5>
                                    <form action="{{route('store.contact')}}" class="sidebar__contact" method="POST">
                                        @csrf
                                        <input type="text" placeholder="Enter name*" required>
                                        <input type="email" placeholder="Enter your mail*" required>
                                        <textarea name="message" id="message" placeholder="Massage*" required></textarea>
                                        <button type="submit" class="btn">send message</button>
                                    </form>
                                </div>
                                <div class="widget">
                                    <h5 class="title">Project Information</h5>
                                    <ul class="sidebar__contact__info">
                                        <li><span>Date :</span> {{Carbon\Carbon::parse($portfolio->created_at)->diffForHumans()}}</li>
                                        <li><span>Location :</span> {{$portfolio->location}}</li>
                                        <li><span>Client :</span> {{$portfolio->client_ethnicity}}</li>
                                        <li class="cagegory"><span>Category :</span>
                                            <a href="#">{{$portfolio->category}}</a>
                                        </li>
                                        @if(!empty($portfolio->portfolio_link))
                                         <li><span>Project Link :</span> <a target="__blank" href="{{$portfolio->portfolio_link}}">{{$portfolio->portfolio_link}}</a></li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="widget">
                                    <h5 class="title">Contact Information</h5>
                                    <ul class="sidebar__contact__info">
                                        <li><span>Address :</span> {{$footer->address}}</li>
                                        <li><span>Mail :</span> {{$footer->email}}</li>
                                        <li><span>Phone :</span> +91{{$footer->number}}</li>
                                    </ul>
                                    <ul class="sidebar__contact__social">
                                        <li><a href="{{$footer->instagram}}"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="{{$footer->facebook}}"><i class="fab fa-facebook"></i></a></li>
                                        <li><a href="{{$footer->twitter}}"><i class="fab fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </aside>
                        </div>
                        @endforeach

                        <div class="pagination-wrap">
                       {{$portfolioget->links('vendor.pagination.custom')}}                         
                       </div>
                        
                    </div>
                </div>
            </section>
            <!-- portfolio-details-area-end -->


            <!-- contact-area -->
            <section class="homeContact homeContact__style__two">
                <div class="container">
                    <div class="homeContact__wrap">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="section__title">
                                    <span class="sub-title">07 - Say hello</span>
                                    <h2 class="title">Any questions? Feel free <br> to contact</h2>
                                </div>
                                <div class="homeContact__content">
                                    <p>{{$footer->short_description}}</p>
                                    <h2 class="mail"><a href="mailto:{{$footer->email}}">{{$footer->email}}</a></h2>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="homeContact__form">
                                    <form action="{{route('store.contact')}}" method="POST">
                                        @csrf
                                        <input type="text" placeholder="Enter name*" required>
                                        <input type="email" placeholder="Enter mail*" required>
                                        <input type="number" placeholder="Enter number*" required>
                                        <textarea name="message" placeholder="Enter Massage*" required></textarea>
                                        <button type="submit">Send Message</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>

 @endsection