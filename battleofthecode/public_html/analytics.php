<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Authorization don't touch -->
        <div id="embed-api-auth-container"></div>
        

        <!-- Charts -->
        <div id="users-chart-container"></div>
        <div id="pageviews-chart-container"></div>
        <div id="day-of-week-chart"></div>
        <div id="day-of-week-chart2"></div>
        <div id="day-of-week-chart2-legend"></div>
        <!-- Selectors -->

        <div id="view-selector-container"></div>
        
        <script src="js/vendor/jquery.1.11.min.js"></script>
        <script>
        (function(w,d,s,g,js,fs){
          g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
          js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
          js.src='https://apis.google.com/js/platform.js';
          fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
        }(window,document,'script'));
        </script>
        <script src="js/vendor/Chart.min.js"></script>
        <script src="js/vendor/moment.min.js"></script>
        <script src="js/vendor/active-users.js"></script>
        <script src="js/analytics.js"></script>


    </body>
</html>