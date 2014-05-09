/*
 Navicat Premium Data Transfer

 Source Server         : mariaDB
 Source Server Type    : MySQL
 Source Server Version : 50505
 Source Host           : localhost
 Source Database       : wm

 Target Server Type    : MySQL
 Target Server Version : 50505
 File Encoding         : utf-8

 Date: 05/10/2014 01:02:31 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `matches`
-- ----------------------------
DROP TABLE IF EXISTS `matches`;
CREATE TABLE `matches` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL,
  `city` varchar(30) NOT NULL,
  `studio` varchar(30) NOT NULL,
  `match` varchar(30) NOT NULL,
  `host` varchar(30) NOT NULL,
  `guest` varchar(30) NOT NULL,
  `result` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `matches`
-- ----------------------------
BEGIN;
INSERT INTO `matches` VALUES ('1', '2014/6/13', '4:00', '圣保罗', '圣保罗体育场', 'A组小组赛', '巴西', '克罗地亚', ''), ('2', '2014/6/14', '0:00', '纳塔尔', '沙丘体育场', 'A组小组赛', '墨西哥', '喀麦隆', ''), ('3', '2014/6/14', '4:00', '萨尔瓦多', '新水源体育场', 'B组小组赛', '西班牙', '荷兰', ''), ('4', '2014/6/14', '6:00', '库亚巴', '潘塔纳尔体育场', 'B组小组赛', '智利', '澳大利亚', ''), ('5', '2014/6/15', '0:00', '贝洛奥里臧特', '米内罗体育场', 'C组小组赛', '哥伦比亚', '希腊', ''), ('6', '2014/6/15', '9:00', '累西腓', '伯南布哥体育场', 'C组小组赛', '科特迪瓦', '日本', ''), ('7', '2014/6/15', '3:00', '福塔雷萨', '卡斯特劳体育场', 'D组小组赛', '乌拉圭', '哥斯达黎加', ''), ('8', '2014/6/15', '6:00', '玛瑙斯', '亚马逊体育场', 'D组小组赛', '英格兰', '意大利', ''), ('9', '2014/6/16', '0:00', '巴西利亚', '巴西利亚国家体育场', 'E组小组赛', '瑞士', '厄瓜多尔', ''), ('10', '2014/6/16', '3:00', '阿雷格里港', '河岸体育场', 'E组小组赛', '法国', '洪都拉斯', ''), ('11', '2014/6/16', '6:00', '里约热内卢', '马拉卡纳体育场', 'F组小组赛', '阿根廷', '波黑', ''), ('12', '2014/6/17', '3:00', '科里蒂巴', '拜沙达体育场', 'F组小组赛', '伊朗', '尼日利亚', ''), ('13', '2014/6/17', '1:00', '萨尔瓦多', '新水源体育场', 'G组小组赛', '德国', '葡萄牙', ''), ('14', '2014/6/17', '6:00', '纳塔尔', '沙丘体育场', 'G组小组赛', '加纳', '美国', ''), ('15', '2014/6/18', '0:00', '贝洛奥里臧特', '米内罗体育场', 'H组小组赛', '比利时', '阿尔及利亚', ''), ('16', '2014/6/18', '6:00', '库亚巴', '潘塔纳尔体育场', 'H组小组赛', '俄罗斯', '韩国', ''), ('17', '2014/6/18', '3:00', '福塔雷萨', '卡斯特劳体育场', 'A组小组赛', '巴西', '墨西哥', ''), ('18', '2014/6/19', '6:00', '玛瑙斯', '亚马逊体育场', 'A组小组赛', '喀麦隆', '克罗地亚', ''), ('19', '2014/6/19', '3:00', '里约热内卢', '马拉卡纳体育场', 'B组小组赛', '西班牙', '智利', ''), ('20', '2014/6/19', '0:00', '阿雷格里港', '河岸体育场', 'B组小组赛', '澳大利亚', '荷兰', ''), ('21', '2014/6/20', '0:00', '巴西利亚', '巴西利亚国家体育场', 'C组小组赛', '哥伦比亚', '科特迪瓦', ''), ('22', '2014/6/20', '6:00', '纳塔尔', '沙丘体育场', 'C组小组赛', '日本', '希腊', ''), ('23', '2014/6/20', '3:00', '圣保罗', '圣保罗体育场', 'D组小组赛', '乌拉圭', '英格兰', ''), ('24', '2014/6/21', '0:00', '累西腓', '伯南布哥体育场', 'D组小组赛', '意大利', '哥斯达黎加', ''), ('25', '2014/6/21', '4:00', '萨尔瓦多', '新水源体育场', 'E组小组赛', '瑞士', '法国', ''), ('26', '2014/6/21', '6:00', '科里蒂巴', '拜沙达体育场', 'E组小组赛', '洪都拉斯', '厄瓜多尔', ''), ('27', '2014/6/22', '0:00', '贝洛奥里臧特', '米内罗体育场', 'F组小组赛', '阿根廷', '伊朗', ''), ('28', '2014/6/22', '6:00', '库亚巴', '潘塔纳尔体育场', 'F组小组赛', '尼日利亚', '波黑', ''), ('29', '2014/6/22', '3:00', '福塔雷萨', '卡斯特劳体育场', 'G组小组赛', '德国', '加纳', ''), ('30', '2014/6/23', '6:00', '玛瑙斯', '亚马逊体育场', 'G组小组赛', '美国', '葡萄牙', ''), ('31', '2014/6/23', '0:00', '里约热内卢', '马拉卡纳体育场', 'H组小组赛', '比利时', '俄罗斯', ''), ('32', '2014/6/23', '3:00', '阿雷格里港', '河岸体育场', 'H组小组赛', '韩国', '阿尔及利亚', ''), ('33', '2014/6/24', '4:00', '巴西利亚', '巴西利亚国家体育场', 'A组小组赛', '喀麦隆', '巴西', ''), ('34', '2014/6/24', '4:00', '累西腓', '伯南布哥体育场', 'A组小组赛', '克罗地亚', '墨西哥', ''), ('35', '2014/6/24', '0:00', '科里蒂巴', '拜沙达体育场', 'B组小组赛', '澳大利亚', '西班牙', ''), ('36', '2014/6/24', '0:00', '圣保罗', '圣保罗体育场', 'B组小组赛', '荷兰', '智利', ''), ('37', '2014/6/25', '4:00', '库亚巴', '潘塔纳尔体育场', 'C组小组赛', '日本', '哥伦比亚', ''), ('38', '2014/6/25', '4:00', '福塔雷萨', '卡斯特劳体育场', 'C组小组赛', '希腊', '科特迪瓦', ''), ('39', '2014/6/25', '0:00', '纳塔尔', '沙丘体育场', 'D组小组赛', '意大利', '乌拉圭', ''), ('40', '2014/6/25', '0:00', '贝洛奥里臧特', '米内罗体育场', 'D组小组赛', '哥斯达黎加', '英格兰', ''), ('41', '2014/6/26', '4:00', '玛瑙斯', '亚马逊体育场', 'E组小组赛', '洪都拉斯', '瑞士', ''), ('42', '2014/6/26', '4:00', '里约热内卢', '马拉卡纳体育场', 'E组小组赛', '厄瓜多尔', '法国', ''), ('43', '2014/6/26', '0:00', '阿雷格里港', '河岸体育场', 'F组小组赛', '尼日利亚', '阿根廷', ''), ('44', '2014/6/26', '0:00', '萨尔瓦多', '新水源体育场', 'F组小组赛', '波黑', '伊朗', ''), ('45', '2014/6/27', '0:00', '累西腓', '伯南布哥体育场', 'G组小组赛', '美国', '德国', ''), ('46', '2014/6/27', '0:00', '巴西利亚', '巴西利亚国家体育场', 'G组小组赛', '葡萄牙', '加纳', ''), ('47', '2014/6/27', '4:00', '圣保罗', '圣保罗体育场', 'H组小组赛', '韩国', '比利时', ''), ('48', '2014/6/27', '4:00', '科里蒂巴', '拜沙达体育场', 'H组小组赛', '阿尔及利亚', '俄罗斯', ''), ('49', '2014/6/29', '0:00', '贝洛奥里臧特', '米内罗体育场', '1/8决赛', '1A', '2B', ''), ('50', '2014/6/29', '4:00', '里约热内卢', '马拉卡纳体育场', '1/8决赛', '1C', '2D', ''), ('51', '2014/6/30', '0:00', '福塔雷萨', '卡斯特劳体育场', '1/8决赛', '1B', '2A', ''), ('52', '2014/6/30', '4:00', '累西腓', '伯南布哥体育场', '1/8决赛', '1D', '2C', ''), ('53', '2014/7/1', '0:00', '巴西利亚', '巴西利亚国家体育场', '1/8决赛', '1E', '2F', ''), ('54', '2014/7/1', '4:00', '阿雷格里港', '河岸体育场', '1/8决赛', '1G', '2H', ''), ('55', '2014/7/2', '0:00', '圣保罗', '圣保罗体育场', '1/8决赛', '1F', '2E', ''), ('56', '2014/7/2', '4:00', '萨尔瓦多', '新水源体育场', '1/8决赛', '1H', '2G', ''), ('57', '2014/7/5', '4:00', '福塔雷萨', '卡斯特劳体育场', '1/4决赛', 'W49', 'W50', ''), ('58', '2014/7/5', '0:00', '里约热内卢', '马拉卡纳体育场', '1/4决赛', 'W53', 'W54', ''), ('59', '2014/7/6', '4:00', '萨尔瓦多', '新水源体育场', '1/4决赛', 'W51', 'W52', ''), ('60', '2014/7/6', '0:00', '巴西利亚', '巴西利亚国家体育场', '1/4决赛', 'W55', 'W56', ''), ('61', '2014/7/9', '4:00', '贝洛奥里臧特', '米内罗体育场', '半决赛', 'W57', 'W58', ''), ('62', '2014/7/10', '4:00', '圣保罗', '圣保罗体育场', '半决赛', 'W59', 'W60', ''), ('63', '2014/7/12', '4:00', '巴西利亚', '巴西利亚国家体育场', '三四名决赛', 'L61', 'L62', ''), ('64', '2014/7/14', '3:00', '里约热内卢', '马拉卡纳体育场', '决赛', 'W61', 'W62', '');
COMMIT;

