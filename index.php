<?php
$params = [
	'text' => '(Dân trí) - Lãnh đạo Trung tâm Kiểm soát bệnh tật TPHCM cho biết, điểm phức tạp của chuỗi lây nhiễm này là các F0 học tập tại 7 trường khác nhau, có nguy cơ lây lan nếu truy vết không quyết liệt.',
	'voice' => 'doanngocle',
	'id' => '2',
	'without_filter' => false,
	'speed' => 1.0,
	'tts_return_option' => '2',
	'timeout' => 60000
];
$test = json_encode($params);

$curl = curl_init();

// var_dump($curl);die;
curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://viettelgroup.ai/voice/api/tts/v1/rest/syn',
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'POST',
	CURLOPT_POSTFIELDS => json_encode($params),
	CURLOPT_HTTPHEADER => array(
		'Connection: keep-alive',
		'sec-ch-ua: " Not;A Brand";v="99", "Google Chrome";v="91", "Chromium";v="91"',
		'sec-ch-ua-mobile: ?0',
		'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36',
		'token: 2Y5yc6ZTG-7HaDvWRF0N-gA5aVjGs9OIt6veR9PoegEqhQc1djK9U6kfeoIeyypB',
		'Content-Type: application/json',
		'Accept: */*',
		'Origin: https://viettelgroup.ai',
		'Sec-Fetch-Site: same-origin',
		'Sec-Fetch-Mode: cors',
		'Sec-Fetch-Dest: empty',
		'Referer: https://viettelgroup.ai/service/tts',
		'Accept-Language: vi-VN,vi;q=0.9,en-US;q=0.8,en;q=0.7,fr-FR;q=0.6,fr;q=0.5'
	),
));
$response = curl_exec($curl);

if ($response) {
	//var_dump($upload_path['basedir']);die;
	//if (!file_exists($upload_path['basedir']. '/tts_uploads')) {
	//    mkdir($upload_path['basedir']. '/tts_uploads');
	//}
	$file_dir = './tts_uploads/audio_2.mp3';

	file_put_contents($file_dir, $response);
	// if($file['channel'] == 'Viettel'){
	// $audio = new PHPMP3($file_dir);
	// $audio->setFileInfoExact();
	// $time = $audio->time;
	// $mp3 = $audio->extract(5, $time - 10);
	// $mp3->save($file_dir);
	// }
	$meta_key = 'tts_audio_';
	$file = './tts_uploads/audio_2.mp3';

	//	$existing_pms = get_post_meta( $post_id, $meta_key, true );
	//	if($existing_pms)
	//		update_post_meta( $post_id, $meta_key, $file);
	//	else
	//		add_post_meta( $post_id, $meta_key, $file);

	//	$text = ['code' => 1, 'file' => $file, 'id' => 1, 'msg' => 'Tạo tệp mp3 thành công cho bài viết: 1'];
	//	var_dump($text);die;
	//echo json_encode(['code' => 1, 'file' => $file, 'id' => $post_id, 'msg' => 'Tạo tệp mp3 thành công cho bài viết: ' . $post_id]);
}
?>

<!DOCTYPE html>
<html>

<head>
	<style>
		.q-loading-bar {
			z-index: 999999 !important;
		}

		body {
			background: #fff;
		}

		.fixed,
		.fixed-bottom,
		.fixed-bottom-left,
		.fixed-bottom-right,
		.fixed-center,
		.fixed-full,
		.fixed-left,
		.fixed-right,
		.fixed-top,
		.fixed-top-left,
		.fixed-top-right,
		.fullscreen {
			z-index: 99999999 !important;
		}

		textarea,
		input {
			border: 0 !important;
			background: transparent !important;
			box-shadow: none !important
		}
	</style>
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons" rel="stylesheet" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/quasar@1.15.7/dist/quasar.min.css" rel="stylesheet" type="text/css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.10.1/APlayer.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.10.1/APlayer.min.js" integrity="sha512-RWosNnDNw8FxHibJqdFRySIswOUgYhFxnmYO3fp+BgCU7gfo4z0oS7mYFBvaa8qu+axY39BmQOrhW3Tp70XbaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
	<div id="myplayer" class="aplayer"></div>
	<script>
	const ap = new APlayer({
		element: document.getElementById('myplayer'),
		music: {
			name: 'Giọng đọc viettel',
			artist: 'artist',
			url: './tts_uploads/audio_2.mp3',
			cover: 'https://imgv3.fotor.com/images/side/sideimage-one-tap-enhance.jpg',
		}
	});
	</script>
</body>
</html>