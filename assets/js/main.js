/*
 Template Name: Neon - Bootstrap + Laravel + PHP Admin Dashboard Template
 Website: http://themesbox.in/admin-templates/neon
 Author: Themesbox17
 File: Main JS File
 */

"use strict";
$(document).ready(function() {       

    /* -----  Menu JS ----- */
    $.sidebarMenu($('.xp-vertical-menu'));      

    $(function() {
        for (var x = window.location, xp = $(".xp-vertical-menu a").filter(function() {
            return this.href == x;
        }).addClass("active").parent().addClass("active"); ;) {
            if (!xp.is("li")) break;
            xp = xp.parent().addClass("in").parent().addClass("active");
        }
    }), 

    /* -----  Menu Hamburger ----- */
    $(".xp-menu-hamburger").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("xp-toggle-menu");
    });   

    /* -----  Bootstrap Popover ----- */
    $('[data-toggle="popover"]').popover();

    /* -----  Bootstrap Tooltip ----- */
    $('[data-toggle="tooltip"]').tooltip();

});

/*-------------------------------------
          Line Chart 
      -------------------------------------*/
    if ($("#earning-line-chart").length) {

      var lineChartData = {
        labels: ["", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun", ""],
        datasets: [{
            data: [0, 5e4, 1e4, 5e4, 14e3, 7e4, 5e4, 75e3, 5e4],
            backgroundColor: '#ff0000',
            borderColor: '#ff0000',
            borderWidth: 1,
            pointRadius: 0,
            pointBackgroundColor: '#ff0000',
            pointBorderColor: '#ffffff',
            pointHoverRadius: 6,
            pointHoverBorderWidth: 3,
            fill: 'origin',
            label: "Total Collection"
          },
          {
            data: [0, 3e4, 2e4, 6e4, 7e4, 5e4, 5e4, 9e4, 8e4],
            backgroundColor: '#417dfc',
            borderColor: '#417dfc',
            borderWidth: 1,
            pointRadius: 0,
            pointBackgroundColor: '#304ffe',
            pointBorderColor: '#ffffff',
            pointHoverRadius: 6,
            pointHoverBorderWidth: 3,
            fill: 'origin',
            label: "Fees Collection"
          }
        ]
      };
      var lineChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        animation: {
          duration: 2000
        },
        scales: {

          xAxes: [{
            display: true,
            ticks: {
              display: true,
              fontColor: "#222222",
              fontSize: 16,
              padding: 20
            },
            gridLines: {
              display: true,
              drawBorder: true,
              color: '#cccccc',
              borderDash: [5, 5]
            }
          }],
          yAxes: [{
            display: true,
            ticks: {
              display: true,
              autoSkip: true,
              maxRotation: 0,
              fontColor: "#646464",
              fontSize: 16,
              stepSize: 25000,
              padding: 20,
              callback: function (value) {
                var ranges = [{
                    divider: 1e6,
                    suffix: 'M'
                  },
                  {
                    divider: 1e3,
                    suffix: 'k'
                  }
                ];

                function formatNumber(n) {
                  for (var i = 0; i < ranges.length; i++) {
                    if (n >= ranges[i].divider) {
                      return (n / ranges[i].divider).toString() + ranges[i].suffix;
                    }
                  }
                  return n;
                }
                return formatNumber(value);
              }
            },
            gridLines: {
              display: true,
              drawBorder: false,
              color: '#cccccc',
              borderDash: [5, 5],
              zeroLineBorderDash: [5, 5],
            }
          }]
        },
        legend: {
          display: false
        },
        tooltips: {
          mode: 'index',
          intersect: false,
          enabled: true
        },
        elements: {
          line: {
            tension: .35
          },
          point: {
            pointStyle: 'circle'
          }
        }
      };
      var earningCanvas = $("#earning-line-chart").get(0).getContext("2d");
      var earningChart = new Chart(earningCanvas, {
        type: 'line',
        data: lineChartData,
        options: lineChartOptions
      });
    }