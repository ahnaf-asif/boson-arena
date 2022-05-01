@extends('layouts.app')

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/blog.css')}}">
@endsection

@section('title')
    Magazines
@endsection

<style>
    .magazine-download-link{
        background:  #000;
        text-decoration:  none;
        color:  white !important;
        padding:  10px 20px;

    }
    .magazine-download-link:hover{
        text-decoration:  none !important;
        background:  #424242;
    }
</style>


@section('content')

<div class="container">
    <h1 class="my-5 text-center">Our Magazines</h1>
    <div class="row" style="row-gap: 1.5rem;">
        <div class="col-md-6 col-12">
            <div class="card blog-card shadow-0">
                <div class="bg-image hover-zoom">
                    <img
                        src="{{ asset('images/biggan-batayon-2.jpg') }}"
                        class="card-img-top"
                        alt="title image" 
                    />
                </div>
                <div class="card-body position-relative" style="padding-left: 0; padding-right: 0;">
                    <span class="badge translate-middle bg-success blog-badge">বর্ষ ২ | সংখ্যা ২</span>

                    <div class="card-title">
                        <a target="_blank" href="{{ asset('storage/biggan-batayon-2.pdf') }}" class="blog-header-link"><h3 class="font-weight-bold">বিজ্ঞান বাতায়ন</h3></a>
                        <p><small>বর্ষ ২ | সংখ্যা ২ | ৩০ এপ্রিল ২০২২</small></p>
                    </div>
                    <p class="card-text">
                        বিজ্ঞান বাতায়নের এই সংখ্যায় প্রখ্যাত বাংলাদেশী বিজ্ঞানী আচার্য প্রফুল্ল চন্দ্র রায়, মহাবিশ্ব, হোমো ইরেক্টাস, স্মৃতিতে হাইপোক্সিয়া, প্রোগ্রামিং, সাইন্স ফিকশনসহ গনিত ও বিজ্ঞানের বিভিন্ন বিষয় আকর্ষণীয়ভাবে তুলে ধরা হয়েছে - যা দেশের প্রত্যন্ত অঞ্চলে থাকা শিশু-কিশোরদের কাছে বিজ্ঞানভিত্তিক জ্ঞান পৌঁছে দেবে।
                    </p>
                    <a target="_blank" href="{{ asset('storage/biggan-batayon-2.pdf') }}" class="magazine-download-link">Download Magazine</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection