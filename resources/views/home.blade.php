@extends('layouts.app')
<style>
    .container {
        width: 100%;
        height: 100%;
        /* background-image: linear-gradient(rgba(150, 134, 134, 0.75)),url('assets/images/dashbaord.jpg'); */

        background-size: cover;
        background-position: center;
    }
</style>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-xl-4">
            <div class="card overflow-hidden">
                <div class="bg-soft-primary">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">Welcome  To!</h5>
                                <p>Blog</p>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted font-weight-medium">Users</p>
                                    <h4 class="mb-0">{{$user->count()}}</h4>
                                </div>
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                    <span class="avatar-title">
                                        <i class="fas fa-users font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid" style="background-color:rgba(35, 185, 21, 0.467);">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted font-weight-medium">Posts</p>
                                    <h4 class="mb-0">{{$post->count()}}</h4>
                                </div>
                                <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="fa fa-hand-paper-o" aria-hidden="true"></i>

                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="card mini-stats-wid"  style="background-color:#6787;">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted font-weight-medium">Categories</p>
                                    <h4 class="mb-0">{{$category->count()}}</h4>
                                </div>
                                <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                     <i class="fa fa-list" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mini-stats-wid" style="background-color:rgba(202, 227, 10, 0.467);">

                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted font-weight-medium">Tags</p>
                                    <h4 class="mb-0">{{$tag->count()}}</h4>
                                </div>
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                    <span class="avatar-title">
                                        <i class="fa fa-industry" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end row -->
        </div>

    </div>

    <!-- end row -->
    <!--New-->

    <body>
        <div id="piechart" style="width: 900px; height: 500px;"></div>
    </body>


</div>

@endsection
{{-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
          ['value','value 2'],
      <?php  
      foreach($arr as $arr){
          echo $arr;
      }
       ?>
        // ['Available Books', 'Hours per Day'],
        // ['Available Books',     22],
        // ['Reserved Books',      2],
        // ['Borrowed Books',  2],
        // ['Watch TV', 2],
        // ['Sleep',    7]
      ]);

      var options = {
        title: '',
        is3D: true,
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
</script> --}}