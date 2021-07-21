<?php
    // universal informations
    $contact_phone = '+880 1633923851';
    $contact_email = 'bosonbiggansangho@gmail.com';
    $contact_whatsapp = 'https://wa.me/1633923851';
    $contact_whatsapp_number = '+880 1633923851';
    $contact_facebook = 'https://www.facebook.com/Bosonbigganshongho';
    $contact_youtube = 'https://www.youtube.com/channel/UCZGrX3xUDUtDFJQIyIMi7BQ';
?>

@extends('layouts.app')

@section('title')
    Contact
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/contact.css')}}">

    <style>
        .contact-info-table-td{
            font-size: 1.2rem;
        }
        .contact-socials .fab{
            font-size: 3.2rem;
        }
        .contact-socials .facebook .fab{
            color: #0a47a9;
        }
        .contact-socials .facebook .fab:hover{
            color:#467cd4;
        }
        .contact-socials .youtube .fab{
            color: #c4302b;
        }
        .contact-socials .youtube .fab:hover{
            color: #f7443e;
        }
        .contact-socials .whatsapp .fab{
            color: #25d366;
        }
        .contact-socials .whatsapp .fab:hover{
            color: #13a84a;
        }
    </style>


@endsection


@section('content')

    <div class="contact container my-5">
        <div class="row" style="row-gap: 2.5rem;">
            <div class="col-md-7">
                <div class="contact-form mt-2">
                    <div class="card pt-3">
                        <div class="card-header pb-5">
                            <h1>Leave us a message</h1>
                            <p>Please share your feedback. If you have any questions, you can ask too. We will reach out to you as soon as possible.</p>
                            @error('message')


                            <p class="mt-5">
                                <small class="text-danger font-weight-bold">Your message is too long. You can send atmost 1000 letters</small>
                            </p>
                            @enderror
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('send-message') }}">
                                @csrf

                                @guest
                                <div class="form-group row">
                                    <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('NAME') }}</label>

                                    <div class="col-md-9">
                                        <input id="name" type="text" class="form-control @error('email') is-invalid @enderror" name="name" value="{{ old('name') }}" required >

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-MAIL') }}</label>

                                    <div class="col-md-9">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    </div>
                                </div>
                                @else
                                    <input type="hidden" name="name" value="{{Auth::user()->name}}">
                                    <input type="hidden" name="email" value="{{Auth::user()->email}}">

                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                @endguest

                                <div class="form-group row">
                                    <label for="subject" class="col-md-2 col-form-label text-md-right">{{ __('SUBJECT') }}</label>

                                    <div class="col-md-9">
                                        <input id="subject" type="text" class="form-control @error('email') is-invalid @enderror" name="subject" value="{{ old('subject') }}" required >

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="message" class="col-md-2 col-form-label text-md-right">{{ __('MESSAGE') }}</label>

                                    <div class="col-md-9">
{{--                                        <input id="message" type="text" class="form-control @error('email') is-invalid @enderror" name="message" value="{{ old('message') }}" required >--}}
                                        <textarea name="message" id="message" rows="8" class="form-control">{{ old('message') }}</textarea>

                                    </div>

                                </div>
                                <div class="form-group mt-4 row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-9">
                                        <button class="btn btn-lg btn-primary px-5 py-3" style="background-color: #1f6fb2; font-size: 1.2rem;" type="submit">SEND MESSAGE</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>

            <div class="col-md-4">
                <div class="contact-info mt-4">
                    <h1 class="text-left px-4">Contact Details</h1>
                    <div class="contact-body mt-4">
                        <table class="table table-borderless table-responsive-sm" style="min-width: 100%;">
                            <tbody>
                                <tr>
                                    <td class="contact-info-table-td">Phone</td>
                                    <td class="contact-info-table-td">{{$contact_phone}}</td>
                                </tr>
                                <tr>
                                    <td class="contact-info-table-td">Whatsapp</td>
                                    <td class="contact-info-table-td">{{$contact_whatsapp_number}}</td>
                                </tr>

                                <tr>
                                    <td class="contact-info-table-td">Email</td>
                                    <td class="contact-info-table-td">{{$contact_email}}</td>
                                </tr>
                            </tbody>

                        </table>

                        <div class="contact-socials my-4 px-4">
                            <h1 class="text-left">Our Socials</h1>
                            <div class="py-3 px-2 my-2" style="border: 1px solid rgba(0,0,0,.125);background: white;">


                                <div class="row">

                                        <div class="facebook col-4 text-left">
                                            <a href="{{$contact_facebook}}" target="_blank"><i class="fab fa-facebook"></i></a>
                                        </div>
                                        <div class="youtube col-4 text-center ">
                                            <a href="{{$contact_youtube}}" target="_blank"><i class="fab fa-youtube"></i></a>
                                        </div>
                                        <div class="whatsapp col-4 text-right">
                                            <a href="{{$contact_whatsapp}}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes.toast-testing')
@endsection



@section('custom-js')

@endsection
