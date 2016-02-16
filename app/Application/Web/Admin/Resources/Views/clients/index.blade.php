@extends('admin::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Admin: Clients  <a href="{!! route('admin.client.create')!!}" ><i class="pull-right glyphicon glyphicon-plus"></i></a> </div>

                    @if (session('status'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="panel-body">

                        <table class="table table-hover">
                            <thead>
                                <th>Name</th>
                                <th>Client Id</th>
                                <th>Secret Id</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>#</th>
                            </thead>
                            <tbody>
                            @foreach($clients  as $client)
                                <tr>
                                    <td>{!! $client->name   !!}</td>
                                    <td>{!! $client->id     !!}</td>
                                    <td>{!! $client->secret !!}</td>
                                    <td>{!! $client->created_at !!}</td>
                                    <td>{!! $client->updated_at !!}</td>
                                    <td>
                                        <a href="{!! route('admin.client.edit', $client) !!}" ><i class="glyphicon glyphicon-refresh"></i></a>
                                        <a href="{!! route('admin.client.delete',$client)!!}" ><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
