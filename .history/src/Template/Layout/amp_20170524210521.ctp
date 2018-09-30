<!doctype html>
<html amp lang="es">
  <head>
    <meta charset="utf-8">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <title><?php echo $tituloH1; ?></title>
	<?php if (isset($videoAmp)) { ?>
    	<link rel="canonical" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/videos/misterio/<?php echo $video->slug_titulo; ?>" />
		<script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
		<script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
	<?php } ?>
	<?php if (isset($categoriaAmp)) { ?>
    	<link rel="canonical" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/categoria/index/<?php echo $categoriaAlias; ?>" />
	<?php } ?>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
	<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
    <?php if (isset($jsonld)) { ?>
        <?php echo $jsonld; ?>
    <?php } ?>
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    <style amp-custom>
/* Reset */
	html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
		margin: 0;
		padding: 0;
		border: 0;
		font-size: 100%;
		font: inherit;
		vertical-align: baseline;
	}

	article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {
		display: block;
	}

	body {
		line-height: 1;
	}

	ol, ul {
		list-style: none;
	}

	blockquote, q {
		quotes: none;
	}

	blockquote:before, blockquote:after, q:before, q:after {
		content: '';
		content: none;
	}

	table {
		border-collapse: collapse;
		border-spacing: 0;
	}

	body {
		-webkit-text-size-adjust: none;
	}

/* Box Model */

	*, *:before, *:after {
		-moz-box-sizing: border-box;
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
	}

/* Containers */

	.container {
		margin-left: auto;
		margin-right: auto;
	}

	.container.\31 25\25 {
		width: 100%;
		max-width: 1200px;
		min-width: 960px;
	}

	.container.\37 5\25 {
		width: 720px;
	}

	.container.\35 0\25 {
		width: 480px;
	}

	.container.\32 5\25 {
		width: 240px;
	}

	.container {
		width: 960px;
	}

	@media screen and (min-width: 737px) {
		.fb-share-button {
			color: rgb(255, 255, 255);
			font-family: arial;
			font-size: 12px;
			font-weight: 900;
			box-sizing: border-box;
			padding: 5px;
			min-width: 50px;
			margin-top: -15px;
			display: inline-block;
			position: relative;
			clear: both;
			float: left;
		}
		.fb-like {
			color: rgb(255, 255, 255);
			font-family: arial;
			font-size: 12px;
			font-weight: 900;
			box-sizing: border-box;
			padding: 5px;
			min-width: 50px;
			margin-top: -15px;
			display: inline-block;
			position: relative;
			clear: both;
			float: left;
		}

		/* Iframe youtube*/
		.iframeYoutube{
			width: 100%;
			height:500px;
		}

		.container.\31 25\25 {
			width: 100%;
			max-width: 1500px;
			min-width: 1200px;
		}

		.container.\37 5\25 {
			width: 900px;
		}

		.container.\35 0\25 {
			width: 600px;
		}

		.container.\32 5\25 {
			width: 300px;
		}

		.container {
			width: 1200px;
		}

	}

	@media screen and (min-width: 737px) and (max-width: 1200px) {

		.container.\31 25\25 {
			width: 100%;
			max-width: 1250px;
			min-width: 1000px;
		}

		.container.\37 5\25 {
			width: 750px;
		}

		.container.\35 0\25 {
			width: 500px;
		}

		.container.\32 5\25 {
			width: 250px;
		}

		.container {
			width: 1000px;
		}
		/* quitamos el botón de ver video en esta resolución */
		.button-big-video-principal {
			display:none;
		}

	}

	@media screen and (max-width: 736px) {

		.fb-share-button {
			color: rgb(255, 255, 255);
			font-family: arial;
			font-size: 12px;
			font-weight: 900;
			box-sizing: border-box;
			padding: 5px;
			min-width: 50px;
			margin-top: -9px;
			display: inline-block;
			position: relative;
			clear: both;
			float: left;
		}

		.fb-like {
			color: rgb(255, 255, 255);
			font-family: arial;
			font-size: 12px;
			font-weight: 900;
			box-sizing: border-box;
			padding: 5px;
			min-width: 50px;
			margin-top: -9px;
			display: inline-block;
			position: relative;
			clear: both;
			float: left;
		}


		/* Iframe youtube*/
		.iframeYoutube{
			width: 100%;
			height:250px;
		}
		/* no aparece bloque anuncios en movil */
		/*.publicidad-movil-columna-derecha {
			display:none;
		}*/

		.container.\31 25\25 {
			width: 100%;
			max-width: 125%;
			min-width: 100%;
		}

		.container.\37 5\25 {
			width: 75%;
		}

		.container.\35 0\25 {
			width: 50%;
		}

		.container.\32 5\25 {
			width: 25%;
		}

		.container {
			width: 100%;
		}

	}

/* Grid */

	.row {
		border-bottom: solid 1px transparent;
		-moz-box-sizing: border-box;
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
	}

	.row > * {
		float: left;
		-moz-box-sizing: border-box;
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
	}

	.row:after, .row:before {
		content: '';
		display: block;
		clear: both;
		height: 0;
	}

	.row.uniform > * > :first-child {
		margin-top: 0;
	}

	.row.uniform > * > :last-child {
		margin-bottom: 0;
	}

	.row.\30 \25 > * {
		padding: 0 0 0 0px;
	}

	.row.\30 \25 {
		margin: 0 0 -1px 0px;
	}

	.row.uniform.\30 \25 > * {
		padding: 0px 0 0 0px;
	}

	.row.uniform.\30 \25 {
		margin: 0px 0 -1px 0px;
	}

	.row > * {
		padding: 0 0 0 40px;
	}

	.row {
		margin: 0 0 -1px -40px;
	}

	.row.uniform > * {
		padding: 40px 0 0 40px;
	}

	.row.uniform {
		margin: -40px 0 -1px -40px;
	}

	.row.\32 00\25 > * {
		padding: 0 0 0 80px;
	}

	.row.\32 00\25 {
		margin: 0 0 -1px -80px;
	}

	.row.uniform.\32 00\25 > * {
		padding: 80px 0 0 80px;
	}

	.row.uniform.\32 00\25 {
		margin: -80px 0 -1px -80px;
	}

	.row.\31 50\25 > * {
		padding: 0 0 0 60px;
	}

	.row.\31 50\25 {
		margin: 0 0 -1px -60px;
	}

	.row.uniform.\31 50\25 > * {
		padding: 60px 0 0 60px;
	}

	.row.uniform.\31 50\25 {
		margin: -60px 0 -1px -60px;
	}

	.row.\35 0\25 > * {
		padding: 0 0 0 20px;
	}

	.row.\35 0\25 {
		margin: 0 0 -1px -20px;
	}

	.row.uniform.\35 0\25 > * {
		padding: 20px 0 0 20px;
	}

	.row.uniform.\35 0\25 {
		margin: -20px 0 -1px -20px;
	}

	.row.\32 5\25 > * {
		padding: 0 0 0 10px;
	}

	.row.\32 5\25 {
		margin: 0 0 -1px -10px;
	}

	.row.uniform.\32 5\25 > * {
		padding: 10px 0 0 10px;
	}

	.row.uniform.\32 5\25 {
		margin: -10px 0 -1px -10px;
	}

	.\31 2u, .\31 2u\24 {
		width: 100%;
		clear: none;
		margin-left: 0;
	}

	.\31 1u, .\31 1u\24 {
		width: 91.6666666667%;
		clear: none;
		margin-left: 0;
	}

	.\31 0u, .\31 0u\24 {
		width: 83.3333333333%;
		clear: none;
		margin-left: 0;
	}

	.\39 u, .\39 u\24 {
		width: 75%;
		clear: none;
		margin-left: 0;
	}

	.\38 u, .\38 u\24 {
		width: 66.6666666667%;
		clear: none;
		margin-left: 0;
	}

	.\37 u, .\37 u\24 {
		width: 58.3333333333%;
		clear: none;
		margin-left: 0;
	}

	.\36 u, .\36 u\24 {
		width: 50%;
		clear: none;
		margin-left: 0;
	}

	.\35 u, .\35 u\24 {
		width: 41.6666666667%;
		clear: none;
		margin-left: 0;
	}

	.\34 u, .\34 u\24 {
		width: 33.3333333333%;
		clear: none;
		margin-left: 0;
	}

	.\33 u, .\33 u\24 {
		width: 25%;
		clear: none;
		margin-left: 0;
	}

	.\32 u, .\32 u\24 {
		width: 16.6666666667%;
		clear: none;
		margin-left: 0;
	}

	.\31 u, .\31 u\24 {
		width: 8.3333333333%;
		clear: none;
		margin-left: 0;
	}

	.\31 2u\24 + *,
	.\31 1u\24 + *,
	.\31 0u\24 + *,
	.\39 u\24 + *,
	.\38 u\24 + *,
	.\37 u\24 + *,
	.\36 u\24 + *,
	.\35 u\24 + *,
	.\34 u\24 + *,
	.\33 u\24 + *,
	.\32 u\24 + *,
	.\31 u\24 + * {
		clear: left;
	}

	.\-11u {
		margin-left: 91.66667%;
	}

	.\-10u {
		margin-left: 83.33333%;
	}

	.\-9u {
		margin-left: 75%;
	}

	.\-8u {
		margin-left: 66.66667%;
	}

	.\-7u {
		margin-left: 58.33333%;
	}

	.\-6u {
		margin-left: 50%;
	}

	.\-5u {
		margin-left: 41.66667%;
	}

	.\-4u {
		margin-left: 33.33333%;
	}

	.\-3u {
		margin-left: 25%;
	}

	.\-2u {
		margin-left: 16.66667%;
	}

	.\-1u {
		margin-left: 8.33333%;
	}

	@media screen and (min-width: 737px) {

		.row > * {
			padding: 25px 0 0 25px;
		}

		.row {
			margin: -25px 0 -1px -25px;
		}

		.row.uniform > * {
			padding: 25px 0 0 25px;
		}

		.row.uniform {
			margin: -25px 0 -1px -25px;
		}

		.row.\32 00\25 > * {
			padding: 50px 0 0 50px;
		}

		.row.\32 00\25 {
			margin: -50px 0 -1px -50px;
		}

		.row.uniform.\32 00\25 > * {
			padding: 50px 0 0 50px;
		}

		.row.uniform.\32 00\25 {
			margin: -50px 0 -1px -50px;
		}

		.row.\31 50\25 > * {
			padding: 37.5px 0 0 37.5px;
		}

		.row.\31 50\25 {
			margin: -37.5px 0 -1px -37.5px;
		}

		.row.uniform.\31 50\25 > * {
			padding: 37.5px 0 0 37.5px;
		}

		.row.uniform.\31 50\25 {
			margin: -37.5px 0 -1px -37.5px;
		}

		.row.\35 0\25 > * {
			padding: 12.5px 0 0 12.5px;
		}

		.row.\35 0\25 {
			margin: -12.5px 0 -1px -12.5px;
		}

		.row.uniform.\35 0\25 > * {
			padding: 12.5px 0 0 12.5px;
		}

		.row.uniform.\35 0\25 {
			margin: -12.5px 0 -1px -12.5px;
		}

		.row.\32 5\25 > * {
			padding: 6.25px 0 0 6.25px;
		}

		.row.\32 5\25 {
			margin: -6.25px 0 -1px -6.25px;
		}

		.row.uniform.\32 5\25 > * {
			padding: 6.25px 0 0 6.25px;
		}

		.row.uniform.\32 5\25 {
			margin: -6.25px 0 -1px -6.25px;
		}

		.\31 2u\28desktop\29, .\31 2u\24\28desktop\29 {
			width: 100%;
			clear: none;
			margin-left: 0;
		}

		.\31 1u\28desktop\29, .\31 1u\24\28desktop\29 {
			width: 91.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\31 0u\28desktop\29, .\31 0u\24\28desktop\29 {
			width: 83.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\39 u\28desktop\29, .\39 u\24\28desktop\29 {
			width: 75%;
			clear: none;
			margin-left: 0;
		}

		.\38 u\28desktop\29, .\38 u\24\28desktop\29 {
			width: 66.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\37 u\28desktop\29, .\37 u\24\28desktop\29 {
			width: 58.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\36 u\28desktop\29, .\36 u\24\28desktop\29 {
			width: 50%;
			clear: none;
			margin-left: 0;
		}

		.\35 u\28desktop\29, .\35 u\24\28desktop\29 {
			width: 41.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\34 u\28desktop\29, .\34 u\24\28desktop\29 {
			width: 33.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\33 u\28desktop\29, .\33 u\24\28desktop\29 {
			width: 25%;
			clear: none;
			margin-left: 0;
		}

		.\32 u\28desktop\29, .\32 u\24\28desktop\29 {
			width: 16.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\31 u\28desktop\29, .\31 u\24\28desktop\29 {
			width: 8.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\31 2u\24\28desktop\29 + *,
		.\31 1u\24\28desktop\29 + *,
		.\31 0u\24\28desktop\29 + *,
		.\39 u\24\28desktop\29 + *,
		.\38 u\24\28desktop\29 + *,
		.\37 u\24\28desktop\29 + *,
		.\36 u\24\28desktop\29 + *,
		.\35 u\24\28desktop\29 + *,
		.\34 u\24\28desktop\29 + *,
		.\33 u\24\28desktop\29 + *,
		.\32 u\24\28desktop\29 + *,
		.\31 u\24\28desktop\29 + * {
			clear: left;
		}

		.\-11u\28desktop\29 {
			margin-left: 91.66667%;
		}

		.\-10u\28desktop\29 {
			margin-left: 83.33333%;
		}

		.\-9u\28desktop\29 {
			margin-left: 75%;
		}

		.\-8u\28desktop\29 {
			margin-left: 66.66667%;
		}

		.\-7u\28desktop\29 {
			margin-left: 58.33333%;
		}

		.\-6u\28desktop\29 {
			margin-left: 50%;
		}

		.\-5u\28desktop\29 {
			margin-left: 41.66667%;
		}

		.\-4u\28desktop\29 {
			margin-left: 33.33333%;
		}

		.\-3u\28desktop\29 {
			margin-left: 25%;
		}

		.\-2u\28desktop\29 {
			margin-left: 16.66667%;
		}

		.\-1u\28desktop\29 {
			margin-left: 8.33333%;
		}

	}

	@media screen and (min-width: 737px) and (max-width: 1200px) {

		.row > * {
			padding: 20px 0 0 20px;
		}

		.row {
			margin: -20px 0 -1px -20px;
		}

		.row.uniform > * {
			padding: 20px 0 0 20px;
		}

		.row.uniform {
			margin: -20px 0 -1px -20px;
		}

		.row.\32 00\25 > * {
			padding: 40px 0 0 40px;
		}

		.row.\32 00\25 {
			margin: -40px 0 -1px -40px;
		}

		.row.uniform.\32 00\25 > * {
			padding: 40px 0 0 40px;
		}

		.row.uniform.\32 00\25 {
			margin: -40px 0 -1px -40px;
		}

		.row.\31 50\25 > * {
			padding: 30px 0 0 30px;
		}

		.row.\31 50\25 {
			margin: -30px 0 -1px -30px;
		}

		.row.uniform.\31 50\25 > * {
			padding: 30px 0 0 30px;
		}

		.row.uniform.\31 50\25 {
			margin: -30px 0 -1px -30px;
		}

		.row.\35 0\25 > * {
			padding: 10px 0 0 10px;
		}

		.row.\35 0\25 {
			margin: -10px 0 -1px -10px;
		}

		.row.uniform.\35 0\25 > * {
			padding: 10px 0 0 10px;
		}

		.row.uniform.\35 0\25 {
			margin: -10px 0 -1px -10px;
		}

		.row.\32 5\25 > * {
			padding: 5px 0 0 5px;
		}

		.row.\32 5\25 {
			margin: -5px 0 -1px -5px;
		}

		.row.uniform.\32 5\25 > * {
			padding: 5px 0 0 5px;
		}

		.row.uniform.\32 5\25 {
			margin: -5px 0 -1px -5px;
		}

		.\31 2u\28tablet\29, .\31 2u\24\28tablet\29 {
			width: 100%;
			clear: none;
			margin-left: 0;
		}

		.\31 1u\28tablet\29, .\31 1u\24\28tablet\29 {
			width: 91.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\31 0u\28tablet\29, .\31 0u\24\28tablet\29 {
			width: 83.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\39 u\28tablet\29, .\39 u\24\28tablet\29 {
			width: 75%;
			clear: none;
			margin-left: 0;
		}

		.\38 u\28tablet\29, .\38 u\24\28tablet\29 {
			width: 66.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\37 u\28tablet\29, .\37 u\24\28tablet\29 {
			width: 58.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\36 u\28tablet\29, .\36 u\24\28tablet\29 {
			width: 50%;
			clear: none;
			margin-left: 0;
		}

		.\35 u\28tablet\29, .\35 u\24\28tablet\29 {
			width: 41.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\34 u\28tablet\29, .\34 u\24\28tablet\29 {
			width: 33.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\33 u\28tablet\29, .\33 u\24\28tablet\29 {
			width: 25%;
			clear: none;
			margin-left: 0;
		}

		.\32 u\28tablet\29, .\32 u\24\28tablet\29 {
			width: 16.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\31 u\28tablet\29, .\31 u\24\28tablet\29 {
			width: 8.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\31 2u\24\28tablet\29 + *,
		.\31 1u\24\28tablet\29 + *,
		.\31 0u\24\28tablet\29 + *,
		.\39 u\24\28tablet\29 + *,
		.\38 u\24\28tablet\29 + *,
		.\37 u\24\28tablet\29 + *,
		.\36 u\24\28tablet\29 + *,
		.\35 u\24\28tablet\29 + *,
		.\34 u\24\28tablet\29 + *,
		.\33 u\24\28tablet\29 + *,
		.\32 u\24\28tablet\29 + *,
		.\31 u\24\28tablet\29 + * {
			clear: left;
		}

		.\-11u\28tablet\29 {
			margin-left: 91.66667%;
		}

		.\-10u\28tablet\29 {
			margin-left: 83.33333%;
		}

		.\-9u\28tablet\29 {
			margin-left: 75%;
		}

		.\-8u\28tablet\29 {
			margin-left: 66.66667%;
		}

		.\-7u\28tablet\29 {
			margin-left: 58.33333%;
		}

		.\-6u\28tablet\29 {
			margin-left: 50%;
		}

		.\-5u\28tablet\29 {
			margin-left: 41.66667%;
		}

		.\-4u\28tablet\29 {
			margin-left: 33.33333%;
		}

		.\-3u\28tablet\29 {
			margin-left: 25%;
		}

		.\-2u\28tablet\29 {
			margin-left: 16.66667%;
		}

		.\-1u\28tablet\29 {
			margin-left: 8.33333%;
		}

	}

	@media screen and (max-width: 736px) {

		.row > * {
			padding: 20px 0 0 20px;
		}

		.row {
			margin: -20px 0 -1px -20px;
		}

		.row.uniform > * {
			padding: 20px 0 0 20px;
		}

		.row.uniform {
			margin: -20px 0 -1px -20px;
		}

		.row.\32 00\25 > * {
			padding: 40px 0 0 40px;
		}

		.row.\32 00\25 {
			margin: -40px 0 -1px -40px;
		}

		.row.uniform.\32 00\25 > * {
			padding: 40px 0 0 40px;
		}

		.row.uniform.\32 00\25 {
			margin: -40px 0 -1px -40px;
		}

		.row.\31 50\25 > * {
			padding: 30px 0 0 30px;
		}

		.row.\31 50\25 {
			margin: -30px 0 -1px -30px;
		}

		.row.uniform.\31 50\25 > * {
			padding: 30px 0 0 30px;
		}

		.row.uniform.\31 50\25 {
			margin: -30px 0 -1px -30px;
		}

		.row.\35 0\25 > * {
			padding: 10px 0 0 10px;
		}

		.row.\35 0\25 {
			margin: -10px 0 -1px -10px;
		}

		.row.uniform.\35 0\25 > * {
			padding: 10px 0 0 10px;
		}

		.row.uniform.\35 0\25 {
			margin: -10px 0 -1px -10px;
		}

		.row.\32 5\25 > * {
			padding: 5px 0 0 5px;
		}

		.row.\32 5\25 {
			margin: -5px 0 -1px -5px;
		}

		.row.uniform.\32 5\25 > * {
			padding: 5px 0 0 5px;
		}

		.row.uniform.\32 5\25 {
			margin: -5px 0 -1px -5px;
		}

		.\31 2u\28mobile\29, .\31 2u\24\28mobile\29 {
			width: 100%;
			clear: none;
			margin-left: 0;
		}

		.\31 1u\28mobile\29, .\31 1u\24\28mobile\29 {
			width: 91.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\31 0u\28mobile\29, .\31 0u\24\28mobile\29 {
			width: 83.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\39 u\28mobile\29, .\39 u\24\28mobile\29 {
			width: 75%;
			clear: none;
			margin-left: 0;
		}

		.\38 u\28mobile\29, .\38 u\24\28mobile\29 {
			width: 66.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\37 u\28mobile\29, .\37 u\24\28mobile\29 {
			width: 58.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\36 u\28mobile\29, .\36 u\24\28mobile\29 {
			width: 50%;
			clear: none;
			margin-left: 0;
		}

		.\35 u\28mobile\29, .\35 u\24\28mobile\29 {
			width: 41.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\34 u\28mobile\29, .\34 u\24\28mobile\29 {
			width: 33.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\33 u\28mobile\29, .\33 u\24\28mobile\29 {
			width: 25%;
			clear: none;
			margin-left: 0;
		}

		.\32 u\28mobile\29, .\32 u\24\28mobile\29 {
			width: 16.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\31 u\28mobile\29, .\31 u\24\28mobile\29 {
			width: 8.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\31 2u\24\28mobile\29 + *,
		.\31 1u\24\28mobile\29 + *,
		.\31 0u\24\28mobile\29 + *,
		.\39 u\24\28mobile\29 + *,
		.\38 u\24\28mobile\29 + *,
		.\37 u\24\28mobile\29 + *,
		.\36 u\24\28mobile\29 + *,
		.\35 u\24\28mobile\29 + *,
		.\34 u\24\28mobile\29 + *,
		.\33 u\24\28mobile\29 + *,
		.\32 u\24\28mobile\29 + *,
		.\31 u\24\28mobile\29 + * {
			clear: left;
		}

		.\-11u\28mobile\29 {
			margin-left: 91.66667%;
		}

		.\-10u\28mobile\29 {
			margin-left: 83.33333%;
		}

		.\-9u\28mobile\29 {
			margin-left: 75%;
		}

		.\-8u\28mobile\29 {
			margin-left: 66.66667%;
		}

		.\-7u\28mobile\29 {
			margin-left: 58.33333%;
		}

		.\-6u\28mobile\29 {
			margin-left: 50%;
		}

		.\-5u\28mobile\29 {
			margin-left: 41.66667%;
		}

		.\-4u\28mobile\29 {
			margin-left: 33.33333%;
		}

		.\-3u\28mobile\29 {
			margin-left: 25%;
		}

		.\-2u\28mobile\29 {
			margin-left: 16.66667%;
		}

		.\-1u\28mobile\29 {
			margin-left: 8.33333%;
		}

	}

/* Basic */

	body {
		background: #D4D9DD url("images/bg03.jpg");
		color: #474f51;
		font-size: 13.5pt;
		font-family: 'Yanone Kaffeesatz';
		line-height: 1.85em;
		font-weight: 300;
	}

	input, textarea, select {
		color: #474f51;
		font-size: 13.5pt;
		font-family: 'Yanone Kaffeesatz';
		line-height: 1.85em;
		font-weight: 300;
	}

	ul, ol, p, dl {
		margin: 0 0 2em 0;
	}

	a {
		text-decoration: underline;
	}

		a:hover {
			text-decoration: none;
		}

	section > :last-child,
	.last-child {
		margin-bottom: 0;
	}

/* Multi-use */

	.link-list li {
		padding: 0.2em 0 0.2em 0;
	}

		.link-list li:first-child {
			padding-top: 0;
			border-top: 0;
		}

		.link-list li:last-child {
			padding-bottom: 0;
			border-bottom: 0;
		}

	.quote-list li {
		padding: 1em 0 1em 0;
		overflow: hidden;
	}

		.quote-list li:first-child {
			padding-top: 0;
			border-top: 0;
		}

		.quote-list li:last-child {
			padding-bottom: 0;
			border-bottom: 0;
		}

		.quote-list li img {
			float: left;
		}

		.quote-list li p {
			margin: 0 0 0 90px;
			font-size: 1.2em;
			font-style: italic;
		}

		.quote-list li span {
			display: block;
			margin-left: 90px;
			font-size: 0.9em;
			font-weight: 400;
		}

	.check-list li {
		padding: 0.7em 0 0.7em 45px;
		font-size: 1.2em;
		background: url("images/icon-checkmark.png") 0px 1.05em no-repeat;
	}

		.check-list li:first-child {
			padding-top: 0;
			border-top: 0;
			background-position: 0 0.3em;
		}

		.check-list li:last-child {
			padding-bottom: 0;
			border-bottom: 0;
		}

	.feature-image {
		display: block;
		margin: 0 0 2em 0;
		outline: 0;
	}

		.feature-image img {
			display: block;
			width: 100%;
		}

	.bordered-feature-image {
		display: block;
		background: #fff url("images/bg04.png");
		padding: 5px;
		box-shadow: 3px 3px 3px 1px rgba(0, 0, 0, 0.15);
		margin: 0 0 1.5em 0;
		outline: 0;
	}

		.bordered-feature-image img {
			display: block;
			width: 100%;
		}

	.button-big {
		background-image: -moz-linear-gradient(top, #ed391b, #ce1a00);
		background-image: -webkit-linear-gradient(top, #ed391b, #ce1a00);
		background-image: -ms-linear-gradient(top, #ed391b, #ce1a00);
		background-image: linear-gradient(top, #ed391b, #ce1a00);
		display: inline-block;
		background-color: #ed391b;
		color: #fff;
		text-decoration: none;
		font-size: 1.75em;
		font-weight: 300;
		padding: 15px 45px 15px 45px;
		outline: 0;
		border-radius: 10px;
		box-shadow: inset 0px 0px 0px 1px rgba(0, 0, 0, 0.75), inset 0px 2px 0px 0px rgba(255, 192, 192, 0.5), inset 0px 0px 0px 2px rgba(255, 96, 96, 0.85), 3px 3px 3px 1px rgba(0, 0, 0, 0.15);
		text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.5);
		cursor: pointer;
	}

		.button-big:hover {
			background-image: -moz-linear-gradient(top, #fd492b, #de2a10);
			background-image: -webkit-linear-gradient(top, #fd492b, #de2a10);
			background-image: -ms-linear-gradient(top, #fd492b, #de2a10);
			background-image: linear-gradient(top, #fd492b, #de2a10);
			background-color: #fd492b;
			box-shadow: inset 0px 0px 0px 1px rgba(0, 0, 0, 0.75), inset 0px 2px 0px 0px rgba(255, 192, 192, 0.5), inset 0px 0px 0px 2px rgba(255, 96, 96, 0.85), 3px 3px 3px 1px rgba(0, 0, 0, 0.15);
		}

		.button-big:active {
			background-image: -moz-linear-gradient(top, #ce1a00, #ed391b);
			background-image: -webkit-linear-gradient(top, #ce1a00, #ed391b);
			background-image: -ms-linear-gradient(top, #ce1a00, #ed391b);
			background-image: linear-gradient(top, #ce1a00, #ed391b);
			background-color: #ce1a00;
			box-shadow: inset 0px 0px 0px 1px rgba(0, 0, 0, 0.75), inset 0px 2px 0px 0px rgba(255, 192, 192, 0.5), inset 0px 0px 0px 2px rgba(255, 96, 96, 0.85), 3px 3px 3px 1px rgba(0, 0, 0, 0.15);
		}

/* Content */

	#content .quote-list li {
		border-bottom: solid 1px #e2e6e8;
	}

	#content .link-list li {
		border-bottom: solid 1px #e2e6e8;
	}

	#content .check-list li {
		border-bottom: solid 1px #e2e6e8;
	}

/* Footer */

	#footer .quote-list li {
		border-top: solid 1px #e0e4e6;
		border-bottom: solid 1px #b5bec3;
	}

	#footer .link-list li {
		border-top: solid 1px #e0e4e6;
		border-bottom: solid 1px #b5bec3;
	}

	#footer .check-list li {
		border-top: solid 1px #e0e4e6;
		border-bottom: solid 1px #b5bec3;
	}

/* Desktop */

	@media screen and (min-width: 737px) {

		/* Basic */

			body {
				min-width: 1200px;
			}

			section:last-child {
				margin-bottom: 0;
			}

		/* Wrappers */

			#header-wrapper {
				background: #3B4346 url("images/bg01.jpg");
				border-bottom: solid 1px #272d30;
				box-shadow: inset 0px -1px 0px 0px #51575a;
				text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.75);
			}

			.subpage #header-wrapper {
				height: 155px;
			}

			#features-wrapper {
				background: #353D40 url("images/bg02.jpg");
				border-bottom: solid 1px #272e31;
				/*padding: 45px 0 45px 0;*/
				text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.75);
			}

			#content-wrapper {
				background: #f7f7f7 url("images/bg04.png");
				border-top: solid 1px #fff;
				padding: 45px 0 45px 0;
			}

			#footer-wrapper {
				padding: 45px 0 45px 0;
				text-shadow: 1px 1px 1px white;
			}

		/* Header */

			#header {
				min-height: 130px;
				position: relative;
			}

				#header h1 {
					position: absolute;
					left: 0;
					bottom: 35px;
					font-size: 2.75em;
				}

					#header h1 a {
						color: #fff;
						text-decoration: none;
					}

				#header nav {
					position: absolute;
					right: 0;
					bottom: 35px;
					font-weight: 200;
				}

					#header nav a {
						color: #c6c8c8;
						text-decoration: none;
						font-size: 1.4em;
						margin-left: 60px;
						outline: 0;
					}

						#header nav a:hover {
							color: #f6f8f8;
						}

		/* Banner */

			#banner {
				border-top: solid 1px #222628;
				box-shadow: inset 0px 1px 0px 0px #3e484a;
				padding: 35px 0 35px 0;
				color: #fff;
			}

				#banner .bordered-feature-image {
					margin-bottom: 0;
				}

				#banner p {
					font-size: 1.5em;
					font-weight: 200;
					line-height: 1.25em;
					padding-right: 1em;
					margin: 0 0 1em 0;
				}

		/* Features */

			#features {
				color: #a0a8ab;
			}

				#features h2 {
					font-size: 1.25em;
					color: #fff;
					margin: 0 0 0.25em 0;
				}

				#features a {
					color: #e0e8eb;
				}

				#features strong {
					color: #fff;
				}

		/* Content */

			#content section {
				background: #fff;
				padding: 10px 20px 45px 30px;
				box-shadow: 2px 2px 2px 1px rgba(128, 128, 128, 0.1);
				margin: 0 0 10% 0;
			}

			#content h2 {
				font-size: 1.2em;
				color: #373f42;
				margin: 0 0 0.25em 0;
			}

			#content h3 {
				color: #96a9b5;
				font-size: 1.25em;
			}

			#content a {
				color: #ED391B;
			}

			#content header {
				margin: 0 0 2em 0;
			}

		/* Footer */

			#footer {
				color: #546b76;
				text-shadow: 1px 1px 0px rgba(255, 255, 255, 0.5);
			}

				#footer h2 {
					font-size: 1.25em;
					color: #212f35;
					margin: 0 0 1em 0;
				}

				#footer a {
					color: #546b76;
				}

		/* Copyright */

			#copyright {
				border-top: solid 1px #b5bec3;
				box-shadow: inset 0px 1px 0px 0px #e0e4e7;
				text-align: center;
				padding: 45px 0 80px 0;
				color: #8d9ca3;
				text-shadow: 1px 1px 0px rgba(255, 255, 255, 0.5);
			}

				#copyright a {
					color: #8d9ca3;
				}

	}

/* Tablet */

	@media screen and (min-width: 737px) and (max-width: 1200px) {

		/* Basic */

			body {
				min-width: 1000px;
			}

		/* Multi-use */

			.check-list li {
				font-size: 1em;
				line-height: 2em;
			}

			.quote-list li {
				padding: 1em 0 1em 0;
			}

				.quote-list li img {
					width: 60px;
				}

				.quote-list li p {
					margin: 0 0 0 80px;
					font-size: 1em;
					font-style: italic;
					line-height: 1.8em;
				}

				.quote-list li span {
					display: block;
					margin-left: 80px;
					font-size: 0.8em;
					font-weight: 400;
					line-height: 1.8em;
				}

			.feature-image {
				margin: 0 0 1em 0;
			}

			.button-big {
				font-size: 1.5em;
				padding: 10px 35px 10px 35px;
			}

		/* Banner */

			#banner p {
				font-size: 1.75em;
			}

		/* Header */

			#header h1 {
				font-size: 2.25em;
			}

			#header nav a {
				font-size: 1.1em;
			}

		/* Content */

			#content h2 {
				font-size: 1.4em;
			}

			#content h3 {
				font-size: 1.1em;
			}

			#content header {
				margin: 0 0 1.25em 0;
			}

	}

/* Mobile */

	#navPanel, #titleBar {
		display: none;
	}

	@media screen and (max-width: 736px) {

		/* Basic */

			html, body {
				overflow-x: hidden;
			}

			body, input, textarea, select {
				font-size: 13pt;
				line-height: 1.4em;
			}

		/* Multi-use */

			.link-list li {
				padding: 0.75em 0 0.75em 0;
			}

			.quote-list li p {
				margin-bottom: 0.5em;
			}

			.check-list li {
				font-size: 1em;
			}

			.button-big {
				font-size: 1.5em;
				padding: 10px 35px 10px 35px;
			}

		/* Wrappers */

			#header-wrapper {
				background: #3B4346 url("images/bg01.jpg") top center;
				box-shadow: inset 0px -1px 0px 0px #272d30, inset 0px -2px 0px 0px #51575a;
				text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.75);
			}

			#features-wrapper {
				background: #353D40 url("images/bg02.jpg");
				padding: 15px 15px 30px 15px;
				text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.75);
			}

			#content-wrapper {
				background: #f7f7f7 url("images/bg04.png");
				padding: 5px;
			}

			.subpage #content-wrapper {
				padding-top: 44px;
			}

			#footer-wrapper {
				padding: 40px 15px 15px 15px;
				text-shadow: 1px 1px 1px white;
			}

		/* Header */

			#header {
				display: none;
			}

			#banner {
				position: relative;
				color: #fff;
				text-align: center;
				padding: 30px 30px 15px 30px;
				margin-top: 44px;
			}

				#banner .bordered-feature-image {
					display: none;
				}

				#banner p {
					font-size: 1.25em;
					font-weight: 200;
					line-height: 1.25em;
					margin: 0 0 1em 0;
				}

		/* Features */

			#features {
				color: #a0a8ab;
			}

				#features section {
					padding: 0 0 25px 0;
					margin: 0 0 25px 0;
					border-bottom: solid 1px #51575a;
					box-shadow: inset 0px -1px 0px 0px #272d30;
				}

				#features > div > div:last-child > section {
					padding-bottom: 0;
					margin-bottom: 0;
					border-bottom: 0;
					box-shadow: none;
				}

				#features h2 {
					font-size: 1.25em;
					color: #fff;
					margin: 0 0 0.25em 0;
				}

				#features a {
					color: #e0e8eb;
				}

				#features strong {
					color: #fff;
				}

		/* Content */

			#content section {
				background: #fff;
				box-shadow: inset 0px 0px 0px 1px rgba(128, 128, 128, 0.2);
				padding: 30px 10px 30px 15px;
				margin: 0 0 5px 0;
			}

			#content h2 {
				font-size: 1.25em;
				color: #373f42;
				margin: 0 0 0.1em 0;
			}

			#content h3 {
				color: #96a9b5;
				font-size: 1em;
			}

			#content a {
				color: #ED391B;
			}

			#content header {
				margin: 0 0 1.25em 0;
			}

		/* Footer */

			#footer {
				color: #546b76;
				text-shadow: 1px 1px 0px rgba(255, 255, 255, 0.5);
			}

				#footer section {
					margin: 0 0 40px 0;
				}

				#footer h2 {
					font-size: 1.25em;
					color: #212f35;
					margin: 0 0 0.75em 0;
				}

				#footer a {
					color: #546b76;
				}

				#footer .link-list {
					margin: 0 0 30px 0;
				}

		/* Copyright */

			#copyright {
				border-top: solid 1px #b5bec3;
				box-shadow: inset 0px 1px 0px 0px #e0e4e7;
				text-align: center;
				padding: 20px 30px 20px 30px;
				color: #8d9ca3;
				text-shadow: 1px 1px 0px rgba(255, 255, 255, 0.5);
			}

				#copyright a {
					color: #8d9ca3;
				}

		/* Off-Canvas Navigation */

			#page-wrapper {
				-moz-backface-visibility: hidden;
				-webkit-backface-visibility: hidden;
				-ms-backface-visibility: hidden;
				backface-visibility: hidden;
				-moz-transition: -moz-transform 0.5s ease;
				-webkit-transition: -webkit-transform 0.5s ease;
				-ms-transition: -ms-transform 0.5s ease;
				transition: transform 0.5s ease;
				padding-bottom: 1px;
			}

			#titleBar {
				-moz-backface-visibility: hidden;
				-webkit-backface-visibility: hidden;
				-ms-backface-visibility: hidden;
				backface-visibility: hidden;
				-moz-transition: -moz-transform 0.5s ease;
				-webkit-transition: -webkit-transform 0.5s ease;
				-ms-transition: -ms-transform 0.5s ease;
				transition: transform 0.5s ease;
				display: block;
				height: 44px;
				left: 0;
				position: fixed;
				top: 0;
				width: 100%;
				z-index: 10001;
				color: #fff;
				background: url("images/bg04.jpg");
				box-shadow: inset 0px -20px 70px 0px rgba(200, 220, 245, 0.1), inset 0px -1px 0px 0px rgba(255, 255, 255, 0.1), 0px 1px 7px 0px rgba(0, 0, 0, 0.6);
				text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.75);
			}

				#titleBar .title {
					display: block;
					text-align: center;
					font-size: 1.2em;
					font-weight: 400;
					line-height: 44px;
				}

				#titleBar .toggle {
					position: absolute;
					left: 0;
					top: 0;
					width: 80px;
					height: 60px;
				}

					#titleBar .toggle:after {
						content: '';
						display: block;
						position: absolute;
						top: 6px;
						left: 6px;
						color: #fff;
						background: rgba(255, 255, 255, 0.025);
						box-shadow: inset 0px 1px 0px 0px rgba(255, 255, 255, 0.1), inset 0px 0px 0px 1px rgba(255, 255, 255, 0.05), inset 0px -8px 10px 0px rgba(0, 0, 0, 0.15), 0px 1px 2px 0px rgba(0, 0, 0, 0.25);
						text-shadow: -1px -1px 1px black;
						width: 49px;
						height: 31px;
						border-radius: 8px;
					}

					#titleBar .toggle:before {
						content: '';
						position: absolute;
						width: 20px;
						height: 30px;
						background: url("images/mobileUI-site-nav-opener-bg.svg");
						top: 15px;
						left: 20px;
						z-index: 1;
						opacity: 0.25;
					}

					#titleBar .toggle:active:after {
						background: rgba(255, 255, 255, 0.05);
					}

			#navPanel {
				-moz-backface-visibility: hidden;
				-webkit-backface-visibility: hidden;
				-ms-backface-visibility: hidden;
				backface-visibility: hidden;
				-moz-transform: translateX(-275px);
				-webkit-transform: translateX(-275px);
				-ms-transform: translateX(-275px);
				transform: translateX(-275px);
				-moz-transition: -moz-transform 0.5s ease;
				-webkit-transition: -webkit-transform 0.5s ease;
				-ms-transition: -ms-transform 0.5s ease;
				transition: transform 0.5s ease;
				display: block;
				height: 100%;
				left: 0;
				overflow-y: auto;
				position: fixed;
				top: 0;
				width: 275px;
				z-index: 10002;
				background: url("images/bg04.jpg");
				box-shadow: inset -1px 0px 0px 0px rgba(255, 255, 255, 0.25), inset -2px 0px 25px 0px rgba(0, 0, 0, 0.5);
				text-shadow: -1px -1px 1px black;
			}
			/* En movil no mostramos iconos y si texto */
			.iconoTexto {
				display:block;
			}
				#navPanel .link {
					display: block;
					color: #fff;
					text-decoration: none;
					font-size: 1.25em;
					line-height: 2em;
					padding: 0.5em 1.5em 0.5em 1.5em;
					border-top: solid 1px #373d40;
					border-bottom: solid 1px rgba(0, 0, 0, 0.4);
				}

					#navPanel .link:first-child {
						border-top: 0;
					}

					#navPanel .link:last-child {
						border-bottom: 0;
					}

			body.navPanel-visible #page-wrapper {
				-moz-transform: translateX(275px);
				-webkit-transform: translateX(275px);
				-ms-transform: translateX(275px);
				transform: translateX(275px);
			}

			body.navPanel-visible #titleBar {
				-moz-transform: translateX(275px);
				-webkit-transform: translateX(275px);
				-ms-transform: translateX(275px);
				transform: translateX(275px);
			}

			body.navPanel-visible #navPanel {
				-moz-transform: translateX(0);
				-webkit-transform: translateX(0);
				-ms-transform: translateX(0);
				transform: translateX(0);
			}
	}
/* MI CSS */
.boton {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	text-decoration:none;
}
/* Titulo para el video azar del pages */
.h2PagesVideo {
	font-size: 1.35em;
	color: #fff;
	margin: 0 0 0.25em 0;
}
/* Titulo para el video misterio h1 */
#h1VideoMisterio {
	font-size: 1.5em;
	color: #000;
	margin: 0 0 0.25em 0;
	padding-top: 12px;
}
/* Reset p*/
.resetP{
	margin: 0px;
}
/* Titulo del video random */
.tituloRandom{
	font-size: 1.3em;
}

/* H1 simulando cuando estamos en un video el logo titulo de la página*/
#simularLogoTitulo h2 {
	position: absolute;
	left: 0;
	bottom: 35px;
	font-size: 2.75em;
}
#simularLogoTitulo h2 a {
	color: #fff;
	text-decoration: none;
}
/* Categoria buscada desde un video*/
#categoriaBuscada{
	font-size: 2.5em;
    color: #fff;
    margin: 0 0 0.25em 0;
}

/* Paginaciones */
ul.pagination li{color:#222;font-size:0.875rem;height:1.5rem;margin-left:0.3125rem}ul.pagination li a,ul.pagination li button{border-radius:3px;transition:background-color 300ms ease-out;background:none;color:#999;display:block;font-size:1em;font-weight:normal;line-height:inherit;padding:0.0625rem 0.625rem 0.0625rem}ul.pagination li:hover a,ul.pagination li a:focus,ul.pagination li:hover button,ul.pagination li button:focus{background:#e6e6e6}ul.pagination li.unavailable a,ul.pagination li.unavailable button{cursor:default;color:#999}ul.pagination li.unavailable:hover a,ul.pagination li.unavailable a:focus,ul.pagination li.unavailable:hover button,ul.pagination li.unavailable button:focus{background:transparent}ul.pagination li.current a,ul.pagination li.current button{background:#008CBA;color:#fff;cursor:default;font-weight:bold}ul.pagination li.current a:hover,ul.pagination li.current a:focus,ul.pagination li.current button:hover,ul.pagination li.current button:focus{background:#008CBA}ul.pagination li{display:block;float:left}.pagination-centered{text-align:center}.pagination-centered ul.pagination li{display:inline-block;float:none}

ul.pagination li a {
    color: rgba(0, 0 ,0 , 0.54);
}

ul.pagination li.active a {
    background-color: #DCE47E;
    color: #FFF;
    font-weight: bold;
    cursor: default;
}
ul.pagination .disabled:hover a {
    background: none;
}

.paginator {
    text-align: center;
	width: 100%;
}

.paginator ul.pagination li {
    float: none;
    display: inline-block;
	font-size: 1em;
}

.paginator p {
    text-align: right;
    color: rgba(0, 0 ,0 , 0.54);
}

/* Inputs */
input[type=text], select, textarea {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=email] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button[type=submit]:hover {
    background-color: #45a049;
}

/* Flash message*/
.alert-success {
    color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
}
.alert-error {
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
}
.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}
.error-message {
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
	padding: 3px;
	padding-left: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}
/* mensaje que tira el auth de cakephp */
.message.error{
	color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
	padding: 3px;
	padding-left: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}
.message.success{
    color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
	padding: 3px;
	padding-left: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}

/* Tables */
table {
    background: #fff;
    margin-bottom: 1.25rem;
    border: none;
    table-layout: fixed;
    width: 100%;
}

table thead {
    background: none;
}

table tr {
    border-bottom: 1px solid #ebebec;
}

table thead tr {
    border-bottom: 1px solid #1798A5;
}

table tr th {
    padding: 0.5625rem 0.625rem;
    font-size: 1em;
    color: #1798A5;
    text-align: left;
    border-bottom: 2px solid #828282;
}

table tr:nth-of-type(even) {
    background: none;
}

.fechaPages{
	color:#fff;
}
p {
	margin:0px;
}
/* Botón fb compartir en misterio*/
.fb {
  color: rgb(255, 255, 255);
  background: none;
  padding: 0px;
  border: none;
  width: auto;
  border-radius: 0px;
  min-width: auto;
  font-family: arial;
  font-size: 12px;
  font-weight: 900;
}

.pointer {
	cursor: pointer;
}

.redes-sociales{
	text-decoration:none;
	margin-left:10px;
}

.no-text-decoration{
	text-decoration:none;
}

.margin-cinco{
	margin:5px;
}

.width-cien{
	width:100%;
}

.clear-both{
	clear:both;
}

.width-sesentacinco{
	width:65%;
}

.display-block{
	display:block;
}

/* latin-ext */
@font-face {
  font-family: 'Yanone Kaffeesatz';
  font-style: normal;
  font-weight: 200;
  src: local('Yanone Kaffeesatz ExtraLight'), local('YanoneKaffeesatz-ExtraLight'), url(/fonts/We_iSDqttE3etzfdfhuPRVXcACNQFE7tadwTlCQ9h9g.woff2) format('woff2');
  unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Yanone Kaffeesatz';
  font-style: normal;
  font-weight: 200;
  src: local('Yanone Kaffeesatz ExtraLight'), local('YanoneKaffeesatz-ExtraLight'), url(/fonts/We_iSDqttE3etzfdfhuPRQqftcMOL_w0yR9WY4zwDNA.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}
/* latin-ext */
@font-face {
  font-family: 'Yanone Kaffeesatz';
  font-style: normal;
  font-weight: 300;
  src: local('Yanone Kaffeesatz Light'), local('YanoneKaffeesatz-Light'), url(/fonts/We_iSDqttE3etzfdfhuPRV_VQuBLpnllPs8BB5MjWqY.woff2) format('woff2');
  unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Yanone Kaffeesatz';
  font-style: normal;
  font-weight: 300;
  src: local('Yanone Kaffeesatz Light'), local('YanoneKaffeesatz-Light'), url(/fonts/We_iSDqttE3etzfdfhuPRcITWGgmQvtcmgaGakhz0f4.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}
/* latin-ext */
@font-face {
  font-family: 'Yanone Kaffeesatz';
  font-style: normal;
  font-weight: 400;
  src: local('Yanone Kaffeesatz Regular'), local('YanoneKaffeesatz-Regular'), url(/fonts/YDAoLskQQ5MOAgvHUQCcLV83L2yn_om9bG0a6EHWBso.woff2) format('woff2');
  unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Yanone Kaffeesatz';
  font-style: normal;
  font-weight: 400;
  src: local('Yanone Kaffeesatz Regular'), local('YanoneKaffeesatz-Regular'), url(/fonts/YDAoLskQQ5MOAgvHUQCcLfGwxTS8d1Q9KiDNCMKLFUM.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}
.tituloMisterioAmp{
	margin-top: -5px;
	margin-bottom: 11px;
	font-size:35px;
	text-align:center;
	text-decoration: line-through;
	text-align: center;
	position: relative;
	line-height: 2;
	overflow: hidden;
}


.tituloMisterioAmp::before {
  content: "";
  display: inline-block;
  bottom: .5ex;
  left: -.5ex;
  width: 100%;
  margin-left: -100%;
  height: 2px;
  position: relative;
  background: #dc4e41;
  -webkit-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
}
.tituloMisterioAmp:hover::before {
  left: -2ex;
}
.tituloMisterioAmp::after {
  content: "";
  display: inline-block;
  bottom: .5ex;
  left: .5ex;
  margin-right: -100%;
  width: 100%;
  height: 2px;
  position: relative;
  background: #dc4e41;
  -webkit-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
}
.tituloMisterioAmp:hover::after {
  left: 2ex;
}




#h1VideoMisterioDocumental{
	color:#fff;
	font-size: 2em;
	margin: 0 0 0.25em 0;
	padding-top: 12px;
}
blockquote {
    padding: 10px 20px;
    margin: 0 0 20px;
    font-size: 17.5px;
    border-left: 5px solid #282D30;
}
.titulo-misterio{
	position: absolute;
	left: 0;
	bottom: 35px;
	font-size: 2.75em;
	color: #fff;
	text-decoration: none;
}
</style>
  </head>
  <body>
	<amp-analytics type="googleanalytics" id="analytics1">
	  	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-54402446-1', 'auto');
		  ga('send', 'pageview');
	</amp-analytics>
    <?= $this->fetch('content'); ?>
  </body>
</html>