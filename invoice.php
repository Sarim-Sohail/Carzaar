<?php
$conn = mysqli_connect("localhost", "root", "", "se_project");
if ($conn->connect_error) {
	die("Connection Failed" . $conn->connect_error);
}
session_start();
$cID = $_GET['cID'];
$met = $_SESSION["met"];

$query = "SELECT * from ad where ad_id = ?";
//SQL injection prevention here
//preparing the query
$stmt = $conn->prepare($query);
//binding the required parameters to values
$stmt->bind_param("i", $cID);
//executing the binded query
$result = $stmt->execute();
//Save the query result
$stmt_result = $stmt->get_result();

if (isset($_POST['update'])) {
	$payment = $_POST['purchase'];
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>Reciept</title>
	<link href="assets/img/brand.png" rel="icon">
	<style>
		body {
			background-image: linear-gradient(135deg, #cc1616 10%, #1a1a1b 100%);
		}

		.title {
			display: flex;

		}

		.title h3 {
			color: white;
		}

		.invoice-box {
			max-width: 800px;
			margin: auto;
			padding: 30px;
			border: 1px solid rgb(255, 255, 255);
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
			font-size: 16px;
			line-height: 24px;
			font-family: "Corbel";
			color: rgb(255, 255, 255);
			background-color: #1d1d1d;
		}

		.invoice-box table {
			width: 100%;
			line-height: inherit;
			text-align: left;
		}

		.invoice-box table td {
			padding: 5px;
			vertical-align: top;
		}

		.invoice-box table tr td:nth-child(2) {
			text-align: right;
		}

		.invoice-box table tr.top table td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.top table td.title {
			font-size: 45px;
			line-height: 45px;
			color: #333;
		}

		.invoice-box table tr.information table td {
			padding-bottom: 40px;
		}

		.invoice-box table tr.heading td {
			background: #1a1a1b;
			border-bottom: 1px solid #ddd;
			font-weight: bold;
		}

		.invoice-box table tr.details td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.item td {
			border-bottom: 1px solid #eee;
		}

		.invoice-box table tr.item.last td {
			border-bottom: none;
		}

		.invoice-box table tr.total td:nth-child(2) {
			border-top: 2px solid #eee;
			font-weight: bold;
		}

		@media only screen and (max-width: 600px) {
			.invoice-box table tr.top table td {
				width: 100%;
				display: block;
				text-align: center;
			}

			.invoice-box table tr.information table td {
				width: 100%;
				display: block;
				text-align: center;
			}
		}

		/** RTL **/
		.invoice-box.rtl {
			direction: rtl;
			font-family: "Corbel";
		}

		.invoice-box.rtl table {
			text-align: right;
		}

		.invoice-box.rtl table tr td:nth-child(2) {
			text-align: left;
		}
	</style>
</head>

<body>
	<section>
		<?php
        while ($row = $stmt_result->fetch_assoc()) {
	        $ad_id = $row['ad_id'];
	        $registration = $row['re_no'];
	        $model = $row['model'];
	        $make = $row['make'];
	        $name = $row['name'];
	        $mileage = $row['mileage'];
	        $capacity = $row['engine_capacity'];
	        $color = $row['color'];
	        $seating = $row['seating_capacity'];
	        $cost = $row['cost'];
	        $category = $row['category'];
	        $availability = $row['availability'];
	        $transmission = $row['transmission'];
	        $assembly = $row['assembly'];
	        $contact = $row['owner_contact_no'];
        }
        $withtax = $cost - ($cost * 0.2)
        	?>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="assets/img/brand.png"
										style="width: 70px; margin-top: 30px; height: 70px; max-width: 70px" />
									<h3>CARZAAR</h3>
								</td>

								<td>
									Invoice #: 123
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr class="heading">
					<td>Order Information</td>

					<td>Values</td>
				</tr>

				<tr class="item last">
					<td>Vehicle REG No.</td>

					<td>
						<?php echo $registration ?>
					</td>
				</tr>

				<tr class="item last">
					<td>Model Year</td>

					<td>
						<?php echo $model ?>
					</td>
				</tr>

				<tr class="item last">
					<td>Make</td>

					<td>
						<?php echo $make ?>
					</td>
				</tr>
				<tr class="item last">
					<td>Model</td>

					<td>
						<?php echo $name ?>
					</td>
				</tr>
				<tr class="item last">
					<td>Mileage</td>

					<td>
						<?php echo $mileage ?> Km
					</td>
				</tr>
				<tr class="item last">
					<td>Engine Capacity</td>

					<td>
						<?php echo $capacity ?> CC
					</td>
				</tr>
				<tr class="item last">
					<td>Color</td>

					<td>
						<?php echo $color ?>
					</td>
				</tr>
				<tr class="item last">
					<td>Seating Capacity</td>

					<td>
						<?php echo $seating ?>
					</td>
				</tr>
				<tr class="item last">
					<td>Cost</td>

					<td>PKR
						<?php echo $cost ?>/=
					</td>
				</tr>
				<tr class="item last">
					<td>Category</td>

					<td>
						<?php echo $category ?>
					</td>
				</tr>
				<tr class="item last">
					<td>Transmission</td>

					<td>
						<?php echo $transmission ?>
					</td>
				</tr>
				<tr class="item last">
					<td>Assembly</td>

					<td>
						<?php echo $assembly ?>
					</td>
				</tr>

				<tr class="heading">
					<td>Payment Method</td>

					<td>
						<?php echo $payment ?>
					</td>
				</tr>

				<tr class="details">
					<td>Cash</td>

					<td>PKR
						<?php echo $cost ?>/=
					</td>
				</tr>
				<tr class="details">
					<td>Tax</td>

					<td> 20%</td>
				</tr>
				<tr class="item last">

				</tr>

				<tr class="total">
					<td></td>

					<td>TOTAL AMOUNT: PKR
						<?php echo $withtax ?>/=
					</td>
				</tr>
			</table>
		</div>
	</section>
</body>

</html>