<?php
	//Feito por Aron Alvarenga
	//https://www.linkedin.com/in/aron-alvarenga/
$news = simplexml_load_file('https://news.google.com/news/feed?ned=pt-BR_br&hl=pt-BR&gl=BR&output=rss');

$feeds = array();

$i = 0;

foreach ($news->channel->item as $item) 
{
	if($i == 0){
		$i++;
		continue;
		}
	
	
	
	$i;
	$feeds[$i]['titulo'] = (string) $item->title;
	$feeds[$i]['url'] = (string) $item->link;
	$feeds[$i]['fonte'] = (string) $item->source;
	
	$i++;
}


$tamanho = count($feeds);

?>

<!DOCTYPE html>
<html>

	<head>
		<title>Google News | Web Scraping PHP</title>

		<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style type="text/css">
		ul {
			list-style: none;
			padding-left: 0px;
			text-align: right;
			margin-top: 45px;
		}
		li {
			text-decoration: none;
			display: inline-block;
			padding-right: 30px;
			line-height: 50px;
			font-size: 18px;
			font-weight: 400;
		}
	</style>
	</head>

	
	<body style="margin-left:50px; margin-right: 50px">	


				<ul>
					<button type="button" class="btn btn-light">Muda Cor de Fundo</button>
				</ul>
			
	<h1 style="text-align: center; margin-top: 30px;">Google News usando PHP</h1>
	<div class="row" style="margin-top: 40px">
		  <?php
		  for ($i = 1; $i <= count($feeds); $i++) {
			?>

	
	  <div class="col-sm-6" style="margin-bottom: 20px;">
		<div class="card">
		  <div class="card-body">
			<h5 class="card-title"><?php echo $feeds[$i]['fonte'];?></h5>
			<p class="card-text"><?php echo $feeds[$i]['titulo'];?></p>
			<a href="<?php echo $feeds[$i]['url']?>" target="_blank" class="btn btn-dark">Leia mais</a>
		  </div>
		</div>
	  </div>
	  			
	
	<?php
		  }
	?>
	</div>
	<script type="text/javascript">
		var color = ["#ffbcd9", "#bcffe2", "#bcd9ff", "#bcfbff", "#ffbcd9", "#bcffc1", "#e2bcff", "#ffbcd9", "#d9ffbc", "#bcffe2"];
		var i = 0;
		document.querySelector("button").addEventListener("click", function(){
			i = i < color.length ? ++i : 0;
			document.querySelector("body").style.background = color[i]
			})
		
	</script>
	</body>
</html>