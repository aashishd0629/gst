<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">

  <link rel="stylesheet" href="customcss/style.css">
  <link rel="stylesheet" href="customcss/adpc.css">
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
        <i class='bx bx-image-add' ></i>
          <span class="link_name">Gallery</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Gallery</a></li>
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


    <!-- ================ Add Images ================= -->

    <div class="container">
      <center>
        <h1><u>Add Pictures</u></h1>
      </center>
      <form action="gprocess.php" method="POST" enctype="multipart/form-data">




        <div class="row">
          <div class="col-25">
            <label for="Category">Type</label>
          </div>
          <div class="col-75">
            <select id="pts" name="ptyp">
              <?php
              include 'dbconn.php';
              $query = mysqli_query($conn, "SELECT * FROM ptype");
              while ($row = mysqli_fetch_assoc($query)) {

              ?>

                <option value="<?php echo $row['id'] ?>"><?php echo $row['t_name']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="Category">Sub-category</label>
          </div>
          <div class="col-75">
            <select id="pts" name="ptyp">
              <?php
              include 'dbconn.php';
              $query = mysqli_query($conn, "SELECT * FROM subcategory");
              while ($row = mysqli_fetch_assoc($query)) {

              ?>

                <option value="<?php echo $row['id'] ?>"><?php echo $row['sc_name']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>



        <div class="row">
          <div class="col-25">
            <label for="image">Image</label>
          </div>
          <div class="col-75">
            <input type="file" id="image" name="image">
          </div>
        </div>
        </br>
        <div class="row">
          <input type="submit" value="Add Photo" name="submit">
        </div>
      </form>
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