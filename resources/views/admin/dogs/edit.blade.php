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
        <div class="row">
            <div class="card col-md-10" style="background: transparent; border: 0;margin: 0 auto">
                <div class="card">
                    <div class="card-header">{{ __('Edit Dog') }}</div>
                    <div class="card-body">
                        <form action="{{ route('dogs.update',['dog'=>$dog]) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="admin-dog-box" style="display: flex;justify-content: space-around;">
                                <div class="admin-dog-box-one" style="width: 250px">
                                    <div class="form-group">
                                        <label>Name<span class="required">*</span></label>
                                        <input type="text" name="name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               value="{{ $dog->name }}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Ages(months)<span class="required">*</span></label>
                                        <input type="text" name="months"
                                               class="form-control @error('months') is-invalid @enderror"
                                               value="{{ $dog->months }}">
                                        @error('months')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Price<span class="required">*</span></label>
                                        <input type="text" name="price"
                                               class="form-control @error('price') is-invalid @enderror"
                                               value="{{ $dog->price }}">
                                        @error('price')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Weight<span class="required">*</span></label>
                                        <input type="text" name="weight"
                                               class="form-control @error('weight') is-invalid @enderror"
                                               value="{{ $dog->weight }}">
                                        @error('weight')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control
                                    @error('gender') is-invalid @enderror" value="{{ $dog->gender }}">
                                            @foreach($gender as $gend)
                                                <option value="{{ $gend }}">
                                                    {{ $gend }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{--START PHOTO ON MAIN PAGE --}}
                                <div class="admin-dog-box-two" style="border: 5px solid #e3a2a2; padding: 10px">
                                    @if($dog->image)
                                        <h3 style="padding: 5px; ">Photo on main Page *</h3>
                                        <div class="img-col">
                                            <a href="/storage/images/dogs/thubnail/{{ $dog->image }}"
                                               data-fancybox="images"
                                               data-caption="{{ $dog->name }}">
                                                <div class="img-cont">
                                                    <img src="/storage/images/dogs/thumbnail/{{ $dog->image }}"
                                                         class="img-fluid" alt="img-thumbnail">
                                                </div>
                                            </a>

                                            <button style="margin-top: 10px" type="button"
                                                    class="btn btn-danger img-cont_button"
                                                    onclick="confirm('{{ __("Are you sure you want to delete this item?") }}');document.getElementById('removeImg').submit();return false;">
                                                <i class="icon-trash-empty red f-20">Delete</i>
                                            </button>
                                            <input type="hidden" name="image" value="{{ $dog->image }}">
                                            <input type="hidden" name="inputfile"/>
                                        </div>
                                    @else
                                        <div class="box js text-left">
                                            <h1>Main Photo on Front</h1>
                                            <input type="file" name="inputfile" id="file-8" style="display: none"
                                                   class="inputfile inputfile-7" data-multiple-caption="{count} files selected"/>
                                            <label style="cursor: pointer" for="file-8" class="@error('inputfile') is-invalid @enderror">
                                                <strong>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                                        <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
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
                                    @endif
                                </div>
                                {{--END PHOTO ON MAIN PAGE --}}
                            </div>
                            {{--START SLIDER --}}
                            <div class="admin-dog-box-tree"
                                 style="display:block;min-height: 200px; position: relative;border: 2px solid black;padding: 10px;margin-top: 20px">
                                <h1>Slider</h1>
                                @php
                                    $photoArray= json_decode ($dog->gallery);
                                @endphp
                                @if($photoArray)
                                    <div class="slider-container"
                                         style="display:flex; min-width: 100px;flex-wrap: wrap">
                                        @for($i=0;$i<count ($photoArray);$i++)
                                            <div class="img-col" style="padding: 10px">
                                                <a href="/storage/images/dogs/slider/{{ $photoArray[$i] }}"
                                                   data-fancybox="images" data-caption="{{ $photoArray[$i] }}">
                                                    <div class="img-cont">
                                                        <img src="/storage/images/dogs/slider/{{ $photoArray[$i] }}"
                                                             class="img-slider" alt="img-slider"
                                                             style="width: 100px;height: 100px">
                                                    </div>
                                                </a>

                                                <button style="margin-top: 10px" type="button"
                                                        class="btn btn-danger img-cont_button"
                                                        onclick="sliderSubmiter({{$i}})">
                                                    <i class="icon-trash-empty red f-20">Delete</i>
                                                </button>
                                                <input type="hidden" name="gallery" value="{{ $photoArray[$i] }}">
                                                <input type="hidden" name="gallery"/>
                                            </div>
                                        @endfor
                                    </div>
                                    <div class="box js text-left">
                                        <input type="file" name="gallery" id="file-9" style="display:none;"
                                               class="inputfile inputfile-7"
                                               data-multiple-caption="{count} files selected"/>
                                        <label style="cursor: pointer" for="file-9"
                                               class="@error('gallery') is-invalid @enderror">
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
                                        @error('gallery')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                @else
                                    <div class="box js text-left">
                                        <input type="file" name="gallery" id="file-9" style="display: none;"
                                               class="inputfile inputfile-7"
                                               data-multiple-caption="{count} files selected"/>
                                        <label style="cursor: pointer;" for="file-9" class="@error('gallery') is-invalid @enderror">
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
                                        @error('gallery')


                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                @endif
                            </div>
                            {{--END SLIDER --}}
                            <button type="submit" class="btn btn-success btn-lg"
                                    style="margin-top: 20px">{{ __('Update') }}</button>
                        </form>
                        <script>
                            function sliderSubmiter(i) {
                                document.querySelector('#photoId').value = i;
                                document.getElementById('removeSliderImg').submit()
                            }
                        </script>
                        <form action="{{ route('dogs.remove_img',$dog) }}" id="removeImg" method="post">
                            <input type="hidden" name="image" @if($dog->image)  value="{{$dog->image}}" @endif>
                            @csrf
                            @method('DELETE')
                        </form>
                        <form action="{{ route('dogs.slider_remove',$dog) }}" id="removeSliderImg" method="post">
                            <input type="hidden" name="gallery"
                                   @if($dog->gallery) value="{{$dog->gallery}}," @endif>
                            <input type="hidden" name="photoId" id="photoId" value="">
                            @csrf
                            @method('DELETE')
                        </form>

                    </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
