@extends('layouts.app')

@section('content')

<div class="p-4">
    
    <x-panels.form.errors/>
    
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mt-8 max-w-md">
            <div class="grid grid-cols-1 gap-6">
                <x-panels.form.group for="name_field" label="Имя пользователя" error="{{$errors->first('name')}}">
                    <x-panels.form.text id="name_field"
                                        name="name"
                                        value="{{old('name')}}"
                                        placeholder="Введите имя пользователя"/>
                </x-panels.form.group>

                <x-panels.form.group for="email_field" label="Адрес электронной почты" error="{{$errors->first('email')}}">
                    <x-panels.form.email id="email_field"
                                        name="email"
                                        value="{{old('email')}}"
                                        placeholder="Введите почту"/>
                </x-panels.form.group>

                <x-panels.form.group for="password_field" label="Пароль" error="{{$errors->first('password')}}">
                    <x-panels.form.password id="password_field"
                                        name="password"
                                        value="{{old('password')}}"
                                        placeholder="Введите пароль"/>
                </x-panels.form.group>

                <x-panels.form.group for="password-confirm" label="Подтверждение пароля" error="{{$errors->first('password_confirmation')}}">
                    <x-panels.form.password id="password-confirm"
                                        name="password_confirmation"
                                        value="{{old('password_confirmation')}}"
                                        placeholder="Повторите пароль"/>
                </x-panels.form.group>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <x-panels.form.buttonOrange type="submit" text="Зарегистрироваться"/>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
 
@endsection
