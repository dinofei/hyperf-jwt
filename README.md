
<pre>
如果遇到下载次数限制，添加如下token：
token: 2a952f1942a9b4e0c0e5a9342eca194bf6483a1a
</pre>

## 安装

`composer require bjyyb/hyperf-jwt:dev-main`

## 发布配置文件 

`php bin/hyperf.php vendor:publish bjyyb/hyperf-jwt`

## 使用：

### 获取jwt
```php
$data = ['user_id' => 1];
$service = $this->container->get(\Bjyyb\JWT\JwtService::class);
/** 第二个参数为jwt.php配置的键 */
$jwt = $service->get($data, 'test');
var_dump($jwt);
``` 

### 解密jwt
```php
$jwt = 'xxx';
$service = $this->container->get(\Bjyyb\JWT\JwtService::class);
$data = $service->parse($jwt);
var_dump($data);
``` 
