@extends('app')

@push('css')
    <style>

        .banner {
            background: linear-gradient(to top, rgba(23, 37, 84, 0.88), rgba(30, 58, 138, 0.88)), url("/images/banner.jpg") no-repeat center;
            background-size: cover;
        }

        #map, #cases_chart {
            height: 60vh;
        }
    </style>

@endpush


@section('content')
   
@endsection



