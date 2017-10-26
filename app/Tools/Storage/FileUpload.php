<?php
namespace App\Tools\Storage;
/**
 * 用于处理文件上传的处理类
 * Class FileUpload
 * @package App\Tools
 *
 * overtrue/laravel-filesystem-qiniu
 */
class FileUpload
{
    protected $disk;

    /**
     * 构造方法
     */
    public function __construct()
    {
        //控制上传位置的方式
        $this->disk = \Storage::disk('qiniu');
    }

    /**
     * 保存文件
     * @param $saveFilePath 保存文件的路径，除了域名外的所有路径: app/ave/102.png
     * @param $currentFilePath 当前文件的保存路径，用于提取二进制流，用于输出
     * @return bool
     */
    public function saveFile($saveFilePath, $currentFilePath)
    {
        try {
            $this->disk->put($saveFilePath,fopen($currentFilePath,"r"));
            return true;
        } catch (\ErrorException $e) {
            $info = __METHOD__;
            \Log::error('文件上传异常', compact('info', '$saveFilePath'));
            return false;
        }
    }

    /**
     * 检查存储中是否已经存在同名的文件
     * @param $fileName
     */
    public function hasFile($fileName)
    {
        try {
            return $this->disk->has($fileName);
        } catch (\ErrorException $e) {
            $info = __METHOD__;
            \Log::error('文件搜索异常', compact('info', 'fileName'));
            return false;
        }
    }

    /**
     * @param $fileName
     * @return bool
     */
    public function lastModified($fileName)
    {
        try {
            return $this->disk->lastModified($fileName);
        } catch (\League\Flysystem\FileNotFoundException $e) {
            $info = __METHOD__;
            \Log::error('获取文件修改时间异常', compact('info', 'fileName'));
            return false;
        }
    }

    /**
     * @param $fileName
     * @return bool
     */
    public function getTimestamp($fileName)
    {
        try {
            return $this->disk->getTimestamp($fileName);
        } catch (\League\Flysystem\FileNotFoundException $e) {
            $info = __METHOD__;
            \Log::error('获取文件时间异常', compact('info', 'fileName'));
            return false;
        }
    }

    /**
     * 获取上传文件的Token
     * @param $fileName
     * @return mixed
     */
    public function getUploadToken($fileName)
    {
        return $this->disk->getUploadToken($fileName);
    }

    // get file contents
    public function read($url)
    {
        try {
            return $this->disk->read($url);
        } catch (\Exception $e) {
            $info = __METHOD__;
            \Log::error('获取文件内容异常', compact('info', 'fileName'));
            return false;
        }
    }

    // 从第三方抓取文件放到存储中
    public function fetch($fileName, $url)
    {
        try {
            return $this->disk->fetch($fileName, $url);
        } catch (\Exception $e) {
            $info = __METHOD__;
            \Log::error('抓取文件资源异常', compact('info', 'fileName'));
            return false;
        }
    }

    //获取文件资源地址
    public function getUrl($fileName)
    {
        try {
            return $this->disk->getUrl($fileName);
        } catch (\Exception $e) {
            $info = __METHOD__;
            \Log::error('获取文件资源地址异常', compact('info', 'fileName'));
            return false;
        }
    }
}