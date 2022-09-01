<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="customcss/style.css">
    <link rel="stylesheet" href="customcss/cards.css">
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
                    <li><a href="addevent.php">Events</a></li>

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
                <a href="addbm.php">
                    <i class='bx bx-line-chart'></i>
                    <span class="link_name">Board Members</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Board Members</a></li>
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
        <div class="cardBox">
            <div class="card">
                <div>
                    <div class="numbers">Most Selling Product</div>
                    <div class="cardName">
                        <?php
                        include 'dbconn.php';
                        $query = mysqli_query($conn, "SELECT pname, COUNT(pname) AS `value_occurrence` FROM oderd GROUP BY pname
                        ORDER BY `value_occurrence` DESC
                        LIMIT 1;");

                        $uname = "";
                        while ($row = mysqli_fetch_assoc($query)) {
                        $uname = $row['pname'];
                        }
                        ?>
                        <?php echo $uname ?>
                        </div>
                </div>


            </div>


            <div class="card">
                <div>
                    <div class="numbers">Most Feature Product</div>
                    <div class="cardName">Basmati</div>
                </div>


            </div>
        </div>

        <!-- Product Stock -->
        <?php
        include 'dbconn.php';
        ?>

        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Product List</h2>

                </div>

                <table>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Desc</td>
                            <td>Rate</td>
                            <td>Weight</td>
                            <td>Current Stock</td>
                            <td>Actions</td>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql5 = mysqli_query($conn, "SELECT * FROM productlist");
                        while ($row5 = mysqli_fetch_assoc($sql5)) {


                        ?>
                            <tr>
                                <td><?php echo $row5['id'] ?></td>
                                <td><?php echo $row5['prod_name'] ?></td>
                                <td><?php echo $row5['prod_desc'] ?></td>
                                <td><?php echo $row5['pr_rate'] ?></td>
                                <td><?php echo $row5['pr_weight'] ?></td>
                                <td><?php echo $row5['currentStock'] ?></td>
                                <td>
                                    <a href="updateprod.php?id=<?php echo $row5['id'] ?>"><i class='bx bxs-edit bx-lg' style="font-size:30px; color:blue;"></i></a>
                                    <a href="deleteprod.php?id=<?php echo $row5['id'] ?>" onclick="return checkDelete()"><i class='bx bxs-message-square-x' style="font-size:30px; color:red;"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>


        </div>


        <!-- Product Stock -->
        <?php
        include 'dbconn.php';
        ?>

        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Stock Details</h2>

                </div>

                <table>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Date</td>
                            <td>Quantity</td>
                            <td>Rate</td>
                            <td>Weight</td>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql8 = mysqli_query($conn, "SELECT * FROM prodstock");
                        while ($row8 = mysqli_fetch_assoc($sql8)) {


                        ?>
                            <tr>
                                <td><?php echo $row8['id'] ?></td>
                                <td><?php echo $row8['pr_name'] ?></td>
                                <td><?php echo $row8['edate'] ?></td>
                                <td><?php echo $row8['p_quantity'] ?></td>
                                <td><?php echo $row8['p_rate'] ?></td>
                                <td><?php echo $row8['p_weight'] ?></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>


        </div>
        <!-- events -->
        <?php
        include 'dbconn.php';
        ?>

        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Events</h2>

                </div>

                <table>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Date</td>
                            <td>Title</td>
                            <td>Desc</td>
                            <td>Action</td>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql6 = mysqli_query($conn, "SELECT * FROM events");
                        while ($row6 = mysqli_fetch_assoc($sql6)) {


                        ?>
                            <tr>
                                <td><?php echo $row6['id'] ?></td>
                                <td><?php echo $row6['date'] ?></td>
                                <td><?php echo $row6['title'] ?></td>
                                <td><?php echo $row6['description'] ?></td>

                                <td>

                                    <a href="deleteevent.php?id=<?php echo $row6['id'] ?>" onclick="return checkDelete()"><i class='bx bxs-message-square-x' style="font-size:30px; color:red;"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Articles -->
        <?php
        include 'dbconn.php';
        ?>

        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Articles</h2>

                </div>

                <table>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Date</td>
                            <td>Title</td>
                            <td>Desc</td>
                            <td>Action</td>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql7 = mysqli_query($conn, "SELECT * FROM articles");
                        while ($row7 = mysqli_fetch_assoc($sql7)) {


                        ?>
                            <tr>
                                <td><?php echo $row7['id'] ?></td>
                                <td><?php echo $row7['a_date'] ?></td>
                                <td><?php echo $row7['a_title'] ?></td>
                                <td><?php echo $row7['a_desc'] ?></td>

                                <td>

                                    <a href="deletearticle.php?id=<?php echo $row7['id'] ?>" onclick="return checkDelete()"><i class='bx bxs-message-square-x' style="font-size:30px; color:red;"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- Customers -->
        <?php
        include 'dbconn.php';
        ?>

        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Customer List</h2>

                </div>

                <table>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>User Name</td>
                            <td>Email</td>
                            <td>Address</td>
                            <td>Mobile No</td>
                            <td>Action</td>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql8 = mysqli_query($conn, "SELECT * FROM register");
                        while ($row9 = mysqli_fetch_assoc($sql8)) {


                        ?>
                            <tr>
                                <td><?php echo $row9['id'] ?></td>
                                <td><?php echo $row9['user_name'] ?></td>
                                <td><?php echo $row9['email'] ?></td>
                                <td><?php echo $row9['address'] ?></td>
                                <td><?php echo $row9['phone_no'] ?></td>

                                <td>

                                    <a href="deleteuser.phpphp?id=<?php echo $row9['id'] ?>" onclick="return checkDelete()"><i class='bx bxs-message-square-x' style="font-size:30px; color:red;"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
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
</body>

</html>