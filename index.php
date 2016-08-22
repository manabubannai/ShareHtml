<?php
require_once( 'vendor/autoload.php' );
use Embed\Embed;
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ShareHtmlを、もっと綺麗にしたメーカー</title>

<!-- OGP設定 -->
<meta property="fb:app_id" content="1054267707987029" />
<meta property="fb:admins" content="100001538665676" />

<meta name="twitter:card" value="summary"/>
<meta name="twitter:site" value="@manabubannai" />
<meta name="twitter:creator" value="@manabubannai" />

<meta name="twitter:title" value="より美しいHTMLをシェアしよう｜ShareHtmlを、もっと綺麗にしたメーカー"/>
<meta name="twitter:description" value="ブログ記事内で他サイトリンクをサムネイル（アイキャッチ画像）付きで表示するためのブログパーツです。デザインが洗練されているツールがなかったので作りました。より美しいHTMLをシェアできる、ShareHtmlを、もっと綺麗にしたメーカーです。"/>

<meta property="og:site_name" content="より美しいHTMLをシェアしよう｜ShareHtmlを、もっと綺麗にしたメーカー" />
<meta property="og:description" content="ブログ記事内で他サイトリンクをサムネイル（アイキャッチ画像）付きで表示するためのブログパーツです。デザインが洗練されているツールがなかったので作りました。より美しいHTMLをシェアできる、ShareHtmlを、もっと綺麗にしたメーカーです。" />

<meta property="og:type" content="website" />
<meta property="og:image" content="ogp.png" />
<meta name="twitter:image" value="ogp.png" />
<!-- /OGP設定 -->

<!-- メタ設定 -->
<meta name="description" itemprop="description" content="ブログ記事内で他サイトリンクをサムネイル（アイキャッチ画像）付きで表示するためのブログパーツです。デザインが洗練されているツールがなかったので作りました。より美しいHTMLをシェアできる、ShareHtmlを、もっと綺麗にしたメーカーです。" />
<!-- /メタ設定 -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css" type="text/css"/>
<link rel="stylesheet" href="sharehtml.css" type="text/css"/>
</head>
<body>

<section>
<article>

<div class="container header">
	<div class="row">
		<div class="col-xs-12 text-center">
			<p>より美しいHTMLを<span class="sp-br">シェアしよう</span></p>
			<h1>ShareHtmlを、もっと綺麗にしたメーカー</h1>
			<div  class="col-xs-12 col-sm-6 col-sm-offset-3">
				<form method="get" accept-charset="utf-8">
					<input type="text" name="url" placeholder="ここにURLを入力するだけ。入力例：https://www.google.co.jp/"  class="form-control">
				</form>
			</div>
		</div>
	</div>
</div>


<?php
if ($_GET) {

	echo "<hr />";

	// URLを取得
	$url =  $_GET["url"];

	//Load any url:
	$info = Embed::create($url);

	//Get content info
	$title = $info->title; //The page title
	$description = $info->description; //The page description

	if ( !empty($info->images[0]['value']) ) {
		$thumb = $info->images[0]['value'];
	} elseif ( !empty($info->images[1]['value']) ) {
		$thumb = $info->images[1]['value'];
	} elseif ( !empty($info->images[2]['value']) ) {
		$thumb = $info->images[2]['value'];
	} else {
		// capture.heartrails.comのAPIを利用
		// Embedで画像が取れなかった場合のため。
		$thumb = "http://capture.heartrails.com/huge?".$info;
	} ?>

	<div class="container main">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2">

				<h2 class="bold"># プレビュー</h2>
				<a href="<?php echo $url; ?>" style="text-decoration: none;" target="new">
				<div class="link-box">
					<div class="img-box">
						<div style="background-image: url('<?php echo $thumb; ?>');">
						</div>
					</div>
					<div class="text-box">
						<p class="title"><?php echo $title; ?></p>
						<p class="description"><?php echo $description; ?></p>
					</div>
				</div>
				</a>

				<h2 class="bold"># HTMLコード</h2>
				<pre><textarea id="text01">&lt;a href="<?php echo $url; ?>" style="text-decoration: none;"&gt;&lt;div class="link-box"&gt;&lt;div class="img-box"&gt;&lt;div style="background-image: url('<?php echo $thumb; ?>');"&gt;&lt;/div&gt;&lt;/div&gt;&lt;div class="text-box"&gt;&lt;p class="title"&gt;<?php echo $title; ?>&lt;/p&gt;&lt;p class="description"&gt;<?php echo $description; ?>&lt;/p&gt;&lt;/div&gt;&lt;/div&gt;&lt;/a&gt;</textarea></pre>

				<h2 class="bold"># CSSコード</h2>
				<pre><textarea id="text02">.link-box{border:1px solid #e1e1e1;padding:10px;display:flex;margin:30px}.link-box:hover{background-color:#f3f3f3;-webkit-transition:background-color .35s;transition:background-color .35s}.img-box{width:25%;float:left}.img-box div{min-height:170px;background-size:cover;background-position:center center}.text-box{width:75%;float:left;padding-left:20px;line-height:1.7;margin:0}.text-box .title{font-size:18px;font-weight:600;color:#428bca;padding:0;margin:0}.text-box .description{font-size:15px;color:#333;padding:0}@media only screen and (max-width:479px){.img-box div{min-height:80px}.text-box{margin-left:10px;line-height:1.5}.text-box .title{font-size:13px;margin:0}.text-box .description{font-size:11px;margin-top:5px}}</textarea></pre>

			</div>
		</div>
	</div>

<?php
} // End of if
?>

</article>
</section>


<footer>
<p class="col-xs-12 text-center">© 2016 <a href="http://manablog.org/" target="new">Manabu Bannai</a>. All rights reserved.</p>
</footer>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#text01').focus(function(){
			$(this).select();
		});
		$('#text02').focus(function(){
			$(this).select();
		});
	});
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-82820190-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>