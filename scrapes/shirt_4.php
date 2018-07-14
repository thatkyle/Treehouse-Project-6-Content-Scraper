<html>
<head>
	<title>Logo Shirt, Teal</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700" type="text/css">
	<link rel="shortcut icon" href="favicon.ico">
</head>
<body>

	<div id="disclaimer" style="position: fixed; width: 100%; right: 0; left: 0; background: #1c1c1c; opacity: 50%; z-index: 100000000; padding: 10px; text-align: center; color: #999">
        This site is for demonstration purposes only. To learn how to make this site, visit &nbsp;<a style="color: #EEE;" href="http://teamtreehouse.com/library/programming-2/build-a-simple-php-application">TeamTreehouse.com</a>.
	</div>

	<div class="header" style="padding-top: 40px;">

		<div class="wrapper">

			<h1 class="branding-title"><a href="./">Shirts 4 Mike</a></h1>

			<ul class="nav">
				<li class="shirts on"><a href="shirts.php">Shirts</a></li>
				<li class="contact "><a href="contact.php">Contact</a></li>
				<li class="cart"><a target="paypal" href="https://www.paypal.com/cgi-bin/webscr?cmd=_cart&amp;business=Q6NFNPFRBWR8S&amp;display=1">Shopping Cart</a></li>
			</ul>

		</div>

	</div>

	<div id="content">
		<div class="section page">

			<div class="wrapper">

				<div class="breadcrumb"><a href="shirts.php">Shirts</a> &gt; Logo Shirt, Teal</div>

				<div class="shirt-picture">
					<span>
						<img src="img/shirts/shirt-107.jpg" alt="Logo Shirt, Teal">
					</span>
				</div>

				<div class="shirt-details">

					<h1><span class="price">$20</span> Logo Shirt, Teal</h1>

					<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="hosted_button_id" value="S5FMPJN6Y2C32">
						<input type="hidden" name="item_name" value="Logo Shirt, Teal">
						<table>
						<tr>
							<th>
								<input type="hidden" name="on0" value="Size">
								<label for="os0">Size</label>
							</th>
							<td>
								<select name="os0" id="os0">
																		<option value="Small">Small </option>
																		<option value="Medium">Medium </option>
																		<option value="Large">Large </option>
																		<option value="X-Large">X-Large </option>
																	</select>
							</td>
						</tr>
						</table>
						<input type="submit" value="Add to Cart" name="submit">
					</form>

					<p class="note-designer">* All shirts are designed by Mike the Frog.</p>

				</div>

			</div>

		</div>

	</div>

	<div class="footer">

		<div class="wrapper">

			<ul>		
				<li><a href="http://twitter.com/treehouse">Twitter</a></li>
				<li><a href="https://www.facebook.com/TeamTreehouse">Facebook</a></li>
			</ul>

			<p>&copy;2018 Shirts 4 Mike</p>

		</div>
	
	</div>

</body>
</html>