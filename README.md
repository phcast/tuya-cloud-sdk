<h1 align="center"> tuya-cloud-sdk </h1>

<p align="center">基于 tuya cloud api sdk 的封装</p>

## 安装

```shell
$ composer require phpcast/tuya-cloud-sdk -vvv
```

## 使用

```$xslt
$config = [
    'client_id' => '',
    'secret' => '',
    'version' => 'v1.0',
];
$cloud = \Phpcast\TuyaCloudSdk\Factory::cloud($config);
$user = $cloud->user->users('xxxx');
```

## 参考
[文档地址](https://docs.tuya.com/zh/iot/open-api/api-list/api/api)

## License

MIT