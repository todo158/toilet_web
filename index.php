<?php
$json = file_get_contents('./assets/json/toilets.json');
$decode_data = json_decode($json, true);
$post_data = array();
if(!empty($_POST)){
	$post = $_POST;
	$section = $post['locate'];
	$floor = $post['floor'];
	$section_name = $decode_data[$section]['section'];
	echo "<pre>";
	print_r($post);
	// print_r($decode_data);
	echo "</pre>";
	if(empty($post['gender'])){
		$post_data[] = $decode_data[$section]['floor'][$floor];
		$count = count($decode_data[$section]['floor'][$floor]) + 1;
		echo "<pre>";
		print_r($post_data);
		echo "</pre>";
	}elseif(!empty($post['gender'])){
		$count_gender = count($post['gender']);
		$count = count($decode_data[$section]['floor'][$floor]) + 1;
		for($t = 1; $t < $count; $t++){
			for($i = 0; $i < $count_gender; $i++){
				if($post['gender'][$i] == 'm' && isset($decode_data[$section]['floor'][$floor][$t]['male'])){
					$gender[] = 'male';
					$post_img_data[] = $decode_data[$section]['floor'][$floor][$t]['toilet_img_path'];
					$post_data[] =  $decode_data[$section]['floor'][$floor][$t]['male'];
				}elseif($post['gender'][$i] == 'f' && isset($decode_data[$section]['floor'][$floor][$t]['female'])){
					$gender[] = 'female';
					$post_img_data[] = $decode_data[$section]['floor'][$floor][$t]['toilet_img_path'];
					$post_data[] =  $decode_data[$section]['floor'][$floor][$t]['female'];
				}elseif($post['gender'][$i] == 'mul' && isset($decode_data[$section]['floor'][$floor][$t]['multipurpose'])){
					$gender[] = 'multipurpose';
					$post_img_data[] = $decode_data[$section]['floor'][$floor][$t]['toilet_img_path'];
					$post_data[] =  $decode_data[$section]['floor'][$floor][$t]['multipurpose'];
				}
			}
		}
		if(!empty($gender)){
			$count_data = count($gender);
		}

		// echo $count_data;
		echo "<pre>";
		// print_r($gender);
		// print_r($post_img_data);
		// print_r($post_data);
		echo "</pre>";
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
					<form method = "post" name="data" action="#search">
						<select class="select_locate" name="locate">
							<option name="locate[]" value="1" <?php if(!empty($post) && $post['locate'] == 1) echo 'selected'; ?>>A 本部棟</option>
							<option name="locate[]" value="2" <?php if(!empty($post) && $post['locate'] == 2) echo 'selected'; ?>>B 図書館</option>
							<option name="locate[]" value="3" <?php if(!empty($post) && $post['locate'] == 3) echo 'selected'; ?>>C 実習棟</option>
							<option name="locate[]" value="4" <?php if(!empty($post) && $post['locate'] == 4) echo 'selected'; ?>>D 教職員共通棟</option>
							<option name="locate[]" value="5" <?php if(!empty($post) && $post['locate'] == 5) echo 'selected'; ?>>E 研究棟</option>
							<option name="locate[]" value="6" <?php if(!empty($post) && $post['locate'] == 6) echo 'selected'; ?>>F 講義棟</option>
							<option name="locate[]" value="7" <?php if(!empty($post) && $post['locate'] == 7) echo 'selected'; ?>>G 厚生棟</option>
							<option name="locate[]" value="8" <?php if(!empty($post) && $post['locate'] == 8) echo 'selected'; ?>>体育館</option>
							<option name="locate[]" value="9" <?php if(!empty($post) && $post['locate'] == 9) echo 'selected'; ?>>環境棟</option>
							<option name="locate[]" value="10" <?php if(!empty($post) && $post['locate'] == 10) echo 'selected'; ?>>計算機センター</option>
							<option name="locate[]" value="11" <?php if(!empty($post) && $post['locate'] == 11) echo 'selected'; ?>>K 生物工学研究センター</option>
							<option name="locate[]" value="12" <?php if(!empty($post) && $post['locate'] == 12) echo 'selected'; ?>>L 合同棟</option>
							<option name="locate[]" value="13" <?php if(!empty($post) && $post['locate'] == 13) echo 'selected'; ?>>M 生物工学科棟</option>
							<option name="locate[]" value="14" <?php if(!empty($post) && $post['locate'] == 14) echo 'selected'; ?>>W 西棟1</option>
							<option name="locate[]"value="15" <?php if(!empty($post) && $post['locate'] == 15) echo 'selected'; ?>>W 西棟2</option>
							<option name="locate[]"value="16" <?php if(!empty($post) && $post['locate'] == 16) echo 'selected'; ?>>W 西棟3</option>
							<option name="locate[]" value="17" <?php if(!empty($post) && $post['locate'] == 17) echo 'selected'; ?>>合同講義棟</option>
							<option name="locate[]" value="18" <?php if(!empty($post) && $post['locate'] == 18) echo 'selected'; ?>>学生会館</option>
							<option name="locate[]" value="19" <?php if(!empty($post) && $post['locate'] == 19) echo 'selected'; ?>>テニスコート</option>
						</select>
						<select class="select_floor" name="floor">
							<option class="floor_1" name="floor" value="1" style="display:none;" <?php if(!empty($post) && $post['floor'] == 1) echo 'selected'; ?>>1F</option>
							<option class="floor_2" name="floor" value="2" style="display:none;" <?php if(!empty($post) && $post['floor'] == 2) echo 'selected'; ?>>2F</option>
							<option class="floor_3" name="floor" value="3" <?php if(!empty($post) && $post['floor'] == 3) echo 'selected'; ?>>3F</option>
							<option class="floor_4" name="floor" value="4" <?php if(!empty($post) && $post['floor'] == 4) echo 'selected'; ?>>4F</option>
							<option class="floor_5" name="floor" value="5" <?php if(!empty($post) && $post['floor'] == 5) echo 'selected'; ?>>5F</option>
							<option class="floor_6" name="floor" value="6" <?php if(!empty($post) && $post['floor'] == 6) echo 'selected'; ?>>6F</option>
							<option class="floor_7" name="floor" value="7" <?php if(!empty($post) && $post['floor'] == 7) echo 'selected'; ?>>7F</option>
						</select>
						<div class="gender">
							<label><input type="checkbox" name="gender[]" value="m" <?php if(!empty($post['gender']) && $post['gender'][0] == 'm') echo 'checked'; ?>>男性</label>
							<label><input type="checkbox" name="gender[]" value="f" <?php if(!empty($post['gender']) && $post['gender'][0] == 'f' || isset($post['gender'][1]) &&
							$post['gender'][1] == 'f') echo 'checked'; ?>>女性</label>
							<label><input type="checkbox" name="gender[]" value="mul" <?php if(!empty($post['gender']) && $post['gender'][$count_gender - 1] == 'mul') echo 'checked'; ?>>多目的</label>
						</div>
						<input type="submit" name="" value="検索">
					</form>
				</div>
				<div id="result">
					<?php if(!empty($_POST) && empty($post['gender'])): ?>
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
									<div class="page_link">
										<div class="page_link_inner">
											<a href="detail.php"><img src="./assets/img/material/ic/arrow_right.png" alt=""></a>
										</div>
									</div>
								</div>
							<?php endfor; ?>
			      </div>
					<?php elseif(!empty($_POST) && !empty($post['gender'])): ?>
						<div class="information">
							<div class="info_section">
								<img src="./assets/img/material/ic/home.png" alt="">
								<p class="info_section_name"><?php echo $section_name; ?></p>
								<p class="info_section_floor"><?php echo $floor; ?>F</p>
							</div>
							<?php
							if(empty($post_data[0])):
								echo '<p>';
								echo 'お探しの場所にはトイレがありません。';
								echo '</p>';
							else:
								for($i = 0; $i < $count_data; $i++):
							?>
									<div class="content">
										<div class="toilet_image">
											<img class="search_img" src="<?php echo $post_img_data[$i]; ?>" alt="">
										</div>
					        	<div class="info">
											<div class="gender">
												<?php if($gender[$i] == 'male'): ?>
													<p>男子トイレ</p>
												<?php elseif($gender[$i] == 'female'): ?>
													<p>女子トイレ</p>
												<?php elseif($gender[$i] == 'multipurpose'): ?>
													<p>多目的トイレ</p>
												<?php endif; ?>
											</div>
											<div class="info_content">
												<div class="info_item">
    											<h1>和式</h1>
												</div>
												<div class="info_number">
	    										<h1><?php echo $post_data[$i]['style'][0]['japanese_style']; ?></h1>
												</div>
											</div>
  										<div class="info_content">
												<div class="info_item">
													<h1>洋式</h1>
												</div>
												<div class="info_number">
													<h1><?php echo $post_data[$i]['style'][0]['western_style']; ?></h1>
												</div>
											</div>
											<div class="info_content">
												<div class="info_item">
													<h1>小便</h1>
												</div>
												<div class="info_number">
													<h1><?php echo $post_data[$i]['style'][0]['piss']; ?></h1>
												</div>
											</div>
											<div class="info_content">
												<div class="info_item">
													<h1>暖かい</h1>
												</div>
												<div class="info_number">
													<?php if($post_data[$i]['style'][0]['warm'] == 1): ?>
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
													<?php if($post_data[$i]['style'][0]['otohime'] == 1): ?>
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
													<?php if($post_data[$i]['style'][0]['washlet'] == 1): ?>
														<h1>あり</h1>
													<?php else: ?>
														<h1>なし</h1>
													<?php endif; ?>
												</div>
						    			</div>
				      			</div>
										<div class="page_link">
											<div class="page_link_inner">
												<a href="detail.php"><img src="./assets/img/material/ic/arrow_right.png" alt=""></a>
											</div>
										</div>
									</div>
								<?php endfor; ?>
							<?php endif; ?>
				    </div>
					<?php endif; ?>
				</div>
			</div>
			<div class="building_research">
				<div class="title">
					<h3><img src="./assets/img/material/ic/home.png" width="60px" height="60px">LIST</h3>
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
