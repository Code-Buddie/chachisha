@extends('app')

@section('css')
    .banner{
    /*background: linear-gradient(to top, rgba(23,37,84,0.88), rgba(30,58,138,0.88)), url("/storage/images/protester.jpeg") no-repeat center;*/
    background-size: cover;
    }

@stop


@section('content')
    <section class="bg-red-600 dark:bg-red-600 banner">
        <div class="container sm:px-16 lg:px-24">
           
        </div>
    </section>

    <div class="container py-12">
        <div class="flex">
            <!-- Left Panel: Form for Filtering Cases -->
            <div class="w-1/4 pr-8">

            </div>
            <div class="w-3/4">

            </div>
        </div>
@endsection
