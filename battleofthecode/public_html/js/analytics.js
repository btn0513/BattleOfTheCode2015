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




  /**
   * Create a new DataChart instance with the given query parameters
   * and Google chart options. It will be rendered inside an element
   * with the id "users-chart-container".
   */
  var dataChart = new gapi.analytics.googleCharts.DataChart({
    query: {
      metrics: 'ga:users',
      dimensions: 'ga:date',
      'start-date': '30daysAgo',
      'end-date': 'yesterday'
    },
    chart: {
      container: 'users-chart-container',
      type: 'LINE',
      options: {
        width: '100%'
      }
    }
  });



  /*************************Page Views Chart*****************************/



  /**
   * Create a new DataChart instance with the given query parameters
   * and Google chart options. It will be rendered inside an element
   * with the id "users-chart-container".
   */
  var pageViewsData = new gapi.analytics.googleCharts.DataChart({
    query: {
      metrics: 'ga:pageviews',
      dimensions: 'ga:date',
      'start-date': '30daysAgo',
      'end-date': 'yesterday'
    },
    chart: {
      container: 'pageviews-chart-container',
      type: 'LINE',
      options: {
        width: '100%'
      }
    }
  });


    /**
   * Create a new DataChart instance with the given query parameters
   * and Google chart options. It will be rendered inside an element
   * with the id "users-chart-container".
   */
  var dwData = new gapi.analytics.googleCharts.DataChart({
    query: {
      metrics: 'ga:pageviews',
      dimensions: 'ga:dayOfWeek',
      'start-date': '30daysAgo',
      'end-date': 'yesterday'
    },
    chart: {
      container: 'day-of-week-chart2',
      type: 'LINE',
      options: {
        width: '100%'
      }
    }
  });

  /**
   * Draw the a chart.js bar chart with data from the specified view that
   * overlays session data for the current year over session data for the
   * previous year, grouped by month.
   */
  function renderDayOfWeekChart(ids) {

    // Adjust `now` to experiment with different days, for testing only...
    var now = moment(); // .subtract(3, 'day');

    var queryData = query({
      'ids': ids,
      'dimensions': 'ga:dayOfWeek',
      'metrics': 'ga:pageviews',
      //'start-date': moment(now).date(1).month(0).format('YYYY-MM-DD'),
      'start-date':'30daysAgo',
      'end-date': moment(now).format('YYYY-MM-DD')
    });



    Promise.all([queryData]).then(function(results) {
      var data1 = results[0].rows.map(function(row) { return +row[1]; });
      
      var labels = ['Sun','Mon','Tue','Wed','Thurs','Fri',
                    'Sat'];

      // Ensure the data arrays are at least as long as the labels array.
      // Chart.js bar charts don't (yet) accept sparse datasets.
      for (var i = 0, len = labels.length; i < len; i++) {
        if (data1[i] === undefined) data1[i] = null;
      }

      var data = {
        labels : labels,
        datasets : [
          {
            label: 'Users',
            fillColor : "rgba(220,220,220,0.5)",
            strokeColor : "rgba(220,220,220,1)",
            data : data1
          }
        ]
      };

      new Chart(makeCanvas('day-of-week-chart')).Bar(data);
      generateLegend('day-of-week-chart2-legend', data.datasets);
    })
    .catch(function(err) {
      console.error(err.stack);
    })
  }


  /**
   * Extend the Embed APIs `gapi.analytics.report.Data` component to
   * return a promise the is fulfilled with the value returned by the API.
   * @param {Object} params The request parameters.
   * @return {Promise} A promise.
   */
  function query(params) {
    return new Promise(function(resolve, reject) {
      var data = new gapi.analytics.report.Data({query: params});
      data.once('success', function(response) { resolve(response); })
          .once('error', function(response) { reject(response); })
          .execute();
    });
  }


  /**
   * Create a new canvas inside the specified element. Set it to be the width
   * and height of its container.
   * @param {string} id The id attribute of the element to host the canvas.
   * @return {RenderingContext} The 2D canvas context.
   */
  function makeCanvas(id) {
    var container = document.getElementById(id);
    var canvas = document.createElement('canvas');
    var ctx = canvas.getContext('2d');

    container.innerHTML = '';
    //canvas.width = container.offsetWidth;
    //canvas.height = container.offsetHeight;
    container.appendChild(canvas);

    return ctx;
  }


  /**
   * Create a visual legend inside the specified element based off of a
   * Chart.js dataset.
   * @param {string} id The id attribute of the element to host the legend.
   * @param {Array.<Object>} items A list of labels and colors for the legend.
   */
  function generateLegend(id, items) {
    var legend = document.getElementById(id);
    legend.innerHTML = items.map(function(item) {
      var color = item.color || item.fillColor;
      var label = item.label;
      return '<li><i style="background:' + color + '"></i>' + label + '</li>';
    }).join('');
  }


  // Set some global Chart.js defaults.
  Chart.defaults.global.animationSteps = 60;
  Chart.defaults.global.animationEasing = 'easeInOutQuart';
  Chart.defaults.global.responsive = true;
  Chart.defaults.global.maintainAspectRatio = true;

  
  /**
   * Render the dataChart on the page whenever a new view is selected.
   */
  viewSelector.on('change', function(ids) {
    dataChart.set({query: {ids: ids}}).execute();
    pageViewsData.set({query: {ids: ids}}).execute();
    dwData.set({query: {ids: ids}}).execute();

    // Render all the of charts for this view.
    renderDayOfWeekChart(ids);

  });

   // Render the view selector to the page.
  viewSelector.execute();


});
