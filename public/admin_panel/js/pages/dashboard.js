/*
 * Author: Abdullah A Almsaeed
 * Date: 4 Jan 2014
 * Description:
 *      This is a demo file used only for the main dashboard (index.html)
 **/

$(function () {

    'use strict';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.search-input').bind("keyup change", (e) => {
        e.preventDefault();

        let elementFilter = $('#search-form');
        let dataFilter = elementFilter.serialize().replace(/_token=[A-Za-z0-9_]*&/, '');
        let url = window.location.href.split('?')[0];
        let newURL = url + "?" + dataFilter;

        $.ajax({
            type: 'GET',
            url: elementFilter.attr('action'),
            data: elementFilter.serialize(),

            success: function (data) {
                if (data.result) {
                    history.pushState({}, '', newURL);

                    $('.search-ajax').html(data.result);
                } else {
                    console.log(data);
                }
            },

            error: function (error) {
                console.log(error);
            }
        });
    });

    $('#select_file').on('change', (function (e) {
        let url = $(this).attr('url-attr');
        let fileId = $(this).attr('id-attr');
        let selectOutput = $(this).attr('out-attr');

        sendAjaxFile(url, fileId, selectOutput, e);
    }));

    function sendAjaxFile(url, fileId, selectOutput, e){
        e.preventDefault();

        let formData = new FormData();
        let file = e.target.files[0];

        formData.append('image', file);
        formData.append(fileId, $('#' + fileId).val());

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            complete: function (response, error) {
                if (response.responseText) {
                    let html = JSON.parse(response.responseText);
                    $(selectOutput).append(html.result);
                } else {
                    console.log(error);
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    $('.del-image').click((e) => {
        e.preventDefault();

        let file = $(e.target).attr('file-attr');
        let fileId = $(e.target).attr('id-attr');
        let formData = new FormData();

        formData.append('file', file);
        formData.append('id_file', fileId);
        formData.append('hotel_id', $('#hotel_id').val());

        $.ajax({
            type: 'POST',
            url: "/admin/delete-hotel-images",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            complete: function (response, error) {
                $(e.target).closest('.col-md-3').remove();

                if (response.result) {
                    console.log(response);
                } else {
                    console.log(error);
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $('#select_country').bind("change", (e) => {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/admin/select-country',
            dataType: 'json',
            data: {
                'value': e.target.value
            },

            success: function (data) {
                console.log(data.result);

                if (data.result) {
                    let cities = data.result;
                    let html = '';

                    for (let i = 0; i < cities.length; i++){
                        html += `<option>${cities[i].name}</option>`;
                    }

                    $('#select_city').html(html);
                } else {
                    console.log(data);
                }
            },

            error: function (error) {
                console.log(error);
            }
        });
    });

    // Make the dashboard widgets sortable Using jquery UI
    $('.connectedSortable').sortable({
        placeholder: 'sort-highlight',
        connectWith: '.connectedSortable',
        handle: '.card-header, .nav-tabs',
        forcePlaceholderSize: true,
        zIndex: 999999
    })
    $('.connectedSortable .card-header, .connectedSortable .nav-tabs-custom').css('cursor', 'move')

    // jQuery UI sortable for the todo list
    $('.todo-list').sortable({
        placeholder: 'sort-highlight',
        handle: '.handle',
        forcePlaceholderSize: true,
        zIndex: 999999
    })

    // bootstrap WYSIHTML5 - text editor
    $('.textarea').summernote({
        height: 200,
        callbacks: {
            onImageUpload: function (files, editor, welEditable) {
                sendFile(files[0], editor, welEditable);
            }
        }
    });

    function sendFile(file, editor, welEditable) {
        var data = new FormData();
        data.append("file", file);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: data,
            type: "POST",
            url: "/admin/upload-images-editor",
            cache: false,
            contentType: false,
            processData: false,
            success: function (url) {
                $('.textarea').summernote('editor.insertImage', url);
            }
        });
    }

    $('.daterange').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
    }, function (start, end) {
        window.alert('You chose: ' + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    })

    /* jQueryKnob */
    $('.knob').knob()

    // jvectormap data
    var visitorsData = {
        'US': 398, //USA
        'SA': 400, //Saudi Arabia
        'CA': 1000, //Canada
        'DE': 500, //Germany
        'FR': 760, //France
        'CN': 300, //China
        'AU': 700, //Australia
        'BR': 600, //Brazil
        'IN': 800, //India
        'GB': 320, //Great Britain
        'RU': 3000 //Russia
    }
    // World map by jvectormap
    $('#world-map').vectorMap({
        map: 'usa_en',
        backgroundColor: 'transparent',
        regionStyle: {
            initial: {
                fill: 'rgba(255, 255, 255, 0.7)',
                'fill-opacity': 1,
                stroke: 'rgba(0,0,0,.2)',
                'stroke-width': 1,
                'stroke-opacity': 1
            }
        },
        series: {
            regions: [{
                values: visitorsData,
                scale: ['#ffffff', '#0154ad'],
                normalizeFunction: 'polynomial'
            }]
        },
        onRegionLabelShow: function (e, el, code) {
            if (typeof visitorsData[code] != 'undefined')
                el.html(el.html() + ': ' + visitorsData[code] + ' new visitors')
        }
    })

    // Sparkline charts
    var sparkline1 = new Sparkline($("#sparkline-1")[0], {
        width: 80,
        height: 50,
        lineColor: '#92c1dc',
        endColor: '#ebf4f9'
    });
    var sparkline2 = new Sparkline($("#sparkline-2")[0], {
        width: 80,
        height: 50,
        lineColor: '#92c1dc',
        endColor: '#ebf4f9'
    });
    var sparkline3 = new Sparkline($("#sparkline-3")[0], {
        width: 80,
        height: 50,
        lineColor: '#92c1dc',
        endColor: '#ebf4f9'
    });

    sparkline1.draw([1000, 1200, 920, 927, 931, 1027, 819, 930, 1021]);
    sparkline2.draw([515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921]);
    sparkline3.draw([15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21]);

    // The Calender
    $('#calendar').datetimepicker({
        format: 'L',
        inline: true
    })

    // SLIMSCROLL FOR CHAT WIDGET
    $('#chat-box').overlayScrollbars({
        height: '250px'
    })

    /* Chart.js Charts */
    // Sales chart
    var salesChartCanvas = document.getElementById('revenue-chart-canvas').getContext('2d');
    //$('#revenue-chart').get(0).getContext('2d');

    var salesChartData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [
            {
                label: 'Digital Goods',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: [28, 48, 40, 19, 86, 27, 90]
            },
            {
                label: 'Electronics',
                backgroundColor: 'rgba(210, 214, 222, 1)',
                borderColor: 'rgba(210, 214, 222, 1)',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [65, 59, 80, 81, 56, 55, 40]
            },
        ]
    }

    var salesChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                gridLines: {
                    display: false,
                }
            }],
            yAxes: [{
                gridLines: {
                    display: false,
                }
            }]
        }
    }

    // This will get the first returned node in the jQuery collection.
    var salesChart = new Chart(salesChartCanvas, {
            type: 'line',
            data: salesChartData,
            options: salesChartOptions
        }
    )

    // Donut Chart
    var pieChartCanvas = $('#sales-chart-canvas').get(0).getContext('2d')
    var pieData = {
        labels: [
            'Instore Sales',
            'Download Sales',
            'Mail-Order Sales',
        ],
        datasets: [
            {
                data: [30, 12, 20],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12'],
            }
        ]
    }
    var pieOptions = {
        legend: {
            display: false
        },
        maintainAspectRatio: false,
        responsive: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
        type: 'doughnut',
        data: pieData,
        options: pieOptions
    });

    // Sales graph chart
    var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d');
    //$('#revenue-chart').get(0).getContext('2d');

    var salesGraphChartData = {
        labels: ['2011 Q1', '2011 Q2', '2011 Q3', '2011 Q4', '2012 Q1', '2012 Q2', '2012 Q3', '2012 Q4', '2013 Q1', '2013 Q2'],
        datasets: [
            {
                label: 'Digital Goods',
                fill: false,
                borderWidth: 2,
                lineTension: 0,
                spanGaps: true,
                borderColor: '#efefef',
                pointRadius: 3,
                pointHoverRadius: 7,
                pointColor: '#efefef',
                pointBackgroundColor: '#efefef',
                data: [2666, 2778, 4912, 3767, 6810, 5670, 4820, 15073, 10687, 8432]
            }
        ]
    }

    var salesGraphChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
            display: false,
        },
        scales: {
            xAxes: [{
                ticks: {
                    fontColor: '#efefef',
                },
                gridLines: {
                    display: false,
                    color: '#efefef',
                    drawBorder: false,
                }
            }],
            yAxes: [{
                ticks: {
                    stepSize: 5000,
                    fontColor: '#efefef',
                },
                gridLines: {
                    display: true,
                    color: '#efefef',
                    drawBorder: false,
                }
            }]
        }
    }

    // This will get the first returned node in the jQuery collection.
    var salesGraphChart = new Chart(salesGraphChartCanvas, {
            type: 'line',
            data: salesGraphChartData,
            options: salesGraphChartOptions
        }
    )
});
