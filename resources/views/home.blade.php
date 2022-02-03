@extends('layouts.app')
@section('breadcrumb')
    <div class="page-title-box">
        <h4 class="page-title">Home </h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        </ol>
    </div>
@endsection
@section('content')

<div class="row">
    {{ url()->previous() }}
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">Account Overview</h4>

            <div class="row">
                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box mb-0 widget-chart-two">
                        <div class="float-right">
                            <div style="display:inline;width:80px;height:80px;"><canvas width="80" height="80"></canvas><input data-plugin="knob" data-width="80" data-height="80" data-linecap="round" data-fgcolor="#0acf97" value="37" data-skin="tron" data-angleoffset="180" data-readonly="true" data-thickness=".1" readonly="readonly" style="width: 44px; height: 26px; position: absolute; vertical-align: middle; margin-top: 26px; margin-left: -62px; border: 0px; background: none; font: bold 16px Arial; text-align: center; color: rgb(10, 207, 151); padding: 0px; appearance: none;"></div>
                        </div>
                        <div class="widget-chart-two-content">
                            <p class="text-muted mb-0 mt-2">Daily Sales</p>
                            <h3 class="">$35,715</h3>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box mb-0 widget-chart-two">
                        <div class="float-right">
                            <div style="display:inline;width:80px;height:80px;"><canvas width="80" height="80"></canvas><input data-plugin="knob" data-width="80" data-height="80" data-linecap="round" data-fgcolor="#f9bc0b" value="92" data-skin="tron" data-angleoffset="180" data-readonly="true" data-thickness=".1" readonly="readonly" style="width: 44px; height: 26px; position: absolute; vertical-align: middle; margin-top: 26px; margin-left: -62px; border: 0px; background: none; font: bold 16px Arial; text-align: center; color: rgb(249, 188, 11); padding: 0px; appearance: none;"></div>
                        </div>
                        <div class="widget-chart-two-content">
                            <p class="text-muted mb-0 mt-2">Sales Analytics</p>
                            <h3 class="">$97,511</h3>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box mb-0 widget-chart-two">
                        <div class="float-right">
                            <div style="display:inline;width:80px;height:80px;"><canvas width="80" height="80"></canvas><input data-plugin="knob" data-width="80" data-height="80" data-linecap="round" data-fgcolor="#f1556c" value="14" data-skin="tron" data-angleoffset="180" data-readonly="true" data-thickness=".1" readonly="readonly" style="width: 44px; height: 26px; position: absolute; vertical-align: middle; margin-top: 26px; margin-left: -62px; border: 0px; background: none; font: bold 16px Arial; text-align: center; color: rgb(241, 85, 108); padding: 0px; appearance: none;"></div>
                        </div>
                        <div class="widget-chart-two-content">
                            <p class="text-muted mb-0 mt-2">Statistics</p>
                            <h3 class="">$954</h3>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box mb-0 widget-chart-two">
                        <div class="float-right">
                            <div style="display:inline;width:80px;height:80px;"><canvas width="80" height="80"></canvas><input data-plugin="knob" data-width="80" data-height="80" data-linecap="round" data-fgcolor="#2d7bf4" value="60" data-skin="tron" data-angleoffset="180" data-readonly="true" data-thickness=".1" readonly="readonly" style="width: 44px; height: 26px; position: absolute; vertical-align: middle; margin-top: 26px; margin-left: -62px; border: 0px; background: none; font: bold 16px Arial; text-align: center; color: rgb(45, 123, 244); padding: 0px; appearance: none;"></div>
                        </div>
                        <div class="widget-chart-two-content">
                            <p class="text-muted mb-0 mt-2">Total Revenue</p>
                            <h3 class="">$32,540</h3>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-6">
        <div class="card-box">
            <h4 class="header-title">Order Overview</h4>

            <div id="website-stats" style="height: 350px; padding: 0px; position: relative;" class="flot-chart mt-5"><canvas class="flot-base" width="459" height="350" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 459.5px; height: 350px;"></canvas><div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;"><div style="position: absolute; max-width: 65px; top: 313px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 64px; text-align: center;">0</div><div style="position: absolute; max-width: 65px; top: 313px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 128px; text-align: center;">2</div><div style="position: absolute; max-width: 65px; top: 313px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 192px; text-align: center;">4</div><div style="position: absolute; max-width: 65px; top: 313px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 256px; text-align: center;">6</div><div style="position: absolute; max-width: 65px; top: 313px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 320px; text-align: center;">8</div><div style="position: absolute; max-width: 65px; top: 313px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 381px; text-align: center;">10</div><div style="position: absolute; max-width: 65px; top: 313px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 445px; text-align: center;">12</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;"><div style="position: absolute; top: 277px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 30px; text-align: right;">0</div><div style="position: absolute; top: 237px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 24px; text-align: right;">10</div><div style="position: absolute; top: 198px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 24px; text-align: right;">20</div><div style="position: absolute; top: 159px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 24px; text-align: right;">30</div><div style="position: absolute; top: 119px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 24px; text-align: right;">40</div><div style="position: absolute; top: 80px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 24px; text-align: right;">50</div><div style="position: absolute; top: 41px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 24px; text-align: right;">60</div><div style="position: absolute; top: 2px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 24px; text-align: right;">70</div></div></div><canvas class="flot-overlay" width="459" height="350" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 459.5px; height: 350px;"></canvas><div class="legend"><div style="position: absolute; width: 324.312px; height: 30px; top: -24px; right: 8px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:-24px;right:8px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid null;padding:1px"><div style="width:4px;height:0;border:5px solid #02c0ce;overflow:hidden"></div></div></td><td class="legendLabel">Bitcoin&nbsp;&nbsp;</td><td class="legendColorBox"><div style="border:1px solid null;padding:1px"><div style="width:4px;height:0;border:5px solid #2d7bf4;overflow:hidden"></div></div></td><td class="legendLabel">Ethereum&nbsp;&nbsp;</td><td class="legendColorBox"><div style="border:1px solid null;padding:1px"><div style="width:4px;height:0;border:5px solid #f1556c;overflow:hidden"></div></div></td><td class="legendLabel">Litecoin&nbsp;&nbsp;</td></tr></tbody></table></div><div class="axisLabels xaxisLabel" style="position:absolute; top: 0; left: 0; -moz-transform: translate(228.7734375px, 328px);-webkit-transform: translate(228.7734375px, 328px);-o-transform: translate(228.7734375px, 328px);-ms-transform: translate(228.7734375px, 328px);;">Last Days</div><div class="axisLabels yaxisLabel" style="position:absolute; top: 0; left: 0; -moz-transform: translate(-22.703125px, 145.5px) rotate(-90deg);-webkit-transform: translate(-22.703125px, 145.5px) rotate(-90deg);-o-transform: translate(-22.703125px, 145.5px) rotate(-90deg);-ms-transform: translate(-22.703125px, 145.5px) rotate(-90deg);;">Daily Visits</div></div>

        </div>
    </div>

    <div class="col-lg-6">
        <div class="card-box">
            <h4 class="header-title">Sales Overview</h4>

            <div id="combine-chart">
                <div id="combine-chart-container" class="flot-chart mt-5" style="height: 350px; padding: 0px; position: relative;">
                <canvas class="flot-base" width="459" height="350" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 459.5px; height: 350px;"></canvas><div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;"><div style="position: absolute; max-width: 19px; top: 313px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 39px; text-align: center;">22h</div><div style="position: absolute; max-width: 19px; top: 313px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 72px; text-align: center;">00h</div><div style="position: absolute; max-width: 19px; top: 313px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 106px; text-align: center;">02h</div><div style="position: absolute; max-width: 19px; top: 313px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 139px; text-align: center;">04h</div><div style="position: absolute; max-width: 19px; top: 313px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 173px; text-align: center;">06h</div><div style="position: absolute; max-width: 19px; top: 313px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 206px; text-align: center;">08h</div><div style="position: absolute; max-width: 19px; top: 313px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 240px; text-align: center;">10h</div><div style="position: absolute; max-width: 19px; top: 313px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 273px; text-align: center;">12h</div><div style="position: absolute; max-width: 19px; top: 313px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 306px; text-align: center;">14h</div><div style="position: absolute; max-width: 19px; top: 313px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 340px; text-align: center;">16h</div><div style="position: absolute; max-width: 19px; top: 313px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 373px; text-align: center;">18h</div><div style="position: absolute; max-width: 19px; top: 313px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 407px; text-align: center;">20h</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;"><div style="position: absolute; top: 302px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 36px; text-align: right;">0</div><div style="position: absolute; top: 264px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 24px; text-align: right;">100</div><div style="position: absolute; top: 227px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 24px; text-align: right;">200</div><div style="position: absolute; top: 189px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 24px; text-align: right;">300</div><div style="position: absolute; top: 152px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 24px; text-align: right;">400</div><div style="position: absolute; top: 114px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 24px; text-align: right;">500</div><div style="position: absolute; top: 77px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 24px; text-align: right;">600</div><div style="position: absolute; top: 39px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 24px; text-align: right;">700</div><div style="position: absolute; top: 2px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(189, 189, 189); left: 24px; text-align: right;">800</div></div></div><canvas class="flot-overlay" width="459" height="350" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 459.5px; height: 350px;"></canvas><div class="legend"><div style="position: absolute; width: 423.578px; height: 30px; top: -24px; right: 10px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:-24px;right:10px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid null;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(227,234,239);overflow:hidden"></div></div></td><td class="legendLabel">Last 24 Hours&nbsp;&nbsp;</td><td class="legendColorBox"><div style="border:1px solid null;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(241,85,108);overflow:hidden"></div></div></td><td class="legendLabel">Last 48 Hours&nbsp;&nbsp;</td><td class="legendColorBox"><div style="border:1px solid null;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(2,192,206);overflow:hidden"></div></div></td><td class="legendLabel">Difference&nbsp;&nbsp;</td></tr></tbody></table></div><div class="axisLabels xaxisLabel" style="position:absolute; top: 0; left: 0; -moz-transform: translate(213.0859375px, 328px);-webkit-transform: translate(213.0859375px, 328px);-o-transform: translate(213.0859375px, 328px);-ms-transform: translate(213.0859375px, 328px);;">Daily Hours</div><div class="axisLabels yaxisLabel" style="position:absolute; top: 0; left: 0; -moz-transform: translate(-46.1015625px, 158px) rotate(-90deg);-webkit-transform: translate(-46.1015625px, 158px) rotate(-90deg);-o-transform: translate(-46.1015625px, 158px) rotate(-90deg);-ms-transform: translate(-46.1015625px, 158px) rotate(-90deg);;">Point Value (1000)</div></div>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card-box">
            <h4 class="header-title mb-3">Wallet Balances</h4>

            <div class="table-responsive">
                <table class="table table-hover table-centered m-0">

                    <thead>
                    <tr>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Currency</th>
                        <th>Balance</th>
                        <th>Reserved in orders</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <img src="assets/images/users/avatar-2.jpg" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm">
                        </td>

                        <td>
                            <h5 class="m-0 font-weight-normal">Tomaslau</h5>
                            <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                        </td>

                        <td>
                            <i class="mdi mdi-currency-btc text-primary"></i> BTC
                        </td>

                        <td>
                            0.00816117 BTC
                        </td>

                        <td>
                            0.00097036 BTC
                        </td>

                        <td>
                            <a href="#" class="btn btn-sm btn-custom"><i class="mdi mdi-plus"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="mdi mdi-minus"></i></a>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <img src="assets/images/users/avatar-3.jpg" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm">
                        </td>

                        <td>
                            <h5 class="m-0 font-weight-normal">Erwin E. Brown</h5>
                            <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                        </td>

                        <td>
                            <i class="mdi mdi-currency-eth text-primary"></i> ETH
                        </td>

                        <td>
                            3.16117008 ETH
                        </td>

                        <td>
                            1.70360009 ETH
                        </td>

                        <td>
                            <a href="#" class="btn btn-sm btn-custom"><i class="mdi mdi-plus"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="mdi mdi-minus"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="assets/images/users/avatar-4.jpg" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm">
                        </td>

                        <td>
                            <h5 class="m-0 font-weight-normal">Margeret V. Ligon</h5>
                            <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                        </td>

                        <td>
                            <i class="mdi mdi-currency-eur text-primary"></i> EUR
                        </td>

                        <td>
                            25.08 EUR
                        </td>

                        <td>
                            12.58 EUR
                        </td>

                        <td>
                            <a href="#" class="btn btn-sm btn-custom"><i class="mdi mdi-plus"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="mdi mdi-minus"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="assets/images/users/avatar-5.jpg" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm">
                        </td>

                        <td>
                            <h5 class="m-0 font-weight-normal">Jose D. Delacruz</h5>
                            <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                        </td>

                        <td>
                            <i class="mdi mdi-currency-cny text-primary"></i> CNY
                        </td>

                        <td>
                            82.00 CNY
                        </td>

                        <td>
                            30.83 CNY
                        </td>

                        <td>
                            <a href="#" class="btn btn-sm btn-custom"><i class="mdi mdi-plus"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="mdi mdi-minus"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="assets/images/users/avatar-6.jpg" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm">
                        </td>

                        <td>
                            <h5 class="m-0 font-weight-normal">Luke J. Sain</h5>
                            <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                        </td>

                        <td>
                            <i class="mdi mdi-currency-btc text-primary"></i> BTC
                        </td>

                        <td>
                            2.00816117 BTC
                        </td>

                        <td>
                            1.00097036 BTC
                        </td>

                        <td>
                            <a href="#" class="btn btn-sm btn-custom"><i class="mdi mdi-plus"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="mdi mdi-minus"></i></a>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="col-lg-4">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Total Wallet Balance</h4>


            <div id="donut-chart">
                <div id="donut-chart-container" class="flot-chart mt-5" style="height: 340px; padding: 0px; position: relative;">
                <canvas class="flot-base" width="283" height="340" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 283px; height: 340px;"></canvas><canvas class="flot-overlay" width="283" height="340" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 283px; height: 340px;"></canvas><span class="pieLabel" id="pieLabel0" style="position: absolute; top: 88.5px; left: 199.203px;"><div style="font-size:x-small;text-align:center;padding:2px;color:rgb(2,192,206);"><div style="font-size:14px;">&nbsp;Bitcoin</div><br>32%</div></span><span class="pieLabel" id="pieLabel1" style="position: absolute; top: 228.5px; left: 156.93px;"><div style="font-size:x-small;text-align:center;padding:2px;color:rgb(45,123,244);"><div style="font-size:14px;">&nbsp;Ethereum</div><br>20%</div></span><span class="pieLabel" id="pieLabel2" style="position: absolute; top: 232.5px; left: 73.0859px;"><div style="font-size:x-small;text-align:center;padding:2px;color:rgb(227,234,239);"><div style="font-size:14px;">&nbsp;Litecoin</div><br>10%</div></span><span class="pieLabel" id="pieLabel3" style="position: absolute; top: 159.5px; left: 1.64062px;"><div style="font-size:x-small;text-align:center;padding:2px;color:rgb(241,85,108);"><div style="font-size:14px;">&nbsp;Bitcoin Cash</div><br>21%</div></span><span class="pieLabel" id="pieLabel4" style="position: absolute; top: 57.5px; left: 60.4844px;"><div style="font-size:x-small;text-align:center;padding:2px;color:rgb(249,188,11);"><div style="font-size:14px;">&nbsp;Cardano</div><br>17%</div></span></div>
            </div>

        </div>

    </div>
</div>


@endsection
