-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-03-21 04:48:44
-- 服务器版本： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_mysise`
--

-- --------------------------------------------------------

--
-- 表的结构 `sise_activity`
--

CREATE TABLE IF NOT EXISTS `sise_activity` (
`id` bigint(20) unsigned NOT NULL,
  `name` varchar(100) NOT NULL COMMENT '活动名称',
  `introduction` varchar(600) DEFAULT NULL COMMENT '活动简介',
  `time` varchar(100) NOT NULL COMMENT '活动时间',
  `area` varchar(60) NOT NULL COMMENT '活动地点',
  `type` varchar(60) DEFAULT NULL COMMENT '活动类型'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sise_ad`
--

CREATE TABLE IF NOT EXISTS `sise_ad` (
`ad_id` bigint(20) NOT NULL COMMENT '广告id',
  `ad_name` varchar(255) NOT NULL COMMENT '广告名称',
  `ad_content` text COMMENT '广告内容',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1显示，0不显示'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sise_asset`
--

CREATE TABLE IF NOT EXISTS `sise_asset` (
`aid` bigint(20) NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户 id',
  `key` varchar(50) NOT NULL COMMENT '资源 key',
  `filename` varchar(50) DEFAULT NULL COMMENT '文件名',
  `filesize` int(11) DEFAULT NULL COMMENT '文件大小,单位Byte',
  `filepath` varchar(200) NOT NULL COMMENT '文件路径，相对于 upload 目录，可以为 url',
  `uploadtime` int(11) NOT NULL COMMENT '上传时间',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1：可用，0：删除，不可用',
  `meta` text COMMENT '其它详细信息，JSON格式',
  `suffix` varchar(50) DEFAULT NULL COMMENT '文件后缀名，不包括点',
  `download_times` int(11) NOT NULL DEFAULT '0' COMMENT '下载次数'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='资源表';

-- --------------------------------------------------------

--
-- 表的结构 `sise_auth_access`
--

CREATE TABLE IF NOT EXISTS `sise_auth_access` (
  `role_id` mediumint(8) unsigned NOT NULL COMMENT '角色',
  `rule_name` varchar(255) NOT NULL COMMENT '规则唯一英文标识,全小写',
  `type` varchar(30) DEFAULT NULL COMMENT '权限规则分类，请加应用前缀,如admin_'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='权限授权表';

-- --------------------------------------------------------

--
-- 表的结构 `sise_auth_rule`
--

CREATE TABLE IF NOT EXISTS `sise_auth_rule` (
`id` mediumint(8) unsigned NOT NULL COMMENT '规则id,自增主键',
  `module` varchar(20) NOT NULL COMMENT '规则所属module',
  `type` varchar(30) NOT NULL DEFAULT '1' COMMENT '权限规则分类，请加应用前缀,如admin_',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '规则唯一英文标识,全小写',
  `param` varchar(255) DEFAULT NULL COMMENT '额外url参数',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '规则中文描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否有效(0:无效,1:有效)',
  `condition` varchar(300) NOT NULL DEFAULT '' COMMENT '规则附加条件'
) ENGINE=MyISAM AUTO_INCREMENT=162 DEFAULT CHARSET=utf8 COMMENT='权限规则表';

--
-- 转存表中的数据 `sise_auth_rule`
--

INSERT INTO `sise_auth_rule` (`id`, `module`, `type`, `name`, `param`, `title`, `status`, `condition`) VALUES
(1, 'Admin', 'admin_url', 'admin/content/default', NULL, '内容管理', 1, ''),
(2, 'Api', 'admin_url', 'api/guestbookadmin/index', NULL, '所有留言', 1, ''),
(3, 'Api', 'admin_url', 'api/guestbookadmin/delete', NULL, '删除网站留言', 1, ''),
(4, 'Comment', 'admin_url', 'comment/commentadmin/index', NULL, '评论管理', 1, ''),
(5, 'Comment', 'admin_url', 'comment/commentadmin/delete', NULL, '删除评论', 1, ''),
(6, 'Comment', 'admin_url', 'comment/commentadmin/check', NULL, '评论审核', 1, ''),
(7, 'Portal', 'admin_url', 'portal/adminpost/index', NULL, '文章管理', 1, ''),
(8, 'Portal', 'admin_url', 'portal/adminpost/listorders', NULL, '文章排序', 1, ''),
(9, 'Portal', 'admin_url', 'portal/adminpost/top', NULL, '文章置顶', 1, ''),
(10, 'Portal', 'admin_url', 'portal/adminpost/recommend', NULL, '文章推荐', 1, ''),
(11, 'Portal', 'admin_url', 'portal/adminpost/move', NULL, '批量移动', 1, ''),
(12, 'Portal', 'admin_url', 'portal/adminpost/check', NULL, '文章审核', 1, ''),
(13, 'Portal', 'admin_url', 'portal/adminpost/delete', NULL, '删除文章', 1, ''),
(14, 'Portal', 'admin_url', 'portal/adminpost/edit', NULL, '编辑文章', 1, ''),
(15, 'Portal', 'admin_url', 'portal/adminpost/edit_post', NULL, '提交编辑', 1, ''),
(16, 'Portal', 'admin_url', 'portal/adminpost/add', NULL, '添加文章', 1, ''),
(17, 'Portal', 'admin_url', 'portal/adminpost/add_post', NULL, '提交添加', 1, ''),
(18, 'Portal', 'admin_url', 'portal/adminterm/index', NULL, '分类管理', 1, ''),
(19, 'Portal', 'admin_url', 'portal/adminterm/listorders', NULL, '文章分类排序', 1, ''),
(20, 'Portal', 'admin_url', 'portal/adminterm/delete', NULL, '删除分类', 1, ''),
(21, 'Portal', 'admin_url', 'portal/adminterm/edit', NULL, '编辑分类', 1, ''),
(22, 'Portal', 'admin_url', 'portal/adminterm/edit_post', NULL, '提交编辑', 1, ''),
(23, 'Portal', 'admin_url', 'portal/adminterm/add', NULL, '添加分类', 1, ''),
(24, 'Portal', 'admin_url', 'portal/adminterm/add_post', NULL, '提交添加', 1, ''),
(25, 'Portal', 'admin_url', 'portal/adminpage/index', NULL, '页面管理', 1, ''),
(26, 'Portal', 'admin_url', 'portal/adminpage/listorders', NULL, '页面排序', 1, ''),
(27, 'Portal', 'admin_url', 'portal/adminpage/delete', NULL, '删除页面', 1, ''),
(28, 'Portal', 'admin_url', 'portal/adminpage/edit', NULL, '编辑页面', 1, ''),
(29, 'Portal', 'admin_url', 'portal/adminpage/edit_post', NULL, '提交编辑', 1, ''),
(30, 'Portal', 'admin_url', 'portal/adminpage/add', NULL, '添加页面', 1, ''),
(31, 'Portal', 'admin_url', 'portal/adminpage/add_post', NULL, '提交添加', 1, ''),
(32, 'Admin', 'admin_url', 'admin/recycle/default', NULL, '回收站', 1, ''),
(33, 'Portal', 'admin_url', 'portal/adminpost/recyclebin', NULL, '文章回收', 1, ''),
(34, 'Portal', 'admin_url', 'portal/adminpost/restore', NULL, '文章还原', 1, ''),
(35, 'Portal', 'admin_url', 'portal/adminpost/clean', NULL, '彻底删除', 1, ''),
(36, 'Portal', 'admin_url', 'portal/adminpage/recyclebin', NULL, '页面回收', 1, ''),
(37, 'Portal', 'admin_url', 'portal/adminpage/clean', NULL, '彻底删除', 1, ''),
(38, 'Portal', 'admin_url', 'portal/adminpage/restore', NULL, '页面还原', 1, ''),
(39, 'Admin', 'admin_url', 'admin/extension/default', NULL, '扩展工具', 1, ''),
(40, 'Admin', 'admin_url', 'admin/backup/default', NULL, '备份管理', 1, ''),
(41, 'Admin', 'admin_url', 'admin/backup/restore', NULL, '数据还原', 1, ''),
(42, 'Admin', 'admin_url', 'admin/backup/index', NULL, '数据备份', 1, ''),
(43, 'Admin', 'admin_url', 'admin/backup/index_post', NULL, '提交数据备份', 1, ''),
(44, 'Admin', 'admin_url', 'admin/backup/download', NULL, '下载备份', 1, ''),
(45, 'Admin', 'admin_url', 'admin/backup/del_backup', NULL, '删除备份', 1, ''),
(46, 'Admin', 'admin_url', 'admin/backup/import', NULL, '数据备份导入', 1, ''),
(47, 'Admin', 'admin_url', 'admin/plugin/index', NULL, '插件管理', 1, ''),
(48, 'Admin', 'admin_url', 'admin/plugin/toggle', NULL, '插件启用切换', 1, ''),
(49, 'Admin', 'admin_url', 'admin/plugin/setting', NULL, '插件设置', 1, ''),
(50, 'Admin', 'admin_url', 'admin/plugin/setting_post', NULL, '插件设置提交', 1, ''),
(51, 'Admin', 'admin_url', 'admin/plugin/install', NULL, '插件安装', 1, ''),
(52, 'Admin', 'admin_url', 'admin/plugin/uninstall', NULL, '插件卸载', 1, ''),
(53, 'Admin', 'admin_url', 'admin/slide/default', NULL, '幻灯片', 1, ''),
(54, 'Admin', 'admin_url', 'admin/slide/index', NULL, '幻灯片管理', 1, ''),
(55, 'Admin', 'admin_url', 'admin/slide/listorders', NULL, '幻灯片排序', 1, ''),
(56, 'Admin', 'admin_url', 'admin/slide/toggle', NULL, '幻灯片显示切换', 1, ''),
(57, 'Admin', 'admin_url', 'admin/slide/delete', NULL, '删除幻灯片', 1, ''),
(58, 'Admin', 'admin_url', 'admin/slide/edit', NULL, '编辑幻灯片', 1, ''),
(59, 'Admin', 'admin_url', 'admin/slide/edit_post', NULL, '提交编辑', 1, ''),
(60, 'Admin', 'admin_url', 'admin/slide/add', NULL, '添加幻灯片', 1, ''),
(61, 'Admin', 'admin_url', 'admin/slide/add_post', NULL, '提交添加', 1, ''),
(62, 'Admin', 'admin_url', 'admin/slidecat/index', NULL, '幻灯片分类', 1, ''),
(63, 'Admin', 'admin_url', 'admin/slidecat/delete', NULL, '删除分类', 1, ''),
(64, 'Admin', 'admin_url', 'admin/slidecat/edit', NULL, '编辑分类', 1, ''),
(65, 'Admin', 'admin_url', 'admin/slidecat/edit_post', NULL, '提交编辑', 1, ''),
(66, 'Admin', 'admin_url', 'admin/slidecat/add', NULL, '添加分类', 1, ''),
(67, 'Admin', 'admin_url', 'admin/slidecat/add_post', NULL, '提交添加', 1, ''),
(68, 'Admin', 'admin_url', 'admin/ad/index', NULL, '网站广告', 1, ''),
(69, 'Admin', 'admin_url', 'admin/ad/toggle', NULL, '广告显示切换', 1, ''),
(70, 'Admin', 'admin_url', 'admin/ad/delete', NULL, '删除广告', 1, ''),
(71, 'Admin', 'admin_url', 'admin/ad/edit', NULL, '编辑广告', 1, ''),
(72, 'Admin', 'admin_url', 'admin/ad/edit_post', NULL, '提交编辑', 1, ''),
(73, 'Admin', 'admin_url', 'admin/ad/add', NULL, '添加广告', 1, ''),
(74, 'Admin', 'admin_url', 'admin/ad/add_post', NULL, '提交添加', 1, ''),
(75, 'Admin', 'admin_url', 'admin/link/index', NULL, '友情链接', 1, ''),
(76, 'Admin', 'admin_url', 'admin/link/listorders', NULL, '友情链接排序', 1, ''),
(77, 'Admin', 'admin_url', 'admin/link/toggle', NULL, '友链显示切换', 1, ''),
(78, 'Admin', 'admin_url', 'admin/link/delete', NULL, '删除友情链接', 1, ''),
(79, 'Admin', 'admin_url', 'admin/link/edit', NULL, '编辑友情链接', 1, ''),
(80, 'Admin', 'admin_url', 'admin/link/edit_post', NULL, '提交编辑', 1, ''),
(81, 'Admin', 'admin_url', 'admin/link/add', NULL, '添加友情链接', 1, ''),
(82, 'Admin', 'admin_url', 'admin/link/add_post', NULL, '提交添加', 1, ''),
(83, 'Api', 'admin_url', 'api/oauthadmin/setting', NULL, '第三方登陆', 1, ''),
(84, 'Api', 'admin_url', 'api/oauthadmin/setting_post', NULL, '提交设置', 1, ''),
(85, 'Admin', 'admin_url', 'admin/menu/default', NULL, '菜单管理', 1, ''),
(86, 'Admin', 'admin_url', 'admin/navcat/default1', NULL, '前台菜单', 1, ''),
(87, 'Admin', 'admin_url', 'admin/nav/index', NULL, '菜单管理', 1, ''),
(88, 'Admin', 'admin_url', 'admin/nav/listorders', NULL, '前台导航排序', 1, ''),
(89, 'Admin', 'admin_url', 'admin/nav/delete', NULL, '删除菜单', 1, ''),
(90, 'Admin', 'admin_url', 'admin/nav/edit', NULL, '编辑菜单', 1, ''),
(91, 'Admin', 'admin_url', 'admin/nav/edit_post', NULL, '提交编辑', 1, ''),
(92, 'Admin', 'admin_url', 'admin/nav/add', NULL, '添加菜单', 1, ''),
(93, 'Admin', 'admin_url', 'admin/nav/add_post', NULL, '提交添加', 1, ''),
(94, 'Admin', 'admin_url', 'admin/navcat/index', NULL, '菜单分类', 1, ''),
(95, 'Admin', 'admin_url', 'admin/navcat/delete', NULL, '删除分类', 1, ''),
(96, 'Admin', 'admin_url', 'admin/navcat/edit', NULL, '编辑分类', 1, ''),
(97, 'Admin', 'admin_url', 'admin/navcat/edit_post', NULL, '提交编辑', 1, ''),
(98, 'Admin', 'admin_url', 'admin/navcat/add', NULL, '添加分类', 1, ''),
(99, 'Admin', 'admin_url', 'admin/navcat/add_post', NULL, '提交添加', 1, ''),
(100, 'Admin', 'admin_url', 'admin/menu/index', NULL, '后台菜单', 1, ''),
(101, 'Admin', 'admin_url', 'admin/menu/add', NULL, '添加菜单', 1, ''),
(102, 'Admin', 'admin_url', 'admin/menu/add_post', NULL, '提交添加', 1, ''),
(103, 'Admin', 'admin_url', 'admin/menu/listorders', NULL, '后台菜单排序', 1, ''),
(104, 'Admin', 'admin_url', 'admin/menu/export_menu', NULL, '菜单备份', 1, ''),
(105, 'Admin', 'admin_url', 'admin/menu/edit', NULL, '编辑菜单', 1, ''),
(106, 'Admin', 'admin_url', 'admin/menu/edit_post', NULL, '提交编辑', 1, ''),
(107, 'Admin', 'admin_url', 'admin/menu/delete', NULL, '删除菜单', 1, ''),
(108, 'Admin', 'admin_url', 'admin/menu/lists', NULL, '所有菜单', 1, ''),
(109, 'Admin', 'admin_url', 'admin/setting/default', NULL, '设置', 1, ''),
(110, 'Admin', 'admin_url', 'admin/setting/userdefault', NULL, '个人信息', 1, ''),
(111, 'Admin', 'admin_url', 'admin/user/userinfo', NULL, '修改信息', 1, ''),
(112, 'Admin', 'admin_url', 'admin/user/userinfo_post', NULL, '修改信息提交', 1, ''),
(113, 'Admin', 'admin_url', 'admin/setting/password', NULL, '修改密码', 1, ''),
(114, 'Admin', 'admin_url', 'admin/setting/password_post', NULL, '提交修改', 1, ''),
(115, 'Admin', 'admin_url', 'admin/setting/site', NULL, '网站信息', 1, ''),
(116, 'Admin', 'admin_url', 'admin/setting/site_post', NULL, '提交修改', 1, ''),
(117, 'Admin', 'admin_url', 'admin/route/index', NULL, '路由列表', 1, ''),
(118, 'Admin', 'admin_url', 'admin/route/add', NULL, '路由添加', 1, ''),
(119, 'Admin', 'admin_url', 'admin/route/add_post', NULL, '路由添加提交', 1, ''),
(120, 'Admin', 'admin_url', 'admin/route/edit', NULL, '路由编辑', 1, ''),
(121, 'Admin', 'admin_url', 'admin/route/edit_post', NULL, '路由编辑提交', 1, ''),
(122, 'Admin', 'admin_url', 'admin/route/delete', NULL, '路由删除', 1, ''),
(123, 'Admin', 'admin_url', 'admin/route/ban', NULL, '路由禁止', 1, ''),
(124, 'Admin', 'admin_url', 'admin/route/open', NULL, '路由启用', 1, ''),
(125, 'Admin', 'admin_url', 'admin/route/listorders', NULL, '路由排序', 1, ''),
(126, 'Admin', 'admin_url', 'admin/mailer/default', NULL, '邮箱配置', 1, ''),
(127, 'Admin', 'admin_url', 'admin/mailer/index', NULL, 'SMTP配置', 1, ''),
(128, 'Admin', 'admin_url', 'admin/mailer/index_post', NULL, '提交配置', 1, ''),
(129, 'Admin', 'admin_url', 'admin/mailer/active', NULL, '邮件模板', 1, ''),
(130, 'Admin', 'admin_url', 'admin/mailer/active_post', NULL, '提交模板', 1, ''),
(131, 'Admin', 'admin_url', 'admin/setting/clearcache', NULL, '清除缓存', 1, ''),
(132, 'User', 'admin_url', 'user/indexadmin/default', NULL, '用户管理', 1, ''),
(133, 'User', 'admin_url', 'user/indexadmin/default1', NULL, '用户组', 1, ''),
(134, 'User', 'admin_url', 'user/indexadmin/index', NULL, '本站用户', 1, ''),
(135, 'User', 'admin_url', 'user/indexadmin/ban', NULL, '拉黑会员', 1, ''),
(136, 'User', 'admin_url', 'user/indexadmin/cancelban', NULL, '启用会员', 1, ''),
(137, 'User', 'admin_url', 'user/oauthadmin/index', NULL, '第三方用户', 1, ''),
(138, 'User', 'admin_url', 'user/oauthadmin/delete', NULL, '第三方用户解绑', 1, ''),
(139, 'User', 'admin_url', 'user/indexadmin/default3', NULL, '管理组', 1, ''),
(140, 'Admin', 'admin_url', 'admin/rbac/index', NULL, '角色管理', 1, ''),
(141, 'Admin', 'admin_url', 'admin/rbac/member', NULL, '成员管理', 1, ''),
(142, 'Admin', 'admin_url', 'admin/rbac/authorize', NULL, '权限设置', 1, ''),
(143, 'Admin', 'admin_url', 'admin/rbac/authorize_post', NULL, '提交设置', 1, ''),
(144, 'Admin', 'admin_url', 'admin/rbac/roleedit', NULL, '编辑角色', 1, ''),
(145, 'Admin', 'admin_url', 'admin/rbac/roleedit_post', NULL, '提交编辑', 1, ''),
(146, 'Admin', 'admin_url', 'admin/rbac/roledelete', NULL, '删除角色', 1, ''),
(147, 'Admin', 'admin_url', 'admin/rbac/roleadd', NULL, '添加角色', 1, ''),
(148, 'Admin', 'admin_url', 'admin/rbac/roleadd_post', NULL, '提交添加', 1, ''),
(149, 'Admin', 'admin_url', 'admin/user/index', NULL, '管理员', 1, ''),
(150, 'Admin', 'admin_url', 'admin/user/delete', NULL, '删除管理员', 1, ''),
(151, 'Admin', 'admin_url', 'admin/user/edit', NULL, '管理员编辑', 1, ''),
(152, 'Admin', 'admin_url', 'admin/user/edit_post', NULL, '编辑提交', 1, ''),
(153, 'Admin', 'admin_url', 'admin/user/add', NULL, '管理员添加', 1, ''),
(154, 'Admin', 'admin_url', 'admin/user/add_post', NULL, '添加提交', 1, ''),
(155, 'Admin', 'admin_url', 'admin/plugin/update', NULL, '插件更新', 1, ''),
(156, 'Admin', 'admin_url', 'admin/storage/index', NULL, '文件存储', 1, ''),
(157, 'Admin', 'admin_url', 'admin/storage/setting_post', NULL, '文件存储设置提交', 1, ''),
(158, 'Admin', 'admin_url', 'admin/slide/ban', NULL, '禁用幻灯片', 1, ''),
(159, 'Admin', 'admin_url', 'admin/slide/cancelban', NULL, '启用幻灯片', 1, ''),
(160, 'Admin', 'admin_url', 'admin/user/ban', NULL, '禁用管理员', 1, ''),
(161, 'Admin', 'admin_url', 'admin/user/cancelban', NULL, '启用管理员', 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `sise_comments`
--

CREATE TABLE IF NOT EXISTS `sise_comments` (
`id` bigint(20) unsigned NOT NULL,
  `post_table` varchar(100) NOT NULL COMMENT '评论内容所在表，不带表前缀',
  `post_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '评论内容 id',
  `url` varchar(255) DEFAULT NULL COMMENT '原文地址',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '发表评论的用户id',
  `to_uid` int(11) NOT NULL DEFAULT '0' COMMENT '被评论的用户id',
  `full_name` varchar(50) DEFAULT NULL COMMENT '评论者昵称',
  `email` varchar(255) DEFAULT NULL COMMENT '评论者邮箱',
  `createtime` datetime NOT NULL DEFAULT '2000-01-01 00:00:00' COMMENT '评论时间',
  `content` text NOT NULL COMMENT '评论内容',
  `type` smallint(1) NOT NULL DEFAULT '1' COMMENT '评论类型；1实名评论',
  `parentid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '被回复的评论id',
  `path` varchar(500) DEFAULT NULL,
  `status` smallint(1) NOT NULL DEFAULT '1' COMMENT '状态，1已审核，0未审核'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论表';

-- --------------------------------------------------------

--
-- 表的结构 `sise_common_action_log`
--

CREATE TABLE IF NOT EXISTS `sise_common_action_log` (
`id` int(11) NOT NULL,
  `user` bigint(20) DEFAULT '0' COMMENT '用户id',
  `object` varchar(100) DEFAULT NULL COMMENT '访问对象的id,格式：不带前缀的表名+id;如posts1表示xx_posts表里id为1的记录',
  `action` varchar(50) DEFAULT NULL COMMENT '操作名称；格式规定为：应用名+控制器+操作名；也可自己定义格式只要不发生冲突且惟一；',
  `count` int(11) DEFAULT '0' COMMENT '访问次数',
  `last_time` int(11) DEFAULT '0' COMMENT '最后访问的时间戳',
  `ip` varchar(15) DEFAULT NULL COMMENT '访问者最后访问ip'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='访问记录表';

-- --------------------------------------------------------

--
-- 表的结构 `sise_group`
--

CREATE TABLE IF NOT EXISTS `sise_group` (
`id` bigint(20) unsigned NOT NULL,
  `group_name` varchar(20) NOT NULL COMMENT '小组名称',
  `group_pcount` bigint(10) DEFAULT NULL COMMENT '小组人数',
  `group_topics` varchar(300) DEFAULT NULL COMMENT '小组话题'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sise_guestbook`
--

CREATE TABLE IF NOT EXISTS `sise_guestbook` (
`id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL COMMENT '留言者姓名',
  `email` varchar(100) NOT NULL COMMENT '留言者邮箱',
  `title` varchar(255) DEFAULT NULL COMMENT '留言标题',
  `msg` text NOT NULL COMMENT '留言内容',
  `createtime` datetime NOT NULL COMMENT '留言时间',
  `status` smallint(2) NOT NULL DEFAULT '1' COMMENT '留言状态，1：正常，0：删除'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='留言表';

-- --------------------------------------------------------

--
-- 表的结构 `sise_links`
--

CREATE TABLE IF NOT EXISTS `sise_links` (
`link_id` bigint(20) unsigned NOT NULL,
  `link_url` varchar(255) NOT NULL COMMENT '友情链接地址',
  `link_name` varchar(255) NOT NULL COMMENT '友情链接名称',
  `link_image` varchar(255) DEFAULT NULL COMMENT '友情链接图标',
  `link_target` varchar(25) NOT NULL DEFAULT '_blank' COMMENT '友情链接打开方式',
  `link_description` text NOT NULL COMMENT '友情链接描述',
  `link_status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1显示，0不显示',
  `link_rating` int(11) NOT NULL DEFAULT '0' COMMENT '友情链接评级',
  `link_rel` varchar(255) DEFAULT NULL COMMENT '链接与网站的关系',
  `listorder` int(10) NOT NULL DEFAULT '0' COMMENT '排序'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='友情链接表';

--
-- 转存表中的数据 `sise_links`
--

INSERT INTO `sise_links` (`link_id`, `link_url`, `link_name`, `link_image`, `link_target`, `link_description`, `link_status`, `link_rating`, `link_rel`, `listorder`) VALUES
(1, 'http://www.thinkcmf.com', 'ThinkCMF', '', '_blank', '', 1, 0, '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `sise_menu`
--

CREATE TABLE IF NOT EXISTS `sise_menu` (
`id` smallint(6) unsigned NOT NULL,
  `parentid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `app` char(20) NOT NULL COMMENT '应用名称app',
  `model` char(20) NOT NULL COMMENT '控制器',
  `action` char(20) NOT NULL COMMENT '操作名称',
  `data` char(50) NOT NULL COMMENT '额外参数',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '菜单类型  1：权限认证+菜单；0：只作为菜单',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态，1显示，0不显示',
  `name` varchar(50) NOT NULL COMMENT '菜单名称',
  `icon` varchar(50) DEFAULT NULL COMMENT '菜单图标',
  `remark` varchar(255) NOT NULL COMMENT '备注',
  `listorder` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序ID'
) ENGINE=MyISAM AUTO_INCREMENT=162 DEFAULT CHARSET=utf8 COMMENT='后台菜单表';

--
-- 转存表中的数据 `sise_menu`
--

INSERT INTO `sise_menu` (`id`, `parentid`, `app`, `model`, `action`, `data`, `type`, `status`, `name`, `icon`, `remark`, `listorder`) VALUES
(1, 0, 'Admin', 'Content', 'default', '', 0, 1, '内容管理', 'th', '', 30),
(2, 1, 'Api', 'Guestbookadmin', 'index', '', 1, 1, '所有留言', '', '', 0),
(3, 2, 'Api', 'Guestbookadmin', 'delete', '', 1, 0, '删除网站留言', '', '', 0),
(4, 1, 'Comment', 'Commentadmin', 'index', '', 1, 1, '评论管理', '', '', 0),
(5, 4, 'Comment', 'Commentadmin', 'delete', '', 1, 0, '删除评论', '', '', 0),
(6, 4, 'Comment', 'Commentadmin', 'check', '', 1, 0, '评论审核', '', '', 0),
(7, 1, 'Portal', 'AdminPost', 'index', '', 1, 1, '文章管理', '', '', 1),
(8, 7, 'Portal', 'AdminPost', 'listorders', '', 1, 0, '文章排序', '', '', 0),
(9, 7, 'Portal', 'AdminPost', 'top', '', 1, 0, '文章置顶', '', '', 0),
(10, 7, 'Portal', 'AdminPost', 'recommend', '', 1, 0, '文章推荐', '', '', 0),
(11, 7, 'Portal', 'AdminPost', 'move', '', 1, 0, '批量移动', '', '', 1000),
(12, 7, 'Portal', 'AdminPost', 'check', '', 1, 0, '文章审核', '', '', 1000),
(13, 7, 'Portal', 'AdminPost', 'delete', '', 1, 0, '删除文章', '', '', 1000),
(14, 7, 'Portal', 'AdminPost', 'edit', '', 1, 0, '编辑文章', '', '', 1000),
(15, 14, 'Portal', 'AdminPost', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(16, 7, 'Portal', 'AdminPost', 'add', '', 1, 0, '添加文章', '', '', 1000),
(17, 16, 'Portal', 'AdminPost', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(18, 1, 'Portal', 'AdminTerm', 'index', '', 0, 1, '分类管理', '', '', 2),
(19, 18, 'Portal', 'AdminTerm', 'listorders', '', 1, 0, '文章分类排序', '', '', 0),
(20, 18, 'Portal', 'AdminTerm', 'delete', '', 1, 0, '删除分类', '', '', 1000),
(21, 18, 'Portal', 'AdminTerm', 'edit', '', 1, 0, '编辑分类', '', '', 1000),
(22, 21, 'Portal', 'AdminTerm', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(23, 18, 'Portal', 'AdminTerm', 'add', '', 1, 0, '添加分类', '', '', 1000),
(24, 23, 'Portal', 'AdminTerm', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(25, 1, 'Portal', 'AdminPage', 'index', '', 1, 1, '页面管理', '', '', 3),
(26, 25, 'Portal', 'AdminPage', 'listorders', '', 1, 0, '页面排序', '', '', 0),
(27, 25, 'Portal', 'AdminPage', 'delete', '', 1, 0, '删除页面', '', '', 1000),
(28, 25, 'Portal', 'AdminPage', 'edit', '', 1, 0, '编辑页面', '', '', 1000),
(29, 28, 'Portal', 'AdminPage', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(30, 25, 'Portal', 'AdminPage', 'add', '', 1, 0, '添加页面', '', '', 1000),
(31, 30, 'Portal', 'AdminPage', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(32, 1, 'Admin', 'Recycle', 'default', '', 1, 1, '回收站', '', '', 4),
(33, 32, 'Portal', 'AdminPost', 'recyclebin', '', 1, 1, '文章回收', '', '', 0),
(34, 33, 'Portal', 'AdminPost', 'restore', '', 1, 0, '文章还原', '', '', 1000),
(35, 33, 'Portal', 'AdminPost', 'clean', '', 1, 0, '彻底删除', '', '', 1000),
(36, 32, 'Portal', 'AdminPage', 'recyclebin', '', 1, 1, '页面回收', '', '', 1),
(37, 36, 'Portal', 'AdminPage', 'clean', '', 1, 0, '彻底删除', '', '', 1000),
(38, 36, 'Portal', 'AdminPage', 'restore', '', 1, 0, '页面还原', '', '', 1000),
(39, 0, 'Admin', 'Extension', 'default', '', 0, 1, '扩展工具', 'cloud', '', 40),
(40, 39, 'Admin', 'Backup', 'default', '', 1, 1, '备份管理', '', '', 0),
(41, 40, 'Admin', 'Backup', 'restore', '', 1, 1, '数据还原', '', '', 0),
(42, 40, 'Admin', 'Backup', 'index', '', 1, 1, '数据备份', '', '', 0),
(43, 42, 'Admin', 'Backup', 'index_post', '', 1, 0, '提交数据备份', '', '', 0),
(44, 40, 'Admin', 'Backup', 'download', '', 1, 0, '下载备份', '', '', 1000),
(45, 40, 'Admin', 'Backup', 'del_backup', '', 1, 0, '删除备份', '', '', 1000),
(46, 40, 'Admin', 'Backup', 'import', '', 1, 0, '数据备份导入', '', '', 1000),
(47, 39, 'Admin', 'Plugin', 'index', '', 1, 1, '插件管理', '', '', 0),
(48, 47, 'Admin', 'Plugin', 'toggle', '', 1, 0, '插件启用切换', '', '', 0),
(49, 47, 'Admin', 'Plugin', 'setting', '', 1, 0, '插件设置', '', '', 0),
(50, 49, 'Admin', 'Plugin', 'setting_post', '', 1, 0, '插件设置提交', '', '', 0),
(51, 47, 'Admin', 'Plugin', 'install', '', 1, 0, '插件安装', '', '', 0),
(52, 47, 'Admin', 'Plugin', 'uninstall', '', 1, 0, '插件卸载', '', '', 0),
(53, 39, 'Admin', 'Slide', 'default', '', 1, 1, '幻灯片', '', '', 1),
(54, 53, 'Admin', 'Slide', 'index', '', 1, 1, '幻灯片管理', '', '', 0),
(55, 54, 'Admin', 'Slide', 'listorders', '', 1, 0, '幻灯片排序', '', '', 0),
(56, 54, 'Admin', 'Slide', 'toggle', '', 1, 0, '幻灯片显示切换', '', '', 0),
(57, 54, 'Admin', 'Slide', 'delete', '', 1, 0, '删除幻灯片', '', '', 1000),
(58, 54, 'Admin', 'Slide', 'edit', '', 1, 0, '编辑幻灯片', '', '', 1000),
(59, 58, 'Admin', 'Slide', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(60, 54, 'Admin', 'Slide', 'add', '', 1, 0, '添加幻灯片', '', '', 1000),
(61, 60, 'Admin', 'Slide', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(62, 53, 'Admin', 'Slidecat', 'index', '', 1, 1, '幻灯片分类', '', '', 0),
(63, 62, 'Admin', 'Slidecat', 'delete', '', 1, 0, '删除分类', '', '', 1000),
(64, 62, 'Admin', 'Slidecat', 'edit', '', 1, 0, '编辑分类', '', '', 1000),
(65, 64, 'Admin', 'Slidecat', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(66, 62, 'Admin', 'Slidecat', 'add', '', 1, 0, '添加分类', '', '', 1000),
(67, 66, 'Admin', 'Slidecat', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(68, 39, 'Admin', 'Ad', 'index', '', 1, 1, '网站广告', '', '', 2),
(69, 68, 'Admin', 'Ad', 'toggle', '', 1, 0, '广告显示切换', '', '', 0),
(70, 68, 'Admin', 'Ad', 'delete', '', 1, 0, '删除广告', '', '', 1000),
(71, 68, 'Admin', 'Ad', 'edit', '', 1, 0, '编辑广告', '', '', 1000),
(72, 71, 'Admin', 'Ad', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(73, 68, 'Admin', 'Ad', 'add', '', 1, 0, '添加广告', '', '', 1000),
(74, 73, 'Admin', 'Ad', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(75, 39, 'Admin', 'Link', 'index', '', 0, 1, '友情链接', '', '', 3),
(76, 75, 'Admin', 'Link', 'listorders', '', 1, 0, '友情链接排序', '', '', 0),
(77, 75, 'Admin', 'Link', 'toggle', '', 1, 0, '友链显示切换', '', '', 0),
(78, 75, 'Admin', 'Link', 'delete', '', 1, 0, '删除友情链接', '', '', 1000),
(79, 75, 'Admin', 'Link', 'edit', '', 1, 0, '编辑友情链接', '', '', 1000),
(80, 79, 'Admin', 'Link', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(81, 75, 'Admin', 'Link', 'add', '', 1, 0, '添加友情链接', '', '', 1000),
(82, 81, 'Admin', 'Link', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(83, 39, 'Api', 'Oauthadmin', 'setting', '', 1, 1, '第三方登陆', 'leaf', '', 4),
(84, 83, 'Api', 'Oauthadmin', 'setting_post', '', 1, 0, '提交设置', '', '', 0),
(85, 0, 'Admin', 'Menu', 'default', '', 1, 1, '菜单管理', 'list', '', 20),
(86, 85, 'Admin', 'Navcat', 'default1', '', 1, 1, '前台菜单', '', '', 0),
(87, 86, 'Admin', 'Nav', 'index', '', 1, 1, '菜单管理', '', '', 0),
(88, 87, 'Admin', 'Nav', 'listorders', '', 1, 0, '前台导航排序', '', '', 0),
(89, 87, 'Admin', 'Nav', 'delete', '', 1, 0, '删除菜单', '', '', 1000),
(90, 87, 'Admin', 'Nav', 'edit', '', 1, 0, '编辑菜单', '', '', 1000),
(91, 90, 'Admin', 'Nav', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(92, 87, 'Admin', 'Nav', 'add', '', 1, 0, '添加菜单', '', '', 1000),
(93, 92, 'Admin', 'Nav', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(94, 86, 'Admin', 'Navcat', 'index', '', 1, 1, '菜单分类', '', '', 0),
(95, 94, 'Admin', 'Navcat', 'delete', '', 1, 0, '删除分类', '', '', 1000),
(96, 94, 'Admin', 'Navcat', 'edit', '', 1, 0, '编辑分类', '', '', 1000),
(97, 96, 'Admin', 'Navcat', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(98, 94, 'Admin', 'Navcat', 'add', '', 1, 0, '添加分类', '', '', 1000),
(99, 98, 'Admin', 'Navcat', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(100, 85, 'Admin', 'Menu', 'index', '', 1, 1, '后台菜单', '', '', 0),
(101, 100, 'Admin', 'Menu', 'add', '', 1, 0, '添加菜单', '', '', 0),
(102, 101, 'Admin', 'Menu', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(103, 100, 'Admin', 'Menu', 'listorders', '', 1, 0, '后台菜单排序', '', '', 0),
(104, 100, 'Admin', 'Menu', 'export_menu', '', 1, 0, '菜单备份', '', '', 1000),
(105, 100, 'Admin', 'Menu', 'edit', '', 1, 0, '编辑菜单', '', '', 1000),
(106, 105, 'Admin', 'Menu', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(107, 100, 'Admin', 'Menu', 'delete', '', 1, 0, '删除菜单', '', '', 1000),
(108, 100, 'Admin', 'Menu', 'lists', '', 1, 0, '所有菜单', '', '', 1000),
(109, 0, 'Admin', 'Setting', 'default', '', 0, 1, '设置', 'cogs', '', 0),
(110, 109, 'Admin', 'Setting', 'userdefault', '', 0, 1, '个人信息', '', '', 0),
(111, 110, 'Admin', 'User', 'userinfo', '', 1, 1, '修改信息', '', '', 0),
(112, 111, 'Admin', 'User', 'userinfo_post', '', 1, 0, '修改信息提交', '', '', 0),
(113, 110, 'Admin', 'Setting', 'password', '', 1, 1, '修改密码', '', '', 0),
(114, 113, 'Admin', 'Setting', 'password_post', '', 1, 0, '提交修改', '', '', 0),
(115, 109, 'Admin', 'Setting', 'site', '', 1, 1, '网站信息', '', '', 0),
(116, 115, 'Admin', 'Setting', 'site_post', '', 1, 0, '提交修改', '', '', 0),
(117, 115, 'Admin', 'Route', 'index', '', 1, 0, '路由列表', '', '', 0),
(118, 115, 'Admin', 'Route', 'add', '', 1, 0, '路由添加', '', '', 0),
(119, 118, 'Admin', 'Route', 'add_post', '', 1, 0, '路由添加提交', '', '', 0),
(120, 115, 'Admin', 'Route', 'edit', '', 1, 0, '路由编辑', '', '', 0),
(121, 120, 'Admin', 'Route', 'edit_post', '', 1, 0, '路由编辑提交', '', '', 0),
(122, 115, 'Admin', 'Route', 'delete', '', 1, 0, '路由删除', '', '', 0),
(123, 115, 'Admin', 'Route', 'ban', '', 1, 0, '路由禁止', '', '', 0),
(124, 115, 'Admin', 'Route', 'open', '', 1, 0, '路由启用', '', '', 0),
(125, 115, 'Admin', 'Route', 'listorders', '', 1, 0, '路由排序', '', '', 0),
(126, 109, 'Admin', 'Mailer', 'default', '', 1, 1, '邮箱配置', '', '', 0),
(127, 126, 'Admin', 'Mailer', 'index', '', 1, 1, 'SMTP配置', '', '', 0),
(128, 127, 'Admin', 'Mailer', 'index_post', '', 1, 0, '提交配置', '', '', 0),
(129, 126, 'Admin', 'Mailer', 'active', '', 1, 1, '邮件模板', '', '', 0),
(130, 129, 'Admin', 'Mailer', 'active_post', '', 1, 0, '提交模板', '', '', 0),
(131, 109, 'Admin', 'Setting', 'clearcache', '', 1, 1, '清除缓存', '', '', 1),
(132, 0, 'User', 'Indexadmin', 'default', '', 1, 1, '用户管理', 'group', '', 10),
(133, 132, 'User', 'Indexadmin', 'default1', '', 1, 1, '用户组', '', '', 0),
(134, 133, 'User', 'Indexadmin', 'index', '', 1, 1, '本站用户', 'leaf', '', 0),
(135, 134, 'User', 'Indexadmin', 'ban', '', 1, 0, '拉黑会员', '', '', 0),
(136, 134, 'User', 'Indexadmin', 'cancelban', '', 1, 0, '启用会员', '', '', 0),
(137, 133, 'User', 'Oauthadmin', 'index', '', 1, 1, '第三方用户', 'leaf', '', 0),
(138, 137, 'User', 'Oauthadmin', 'delete', '', 1, 0, '第三方用户解绑', '', '', 0),
(139, 132, 'User', 'Indexadmin', 'default3', '', 1, 1, '管理组', '', '', 0),
(140, 139, 'Admin', 'Rbac', 'index', '', 1, 1, '角色管理', '', '', 0),
(141, 140, 'Admin', 'Rbac', 'member', '', 1, 0, '成员管理', '', '', 1000),
(142, 140, 'Admin', 'Rbac', 'authorize', '', 1, 0, '权限设置', '', '', 1000),
(143, 142, 'Admin', 'Rbac', 'authorize_post', '', 1, 0, '提交设置', '', '', 0),
(144, 140, 'Admin', 'Rbac', 'roleedit', '', 1, 0, '编辑角色', '', '', 1000),
(145, 144, 'Admin', 'Rbac', 'roleedit_post', '', 1, 0, '提交编辑', '', '', 0),
(146, 140, 'Admin', 'Rbac', 'roledelete', '', 1, 1, '删除角色', '', '', 1000),
(147, 140, 'Admin', 'Rbac', 'roleadd', '', 1, 1, '添加角色', '', '', 1000),
(148, 147, 'Admin', 'Rbac', 'roleadd_post', '', 1, 0, '提交添加', '', '', 0),
(149, 139, 'Admin', 'User', 'index', '', 1, 1, '管理员', '', '', 0),
(150, 149, 'Admin', 'User', 'delete', '', 1, 0, '删除管理员', '', '', 1000),
(151, 149, 'Admin', 'User', 'edit', '', 1, 0, '管理员编辑', '', '', 1000),
(152, 151, 'Admin', 'User', 'edit_post', '', 1, 0, '编辑提交', '', '', 0),
(153, 149, 'Admin', 'User', 'add', '', 1, 0, '管理员添加', '', '', 1000),
(154, 153, 'Admin', 'User', 'add_post', '', 1, 0, '添加提交', '', '', 0),
(155, 47, 'Admin', 'Plugin', 'update', '', 1, 0, '插件更新', '', '', 0),
(156, 39, 'Admin', 'Storage', 'index', '', 1, 1, '文件存储', '', '', 0),
(157, 156, 'Admin', 'Storage', 'setting_post', '', 1, 0, '文件存储设置提交', '', '', 0),
(158, 54, 'Admin', 'Slide', 'ban', '', 1, 0, '禁用幻灯片', '', '', 0),
(159, 54, 'Admin', 'Slide', 'cancelban', '', 1, 0, '启用幻灯片', '', '', 0),
(160, 149, 'Admin', 'User', 'ban', '', 1, 0, '禁用管理员', '', '', 0),
(161, 149, 'Admin', 'User', 'cancelban', '', 1, 0, '启用管理员', '', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `sise_nav`
--

CREATE TABLE IF NOT EXISTS `sise_nav` (
`id` int(11) NOT NULL,
  `cid` int(11) NOT NULL COMMENT '导航分类 id',
  `parentid` int(11) NOT NULL COMMENT '导航父 id',
  `label` varchar(255) NOT NULL COMMENT '导航标题',
  `target` varchar(50) DEFAULT NULL COMMENT '打开方式',
  `href` varchar(255) NOT NULL COMMENT '导航链接',
  `icon` varchar(255) NOT NULL COMMENT '导航图标',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1显示，0不显示',
  `listorder` int(6) DEFAULT '0' COMMENT '排序',
  `path` varchar(255) NOT NULL DEFAULT '0' COMMENT '层级关系'
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='前台导航表';

--
-- 转存表中的数据 `sise_nav`
--

INSERT INTO `sise_nav` (`id`, `cid`, `parentid`, `label`, `target`, `href`, `icon`, `status`, `listorder`, `path`) VALUES
(1, 1, 0, '首页', '', 'home', '', 1, 0, '0-1'),
(2, 1, 0, '列表演示', '', 'a:2:{s:6:"action";s:17:"Portal/List/index";s:5:"param";a:1:{s:2:"id";s:1:"1";}}', '', 1, 0, '0-2'),
(3, 1, 0, '瀑布流', '', 'a:2:{s:6:"action";s:17:"Portal/List/index";s:5:"param";a:1:{s:2:"id";s:1:"2";}}', '', 1, 0, '0-3');

-- --------------------------------------------------------

--
-- 表的结构 `sise_nav_cat`
--

CREATE TABLE IF NOT EXISTS `sise_nav_cat` (
`navcid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '导航分类名',
  `active` int(1) NOT NULL DEFAULT '1' COMMENT '是否显示，1显示，0不显示',
  `remark` text COMMENT '备注'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='前台导航分类表';

--
-- 转存表中的数据 `sise_nav_cat`
--

INSERT INTO `sise_nav_cat` (`navcid`, `name`, `active`, `remark`) VALUES
(1, '主导航', 1, '主导航');

-- --------------------------------------------------------

--
-- 表的结构 `sise_oauth_user`
--

CREATE TABLE IF NOT EXISTS `sise_oauth_user` (
`id` int(20) NOT NULL,
  `from` varchar(20) NOT NULL COMMENT '用户来源key',
  `name` varchar(30) NOT NULL COMMENT '第三方昵称',
  `head_img` varchar(200) NOT NULL COMMENT '头像',
  `uid` int(20) NOT NULL COMMENT '关联的本站用户id',
  `create_time` datetime NOT NULL COMMENT '绑定时间',
  `last_login_time` datetime NOT NULL COMMENT '最后登录时间',
  `last_login_ip` varchar(16) NOT NULL COMMENT '最后登录ip',
  `login_times` int(6) NOT NULL COMMENT '登录次数',
  `status` tinyint(2) NOT NULL,
  `access_token` varchar(512) NOT NULL,
  `expires_date` int(11) NOT NULL COMMENT 'access_token过期时间',
  `openid` varchar(40) NOT NULL COMMENT '第三方用户id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='第三方用户表';

-- --------------------------------------------------------

--
-- 表的结构 `sise_options`
--

CREATE TABLE IF NOT EXISTS `sise_options` (
`option_id` bigint(20) unsigned NOT NULL,
  `option_name` varchar(64) NOT NULL COMMENT '配置名',
  `option_value` longtext NOT NULL COMMENT '配置值',
  `autoload` int(2) NOT NULL DEFAULT '1' COMMENT '是否自动加载'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='全站配置表';

--
-- 转存表中的数据 `sise_options`
--

INSERT INTO `sise_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'member_email_active', '{"title":"ThinkCMF\\u90ae\\u4ef6\\u6fc0\\u6d3b\\u901a\\u77e5.","template":"<p>\\u672c\\u90ae\\u4ef6\\u6765\\u81ea<a href=\\"http:\\/\\/www.thinkcmf.com\\">ThinkCMF<\\/a><br\\/><br\\/>&nbsp; &nbsp;<strong>---------------<\\/strong><br\\/>&nbsp; &nbsp;<strong>\\u5e10\\u53f7\\u6fc0\\u6d3b\\u8bf4\\u660e<\\/strong><br\\/>&nbsp; &nbsp;<strong>---------------<\\/strong><br\\/><br\\/>&nbsp; &nbsp; \\u5c0a\\u656c\\u7684<span style=\\"FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)\\">#username#\\uff0c\\u60a8\\u597d\\u3002<\\/span>\\u5982\\u679c\\u60a8\\u662fThinkCMF\\u7684\\u65b0\\u7528\\u6237\\uff0c\\u6216\\u5728\\u4fee\\u6539\\u60a8\\u7684\\u6ce8\\u518cEmail\\u65f6\\u4f7f\\u7528\\u4e86\\u672c\\u5730\\u5740\\uff0c\\u6211\\u4eec\\u9700\\u8981\\u5bf9\\u60a8\\u7684\\u5730\\u5740\\u6709\\u6548\\u6027\\u8fdb\\u884c\\u9a8c\\u8bc1\\u4ee5\\u907f\\u514d\\u5783\\u573e\\u90ae\\u4ef6\\u6216\\u5730\\u5740\\u88ab\\u6ee5\\u7528\\u3002<br\\/>&nbsp; &nbsp; \\u60a8\\u53ea\\u9700\\u70b9\\u51fb\\u4e0b\\u9762\\u7684\\u94fe\\u63a5\\u5373\\u53ef\\u6fc0\\u6d3b\\u60a8\\u7684\\u5e10\\u53f7\\uff1a<br\\/>&nbsp; &nbsp; <a title=\\"\\" href=\\"http:\\/\\/#link#\\" target=\\"_self\\">http:\\/\\/#link#<\\/a><br\\/>&nbsp; &nbsp; (\\u5982\\u679c\\u4e0a\\u9762\\u4e0d\\u662f\\u94fe\\u63a5\\u5f62\\u5f0f\\uff0c\\u8bf7\\u5c06\\u8be5\\u5730\\u5740\\u624b\\u5de5\\u7c98\\u8d34\\u5230\\u6d4f\\u89c8\\u5668\\u5730\\u5740\\u680f\\u518d\\u8bbf\\u95ee)<br\\/>&nbsp; &nbsp; \\u611f\\u8c22\\u60a8\\u7684\\u8bbf\\u95ee\\uff0c\\u795d\\u60a8\\u4f7f\\u7528\\u6109\\u5feb\\uff01<br\\/><br\\/>&nbsp; &nbsp; \\u6b64\\u81f4<br\\/>&nbsp; &nbsp; ThinkCMF \\u7ba1\\u7406\\u56e2\\u961f.<\\/p>"}', 1),
(2, 'site_options', '            {\n            		"site_name":"CXCL工作室作品-sise比赛",\n            		"site_host":"http://119.29.148.134/2016Sise",\n            		"site_root":"",\n            		"site_icp":"",\n            		"site_admin_email":"haiku888@foxmail.com",\n            		"site_tongji":"",\n            		"site_copyright":"",\n            		"site_seo_title":"CXCL工作室作品-sise比赛",\n            		"site_seo_keywords":"华软,sise,网设,比赛,CXCL工作室",\n            		"site_seo_description":"CXCL工作室作品-2016sise比赛"\n        }', 1);

-- --------------------------------------------------------

--
-- 表的结构 `sise_organization`
--

CREATE TABLE IF NOT EXISTS `sise_organization` (
`id` bigint(20) unsigned NOT NULL,
  `name` varchar(60) NOT NULL COMMENT '组织名称',
  `password` varchar(64) NOT NULL COMMENT '登录密码',
  `manager_name` varchar(60) NOT NULL COMMENT '管理员姓名',
  `email` varchar(100) NOT NULL COMMENT '管理员邮箱',
  `mobile` varchar(20) NOT NULL COMMENT '管理员手机',
  `type` varchar(20) NOT NULL COMMENT '组织类型'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sise_plugins`
--

CREATE TABLE IF NOT EXISTS `sise_plugins` (
`id` int(11) unsigned NOT NULL COMMENT '自增id',
  `name` varchar(50) NOT NULL COMMENT '插件名，英文',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '插件名称',
  `description` text COMMENT '插件描述',
  `type` tinyint(2) DEFAULT '0' COMMENT '插件类型, 1:网站；8;微信',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态；1开启；',
  `config` text COMMENT '插件配置',
  `hooks` varchar(255) DEFAULT NULL COMMENT '实现的钩子;以“，”分隔',
  `has_admin` tinyint(2) DEFAULT '0' COMMENT '插件是否有后台管理界面',
  `author` varchar(50) DEFAULT '' COMMENT '插件作者',
  `version` varchar(20) DEFAULT '' COMMENT '插件版本号',
  `createtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '插件安装时间',
  `listorder` smallint(6) NOT NULL DEFAULT '0' COMMENT '排序'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='插件表';

-- --------------------------------------------------------

--
-- 表的结构 `sise_posts`
--

CREATE TABLE IF NOT EXISTS `sise_posts` (
`id` bigint(20) unsigned NOT NULL,
  `post_author` bigint(20) unsigned DEFAULT '0' COMMENT '发表者id',
  `post_keywords` varchar(150) NOT NULL COMMENT 'seo keywords',
  `post_source` varchar(150) DEFAULT NULL COMMENT '转载文章的来源',
  `post_date` datetime DEFAULT '2000-01-01 00:00:00' COMMENT 'post创建日期，永久不变，一般不显示给用户',
  `post_content` longtext COMMENT 'post内容',
  `post_title` text COMMENT 'post标题',
  `post_excerpt` text COMMENT 'post摘要',
  `post_status` int(2) DEFAULT '1' COMMENT 'post状态，1已审核，0未审核',
  `comment_status` int(2) DEFAULT '1' COMMENT '评论状态，1允许，0不允许',
  `post_modified` datetime DEFAULT '2000-01-01 00:00:00' COMMENT 'post更新时间，可在前台修改，显示给用户',
  `post_content_filtered` longtext,
  `post_parent` bigint(20) unsigned DEFAULT '0' COMMENT 'post的父级post id,表示post层级关系',
  `post_type` int(2) DEFAULT NULL,
  `post_mime_type` varchar(100) DEFAULT '',
  `comment_count` bigint(20) DEFAULT '0',
  `smeta` text COMMENT 'post的扩展字段，保存相关扩展属性，如缩略图；格式为json',
  `post_hits` int(11) DEFAULT '0' COMMENT 'post点击数，查看数',
  `post_like` int(11) DEFAULT '0' COMMENT 'post赞数',
  `istop` tinyint(1) NOT NULL DEFAULT '0' COMMENT '置顶 1置顶； 0不置顶',
  `recommended` tinyint(1) NOT NULL DEFAULT '0' COMMENT '推荐 1推荐 0不推荐'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Portal文章表';

-- --------------------------------------------------------

--
-- 表的结构 `sise_role`
--

CREATE TABLE IF NOT EXISTS `sise_role` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(20) NOT NULL COMMENT '角色名称',
  `pid` smallint(6) DEFAULT NULL COMMENT '父角色ID',
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT '状态',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `listorder` int(3) NOT NULL DEFAULT '0' COMMENT '排序字段'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='角色表';

--
-- 转存表中的数据 `sise_role`
--

INSERT INTO `sise_role` (`id`, `name`, `pid`, `status`, `remark`, `create_time`, `update_time`, `listorder`) VALUES
(1, '超级管理员', 0, 1, '拥有网站最高管理员权限！', 1329633709, 1329633709, 0);

-- --------------------------------------------------------

--
-- 表的结构 `sise_role_user`
--

CREATE TABLE IF NOT EXISTS `sise_role_user` (
  `role_id` int(11) unsigned DEFAULT '0' COMMENT '角色 id',
  `user_id` int(11) DEFAULT '0' COMMENT '用户id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户角色对应表';

-- --------------------------------------------------------

--
-- 表的结构 `sise_route`
--

CREATE TABLE IF NOT EXISTS `sise_route` (
`id` int(11) NOT NULL COMMENT '路由id',
  `full_url` varchar(255) DEFAULT NULL COMMENT '完整url， 如：portal/list/index?id=1',
  `url` varchar(255) DEFAULT NULL COMMENT '实际显示的url',
  `listorder` int(5) DEFAULT '0' COMMENT '排序，优先级，越小优先级越高',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态，1：启用 ;0：不启用'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='url路由表';

-- --------------------------------------------------------

--
-- 表的结构 `sise_slide`
--

CREATE TABLE IF NOT EXISTS `sise_slide` (
`slide_id` bigint(20) unsigned NOT NULL,
  `slide_cid` int(11) NOT NULL COMMENT '幻灯片分类 id',
  `slide_name` varchar(255) NOT NULL COMMENT '幻灯片名称',
  `slide_pic` varchar(255) DEFAULT NULL COMMENT '幻灯片图片',
  `slide_url` varchar(255) DEFAULT NULL COMMENT '幻灯片链接',
  `slide_des` varchar(255) DEFAULT NULL COMMENT '幻灯片描述',
  `slide_content` text COMMENT '幻灯片内容',
  `slide_status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1显示，0不显示',
  `listorder` int(10) DEFAULT '0' COMMENT '排序'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='幻灯片表';

-- --------------------------------------------------------

--
-- 表的结构 `sise_slide_cat`
--

CREATE TABLE IF NOT EXISTS `sise_slide_cat` (
`cid` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL COMMENT '幻灯片分类',
  `cat_idname` varchar(255) NOT NULL COMMENT '幻灯片分类标识',
  `cat_remark` text COMMENT '分类备注',
  `cat_status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1显示，0不显示'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='幻灯片分类表';

-- --------------------------------------------------------

--
-- 表的结构 `sise_terms`
--

CREATE TABLE IF NOT EXISTS `sise_terms` (
`term_id` bigint(20) unsigned NOT NULL COMMENT '分类id',
  `name` varchar(200) DEFAULT NULL COMMENT '分类名称',
  `slug` varchar(200) DEFAULT '',
  `taxonomy` varchar(32) DEFAULT NULL COMMENT '分类类型',
  `description` longtext COMMENT '分类描述',
  `parent` bigint(20) unsigned DEFAULT '0' COMMENT '分类父id',
  `count` bigint(20) DEFAULT '0' COMMENT '分类文章数',
  `path` varchar(500) DEFAULT NULL COMMENT '分类层级关系路径',
  `seo_title` varchar(500) DEFAULT NULL,
  `seo_keywords` varchar(500) DEFAULT NULL,
  `seo_description` varchar(500) DEFAULT NULL,
  `list_tpl` varchar(50) DEFAULT NULL COMMENT '分类列表模板',
  `one_tpl` varchar(50) DEFAULT NULL COMMENT '分类文章页模板',
  `listorder` int(5) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1发布，0不发布'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Portal 文章分类表';

--
-- 转存表中的数据 `sise_terms`
--

INSERT INTO `sise_terms` (`term_id`, `name`, `slug`, `taxonomy`, `description`, `parent`, `count`, `path`, `seo_title`, `seo_keywords`, `seo_description`, `list_tpl`, `one_tpl`, `listorder`, `status`) VALUES
(1, '列表演示', '', 'article', '', 0, 0, '0-1', '', '', '', 'list', 'article', 0, 1),
(2, '瀑布流', '', 'article', '', 0, 0, '0-2', '', '', '', 'list_masonry', 'article', 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `sise_term_relationships`
--

CREATE TABLE IF NOT EXISTS `sise_term_relationships` (
`tid` bigint(20) NOT NULL,
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT 'posts表里文章id',
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '分类id',
  `listorder` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1发布，0不发布'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Portal 文章分类对应表';

-- --------------------------------------------------------

--
-- 表的结构 `sise_topic`
--

CREATE TABLE IF NOT EXISTS `sise_topic` (
`id` bigint(20) unsigned NOT NULL,
  `title` varchar(10) NOT NULL COMMENT '话题标题',
  `content` varchar(6000) NOT NULL COMMENT '话题内容',
  `author` varchar(60) DEFAULT NULL COMMENT '作者',
  `praise_count` int(11) DEFAULT NULL COMMENT '点赞人数',
  `group` varchar(10) DEFAULT NULL COMMENT '来自小组'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sise_users`
--

CREATE TABLE IF NOT EXISTS `sise_users` (
`id` bigint(20) unsigned NOT NULL,
  `user_login` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `user_pass` varchar(64) NOT NULL DEFAULT '' COMMENT '登录密码；sp_password加密',
  `user_nicename` varchar(50) NOT NULL DEFAULT '' COMMENT '用户美名',
  `user_email` varchar(100) NOT NULL DEFAULT '' COMMENT '登录邮箱',
  `user_url` varchar(100) NOT NULL DEFAULT '' COMMENT '用户个人网站',
  `avatar` varchar(255) DEFAULT NULL COMMENT '用户头像，相对于upload/avatar目录',
  `sex` smallint(1) DEFAULT '0' COMMENT '性别；0：保密，1：男；2：女',
  `birthday` date DEFAULT NULL COMMENT '生日',
  `signature` varchar(255) DEFAULT NULL COMMENT '个性签名',
  `last_login_ip` varchar(16) DEFAULT NULL COMMENT '最后登录ip',
  `last_login_time` datetime NOT NULL DEFAULT '2000-01-01 00:00:00' COMMENT '最后登录时间',
  `create_time` datetime NOT NULL DEFAULT '2000-01-01 00:00:00' COMMENT '注册时间',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '' COMMENT '激活码',
  `user_status` int(11) NOT NULL DEFAULT '1' COMMENT '用户状态 0：禁用； 1：正常 ；2：未验证',
  `score` int(11) NOT NULL DEFAULT '0' COMMENT '用户积分',
  `user_type` smallint(1) DEFAULT '1' COMMENT '用户类型，1:admin ;2:会员',
  `coin` int(11) NOT NULL DEFAULT '0' COMMENT '金币',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '手机号',
  `skill` varchar(100) DEFAULT '' COMMENT '用户擅长',
  `volunteer_time` varchar(60) DEFAULT NULL COMMENT '志愿时间',
  `volunteer_area` varchar(60) DEFAULT NULL COMMENT '服务区域'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- 转存表中的数据 `sise_users`
--

INSERT INTO `sise_users` (`id`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `avatar`, `sex`, `birthday`, `signature`, `last_login_ip`, `last_login_time`, `create_time`, `user_activation_key`, `user_status`, `score`, `user_type`, `coin`, `mobile`, `skill`, `volunteer_time`, `volunteer_area`) VALUES
(1, 'admin', '###42e0497c116c196efa8dbabdc11a8569', 'admin', 'haiku888@foxmail.com', '', NULL, 0, NULL, NULL, '0.0.0.0', '2016-03-17 04:34:21', '2016-03-17 04:34:21', '', 1, 0, 1, 0, '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `sise_user_favorites`
--

CREATE TABLE IF NOT EXISTS `sise_user_favorites` (
`id` int(11) NOT NULL,
  `uid` bigint(20) DEFAULT NULL COMMENT '用户 id',
  `title` varchar(255) DEFAULT NULL COMMENT '收藏内容的标题',
  `url` varchar(255) DEFAULT NULL COMMENT '收藏内容的原文地址，不带域名',
  `description` varchar(500) DEFAULT NULL COMMENT '收藏内容的描述',
  `table` varchar(50) DEFAULT NULL COMMENT '收藏实体以前所在表，不带前缀',
  `object_id` int(11) DEFAULT NULL COMMENT '收藏内容原来的主键id',
  `createtime` int(11) DEFAULT NULL COMMENT '收藏时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户收藏表';

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `学号` varchar(20) NOT NULL DEFAULT '',
  `姓名` varchar(255) DEFAULT NULL,
  `性别` varchar(255) DEFAULT NULL,
  `年龄` int(11) DEFAULT NULL,
  `专业` varchar(255) DEFAULT NULL,
  `宿舍` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`学号`, `姓名`, `性别`, `年龄`, `专业`, `宿舍`) VALUES
('0840111101', '杨清舜', '男', 22, '软件工程(网络应用软件开发) ', '红棉楼 R520'),
('0840111102', '韦晓钦', '男', 21, '软件工程(网络应用软件开发) ', '红棉楼 R520'),
('0840111103', '吴思浩', '男', 20, '软件工程(网络应用软件开发) ', '绿杨楼1 G331'),
('0840111104', '陈龙灿', '男', 21, '软件工程(网络应用软件开发) ', '红棉楼 R520'),
('0840111105', '陈昆', '男', 20, '软件工程(网络应用软件开发) ', '红棉楼 R520'),
('0840111106', '王华锋', '男', 20, '软件工程(网络应用软件开发) ', '绿杨楼1 G331'),
('0840111107', '刘敦杰', '男', 20, '软件工程(网络应用软件开发) ', '红棉楼 R521'),
('0840111108', '梁文仲', '男', 20, '软件工程(网络应用软件开发) ', '红棉楼 R521'),
('0840111110', '李浩彬', '男', 21, '软件工程(网络应用软件开发) ', '红棉楼 R521'),
('0840111111', '王敏', '男', 20, '软件工程(网络应用软件开发) ', '红棉楼 R521'),
('0840111112', '许哲淳', '女', 21, '软件工程(网络应用软件开发) ', '橙萱居2 T2106'),
('0840111113', '潘海彬', '男', 20, '软件工程(网络应用软件开发) ', '红棉楼 R522'),
('0840111114', '黎锋光', '男', 20, '软件工程(网络应用软件开发) ', '红棉楼 R522'),
('0840111115', '张理然', '男', 20, '软件工程(网络应用软件开发) ', '红棉楼 R522'),
('0840111116', '黄兆君', '男', 20, '软件工程(网络应用软件开发) ', '红棉楼 R522'),
('0840111117', '曹志荣', '男', 20, '软件工程(网络应用软件开发) ', '红棉楼 R523'),
('0840111118', '梁文辉', '男', 21, '软件工程(网络应用软件开发) ', '绿杨楼1 G331'),
('0840111119', '柴伟龙', '男', 21, '软件工程(网络应用软件开发) ', '红棉楼 R523'),
('0840111120', '凌上军', '男', 20, '软件工程(网络应用软件开发) ', '红棉楼 R523'),
('0840111121', '黄辰德', '男', 21, '软件工程(网络应用软件开发) ', '红棉楼 R523'),
('0840111123', '林悦伟', '男', 21, '软件工程(网络应用软件开发) ', '绿杨楼1 G331'),
('0840111124', '黄小刚', '男', 22, '软件工程(网络应用软件开发) ', '红棉楼 R524'),
('0840111125', '林显拔', '男', 21, '软件工程(网络应用软件开发) ', '红棉楼 R524'),
('0840111126', '黄振业', '男', 20, '软件工程(网络应用软件开发) ', '绿杨楼1 G332'),
('0840111127', '黄卓尔', '男', 21, '软件工程(网络应用软件开发) ', '绿杨楼1 G332'),
('0840111128', '袁子健', '男', 20, '软件工程(网络应用软件开发) ', '红棉楼 R524'),
('0840111129', '张奋', '男', 21, '软件工程(网络应用软件开发) ', '绿杨楼1 G332'),
('0840111130', '余兆钧', '男', 22, '软件工程(网络应用软件开发) ', '绿杨楼1 G332'),
('0840111131', '幸俊毅', '男', 20, '软件工程(网络应用软件开发) ', '绿杨楼1 G333'),
('0840111132', '周均霭', '男', 22, '软件工程(网络应用软件开发) ', '绿杨楼1 G333'),
('0840111133', '陈灏', '男', 21, '软件工程(网络应用软件开发) ', '绿杨楼1 G333'),
('0840111134', '马泽森', '男', 20, '软件工程(网络应用软件开发) ', '绿杨楼1 G333'),
('0840111135', '林豪荣', '男', 21, '软件工程(网络应用软件开发) ', '绿杨楼1 G334'),
('0840111136', '陆恩泽', '男', 19, '软件工程(网络应用软件开发) ', '绿杨楼1 G334'),
('0840111137', '刘志伟', '男', 20, '软件工程(网络应用软件开发) ', '绿杨楼1 G334'),
('0840111138', '黄芳', '女', 20, '软件工程(网络应用软件开发) ', '橙萱居2 T2106'),
('0840111139', '范芳振', '男', 20, '软件工程(网络应用软件开发) ', '绿杨楼1 G334'),
('0840111140', '颜俊滨', '男', 20, '软件工程(网络应用软件开发) ', '绿杨楼1 G335'),
('0840111141', '徐显添', '男', 20, '软件工程(网络应用软件开发) ', '绿杨楼1 G335'),
('0840111142', '谭启朝', '男', 20, '软件工程(网络应用软件开发) ', '绿杨楼1 G335'),
('0840111143', '陈介焕', '男', 22, '软件工程(网络应用软件开发) ', '绿杨楼1 G335'),
('0840111144', '陈秋杰', '男', 20, '软件工程(网络应用软件开发) ', '绿杨楼1 G336'),
('0840111145', '陈煜志', '男', 19, '软件工程(网络应用软件开发) ', '绿杨楼1 G336'),
('0840111146', '高仁杰', '男', 22, '软件工程(网络应用软件开发) ', '绿杨楼1 G336'),
('0840111147', '房文明', '男', 21, '软件工程(网络应用软件开发) ', '绿杨楼1 G336'),
('0840111148', '许超', '男', 22, '软件工程(网络应用软件开发) ', '绿杨楼1 G337'),
('0840111149', '白伟泉', '男', 20, '软件工程(网络应用软件开发) ', '绿杨楼1 G337'),
('0840111150', '翟冠荣', '男', 20, '软件工程(网络应用软件开发) ', '绿杨楼1 G337'),
('0840111151', '许海涛', '男', 21, '软件工程(网络应用软件开发) ', '绿杨楼1 G337'),
('0840111152', '梁剑华', '男', 21, '软件工程(网络应用软件开发) ', '绿杨楼1 G338'),
('0840111153', '何世贤', '男', 23, '软件工程(网络应用软件开发) ', '绿杨楼1 G338'),
('0840111155', '李德财', '男', 22, '软件工程(网络应用软件开发) ', '绿杨楼1 G338'),
('0840111158', '罗文飞', '男', 22, '软件工程(网络应用软件开发) ', '绿杨楼1 G339'),
('0840111159', '邓霞兰', '女', 21, '软件工程(网络应用软件开发) ', '橙萱居2 T2106'),
('0840111161', '谭振勇', '男', 21, '软件工程(网络应用软件开发) ', '绿杨楼1 G340'),
('0840111162', '段卓', '男', 20, '软件工程(网络应用软件开发) ', '绿杨楼1 G340'),
('0840111163', '林涛', '男', 21, '软件工程(网络应用软件开发) ', '绿杨楼1 G224'),
('0840111164', '陈宏彬', '男', 21, '软件工程(网络应用软件开发) ', '绿杨楼1 G224'),
('0840111166', '侯宇松', '男', 21, '软件工程(网络应用软件开发) ', '绿杨楼1 G224'),
('0840111167', '苏灿辉', '男', 21, '软件工程(网络应用软件开发) ', '绿杨楼1 G225'),
('0840111168', '钟沛伦', '男', 21, '软件工程(网络应用软件开发) ', '绿杨楼1 G225'),
('0840111169', '黄永锋', '男', 20, '软件工程(网络应用软件开发) ', '绿杨楼1 G225'),
('0840111170', '林瑞焊', '男', 22, '软件工程(网络应用软件开发) ', '绿杨楼1 G225'),
('0840111171', '何彬', '男', 20, '软件工程(网络应用软件开发) ', '绿杨楼1 G340'),
('0840111172', '何开翱', '男', 21, '软件工程(网络应用软件开发) ', '绿杨楼1 G223'),
('0840111173', '郑梓斌', '男', 21, '软件工程(网络应用软件开发) ', '绿杨楼1 G223'),
('0840111174', '黄升福', '男', 20, '软件工程(网络应用软件开发) ', '绿杨楼1 G223'),
('0840112101', '王思博', '男', 19, '软件工程(软件开发) ', '红棉楼 R513'),
('0840112102', '陈少滨', '男', 20, '软件工程(软件开发) ', '红棉楼 R510'),
('0840112103', '李钧', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G232'),
('0840112104', '陈杰鹏', '男', 20, '软件工程(软件开发) ', '红棉楼 R510'),
('0840112105', '袁伟良', '男', 21, '软件工程(软件开发) ', '红棉楼 R511'),
('0840112106', '李炫达', '男', 20, '软件工程(软件开发) ', '红棉楼 R510'),
('0840112107', '胡宏健', '男', 20, '软件工程(软件开发) ', '红棉楼 R511'),
('0840112108', '张锦秀', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G232'),
('0840112109', '刘瑞斌', '男', 20, '软件工程(软件开发) ', '红棉楼 R511'),
('0840112110', '司徒鑫', '男', 22, '软件工程(软件开发) ', '红棉楼 R511'),
('0840112111', '叶跃龙', '男', 21, '软件工程(软件开发) ', '红棉楼 R512'),
('0840112112', '唐伟强', '男', 20, '软件工程(软件开发) ', '红棉楼 R512'),
('0840112113', '莫秀江', '男', 21, '软件工程(软件开发) ', '红棉楼 R512'),
('0840112115', '宁仁强', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G232'),
('0840112116', '冀俊宏', '男', 20, '软件工程(软件开发) ', '红棉楼 R513'),
('0840112117', '林伟龙', '男', 20, '软件工程(软件开发) ', '红棉楼 R513'),
('0840112118', '方澍东', '男', 21, '软件工程(软件开发) ', '红棉楼 R513'),
('0840112120', '陈航', '男', 20, '软件工程(软件开发) ', '红棉楼 R510'),
('0840112121', '陈衍颍', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G232'),
('0840112122', '马俊杰', '男', 20, '软件工程(软件开发) ', '红棉楼 R514'),
('0840112123', '张健威', '男', 21, '软件工程(软件开发) ', '红棉楼 R514'),
('0840112124', '林灿桦', '男', 20, '软件工程(软件开发) ', '红棉楼 R514'),
('0840112125', '袁俊', '男', 21, '软件工程(软件开发) ', '红棉楼 R515'),
('0840112126', '李奔', '男', 21, '软件工程(软件开发) ', '红棉楼 R515'),
('0840112127', '林灏', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G233'),
('0840112128', '赖晓胜', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G233'),
('0840112131', '黄鎏', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G233'),
('0840112132', '李俊东', '男', 19, '软件工程(软件开发) ', '绿杨楼1 G234'),
('0840112133', '曾辉', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G234'),
('0840112134', '李龙形', '女', 22, '软件工程(软件开发) ', '橙萱居2 T2107'),
('0840112136', '林良晖', '男', 22, '软件工程(软件开发) ', '红棉楼 R512'),
('0840112137', '陈泰年', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G234'),
('0840112138', '蔡少桐', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G234'),
('0840112139', '陈凯涛', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G235'),
('0840112140', '谭泰', '男', 22, '软件工程(软件开发) ', '绿杨楼1 G235'),
('0840112141', '陈辉', '男', 23, '软件工程(软件开发) ', '红棉楼 R516'),
('0840112142', '邓鸿健', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G235'),
('0840112143', '卢镇宇', '男', 20, '软件工程(软件开发) ', '红棉楼 R505'),
('0840112144', '余鹏', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G235'),
('0840112145', '余键滨', '男', 22, '软件工程(软件开发) ', '红棉楼 R505'),
('0840112146', '许湃鑫', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G236'),
('0840112148', '李恒筹', '男', 21, '软件工程(软件开发) ', '红棉楼 R505'),
('0840112149', '曹阳刚', '男', 20, '软件工程(软件开发) ', '红棉楼 R505'),
('0840112150', '黎欣健', '男', 21, '软件工程(软件开发) ', '红棉楼 R506'),
('0840112151', '陈锡健', '男', 21, '软件工程(软件开发) ', '红棉楼 R506'),
('0840112152', '饶泽华', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G236'),
('0840112153', '李志敏', '男', 19, '软件工程(软件开发) ', '绿杨楼1 G236'),
('0840112154', '彭志辉', '男', 20, '软件工程(软件开发) ', '红棉楼 R506'),
('0840112155', '卢家骏', '男', 20, '软件工程(软件开发) ', '红棉楼 R506'),
('0840112156', '陈俊强', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G236'),
('0840112158', '高添伟', '男', 19, '软件工程(软件开发) ', '红棉楼 R516'),
('0840112160', '朱庆超', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G301'),
('0840112161', '郭鸣', '男', 20, '软件工程(软件开发) ', '红棉楼 R516'),
('0840112162', '张智豪', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G301'),
('0840112163', '叶哲文', '男', 20, '软件工程(软件开发) ', '红棉楼 R516'),
('0840112164', '马文嘉', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G301'),
('0840112165', '何凯鹏', '男', 20, '软件工程(软件开发) ', '红棉楼 R508'),
('0840112166', '马骏韶', '男', 20, '软件工程(软件开发) ', '红棉楼 R508'),
('0840112167', '陈渐泉', '男', 20, '软件工程(软件开发) ', '红棉楼 R508'),
('0840112168', '陈俊杰', '男', 21, '软件工程(软件开发) ', '红棉楼 R508'),
('0840112169', '刘宇峰', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G302'),
('0840112170', '颜大帅', '男', 21, '软件工程(软件开发) ', '红棉楼 R509'),
('0840112171', '杨开荣', '男', 21, '软件工程(软件开发) ', '红棉楼 R509'),
('0840112172', '梁杰', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G302'),
('0840112173', '李俊豪', '男', 22, '软件工程(软件开发) ', '红棉楼 R509'),
('0840112174', '李秉明', '男', 21, '软件工程(软件开发) ', '红棉楼 R509'),
('0840112175', '洪辉', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G301'),
('0840112176', '陈海文', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G302'),
('0840112177', '李敏华', '女', 20, '软件工程(软件开发) ', '橙萱居2 T2107'),
('0840112179', '沈江', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G302'),
('0840112180', '梁沛荣', '男', 20, '软件工程(软件开发) ', '红棉楼 R504'),
('0840112201', '萧东东', '男', 22, '软件工程(软件开发) ', '红棉楼 R504'),
('0840112202', '陈健睿', '男', 20, '软件工程(软件开发) ', '红棉楼 R504'),
('0840112203', '潘永兴', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G303'),
('0840112204', '黄少威', '男', 21, '软件工程(软件开发) ', '红棉楼 R503'),
('0840112205', '方少民', '男', 21, '软件工程(软件开发) ', '红棉楼 R503'),
('0840112206', '梁嘉熙', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G303'),
('0840112207', '杨睿', '男', 20, '软件工程(软件开发) ', '红棉楼 R503'),
('0840112208', '卢俊', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G303'),
('0840112209', '梁议尹', '女', 20, '软件工程(软件开发) ', '橙萱居2 T2107'),
('0840112210', '陈亮', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G303'),
('0840112211', '招扬', '男', 20, '软件工程(软件开发) ', '红棉楼 R504'),
('0840112212', '马在杰', '男', 21, '软件工程(软件开发) ', '红棉楼 R445'),
('0840112214', '谢楚贤', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G304'),
('0840112215', '梁达超', '男', 20, '软件工程(软件开发) ', '红棉楼 R445'),
('0840112216', '沙永豪', '男', 20, '软件工程(软件开发) ', '红棉楼 R503'),
('0840112217', '吴海坤', '男', 23, '软件工程(软件开发) ', '红棉楼 R445'),
('0840112218', '陈庆从', '男', 20, '软件工程(软件开发) ', '红棉楼 R446'),
('0840112219', '林增辉', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G304'),
('0840112220', '胡元榜', '男', 20, '软件工程(软件开发) ', '红棉楼 R446'),
('0840112221', '冼康筠', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G304'),
('0840112222', '朱伟聪', '男', 20, '软件工程(软件开发) ', '红棉楼 R444'),
('0840112223', '郭叙国', '男', 20, '软件工程(软件开发) ', '红棉楼 R444'),
('0840112224', '吴汝标', '男', 20, '软件工程(软件开发) ', '红棉楼 R444'),
('0840112225', '黄文森', '男', 20, '软件工程(软件开发) ', '红棉楼 R444'),
('0840112226', '廖健', '男', 21, '软件工程(软件开发) ', '红棉楼 R446'),
('0840112227', '陈振锋', '男', 21, '软件工程(软件开发) ', '红棉楼 R446'),
('0840112228', '吴宇鸣', '男', 22, '软件工程(软件开发) ', '绿杨楼1 G304'),
('0840112229', '吉白', '男', 19, '软件工程(软件开发) ', '绿杨楼1 G305'),
('0840112230', '谢启骢', '男', 19, '软件工程(软件开发) ', '绿杨楼1 G305'),
('0840112231', '李浩然', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G305'),
('0840112232', '萧航', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G306'),
('0840112233', '黄晓生', '男', 20, '软件工程(软件开发) ', '红棉楼 R443'),
('0840112234', '黎政', '男', 21, '软件工程(软件开发) ', '红棉楼 R443'),
('0840112235', '虞利敏', '女', 19, '软件工程(软件开发) ', '橙萱居2 T2108'),
('0840112236', '何嘉驹', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G306'),
('0840112237', '李洁兰', '女', 20, '软件工程(软件开发) ', '橙萱居2 T2108'),
('0840112238', '林俊民', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G306'),
('0840112239', '李启敏', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G306'),
('0840112240', '邓志豪', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G307'),
('0840112241', '钟百强', '男', 20, '软件工程(软件开发) ', '红棉楼 R443'),
('0840112242', '陈召东', '男', 21, '软件工程(软件开发) ', '红棉楼 R443'),
('0840112243', '黄进明', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G307'),
('0840112244', '黄威强', '男', 19, '软件工程(软件开发) ', '绿杨楼1 G307'),
('0840112245', '郑坚钦', '男', 22, '软件工程(软件开发) ', '绿杨楼1 G307'),
('0840112246', '李冰锋', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G308'),
('0840112247', '林嘉霖', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G308'),
('0840112248', '余天华', '男', 19, '软件工程(软件开发) ', '红棉楼 R442'),
('0840112249', '张奕锐', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G308'),
('0840112251', '林铿鸿', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G308'),
('0840112252', '梁齐烨', '男', 22, '软件工程(软件开发) ', '绿杨楼1 G309'),
('0840112253', '黎俊光', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G309'),
('0840112254', '周剑铭', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G309'),
('0840112255', '丁文浩', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G309'),
('0840112256', '张林洪', '男', 22, '软件工程(软件开发) ', '绿杨楼1 G310'),
('0840112257', '黄永鹏', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G310'),
('0840112258', '欧耿鑫', '男', 20, '软件工程(软件开发) ', '红棉楼 R442'),
('0840112259', '张宇君', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G310'),
('0840112260', '李艺恺', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G310'),
('0840112261', '林杰超', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G311'),
('0840112262', '冼耀强', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G311'),
('0840112263', '杨扬', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G311'),
('0840112264', '王良俊', '男', 19, '软件工程(软件开发) ', '绿杨楼1 G311'),
('0840112265', '曾国俊', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G312'),
('0840112266', '黄剑威', '男', 18, '软件工程(软件开发) ', '绿杨楼1 G312'),
('0840112267', '黄展鹏', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G312'),
('0840112268', '卓辉荣', '男', 22, '软件工程(软件开发) ', '绿杨楼1 G312'),
('0840112269', '谭玄芳', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G313'),
('0840112270', '曲绍峰', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G313'),
('0840112271', '李春雷', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G313'),
('0840112272', '庞韬志', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G313'),
('0840112273', '黄东文', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G314'),
('0840112274', '梁志坚', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G314'),
('0840112275', '谭学敏', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G314'),
('0840112276', '许庭威', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G314'),
('0840112277', '郑家俊', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G315'),
('0840112278', '张梦潇', '女', 20, '软件工程(软件开发) ', '橙萱居2 T2108'),
('0840112279', '陈立华', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G315'),
('0840112280', '刘金栋', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G315'),
('0840112301', '麦荣鑫', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G315'),
('0840112302', '邓振涛', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G316'),
('0840112304', '陈尧章', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G316'),
('0840112305', '李晓军', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G316'),
('0840112306', '陈启焕', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G317'),
('0840112307', '温世柱', '男', 22, '软件工程(软件开发) ', '绿杨楼1 G317'),
('0840112308', '施乐记', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G317'),
('0840112309', '严达明', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G317'),
('0840112310', '冯耀坚', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G318'),
('0840112311', '周潮海', '男', 22, '软件工程(软件开发) ', '绿杨楼1 G318'),
('0840112312', '李志坚', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G318'),
('0840112313', '曾湘敏', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G318'),
('0840112314', '邓策', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G319'),
('0840112315', '李泽丹', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G319'),
('0840112316', '李昊', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G319'),
('0840112317', '吴骏巍', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G320'),
('0840112318', '杨滟艳', '女', 22, '软件工程(软件开发) ', '橙萱居2 T2108'),
('0840112319', '陈智裔', '男', 19, '软件工程(软件开发) ', '绿杨楼1 G320'),
('0840112320', '李智峰', '男', 22, '软件工程(软件开发) ', '红棉楼 R445'),
('0840112321', '吴仕俊', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G320'),
('0840112322', '谭世威', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G320'),
('0840112324', '曾思维', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G321'),
('0840112325', '林伟斌', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G321'),
('0840112326', '冯有洪', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G321'),
('0840112328', '宋文杰', '男', 19, '软件工程(软件开发) ', '绿杨楼1 G322'),
('0840112329', '莫嘉权', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G321'),
('0840112330', '苏家超', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G322'),
('0840112331', '毛泽智', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G322'),
('0840112332', '陈俊超', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G322'),
('0840112333', '巫丹', '女', 20, '软件工程(软件开发) ', '橙萱居2 T2109'),
('0840112334', '张家杰', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G202'),
('0840112335', '翁耀彬', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G339'),
('0840112336', '钟泽坤', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G202'),
('0840112337', '罗建军', '男', 22, '软件工程(软件开发) ', '绿杨楼1 G207'),
('0840112338', '管凌玉', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G202'),
('0840112339', '潘倩珺', '女', 21, '软件工程(软件开发) ', '橙萱居2 T2109'),
('0840112340', '郑志腾', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G202'),
('0840112341', '黄东辉', '男', 23, '软件工程(软件开发) ', '绿杨楼1 G203'),
('0840112342', '张艳美', '女', 20, '软件工程(软件开发) ', '橙萱居2 T2109'),
('0840112343', '叶梓鹏', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G203'),
('0840112344', '黄坚周', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G203'),
('0840112346', '李康彬', '男', 23, '软件工程(软件开发) ', '绿杨楼1 G204'),
('0840112347', '邱志伟', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G204'),
('0840112348', '徐志华', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G204'),
('0840112349', '詹伟金', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G204'),
('0840112350', '卢舜海', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G205'),
('0840112351', '温紫良', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G205'),
('0840112352', '吴栋', '男', 19, '软件工程(软件开发) ', '绿杨楼1 G205'),
('0840112353', '曾华潇', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G205'),
('0840112354', '严锐宏', '男', 22, '软件工程(软件开发) ', '绿杨楼1 G206'),
('0840112355', '梁启超', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G206'),
('0840112356', '林耿辉', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G206'),
('0840112357', '许先涛', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G206'),
('0840112358', '王庆光', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G207'),
('0840112359', '游成章', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G207'),
('0840112360', '林苏', '女', 20, '软件工程(软件开发) ', '橙萱居2 T2103'),
('0840112362', '张智媚', '女', 20, '软件工程(软件开发) ', '橙萱居2 T2103'),
('0840112363', '郑杰文', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G207'),
('0840112364', '郑瑞丽', '女', 24, '软件工程(软件开发) ', '橙萱居2 T2103'),
('0840112365', '柯思铭', '男', 20, '软件工程(软件开发) ', '绿杨楼1 G208'),
('0840112366', '姚多雅', '男', 23, '软件工程(软件开发) ', '绿杨楼1 G208'),
('0840112367', '燕小刚', '男', 22, '软件工程(软件开发) ', '绿杨楼1 G208'),
('0840112368', '陶然', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G208'),
('0840113101', '刘彬彬', '男', 22, '软件工程(数据处理软件开发)', '红棉楼 R517'),
('0840113102', '陈桂发', '男', 20, '软件工程(数据处理软件开发)', '红棉楼 R517'),
('0840113103', '林锦胜', '男', 20, '软件工程(数据处理软件开发)', '红棉楼 R517'),
('0840113104', '郑燕彪', '男', 20, '软件工程(数据处理软件开发)', '红棉楼 R517'),
('0840113105', '冯焯烽', '男', 20, '软件工程(数据处理软件开发)', '红棉楼 R518'),
('0840113106', '郑昊', '男', 20, '软件工程(数据处理软件开发)', '红棉楼 R518'),
('0840113107', '邹全', '男', 21, '软件工程(数据处理软件开发)', '红棉楼 R518'),
('0840113108', '柯向杰', '男', 21, '软件工程(数据处理软件开发)', '红棉楼 R518'),
('0840113109', '许凯潮', '男', 20, '软件工程(数据处理软件开发)', '红棉楼 R519'),
('0840113110', '梁健俊', '男', 21, '软件工程(数据处理软件开发)', '红棉楼 R519'),
('0840113111', '许嘉鑫', '男', 21, '软件工程(数据处理软件开发)', '绿杨楼1 G325'),
('0840113112', '谢文杰', '男', 20, '软件工程(数据处理软件开发)', '红棉楼 R519'),
('0840113113', '陈冰璇', '女', 21, '软件工程(数据处理软件开发)', '橙萱居2 T2105'),
('0840113114', '刘子竞', '男', 20, '软件工程(数据处理软件开发)', '红棉楼 R519'),
('0840113115', '蔡思远', '男', 20, '软件工程(数据处理软件开发)', '绿杨楼1 G325'),
('0840113116', '吴晓伟', '男', 25, '软件工程(数据处理软件开发)', '绿杨楼1 G325'),
('0840113117', '黄伟亮', '男', 20, '软件工程(数据处理软件开发)', '绿杨楼1 G325'),
('0840113118', '何祖恒', '男', 22, '软件工程(数据处理软件开发)', '绿杨楼1 G326'),
('0840113119', '彭玮', '男', 20, '软件工程(数据处理软件开发)', '绿杨楼1 G326'),
('0840113120', '江帆劲', '女', 21, '软件工程(数据处理软件开发)', '橙萱居2 T2105'),
('0840113121', '吴运豪', '男', 20, '软件工程(数据处理软件开发)', '绿杨楼1 G326'),
('0840113122', '廖文宗', '男', 21, '软件工程(数据处理软件开发)', '绿杨楼1 G326'),
('0840113123', '叶海程', '男', 21, '软件工程(数据处理软件开发)', '绿杨楼1 G327'),
('0840113124', '李海辉', '男', 20, '软件工程(数据处理软件开发)', '绿杨楼1 G327'),
('0840113125', '葛俊旭', '男', 20, '软件工程(数据处理软件开发)', '绿杨楼1 G327'),
('0840113126', '胡燕龙', '男', 22, '软件工程(数据处理软件开发)', '绿杨楼1 G327'),
('0840113127', '邓兆峰', '男', 19, '软件工程(数据处理软件开发)', '绿杨楼1 G328'),
('0840113128', '劳月凤', '女', 20, '软件工程(数据处理软件开发)', '橙萱居2 T2105'),
('0840113129', '罗铭', '男', 21, '软件工程(数据处理软件开发)', '绿杨楼1 G328'),
('0840113130', '杨建浩', '男', 21, '软件工程(数据处理软件开发)', '绿杨楼1 G328'),
('0840113131', '刘文聪', '男', 20, '软件工程(数据处理软件开发)', '绿杨楼1 G328'),
('0840113132', '周斌', '男', 21, '软件工程(数据处理软件开发)', '绿杨楼1 G329'),
('0840113133', '庄晓鹏', '男', 20, '软件工程(数据处理软件开发)', '绿杨楼1 G329'),
('0840113134', '曾思远', '男', 21, '软件工程(数据处理软件开发)', '绿杨楼1 G329'),
('0840113135', '陈海', '男', 22, '软件工程(数据处理软件开发)', '绿杨楼1 G329'),
('0840113136', '黄雄炜', '男', 22, '软件工程(数据处理软件开发)', '绿杨楼1 G413'),
('0840115102', '邝轩麟', '男', 20, '软件工程(软件测试)', '红棉楼 R501'),
('0840115103', '李奕楷', '男', 20, '软件工程(软件测试)', '红棉楼 R501'),
('0840115104', '招继钦', '男', 21, '软件工程(软件测试)', '红棉楼 R501'),
('0840115106', '李程', '男', 20, '软件工程(软件测试)', '红棉楼 R502'),
('0840115107', '梁继江', '男', 21, '软件工程(软件测试)', '红棉楼 R502'),
('0840115108', '蔡浩贤', '男', 21, '软件工程(软件测试)', '红棉楼 R502'),
('0840115109', '温远定', '男', 20, '软件工程(软件测试)', '红棉楼 R502'),
('0840115110', '黄炎龙', '男', 21, '软件工程(软件测试)', '红棉楼 R501'),
('0840115111', '石雯珊', '女', 21, '软件工程(软件测试)', '橙萱居2 T2104'),
('0840115112', '欧阳英洁', '男', 20, '软件工程(软件测试)', '绿杨楼1 G228'),
('0840115113', '伍广超', '男', 20, '软件工程(软件测试)', '绿杨楼1 G414'),
('0840115114', '陈勇', '男', 21, '软件工程(软件测试)', '绿杨楼1 G338'),
('0840115115', '杨瑞', '男', 22, '软件工程(软件测试)', '绿杨楼1 G230'),
('0840115116', '黄丽玲', '女', 20, '软件工程(软件测试)', '橙萱居2 T2104'),
('0840115117', '钟倩茵', '女', 20, '软件工程(软件测试)', '橙萱居2 T2104'),
('0840115118', '谈磊', '男', 19, '软件工程(软件测试)', '绿杨楼1 G230'),
('0840115119', '李洋', '男', 20, '软件工程(软件测试)', '绿杨楼1 G230'),
('0840115120', '汪振勋', '男', 22, '软件工程(软件测试)', '绿杨楼1 G230'),
('0840115121', '罗浩文', '男', 20, '软件工程(软件测试)', '绿杨楼1 G231'),
('0840115122', '黄立', '男', 20, '软件工程(软件测试)', '绿杨楼1 G231'),
('0840115123', '区城玮', '男', 21, '软件工程(软件测试)', '绿杨楼1 G228'),
('0840115124', '夏文峰', '男', 20, '软件工程(软件测试)', '绿杨楼1 G231'),
('0840115125', '周锐', '男', 20, '软件工程(软件测试)', '绿杨楼1 G227'),
('0840115127', '李雪媛', '女', 20, '软件工程(软件测试)', '橙萱居2 T2104'),
('0840115128', '刘恩泽', '男', 22, '软件工程(软件测试)', '绿杨楼1 G227'),
('0840115129', '梁倩媛', '女', 20, '软件工程(软件测试)', '橙萱居2 T2103'),
('0840115130', '冼艺文', '男', 20, '软件工程(软件测试)', '绿杨楼1 G227'),
('0840115131', '吴溢彬', '男', 21, '软件工程(软件测试)', '绿杨楼1 G227'),
('0840115132', '黄超能', '男', 20, '软件工程(软件测试)', '绿杨楼1 G228'),
('0840115133', '王德才', '男', 21, '软件工程(软件测试)', '绿杨楼1 G231'),
('0840115134', '林嘉', '男', 21, '软件工程(软件测试)', '绿杨楼1 G228'),
('0840326121', '陶文亮', '男', 20, '软件工程(软件开发) ', '红棉楼 R442'),
('0840326219', '黄建森', '男', 20, '软件工程(网络应用软件开发) ', '绿杨楼2 P122'),
('0840514170', '彭冠凯', '男', 21, '软件工程(网络应用软件开发) ', '绿杨楼1 G223'),
('0840614114', '梁盛峰', '男', 21, '软件工程(软件开发) ', '红棉楼 R703'),
('0840811123', '余德龙', '男', 21, '软件工程(软件开发) ', '绿杨楼1 G305'),
('0840811231', '陈伟浩', '男', 20, '软件工程(网络应用软件开发) ', '绿杨楼1 G340');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sise_activity`
--
ALTER TABLE `sise_activity`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sise_ad`
--
ALTER TABLE `sise_ad`
 ADD PRIMARY KEY (`ad_id`), ADD KEY `ad_name` (`ad_name`);

--
-- Indexes for table `sise_asset`
--
ALTER TABLE `sise_asset`
 ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `sise_auth_access`
--
ALTER TABLE `sise_auth_access`
 ADD KEY `role_id` (`role_id`), ADD KEY `rule_name` (`rule_name`) USING BTREE;

--
-- Indexes for table `sise_auth_rule`
--
ALTER TABLE `sise_auth_rule`
 ADD PRIMARY KEY (`id`), ADD KEY `module` (`module`,`status`,`type`);

--
-- Indexes for table `sise_comments`
--
ALTER TABLE `sise_comments`
 ADD PRIMARY KEY (`id`), ADD KEY `comment_post_ID` (`post_id`), ADD KEY `comment_approved_date_gmt` (`status`), ADD KEY `comment_parent` (`parentid`), ADD KEY `table_id_status` (`post_table`,`post_id`,`status`), ADD KEY `createtime` (`createtime`);

--
-- Indexes for table `sise_common_action_log`
--
ALTER TABLE `sise_common_action_log`
 ADD PRIMARY KEY (`id`), ADD KEY `user_object_action` (`user`,`object`,`action`), ADD KEY `user_object_action_ip` (`user`,`object`,`action`,`ip`);

--
-- Indexes for table `sise_group`
--
ALTER TABLE `sise_group`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sise_guestbook`
--
ALTER TABLE `sise_guestbook`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sise_links`
--
ALTER TABLE `sise_links`
 ADD PRIMARY KEY (`link_id`), ADD KEY `link_visible` (`link_status`);

--
-- Indexes for table `sise_menu`
--
ALTER TABLE `sise_menu`
 ADD PRIMARY KEY (`id`), ADD KEY `status` (`status`), ADD KEY `parentid` (`parentid`), ADD KEY `model` (`model`);

--
-- Indexes for table `sise_nav`
--
ALTER TABLE `sise_nav`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sise_nav_cat`
--
ALTER TABLE `sise_nav_cat`
 ADD PRIMARY KEY (`navcid`);

--
-- Indexes for table `sise_oauth_user`
--
ALTER TABLE `sise_oauth_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sise_options`
--
ALTER TABLE `sise_options`
 ADD PRIMARY KEY (`option_id`), ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Indexes for table `sise_organization`
--
ALTER TABLE `sise_organization`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sise_plugins`
--
ALTER TABLE `sise_plugins`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sise_posts`
--
ALTER TABLE `sise_posts`
 ADD PRIMARY KEY (`id`), ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`id`), ADD KEY `post_parent` (`post_parent`), ADD KEY `post_author` (`post_author`), ADD KEY `post_date` (`post_date`) USING BTREE;

--
-- Indexes for table `sise_role`
--
ALTER TABLE `sise_role`
 ADD PRIMARY KEY (`id`), ADD KEY `parentId` (`pid`), ADD KEY `status` (`status`);

--
-- Indexes for table `sise_role_user`
--
ALTER TABLE `sise_role_user`
 ADD KEY `group_id` (`role_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sise_route`
--
ALTER TABLE `sise_route`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sise_slide`
--
ALTER TABLE `sise_slide`
 ADD PRIMARY KEY (`slide_id`), ADD KEY `slide_cid` (`slide_cid`);

--
-- Indexes for table `sise_slide_cat`
--
ALTER TABLE `sise_slide_cat`
 ADD PRIMARY KEY (`cid`), ADD KEY `cat_idname` (`cat_idname`);

--
-- Indexes for table `sise_terms`
--
ALTER TABLE `sise_terms`
 ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `sise_term_relationships`
--
ALTER TABLE `sise_term_relationships`
 ADD PRIMARY KEY (`tid`), ADD KEY `term_taxonomy_id` (`term_id`);

--
-- Indexes for table `sise_topic`
--
ALTER TABLE `sise_topic`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sise_users`
--
ALTER TABLE `sise_users`
 ADD PRIMARY KEY (`id`), ADD KEY `user_login_key` (`user_login`), ADD KEY `user_nicename` (`user_nicename`);

--
-- Indexes for table `sise_user_favorites`
--
ALTER TABLE `sise_user_favorites`
 ADD PRIMARY KEY (`id`), ADD KEY `uid` (`uid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`学号`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sise_activity`
--
ALTER TABLE `sise_activity`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sise_ad`
--
ALTER TABLE `sise_ad`
MODIFY `ad_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '广告id';
--
-- AUTO_INCREMENT for table `sise_asset`
--
ALTER TABLE `sise_asset`
MODIFY `aid` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sise_auth_rule`
--
ALTER TABLE `sise_auth_rule`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '规则id,自增主键',AUTO_INCREMENT=162;
--
-- AUTO_INCREMENT for table `sise_comments`
--
ALTER TABLE `sise_comments`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sise_common_action_log`
--
ALTER TABLE `sise_common_action_log`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sise_group`
--
ALTER TABLE `sise_group`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sise_guestbook`
--
ALTER TABLE `sise_guestbook`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sise_links`
--
ALTER TABLE `sise_links`
MODIFY `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sise_menu`
--
ALTER TABLE `sise_menu`
MODIFY `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=162;
--
-- AUTO_INCREMENT for table `sise_nav`
--
ALTER TABLE `sise_nav`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sise_nav_cat`
--
ALTER TABLE `sise_nav_cat`
MODIFY `navcid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sise_oauth_user`
--
ALTER TABLE `sise_oauth_user`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sise_options`
--
ALTER TABLE `sise_options`
MODIFY `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sise_organization`
--
ALTER TABLE `sise_organization`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sise_plugins`
--
ALTER TABLE `sise_plugins`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id';
--
-- AUTO_INCREMENT for table `sise_posts`
--
ALTER TABLE `sise_posts`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sise_role`
--
ALTER TABLE `sise_role`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sise_route`
--
ALTER TABLE `sise_route`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '路由id';
--
-- AUTO_INCREMENT for table `sise_slide`
--
ALTER TABLE `sise_slide`
MODIFY `slide_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sise_slide_cat`
--
ALTER TABLE `sise_slide_cat`
MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sise_terms`
--
ALTER TABLE `sise_terms`
MODIFY `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sise_term_relationships`
--
ALTER TABLE `sise_term_relationships`
MODIFY `tid` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sise_topic`
--
ALTER TABLE `sise_topic`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sise_users`
--
ALTER TABLE `sise_users`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sise_user_favorites`
--
ALTER TABLE `sise_user_favorites`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
