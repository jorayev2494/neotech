$(document).ready(function()
{
    $('[data-icheck]').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue',
        // increaseArea: '20%' // optional
    });
    var $contentWrapper = $('.content-wrapper');
    var $sidebars = $('.left-sidebar');
    var $window = $(window);
    var onWindowResize = function()
    {
        var navbarIsCollapsed = $(window).outerWidth() < 769;
        calculatedMinHeight = $(window).height() - 56;
        calculatedSidebarMinHeight = $contentWrapper.height() + (navbarIsCollapsed ? 112 : 56);
        $contentWrapper.css({minHeight: calculatedMinHeight + 'px'});
        $sidebars.css({minHeight: calculatedSidebarMinHeight + 'px'});
    };
    onWindowResize();

    $('.faqs-question-text').click(function()
    {
        $(this).siblings('.faqs-question-answer').fadeToggle(350);
        $(this).parent('.faqs-question').toggleClass('open');
    });

    $('#login-hidden').fadeIn(1150);

    $(window).resize(onWindowResize);
    $('[data-toggle-sidebar]').click(function()
    {
        if ($(window).width() < 769) {
            $('body').toggleClass('sidebar-open-sm');
        } else {
            $('body').toggleClass('sidebar-closed-md');
        }
    });

    $('[data-subnav-toggle]').click(function()
    {
        $(this).parent().toggleClass('open');
    });

    Chart.defaults.global.defaultColor = 'rgba(255, 255, 255, 1)';
    Chart.defaults.global.defaultFontColor = 'rgba(255, 255, 255, 1)';
    Chart.defaults.global.legend.display = false;

    Chart.defaults.global.title.fontColor = '#FFFFFF';

    $graphMonthlyRegistrations = document.getElementById("graph-monthly-registrations");

    if ($graphMonthlyRegistrations !== null) {
        $graphMonthlyRegistrations = $graphMonthlyRegistrations.getContext("2d");

        myLineChart = new Chart($graphMonthlyRegistrations, {
            type: 'line',
            data: {
                labels: ['Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr'],
                datasets: [{
                    label: 'Monthly Website Registrations',
                    data: [0, 260, 516, 373, 892, 1194, 1485],
                    lineTension: 0.1,
                    backgroundColor: "rgba(75,192,192,0.4)",
                    borderColor: "#1cabdb",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "#1cabdb",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "#1cabdb",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    backgroundColor: '#484c4e'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scaleFontColor : "#FFFFFF",
                scaleShowVerticalLines: false,
            }
        });
    }

    $(".piety-pie").peity("pie", {
        fill: ["#1f7491", "#363a3c"]
    });

    $('[data-toggle="tooltip"]').tooltip();

    $('[data-close-widget]').click(function()
    {
        $widget = $(this).parents('.widget');

        if ($widget.length) {
            $widget.fadeOut(500, function()
            {
                $(this).remove();
            });
        }
    });

    $('#trigger-demo-notify').click(function()
    {
        $('.top-right').notify({
            message: { html: 'Great looking notification at the top right of the page!<br><br>These can be configured to display at any corner...' },
            type: 'success'
          }).show(); 
        $('.top-right').notify({
            message: { html: 'Great looking notification at the top right of the page!<br><br>These can be configured to display at any corner...' },
            type: 'info'
          }).show(); 
        $('.top-right').notify({
            message: { html: 'Great looking notification at the top right of the page!<br><br>These can be configured to display at any corner...' },
            type: 'warning'
          }).show(); 
        $('.top-right').notify({
            message: { html: 'Great looking notification at the top right of the page!<br><br>These can be configured to display at any corner...' },
            type: 'danger'
          }).show(); 
    });
    $('.fixed-skinner-toggle').click(function()
    {
        $(this).parent().toggleClass('open');
    });
    $('[data-toggle-skin-colour]').click(function()
    {
        var skinColour = $(this).data('toggleSkinColour');

        $('body').removeClass(function (index, css) {
            return (css.match (/(^|\s)skin-\S+/g) || []).join(' ');
        });

        if (skinColour.length) {
            $('body').addClass('skin-' + skinColour);
            var toggleSkinIdentifier = skinColour;
        } else {
            var toggleSkinIdentifier = 'default';
        }

        // Commit the colour to the session through Laravel
        $.get('/toggle-skin-colour/' + toggleSkinIdentifier);
    });
});