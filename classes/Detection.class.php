<?php
/**
 * Created by PhpStorm.
 * User: Nikhil Ghind
 * Date: 10-03-2019
 * Time: 04:37 PM
 */


class Detection{

    public function makecUrlFile($file){
        $mime = mime_content_type($file);
        $info = pathinfo($file);
        $name = $info['basename'];
        $output = new CURLFile($file, $mime, $name);
        return $output;
    }

    public function performDetection($data1,$data2){
//        $data1 = self::makecUrlFile($data1);
//        $data2 = self::makecUrlFile($data2);
//        var_dump($data1);
//        echo '<br>';
//        var_dump($data2);
        $queryUrl = "http://106.51.58.118:5000/compare_faces?face_det=1";// face compare url
        $imageObject =  array("img_1" => $data1 , "img_2" => $data2);
        $request = curl_init();
        curl_setopt($request, CURLOPT_URL, $queryUrl);
        curl_setopt($request, CURLOPT_POST, true);
        curl_setopt($request,CURLOPT_POSTFIELDS,$imageObject);
        curl_setopt($request, CURLOPT_HTTPHEADER, array(
                "Content-type: multipart/form-data",
                "user_id:" . 'b729df38456dafa674dd',
                "user_key:" . 'e5043e9a62571b1aff77'
            )
        );
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($request); // curl response
        echo $response;
//        $response=json_decode($response);
//        $err = curl_error($curl);
//        var_dump($curl);
//        var_dump($response);
//        curl_close($curl);
//        if ($err) {
//            echo "CURL Error #:" . $err;
//        } else {
//            if(array_key_exists("confidence",$response))
//                return (array)$response;
//            else
//                return false;
//        }
    }

    public function countFaces($data1){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://facexapi.com/get_image_attr?bboxes=286,118,403,246&face_det=1",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array('image_attr'=> new CURLFILE($data1)),
            CURLOPT_HTTPHEADER => array(
                "user_id: b729df38456dafa674dd",
                "user_key: e5043e9a62571b1aff77"
            ),
        ));
        $response = curl_exec($curl);
        $response=json_decode($response);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            if(array_key_exists("face_id_1",$response)){
//return false;
                return false;
            }
            else{
                return true;
            }


        }
    }
}
?>