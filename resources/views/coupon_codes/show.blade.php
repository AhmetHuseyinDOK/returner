@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Coupon Code' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('coupon_codes.coupon_code.destroy', $couponCode->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('coupon_codes.coupon_code.index') }}" class="btn btn-primary" title="Show All Coupon Code">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('coupon_codes.coupon_code.create') }}" class="btn btn-success" title="Create New Coupon Code">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('coupon_codes.coupon_code.edit', $couponCode->id ) }}" class="btn btn-primary" title="Edit Coupon Code">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Coupon Code" onclick="return confirm(&quot;Click Ok to delete Coupon Code.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Customer</dt>
            <dd>{{ optional($couponCode->customer)->name }}</dd>
            <dt>Code</dt>
            <dd>{{ $couponCode->code }}</dd>
            <dt>Expires</dt>
            <dd>{{ $couponCode->expires }}</dd>
            <dt>Product</dt>
            <dd>{{ optional($couponCode->product)->name }}</dd>
            <dt>Direct</dt>
            <dd>{{ $couponCode->direct }}</dd>
            <dt>Percent</dt>
            <dd>{{ $couponCode->percent }}</dd>

        </dl>

    </div>
</div>

@endsection