<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * Short Code 短代码
 * 
 * @package ShortCode 
 * @author 小さな手は
 * @version 1.0.1
 * @link https://www.littlehands.site/
 */
class ShortCode_Plugin implements Typecho_Plugin_Interface
{
	/**
	 * 激活插件方法,如果激活失败,直接抛出异常
	 * 
	 * @access public
	 * @return void
	 * @throws Typecho_Plugin_Exception
	 */
	public static function activate(){
        Typecho_Plugin::factory('admin/common.php')->begin = [__Class__, 'init'];
		Typecho_Plugin::factory('Widget_Archive')->handleInit = [__Class__, 'init'];
	}

	/**
	 * 禁用插件方法,如果禁用失败,直接抛出异常
	 * 
	 * @static
	 * @access public
	 * @return void
	 * @throws Typecho_Plugin_Exception
	 */
	public static function deactivate(){}

	/**
	 * 获取插件配置面板
	 * 
	 * @access public
	 * @param Typecho_Widget_Helper_Form $form 配置面板
	 * @return void
	 */
	public static function config(Typecho_Widget_Helper_Form $form){}

	/**
	 * 个人用户的配置面板
	 * 
	 * @access public
	 * @param Typecho_Widget_Helper_Form $form
	 * @return void
	 */
	public static function personalConfig(Typecho_Widget_Helper_Form $form){}

	/**
	 * 插件初始化
	 *
	 * @access public
	 * @return void
	 */
	public static function init(){
		require_once 'ShortCode.php';
	}
}
