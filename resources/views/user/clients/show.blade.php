@extends('layouts.user')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Client' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('user.clients.client.destroy', $client->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('user.clients.client.index') }}" class="btn btn-primary" title="Show All Client">
                        <span class="fa fa-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('user.clients.client.create') }}" class="btn btn-success" title="Create New Client">
                            <i class="fa fa-plus"></i>
                    </a>
                    
                    <a href="{{ route('user.clients.client.edit', $client->id ) }}" class="btn btn-primary" title="Edit Client">
                        <span class="fa fa-edit" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Client" onclick="return confirm(&quot;Click Ok to delete Client.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <div class="row">
                <div class="col-sm-6">
                        <dl class="dl-horizontal">
                                <dt>Company Name</dt>
                                <dd>{{ $client->company_name }}</dd>
                                <dt>Api Customer Url</dt>
                                <dd>{{ $client->api_customer_url }}</dd>
                                <dt>Api Coupon Url</dt>
                                <dd>{{ $client->api_coupon_url }}</dd>
                                <dt>Host</dt>
                                <dd>{{ $client->host }}</dd>
                                <dt>Os App</dt>
                                <dd>{{ $client->os_app_id }}</dd>
                                <dt>Os Api Key</dt>
                                <dd>{{ $client->os_api_key }}</dd>
                    
                            </dl>
                </div>
                <div class="col-sm-6">
                    <pre>
                        {{$client->script}}
                    </pre>
                </div>
        </div>
        
        

    </div>
</div>

@endsection