@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($customer->name) ? $customer->name : 'Customer' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('customers.customer.destroy', $customer->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('customers.customer.index') }}" class="btn btn-primary" title="Show All Customer">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('customers.customer.create') }}" class="btn btn-success" title="Create New Customer">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('customers.customer.edit', $customer->id ) }}" class="btn btn-primary" title="Edit Customer">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Customer" onclick="return confirm(&quot;Click Ok to delete Customer.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Client Customer</dt>
            <dd>{{ $customer->client_customer_id }}</dd>
            <dt>Name</dt>
            <dd>{{ $customer->name }}</dd>
            <dt>Email</dt>
            <dd>{{ $customer->email }}</dd>
            <dt>Phone</dt>
            <dd>{{ $customer->phone }}</dd>
            <dt>Client</dt>
            <dd>{{ optional($customer->client)->company_name }}</dd>
            <dt>Os App</dt>
            <dd>{{ $customer->os_app_id }}</dd>
            <dt>Os Api Key</dt>
            <dd>{{ $customer->os_api_key }}</dd>

        </dl>

    </div>
</div>

@endsection