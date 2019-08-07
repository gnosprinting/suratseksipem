<?php
function cekFileUkuran($txtFile){
    $imageSize = $_FILES[$txtFile]['size'];
	if($imageSize >10000000) {
		return "Maaf, File Yang anda Upload  <b> lebih dari 10 mb </b>";
    }
    else return "";
}
function cekFileUkuran2mb($txtFile){
    $imageSize = $_FILES[$txtFile]['size'];
	if($imageSize >2000000) {
		return "Maaf, File Yang anda Upload  <b> lebih dari 2 mb </b>";
    }
    else return "";
}

function cekFileTipe($txtFile,$tipeFile){
    $imageFileType = strtolower(pathinfo($_FILES[$txtFile]['name'],PATHINFO_EXTENSION));
    if($imageFileType!=$tipeFile) {
        return "Maaf, File Yang anda Upload  bukan tipe <b> $tipeFile </b>";
    }
    else return "";
}

function uploadFile($txtFile,$tipeFile){
    $tmpFilePath = $_FILES[$txtFile]['tmp_name'];
    if($tmpFilePath != ""){
        $directoryName = './img';
        if(!is_dir($directoryName)){
            mkdir($directoryName, 0755, True);
        }
        $filePath = $directoryName.'/'.date('Ymd-His').'-'.$nidn."-pendidikan-".$idPendidikan.".".$tipeFile;
        move_uploaded_file($tmpFilePath, $filePath);
        return date('Ymd-His').'-'.$nidn."-pendidikan-".$idPendidikan.".".$tipeFile;
    }
}
?>
