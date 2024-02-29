<?php 
    include('partiels/header.php');
    include('../config/config.php');
?>

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
			</div>
			
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Packages</h3>
						<i class='bx bx-search' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Img Package</th>
								<th>Package</th>
								<th>Description</th>
								<th>Price</th>
								<th>Active</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                            <?php 
                                $sql = "SELECT * FROM tbl_package";
                                $res = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
                                    $package = $row['title'];
                                    $description = $row['description'];
                                    $price = $row['price'];
                                    $image_name = $row['image_name'];
                                    $active = $row['active'];
                                    if($active == "yes"){
                                        $class = "status completed";
                                    } else {
                                        $class = "status pending";
                                    }
                                    ?>
                                    <tr>
                                        <td>
                                            <img src="img/people.png">
                                        </td>
                                        <td><?php echo $package ?></td>
                                        <td><?php echo $description ?></td>
                                        <td><?php echo $price  ?></td>
                                        <td><span class="<?php echo $class ?>"><?php echo $active ?></span></td>
										<td>
                                            <a href="<?php echo siteUrl; ?>admin/update_category.php" class="status completed">U-P</a>
                                            <a href="<?php echo siteUrl; ?>admin/delete_category.php" class="status process">D-P</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            ?>

						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
</body>
<?php include('partiels/footer.php') ?>