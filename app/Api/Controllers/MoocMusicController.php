<?php

namespace App\Api\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

/**
 * 用于慕课网Vue音乐项目课程的网络访问代理，以解决js不能直接添加header的问题
 * Class CategoryController
 * @package App\Http\Controllers
 */
class MoocMusicController extends CommonController
{
    public function index()
    {
    }

    // 获取推荐列表
    public function discList()
    {
        $headers = [
            'referer' => 'https://c.y.qq.com/',
            'host' => 'c.y.qq.com'
        ];
        $query = [
            'g_tk' => '5381',
            'inCharset' => 'utf-8',
            'outCharset' => 'utf-8',
            'notice' => 0,
            'platform' => 'yqq',
            'hostUin' => 0,
            'sin' => 0,
            'ein' => 29,
            'sortId' => 5,
            'needNewCode' => 0,
            'categoryId' => 10000000,
            'rnd' => mt_rand(0, 1),
            'format' => 'json'
        ];
        $client = new Client();
        $response = $client->request('GET', 'https://c.y.qq.com/splcloud/fcgi-bin/fcg_get_diss_by_tag.fcg', [
            'headers' => $headers,
            'query' => $query
        ]);
        $body = $response->getBody();
        return $this->toJson($body->getContents());
    }
}