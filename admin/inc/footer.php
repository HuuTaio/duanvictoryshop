 <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
        <p>
         &copy; Copyright <a href="#">DỰ ÁN 1- SHOP GIÀY</a>. 
        </p>
    </div>
    <script>
        new Morris.Area({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2022-2-3', order: 2, sales: 1000000, quantity: 10 },
    { year: '2022-2-4', order: 6, sales: 50000000, quantity: 6 },
    { year: '2022-2-5', order: 7, sales: 49000000, quantity: 19 },
    { year: '2022-2-6', order: 5, sales: 15000000, quantity: 25 },

  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['order','sales','quantity'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Đơn hàng','Doang thu','Số lượng bán']
});
    </script>
</body>
</html>
