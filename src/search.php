<?php
if(empty($_REQUEST['section_id'])){
  header('location: index.php');
  exit();
}
elseif(!empty($_REQUEST['section_id'])){
  $url = "http://tpu-wc-book.sakura.ne.jp/toilets_information.json";
  $json = file_get_contents($url);
  $decode_data = json_decode($json, true);
  $post_data = array();
  $section = $_REQUEST['section_id'];
  $post = $_POST;
	$section_name = $decode_data[$section]['section'];
	echo "<pre>";
	print_r($decode_data);
	echo "</pre>";
  if(empty($post)){
    $post_data[] = $decode_data[$section];
    echo "<pre>";
    print_r($post_data);
    echo "</pre>";
  }elseif(!empty($post)){
    if(empty($post['gender'])){
  		echo "<pre>";
  		print_r($post_data);
  		echo "</pre>";
  	}elseif(!empty($post['gender'])){

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
          <?php if(empty($_POST)): ?>
						<div class="information">
							<div class="info_section">
								<img src="./assets/img/material/ic/home.png" alt="">
								<p class="info_section_name"><?php echo $section_name; ?></p>
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
					<?php elseif(!empty($_POST) && empty($post['gender'])): ?>
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
