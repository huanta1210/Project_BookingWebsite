
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>
<script>
    google.charts.load('current',{packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
    // Set Data
    const data = google.visualization.arrayToDataTable(<?php echo $chart_data_json; ?>);

    // Set Options
    const options = {
        title: 'Tổng số hóa đơn và tổng tiền theo tháng',
        hAxis: { title: 'Thời gian' },
        vAxis: { title: 'Số lượng hóa đơn và Tổng tiền' },
        legend: { position: 'top' },
        series: {
            0: { targetAxisIndex: 0 }, // Cột đầu tiên thuộc trục dọc bên trái
            1: { targetAxisIndex: 1 }  // Cột thứ hai thuộc trục dọc bên phải
        },
        vAxes: {
            // Trục dọc bên trái (tổng số hóa đơn)
            0: {
                title: 'Số lượng hóa đơn',
                format: '0'
            },
            // Trục dọc bên phải (tổng tiền)
            1: {
                title: 'Tổng tiền',
                format: 'currency'
            }
        }
    };

    // Draw
    const chart = new google.visualization.ColumnChart(document.getElementById('myChart'));
    chart.draw(data, options);
}

</script>







