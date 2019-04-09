@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{route('products.index')}}">products</a>
</li>
<li class="breadcrumb-item">
    Create
</li>
@endsection
@section('content')
<div class="row">
    <div class='col-md-12'>
        <div class='card bg-white'>
            <div class="card-body">
                @include('forms.product')
            </div>
        </div>
    </div>
</div>
@endSection