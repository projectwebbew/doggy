@extends('admin.app')

@section('content')
    <main class="main">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        {{ __('Create Dog') }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dogs.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <!-- Dog Name -->
                                <div class="form-group col-md-4">
                                    <label>{{ __('Dogs Name') }}<span class="required">*</span></label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                    @enderror
                                </div>
                                <!-- Dog Age (months) -->
                                <div class="form-group col-md-4">
                                    <label>{{ __('Dog months') }}<span class="required">*</span></label>
                                    <select type="text" name="months"
                                            class="form-control @error('months') is-invalid @enderror"
                                            value="{{ old('months') }}">
                                        @for($i=1;$i<21;$i++)
                                            <option value="{{ $i }}">
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <!-- Dog Weight (weight) -->
                                <div class="form-group col-md-4">
                                    <label>{{ __('Dog weight') }}<span class="required">*</span></label>
                                    <select type="text" name="weight"
                                            class="form-control @error('weight') is-invalid @enderror"
                                            value="{{ old('weight') }}">
                                        @for($i=1;$i<15;$i=$i+0.1)
                                            <option value="{{ $i }}">
                                                {{ $i }} kg
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <!-- Dog Price  -->
                                <div class="form-group col-md-4">
                                    <label>{{ __('Dog price') }}<span class="required">*</span></label>
                                    <input type="text" name="price"
                                           class="form-control @error('price') is-invalid @enderror"
                                           value="{{ old('price') }}">
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                    @enderror
                                </div>
                                <!-- Dog gender -->
                                <div class="form-group col-md-4">
                                    <label>{{ __('Dog gender') }}<span class="required">*</span></label>
                                    <select type="text" name="gender"
                                            class="form-control @error('gender') is-invalid @enderror"
                                            value="{{ old('colors') }}">
                                        @foreach($gender as $gend)
                                            <option value="{{ $gend }}">
                                                {{ $gend }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Image Dog -->
                            <div class="box js text-left">
                                <h1>Main Photo on Front</h1>
                                <input type="file" name="inputfile" id="file-8" style="display: none"
                                       class="inputfile inputfile-7"
                                       data-multiple-caption="{count} files selected"/>
                                <label style="cursor: pointer" for="file-8"
                                       class="@error('inputfile') is-invalid @enderror">
                                    <strong>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17"
                                             viewBox="0 0 20 17">
                                            <path
                                                d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                                        </svg>
                                        <b>{{ __('Choose') }}</b>
                                    </strong>
                                    <span></span>
                                </label>
                                @error('inputfile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info">Отправить</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
