@extends('layouts.app')

@section('title', 'Авторизация')

@section('content')
    <div class="p-4">
        
        <x-panels.form.errors/>
        
       <form method="POST" action="{{ route('login') }}">
           @csrf
           <div class="mt-8 max-w-md">
               <div class="grid grid-cols-1 gap-6">
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
                   
                  <x-panels.form.checkbox id="remember" name="remember" text="Запомнить"/>
                  
                   <div class="form-group row mb-0">
                       <div class="col-md-8 offset-md-4">
                           <x-panels.form.buttonOrange type="submit" text="Войти"/>
                           @if (Route::has('password.request'))
                               <a class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded" href="{{ route('password.request') }}">
                                   Забыли пароль?
                               </a>
                           @endif
                       </div>
                   </div>
               </div>
           </div>
       </form>
   </div>
@endsection
