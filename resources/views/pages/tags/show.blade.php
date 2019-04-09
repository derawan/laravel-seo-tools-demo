@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('tags.index')}}">tags</a>
    </li>
    <li class="breadcrumb-item">
        {{$record->id}}
    </li>

@endsection

@section('tools')
    <div class="btn-group">

        @can('create',App\Models\Tag::class)
            <a class="btn btn-secondary" href="{{route('tags.create')}}">
                <span class="fa fa-plus"></span>
            </a>
        @endcan
        @can('update',$record)
            <a class="btn btn-secondary" href="{{route('tags.edit',$record->id)}}">
                <span class="fa fa-pencil"></span>
            </a>
        @endcan
        @can('delete',$record)
            <form onsubmit="return confirm('Are you sure you want to delete?')"
                  action="{{route('tags.destroy',$record->id)}}"
                  method="post"
                  style="display: inline">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button type="submit" class="btn btn-secondary cursor-pointer">
                    <i class="text-danger fa fa-remove"></i>
                </button>
            </form>
        @endcan

    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-4">
            @include('cards.tag')
        </div>
    </div>
@endSection