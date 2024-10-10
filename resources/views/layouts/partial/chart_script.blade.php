<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

{{-- Barchart Vehicle by Owner --}}
<script>
  $(() => {
    let data_barchart   = JSON.parse(`{!! json_encode($barchart) !!}`);
    let labels  = [];
    let data_jumlah  = [];
    $.each(data_barchart,function(key,row){
      labels.push(row.name);
      data_jumlah.push(row.total);
    })
    var data = {
    labels: labels,
    datasets: [{
      label: 'vehicles',
      data: data_jumlah,
      backgroundColor: [
        'rgba(255, 99, 132)',
        'rgba(54, 162, 235)',
        'rgba(255, 206, 86)',
        'rgba(75, 192, 192)',
        'rgba(153, 102, 255)',
        'rgba(255, 159, 64)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
      fill: false
    }]
  };

  var options = {
    scales: {
      yAxes: [{
        ticks: {
            beginAtZero: true,
            userCallback: function(label, index, labels) {
                // when the floored value is the same as the value we have a whole number
                if (Math.floor(label) === label) {
                    return label;
                }

            },
        }
      }]
    },
    legend: {
      display: false
    },
    elements: {
      point: {
        radius: 0
      }
    }

  };

    if ($("#barChart").length) {
      var barChartCanvas = $("#barChart").get(0).getContext("2d");
      // This will get the first returned node in the jQuery collection.
      var barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: data,
        options: options
      });
    }
  })
</script>

{{-- Doughnut Chart --}}
<script>
    $(() => {
        let data_dochart   = JSON.parse(`{!! json_encode($dochart) !!}`);
        let labels  = [];
        let data_jumlah  = [];
        $.each(data_dochart,function(key,row){
            labels.push(row.location);
            data_jumlah.push(row.total);
        })
        var vehicleLocationData = {
            datasets: [{
                data: data_jumlah,
                backgroundColor: [
                    'rgba(255, 99, 132)',
                    'rgba(54, 162, 235)',
                    'rgba(255, 206, 86)',
                    'rgba(75, 192, 192)',
                    'rgba(153, 102, 255)',
                    'rgba(255, 159, 64)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
            }],

            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: labels
        };
        var vehicleLocationOptions = {
            responsive: true,
            animation: {
                animateScale: true,
                animateRotate: true
            }
        };

        if ($("#doChart1").length) {
            var doChartCanvas = $("#doChart1").get(0).getContext("2d");
            var doChart = new Chart(doChartCanvas, {
            type: 'doughnut',
            data: vehicleLocationData,
            options: vehicleLocationOptions
            });
        }
    })
</script>

<script>
    $(() => {
        let data_dochart2   = JSON.parse(`{!! json_encode($dochart2) !!}`);
        let labels  = [];
        let data_jumlah  = [];
        $.each(data_dochart2,function(key,row){
            labels.push(row.status);
            data_jumlah.push(row.total);
        })
        var vehicleStatusData = {
            datasets: [{
                data: data_jumlah,
                backgroundColor: [
                    'rgba(255, 99, 132)',
                    'rgba(54, 162, 235)',
                    'rgba(255, 206, 86)',
                    'rgba(75, 192, 192)',
                    'rgba(153, 102, 255)',
                    'rgba(255, 159, 64)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
            }],

            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: labels
        };
        var vehicleStatusOptions = {
            responsive: true,
            animation: {
                animateScale: true,
                animateRotate: true
            }
        };

        if ($("#doChart2").length) {
            var doChartCanvas = $("#doChart2").get(0).getContext("2d");
            var doChart = new Chart(doChartCanvas, {
            type: 'doughnut',
            data: vehicleStatusData,
            options: vehicleStatusOptions
            });
        }
    })
</script>