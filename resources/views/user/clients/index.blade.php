@extends('layouts.user')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="fa fa-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Clients</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('user.clients.client.create') }}" class="btn btn-success" title="Create New Client">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($clients) == 0)
            <div class="panel-body text-center">
                <h4>No Clients Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Api Customer Url</th>
                            <th>Api Coupon Url</th>
                            <th>Host</th>
                            <th>Os App</th>
                            <th>Os Api Key</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->company_name }}</td>
                            <td>{{ $client->api_customer_url }}</td>
                            <td>{{ $client->api_coupon_url }}</td>
                            <td>{{ $client->host }}</td>
                            <td>{{ $client->os_app_id }}</td>
                            <td>{{ $client->os_api_key }}</td>

                            <td>

                                <form method="POST" action="{!! route('user.clients.client.destroy', $client->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('user.clients.client.show', $client->id ) }}" class="btn btn-info" title="Show Client">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('user.clients.client.edit', $client->id ) }}" class="btn btn-primary" title="Edit Client">
                                            <span class="fa fa-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Client" onclick="return confirm(&quot;Click Ok to delete Client.&quot;)">
                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $clients->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection