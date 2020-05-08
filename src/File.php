<?php

namespace Rdisme\Files;


class File
{

    /**
     * 逐行读取文件中的内容
     * @param callback function 回调函数
     */
    public static function readLine($filePath, $callback)
    {
        $fh = fopen($filePath, 'r');

        while (!feof($fh)) {
            $line = fgets($fh);
            $callback($line);
        }

        fclose($fh);
    }
}
