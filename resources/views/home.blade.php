@extends('layouts.app')

@section('content-title', 'Home')
@section('content-subtitle', 'Dashboard')

<!--  -->
@section('content')
<div class="row">
			<div class="col-md-12">
				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Summary</h3>
					</div>
					    <div class="box-body">
                            <div class="col-md-4">
                                <div class="info-box bg-purple">
                                    <span class="info-box-icon"><i class="fa fa-user" style="margin-top:20px;"></i></span>
                                    <div class="info-box-content">
                                    <span class="info-box-text">NOA</span>
                                    <span class="info-box-number">{{ array_sum(json_decode ($chartData)) }}</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width:100%"></div>
                                    </div>
                                    <span class="progress-description">
                                        Jumlah Nasabah
                                    </span>
                                    </div>
                                </div>
					        </div>

                            <div class="col-md-4">
                                <!-- Info Boxes Style 2 -->
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="fa fa-money" style="margin-top:20px;"></i></span>

                                <div class="info-box-content">
                                <span class="info-box-text">NOM</span>
                                <span class="info-box-number">{{ "Rp. ". number_format(array_sum(json_decode ($NOMData))/1000000000, 2) ." M"  }}</span>

                                <div class="progress">
                                    <div class="progress-bar" style="width:100%"></div>
                                </div>
                                <span class="progress-description">
                                        Lending NOM 
                                    </span>
                                </div>
                                </div>
					        </div>
                            <div class="col-md-4">
                                <!-- Info Boxes Style 2 -->
                            <div class="info-box bg-blue">
                                <span class="info-box-icon"><i class="fa fa-sort" style="margin-top:20px;"></i></span>
                                <div class="info-box-content">
                                <span class="info-box-text">OS Lancar</span>
                                <span class="info-box-number">{{ "Rp. ". number_format(array_sum(json_decode ($OSLancar))/1000000000, 2) ." M"  }}</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width:1000%"></div>
                                </div>
                                <span class="progress-description">
                                    Outstanding Lancar
                                    </span>
                                </div>
                                </div>
					        </div>
					        <!-- /.box-body -->
				        </div>
				<!-- /.box -->
			    </div>
		    </div>
    <!-- end column md 12  -->
	    </div>
    <!-- end row -->
     @can('lihat-noa-unit')
      <div class="row">
        <div class="col-md-6">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Jumlah Nasabah Berdasarkan Unit</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pie-chart" width="50%" height="40%"></canvas>
            </div>
          </div>
        </div>
        @endcan
@can('lihat-pendapatan-unit')
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Jumlah Pendapatan Berdasarkan Unit</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="line-chart" width="50%" height="40%"></canvas>
            </div>
          </div>
        </div>
        </div>
@endcan
@can('lihat-nasabah-unit')
      <div class="row">
			<div class="col-md-12">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Jumlah Pertumbuhan Nasabah Berdasarkan Unit</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
						</div>
					</div>
                    <div class="box-body">
                     <canvas id="bar-chart" width="50%" height="15%"></canvas>
					</div>       
				</div>
				<!-- /.box -->

			    </div>
		</div>
@endcan
    <div class="row">
			<div class="col-md-12">
				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Laporan Data OS Par</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
						</div>
					</div>
                    <div class="box-body">
                     <canvas id="Par-chart" width="50%" height="15%"></canvas>
					</div>       
				</div>
				<!-- /.box -->

			    </div>

			<div class="col-md-12">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Laporan Data OS NPL</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
						</div>
					</div>
                    <div class="box-body">
                     <canvas id="npl-chart" width="50%" height="15%"></canvas>
					</div>       
				</div>
				<!-- /.box -->

			</div>
		</div>

        <div class="row">
			<div class="col-md-12">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Laporan OS PAR VS -B1</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
						</div>
					</div>
                    <div class="box-body">
                    <canvas id="osparb1-chart" width="50%" height="15%"></canvas>
					</div>       
				</div>
				<!-- /.box -->

			    </div>
			<div class="col-md-12">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Laporan OS NPL VS -B1</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
						</div>
					</div>
                    <div class="box-body">
                     <canvas id="osnplb1-chart" width="60%" height="15%"></canvas>
					</div>       
				</div>
			    </div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Laporan Data KOL</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
						</div>
					</div>
                    <div class="box-body" >
                    <canvas id="kol-chart" width="50%" height="15%"></canvas>
					</div>       
				</div>
			    </div>
        </div>
        <div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Laporan Data KOL VS -B1 </h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
						</div>
					</div>
                    <div class="box-body">
                     <canvas id="kolb1-chart" width="60%" height="15%"></canvas>
					</div>       
				</div>
			    </div>
		</div>
</div>
@endsection
 <script src=https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js charset=utf-8></script>
 <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js charset=utf-8></script>

        <script>
            $(document).ready(function () {
                        var dtLabel = <?php echo $chartLabel; ?>;
                        var dtDATA = <?php echo $chartData; ?>;
                        var chartbar = new Chart(document.getElementById("bar-chart"), {//bar chart 
                            type: 'bar',
                            data: {
                                labels: dtLabel,
                                datasets: [{
                                    data: dtDATA,
                                    backgroundColor: [
                                    '#B40040',
                                    '#00816F',
                                    '#DBD800',
                                    '#2D4C2D',
                                    '#513F3F',
                                    '#ADCF64',
                                    '#13B72F',
                                    '#CF816F',
                                    '#DCAFF0',
                                    '#AF483F',
                                    '#CCAF3F',
                                    '#EAFF21',
                                    '#75D519',]
                                }],
                                
                            },
                            options: {
                                legend: {
                                    display: false
                                },
                                title: {
                                    display: true,
                                    text: 'data pendapatan NOA setiap Unit'
                                },
                                scales: {
                                    xAxes: [{
                                        stacked: false,
                                        beginAtZero: true,
                                        ticks: {
                                            stepSize: 1,
                                            min: 0,
                                            autoSkip: false
                                        }
                                    }]
                                }
                            }
                        });
                        
                        
                        var dtLabelPie = <?php echo $chartLabel; ?>;
                        var dtDATAPie = <?php echo $chartData; ?>;
                        var piechart = new Chart(document.getElementById("pie-chart"), {
                            type: 'pie',
                            data: {
                                labels: dtLabelPie,
                                datasets: [{
                                    label: "",
                                    data: dtDATAPie,
                                    backgroundColor: [
                                    '#B40040',
                                    '#00816F',
                                    '#DBD800',
                                    '#2D4C2D',
                                    '#513F3F',
                                    '#ADCF64',
                                    '#13B72F',
                                    '#CF816F',
                                    '#DCAFF0',
                                    '#AF483F',
                                    '#CCAF3F',
                                    '#EAFF21',
                                    '#75D519',
                                ]
                                }]
                            },
                            options: {
                                legend: {
                                    display: false
                                },
                                title: {
                                    display: true,
                                }
                            }
                        });
                        var parchart = new Chart(document.getElementById("Par-chart"), {
                            type: 'bar',
                            data: {
                                labels: dtLabelPie,
                                datasets: [{
                                    label: "(RP.) Miliar",
                                    data: <?php $formatted_array = array_map(function ($num) {
                                                return number_format($num / 1000000000, 2);
                                            }, $statistikOSPAR);
                                            echo json_encode($formatted_array); ?> ,
                                    backgroundColor: [
                                    '#B40040',
                                    '#00816F',
                                    '#DBD800',
                                    '#2D4C2D',
                                    '#513F3F',
                                    '#ADCF64',
                                    '#13B72F',
                                    '#CF816F',
                                    '#DCAFF0',
                                    '#AF483F',
                                    '#CCAF3F',
                                    '#EAFF21',
                                    '#75D519',
                                ]
                                }]
                            },
                            options: {
                                legend: {
                                    display: false
                                },
                                title: {
                                    display: true,
                                    text: 'data OS PAR setiap Unit'
                                },
                                scales: {
                                    xAxes: [{
                                        stacked: false,
                                        beginAtZero: true,
                                        ticks: {
                                            stepSize: 1,
                                            min: 0,
                                            autoSkip: false
                                        }
                                    }]
                                }
                            }
                        });

                        var nplchart = new Chart(document.getElementById("npl-chart"), {
                            type: 'bar',
                            data: {
                                labels: dtLabelPie,
                                datasets: [{
                                    label: "(RP.) Miliar",
                                    data: <?php $nplarray = array_map(function ($num) {
                                                return number_format($num / 1000000000, 2);
                                            }, $statistikOSNPLLengkap);
                                            echo json_encode($nplarray); ?> ,
                                    backgroundColor: [
                                    '#B40040',
                                    '#00816F',
                                    '#DBD800',
                                    '#2D4C2D',
                                    '#513F3F',
                                    '#ADCF64',
                                    '#13B72F',
                                    '#CF816F',
                                    '#DCAFF0',
                                    '#AF483F',
                                    '#CCAF3F',
                                    '#EAFF21',
                                    '#75D519',
                                ]
                                }]
                            },
                            options: {
                                legend: {
                                    display: false
                                },
                                title: {
                                    display: true,
                                    text: 'data OS NPL settiap Unit'
                                },
                                scales: {
                                    xAxes: [{
                                        stacked: false,
                                        beginAtZero: true,
                                        ticks: {
                                            stepSize: 1,
                                            min: 0,
                                            autoSkip: false
                                        }
                                    }]
                                }
                            }
                        });

                var kolchart = new Chart(document.getElementById("kol-chart"), {
                                        type: 'bar',
                                        data: {
                                            labels: dtLabelPie,
                                            datasets: [{
                                                label: "(RP.) Miliar",
                                                data: <?php $nplarray = array_map(function ($num) {
                                                            return number_format($num / 1000000000, 2);
                                                        }, $statistikOSKOLLengkap);
                                                        echo json_encode($nplarray); ?> ,
                                                backgroundColor: [
                                                '#B40040',
                                                '#00816F',
                                                '#DBD800',
                                                '#2D4C2D',
                                                '#513F3F',
                                                '#ADCF64',
                                                '#13B72F',
                                                '#CF816F',
                                                '#DCAFF0',
                                                '#AF483F',
                                                '#CCAF3F',
                                                '#EAFF21',
                                                '#75D519',
                                            ]
                                            }]
                                        },
                                        options: {
                                            legend: {
                                                display: false
                                            },
                                            title: {
                                                display: true,
                                                text: 'data OS KOL setiap Unit'
                                            },
                                            scales: {
                                                xAxes: [{
                                                    stacked: false,
                                                    beginAtZero: true,
                                                    ticks: {
                                                        stepSize: 1,
                                                        min: 0,
                                                        autoSkip: false
                                                    }
                                                }]
                                            }
                                        }
                                    });


                        var dtLabelLine = <?php echo $chartLabel; ?>;
                        var dtDATALine = <?php echo $OSData; ?>;
                        var Linechart = new Chart(document.getElementById('line-chart'), {
                            type: 'doughnut',
                            data: {
                                labels: dtLabelLine,
                                datasets: [{
                                    data: dtDATALine,
                                    backgroundColor: [
                                    '#B40040',
                                    '#00816F',
                                    '#DBD800',
                                    '#2D4C2D',
                                    '#513F3F',
                                    '#ADCF64',
                                    '#13B72F',
                                    '#CF816F',
                                    '#DCAFF0',
                                    '#AF483F',
                                    '#CCAF3F',
                                    '#EAFF21',
                                    '#75D519',
                                ],
                                }]
                            },
                           options: {
                                legend: {
                                    display: false
                                },
                                title: {
                                    display: true,
                                }
                            }
                        });
                        var osparb1 = new Chart(document.getElementById("osparb1-chart"), {
                            type: 'horizontalBar',
                            data: {
                                labels: dtLabel,
                                datasets: [{
                                    label: "OS PAR B-1 (RP.) Miliar",
                                    backgroundColor: "#8e5ea2",
                                    data: <?php $formatted_array = array_map(function ($num) {
                                                return number_format($num / 1000000000, 2);
                                            }, $statistikOSNominatif);
                                            echo json_encode($formatted_array); ?>
                                }, {
                                    label: "OS PAR (RP.) Miliar",
                                    backgroundColor: "#3e95cd",
                                    data: <?php $formatted_array = array_map(function ($num) {
                                                return number_format($num / 1000000000, 2);
                                            }, $statistikOSPAR);
                                            echo json_encode($formatted_array); ?>
                                }]
                            },
                            options: {
                                scales: {
                                    xAxes: [{
                                        stacked: true,
                                        beginAtZero: true,
                                        ticks: {
                                            stepSize: 1,
                                            min: 0,
                                            autoSkip: false
                                        }
                                    }]
                                }
                                
                            }
                        });

                        var osnplb1 = new Chart(document.getElementById("osnplb1-chart"), {
                            type: 'horizontalBar',
                            data: {
                                labels: dtLabel,
                                datasets: [{
                                    label: "OS NPL B-1",
                                    backgroundColor: "#8e5ea2",
                                    data: <?php $formatted_array = array_map(function ($num) {
                                                return number_format($num / 1000000000, 2);
                                            }, $statistikOSNPLNominatif);
                                            echo json_encode($formatted_array); ?>
                                }, {
                                    label: "OS NPL",
                                    backgroundColor: "#3e95cd",
                                    data: <?php $formatted_array = array_map(function ($num) {
                                                return number_format($num / 1000000000, 2);
                                            }, $statistikOSNPL);
                                            echo json_encode($formatted_array); ?>
                                }]
                            },
                            options: {
                                legend: {
                                    display: false
                                },
                                title: {
                                    display: true,
                                    text: ''
                                },
                                scales: {
                                    xAxes: [{
                                        stacked: false,
                                        beginAtZero: true,
                                        ticks: {
                                            stepSize: 1,
                                            min: 0,
                                            autoSkip: false
                                        }
                                    }]
                                }
                                
                            }
                        });
                        var osKOLb1 = new Chart(document.getElementById("kolb1-chart"), {
                            type: 'horizontalBar',
                            data: {
                                labels: dtLabel,
                                datasets: [{
                                    label: "OS KOL B-1",
                                    backgroundColor: "#8e5ea2",
                                    data: <?php $formatted_array = array_map(function ($num) {
                                                return number_format($num / 1000000000, 2);
                                            }, $statistikOSKOLNormatif);
                                            echo json_encode($formatted_array); ?>
                                }, {
                                    label: "OS KOL",
                                    backgroundColor: "#3e95cd",
                                    data: <?php $formatted_array = array_map(function ($num) {
                                                return number_format($num / 1000000000, 2);
                                            }, $statistikOSKOL);
                                            echo json_encode($formatted_array); ?>
                                }]
                            },
                            options: {
                                legend: {
                                    display: false
                                },
                                title: {
                                    display: true,
                                    text: ''
                                },
                                scales: {
                                    xAxes: [{
                                        stacked: false,
                                        beginAtZero: true,
                                        ticks: {
                                            stepSize: 1,
                                            min: 0,
                                            autoSkip: false
                                        }
                                    }]
                                }
                                
                            }
                        });
                         function getRandomColorHex() {
                             var hex = "0123456789ABCDEF",
                                 color = "#";
                             for (var i = 1; i <= 6; i++) {
                                 color += hex[Math.floor(Math.random() * 16)];
                             }
                             return color;
                         }
                        // console.log(dtLabelLine[10]);
                    $("#pie-chart").click(function (evt) {
                          var activePoints = piechart.getElementsAtEvent(evt);
                            var chartData = activePoints[0]['_chart'].config.data;
                            var idx = activePoints[0]['_index'];
                            var label = chartData.labels[idx];
                            var value = chartData.datasets[0].data[idx];
                            alert(label +  " dengan jumlah = " + value);
                          });
            });
        </script>