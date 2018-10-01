@extends('layouts.app')

@section('content')

<!-- <div class="section"> -->
    <!-- <div> -->
<!-- <canvas id="graph" width = "600" height ="400"></canvas> -->
    <graph :keys="{{ $amount->keys() }}" 
           :values="{{ $amount->values() }}"></graph>

    <script src ="/js/main.js"> </script>
<!-- </div> -->


@endsection