<?php

namespace Rdisme\Files;


class Dir
{

    /**
     * 设置文件过滤
     * @param filter array()
     */
    private $filter = array('.', '..');

    /**
     * 读取文件的数量限制
     * 默认全部读取
     * @param filesNum int
     */
    private $filesNum = true;

    // 待读取的目录地址
    private $dirPath;


    public function __construct($params)
    {
        // 设置目录地址
        $this->dirPath = $params['dir_path'];

        // 设置过滤文件
        if (isset($params['filter'])) {
            $this->filter = $params['filter'];
        }

        // 设置读取文件数量
        if (isset($params['files_num'])) {
            $this->filesNum = $params['files_num'];
        }
    }


    /**
     * 读取目录下文件
     * @param callback function 回调函数
     */
    public function readDir($callback)
    {
        // 目录句柄
        $dh = opendir($this->dirPath);

        while (false !== ($file = readdir($dh))) {
            // 过滤文件
            if (in_array($file, $this->filter)) {
                continue;
            }
            // 读取文件数量
            if (true !== $this->filesNum && 0 >= $this->filesNum--) {
                break;
            }
            // 回调函数处理
            // 返回文件名称
            $callback($file);
        }

        // 关闭
        closedir($dh);
    }
}
