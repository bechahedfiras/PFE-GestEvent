@extends('layouts.app') 
@section('content')
<div class="fadeIn login-bg" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
        <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
            <div class="card w-50 m-auto auth">
                <div class="card-header">
                    <h1 class="text-center" style="background: -webkit-linear-gradient(#1664ff, #1664ff 100%);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;">Confirm your email</h1>
                    <p class="text-light text-center"  style="background: -webkit-linear-gradient(#444653, #444653 100%);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;">You will recive a confirmation code in your mailbox <b>{{auth::user()->email}} </b> please enter this code here to confirm your account</p>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('verifyEmail') }}">
                        @csrf
                        <div class="form-group">
                            <div class="m-auto w-75">
                                @if (session('error'))
                                <div class="alert alert-danger text-center">
                                    {{ session('error') }}
                                </div>
                                @endif
                                <input type="text" class="form-control text-danger text-center" name="code" required autofocus placeholder="Confirmation code" />
                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <br />
                            <button type="submit" class="btn btn-block btn btn-primary btn-block py-2">
                                Verify
                            </button>
                            <br />
                            <br />
                            <a href="{{asset('newCode')}}">Resend the code</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection