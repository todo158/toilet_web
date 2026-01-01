<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>ToiletBooks | トイレ検索アプリケーション</title>
		<link rel="stylesheet" href="./assets/css/reset.css">
		<link rel="stylesheet" href="./assets/css/style.css" />
		<script src="http://code.jquery.com/jquery-2.0.0.js"></script>
	</head>
	<body>
		<div class="contents">
			<header>
				<h2>ToiletBooks</h2>
			</header>
			<div class="map">
				<div class="title">
					<h3><img src="./assets/img/material/ic/earth.png" width="60px" height="60px">MAP</h3>
				</div>
				<div class="image_map">
					<img src="./assets/img/image/map.png" alt="">
				</div>
			</div>
			<div id="search">
				<div class="title">
					<h3><img src="./assets/img/material/ic/search.png" width="60px" height="60px">SEARCH</h3>
				</div>
				<div class="search_box">
					<form method = "post" name="data" action="searchResult.php">
						<select class="select_locate" name="locate">
							<option name="locate[]" value="A" >A 本部棟</option>
							<option name="locate[]" value="B" >B 図書館</option>
							<option name="locate[]" value="C" >C 実習棟</option>
							<option name="locate[]" value="D" >D 教職員共通棟</option>
							<option name="locate[]" value="E" >E 研究棟</option>
							<option name="locate[]" value="F" >F 講義棟</option>
							<option name="locate[]" value="G" >G 厚生棟</option>
							<option name="locate[]" value="H" >H 体育館</option>
							<option name="locate[]" value="I" >I 環境棟</option>
							<option name="locate[]" value="J" >J 計算機センター</option>
							<option name="locate[]" value="K" >K 生物工学研究センター</option>
							<option name="locate[]" value="L" >L 合同棟</option>
							<option name="locate[]" value="M" >M 生物工学科棟</option>
							<option name="locate[]" value="W1" >W1 西棟1</option>
							<option name="locate[]" value="W2" >W2 西棟2</option>
							<option name="locate[]" value="W3" >W3 西棟3</option>
							<option name="locate[]" value="gakusei" >学生会館</option>
							<option name="locate[]" value="tennis" >屋外部室</option>
						</select>
						<select class="select_floor" name="floor">
							<option class="floor_1" name="floor[]" value="1" >1F</option>
							<option class="floor_2" name="floor[]" value="2" >2F</option>
							<option class="floor_3" name="floor[]" value="3" >3F</option>
							<option class="floor_4" name="floor[]" value="4" >4F</option>
							<option class="floor_5" name="floor[]" value="5" >5F</option>
							<option class="floor_6" name="floor[]" value="6" >6F</option>
							<option class="floor_7" name="floor[]" value="7" >7F</option>
						</select>
						<div class="gender">
							<label><input type="radio" name="gender[]" value="male" >男性</label>
							<label><input type="radio" name="gender[]" value="female" >女性</label>
							<label><input type="radio" name="gender[]" value="multipurpose" >多目的</label>
						</div>
						<div class="style">
							<label><input type="radio" name="style[]" value="japanese_style" >和式</label>
							<label><input type="radio" name="style[]" value="western_style" >洋式</label>
							<label><input type="radio" name="style[]" value="piss" >小べん</label></br>
							<label><input type="radio" name="style[]" value="washlet" >ウォシュレット</label>
							<label><input type="radio" name="style[]" value="warm" >あたたかい</label>
							<label><input type="radio" name="style[]" value="otohime" >おとひめ</label>
						</div>
						<input type="submit" name="" value="検索">
					</form>
				</div>
			<div class="building_research">
				<div class="title">
					<h3><img src="./assets/img/material/ic/home.png" width="60px" height="60px">LIST</h3>
				</div>
				<div class="building_contents">
					<form method="post" name="building_A_form" action="detail.php">
						<div class="content">
							<input type="hidden" name="building" value="A">
							<a href="javascript:building_A_form.submit()" ><img src="./assets/img/image/tpu-image.jpg" alt="">
							<h1>本部棟</h1></a>
						</div>
					</form>
					<form method="post" name="building_B_form" action="detail.php">
						<div class="content">
							<input type="hidden" name="building" value="B">
							<a href="javascript:building_B_form.submit()" ><img src="./assets/img/image/tpu-image.jpg" alt="">
							<h1>図書館</h1></a>
						</div>
					</form>
					<form method="post" name="building_C_form" action="detail.php">
						<div class="content">
							<input type="hidden" name="building" value="C">
							<a href="javascript:building_C_form.submit()" ><img src="./assets/img/image/tpu-image.jpg" alt="">
							<h1>実習棟</h1></a>
						</div>
					</form>
					<form method="post" name="building_D_form" action="detail.php">
						<div class="content">
							<input type="hidden" name="building" value="D">
							<a href="javascript:building_D_form.submit()" ><img src="./assets/img/image/tpu-image.jpg" alt="">
							<h1>教員共通棟</h1></a>
						</div>
					</form>
					<form method="post" name="building_E_form" action="detail.php">
						<div class="content">
							<input type="hidden" name="building" value="E">
							<a href="javascript:building_E_form.submit()" ><img src="./assets/img/image/tpu-image.jpg" alt="">
							<h1>研究棟</h1></a>
						</div>
					</form>
					<form method="post" name="building_F_form" action="detail.php">
						<div class="content">
							<input type="hidden" name="building" value="F">
							<a href="javascript:building_F_form.submit()" ><img src="./assets/img/image/tpu-image.jpg" alt="">
							<h1>講義棟</h1></a>
						</div>
					</form>
					<form method="post" name="building_G_form" action="detail.php">
						<div class="content">
							<input type="hidden" name="building" value="G">
							<a href="javascript:building_G_form.submit()" ><img src="./assets/img/image/tpu-image.jpg" alt="">
							<h1>厚生棟</h1></a>
						</div>
					</form>
					<form method="post" name="building_H_form" action="detail.php">
						<div class="content">
							<input type="hidden" name="building" value="H">
							<a href="javascript:building_H_form.submit()" ><img src="./assets/img/image/tpu-image.jpg" alt="">
							<h1>体育館</h1></a>
						</div>
					</form>
					<form method="post" name="building_I_form" action="detail.php">
						<div class="content">
							<input type="hidden" name="building" value="I">
							<a href="javascript:building_I_form.submit()" ><img src="./assets/img/image/tpu-image.jpg" alt="">
							<h1>環境棟</h1></a>
						</div>
					</form>
					<form method="post" name="building_J_form" action="detail.php">
						<div class="content">
							<input type="hidden" name="building" value="J">
							<a href="javascript:building_J_form.submit()" ><img src="./assets/img/image/tpu-image.jpg" alt="">
							<h1>計算機センター</h1></a>
						</div>
					</form>
					<form method="post" name="building_K_form" action="detail.php">
						<div class="content">
							<input type="hidden" name="building" value="K">
							<a href="javascript:building_K_form.submit()" ><img src="./assets/img/image/tpu-image.jpg" alt="">
							<h1>生物工学研究センター</h1></a>
						</div>
					</form>
					<form method="post" name="building_L_form" action="detail.php">
						<div class="content">
							<input type="hidden" name="building" value="L">
							<a href="javascript:building_L_form.submit()" ><img src="./assets/img/image/tpu-image.jpg" alt="">
							<h1>合同棟</h1></a>
						</div>
					</form>
					<form method="post" name="building_M_form" action="detail.php">
						<div class="content">
							<input type="hidden" name="building" value="M">
							<a href="javascript:building_M_form.submit()" ><img src="./assets/img/image/tpu-image.jpg" alt="">
							<h1>生物工学科棟</h1></a>
						</div>
					</form>
					<form method="post" name="building_W1_form" action="detail.php">
						<div class="content">
							<input type="hidden" name="building" value="W1">
							<a href="javascript:building_W1_form.submit()" ><img src="./assets/img/image/tpu-image.jpg" alt="">
							<h1>西棟1</h1></a>
						</div>
					</form>
					<form method="post" name="building_W2_form" action="detail.php">
						<div class="content">
							<input type="hidden" name="building" value="W2">
							<a href="javascript:building_W2_form.submit()" ><img src="./assets/img/image/tpu-image.jpg" alt="">
							<h1>西棟2</h1></a>
						</div>
					</form>
					<form method="post" name="building_W3_form" action="detail.php">
						<div class="content">
							<input type="hidden" name="building" value="W3">
							<a href="javascript:building_W3_form.submit()" ><img src="./assets/img/image/tpu-image.jpg" alt="">
							<h1>西棟3</h1></a>
						</div>
					</form>
					<form method="post" name="building_gakusei_form" action="detail.php">
						<div class="content">
							<input type="hidden" name="building" value="gakusei">
							<a href="javascript:building_gakusei_form.submit()" ><img src="./assets/img/image/tpu-image.jpg" alt="">
							<h1>学生会館</h1></a>
						</div>
					</form>
					<form method="post" name="building_tennis_form" action="detail.php">
						<div class="content">
							<input type="hidden" name="building" value="tennis">
							<a href="javascript:building_tennis_form.submit()" ><img src="./assets/img/image/tpu-image.jpg" alt="">
							<h1>屋外部室</h1></a>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="footer">
			<div class="project_introduce">
				<h1>Toilet Bookとは</h1>
				<h2>富山県立大学のトイレから快適なトイレを検索&amp;発見するサイトです。</h2>
			</div>
			<div class="copyright">
				<small>Copyright &copy; CCM(Core Creative Manager) - Toyama Prefectural University.All right reserved.</small>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
		<script type="text/javascript">
		$('[name=locate]').change(function() {
			$('[name=floor]').val(['1']);
			limit_floor();
		});

		$(document).ready(function(){
			limit_floor();
		});

		function limit_floor() {
			// 選択されているvalue属性値を取り出す
			var val = $('[name=locate]').val();
			console.log(val);
			switch (val) {
				case 'A':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'block');
					$('.floor_4').css('display', 'block');
					$('.floor_5').css('display', 'block');
					$('.floor_6').css('display', 'block');
					$('.floor_7').css('display', 'block');
					break;
				case 'B':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'none');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case 'C':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'block');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case 'D':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'none');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case 'E':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'block');
					$('.floor_4').css('display', 'block');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case 'F':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'block');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case 'G':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'none');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case 'H':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'none');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case 'I':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'block');
					$('.floor_4').css('display', 'block');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case 'J':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'block');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case 'K':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'block');
					$('.floor_4').css('display', 'block');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case 'L':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'none');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case 'M':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'block');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case 'W1':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'none');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case 'W2':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'none');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case 'W3':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'none');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case 'goudou':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'none');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case 'gakusei':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'none');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case 'tennis':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'none');
					$('.floor_3').css('display', 'none');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				default:
					$('.floor_1').css('display', 'break');
					$('.floor_2').css('display', 'break');
					$('.floor_3').css('display', 'block');
					$('.floor_4').css('display', 'block');
					$('.floor_5').css('display', 'block');
					$('.floor_6').css('display', 'block');
					$('.floor_7').css('display', 'block');
					break;
			}
		}
		</script>
	</body>
</html>
