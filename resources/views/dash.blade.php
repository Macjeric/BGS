
    @extends('layouts.admin')

@section('content')

<div class ="section">
    <div class ="container">
        <div class="flex">
<div class="col">
<div class="box">
    <a href="/graph">
    <graph :keys="{{ $amount->keys() }}" 
           :values="{{ $amount->values() }}"></graph>
</a>
    <script src ="/js/main.js"> </script>
 </div>
</div>

<div class="col">
<div class="box">
    <a href ="/admin"><img src="/pic/addmin.png" height="300px" width="500px"></img></a></div>
</div>
</div>

<div class="col">
    <div class ="box">
    <a href ="/limits"><img src="/pic/lim.png" height="300px" width="500px"></img></a></div>


    </div>
</div>
<div>
</div>
    

@endsection
</html>