<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>ToiletBooks | トイレ検索アプリケーション</title>
		<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0-beta3.js"></script>
		<script type="text/javascript" src="./assets/js/checkbox.js"></script>
		<link rel="stylesheet" href="./assets/css/reset.css">
		<link rel="stylesheet" href="./assets/css/style.css" />
		<script>
			// 絞り込みに使うタグ（class）を記述してください。数の上限下限はありません。
			var $chkbxFilter_tags =['japan','foreign','warm','song','wash'];

			// 絞り込み対象の要素のHTMLタグを指定してください。（div、section、tr など）
			var $chkbxFilter_blocks = ['section']
		</script>
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
			</div>
			<div class="research">
				<div class="title">
					<h3><img src="./assets/img/material/ic/search.png" width="80pt" height="80pt">SEARCH</h3>
				</div>
				<select class="select_locate" name="locate">
					<option value="all">すべて</option>
					<option value="a">本部棟</option>
					<option value="b">図書館</option>
				</select>
				<select class="select_floor" name="floor">
					<option value="0">すべて</option>
					<option value="1">1F</option>
					<option value="2">2F</option>
					<option value="3">3F</option>
					<option value="4">4F</option>
					<option value="5">5F</option>
					<option value="6">6F</option>
					<option value="7">7F</option>
				</select>
				<select class="select_sex" name="sex">
					<option value="0">すべて</option>
					<option value="1">男</option>
					<option value="2">女</option>
					<option value="3">多目的</option>
				</select>
				<div id="checkbox">
					<form method = "get" name="deta" action="search.php">
						<label><input type="checkbox" id="japan" name="sort[]" value="japan">和式</label>
						<label><input type="checkbox" id="foreign" name="sort[]" value="foreign">洋式</label><br>
						<label><input type="checkbox" id="warm" name="sort[]" value="warm">あたたかい</label>
						<label><input type="checkbox" id="song" name="sort[]" value="song">おとひめ</label><br>
						<label><input type="checkbox" id="wash" name="sort[]" value=wash>ウォシュレット</label></br>
						<span><input type="submit" value="検索する" /></span>
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
			<div class="footer">

			</div>
		</div>
	</body>
</html>
