@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Coupon Codes</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('coupon_codes.coupon_code.create') }}" class="btn btn-success" title="Create New Coupon Code">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($couponCodes) == 0)
            <div class="panel-body text-center">
                <h4>No Coupon Codes Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Code</th>
                            <th>Expires</th>
                            <th>Product</th>
                            <th>Direct</th>
                            <th>Percent</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($couponCodes as $couponCode)
                        <tr>
                            <td>{{ optional($couponCode->customer)->name }}</td>
                            <td>{{ $couponCode->code }}</td>
                            <td>{{ $couponCode->expires }}</td>
                            <td>{{ optional($couponCode->product)->name }}</td>
                            <td>{{ $couponCode->direct }}</td>
                            <td>{{ $couponCode->percent }}</td>

                            <td>

                                <form method="POST" action="{!! route('coupon_codes.coupon_code.destroy', $couponCode->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('coupon_codes.coupon_code.show', $couponCode->id ) }}" class="btn btn-info" title="Show Coupon Code">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('coupon_codes.coupon_code.edit', $couponCode->id ) }}" class="btn btn-primary" title="Edit Coupon Code">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Coupon Code" onclick="return confirm(&quot;Click Ok to delete Coupon Code.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
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
            {!! $couponCodes->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection