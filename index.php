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

				</div>
			</div>
			<div id="search">
				<div class="title">
					<h3><img src="./assets/img/material/ic/search.png" width="80pt" height="80pt">SEARCH</h3>
				</div>
				<div class="search_box">
					<form method = "post" name="data" action="#search">
						<select class="select_locate" name="locate">
							<option name="locate[]" value="all">すべて</option>
							<option name="locate[]" value="a">本部棟</option>
							<option name="locate[]" value="b">図書館</option>
							<option name="locate[]" value="c">実習棟</option>
							<option name="locate[]" value="d">教職員共通棟</option>
							<option name="locate[]" value="e">研究棟</option>
							<option name="locate[]" value="f">講義棟</option>
							<option name="locate[]" value="g">厚生棟</option>
							<option name="locate[]" value="h">体育館</option>
							<option name="locate[]" value="i">環境棟</option>
							<option name="locate[]" value="j">計算機センター</option>
							<option name="locate[]" value="k">生物工学研究センター</option>
							<option name="locate[]" value="l">合同棟</option>
							<option name="locate[]" value="m">生物棟</option>
							<option name="locate[]" value="n">学生会館</option>
							<option name="locate[]" value="o">テニスコート</option>
							<option name="locate[]" value="p">合同講義棟</option>
							<option name="locate[]" value="q">西棟1</option>
							<option name="locate[]"value="r">西棟2</option>
							<option name="locate[]"value="s">西棟3</option>
						</select>
						<select class="select_floor" name="floor">
							<option name="floor[]" value="0">すべて</option>
							<option name="floor[]" value="1">1F</option>
							<option name="floor[]" value="2">2F</option>
							<option name="floor[]" value="3">3F</option>
							<option name="floor[]" value="4">4F</option>
							<option name="floor[]" value="5">5F</option>
							<option name="floor[]" value="6">6F</option>
							<option name="floor[]" value="7">7F</option>
						</select>
						<select class="select_sex" name="sex">
							<option name="sex[]" value="0">すべて</option>
							<option name="sex[]" value="1">男</option>
							<option name="sex[]" value="2">女</option>
							<option name="sex[]" value="3">多目的</option>
						</select>
						<div class="checkbox">
							<label><input type="checkbox" id="japan" name="sort[]" value="wa">和式</label>
							<label><input type="checkbox" id="foreign" name="sort[]" value="yo">洋式</label>
							<label><input type="checkbox" id="foreign" name="sort[]" value="syo">小べん</label>
							<label><input type="checkbox" id="warm" name="sort[]" value="warm">あたたかい</label>
							<label><input type="checkbox" id="song" name="sort[]" value="music">おとひめ</label>
							<label><input type="checkbox" id="wash" name="sort[]" value=wash>ウォシュレット</label></br>
						</div>
						<input type="submit" name="" value="検索">
					</form>
				</div>
				<div id="result">
					<p>hoge</p>
				</div>
			</div>
			<div class="pickup">
				<div class="title">
					<h3><img src="./assets/img/material/ic/pickup.png" width="80pt" height="80pt">PICKUP!</h3>
				</div>
				<div class="pick_contents">
					<div class="content">
						<img src="./assets/img/material/ic/search.png" alt="">
						<h1>本部棟</h1>
					</div>
					<div class="content">
						<img src="./assets/img/material/ic/search.png" alt="">
						<h1>図書館</h1>
					</div>
				</div>
			</div>
			<div class="building_research">
				<div class="title">
					<h3><img src="./assets/img/material/ic/home.png" width="80pt" height="80pt">LIST</h3>
				</div>
				<div class="building_contents">
					<div class="content">
						<img src="./assets/img/material/ic/search.png" alt="">
						<h1>本部棟</h1>
					</div>
					<div class="content">
						<img src="./assets/img/material/ic/search.png" alt="">
						<h1>図書館</h1>
					</div>
					<div class="content">
						<img src="./assets/img/material/ic/search.png" alt="">
						<h1>図書館</h1>
					</div>
					<div class="content">
						<img src="./assets/img/material/ic/search.png" alt="">
						<h1>図書館</h1>
					</div>
					<div class="content">
						<img src="./assets/img/material/ic/search.png" alt="">
						<h1>図書館</h1>
					</div>
					<div class="clear"></div>
					<div class="content">
						<img src="./assets/img/material/ic/search.png" alt="">
						<h1>図書館</h1>
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
	</body>
</html>
