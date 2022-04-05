@extends('admin.app')

@section('content')

    <main class="main">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>
            <!-- Breadcrumb Menu-->
            <li class="breadcrumb-menu d-md-down-none">
                <div class="btn-group" role="group" aria-label="Button group">
                    <a class="btn" href="#">
                        <i class="icon-speech"></i>
                    </a>
                    <a class="btn" href="./">
                        <i class="icon-graph"></i> &nbsp;Dashboard</a>
                    <a class="btn" href="#">
                        <i class="icon-settings"></i> &nbsp;Settings</a>
                </div>
            </li>
        </ol>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="container col-sm-8">
            <table class="table table-bordered mb-5" style="text-align: center">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th width="10px" scope="col">Age(months)</th>
                    <th scope="col">Price</th>
                    <th scope="col">Show</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dogs as $dog)
                    <tr style="height: 20px;">
                        <td class="align-middle" style="padding: 0;height: 10px">{{$dog->id}}</td>
                        <td class="align-middle " style="padding: 0">{{ $dog->name }}</td>
                        <td class="align-middle " style="padding: 0">{{ $dog->months }}</td>
                        <td class="align-middle " style="padding: 0">{{$dog->price}}$</td>
                        <td class="align-middle " style="padding: 0">
                            <a href="{{route ('slider',['dog'=>$dog->id])}}">
                                <i class="icons font-2xl d-block mt-2 cui-screen-desktop"></i>
                            </a>
                        </td>
                        <td class="align-middle">
                            <a href="{{route ('dogs.edit',['dog'=>$dog->id])}}">
                                <i class="icons font-2xl d-block mt-2 cui-pencil"></i>
                            </a>
                        </td>

                        <td class="align-middle">
                            <form action="{{route('dogs.destroy',$dog->id  )}}" method="post">
                                @csrf
                                @method('delete')
                                <button style="background: transparent;" type="submit" class="btn cui-trash font-2xl"
                                        onclick="return confirm('Вы действительно хотите удалить значение?')">
                                    <i class="c-icon cil-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div style="display:flex;justify-content:center;width: 100%;margin-top:-40px">
                {{ $dogs->links('pagination::bootstrap-4') }}
            </div>

        </div>
    </main>
@endsection
