@extends('layouts.layout')
@section('title', 'Bienvenido')

@section('content')

    {{-- @include('icaro::icaro_home') --}}


    <div class="row row-space-10 m-b-20">
        <!-- begin col-4 -->
        <div class="col-lg-4 col-sm-6">
            <div class="widget widget-stats bg-gradient-teal m-b-10">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">TODAY'S VISITS</div>
                    <div class="stats-number">7,842,900</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 70.1%;"></div>
                    </div>
                    <div class="stats-desc">Better than last week (70.1%)</div>
                </div>
            </div>
        </div>
        <!-- end col-4 -->
        <!-- begin col-4 -->
        <div class="col-lg-4 col-sm-6">
            <div class="widget widget-stats bg-gradient-blue m-b-10">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-dollar-sign fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">TODAY'S PROFIT</div>
                    <div class="stats-number">180,200</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 40.5%;"></div>
                    </div>
                    <div class="stats-desc">Better than last week (40.5%)</div>
                </div>
            </div>
        </div>
        <!-- end col-4 -->
        <!-- begin col-4 -->
        <div class="col-lg-4 col-sm-6">
            <div class="widget widget-stats bg-gradient-purple m-b-10">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-archive fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">NEW ORDERS</div>
                    <div class="stats-number">38,900</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 76.3%;"></div>
                    </div>
                    <div class="stats-desc">Better than last week (76.3%)</div>
                </div>
            </div>
        </div>
        <!-- end col-4 -->
        <!-- begin col-4 -->
        <div class="col-lg-4 col-sm-6">
            <div class="widget widget-stats bg-gradient-black m-b-10">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-comment-alt fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">NEW COMMENTS</div>
                    <div class="stats-number">3,988</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 54.9%;"></div>
                    </div>
                    <div class="stats-desc">Better than last week (54.9%)</div>
                </div>
            </div>
        </div>
        <!-- end col-4 -->
        <!-- begin col-4 -->
        <div class="col-lg-4 col-sm-6">
            <div class="widget widget-stats bg-gradient-orange m-b-10">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-file-alt fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">PENDING INVOICE</div>
                    <div class="stats-number">20</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 23.5%;"></div>
                    </div>
                    <div class="stats-desc">More than last week (23.5%)</div>
                </div>
            </div>
        </div>
        <!-- end col-4 -->
        <!-- begin col-4 -->
        <div class="col-lg-4 col-sm-6">
            <div class="widget widget-stats bg-pink m-b-10">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-exclamation-triangle fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">ERROR LOG</div>
                    <div class="stats-number">5</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 10.5%;"></div>
                    </div>
                    <div class="stats-desc">More than last week (10.5%)</div>
                </div>
            </div>
        </div>
        <!-- end col-4 -->
    </div>


    <!-- begin widget-table -->
    <table class="table table-bordered widget-table widget-table-rounded">
        <thead>
            <tr>
                <th width="1%">Image</th>
                <th>Product Info</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="widget-table-img" style="background-image: url(../assets/img/product/product-6.png);"></div>
                </td>
                <td>
                    <h4 class="widget-table-title">Mavic Pro Combo</h4>
                    <p class="widget-table-desc m-b-15">Portable yet powerful, the Mavic Pro is your personal drone, ready
                        to go with you everywhere.</p>
                    <div class="progress progress-sm rounded-corner m-b-5">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-orange f-s-10 f-w-600"
                            style="width: 30%;">30%</div>
                    </div>
                    <div class="clearfix f-s-10">
                        status: <b class="text-inverse">Shipped</b>
                    </div>
                </td>
                <td class="text-nowrap">
                    <b class="text-inverse">$999</b><br />
                    <small class="text-inverse text-line-through">$1,202</small>
                </td>
                <td>1</td>
                <td>999.00</td>
                <td><a href="#" class="btn btn-inverse btn-sm width-80 rounded-corner">Edit</a></td>
            </tr>
        </tbody>
    </table>
    <!-- end widget-table -->

@endsection
