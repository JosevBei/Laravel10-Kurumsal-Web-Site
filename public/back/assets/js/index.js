$(function() {

  
// chart 1
var options = {
    series: [{
        name: "Total Orders",
        data: [0, 160, 671, 414, 555, 0]
    }],
    chart: {
        type: "area",
        width: 150,
        height: 40,
        toolbar: {
            show: !1
        },
        zoom: {
            enabled: !1
        },
        dropShadow: {
            enabled: 0,
            top: 3,
            left: 14,
            blur: 4,
            opacity: .12,
            color: "#923eb9"
        },
        sparkline: {
            enabled: !0
        }
    },
    markers: {
        size: 0,
        colors: ["#923eb9"],
        strokeColors: "#fff",
        strokeWidth: 2,
        hover: {
            size: 7
        }
    },
    plotOptions: {
        bar: {
            horizontal: !1,
            columnWidth: "35%",
            endingShape: "rounded"
        }
    },
    dataLabels: {
        enabled: !1
    },
    stroke: {
        show: !0,
        width: 2,
        curve: "smooth"
    },
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
    },
    fill: {
        type: 'gradient',
        gradient: {
          shade: 'light',
          type: 'vertical',
          shadeIntensity: 0.5,
          gradientToColors: ['#ff0080'],
          inverseColors: false,
          opacityFrom: 0.5,
          opacityTo: 0.1,
        }
    },
    colors: ["#923eb9"],
    tooltip: {
        enabled: false  // Bu satırı ekleyerek tooltip'i devre dışı bırakabilirsin
    }
};

var chart = new ApexCharts(document.querySelector("#chart1"), options);
chart.render();






  
// chart 2
var options = {
    series: [{
        name: "Total Orders",
        data: [0, 160, 671, 414, 555, 0]
    }],
    chart: {
        type: "area",
        width: 150,
        height: 40,
        toolbar: {
            show: !1
        },
        zoom: {
            enabled: !1
        },
        dropShadow: {
            enabled: 0,
            top: 3,
            left: 14,
            blur: 4,
            opacity: .12,
            color: "#005bea"
        },
        sparkline: {
            enabled: !0
        }
    },
    markers: {
        size: 0,
        colors: ["#005bea"],
        strokeColors: "#fff",
        strokeWidth: 2,
        hover: {
            size: 7
        }
    },
    plotOptions: {
        bar: {
            horizontal: !1,
            columnWidth: "30%",
            endingShape: "rounded"
        }
    },
    dataLabels: {
        enabled: !1
    },
    stroke: {
        show: !0,
        width: 2,
        curve: "smooth"
    },
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
    },
    fill: {
		type: 'gradient',
		gradient: {
		  shade: 'light',
		  type: 'vertical',
		  shadeIntensity: 0.5,
		  gradientToColors: ['#00c6fb'],
		  inverseColors: false,
		  opacityFrom: 0.5,
		  opacityTo: 0.1,
		  //stops: [0, 100]
		}
	  },
    colors: ["#005bea"],
    tooltip: {
        enabled: false
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart2"), options);
  chart.render();



  
// chart 3
var options = {
    series: [{
        name: "Total Orders",
        data: [0, 160, 671, 414, 555, 0]
    }],
    chart: {
        type: "area",
        width: 150,
        height: 40,
        toolbar: {
            show: !1
        },
        zoom: {
            enabled: !1
        },
        dropShadow: {
            enabled: 0,
            top: 3,
            left: 14,
            blur: 4,
            opacity: .12,
            color: "#17ad37"
        },
        sparkline: {
            enabled: !0
        }
    },
    markers: {
        size: 0,
        colors: ["#17ad37"],
        strokeColors: "#fff",
        strokeWidth: 2,
        hover: {
            size: 7
        }
    },
    plotOptions: {
        bar: {
            horizontal: !1,
            columnWidth: "30%",
            endingShape: "rounded"
        }
    },
    dataLabels: {
        enabled: !1
    },
    stroke: {
        show: !0,
        width: 2,
        curve: "smooth"
    },
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
    },
    fill: {
		type: 'gradient',
		gradient: {
		  shade: 'light',
		  type: 'vertical',
		  shadeIntensity: 0.5,
		  gradientToColors: ['#98ec2d'],
		  inverseColors: false,
		  opacityFrom: 0.5,
		  opacityTo: 0.1,
		  //stops: [0, 100]
		}
	  },
    colors: ["#17ad37"],
    tooltip: {
        enabled: false
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart3"), options);
  chart.render();



// chart 4
var options = {
    series: [{
        name: "Total Orders",
        data: [0, 160, 671, 414, 555, 0]
    }],
    chart: {
        type: "area",
        width: 150,
        height: 40,
        toolbar: {
            show: !1
        },
        zoom: {
            enabled: !1
        },
        dropShadow: {
            enabled: 0,
            top: 3,
            left: 14,
            blur: 4,
            opacity: .12,
            color: "#f7971e"
        },
        sparkline: {
            enabled: !0
        }
    },
    markers: {
        size: 0,
        colors: ["#f7971e"],
        strokeColors: "#fff",
        strokeWidth: 2,
        hover: {
            size: 7
        }
    },
    plotOptions: {
        bar: {
            horizontal: !1,
            columnWidth: "30%",
            endingShape: "rounded"
        }
    },
    dataLabels: {
        enabled: !1
    },
    stroke: {
        show: !0,
        width: 2,
        curve: "smooth"
    },
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
    },
    fill: {
		type: 'gradient',
		gradient: {
		  shade: 'light',
		  type: 'vertical',
		  shadeIntensity: 0.5,
		  gradientToColors: ['#ffd200'],
		  inverseColors: false,
		  opacityFrom: 0.5,
		  opacityTo: 0.1,
		  //stops: [0, 100]
		}
	  },
    colors: ["#f7971e"],
    tooltip: {
        enabled: false
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart4"), options);
  chart.render();






// chart7
var ctx = document.getElementById('chart7').getContext('2d');

var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke1.addColorStop(0, '#005bea');
    gradientStroke1.addColorStop(1, '#00c6fb');

var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke2.addColorStop(0, '#ff6a00');  
    gradientStroke2.addColorStop(1, '#ee0979'); 

var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke3.addColorStop(0, '#17ad37');  
    gradientStroke3.addColorStop(1, '#98ec2d'); 

var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Current Customers', 'New Customers', 'Retargeted Customers'],
        datasets: [{
            data: [155, 120, 110],
            backgroundColor: [
                gradientStroke1,
                gradientStroke2,
                gradientStroke3,
            ],
            borderWidth: 1
        }]
    },
    options: {
        maintainAspectRatio: false,
        cutout: 100,
        plugins: {
        legend: {
            display: false,
        }
    }
        
    }
});




    // chart8
    var ctx = document.getElementById('chart8').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Orders',
                data: [12, 19, 13, 15, 20, 10],
                backgroundColor: [
                    '#923eb9'
                ],
                borderColor: [
                    '#923eb9'
                ],
                borderWidth: 0,
                borderRadius: 20
            },
            {
                label: 'Visits',
                data: [7, 15, 9, 12, 17, 16],
                backgroundColor: [
                    'rgb(146 62 185 / 32%)'
                ],
                borderColor: [
                    'rgb(146 62 185 / 32%)'
                ],
                borderWidth: 0,
                borderRadius: 20
            }]
        },
        options: {
            maintainAspectRatio: false,
            barPercentage: 0.3,
            //categoryPercentage: 0.5,
            plugins: {
                legend: {
                    position:'bottom',
                    display: false,
                }
            },
            scales: {
                x: {
                  stacked: true,
                  beginAtZero: true
                },
                y: {
                  stacked: true,
                  beginAtZero: true
                }
              }
        }
    });






// chart 9
var options = {
    series: [{
        name: "Total Expense",
        data: [0, 160, 671, 414, 555, 414, 555, 257, 300, 0]
    }],
    chart: {
        type: "area",
        //width: 130,
        height: 70,
        toolbar: {
            show: !1
        },
        zoom: {
            enabled: !1
        },
        dropShadow: {
            enabled: 0,
            top: 3,
            left: 14,
            blur: 4,
            opacity: .12,
            color: "#923eb9"
        },
        sparkline: {
            enabled: !0
        }
    },
    markers: {
        size: 0,
        colors: ["#923eb9"],
        strokeColors: "#fff",
        strokeWidth: 2,
        hover: {
            size: 7
        }
    },
    plotOptions: {
        bar: {
            horizontal: !1,
            columnWidth: "30%",
            endingShape: "rounded"
        }
    },
    dataLabels: {
        enabled: !1
    },
    stroke: {
        show: !0,
        width: 0,
        curve: "smooth"
    },
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
    },
    fill: {
		type: 'gradient',
		gradient: {
		  shade: 'light',
		  type: 'vertical',
		  shadeIntensity: 0.5,
		  gradientToColors: ['#ee0979'],
		  inverseColors: false,
		  opacityFrom: 1,
		  opacityTo: 1,
		  //stops: [0, 100]
		}
	  },
    colors: ["#ff6a00"],
    tooltip: {
        theme: "dark",
        fixed: {
            enabled: !1
        },
        x: {
            show: !1
        },
        y: {
            title: {
                formatter: function(e) {
                    return ""
                }
            }
        },
        marker: {
            show: !1
        }
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart9"), options);
  chart.render();




// chart 10
var options = {
    series: [{
        name: "Total Orders",
        data: [0, 160, 671, 414, 555, 414, 555, 257, 300, 0]
    }],
    chart: {
        type: "area",
        //width: 130,
        height: 70,
        toolbar: {
            show: !1
        },
        zoom: {
            enabled: !1
        },
        dropShadow: {
            enabled: 0,
            top: 3,
            left: 14,
            blur: 4,
            opacity: .12,
            color: "#009efd"
        },
        sparkline: {
            enabled: !0
        }
    },
    markers: {
        size: 0,
        colors: ["#009efd"],
        strokeColors: "#fff",
        strokeWidth: 2,
        hover: {
            size: 7
        }
    },
    plotOptions: {
        bar: {
            horizontal: !1,
            columnWidth: "30%",
            endingShape: "rounded"
        }
    },
    dataLabels: {
        enabled: !1
    },
    stroke: {
        show: !0,
        width: 0,
        curve: "smooth"
    },
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
    },
    fill: {
		type: 'gradient',
		gradient: {
		  shade: 'light',
		  type: 'vertical',
		  shadeIntensity: 0.5,
		  gradientToColors: ['#005bea'],
		  inverseColors: false,
		  opacityFrom: 1,
		  opacityTo: 1,
		  //stops: [0, 100]
		}
	  },
    colors: ["#00c6fb"],
    tooltip: {
        theme: "dark",
        fixed: {
            enabled: !1
        },
        x: {
            show: !1
        },
        y: {
            title: {
                formatter: function(e) {
                    return ""
                }
            }
        },
        marker: {
            show: !1
        }
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart10"), options);
  chart.render();



















  
    
});