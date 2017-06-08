<?php 
	include("layout/header.php");
	require_once("../includes/dbconnect.php");
	require_once("../includes/functions.php");
	require_once("../includes/session.php");
	
	authorize_page(2);

	$user_id = $_SESSION['id'];

	$query = "SELECT * FROM ";
	$query .= "members ";
	$query .= "WHERE id != {$user_id} ";


	$result = mysqli_query($connection, $query);
	//echo $query;
	confirm_query($result);



?>

<link href="stylesheets/member_table.css" media="all" rel="stylesheet" type="text/css" />

<div class="member_set">

	<table>
		<tr>
			<th class="name">Name</th>
			<th class="mail">Em@il</th>
			<th class="tel">Telephone</th>
			<th class="address">Address</th>
			<th class="action">Action</th>
		</tr>

		<?php
			while ($row = mysqli_fetch_assoc($result)) {
		?>
			<tr>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['email'];?></td>
				<td><?php echo $row['phone'];?></td>
				<td><?php echo $row['address'];?></td>
				<td>
					<div class="action">
					<a class="action_btn" href="member/member_profile.php?id=<?php echo $row['id'] ; ?>">View Full Info</a>
					<?php 
						if ($_SESSION['access'] > 2) {
							echo "<a class=\"action_btn\" href=\"member/delete_member.php?id={$row['id']}\" onclick = \"return confirm('Are You Sure..?');\">Delete</a>";
						} 
					?>
					</div> 
				</td>
			</tr>
			<?php } ?>
	</table>
</div>

</body>
</html>