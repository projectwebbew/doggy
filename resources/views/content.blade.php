@extends('welcome')
@section('content')
    @include('sections.section_header')
    <section class="section_two">
        @include('sections.section_filtration')
        @include('sections.section_pagination')
    </section>
    @include('sections.section_form')
    @include('footer')

@endsection

