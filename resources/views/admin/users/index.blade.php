@extends('admin.app')

@section('content')

    <main class="main">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> <b> {{__('admin.all_users')}}</b> <a
                class="btn btn-sm btn-outline-secondary" href="{{route('users.create')}}">Добавить</a>
        </div>

        <div class="card-body">
            <form class="mb-5">
                <div class="form-row">
                    <div class="col-md-4 col-lg-4 mb-1">
                        <input type="search" name="name" class="form-control" value="{{request()->query('name')}}"
                               placeholder="{{ __('Input name') }}">
                    </div>

                    <div class="col-md-4  col-lg-2 mb-1">
                        <select name="role" class="form-control">
                            <option value="">{{ __('Select group') }}</option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}"
                                        @if(request()->query('role') == $role->id) selected @endif>{{ __($role->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4  col-lg-2 mb-1">
                        {{--                        <select name="status"  class="form-control">--}}
                        {{--                            <option value="">{{ __('Select status') }}</option>--}}
                        {{--                            @foreach($userRoles as $role)--}}
                        {{--                                <option value="{{$role->id}}" @if(request()->query('status') == $role->id) selected @endif>{{ __($role->name) }}</option>--}}
                        {{--                            @endforeach--}}
                        {{--                        </select>--}}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-2  col-lg-2 mb-1">
                        <button type="submit" class="btn  btn-outline-primary btn-block">{{ __('Apply') }}</button>
                    </div>
                    <div class="col-md-2  col-lg-2 mb-1">
                        <button type="reset" class="btn  btn-outline-danger btn-block">{{ __('Reset') }}</button>
                    </div>
                </div>
            </form>

            @if($users->count() > 0 )
                <div class="container col-md-8">
                    <table id="users-all" class="table table-bordered table-hover ">
                        <thead>
                        <tr>
                            <th class="sorting ">@sortablelink('id')</th>
                            <th style="width: 10%;" class="sorting">@sortablelink('name')</th>
                            <th style="width: 10%;">{{ __('admin.email') }}</th>
                            <th>{{ __('admin.groups') }}</th>
                            <th class="sorting">@sortablelink('created_at')</th>
                            <th style="width: 100px">{{__('admin.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->roles)
                                        @foreach($user->roles as $role)
                                            <span class="badge badge-secondary">{{ $role->name }}</span>  {{--}}Работает плагин select 2.0(в папке public)--}}
                                        @endforeach

                                    @endif
                                </td>
                                <td>{{ $user->created_at }}</td>

                                <td class="d-flex align-items-center">
                                    <a href="{{route('users.edit',['user'=>$user->id])}}"
                                       class="icons font-2xl d-block mt-2 cui-pencil">
                                        <i class="c-icon cil-pencil"></i></a>
                                    <button type="submit" class="btn cui-trash font-2xl"
                                            onclick="return confirm('Вы действительно хотите удалить значение?')">
                                        <i class="c-icon cil-trash"></i>
                                    </button>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="display:flex;justify-content:center;width: 100%;">
                        {{$users->links('pagination::bootstrap-4')}}
                        @else
                            <h4>{{__('admin.no_results')}}</h4>
                        @endif
                    </div>
                </div>
        </div>
    </main>

@endsection
@section('scripts')
@endsection



