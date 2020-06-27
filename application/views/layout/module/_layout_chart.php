    <script>
            // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
          // *     example: number_format(1234.56, 2, ',', ' ');
          // *     return: '1 234,56'
          number = (number + '').replace(',', '').replace(' ', '');
          var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
              var k = Math.pow(10, prec);
              return '' + Math.round(n * k) / k;
            };
          // Fix for IE parseFloat(0.55).toFixed(0) = 0;
          s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
          if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
          }
          if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
          }
          return s.join(dec);
        }

        // Area Chart Example
        var ctx = document.getElementById("chartByJenis");
        var myLineChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: [<?php
                        foreach ($total_by_jenis as $item){
                            echo    '"'.$item->tanggal.'",';
                        }
                     ?>],
            datasets: [
                {
                label: "ODGJ",
                borderColor: "#e74a3b",
                pointBackgroundColor: "rgba(78, 115, 223, 1)",                                      
                data: [<?php
                          foreach ($total_by_jenis as $data){
                              echo    '"'.$data->odgj.'",';
                          }
                       ?>],
                }, 
                {                
                label: "OT",
                borderColor: "#6f42c1",
                pointBackgroundColor: "rgba(78, 115, 223, 1)",                                      
                data: [<?php
                          foreach ($total_by_jenis as $data){
                              echo    '"'.$data->ot.'",';
                          }
                       ?>],
                },
                
                {
                label: "Pengemis",
                borderColor: "#ad8b4c",
                pointBackgroundColor: "rgba(78, 115, 223, 1)",                                      
                data: [<?php
                          foreach ($total_by_jenis as $data){
                              echo    '"'.$data->pengemis.'",';
                          }
                       ?>],
                },
                
                {
                label: "Pengamen",
                borderColor: "#afbf43",
                pointBackgroundColor: "rgba(78, 115, 223, 1)",                                      
                data: [<?php
                          foreach ($total_by_jenis as $data){
                              echo    '"'.$data->pengamen.'",';
                          }
                       ?>],
                },
                
                {
                label: "Gelandangan",
                borderColor: "#0080ff",
                pointBackgroundColor: "rgba(78, 115, 223, 1)",                                      
                data: [<?php
                          foreach ($total_by_jenis as $data){
                              echo    '"'.$data->gelandangan.'",';
                          }
                       ?>],
                },
                
                {
                label: "Psikiotik",
                borderColor: "#5eff00",
                pointBackgroundColor: "rgba(78, 115, 223, 1)",                                      
                data: [<?php
                          foreach ($total_by_jenis as $data){
                              echo    '"'.$data->psikiotik.'",';
                          }
                       ?>],
                },
                
                {
                label: "PSK",
                borderColor: "#4fc2d6",
                pointBackgroundColor: "rgba(78, 115, 223, 1)",                                      
                data: [<?php
                          foreach ($total_by_jenis as $data){
                              echo    '"'.$data->psk.'",';
                          }
                       ?>],
                },
                
                {
                label: "Pedagang Asongan",
                borderColor: "#db5ed3",
                pointBackgroundColor: "rgba(78, 115, 223, 1)",                                      
                data: [<?php
                          foreach ($total_by_jenis as $data){
                              echo    '"'.$data->pedagang_asongan.'",';
                          }
                       ?>],
                },
            ],
          },
          options: {
            maintainAspectRatio: false,
            layout: {
              padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
              }
            },
            scales: {
              xAxes: [{
                time: {
                  unit: 'date'
                },
                gridLines: {
                  display: false,
                  drawBorder: false
                },
                ticks: {
                  maxTicksLimit: 7
                }
              }],
              yAxes: [{
                ticks: {
                  // Include a dollar sign in the ticks
                  callback: function(value, index, values) {
                    return number_format(value);
                  }
                },
                gridLines: {
                  color: "rgb(234, 236, 244)",
                  zeroLineColor: "rgb(234, 236, 244)",
                  drawBorder: false,
                  borderDash: [2],
                  zeroLineBorderDash: [2]
                }
              }],
            },
            legend: {
              display: true
            },
            tooltips: {
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              titleMarginBottom: 10,
              titleFontColor: '#6e707e',
              titleFontSize: 14,
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              intersect: false,
              mode: 'index',
              caretPadding: 10,
              callbacks: {
                label: function(tooltipItem, chart) {
                  var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                  return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                }
              }
            }
          }
        });

    </script>
    
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Pie Chart Example
        var ctx = document.getElementById("chartPerBulan");
        var myPieChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: [<?php
                        foreach ($kategori1 as $item){
                            echo    '"'.$item->kategori.'",';
                        }
                     ?>],
            datasets: [{
              data: [<?= $odgj ?>, <?= $ot ?>, <?= $pengemis ?>, <?= $pengamen ?>, <?= $gelandangan ?>,<?= $psikiotik ?>, <?= $psk ?>, <?= $pedagang_asongan ?> ],
              backgroundColor: [<?php
                                    foreach ($kategori1 as $item){
                                        echo    '"'.$item->kategori_color.'",';
                                    }
                                 ?>],
              hoverBackgroundColor: [<?php
                                    foreach ($kategori1 as $item){
                                        echo    '"'.$item->kategori_color.'",';
                                    }
                                 ?>],
              hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
          },
          options: {
            maintainAspectRatio: false,
            tooltips: {
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              caretPadding: 10,
            },
            legend: {
              display: false
            },
            cutoutPercentage: 80,
          },
        });

    </script>
    