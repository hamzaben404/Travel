<?php include('partiels/header.php') ?>
<?php include('../config/config.php') ?>


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
							<a class="active" href="
								<?php 
									$link = basename(getcwd());
									
									// $link1= dirname(__FILE__); $link2= basename(__DIR__);
									if($link == "index.php"){
										$link = "Home";
									}else if($link == "analytics.php") {
										$link = "Analytics";
									}else if($link == "product_store.php") {
										$link = "Product Store";
									}
								?>
							"><?php echo $link ?></a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<?php
							$sql1 = "SELECT * FROM product_order";
							$res1 = mysqli_query($conn, $sql1);
							$count1 = mysqli_num_rows($res1);	
						?>
						<h3><?php echo $count1 ?></h3>
						<p>New Order</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<!-- how to count number of website visitor -->
						<h3>2834</h3>
						<p>Visitors</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<?php
							$sql2 = "SELECT SUM(total) as total FROM package_order";
							$res2 = mysqli_query($conn, $sql2);
							$row2 = mysqli_fetch_assoc($res2);
							$sql3 = "SELECT SUM(total) as total FROM product_order";
							$res3 = mysqli_query($conn, $sql3);
							$row3 = mysqli_fetch_assoc($res3);
						?>
						<h3>$<?php echo $row2['total'] + $row3['total'] ?></h3>
						<p>Total Sales</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Orders</h3>
						<i class='bx bx-search' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Img_prod</th>
								<th>Prod</th>
								<th>Qty</th>
								<th>Total</th>
								<th>Order_D</th>
								<th>Customer</th>
								<th>Email</th>
								<th>Status</th>						
							</tr>
						</thead>
						<tbody>
							<tr>
							<?php
								$sql3 = "SELECT * FROM product_order";
								$res3 = mysqli_query($conn, $sql3);
								while($row3 = mysqli_fetch_assoc($res3)){
									$id = $row3['id'];
									$product = $row3['product'];
									$qty = $row3['qty'];
									$total = $row3['total'];
									$order_date = $row3['order_date'];
									$customer = $row3['customer_name'];
									$email = $row3['customer_email'];
									$status = $row3['status'];
									?>
									<tr>
										<td>
											<img src="img/people.png">
										</td>
										<td><?php echo $product ?></td>
										<td><?php echo $qty ?></td>
										<td><?php echo $total ?></td>
										<td><?php echo $order_date ?></td>
										<td><?php echo $customer ?></td>
										<td><?php echo $email ?></td>
										<?php 
											if($status == "Completed"){
												$status_class = "status completed";
											}else if($status == "Pending"){
												$status_class = "status pending";
											}else {
												$status_class = "status process";
											}
										?>
										<td><span class="<?php echo $status_class ?>"><?php echo $status ?></span></td>
									</tr>
									<?php
								}
							?>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	

<?php include('partiels/footer.php') ?>
