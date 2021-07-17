<?php $number = (!empty($_GET['number'])) ? $_GET['number'] : '数'; ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, minimal-ui, user-scalable=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<title>(<?php echo $number; ?>)の詳細</title>
	<style>
	.form-control{ display:inline; width:20%; }
	</style>
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h1>
				<?php echo $number; ?>の詳細 <small>を求める</small>
			</h1>
			<hr>
			<?php if($number == '数'){ ?>
				<form action="" method="GET">
					<input type="text" name="number" placeholder="数を入力" class="form-control">
					<input type="submit" class="btn btn-success">
				</form>
			<?php }elseif(!is_numeric($number)){ ?>
				<div class="alert alert-danger" role="alert">数値ではありません！<a href="index.php">もどる</a></div>
			<?php }else{ ?>
			<?php
				$number1 = $number-1;
				$number2 = $number+1;
				$number3 = $number*2;
				$number4 = $number/2;

				//素数判定
				//素数フラグ
				$is_sosu = ($number == 2) ? true : false;
				$is_not_sosu = ($number < 2) ? true : false;

				if(!$is_sosu && !$is_not_sosu){
					$is_not_sosu = ($number % 2 == 0);
					$is_sosu = true;
					for($n = 3; $n < $number; $n++){
						if($number % $n == 0){
							$is_not_sosu = true;
							$is_sosu = false;
							break;
						}
					}
				}
				
				echo ($is_sosu) ? '素数です。' : '素数ではありません。';
	
				$number6 = $number * $number * 3.1415;
				echo '<dl class="dl-horizontal">';
				echo "<dt>入力した数値</dt><dd>".$number."</dd>";
				echo "<dt>前の数</dt><dd>".$number1."</dd>";
				echo "<dt>次の数</dt><dd>".$number2."</dd>";
				echo "<dt>2倍にした数</dt><dd>".$number3."</dd>";
				echo "<dt>2でわった数</dt><dd>".$number4."</dd>";
				echo "<dt>".$number."を半径とした時の円の面積</dt><dd>".$number6."</dd>";
				echo "</dl>";
			}
			?>
		</div>
	</div>
</body>
</html>
