<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
  <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md ">
    <div class="flex justify-between mb-4 items-start">
      <div class="font-medium">Thống kê danh mục</div>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full min-w-[540px]" data-tab-for="order" data-page="active">
        <!-- biểu đồ -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <div id="piechart" class="w-full" style=""></div>
        <!--  -->
        <script>
          google.charts.load('current', { 'packages': ['corechart'] });
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {

            var data = google.visualization.arrayToDataTable([
              ['Danh Mục', 'Số Lượng Sản Phẩm'],
              <?php
              $tongDM = count($thongke_gia_DanhMuc);
              $i = 1;
              foreach ($thongke_gia_DanhMuc as $key => $value) {
                if ($i == $tongDM)
                  $dauPhay = "";
                else
                  $dauPhay = ",";
                echo "[ '" . $value['name'] . "', " . $value['countSP'] . "]$dauPhay";
                $i++;
              }
              ?>
            ]);

            var options = {
              title: 'Biểu đồ thống kê Danh mục'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
          }
        </script>
      </table>

      <table class="w-full min-w-[540px] hidden " data-tab-for="order" data-page="completed">

        <thead>
          <tr>
            <th
              class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
              Tên danh mục</th>
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">Số
              sách</th>
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">Giá
              thấp nhất</th>
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">Giá
              cao nhất</th>
            <th
              class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">
              Số lượt bán</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($thongke_gia_DanhMuc)) {
            foreach ($thongke_gia_DanhMuc as $value) {
              echo ' 
                  <tr>
               <td class="py-2 px-4 border-b border-b-gray-50">
                   <div class="flex items-center">
                       <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">' . $value["name"] . '</a>
                   </div>
               </td>
               <td class="py-2 px-4 border-b border-b-gray-50">
                   <span class="text-[13px] font-medium text-gray-400 text-center">' . $value["countSP"] . '</span>
               </td>
               <td class="py-2 px-4 border-b border-b-gray-50"> 
                   <span class="text-[13px] font-medium text-gray-400 text-center">' . number_format(floatval($value["minGia"]), 0, ".", ",") . '</span>
               </td>
               <td class="py-2 px-4 border-b border-b-gray-50">
                 <span class="text-[13px] font-medium text-gray-400 text-center">' . number_format(floatval($value["maxGia"]), 0, ".", ",") . '</span>
               </td>
               <td class="py-2 px-4 border-b border-b-gray-50">
                 <span class="text-[13px] font-medium text-gray-400 text-center">' . $value["totalLuotBan"] . '</span>
               </td>
                                </tr>';
            }
          } else {
            echo '<tr><td colspan="8" style="text-align: center">No data available</td></tr>';
          }

          ?>


        </tbody>
      </table>
    </div>
  </div>
  <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
    <div class="flex justify-between mb-4 items-start">
      <div class="font-medium">Top 5 danh mục bán chạy</div>

    </div>
    <table class="w-full min-w-[540px]">

      <thead>
        <tr>
          <th
            class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
            Tên danh mục</th>
          <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">Số
            sách</th>
          <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">Giá
            thấp nhất</th>
          <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">Giá
            cao nhất</th>
          <th
            class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">
            Số lượt bán</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (!empty($thongke_gia_DanhMuc)) {
          foreach ($thongke_gia_DanhMuc as $value) {
            echo ' 
                               <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">' . $value["name"] . '</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400 text-center">' . $value["countSP"] . '</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400 text-center">' . number_format(floatval($value["minGia"]), 0, ".", ",")  . ' đ</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                              <span class="text-[13px] font-medium text-gray-400 text-center">' . number_format(floatval($value["maxGia"]), 0, ".", ",") . ' đ</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                              <span class="text-[13px] font-medium text-gray-400 text-center">' . $value["totalLuotBan"] . '</span>
                            </td>
                        </tr>
                                 ';
          }
        } else {
          echo '<tr><td colspan="8" style="text-align: center">No data available</td></tr>';
        }

        ?>


      </tbody>
    </table>
  </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
  <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2">
    <div class="flex justify-between mb-4 items-start">
      <div class="font-medium">Doanh thu những tháng gần đây</div>
    </div>
    <div>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <div id="chart_div"></div>

      <script>
        google.charts.load('current', { packages: ['corechart', 'bar'] });
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {
          var data = google.visualization.arrayToDataTable([
            ['Tháng', 'Doanh thu', 'Lượt bán'],
            <?php
            foreach ($thongke_DoanhThu_5_thang as $value) {
              echo "['{$value['nam']} - {$value['thang']}', {$value['doanh_thu']}, {$value['luot_ban']}],";
            }
            ?>
          ]);

          var options = {
            title: 'Doanh thu và lượt bán 6 tháng gần đây',
            chartArea: { width: '50%' },
            hAxis: {
              title: 'Tháng',
              minValue: 0
            },
            vAxes: {
              0: { title: 'Giá trị' },
              1: { title: 'Lượt bán', minValue: 0 }
            },
            series: {
              0: { targetAxisIndex: 0 },
              1: { targetAxisIndex: 1 }
            }
          };

          var chart = new google.visualization.ColumnChart(
            document.getElementById('chart_div'));

          chart.draw(data, options);
        }
      </script>

      <!-- Thống kê theo ngày -->
      <div class="mt-5">
        <div class="flex justify-between mb-4 items-start">
          <div class="font-medium">Thống kê theo ngày</div>
        </div>
        <form method="post" action="index.php?act=thongKe" class="mt-5 mb-5 flex justify-center">
          <div class="flex gap-4">
            <div class="flex items-center">
              <label class="block text-sm font-medium text-gray-700 ml-1">Ngày: </label>
              <select name="select_day" id="select_day"
                class="block w-24 px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                <option value="0">Chọn</option>
                <?php
                for ($i = 1; $i <= 30; $i++) {
                  echo "<option value='$i'>$i</option>";
                }
                ?>
              </select>
            </div>
            <div class="flex items-center">
              <label class="block text-sm font-medium text-gray-700 ml-1">Tháng: </label>
              <select name="select_month" id="select_month"
                class="block w-24 px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                <option value="0">Chọn</option>

                <?php
                for ($i = 1; $i <= 12; $i++) {
                  echo "<option value='$i'>$i</option>";
                }
                ?>
              </select>
            </div>
            <div class="flex items-center">
              <label class="block text-sm font-medium text-gray-700 ml-1">Năm: </label>
              <select name="select_year" id="select_year"
                class="block w-24 px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                <?php
                $current_year = date('Y');
                for ($i = $current_year; $i >= $current_year - 5; $i--) {
                  echo "<option value='$i'>$i</option>";
                }
                ?>
              </select>
            </div>
            <div>
              <button type="submit" name="submit"
                class="px-2 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600">Tìm
                kiếm</button>
            </div>
          </div>
        </form>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <div id="chart_div2"></div>

        <script>
          google.charts.load('current', { packages: ['corechart', 'bar'] });
          google.charts.setOnLoadCallback(drawBasic);

          function drawBasic() {
            var data = google.visualization.arrayToDataTable([
              ['Tháng', 'Doanh thu', 'Lượt bán'],
              <?php
              foreach ($thongke_DoanhThu_sach as $value) {
                if ($selected_month != null) {
                  echo "[' {$value['thang']} - {$value['nam']}', {$value['doanh_thu']}, {$value['luot_ban']}],";
                } else {
                  echo "[' {$value['ngay']} - {$value['thang']} - {$value['nam']}', {$value['doanh_thu']}, {$value['luot_ban']}],";
                }
              }
              ?>
            ]);

            var options = {
              title: 'Doanh thu ',
              chartArea: { width: '50%' },
              hAxis: {
                title: 'Thời gian',
                minValue: 0
              },
              vAxes: {
                0: { title: 'Giá trị' },
                1: { title: 'Lượt bán', minValue: 0 }
              },
              series: {
                0: { targetAxisIndex: 0 },
                1: { targetAxisIndex: 1 }
              }
            };

            var chart = new google.visualization.ColumnChart(
              document.getElementById('chart_div2'));

            chart.draw(data, options);
          }
        </script>

      </div>

    </div>

  </div>
  <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
    <div class="flex justify-between mb-4 items-start">
      <div class="font-medium">Top 10 sách bán chạy</div>
    </div>
    <div class="overflow-x-auto">
      <table class="w-full min-w-[460px]">
        <thead>
          <tr>
            <th
              class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
              Tên sách</th>
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 ">
              Lượt bán</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($top_10_sach_banChay)) {
            foreach ($top_10_sach_banChay as $value) {
              echo ' 
              <tr>
              <td class="py-2 px-4 border-b border-b-gray-50">
                <div class="flex items-center">
                  <img src="../uploads/' . $value["img"] . '" alt="" class="w-8 h-8 rounded object-cover block">
                  <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 line-clamp-2  w-[200px]">' . $value["ten"] . '</a>
                </div>
              </td>
              <td class="py-2 px-4 border-b border-b-gray-50">
                <span class="text-[13px] font-medium text-emerald-500">' . $value["luot_ban"] . '</span>
              </td>
             
            </tr>';
            }
          } else {
            echo '<tr><td colspan="8" style="text-align: center">No data available</td></tr>';
          }

          ?>
        </tbody>
      </table>
    </div>
    <div>
      <!-- <script>
        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
          // Dữ liệu thống kê số lượng đã bán ra theo ngày tháng
          var data = google.visualization.arrayToDataTable([
            ['Ngày', 'Số lượng đã bán'],
            ['01/01/2024', 10],
            ['02/01/2024', 5],
            ['03/01/2024', 8],
            // Thêm dữ liệu cho các ngày khác tương tự
          ]);

          var options = {
            title: 'Biểu đồ thống kê số lượng đã bán ra theo ngày',
            hAxis: {
              title: 'Ngày'
            },
            vAxis: {
              title: 'Số lượng đã bán'
            }
          };

          var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

          chart.draw(data, options);
        }
      </script> -->
    </div>
  </div>
</div>