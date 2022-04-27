@extends('admin.app')
@section('title','Редактировать пользователя')

@section('content')

    <main class="main">
        <div class="card-header">{{ __('Edit User') }}</div>
        <div class="card-body">
        <form action="{{route('users.update',['user'=>$user])}}" method="post" novalidate>
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Name<span class="required">*</span></label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                       value="{{ $user->name }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Email<span class="required">*</span></label>
                <input type="text" name="email" class="form-control  @error('email') is-invalid @enderror"
                       value="{{ $user->email }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="form-group">
                @php

                    @endphp
                <label>Roll<span class="required">*</span></label>
                <select name="roles[]" multiple class="form-control select2 @error('roles') is-invalid @enderror">
                    <option value="">Выбрать роль</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" @if(in_array($role->id, $userRoles)) selected @endif>{{
                            $role->name
                            }}
                        </option>
                    @endforeach
                </select>
                @error('roles')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Password<span class="required">*</span></label>
                <input type="password" name="password"
                       class="form-control @error('password') is-invalid @enderror">
                @error('password')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Password Confirmation<span class="required">*</span></label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            <button type="submit" class="btn btn-info">Отправить</button>
        </form>
    </div>
    </main>
@endsection
