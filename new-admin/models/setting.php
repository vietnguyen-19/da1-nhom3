<?php

if(!function_exists('settingUpdateByKey')){
    function settingUpdateByKey($key, $data){
        try{
            $setParams = get_set_params($data);

            // Sửa đổi ở đây: sửa 'keys' thành `keys` và :key để khớp với placeholder
            $sql = "UPDATE settings SET $setParams WHERE `keys` = :key";

            $stmt = $GLOBALS['conn']->prepare($sql);

            // Bind các tham số từ $data
            foreach($data as $fieldName => $value){
                // Đây là sự thay đổi: tránh sử dụng tham chiếu trong bindParam
                $stmt->bindValue(":$fieldName", $value);
            }

            // Sửa lỗi placeholder ở đây: từ :keys thành :key để khớp với truy vấn
            $stmt->bindValue(":key", $key);

            $stmt->execute();
        }catch(\Exception $e){
            debug($e);
        }
    }
}
