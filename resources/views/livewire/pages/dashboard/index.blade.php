@section('title', 'Dashboard')

<div>
    <div>
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            @livewire('components.navbar')
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            @include('includes.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                @include('includes.content-header')

                <!-- Main content -->
                <section class="content">
                    <div class="card">
                        <div class="card-header">
                            <div class="table-responsive p-0">
                                    <div class="chart">
                                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ./card-header -->
                        <div class="card-body pt-4">

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            
            @include('includes.footer')
        </div>
        <!-- ./wrapper -->
    </div>
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
            <script src="{{ asset('assets') }}/plugins/chartjs.min.js"></script>
<script>
    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {
        title:{
            text: "Data Ingggridients History "
        },
        axisY:[{
            title: "Stock",
            lineColor: "#C24642",
            tickColor: "#C24642",
            labelFontColor: "#C24642",
            titleFontColor: "#C24642",
            // includeZero: true,
            prefix: "",
            suffix: ""
        }
        ],
        axisY2: {
            title: "Purchase",
            lineColor: "#7F6084",
            tickColor: "#7F6084",
            labelFontColor: "#7F6084",
            titleFontColor: "#7F6084",
            // includeZero: true,
            prefix: "",
            suffix: ""
        },
        axisY3: {
            title: "Stock IN",
            lineColor: "#7F6084",
            tickColor: "#7F6084",
            labelFontColor: "#7F6084",
            titleFontColor: "#7F6084",
            // includeZero: true,
            prefix: "",
            suffix: ""
        },
        toolTip: {
            shared: true
        },
        legend: {
            cursor: "pointer",
            itemclick: toggleDataSeries
        },
        data: [{
            type: "line",
            name: "Stock",
            color: "#369EAD",
            showInLegend: true,
            axisYIndex: 1,
            dataPoints: <?php echo json_encode($harga, JSON_NUMERIC_CHECK); ?>
        },{
            type: "line",
            name: "Purchase",
            color: "#369EAD",
            showInLegend: true,
            axisYIndex: 1,
            dataPoints: <?php echo json_encode($purchase, JSON_NUMERIC_CHECK); ?>
        },{
            type: "Stock In",
            name: "Stock",
            color: "#369EAD",
            showInLegend: true,
            axisYIndex: 1,
            dataPoints: <?php echo json_encode($stock_in, JSON_NUMERIC_CHECK); ?>
        },
        
        ]
    });
    chart.render();
    function toggleDataSeries(e) {
        if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        } else {
            e.dataSeries.visible = true;
        }
        e.chart.render();
    }

}
</script>