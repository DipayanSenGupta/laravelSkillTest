@extends('layouts.jhantu-app')
@section('css')
    <style>
        a, a:hover {
            color: white;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="float-right">
            <a href="{{url('jhantu/create')}}" class="btn btn-primary">New</a>
        </div>
        <h1 style="font-size: 2.2rem">Image Gallery (Image CRUD Tutorial)</h1>
        <hr/>
        <div class="row">
            @foreach($images as $image)
                <div class="col-md-4 col-lg-3" style="margin-bottom: 20px">
                    <div class="card">
                        <img class="card-img-top"
                             src="{{url($image->image? 'images/'.$image->image:'images/noimage.jpg')}}"
                             alt="{{$image->description}}" width="100%" height="180px"/>
                        <div class="card-body">
                            <h6 class="card-title text-center">{{ucwords($image->description)}}</h6>
                        </div>
{{--                         <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <form id="frm_{{$image->id}}"
                                      action="{{url('jhantu/delete/'.$image->id)}}"
                                      method="delete" style="padding-bottom: 0px;margin-bottom: 0px">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="javascript:if(confirm('Are you sure want to delete?')) $('#frm_{{$image->id}}').submit()"
                                               class="btn btn-danger btn-sm btn-block">Delete</a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="{{url('jhantu/edit/'.$image->id)}}"
                                               class="btn btn-primary btn-sm btn-block">Edit</a>
                                        </div>
                                        <input type="hidden" name="_method" value="delete"/>
                                        {{csrf_field()}}
                                    </div>
                                </form>
                            </li>
                        </ul> --}}
                        <div class="row">
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-info " style="text-align: center;">
                                {{ link_to_route('jhantu.edit','Edit', ['jhantu'=>$image])}}            
                                </button>
                            </div>

                            <div class="col-sm-6">
                            {!! Form::open(
                            [
                            'route' => ['jhantu.destroy', $image],
                            'method' => 'delete'
                            ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            </div>        
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
         <nav>
            <ul class="pagination justify-content-end">
                {{$images->links('vendor.pagination.bootstrap-4')}}
            </ul>
        </nav>
    </div>
@endsection