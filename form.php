<?php
	session_start();

	require_once("productClass.php"); 

	if(isset($_POST['shipping']))
        {
	$_SESSION['shipping'] = $_POST['shipping'];
	$_SESSION['totalPrice'] = $_SESSION['shipping'];
	$itemCount = $_POST['itemCount'];
	$products = array();
	$_SESSION['data'] = "";
	
	for($i=0; $i<$itemCount; $i++)
	{
		$products[] = new Product(($i+1), $_POST['item_name_'.($i+1)], $_POST['item_price_'.($i+1)], $_POST['item_quantity_'.($i+1)]);
		$_SESSION['totalPrice'] += $products[$i]->totalCost;
	}
	foreach ($products as $prod)
	{
	$_SESSION['data'] .= '<tr><td>'.$prod->ID.'</td><td>'.$prod->name.'</td><td>'.$prod->price.'€</td><td>'.$prod->quantity.'</td><td>'.$prod->totalCost.'€</td></tr>';
	}
	
	$_SESSION['emailMessage'] = '<p style="color: red">Oto twoje zamównie ze sklepu internetowego</p><br>
	<table border="true" style="border-spacing: 0; border-collapse: collapse; width: 100%; max-width: 100%; margin-bottom: 20px;">
		<thead>
			<tr>
				<th>#</th>
				<th>Nazwa</th>
				<th>Cena</th>
				<th>Ilość</th>
				<th>Wartość</th>
			</tr>
		</thead>
		<tbody>'
			.$_SESSION['data'].
			'<tr>
				<td colspan="4">Dostawa</td>
				<td>'.$_SESSION['shipping'].'€</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="4">Łącznie do zapłaty</td>
				<td>'.$_SESSION['totalPrice'].'€</td>
			</tr>
		</tfoot>
	</table>
	<br><p>Dziękujemy</p>';
        }
	
?>
<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Warzywa On-Line: Formularz zamównia</title>
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<?php
			if(isset($_SESSION['error']))
			{
			echo $_SESSION['error'];
			}
                        unset($_SESSION['error']);
			?>
			<div class="page-header">
				<h1>Formularz Zamównia <small>Podaj dane niezbędne do zrealizowania zamównia</small></h1>
				<?php
				
				echo '<table class="table">
							<thead>
										<tr>
													<th>#</th>
													<th>Nazwa</th>
													<th>Cena</th>
													<th>Ilość</th>
													<th>Wartość</th>
										</tr>
							</thead>
							<tbody>'
										.$_SESSION['data'].
										'<tr class="active">
													<td colspan="4">Dostawa</td>
													<td>'.$_SESSION['shipping'].'€</td>
										</tr>
							</tbody>
							<tfoot>
							<tr class="info">
										<td colspan="4">Łącznie do zapłaty</td>
										<td>'.$_SESSION['totalPrice'].'€</td>
							</tr>
							</tfoot>
				</table>';
				?>
			</div>
			<form class="form-horizontal" method="POST" action="sendMail.php">
				<div class="form-group">
					<label for="InputName" class="col-sm-2 control-label">Imie</label>
					<div class="col-sm-10">
						<input type="text" name="name" class="form-control" id="InputName" placeholder="Twoje Imie" >
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" placeholder="Twój Email" name="email" >
					</div>
				</div>
				<div class="form-group">
					<label for="inputPhone" class="col-sm-2 control-label">Telefon</label>
					<div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPhone" placeholder="Twój numer telefonu" name="telephoneNumber" >
					</div>
				</div>
				<div class="form-group">
					<label for="InputAddress" class="col-sm-2 control-label">Adres</label>
					<div class="col-sm-10">
                                            <textarea rows="3" type="text" class="form-control" id="InputAddress" placeholder="Adres dostawy (Uwagi)"  name="address"><?php if(isset($_SESSION['address'])) echo $_SESSION['address']; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="checkbox">
							<label>
                                                            <input type="checkbox" name="regulationsCheckBox"> Akceptuję <a data-toggle="modal" data-target="#myModal">regulamin</a>
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success">Wyślij zamównie</button>
					</div>
				</div>
			</form>
			<div class="text"></div>
		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Regulamin</h4>
					</div>
					<div class="modal-body">
						<p>
							Zamawiając produkty na stronie www.warzywa-on-line.com, zgadzasz się na przetwarzanie danych osobowych w celu realizacji zamównia.
						</p>
					</div>
				</div>
			</div>
		</div>
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>