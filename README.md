# files

#### 介绍
文件操作类


1, 读取指定目录下所有文件

```
use Rdisme\Files\Dir;


$config = array(
    // 待读取目录地址，必传
    'dir_path' => dirname(__DIR__),

    // 指定读取文件数量，不传默认读取所有文件
    'files_num' => 3,

    // 指定过滤的文件名，不传默认过滤 array('.', '..')
    'filter' => array()
);

$ds = new Dir($config);

$ds->readDir(function ($filepath) {
    var_dump($filepath);
    echo '<hr>';
});
```

2, 逐行读取指定文件

```
use Rdisme\Files\File;

File::readLine($filepath, function ($line) {
    var_dump($line);
    echo '<hr>';
});
```