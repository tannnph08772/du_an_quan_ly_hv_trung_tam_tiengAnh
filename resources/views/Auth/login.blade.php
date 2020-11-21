@extends('Auth/dangnhap')
@section('content')
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-3"
        id="m_login" style="background-image: url(../../../assets/app/media/img//bg/bg-3.jpg);">
        <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
            <div class="m-login__container">
                <div class="m-login__logo">
                    <a href="#">
                        <img style="width:300px"
                            src="https://alibabaenglish.edu.vn/wp-content/uploads/2019/03/logo-Alibaba.png">
                    </a>
                </div>
                <div class="m-login__signin">
                    <form class="m-login__form m-form" action="{{ route('auth.login') }}" method="POST">
                        @csrf
                        @if(isset($message))
                        <div class="alert alert-danger">{{$message}}</div>
                        @endif
                        <div class="form-group m-form__group">

                            <input class="form-control m-input" value="{{ old('email') }}" type="text" placeholder="Email" name="email"
                                autocomplete="off">
                            @error('email')
                            <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input m-login__form-input--last" type="password" value="{{ old('password') }}" placeholder="Password"
                                name="password">
                            @error('password')
                            <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row m-login__form-sub">
                            <div class="col m--align-left m-login__form-left">
                                <label class="m-checkbox m-checkbox--focus">
                                    <input type="checkbox" name="remember" id="remember"> Remember me
                                    <span></span>
                                </label>
                            </div>
                            <div class="col m--align-right m-login__form-right">
                                <a href="javascript:;" id="m_login_forget_password" class="m-link">Forget Password
                                    ?</a>
                            </div>
                        </div>
                        <div class="m-login__form-action">
                            <button
                                class="btn btn-back m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">Back</button>
                            <button type="submit"
                                class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">Sign
                                In</button>
                        </div>
                    </form>
                </div>
                <div class="m-login__forget-password">
                    <div class="m-login__head">
                        <h3 class="m-login__title">Forgotten Password ?</h3>
                        <div class="m-login__desc">Enter your email to reset your password:</div>
                    </div>
                    <form class="m-login__form m-form" action="">
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="Email" name="email"
                                id="m_email" autocomplete="off">
                        </div>
                        <div class="m-login__form-action">
                            <button id="m_login_forget_password_submit"
                                class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Request</button>&nbsp;&nbsp;
                            <button id="m_login_forget_password_cancel"
                                class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom  m-login__btn">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection