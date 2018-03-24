# Typecho ShortCode 短代码插件
Typecho ShortCode 是一款用于自定义短代码的Typecho插件
[GitHub 地址](https://github.com/moeshin/Typecho-Plugins-ShortCode) | [GitHub 下载](https://codeload.github.com/moeshin/Typecho-Plugins-ShortCode/zip/master)

由于Typecho目前自带的MarkDown解析不支持许多HTML标签，可能影响你使用ShortCode短代码
可以使用其他的MarkDown解析，例如：[Parsedown](https://github.com/erusev/parsedown)（[插件](https://github.com/kokororin/typecho-plugin-Parsedown)）等等
## 函数说明
使用以下函数来自定义短代码，均为公开静态
### ShortCode::set
注册短代码，返回一个`ShortCode`实例

参数名|类型|说明
:-|:-|:-
names|mixed|短代码名称，可以一个字符串或字符串数组
callbacks|mixed|短代码对应回调函数，可以一个回调函数或回调函数数组
overried|bool|覆盖已存在的短代码设置<br>可选，默认`false`
### ShortCode::get
获取已注册短代码列表，返回数组，格式例如：
```php
array{
	[短代码名称] => 回调函数或回调函数名
	...
}
```
### ShortCode::remove
移除已注册的短代码，返回一个`ShortCode`实例

参数名|类型|说明
:-|:-|:-
names|string|短代码名称
callbacks|callback|只有回调函数相同，短代码才会被移除<br>可选，默认`null`
### ShortCode::removeAll
移除所有已注册短的代码，返回一个`ShortCode`实例
### ShortCode::isForce
是否强制处理内容，返回布尔值，当前设置
使用此插件后Markdown或AutoP失效，使用此函数，并传入`true`值

参数名|类型|说明
:-|:-|:-
bool|bool|可选，默认`null`
### ShortCode::handle
字符串处理，返回字符串

参数名|类型|说明
:-|:-|:-
content|string|要处理的字符串
## 短代码回调函数参数说明
参数名|类型|说明
:-|:-|:-
name|string|短代码名称
attr|string|短代码属性
text|string|短代码内容
code|string|整条短代码内容
## 注册短代码栗子
### \#1 一个对一个
```php
ShortCode::set('video',function ShorCode($name,$attr,$text,$code){
	return '<video controls="controls"'.$attr.'><source src="'.$text.'"></video>';
});
```
### \#2 多个对一个
```php
ShortCode::set(['video','audio'],'ShorCode');
function ShorCode($name,$attr,$text,$code){
	switch($name){
		case 'video':
			return '<video controls="controls"'.$attr.'><source src="'.$text.'"></video>';
		case 'audio':
			return '<audio controls="controls"'.$attr.'><source src="'.$text.'"></audio>';
	}
	return $code;
}
```
## [TOC]自动生成目录说明
上下不要有文本，自己占一行，与`<!--import-->`写法一样
在文章列表里不显示也不生成目录

### 举个栗子
MarkDown：
```markdown
[TOC]
# 文章大标题
## 文章中标题
### 文章小标题
...
```
HTML：
```html
<div class="TOC">
	<span>目录</span>
	<ol>
		<li>
			<a href="#TOC0">文章大标题</a>
			<ol>
				<li>
					<a href="#TOC1">文章中标题</a>
					<ol>
						<li>
							<a href="#TOC2">文章小标题</a>
						</li>
					</ol>
				</li>
			</ol>
		</li>
	</ol>
</div>
<h1 id="TOC0">文章大标题</h1>
<h2 id="TOC1">文章中标题</h2>
<h3 id="TOC2">文章小标题</h3>
<p>...</p>
```

## 更新
**2018.03.24**
- 添加[TOC]自动生成目录功能
- 支持短代码转义（在短代码前加上反斜杠）