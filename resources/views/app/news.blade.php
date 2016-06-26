@extends('app.app_template')
@section('content')
    <link href="{{URL::asset("css/AdminLTE.css")}}" rel="stylesheet" type="text/css" />
    <script src="{{ URL::asset ("js/app.js") }}" type="text/javascript"></script>
    <ul class="timeline">

        <!-- timeline time label -->
        <li class="time-label">
        <span class="bg-red">
            10 Feb. 2014
        </span>
        </li>
        <!-- /.timeline-label -->

        <!-- timeline item -->
        <li>
            <!-- timeline icon -->
            <i class="fa fa-envelope bg-blue"></i>
            <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                <h3 class="timeline-header"><a href="#">Lunch Sushi</a></h3>

                <div class="timeline-body">
                    Content goes here
                </div>

                <div class="timeline-footer">
                    <a class="btn btn-primary btn-xs"></a>
                </div>
            </div>
        </li>
        <!-- END timeline item -->


    </ul>
@endsection