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

        <div id="embed-api-auth-container"></div>
		<div id="chart-container"></div>
		<div id="view-selector-container"></div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
        <script src="main.js"></script>

		<script>
		(function(w,d,s,g,js,fs){
		  g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
		  js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
		  js.src='https://apis.google.com/js/platform.js';
		  fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
		}(window,document,'script'));
		</script>
		
		<script>

		gapi.analytics.ready(function() {

		  /**
		   * Authorize the user immediately if the user has already granted access.
		   * If no access has been created, render an authorize button inside the
		   * element with the ID "embed-api-auth-container".
		   */
		  gapi.analytics.auth.authorize({
		    container: 'embed-api-auth-container',
		    clientid: '1013683663006-1o8kcbql9th40p04h9g8uoteqtng3924.apps.googleusercontent.com',
		  });


		  /**
		   * Create a new ViewSelector instance to be rendered inside of an
		   * element with the id "view-selector-container".
		   */
		  var viewSelector = new gapi.analytics.ViewSelector({
		    container: 'view-selector-container'
		  });

		  // Render the view selector to the page.
		  viewSelector.execute();


		  /**
		   * Create a new DataChart instance with the given query parameters
		   * and Google chart options. It will be rendered inside an element
		   * with the id "chart-container".
		   */
		  var dataChart = new gapi.analytics.googleCharts.DataChart({
		    query: {
		      metrics: 'ga:sessions',
		      dimensions: 'ga:date',
		      'start-date': '30daysAgo',
		      'end-date': 'yesterday'
		    },
		    chart: {
		      container: 'chart-container',
		      type: 'LINE',
		      options: {
		        width: '100%'
		      }
		    }
		  });


		  /**
		   * Render the dataChart on the page whenever a new view is selected.
		   */
		  viewSelector.on('change', function(ids) {
		    dataChart.set({query: {ids: ids}}).execute();
		  });

		});
		</script>
    </body>
</html>