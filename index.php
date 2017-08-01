<?php
$json = file_get_contents('./assets/json/toilets.json');
$decode_data = json_decode($json, true);
$post_data = array();
if(!empty($_POST)){
	$post = $_POST;
	if(empty($post['gender']) && empty($post['style'])){
		if(!empty($post['locate'])){
			$section = $post['locate'];
			$floor = $post['floor'];
			$section_name = $decode_data[$section]['section'];
			$post_data[] = $decode_data[$section]['floor'][$floor];
			$count = count($decode_data[$section]['floor'][$floor]) + 1;
		}
	}
}
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>ToiletBooks | トイレ検索アプリケーション</title>
		<link rel="stylesheet" href="./assets/css/reset.css">
		<link rel="stylesheet" href="./assets/css/style.css" />
	</head>
	<body>
		<div class="contents">
			<header>
				<h2>ToiletBooks</h2>
			</header>
			<div class="map">
				<div class="title">
					<h3><img src="./assets/img/material/ic/earth.png" width="80pt" height="80">MAP</h3>
				</div>
				<div class="image_map">
					<img src="./assets/img/image/map.png" alt="">
				</div>
			</div>
			<div id="search">
				<div class="title">
					<h3><img src="./assets/img/material/ic/search.png" width="80pt" height="80pt">SEARCH</h3>
				</div>
				<div class="search_box">
					<form method = "post" name="data" action="#search">
						<select class="select_locate" name="locate">
							<option name="locate[]" value="1">A 本部棟</option>
							<option name="locate[]" value="2">B 図書館</option>
							<option name="locate[]" value="3">C 実習棟</option>
							<option name="locate[]" value="4">D 教職員共通棟</option>
							<option name="locate[]" value="5">E 研究棟</option>
							<option name="locate[]" value="6">F 講義棟</option>
							<option name="locate[]" value="7">G 厚生棟</option>
							<option name="locate[]" value="8">体育館</option>
							<option name="locate[]" value="9">環境棟</option>
							<option name="locate[]" value="10">計算機センター</option>
							<option name="locate[]" value="11">K 生物工学研究センター</option>
							<option name="locate[]" value="12">L 合同棟</option>
							<option name="locate[]" value="13">M 生物工学科棟</option>
							<option name="locate[]" value="14">W 西棟1</option>
							<option name="locate[]"value="15">W 西棟2</option>
							<option name="locate[]"value="16">W 西棟3</option>
							<option name="locate[]" value="17">合同講義棟</option>
							<option name="locate[]" value="18">学生会館</option>
							<option name="locate[]" value="19">テニスコート</option>
						</select>
						<select class="select_floor" name="floor">
							<option class="floor_1" name="floor" value="1" style="display:none;">1F</option>
							<option class="floor_2" name="floor" value="2" style="display:none;">2F</option>
							<option class="floor_3" name="floor" value="3">3F</option>
							<option class="floor_4" name="floor" value="4">4F</option>
							<option class="floor_5" name="floor" value="5">5F</option>
							<option class="floor_6" name="floor" value="6">6F</option>
							<option class="floor_7" name="floor" value="7">7F</option>
						</select>
						<div class="gender">
							<label><input type="checkbox" name="dender[]" value="m">男性</label>
							<label><input type="checkbox" name="dender[]" value="f">女性</label>
							<label><input type="checkbox" name="dender[]" value="mul">多目的</label>
						</div>
						<input type="submit" name="" value="検索">
					</form>
				</div>
				<div id="result">
					<?php if(!empty($_POST)): ?>
						<div class="information">
							<div class="info_section">
								<img src="./assets/img/material/ic/home.png" alt="">
								<p class="info_section_name"><?php echo $section_name; ?></p>
								<p class="info_section_floor"><?php echo $floor; ?>F</p>
							</div>
							<?php
							if(empty($post_data[0])){
								echo '<p>';
								echo 'お探しの場所にはトイレがありません。';
								echo '</p>';
							}
							?>
							<?php
							for($i = 1; $i < $count; $i++):
								$img_path = $post_data['0'][$i]['toilet_img_path'];
								$value = array();
								foreach ($post_data[0][$i] as $key => $value[]) {
								}
							?>
								<div class="content">
									<div class="toilet_image">
										<img class="search_img" src="<?php echo $img_path; ?>" alt="">
									</div>
					        <div class="info">
										<div class="gender">
											<?php if($key == 'male'): ?>
												<p>男子トイレ</p>
											<?php elseif($key == 'female'): ?>
												<p>女子トイレ</p>
											<?php elseif($key == 'multipurpose'): ?>
												<p>多目的トイレ</p>
											<?php endif; ?>
										</div>
					          <div class="info_content">
					            <div class="info_item">
					              <h1>和式</h1>
					            </div>
					            <div class="info_number">
					              <h1><?php echo $value[1]['style'][0]['japanese_style']; ?></h1>
					            </div>
					          </div>
					          <div class="info_content">
					            <div class="info_item">
					              <h1>洋式</h1>
					            </div>
					            <div class="info_number">
					              <h1><?php echo $value[1]['style'][0]['western_style']; ?></h1>
					            </div>
					          </div>
					          <div class="info_content">
					            <div class="info_item">
					              <h1>小便</h1>
					            </div>
					            <div class="info_number">
					              <h1><?php echo $value[1]['style'][0]['piss']; ?></h1>
					            </div>
					          </div>
					          <div class="info_content">
					            <div class="info_item">
					              <h1>暖かい</h1>
					            </div>
					            <div class="info_number">
												<?php if($value[1]['style'][0]['warm'] == 1): ?>
					              	<h1>あり</h1>
												<?php else: ?>
													<h1>なし</h1>
												<?php endif; ?>
					            </div>
					          </div>
					          <div class="info_content">
					            <div class="info_item">
					              <h1>おとひめ</h1>
					            </div>
					            <div class="info_number">
												<?php if($value[1]['style'][0]['otohime'] == 1): ?>
					              	<h1>あり</h1>
												<?php else: ?>
													<h1>なし</h1>
												<?php endif; ?>
					            </div>
					          </div>
					          <div class="info_content">
					            <div class="info_item">
					              <h1>ウォシュレット</h1>
					            </div>
					            <div class="info_number">
												<?php if($value[1]['style'][0]['washlet'] == 1): ?>
					              	<h1>あり</h1>
												<?php else: ?>
													<h1>なし</h1>
												<?php endif; ?>
					            </div>
					          </div>
					        </div>
								</div>
							<?php endfor; ?>
			      </div>
					<?php endif; ?>
				</div>
			</div>
			<div class="building_research">
				<div class="title">
					<h3><img src="./assets/img/material/ic/home.png" width="80pt" height="80pt">LIST</h3>
				</div>
				<div class="building_contents">
					<div class="content">
						<img src="./assets/img/image/tpu-image.jpg" alt="">
						<h1>本部棟</h1>
					</div>
					<div class="content">
						<img src="./assets/img/image/tpu-image.jpg" alt="">
						<h1>図書館</h1>
					</div>
					<div class="content">
						<img src="./assets/img/image/tpu-image.jpg" alt="">
						<h1>実習棟</h1>
					</div>
					<div class="content">
						<img src="./assets/img/image/tpu-image.jpg" alt="">
						<h1>教員共通棟</h1>
					</div>
					<div class="content">
						<img src="./assets/img/image/tpu-image.jpg" alt="">
						<h1>研究棟</h1>
					</div>
					<div class="content">
						<img src="./assets/img/image/tpu-image.jpg" alt="">
						<h1>講義棟</h1>
					</div>
					<div class="content">
						<img src="./assets/img/image/tpu-image.jpg" alt="">
						<h1>厚生棟</h1>
					</div>
					<div class="content">
						<img src="./assets/img/image/tpu-image.jpg" alt="">
						<h1>体育館</h1>
					</div>
					<div class="content">
						<img src="./assets/img/image/tpu-image.jpg" alt="">
						<h1>環境棟</h1>
					</div>
					<div class="content">
						<img src="./assets/img/image/tpu-image.jpg" alt="">
						<h1>計算機センター</h1>
					</div>
					<div class="content">
						<img src="./assets/img/image/tpu-image.jpg" alt="">
						<h1>生物工学研究センター</h1>
					</div>
					<div class="content">
						<img src="./assets/img/image/tpu-image.jpg" alt="">
						<h1>合同棟</h1>
					</div>
					<div class="content">
						<img src="./assets/img/image/tpu-image.jpg" alt="">
						<h1>生物工学科棟</h1>
					</div>
					<div class="content">
						<img src="./assets/img/image/tpu-image.jpg" alt="">
						<h1>西棟</h1>
					</div>
					<div class="content">
						<img src="./assets/img/image/tpu-image.jpg" alt="">
						<h1>合同講義棟</h1>
					</div>
					<div class="content">
						<img src="./assets/img/image/tpu-image.jpg" alt="">
						<h1>学生会館</h1>
					</div>
					<div class="content">
						<img src="./assets/img/image/tpu-image.jpg" alt="">
						<h1>屋外部室</h1>
					</div>
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
			// 選択されているvalue属性値を取り出す
			var val = $('[name=locate]').val();
			console.log(val);
			switch (val) {
				case '1':
					$('.floor_1').css('display', 'none');
					$('.floor_2').css('display', 'none');
					$('.floor_3').css('display', 'block');
					$('.floor_4').css('display', 'block');
					$('.floor_5').css('display', 'block');
					$('.floor_6').css('display', 'block');
					$('.floor_7').css('display', 'block');
					break;
				case '2':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'none');
					$('.floor_3').css('display', 'none');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case '3':
					$('.floor_1').css('display', 'none');
					$('.floor_2').css('display', 'none');
					$('.floor_3').css('display', 'none');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
				case '4':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'none');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case '5':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'block');
					$('.floor_4').css('display', 'block');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case '6':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'block');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case '7':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'none');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case '8':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'none');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case '9':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'block');
					$('.floor_4').css('display', 'block');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case '10':
					$('.floor_1').css('display', 'none');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'block');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case '11':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'none');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case '12':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'block');
					$('.floor_4').css('display', 'block');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case '13':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'block');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case '14':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'none');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				case '15':
					$('.floor_1').css('display', 'block');
					$('.floor_2').css('display', 'block');
					$('.floor_3').css('display', 'none');
					$('.floor_4').css('display', 'none');
					$('.floor_5').css('display', 'none');
					$('.floor_6').css('display', 'none');
					$('.floor_7').css('display', 'none');
					break;
				default:
					$('.floor_1').css('display', 'none');
					$('.floor_2').css('display', 'none');
					$('.floor_3').css('display', 'block');
					$('.floor_4').css('display', 'block');
					$('.floor_5').css('display', 'block');
					$('.floor_6').css('display', 'block');
					$('.floor_7').css('display', 'block');
			}
		});
		</script>
	</body>
</html>
