/*
Navicat MySQL Data Transfer

Source Server         : 本地数据库
Source Server Version : 50547
Source Host           : 127.0.0.1:3306
Source Database       : dovehy

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-04-28 19:57:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for dove_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `dove_auth_group`;
CREATE TABLE `dove_auth_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` text COMMENT '规则id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='用户组表';

-- ----------------------------
-- Records of dove_auth_group
-- ----------------------------
INSERT INTO `dove_auth_group` VALUES ('1', '超级管理员', '1', '6,96,20,1,2,3,4,5,64,21,7,8,9,10,11,12,13,14,15,16,123,124,125,19,104,105,106,107,108,118,109,110,111,112,117');
INSERT INTO `dove_auth_group` VALUES ('2', '产品管理员', '1', '6,96,1,2,3,4,56,57,60,61,63,71,72,65,67,74,75,66,68,69,70,73,77,78,82,83,88,89,90,99,91,92,97,98,104,105,106,107,108,118,109,110,111,112,117,113,114');
INSERT INTO `dove_auth_group` VALUES ('4', '文章编辑', '1', '6,96,57,60,61,63,71,72,65,67,74,75,66,68,69,73,79,80,78,82,83,88,89,90,99,100,97,98,104,105,106,107,108,118,109,110,111,112,117,113,114');

-- ----------------------------
-- Table structure for dove_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `dove_auth_group_access`;
CREATE TABLE `dove_auth_group_access` (
  `uid` int(11) unsigned NOT NULL COMMENT '用户id',
  `group_id` int(11) unsigned NOT NULL COMMENT '用户组id',
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户组明细表';

-- ----------------------------
-- Records of dove_auth_group_access
-- ----------------------------
INSERT INTO `dove_auth_group_access` VALUES ('1', '2');
INSERT INTO `dove_auth_group_access` VALUES ('1', '33');
INSERT INTO `dove_auth_group_access` VALUES ('89', '4');

-- ----------------------------
-- Table structure for dove_menu
-- ----------------------------
DROP TABLE IF EXISTS `dove_menu`;
CREATE TABLE `dove_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `menuname` varchar(32) NOT NULL DEFAULT '' COMMENT '菜单名称',
  `url` varchar(180) NOT NULL DEFAULT '',
  `m` char(32) NOT NULL DEFAULT '' COMMENT '模块',
  `c` char(32) NOT NULL DEFAULT '' COMMENT '控制器',
  `a` char(32) NOT NULL DEFAULT '' COMMENT '方法',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '备注说明',
  `child` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否存在子级栏目',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0',
  `is_display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1：显示 0：不显示',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  `style` varchar(255) DEFAULT '' COMMENT '栏目样式',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`,`m`,`c`,`a`,`is_display`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dove_menu
-- ----------------------------
INSERT INTO `dove_menu` VALUES ('1', '0', '系统设置', '', '#', '#', '#', '#', '1', '100', '1', '1414997367', 'bg-primary dker@fa-gear');
INSERT INTO `dove_menu` VALUES ('8', '1', '菜单管理', 'index.php?m=Admin&c=Index&a=menus&menuid=8', 'Admin', 'Index', 'menus', '后台菜单 增 删 改 排序', '0', '0', '1', '1415069975', '');
INSERT INTO `dove_menu` VALUES ('4', '0', '微信服务1', 'index.php?m=Admin&c=Index&a=editMenu', '', '', '', '', '1', '1', '1', '1415003692', 'bg-danger@fa-comments');
INSERT INTO `dove_menu` VALUES ('9', '1', '系统配置', 'index.php?m=Admin&c=Index&a=setSystem&menuid=9', 'Admin', 'Index', 'setSystem', '管理员 系统配置', '0', '4', '1', '1415069975', null);
INSERT INTO `dove_menu` VALUES ('10', '4', '自动回复', 'index.php?m=Wechat&c=Admincp&a=beAdded&menuid=10', 'Wechat', 'Admincp', 'beAdded', '', '0', '0', '1', '1415069975', null);
INSERT INTO `dove_menu` VALUES ('58', '50', '刮刮卡', 'index.php?m=Tools&c=Admincp&a=lottery&menuid=58', 'Tools', 'Admincp', 'lottery', '', '0', '0', '0', '1425606686', '');
INSERT INTO `dove_menu` VALUES ('17', '0', '商城管理', 'index.php?m=Admin&c=Index&a=editMenu', '', '', '', '', '1', '1', '0', '1415323864', 'bg-success@fa-shopping-cart');
INSERT INTO `dove_menu` VALUES ('18', '1', '角色管理', 'index.php?m=Admin&c=Index&a=role&menuid=18', 'Admin', 'Index', 'role', '添加角色 编辑角色 删除角色', '0', '2', '1', '1415324766', null);
INSERT INTO `dove_menu` VALUES ('19', '1', '用户管理', 'index.php?m=Admin&c=Index&a=wxuser&menuid=19', 'Admin', 'Index', 'wxuser', '添加用户 删除用户 编辑用户', '0', '1', '1', '1415340197', '');
INSERT INTO `dove_menu` VALUES ('25', '4', '自定义菜单', 'index.php?m=Wechat&c=Admincp&a=button&menuid=25', 'Wechat', 'Admincp', 'button', '微信自定义菜单', '0', '5', '1', '1415582800', '');
INSERT INTO `dove_menu` VALUES ('30', '4', '素材管理', 'index.php?m=Wechat&c=Admincp&a=appNews&menuid=30', 'Wechat', 'Admincp', 'appNews', '素材管理 图文消息', '0', '1', '1', '1415781904', '');
INSERT INTO `dove_menu` VALUES ('29', '4', '公众号设置', 'index.php?m=Wechat&c=Admincp&a=weixinInfo&menuid=29', 'Wechat', 'Admincp', 'weixinInfo', '微信账号设置', '0', '10', '1', '1415600192', '');
INSERT INTO `dove_menu` VALUES ('31', '4', '消息管理', 'index.php?m=Wechat&c=Admincp&a=message&menuid=31', 'Wechat', 'Admincp', 'message', '微信消息管理', '0', '3', '1', '1415781945', '');
INSERT INTO `dove_menu` VALUES ('32', '4', '粉丝管理', 'index.php?m=Wechat&c=Admincp&a=fans&menuid=32', 'Wechat', 'Admincp', 'fans', '微信粉丝管理', '0', '4', '1', '1415781945', '');
INSERT INTO `dove_menu` VALUES ('33', '17', '商城设置', '', '', '', '', '', '1', '0', '1', '1415782731', '');
INSERT INTO `dove_menu` VALUES ('34', '17', '商品管理', '', '', '', '', '', '1', '0', '1', '1415782731', '');
INSERT INTO `dove_menu` VALUES ('35', '17', '订单管理', 'index.php?m=Shop&c=Admincp&a=order&menuid=35', '', '', '', '订单管理', '1', '0', '1', '1415782731', '');
INSERT INTO `dove_menu` VALUES ('36', '17', '促销管理', 'index.php?m=Admin&c=Index&a=Shop&menuid=36', 'Shop', '', '', '商城 商品促销管理', '1', '0', '1', '1415782731', '');
INSERT INTO `dove_menu` VALUES ('37', '33', '配送方式', 'index.php?m=Shop&c=Admincp&a=express&menuid=37', 'Shop', 'Admincp', 'express', '物流设置', '0', '4', '1', '1415782940', '');
INSERT INTO `dove_menu` VALUES ('38', '33', '支付设置', 'index.php?m=Shop&c=Admincp&a=payments&menuid=38', 'Shop', 'Admincp', 'payments', '', '0', '3', '1', '1415782940', '');
INSERT INTO `dove_menu` VALUES ('39', '33', '分类管理', 'index.php?m=Shop&c=Admincp&a=category&menuid=39', 'Shop', 'Admincp', 'category', '商品分类', '0', '2', '1', '1415782940', '');
INSERT INTO `dove_menu` VALUES ('40', '33', '商品类型', 'index.php?m=Shop&c=Admincp&a=productType&menuid=40', 'Shop', 'Admincp', 'productType', '商城类型管理', '0', '1', '1', '1415782940', '');
INSERT INTO `dove_menu` VALUES ('41', '33', '基础设置', 'index.php?m=Shop&c=Admincp&a=setShop&menuid=41', 'Shop', 'Admincp', 'setShop', '商家 商城设置', '0', '0', '1', '1415783299', '');
INSERT INTO `dove_menu` VALUES ('42', '34', '商品列表', 'index.php?m=Shop&c=Admincp&a=products&menuid=42', 'Shop', 'Admincp', 'products', '商城 商品列表', '0', '3', '1', '1415783299', '');
INSERT INTO `dove_menu` VALUES ('43', '34', '新增商品', 'index.php?m=Shop&c=Admincp&a=addProduct&menuid=43', 'Shop', 'Admincp', 'addProduct', '添加商品', '0', '2', '1', '1415783299', '');
INSERT INTO `dove_menu` VALUES ('44', '0', '会员管理', 'index.php?m=Admin&c=Index&a=Member&menuid=44', 'Member', '', '', '会员模块', '1', '2', '0', '1415787376', 'bg-warning@fa-male');
INSERT INTO `dove_menu` VALUES ('45', '44', '会员列表', 'index.php?m=Member&c=Admincp&a=member&menuid=45', 'Member', 'Admincp', 'member', '会员列表', '0', '0', '1', '1415787485', '');
INSERT INTO `dove_menu` VALUES ('46', '34', '商品回收站', 'index.php?m=Shop&c=Admincp&a=trashProduct&menuid=46', 'Shop', 'Admincp', 'trashProduct', '商品回收站', '0', '4', '1', '1417421161', '');
INSERT INTO `dove_menu` VALUES ('79', '50', '微现场', 'index.php?m=Tools&c=Admincp&a=live&menuid=79', 'Tools', 'Admincp', 'live', '现场活动', '0', '7', '0', '1428369598', '');
INSERT INTO `dove_menu` VALUES ('48', '35', '订单列表', 'index.php?m=Shop&c=Admincp&a=order&menuid=48', 'Shop', 'Admincp', 'order', '订单列表', '0', '0', '1', '1418958828', '');
INSERT INTO `dove_menu` VALUES ('49', '0', '分销管理', 'index.php?m=Admin&c=Index&a=Share&menuid=49', 'Share', '', '', '', '1', '3', '0', '1419649651', 'bg-primary@fa-puzzle-piece');
INSERT INTO `dove_menu` VALUES ('50', '0', '营销工具', 'index.php?m=Admin&c=Index&a=Tools&menuid=50', 'Tools', '', '', '', '1', '4', '1', '1419649651', 'bg-info@fa-briefcase');
INSERT INTO `dove_menu` VALUES ('51', '1', '模块管理', 'index.php?m=Admin&c=Index&a=module&menuid=51', 'Admin', 'Index', 'module', '系统模块管理', '0', '3', '1', '1420003059', '');
INSERT INTO `dove_menu` VALUES ('52', '1', '清除缓存', 'index.php?m=Admin&c=Index&a=clearCache&menuid=52', 'Admin', 'Index', 'clearCache', '系统清除缓存功能', '0', '5', '1', '1420016197', '');
INSERT INTO `dove_menu` VALUES ('53', '0', '连锁加盟', 'index.php?m=Admin&c=Index&a=Linkage&menuid=53', 'Linkage', '', '', '', '1', '6', '0', '1420366086', 'bg-warning@fa-retweet');
INSERT INTO `dove_menu` VALUES ('54', '53', '代理商管理', 'index.php?m=Linkage&c=Admincp&a=chain&menuid=54', 'Linkage', 'Admincp', 'chain', '连锁店管理 添加 删除 修改', '0', '1', '1', '1420428095', '');
INSERT INTO `dove_menu` VALUES ('55', '53', '价格管理', 'index.php?m=Linkage&c=Admincp&a=price&menuid=55', 'Linkage', 'Admincp', 'price', '', '0', '2', '1', '1420428095', '');
INSERT INTO `dove_menu` VALUES ('56', '53', '财务日志', 'index.php?m=Linkage&c=Admincp&a=balance&menuid=56', 'Linkage', 'Admincp', 'balance', '', '0', '3', '1', '1420428095', '');
INSERT INTO `dove_menu` VALUES ('57', '44', '推广专员', 'index.php?m=Member&c=Admincp&a=referer&menuid=57', 'Member', 'Admincp', 'referer', '', '0', '3', '1', '1425456923', '');
INSERT INTO `dove_menu` VALUES ('59', '50', '大转盘', 'index.php?m=Tools&c=Admincp&a=wheel&menuid=59', 'Tools', 'Admincp', 'wheel', '', '0', '1', '0', '1425606686', '');
INSERT INTO `dove_menu` VALUES ('60', '49', '分销商列表', 'index.php?m=Share&c=Admincp&a=share&menuid=60', 'Share', 'Admincp', 'share', '', '0', '0', '0', '1425607448', '');
INSERT INTO `dove_menu` VALUES ('61', '44', '会员卡', 'index.php?m=Member&c=Admincp&a=cardlist&menuid=61', 'Member', 'Admincp', 'cardlist', '', '0', '2', '0', '1425615556', '');
INSERT INTO `dove_menu` VALUES ('62', '50', '问卷调查', 'index.php?m=Tools&c=Admincp&a=survey&menuid=62', 'Tools', 'Admincp', 'survey', '', '0', '2', '0', '1425623582', '');
INSERT INTO `dove_menu` VALUES ('63', '50', '欢乐答题', 'index.php?m=Tools&c=Admincp&a=answer&menuid=63', 'Tools', 'Admincp', 'answer', '', '0', '3', '0', '1425623582', '');
INSERT INTO `dove_menu` VALUES ('64', '4', '群发信息', 'index.php?m=Wechat&c=Admincp&a=sendMessage&menuid=64', 'Wechat', 'Admincp', 'sendMessage', '', '0', '2', '1', '1425627413', '');
INSERT INTO `dove_menu` VALUES ('65', '35', '订单统计', 'index.php?m=Shop&c=Admincp&a=orderReport&menuid=65', 'Shop', 'Admincp', 'orderReport', '', '0', '2', '1', '1425700831', '');
INSERT INTO `dove_menu` VALUES ('66', '50', '优惠券', 'index.php?m=Tools&c=Admincp&a=coupons&menuid=66', 'Tools', 'Admincp', 'coupons', '', '0', '4', '0', '1425890036', '');
INSERT INTO `dove_menu` VALUES ('67', '36', '红包类型', 'index.php?m=Shop&c=Admincp&a=bonus&menuid=67', 'Shop', 'Admincp', 'bonus', '', '0', '1', '1', '1425956282', '');
INSERT INTO `dove_menu` VALUES ('68', '36', '超值礼包', 'index.php?m=Shop&c=Admincp&a=package&menuid=68', 'Shop', 'Admincp', 'package', '', '0', '2', '1', '1425956282', '');
INSERT INTO `dove_menu` VALUES ('69', '36', '优惠活动', 'index.php?m=Shop&c=Admincp&a=special&menuid=69', 'Shop', 'Admincp', 'special', '', '0', '0', '1', '1425956282', '');
INSERT INTO `dove_menu` VALUES ('70', '0', '手机网站', 'index.php?Site/Admincp/?menuid=70', 'Site', 'Admincp', '', '', '1', '7', '0', '1427075155', 'bg-danger@fa-puzzle-piece');
INSERT INTO `dove_menu` VALUES ('71', '70', '栏目管理', 'index.php?m=Site&c=Admincp&a=channel&menuid=71', 'Site', 'Admincp', 'channel', '', '0', '3', '1', '1427075765', '');
INSERT INTO `dove_menu` VALUES ('72', '70', '模板风格', 'index.php?m=Site&c=Admincp&a=template&menuid=72', 'Site', 'Admincp', 'template', '', '0', '2', '1', '1427075765', '');
INSERT INTO `dove_menu` VALUES ('73', '70', '内容管理', 'index.php?m=Site&c=Admincp&a=news&menuid=73', 'Site', 'Admincp', 'news', '', '0', '4', '1', '1427075765', '');
INSERT INTO `dove_menu` VALUES ('74', '70', '微站设置', 'index.php?m=Site&c=Admincp&a=setSite&menuid=74', 'Site', 'Admincp', 'setSite', '', '0', '0', '1', '1427075765', '');
INSERT INTO `dove_menu` VALUES ('75', '70', '留言反馈', 'index.php?m=Site&c=Admincp&a=feedback&menuid=75', 'Site', 'Admincp', 'feedback', '', '0', '4', '1', '1427079486', '');
INSERT INTO `dove_menu` VALUES ('76', '4', '二维码管理', 'index.php?m=Wechat&c=Admincp&a=qrCode&menuid=76', 'Wechat', 'Admincp', 'qrCode', '', '0', '6', '1', '1427161259', '');
INSERT INTO `dove_menu` VALUES ('77', '50', '应用场景', 'index.php?m=Tools&c=Admincp&a=scene&menuid=77', 'Tools', 'Admincp', 'scene', '', '0', '5', '0', '1427276369', '');
INSERT INTO `dove_menu` VALUES ('78', '50', '转发有礼', 'index.php?m=Tools&c=Admincp&a=transmit&menuid=78', 'Tools', 'Admincp', 'transmit', '', '0', '6', '0', '1427276369', '');
INSERT INTO `dove_menu` VALUES ('82', '81', '组织活动', 'index.php?m=Interact&c=Admincp&a=activity&menuid=82', 'Interact', 'Admincp', 'activity', '发布活动，作者：郑锦成', '0', '0', '1', '1428903012', '');
INSERT INTO `dove_menu` VALUES ('81', '0', '微粉互动', 'index.php?m=Interact&c=&a=&menuid=81', 'Interact', '', '', '', '1', '5', '0', '1428902894', 'bg-primary dker@fa-group');
INSERT INTO `dove_menu` VALUES ('85', '0', '账号管理', 'index.php?m=Account&c=&a=&menuid=85', 'Account', '', '', '', '1', '8', '1', '1430274417', 'bg-info@fa-wrench');
INSERT INTO `dove_menu` VALUES ('84', '53', '基础设置', 'index.php?m=Linkage&c=Admincp&a=setLinkage&menuid=84', 'Linkage', 'Admincp', 'setLinkage', '连锁加盟板块设置', '0', '0', '1', '1430188404', '');
INSERT INTO `dove_menu` VALUES ('86', '85', '账号信息', 'index.php?m=Account&c=Admincp&a=userInfo&menuid=86', 'Account', 'Admincp', 'userInfo', '', '0', '0', '1', '1430275417', '');
INSERT INTO `dove_menu` VALUES ('87', '85', '修改密码', 'index.php?m=Account&c=Admincp&a=changePwd&menuid=87', 'Account', 'Admincp', 'changePwd', '', '0', '0', '1', '1430275417', '');
INSERT INTO `dove_menu` VALUES ('91', '85', '操作日志', 'index.php?m=Account&c=Admincp&a=lookLog&menuid=91', 'Account', 'Admincp', 'lookLog', '', '0', '0', '1', '1430539997', '');
INSERT INTO `dove_menu` VALUES ('89', '85', '工号管理', 'index.php?m=Account&c=Admincp&a=user&menuid=89', 'Account', 'Admincp', 'user', '', '0', '0', '1', '1430276835', '');
INSERT INTO `dove_menu` VALUES ('90', '85', '角色管理', 'index.php?m=Account&c=Admincp&a=role&menuid=90', 'Account', 'Admincp', 'role', '', '0', '0', '1', '1430276835', '');
INSERT INTO `dove_menu` VALUES ('92', '44', '会员等级', 'index.php?m=Member&c=Admincp&a=memberRank&menuid=92', 'Member', 'Admincp', 'memberRank', '', '0', '1', '1', '1431331610', '');
INSERT INTO `dove_menu` VALUES ('93', '33', '自提设置', 'index.php?m=Shop&c=Admincp&a=take&menuid=93', 'Shop', 'Admincp', 'take', '', '0', '5', '1', '1431507645', '');
INSERT INTO `dove_menu` VALUES ('94', '0', '高人应用', 'index.php?m=Gaoren&c=&a=&menuid=94', 'Gaoren', '', '', '', '1', '0', '1', '1432089568', 'bg-danger@fa-thumbs-up');
INSERT INTO `dove_menu` VALUES ('95', '94', '会员管理', 'index.php?m=Gaoren&c=Admincp&a=member&menuid=95', 'Gaoren', 'Admincp', 'member', '会员管理', '0', '0', '0', '1432089749', '');
INSERT INTO `dove_menu` VALUES ('96', '94', '高人管理', 'index.php?m=Gaoren&c=Admincp&a=master&menuid=96', 'Gaoren', 'Admincp', 'master', '高人管理', '0', '1', '1', '1432089749', '');
INSERT INTO `dove_menu` VALUES ('97', '94', '订单管理', 'index.php?m=Gaoren&c=Admincp&a=order&menuid=97', 'Gaoren', 'Admincp', 'order', '订单管理', '0', '4', '1', '1432089749', '');
INSERT INTO `dove_menu` VALUES ('98', '94', '评论管理', 'index.php?m=Gaoren&c=Admincp&a=reviews&menuid=98', 'Gaoren', 'Admincp', 'reviews', '评论管理', '0', '5', '1', '1432089749', '');
INSERT INTO `dove_menu` VALUES ('99', '94', '财务管理', 'index.php?m=Gaoren&c=Admincp&a=finance&menuid=99', 'Gaoren', 'Admincp', 'finance', '财务管理', '0', '6', '1', '1432089749', '');
INSERT INTO `dove_menu` VALUES ('100', '94', '应用设置', 'index.php?m=Gaoren&c=Admincp&a=setGaoren&menuid=100', 'Gaoren', 'Admincp', 'setGaoren', '高人APP设置', '0', '9', '0', '1432089749', '');
INSERT INTO `dove_menu` VALUES ('103', '94', '标签管理', 'index.php?m=Gaoren&c=Admincp&a=tag&menuid=103', 'Gaoren', 'Admincp', 'tag', '', '0', '8', '1', '1433923426', '');
INSERT INTO `dove_menu` VALUES ('101', '94', '产品管理', 'index.php?m=Gaoren&c=Admincp&a=products&menuid=101', 'Gaoren', 'Admincp', 'products', '', '0', '2', '1', '1432864706', '');
INSERT INTO `dove_menu` VALUES ('102', '94', '分类管理', 'index.php?m=Gaoren&c=Admincp&a=type&menuid=102', 'Gaoren', 'Admincp', 'type', '', '0', '7', '1', '1433384131', '');
INSERT INTO `dove_menu` VALUES ('104', '50', '测身价', 'index.php?m=Tools&c=Admincp&a=worth&menuid=104', 'Tools', 'Admincp', 'worth', '', '0', '0', '1', '1437446441', '');
INSERT INTO `dove_menu` VALUES ('105', '94', '活动沙龙', 'index.php?m=Gaoren&c=Admincp&a=activity&menuid=105', 'Gaoren', 'Admincp', 'activity', '', '0', '3', '1', '1440836244', '');
INSERT INTO `dove_menu` VALUES ('106', '0', '画廊应用', 'index.php?m=Draw&c=Admincp&a=&menuid=106', 'Draw', 'Admincp', '', '', '1', '0', '0', '1449041945', 'bg-success@ fa-archive');
INSERT INTO `dove_menu` VALUES ('107', '106', '文章管理', 'index.php?m=Draw&c=Admincp&a=article&menuid=107', 'Draw', 'Admincp', 'article', '文章作品', '0', '1', '1', '1449127863', '');
INSERT INTO `dove_menu` VALUES ('110', '106', '作品管理', 'index.php?m=Draw&c=Admincp&a=works&menuid=110', 'Draw', 'Admincp', 'works', '', '1', '2', '1', '1449561438', '');
INSERT INTO `dove_menu` VALUES ('108', '106', '会员管理', 'index.php?m=Draw&c=Admincp&a=member&menuid=108', 'Draw', 'Admincp', 'member', '会员管理会员管理会员管理', '0', '0', '1', '1449130121', '');
INSERT INTO `dove_menu` VALUES ('109', '106', '会员认证', 'index.php?m=Draw&c=Admincp&a=approve&menuid=109', 'Draw', 'Admincp', 'approve', '', '0', '0', '1', '1449130121', '');
INSERT INTO `dove_menu` VALUES ('111', '110', '作品分类', 'index.php?m=Draw&c=Admincp&a=worksType&menuid=111', 'Draw', 'Admincp', 'worksType', '', '0', '2', '1', '1450402317', '');
INSERT INTO `dove_menu` VALUES ('112', '110', '作品列表', 'index.php?m=Draw&c=Admincp&a=works&menuid=112', 'Draw', 'Admincp', 'works', '', '0', '1', '1', '1450402317', '');
INSERT INTO `dove_menu` VALUES ('113', '106', '评论管理', 'index.php?m=Draw&c=Admincp&a=comment&menuid=113', 'Draw', 'Admincp', 'comment', '', '0', '3', '1', '1450432750', '');
INSERT INTO `dove_menu` VALUES ('114', '106', '应用设置', 'index.php?m=Draw&c=Admincp&a=setDraw&menuid=114', 'Draw', 'Admincp', 'setDraw', '画廊应用设置', '0', '4', '1', '1450690844', '');
INSERT INTO `dove_menu` VALUES ('115', '0', '武魂应用', 'index.php?m=Wu&c=Admincp&a=&menuid=115', 'Wu', 'Admincp', '', '', '1', '0', '1', '1451716211', 'bg-warning@fa-anchor');
INSERT INTO `dove_menu` VALUES ('116', '115', '会员管理', 'index.php?m=Wu&c=Admincp&a=member&menuid=116', 'Wu', 'Admincp', 'member', '', '0', '0', '1', '1451716229', '');
INSERT INTO `dove_menu` VALUES ('117', '115', '武者认证', 'index.php?m=Wu&c=Admincp&a=approve&menuid=117', 'Wu', 'Admincp', 'approve', '', '0', '0', '1', '1451720833', '');
INSERT INTO `dove_menu` VALUES ('118', '115', '分类管理', 'index.php?m=Wu&c=Admincp&a=type&menuid=118', 'Wu', 'Admincp', 'type', '', '0', '0', '0', '1452000229', '');
INSERT INTO `dove_menu` VALUES ('119', '115', '武谱管理', 'index.php?m=Wu&c=Admincp&a=spectrum&menuid=119', 'Wu', 'Admincp', 'spectrum', '', '0', '0', '1', '1452516149', '');
INSERT INTO `dove_menu` VALUES ('120', '115', '功夫圈管理', 'index.php?m=Wu&c=Admincp&a=circle&menuid=120', 'Wu', 'Admincp', 'circle', '', '1', '0', '1', '1453300382', '');
INSERT INTO `dove_menu` VALUES ('121', '115', '评论管理', 'index.php?m=Wu&c=Admincp&a=comment&menuid=121', 'Wu', 'Admincp', 'comment', '评论管理', '0', '0', '1', '1453644547', '');
INSERT INTO `dove_menu` VALUES ('122', '120', '功夫圈列表', 'index.php?m=Wu&c=Admincp&a=circle&menuid=122', 'Wu', 'Admincp', 'circle', '功夫圈列表', '0', '0', '1', '1453900865', '');
INSERT INTO `dove_menu` VALUES ('123', '120', '功夫圈标签 ', 'index.php?m=Wu&c=Admincp&a=tag&menuid=123', 'Wu', 'Admincp', 'tag', '', '0', '0', '1', '1453900865', '');
INSERT INTO `dove_menu` VALUES ('124', '115', '新闻管理', '', '', '', '', '', '1', '0', '1', '1454060908', '');
INSERT INTO `dove_menu` VALUES ('125', '124', '栏目设置', 'index.php?m=Wu&c=Admincp&a=channel&menuid=125', 'Wu', 'Admincp', 'channel', '', '0', '0', '1', '1454061117', '');
INSERT INTO `dove_menu` VALUES ('126', '124', '文章管理', 'index.php?m=Wu&c=Admincp&a=news&menuid=126', 'Wu', 'Admincp', 'news', '', '0', '0', '1', '1454061117', '');

-- ----------------------------
-- Table structure for dove_menu_copy
-- ----------------------------
DROP TABLE IF EXISTS `dove_menu_copy`;
CREATE TABLE `dove_menu_copy` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `menuname` varchar(32) NOT NULL DEFAULT '' COMMENT '菜单名称',
  `url` varchar(180) NOT NULL DEFAULT '',
  `m` char(32) NOT NULL DEFAULT '' COMMENT '模块',
  `c` char(32) NOT NULL DEFAULT '' COMMENT '控制器',
  `a` char(32) NOT NULL DEFAULT '' COMMENT '方法',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '备注说明',
  `child` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否存在子级栏目',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0',
  `is_display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1：显示 0：不显示',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  `style` varchar(255) DEFAULT '' COMMENT '栏目样式',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`,`m`,`c`,`a`,`is_display`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dove_menu_copy
-- ----------------------------
INSERT INTO `dove_menu_copy` VALUES ('1', '0', '系统设置', '', '#', '#', '#', '#', '1', '100', '1', '1414997367', 'bg-primary dker@fa-gear');
INSERT INTO `dove_menu_copy` VALUES ('8', '1', '菜单管理', 'index.php?m=Admin&c=Index&a=menus&menuid=8', 'Admin', 'Index', 'menus', '后台菜单 增 删 改 排序', '0', '0', '1', '1415069975', null);
INSERT INTO `dove_menu_copy` VALUES ('4', '0', '微信服务', 'index.php?m=Admin&c=Index&a=editMenu', '', '', '', '', '1', '1', '1', '1415003692', 'bg-danger@fa-comments');
INSERT INTO `dove_menu_copy` VALUES ('9', '1', '系统配置', 'index.php?m=Admin&c=Index&a=setSystem&menuid=9', 'Admin', 'Index', 'setSystem', '管理员 系统配置', '0', '4', '1', '1415069975', null);
INSERT INTO `dove_menu_copy` VALUES ('10', '4', '自动回复', 'index.php?m=Wechat&c=Admincp&a=beAdded&menuid=10', 'Wechat', 'Admincp', 'beAdded', '', '0', '0', '1', '1415069975', null);
INSERT INTO `dove_menu_copy` VALUES ('58', '50', '刮刮卡', 'index.php?m=Tools&c=Admincp&a=lottery&menuid=58', 'Tools', 'Admincp', 'lottery', '', '0', '0', '0', '1425606686', '');
INSERT INTO `dove_menu_copy` VALUES ('17', '0', '商城管理', 'index.php?m=Admin&c=Index&a=editMenu', '', '', '', '', '1', '1', '0', '1415323864', 'bg-success@fa-shopping-cart');
INSERT INTO `dove_menu_copy` VALUES ('18', '1', '角色管理', 'index.php?m=Admin&c=Index&a=role&menuid=18', 'Admin', 'Index', 'role', '添加角色 编辑角色 删除角色', '0', '2', '1', '1415324766', null);
INSERT INTO `dove_menu_copy` VALUES ('19', '1', '用户管理', 'index.php?m=Admin&c=Index&a=wxuser&menuid=19', 'Admin', 'Index', 'wxuser', '添加用户 删除用户 编辑用户', '0', '1', '1', '1415340197', '');
INSERT INTO `dove_menu_copy` VALUES ('25', '4', '自定义菜单', 'index.php?m=Wechat&c=Admincp&a=button&menuid=25', 'Wechat', 'Admincp', 'button', '微信自定义菜单', '0', '5', '1', '1415582800', '');
INSERT INTO `dove_menu_copy` VALUES ('30', '4', '素材管理', 'index.php?m=Wechat&c=Admincp&a=appNews&menuid=30', 'Wechat', 'Admincp', 'appNews', '素材管理 图文消息', '0', '1', '1', '1415781904', '');
INSERT INTO `dove_menu_copy` VALUES ('29', '4', '公众号设置', 'index.php?m=Wechat&c=Admincp&a=weixinInfo&menuid=29', 'Wechat', 'Admincp', 'weixinInfo', '微信账号设置', '0', '10', '1', '1415600192', '');
INSERT INTO `dove_menu_copy` VALUES ('31', '4', '消息管理', 'index.php?m=Wechat&c=Admincp&a=message&menuid=31', 'Wechat', 'Admincp', 'message', '微信消息管理', '0', '3', '1', '1415781945', '');
INSERT INTO `dove_menu_copy` VALUES ('32', '4', '粉丝管理', 'index.php?m=Wechat&c=Admincp&a=fans&menuid=32', 'Wechat', 'Admincp', 'fans', '微信粉丝管理', '0', '4', '1', '1415781945', '');
INSERT INTO `dove_menu_copy` VALUES ('33', '17', '商城设置', '', '', '', '', '', '1', '0', '1', '1415782731', '');
INSERT INTO `dove_menu_copy` VALUES ('34', '17', '商品管理', '', '', '', '', '', '1', '0', '1', '1415782731', '');
INSERT INTO `dove_menu_copy` VALUES ('35', '17', '订单管理', 'index.php?m=Shop&c=Admincp&a=order&menuid=35', '', '', '', '订单管理', '1', '0', '1', '1415782731', '');
INSERT INTO `dove_menu_copy` VALUES ('36', '17', '促销管理', 'index.php?m=Admin&c=Index&a=Shop&menuid=36', 'Shop', '', '', '商城 商品促销管理', '1', '0', '1', '1415782731', '');
INSERT INTO `dove_menu_copy` VALUES ('37', '33', '配送方式', 'index.php?m=Shop&c=Admincp&a=express&menuid=37', 'Shop', 'Admincp', 'express', '物流设置', '0', '4', '1', '1415782940', '');
INSERT INTO `dove_menu_copy` VALUES ('38', '33', '支付设置', 'index.php?m=Shop&c=Admincp&a=payments&menuid=38', 'Shop', 'Admincp', 'payments', '', '0', '3', '1', '1415782940', '');
INSERT INTO `dove_menu_copy` VALUES ('39', '33', '分类管理', 'index.php?m=Shop&c=Admincp&a=category&menuid=39', 'Shop', 'Admincp', 'category', '商品分类', '0', '2', '1', '1415782940', '');
INSERT INTO `dove_menu_copy` VALUES ('40', '33', '商品类型', 'index.php?m=Shop&c=Admincp&a=productType&menuid=40', 'Shop', 'Admincp', 'productType', '商城类型管理', '0', '1', '1', '1415782940', '');
INSERT INTO `dove_menu_copy` VALUES ('41', '33', '基础设置', 'index.php?m=Shop&c=Admincp&a=setShop&menuid=41', 'Shop', 'Admincp', 'setShop', '商家 商城设置', '0', '0', '1', '1415783299', '');
INSERT INTO `dove_menu_copy` VALUES ('42', '34', '商品列表', 'index.php?m=Shop&c=Admincp&a=products&menuid=42', 'Shop', 'Admincp', 'products', '商城 商品列表', '0', '3', '1', '1415783299', '');
INSERT INTO `dove_menu_copy` VALUES ('43', '34', '新增商品', 'index.php?m=Shop&c=Admincp&a=addProduct&menuid=43', 'Shop', 'Admincp', 'addProduct', '添加商品', '0', '2', '1', '1415783299', '');
INSERT INTO `dove_menu_copy` VALUES ('44', '0', '会员管理', 'index.php?m=Admin&c=Index&a=Member&menuid=44', 'Member', '', '', '会员模块', '1', '2', '0', '1415787376', 'bg-warning@fa-male');
INSERT INTO `dove_menu_copy` VALUES ('45', '44', '会员列表', 'index.php?m=Member&c=Admincp&a=member&menuid=45', 'Member', 'Admincp', 'member', '会员列表', '0', '0', '1', '1415787485', '');
INSERT INTO `dove_menu_copy` VALUES ('46', '34', '商品回收站', 'index.php?m=Shop&c=Admincp&a=trashProduct&menuid=46', 'Shop', 'Admincp', 'trashProduct', '商品回收站', '0', '4', '1', '1417421161', '');
INSERT INTO `dove_menu_copy` VALUES ('79', '50', '微现场', 'index.php?m=Tools&c=Admincp&a=live&menuid=79', 'Tools', 'Admincp', 'live', '现场活动', '0', '7', '0', '1428369598', '');
INSERT INTO `dove_menu_copy` VALUES ('48', '35', '订单列表', 'index.php?m=Shop&c=Admincp&a=order&menuid=48', 'Shop', 'Admincp', 'order', '订单列表', '0', '0', '1', '1418958828', '');
INSERT INTO `dove_menu_copy` VALUES ('49', '0', '分销管理', 'index.php?m=Admin&c=Index&a=Share&menuid=49', 'Share', '', '', '', '1', '3', '0', '1419649651', 'bg-primary@fa-puzzle-piece');
INSERT INTO `dove_menu_copy` VALUES ('50', '0', '营销工具', 'index.php?m=Admin&c=Index&a=Tools&menuid=50', 'Tools', '', '', '', '1', '4', '1', '1419649651', 'bg-info@fa-briefcase');
INSERT INTO `dove_menu_copy` VALUES ('51', '1', '模块管理', 'index.php?m=Admin&c=Index&a=module&menuid=51', 'Admin', 'Index', 'module', '系统模块管理', '0', '3', '1', '1420003059', '');
INSERT INTO `dove_menu_copy` VALUES ('52', '1', '清除缓存', 'index.php?m=Admin&c=Index&a=clearCache&menuid=52', 'Admin', 'Index', 'clearCache', '系统清除缓存功能', '0', '5', '1', '1420016197', '');
INSERT INTO `dove_menu_copy` VALUES ('53', '0', '连锁加盟', 'index.php?m=Admin&c=Index&a=Linkage&menuid=53', 'Linkage', '', '', '', '1', '6', '0', '1420366086', 'bg-warning@fa-retweet');
INSERT INTO `dove_menu_copy` VALUES ('54', '53', '代理商管理', 'index.php?m=Linkage&c=Admincp&a=chain&menuid=54', 'Linkage', 'Admincp', 'chain', '连锁店管理 添加 删除 修改', '0', '1', '1', '1420428095', '');
INSERT INTO `dove_menu_copy` VALUES ('55', '53', '价格管理', 'index.php?m=Linkage&c=Admincp&a=price&menuid=55', 'Linkage', 'Admincp', 'price', '', '0', '2', '1', '1420428095', '');
INSERT INTO `dove_menu_copy` VALUES ('56', '53', '财务日志', 'index.php?m=Linkage&c=Admincp&a=balance&menuid=56', 'Linkage', 'Admincp', 'balance', '', '0', '3', '1', '1420428095', '');
INSERT INTO `dove_menu_copy` VALUES ('57', '44', '推广专员', 'index.php?m=Member&c=Admincp&a=referer&menuid=57', 'Member', 'Admincp', 'referer', '', '0', '3', '1', '1425456923', '');
INSERT INTO `dove_menu_copy` VALUES ('59', '50', '大转盘', 'index.php?m=Tools&c=Admincp&a=wheel&menuid=59', 'Tools', 'Admincp', 'wheel', '', '0', '1', '0', '1425606686', '');
INSERT INTO `dove_menu_copy` VALUES ('60', '49', '分销商列表', 'index.php?m=Share&c=Admincp&a=share&menuid=60', 'Share', 'Admincp', 'share', '', '0', '0', '0', '1425607448', '');
INSERT INTO `dove_menu_copy` VALUES ('61', '44', '会员卡', 'index.php?m=Member&c=Admincp&a=cardlist&menuid=61', 'Member', 'Admincp', 'cardlist', '', '0', '2', '0', '1425615556', '');
INSERT INTO `dove_menu_copy` VALUES ('62', '50', '问卷调查', 'index.php?m=Tools&c=Admincp&a=survey&menuid=62', 'Tools', 'Admincp', 'survey', '', '0', '2', '0', '1425623582', '');
INSERT INTO `dove_menu_copy` VALUES ('63', '50', '欢乐答题', 'index.php?m=Tools&c=Admincp&a=answer&menuid=63', 'Tools', 'Admincp', 'answer', '', '0', '3', '0', '1425623582', '');
INSERT INTO `dove_menu_copy` VALUES ('64', '4', '群发信息', 'index.php?m=Wechat&c=Admincp&a=sendMessage&menuid=64', 'Wechat', 'Admincp', 'sendMessage', '', '0', '2', '1', '1425627413', '');
INSERT INTO `dove_menu_copy` VALUES ('65', '35', '订单统计', 'index.php?m=Shop&c=Admincp&a=orderReport&menuid=65', 'Shop', 'Admincp', 'orderReport', '', '0', '2', '1', '1425700831', '');
INSERT INTO `dove_menu_copy` VALUES ('66', '50', '优惠券', 'index.php?m=Tools&c=Admincp&a=coupons&menuid=66', 'Tools', 'Admincp', 'coupons', '', '0', '4', '0', '1425890036', '');
INSERT INTO `dove_menu_copy` VALUES ('67', '36', '红包类型', 'index.php?m=Shop&c=Admincp&a=bonus&menuid=67', 'Shop', 'Admincp', 'bonus', '', '0', '1', '1', '1425956282', '');
INSERT INTO `dove_menu_copy` VALUES ('68', '36', '超值礼包', 'index.php?m=Shop&c=Admincp&a=package&menuid=68', 'Shop', 'Admincp', 'package', '', '0', '2', '1', '1425956282', '');
INSERT INTO `dove_menu_copy` VALUES ('69', '36', '优惠活动', 'index.php?m=Shop&c=Admincp&a=special&menuid=69', 'Shop', 'Admincp', 'special', '', '0', '0', '1', '1425956282', '');
INSERT INTO `dove_menu_copy` VALUES ('70', '0', '手机网站', 'index.php?Site/Admincp/?menuid=70', 'Site', 'Admincp', '', '', '1', '7', '0', '1427075155', 'bg-danger@fa-puzzle-piece');
INSERT INTO `dove_menu_copy` VALUES ('71', '70', '栏目管理', 'index.php?m=Site&c=Admincp&a=channel&menuid=71', 'Site', 'Admincp', 'channel', '', '0', '3', '1', '1427075765', '');
INSERT INTO `dove_menu_copy` VALUES ('72', '70', '模板风格', 'index.php?m=Site&c=Admincp&a=template&menuid=72', 'Site', 'Admincp', 'template', '', '0', '2', '1', '1427075765', '');
INSERT INTO `dove_menu_copy` VALUES ('73', '70', '内容管理', 'index.php?m=Site&c=Admincp&a=news&menuid=73', 'Site', 'Admincp', 'news', '', '0', '4', '1', '1427075765', '');
INSERT INTO `dove_menu_copy` VALUES ('74', '70', '微站设置', 'index.php?m=Site&c=Admincp&a=setSite&menuid=74', 'Site', 'Admincp', 'setSite', '', '0', '0', '1', '1427075765', '');
INSERT INTO `dove_menu_copy` VALUES ('75', '70', '留言反馈', 'index.php?m=Site&c=Admincp&a=feedback&menuid=75', 'Site', 'Admincp', 'feedback', '', '0', '4', '1', '1427079486', '');
INSERT INTO `dove_menu_copy` VALUES ('76', '4', '二维码管理', 'index.php?m=Wechat&c=Admincp&a=qrCode&menuid=76', 'Wechat', 'Admincp', 'qrCode', '', '0', '6', '1', '1427161259', '');
INSERT INTO `dove_menu_copy` VALUES ('77', '50', '应用场景', 'index.php?m=Tools&c=Admincp&a=scene&menuid=77', 'Tools', 'Admincp', 'scene', '', '0', '5', '0', '1427276369', '');
INSERT INTO `dove_menu_copy` VALUES ('78', '50', '转发有礼', 'index.php?m=Tools&c=Admincp&a=transmit&menuid=78', 'Tools', 'Admincp', 'transmit', '', '0', '6', '0', '1427276369', '');
INSERT INTO `dove_menu_copy` VALUES ('82', '81', '组织活动', 'index.php?m=Interact&c=Admincp&a=activity&menuid=82', 'Interact', 'Admincp', 'activity', '发布活动，作者：郑锦成', '0', '0', '1', '1428903012', '');
INSERT INTO `dove_menu_copy` VALUES ('81', '0', '微粉互动', 'index.php?m=Interact&c=&a=&menuid=81', 'Interact', '', '', '', '1', '5', '0', '1428902894', 'bg-primary dker@fa-group');
INSERT INTO `dove_menu_copy` VALUES ('85', '0', '账号管理', 'index.php?m=Account&c=&a=&menuid=85', 'Account', '', '', '', '1', '8', '1', '1430274417', 'bg-info@fa-wrench');
INSERT INTO `dove_menu_copy` VALUES ('84', '53', '基础设置', 'index.php?m=Linkage&c=Admincp&a=setLinkage&menuid=84', 'Linkage', 'Admincp', 'setLinkage', '连锁加盟板块设置', '0', '0', '1', '1430188404', '');
INSERT INTO `dove_menu_copy` VALUES ('86', '85', '账号信息', 'index.php?m=Account&c=Admincp&a=userInfo&menuid=86', 'Account', 'Admincp', 'userInfo', '', '0', '0', '1', '1430275417', '');
INSERT INTO `dove_menu_copy` VALUES ('87', '85', '修改密码', 'index.php?m=Account&c=Admincp&a=changePwd&menuid=87', 'Account', 'Admincp', 'changePwd', '', '0', '0', '1', '1430275417', '');
INSERT INTO `dove_menu_copy` VALUES ('91', '85', '操作日志', 'index.php?m=Account&c=Admincp&a=lookLog&menuid=91', 'Account', 'Admincp', 'lookLog', '', '0', '0', '1', '1430539997', '');
INSERT INTO `dove_menu_copy` VALUES ('89', '85', '工号管理', 'index.php?m=Account&c=Admincp&a=user&menuid=89', 'Account', 'Admincp', 'user', '', '0', '0', '1', '1430276835', '');
INSERT INTO `dove_menu_copy` VALUES ('90', '85', '角色管理', 'index.php?m=Account&c=Admincp&a=role&menuid=90', 'Account', 'Admincp', 'role', '', '0', '0', '1', '1430276835', '');
INSERT INTO `dove_menu_copy` VALUES ('92', '44', '会员等级', 'index.php?m=Member&c=Admincp&a=memberRank&menuid=92', 'Member', 'Admincp', 'memberRank', '', '0', '1', '1', '1431331610', '');
INSERT INTO `dove_menu_copy` VALUES ('93', '33', '自提设置', 'index.php?m=Shop&c=Admincp&a=take&menuid=93', 'Shop', 'Admincp', 'take', '', '0', '5', '1', '1431507645', '');
INSERT INTO `dove_menu_copy` VALUES ('94', '0', '高人应用', 'index.php?m=Gaoren&c=&a=&menuid=94', 'Gaoren', '', '', '', '1', '0', '0', '1432089568', 'bg-danger@fa-thumbs-up');
INSERT INTO `dove_menu_copy` VALUES ('95', '94', '会员管理', 'index.php?m=Gaoren&c=Admincp&a=member&menuid=95', 'Gaoren', 'Admincp', 'member', '会员管理', '0', '0', '1', '1432089749', '');
INSERT INTO `dove_menu_copy` VALUES ('96', '94', '高人管理', 'index.php?m=Gaoren&c=Admincp&a=master&menuid=96', 'Gaoren', 'Admincp', 'master', '高人管理', '0', '1', '1', '1432089749', '');
INSERT INTO `dove_menu_copy` VALUES ('97', '94', '订单管理', 'index.php?m=Gaoren&c=Admincp&a=order&menuid=97', 'Gaoren', 'Admincp', 'order', '订单管理', '0', '4', '1', '1432089749', '');
INSERT INTO `dove_menu_copy` VALUES ('98', '94', '评论管理', 'index.php?m=Gaoren&c=Admincp&a=reviews&menuid=98', 'Gaoren', 'Admincp', 'reviews', '评论管理', '0', '5', '1', '1432089749', '');
INSERT INTO `dove_menu_copy` VALUES ('99', '94', '财务管理', 'index.php?m=Gaoren&c=Admincp&a=finance&menuid=99', 'Gaoren', 'Admincp', 'finance', '财务管理', '0', '6', '1', '1432089749', '');
INSERT INTO `dove_menu_copy` VALUES ('100', '94', '应用设置', 'index.php?m=Gaoren&c=Admincp&a=setGaoren&menuid=100', 'Gaoren', 'Admincp', 'setGaoren', '高人APP设置', '0', '9', '1', '1432089749', '');
INSERT INTO `dove_menu_copy` VALUES ('103', '94', '标签管理', 'index.php?m=Gaoren&c=Admincp&a=tag&menuid=103', 'Gaoren', 'Admincp', 'tag', '', '0', '8', '1', '1433923426', '');
INSERT INTO `dove_menu_copy` VALUES ('101', '94', '产品管理', 'index.php?m=Gaoren&c=Admincp&a=products&menuid=101', 'Gaoren', 'Admincp', 'products', '', '0', '2', '1', '1432864706', '');
INSERT INTO `dove_menu_copy` VALUES ('102', '94', '分类管理', 'index.php?m=Gaoren&c=Admincp&a=type&menuid=102', 'Gaoren', 'Admincp', 'type', '', '0', '7', '1', '1433384131', '');
INSERT INTO `dove_menu_copy` VALUES ('104', '50', '测身价', 'index.php?m=Tools&c=Admincp&a=worth&menuid=104', 'Tools', 'Admincp', 'worth', '', '0', '0', '1', '1437446441', '');
INSERT INTO `dove_menu_copy` VALUES ('105', '94', '活动沙龙', 'index.php?m=Gaoren&c=Admincp&a=activity&menuid=105', 'Gaoren', 'Admincp', 'activity', '', '0', '3', '1', '1440836244', '');
INSERT INTO `dove_menu_copy` VALUES ('106', '0', '画廊应用', 'index.php?m=Draw&c=Admincp&a=&menuid=106', 'Draw', 'Admincp', '', '', '1', '0', '0', '1449041945', 'bg-success@ fa-archive');
INSERT INTO `dove_menu_copy` VALUES ('107', '106', '文章管理', 'index.php?m=Draw&c=Admincp&a=article&menuid=107', 'Draw', 'Admincp', 'article', '文章作品', '0', '1', '1', '1449127863', '');
INSERT INTO `dove_menu_copy` VALUES ('110', '106', '作品管理', 'index.php?m=Draw&c=Admincp&a=works&menuid=110', 'Draw', 'Admincp', 'works', '', '1', '2', '1', '1449561438', '');
INSERT INTO `dove_menu_copy` VALUES ('108', '106', '会员管理', 'index.php?m=Draw&c=Admincp&a=member&menuid=108', 'Draw', 'Admincp', 'member', '会员管理会员管理会员管理', '0', '0', '1', '1449130121', '');
INSERT INTO `dove_menu_copy` VALUES ('109', '106', '会员认证', 'index.php?m=Draw&c=Admincp&a=approve&menuid=109', 'Draw', 'Admincp', 'approve', '', '0', '0', '1', '1449130121', '');
INSERT INTO `dove_menu_copy` VALUES ('111', '110', '作品分类', 'index.php?m=Draw&c=Admincp&a=worksType&menuid=111', 'Draw', 'Admincp', 'worksType', '', '0', '2', '1', '1450402317', '');
INSERT INTO `dove_menu_copy` VALUES ('112', '110', '作品列表', 'index.php?m=Draw&c=Admincp&a=works&menuid=112', 'Draw', 'Admincp', 'works', '', '0', '1', '1', '1450402317', '');
INSERT INTO `dove_menu_copy` VALUES ('113', '106', '评论管理', 'index.php?m=Draw&c=Admincp&a=comment&menuid=113', 'Draw', 'Admincp', 'comment', '', '0', '3', '1', '1450432750', '');
INSERT INTO `dove_menu_copy` VALUES ('114', '106', '应用设置', 'index.php?m=Draw&c=Admincp&a=setDraw&menuid=114', 'Draw', 'Admincp', 'setDraw', '画廊应用设置', '0', '4', '1', '1450690844', '');
INSERT INTO `dove_menu_copy` VALUES ('115', '0', '武魂应用', 'index.php?m=Wu&c=Admincp&a=&menuid=115', 'Wu', 'Admincp', '', '', '1', '0', '1', '1451716211', 'bg-warning@fa-anchor');
INSERT INTO `dove_menu_copy` VALUES ('116', '115', '会员管理', 'index.php?m=Wu&c=Admincp&a=member&menuid=116', 'Wu', 'Admincp', 'member', '', '0', '0', '1', '1451716229', '');
INSERT INTO `dove_menu_copy` VALUES ('117', '115', '武者认证', 'index.php?m=Wu&c=Admincp&a=approve&menuid=117', 'Wu', 'Admincp', 'approve', '', '0', '0', '1', '1451720833', '');
INSERT INTO `dove_menu_copy` VALUES ('118', '115', '分类管理', 'index.php?m=Wu&c=Admincp&a=type&menuid=118', 'Wu', 'Admincp', 'type', '', '0', '0', '0', '1452000229', '');
INSERT INTO `dove_menu_copy` VALUES ('119', '115', '武谱管理', 'index.php?m=Wu&c=Admincp&a=spectrum&menuid=119', 'Wu', 'Admincp', 'spectrum', '', '1', '0', '1', '1452516149', '');
INSERT INTO `dove_menu_copy` VALUES ('120', '115', '功夫圈管理', 'index.php?m=Wu&c=Admincp&a=circle&menuid=120', 'Wu', 'Admincp', 'circle', '', '1', '0', '1', '1453300382', '');
INSERT INTO `dove_menu_copy` VALUES ('121', '115', '评论管理', 'index.php?m=Wu&c=Admincp&a=comment&menuid=121', 'Wu', 'Admincp', 'comment', '评论管理', '0', '0', '1', '1453644547', '');
INSERT INTO `dove_menu_copy` VALUES ('122', '120', '功夫圈列表', 'index.php?m=Wu&c=Admincp&a=circle&menuid=122', 'Wu', 'Admincp', 'circle', '功夫圈列表', '0', '0', '1', '1453900865', '');
INSERT INTO `dove_menu_copy` VALUES ('123', '120', '功夫圈标签 ', 'index.php?m=Wu&c=Admincp&a=tag&menuid=123', 'Wu', 'Admincp', 'tag', '', '0', '0', '1', '1453900865', '');
INSERT INTO `dove_menu_copy` VALUES ('124', '115', '新闻管理', '', '', '', '', '', '1', '0', '1', '1454060908', '');
INSERT INTO `dove_menu_copy` VALUES ('125', '124', '栏目设置', 'index.php?m=Wu&c=Admincp&a=channel&menuid=125', 'Wu', 'Admincp', 'channel', '', '0', '0', '1', '1454061117', '');
INSERT INTO `dove_menu_copy` VALUES ('126', '124', '文章管理', 'index.php?m=Wu&c=Admincp&a=news&menuid=126', 'Wu', 'Admincp', 'news', '', '0', '0', '1', '1454061117', '');
INSERT INTO `dove_menu_copy` VALUES ('127', '119', '分类管理', 'index.php?m=Wu&c=Admincp&a=type&menuid=127', 'Wu', 'Admincp', 'type', '', '0', '0', '1', '1457014724', '');
INSERT INTO `dove_menu_copy` VALUES ('128', '119', '武谱管理', 'index.php?m=Wu&c=Admincp&a=spectrum&menuid=128', 'Wu', 'Admincp', 'spectrum', '', '0', '0', '1', '1457014724', '');

-- ----------------------------
-- Table structure for dove_role
-- ----------------------------
DROP TABLE IF EXISTS `dove_role`;
CREATE TABLE `dove_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `rolename` varchar(32) NOT NULL DEFAULT '' COMMENT '角色名称',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '备注说明',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `rules` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dove_role
-- ----------------------------
INSERT INTO `dove_role` VALUES ('1', '0', '超级管理员', '拥有站点的最高权限', '1', '0', '94,96,101,105,97,98,99,102,103,115,116,117,119,120,122,123,121,124,125,126,4,10,30,64,31,32,25,76,29,50,104,85,86,87,89,90,91,1,8,19,18,51,9,52');
INSERT INTO `dove_role` VALUES ('8', '0', '商城用户', '', '1', '0', '94,96,101,105,97,98,99,102,103,25,85,86');
INSERT INTO `dove_role` VALUES ('3', '0', '普通用户', '普通用户', '1', '0', '94,96,101,105,97,98,99,102,103,115,116,117,119,120,122,123,121,124,125,126,4,10,30,64,31,32,25,76,29,50,104,85,86,87,89,90,91,1,8,19,18,51,9,52');
INSERT INTO `dove_role` VALUES ('6', '0', '普通管理员', '', '1', '0', '');
INSERT INTO `dove_role` VALUES ('10', '0', 'sdfsdfsd', 'fsfsdfdsf', '1', '0', '');

-- ----------------------------
-- Table structure for dove_user
-- ----------------------------
DROP TABLE IF EXISTS `dove_user`;
CREATE TABLE `dove_user` (
  `uid` char(11) NOT NULL,
  `pid` char(11) NOT NULL DEFAULT '0' COMMENT '父级id',
  `username` char(32) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `token` char(64) NOT NULL COMMENT '令牌',
  `mobile` varchar(11) NOT NULL DEFAULT '' COMMENT '手机号',
  `email` varchar(120) NOT NULL DEFAULT '' COMMENT '邮箱',
  `qq` varchar(15) NOT NULL DEFAULT '' COMMENT 'qq号',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '3' COMMENT '用户级别 1：管理者、2：代理、3：普通用户',
  `number` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '开设会员数量',
  `lastloginip` char(15) NOT NULL DEFAULT '' COMMENT '登录IP',
  `lastlogintime` int(10) NOT NULL DEFAULT '0' COMMENT '登录时间',
  `login_num` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `expiredate` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员有效期',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否禁用 1：不禁用 、0：禁用',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dove_user
-- ----------------------------
INSERT INTO `dove_user` VALUES ('1', '0', 'admin', '7fef6171469e80d32c0559f88b377245', '7fef6171469e80d32', '15124237808', 'admin@admin.com', '334804822', '1', '14', '127.0.0.1', '1493188301', '814', '63072000', '1', '1414481453');
INSERT INTO `dove_user` VALUES ('ZD862918090', '1', 'liangying', 'e10adc3949ba59abbe56e057f20f883e', '2WRJTQYpq5BR433L', '', '', '', '3', '0', '58.135.80.161', '1431058910', '11', '15552000', '1', '1421397652');
INSERT INTO `dove_user` VALUES ('ZD920877000', '1', 'marjakurkicn', '36553aa464300b3155eb26995b1e201e', 's95bJFPfPnZpAzPM', '', '', '', '3', '0', '124.193.122.234', '1423551973', '0', '0', '1', '1423551925');
INSERT INTO `dove_user` VALUES ('ZD909212220', '1', 'marja_kurki', '36553aa464300b3155eb26995b1e201e', 'F27CFn6vUataDSYZ', '', '', '', '3', '0', '123.151.42.46', '1423543233', '0', '0', '1', '1423461726');
INSERT INTO `dove_user` VALUES ('ZD951753131', '1', 'yami', '7d77a7ac7f8cf5eb29af05ec996f5b52', 'fh66EHywtzvsjF5W', '', '', '', '3', '0', '118.187.25.102', '1427853543', '0', '0', '1', '1426210391');
INSERT INTO `dove_user` VALUES ('ZD282714590', '1', 'alivv', 'b951e54693a591c8d1f1ca200fee3dd3', 'MMYccxsjxLJNsPPr', '13811150112', 'yuanzhimei@alivv.net', '', '3', '0', '118.187.25.102', '1432023752', '441', '31536000', '1', '1427175428');
INSERT INTO `dove_user` VALUES ('ZD537475585', '1', 'cscs111', 'c071bd38e4c31ed73ec02faa32b52e4a', 'erzBMpdUfHAzppHS', '15124237808', 'admin@admin.com', '', '3', '0', '', '0', '0', '7776000', '1', '1428040028');
INSERT INTO `dove_user` VALUES ('ZD761019897', '1', 'postfenxiao', '48d8bb63d5cf0c65ace58cc2b11f5165', 'LmGWMCqmwtFrVerL', '15802251815', '', '', '3', '0', '114.243.34.94', '1428976225', '11', '2592000', '1', '1428477306');
INSERT INTO `dove_user` VALUES ('ZD638771287', '1', 'yangguang', '4622eca18ee79614f7e4eed598ca7f09', 'RNHjC6JDZtwCPr7j', '', '', '', '3', '0', '118.187.25.102', '1429241818', '7', '2592000', '1', '1427964835');
INSERT INTO `dove_user` VALUES ('ZD550000000', '1', 'cddcc', '7b16783a9d7ce44e12deb7c9a372a027', '3ZDnJfpyxqwBaPVq', '1515222222', 'admin', '', '3', '0', '', '0', '0', '604800', '1', '1428048239');
INSERT INTO `dove_user` VALUES ('ZD619515991', '1', 'zhaoqianan', 'd14557c3606f57e7d625c5b58ff3efe8', 'QPwYWAnQjMJFrdnD', '13241811889', '644184203@qq.com', '', '3', '0', '118.187.25.102', '1431408777', '31', '2592000', '1', '1429664922');
INSERT INTO `dove_user` VALUES ('ZD869058645', '1', 'yeruiyaoye', '47ac9e64142df466370f9831dfdc3541', 'VHW5TcyTDWjZERZ8', '', '', '', '3', '0', '218.247.135.130', '1431328438', '42', '2592000', '1', '1429515001');
INSERT INTO `dove_user` VALUES ('ZD818692207', '1', 'ztming', 'f286f81412dc2e973f885c9978f2b885', 'YUzVLsdGh5uFnBzP', '', '', '', '3', '0', '218.247.135.130', '1430121544', '5', '31536000', '1', '1429852368');
INSERT INTO `dove_user` VALUES ('ZD549742530', '1', 'lichunjiang', 'eebeb24346c5362c6ce888a74b25e1da', 'ESe6zcyLqxAnT3bq', '13910993548', '13910993548@126.com', '', '3', '0', '118.187.25.102', '1431064896', '2', '7776000', '1', '1431062278');
