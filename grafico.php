<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="stylesheet.css">

	

	<title>Photus Dashboard</title>
</head>
<body style="background-image: none">

	<div class="header-painel">
		<h3 style="font-family: Squared-Display, sans-serif; font-size: 90px; margin-top: 0px; display: inline-block; color: #fff">Dashboard</h3>
		<span style="display: inline-block; margin-right: -180px; font-family: Sansation-Bold; color: #fff"><?php echo "Bem-vindo(a) " . $_SESSION['usuario']; ?></span>
		<a href="principal.php"><img src="img/home.png" style="height: 30px; width: 30px; display: inline-block; position: relative; top: -2px; left: 600px"></a>
		<a href="grafico.php"><img src="img/grafico.png" style="height: 30px; width: 30px; display: inline-block; position: relative; top: -2px; left: 650px"></a>
		<a href="#"><img src="img/config.png" style="height: 30px; width: 30px; display: inline-block; position: relative; top: -2px; left: 700px"></a>
		<a href="principal.php?logout=ok"><img src="img/logout_branco.png" style="height: 30px; width: 30px; float: right; margin-top: 30px; margin-right: 17px; display: inline-block;" title="Logout"></a>
	</div>

	<div class="container">

		<div class="p-grafico">
			<h4 class="t-painel" style="text-align: center">Meu desempenho</h4>
			
			<div class="grafico">
				<canvas id="caGraficoDesempenho" width="650" height="250">[No canvas support]</canvas>
				<script>
		    		window.onload = (function ()
		    		{
		        		var data = [280, 45, 133, 166, 84, 259, 266, 960, 219, 311, 67, 89];

		        		var bar = new RGraph.Bar({
		           			id: 'caGraficoDesempenho',
		           			data: data,
		           			options: {
		               			labels: [
		                   			'Jan', 'Fev',
		                   			'Mar', 'Abr',
		                   			'Mai', 'Jun',
		                   			'Jul', 'Ago',
		                   			'Set', 'Out',
		                   			'Nov', 'Dez'
		               			],
		               			gutterLeft: 35
		           			}
		        		}).draw();
		    		});
				</script>
			</div>
		</div>
	</div>

	<script src="rgraph/libraries/RGraph.common.core.js"></script>
    <script src="rgraph/libraries/RGraph.bar.js"></script>

</body>
</html>