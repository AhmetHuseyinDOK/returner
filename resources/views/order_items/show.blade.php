@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Order Item' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('order_items.order_item.destroy', $orderItem->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('order_items.order_item.index') }}" class="btn btn-primary" title="Show All Order Item">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('order_items.order_item.create') }}" class="btn btn-success" title="Create New Order Item">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('order_items.order_item.edit', $orderItem->id ) }}" class="btn btn-primary" title="Edit Order Item">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Order Item" onclick="return confirm(&quot;Click Ok to delete Order Item.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Order</dt>
            <dd>{{ optional($orderItem->order)->id }}</dd>
            <dt>Product</dt>
            <dd>{{ optional($orderItem->product)->id }}</dd>
            <dt>Quantity</dt>
            <dd>{{ $orderItem->quantity }}</dd>
            <dt>Coupon</dt>
            <dd>{{ optional($orderItem->coupon)->id }}</dd>

        </dl>

    </div>
</div>

@endsection