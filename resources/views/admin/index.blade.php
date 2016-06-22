@extends('admin.admin_template')
@section('content')
    <style>
        canvas{
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
    </style>
    <script src="/js/Chart.bundle.js"></script>
    <div style="width: 75%">
        <h4>每日订单数量</h4>
        <canvas id="chart"></canvas>
    </div>
    <div style="width: 75%">
        <h4>每月订单数量</h4>
        <canvas id="myChart"></canvas>
    </div>
    <script>
        var ctx = document.getElementById("chart");
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Livraison", "emporter"],
                datasets: [{
                    label: 'Livraison',
                    data: [60, 50],
                    backgroundColor: [
                        "#FF6384",
                        "#36A2EB"
                    ]
                }]
            }
        });

        var ctx1 = document.getElementById("myChart");
        var myChart1 = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: 'Livraison',
                    data: [12, 19, 3, 5, 2, 3,10],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1
                },{
                    label:'emporter',
                    data: [15, 29, 23, 25, 12, 13,20],
                    backgroundColor: 'rgba(255, 199, 132, 0.2)',
                    borderColor: 'rgba(255,199,132,1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                },
                hover: {
                    mode: 'dataset'
                }
            }
        });
    </script>
@endsection