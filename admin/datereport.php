<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="customcss/style.css">
    <link rel="stylesheet" href="customcss/ordercss.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <i class='bx bx-cog'></i>
            <span class="logo_name">Admin Panel</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Dashboard</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bx-collection'></i>
                        <span class="link_name">Product</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Product</a></li>
                    <li><a href="addcat.php">Add Category</a></li>
                    <li><a href="addscat.php">Add Sub-Category</a></li>
                    <li><a href="addtype.php">Add Type</a></li>
                    <li><a href="additem.php">Add Product</a></li>
                    <li><a href="prodstock.php">Add Product Stock</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bx-book-alt'></i>
                        <span class="link_name">Content</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Content</a></li>
                    <li><a href="adarticles.php">Articles</a></li>
                    <li><a href="event.php">Events</a></li>

                </ul>
            </li>
            <li>
                <a href="ordersad.php">
                    <i class='bx bx-cart'></i>
                    <span class="link_name">Orders</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="ordersad.php">Orders</a></li>
                </ul>
            </li>
            <li>
                <a href="addgallery.php">
                    <i class='bx bx-image-add'></i>
                    <span class="link_name">Gallery</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Gallery</a></li>
                </ul>
            </li>
            <li>
                <a href="datereport.php">
                    <i class='bx bx-line-chart'></i>
                    <span class="link_name">Report</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Report</a></li>
                </ul>
            </li>
            <!--
      <li>
        <a href="#">
          <i class='bx bx-line-chart' ></i>
          <span class="link_name">Chart</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Chart</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Plugins</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Plugins</a></li>
          <li><a href="#">UI Face</a></li>
          <li><a href="#">Pigments</a></li>
          <li><a href="#">Box Icons</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-compass' ></i>
          <span class="link_name">Explore</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Explore</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">History</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li>-->
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <!--<img src="image/profile.jpg" alt="profileImg">-->
                    </div>

                    <i class='bx bx-log-out'></i>
                </div>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <div class="home-content">

            <i class='bx bx-menu'></i>
            <span class="text">Namuna Sahakari Kheti</span>


        </div>


        <!-- ================ Order Details List ================= -->
        <div class="header">
            <h2>Date Wise Report</h2>
        </div>
        <div class="container">
            <div id="dvContents">
                <form action="" method="GET">
                    From Date:<input type="Date" id="myDate" name="fromDate" value="<?php if (isset($_GET['fromDate'])) {
                                                                                        echo $_GET['fromDate'];
                                                                                    } ?>">
                    To Date:<input type="Date" id="myDate" name="toDate" value="<?php if (isset($_GET['toDate'])) {
                                                                                    echo $_GET['toDate'];
                                                                                } ?>">
                    <button type="submit" class="add">Generate</button>
                </form>




                <?php
                include 'dbconn.php';
                if (isset($_GET['fromDate']) && isset($_GET['toDate'])) {
                    $fromDate = $_GET['fromDate'];
                    $toDate = $_GET['toDate'];
                        
                    $query2 = mysqli_query($conn, "SELECT * FROM oderd where odate BETWEEN '$fromDate' AND '$toDate'  order by odate asc");
                    $amount = 0;
                    $no = 0;
                    $quantity=0;

                    if (mysqli_num_rows($query2) > 0) {
                ?>
                        <div class="details" id="dvContents">
                            <div class="recentOrders">
                                <div class="cardHeader">
                                    <h2>Order List</h2>

                                </div>

                                <table>
                                    <thead>
                                        <tr>
                                            <td>User Name</td>

                                            <td>Product Name</td>
                                            <td>Quantity</td>
                                            <td>Rate</td>
                                            <td>Amount</td>
                                            <td>Order Date</td>
                                            <td>Status</td>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include 'dbconn.php';
                                        $query2 = mysqli_query($conn, "SELECT * FROM oderd where odate BETWEEN '$fromDate' AND '$toDate' order by odate asc");
                                        while ($row2 = mysqli_fetch_assoc($query2)) {
                                            $amount = $amount + $row2['pamount'];
                                            $quantity=$quantity+ $row2['pqty'];
                                            $no++;
                                        ?>
                                            <tr>
                                                <td><?php echo $row2['uname']; ?></td>

                                                <td><?php echo $row2['pname']; ?></td>
                                                <td><?php echo $row2['pqty']; ?></td>
                                                <td><?php echo $row2['prate']; ?></td>
                                                <td><?php echo $row2['pamount']; ?></td>
                                                <td><?php echo $row2['odate']; ?></td>
                                                <td><?php echo $row2['status']; ?></td>
                                                

                                            </tr>
                                        <?php } ?>

                                    </tbody>

                                    </tr>
                                    
                                </table>
                                <table id="table_2">
                                    <tr>
                                        <td>Total no of orders:</td>
                                        <td>
                                            <span id="price"> <?php echo $no ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Revenue:</td>
                                        <td>
                                            <span id="price"> <?php echo $amount ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Quantity:</td>
                                        <td>
                                            <span id="price"> <?php echo $quantity ?></span>
                                        </td>
                                    </tr>



                                </table>
                            </div>
                            <input id="pbutton" type="button" onclick="PrintTable();" value="Print" />
                    <?php } else {
                        echo " <script> 
                alert ('No record found')
                </script>";
                    }
                }
                    ?>

                        </div>



                        </table>
            </div>



    </section>
    <!-- ======================= Cards ================== -->

    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>
    <script type="text/javascript">
    function PrintTable() {
        var printWindow = window.open('', '', 'height=500,width=800');
        printWindow.document.write('<html><head><title>Report</title>');
 
        //Print the Table CSS.
        // var table_style = document.getElementById("").innerHTML;
        // printWindow.document.write('<style type = "text/css">');
        // printWindow.document.write(table_style);
        // printWindow.document.write('</style>');
        // printWindow.document.write('</head>');
 
        //Print the DIV contents i.e. the HTML Table.
        printWindow.document.write('<body>');
        var divContents = document.getElementById("dvContents").innerHTML;
        printWindow.document.write(divContents);
        printWindow.document.write('</body>');
 
        printWindow.document.write('</html>');
        printWindow.document.close();
        printWindow.print();
    }
    </script>
</body>

</html>