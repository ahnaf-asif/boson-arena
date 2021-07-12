@extends('layouts.app')

@section('title')
    Edit Profile
@endsection

@section('custom-js')
    <script src="{{ asset('js/profile.js') }} "></script>
@endsection

@section('content')



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

{{--                @include('includes.edit-profile-picture')--}}

                <br><br>

                <div class="card">
                    <div class="card-header">
                        <h3>
                            {{ __('Update profile') }}
                        </h3>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('profile.edit.backend', ['username'=>Auth::user()->username]) }}">
                            @csrf

                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name"  type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required >

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ Auth::user()->username }}" required autocomplete="username" disabled>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email" disabled>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="institution" class="col-md-4 col-form-label text-md-right">{{ __('Institution') }}</label>

                                <div class="col-md-6">
                                    <input id="institution" type="text" class="form-control @error('institution') is-invalid @enderror" name="institution" value="{{ Auth::user()->institution }}" required autocomplete="institution" >

                                    @error('institution')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ Auth::user()->address }}" required autocomplete="address" >

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ Auth::user()->phone }}" required autocomplete="phone" >

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="social_media_link" class="col-md-4 col-form-label text-md-right">{{ __('Social Media link (optional)') }}</label>

                                <div class="col-md-6">
                                    <input id="social_media_link" type="text" class="form-control @error('social_media_link') is-invalid @enderror" name="social_media_link" value="{{ Auth::user()->social_media_link }}" autocomplete="social_media_link" placeholder="i.e facebook profile link" >

                                    @error('social_media_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="level" class="col-md-4 col-form-label text-md-right">{{ __('Class/ Year') }}</label>

                                <div class="col-md-6">
                                    <select name="educational_level_id" class="form-select" aria-label="Default select example">

                                        @foreach($edu as $d)

                                            <option
                                                value="{{$d->id}}"
                                                @if($d->id == Auth::user()->educational_level_id)
                                                selected
                                                @endif
                                            >{{$d->name}}</option>
                                        @endforeach
                                    </select>
                                    {{--                                {{$data}}--}}
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Profile') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes.toast-testing')
@endsection


<script>


</script>
