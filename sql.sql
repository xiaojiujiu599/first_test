 CREATE DATABASE movie;
 USE movie;
#创建用户表
 CREATE TABLE `user`(
	`id` INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(40) NOT NULL,
	PASSWORD VARCHAR(40) NOT NULL
 )CHARSET=utf8;
 
INSERT INTO `user` (`id`,`username`,`password`) VALUES (1,`lxy`,`123456`);


 #创建评论表
CREATE TABLE `comments` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `user` VARCHAR(30) NOT NULL COMMENT '评论人昵称',
  `comment` VARCHAR(200) NOT NULL COMMENT '评论的内容',
  `addtime` DATETIME NOT NULL COMMENT '评论的时间',
  PRIMARY KEY (`id`)
);

 #创建电影信息表
CREATE TABLE `film_information` (
  `id` INT(11) NOT NULL COMMENT 'id值',
  `f_name` VARCHAR(20) NOT NULL COMMENT '电影名',
  `director` VARCHAR(50) NOT NULL COMMENT '导演',
  `actor` VARCHAR(60) NOT NULL COMMENT '演员',
  `prod_country` VARCHAR(20) NOT NULL COMMENT '产地',
  `prod_year` DATE NOT NULL COMMENT '年份',
  `catogory` VARCHAR(30) NOT NULL COMMENT '类型',
  `f_score` DECIMAL(3,2) NOT NULL COMMENT '评分',
  `introduction` VARCHAR(200) NOT NULL COMMENT '电影简介',
  PRIMARY KEY (`id`)
) ENGINE=MYISAM DEFAULT CHARSET=gbk;

INSERT INTO `film_information` VALUES(1, '天将雄狮', '李仁港','成龙、约翰·库萨克、约翰·库萨克', '中国香港', '2015-02-19', '古装/动作/战争', '7.2', '西汉汉元帝年间，西域都护府大都护霍安（成龙 饰）遭奸人陷害，沦为奴役，被刺配至雁门关修城。恰在此时，罗马将军卢魁斯护卫遭到哥哥迫害的罗马小王子逃命至雁门关。双雄在西域戈壁相遇，从开始的兵戎相见到惺惺相惜，最终化敌为友。一日，霍安为洗清自己冤屈四处追查时，无意间撞破了好兄弟殷破与罗马大王子提比斯不可告人的秘密。');
INSERT INTO `film_information` VALUES(2, '剪刀手爱德华', '蒂姆·波顿 ','约翰尼·德普、薇诺娜·瑞德、黛安娜·维斯特', '美国', '1990-12-14', '剧情/爱情/奇幻', '9.4', '该片讲述的是独自在古堡生活的剪刀手爱德华，被一位推销化妆品的女子佩格误闯城堡带回家后，与佩格的女儿相恋却无法在一起的悲剧童话故事。');
INSERT INTO `film_information` VALUES(3, '楚门的世界', '彼得·威尔 ','金·凯瑞、劳拉·琳妮、艾德·哈里斯', '美国', '1998-06-05', '剧情/科幻', '9.2', '楚门（金•凯瑞 Jim Carrey 饰）是一个平凡得不能再平凡的人。直到有一天，他忽然发觉自己似乎一直在被人跟踪，无论他走到哪里，干什么事情。这种感觉愈来愈强烈。楚门决定不惜一切代价逃离这个他生活了30多年的地方，但他却发现自己怎样也逃不出去。真相其实很残忍。');
INSERT INTO `film_information` VALUES(4, '这个杀手不太冷', '吕克·贝松 ','让·雷诺、娜塔莉·波特曼', '法国', '1994-09-14', '剧情/动作/犯罪', '9.4', '里昂是名孤独的职业杀手，受人雇佣。一天，邻居家小姑娘马蒂尔达敲开他的房门，要求在他那里暂避杀身之祸。原来邻居家的主人是警方缉毒组的眼线，只因贪污了一小包毒品而遭恶警杀害全家的惩罚。马蒂尔达得到里昂的留救，幸免于难，并留在里昂那里。里昂教小女孩使枪，她教里昂法文，两人关系日趋亲密，相处融洽。');
INSERT INTO `film_information` VALUES(5, '千与千寻', '宫崎骏 ','入野自由', '日本', '2001-07-20', '剧情/动画/奇幻', '9.3', '千寻和爸爸妈妈一同驱车前往新家，在郊外的小路上不慎进入了神秘的隧道——他们去到了另外一个诡异世界—一个中世纪的小镇。远处飘来食物的香味，爸爸妈妈大快朵颐，孰料之后变成了猪！这时小镇上渐渐来了许多样子古怪、半透明的人。千寻仓皇逃出，在小白的帮助下幸运地获得了一份在浴池打杂的工作......');
INSERT INTO `film_information` VALUES(6, '疯狂动物城', '拜伦·霍华德、瑞奇·摩尔、杰拉德·布什 ','金妮弗·古德温、杰森·贝特曼', '美国', '2016-03-04', '喜剧/动画/冒险', '9.1', '故事发生在一个所有哺乳类动物和谐共存的美好世界中，兔子朱迪从小就梦想着能够成为一名惩恶扬善的刑警，凭借着智慧和努力，朱迪成功的从警校中毕业进入了疯狂动物城警察局，殊不知这里是大型肉食类动物的领地，作为第一只，也是唯一的小型食草类动物，朱迪会遇到怎样的故事呢？ ');
INSERT INTO `film_information` VALUES(7, '熔炉', '黄东赫 ','孔侑、郑有美、金志映', '韩国', '2011-09-22', '剧情', '8.9', '来自首尔的哑语美术老师仁浩来到雾津，应聘慈爱聋哑人学校。天降大雾，他意外撞车，维修时邂逅了人权组织成员柔珍。仁浩妻子早亡，8岁女儿天生哮喘由祖母照看，所以他不辞辛苦谋职养家。然而，双胞胎的校长与教导主任竟逼仁浩索贿5千万韩元。同时，仁浩逐渐发现学校笼罩着一种紧张压抑的气氛，令人窒息。');
INSERT INTO `film_information` VALUES(8, '看不见的客人', '奥利奥尔·保罗 ','马里奥·卡萨斯、阿娜·瓦格纳、何塞·科罗纳多', '西班牙', '2016-09-23', '剧情/悬疑/惊悚/犯罪', '8.8', '艾德里安经营着一间科技公司，事业蒸蒸日上，家中有美丽贤惠的妻子和活泼可爱的女儿，事业家庭双丰收的他是旁人羡慕的对象。然而，野心勃勃的艾德里安并未珍惜眼前来之不易的生活，一直以来，他和一位名叫劳拉的女摄影师保持着肉体关系。某日幽会过后，两人驱车离开别墅，却在路上发生了车祸...... ');
INSERT INTO `film_information` VALUES(9, '穿条纹睡衣的男孩', '马克·赫尔曼 ','阿萨·巴特菲尔德、维拉·法米加、卡拉·霍根', '英国', '2008-09-12', '剧情/战争', '9.0', '八岁男孩布鲁诺一家随着纳粹军官父亲的一纸调令，由柏林搬迁到了乡下。失去了朋友们的布鲁诺很快对新家附近的“农庄”产生了兴趣，那里有一群身穿“条纹睡衣”的人终日忙碌，并且其中一个为布鲁诺一家服务，他形容肮脏，态度慎微。周遭环境和布鲁诺的举止让母亲暗暗担忧，但纳粹父亲制止家中任何怀疑既定政策的行为。 ');
INSERT INTO `film_information` VALUES(10, '超能陆战队', '唐·霍顿 ','斯科特·安第斯、瑞恩·波特、丹尼尔·海尼', '美国', '2014-11-07', '喜剧/动作/科幻/动画/冒险', '8.4', '未来世界的超级都市旧京山，热爱发明创造的天才少年小宏，在哥哥泰迪的鼓励下参加了罗伯特·卡拉汉教授主持的理工学院机器人专业的入学大赛。他凭借神奇的微型磁力机器人赢得观众、参赛者以及考官的一致好评，谁知突如其来的灾难却将小宏的梦想和人生毁于一旦。大火烧毁了展示会场，而哥哥为了救出受困的卡拉汉教授命丧火场。身心饱受创伤的小宏闭门不出，哥哥生前留下的治疗型机器人大白则成为安慰他的唯一伙伴......');
INSERT INTO `film_information` VALUES(11, '傲慢与偏见', '乔·赖特 ','凯拉·奈特莉、马修·麦克费登', '美国/法国/英国', '2005-09-16', '剧情/爱情', '8.6', '伊丽莎白·班纳特(凯拉·奈特丽 饰)出身于小地主家庭，有四个姐妹，母亲班纳特太太整天操心着为女儿物色称心如意的丈夫。新来的邻居宾格来先生和他的朋友达西打破了她们一家人单调的乡村生活。宾格来和伊丽莎白的姐姐简·班纳特互生情愫；达西对善良聪明的伊丽莎白产生了好感，而伊丽莎白却对达西不可一世的傲慢心存偏见，不接受他的感情。');
INSERT INTO `film_information` VALUES(12, '调音师', '斯里兰姆·拉格万 ','阿尤斯曼·库拉纳、塔布、拉迪卡·艾普特、安尔·德霍万', '印度', '2018-10-05', '喜剧/悬疑/惊悚/犯罪', '8.3', '双目失明的钢琴家阿卡什为了参加国际大赛，平日里通过私人授课赚取经费。事实上他的眼睛完全正常，只不过希望通过这种方式感受不同的生活。因为一场意外，阿卡什结识了美丽的姑娘苏菲。凭借出色的演奏技巧，阿卡什在苏菲父亲经营的西餐馆谋得兼职。他的演奏不仅令食客们倾倒，更虏获了苏菲的心。某天，阿卡什接受过气的影星普拉默（安尔·德霍万 Anil Dhawan 饰）的邀请，登门为对方的妻子西米演奏庆生，谁知却亲眼目睹了倒在血泊中的普拉默的尸体。');
INSERT INTO `film_information` VALUES(13, '穿普拉达的女王', '大卫·弗兰科尔 ','安妮·海瑟薇、梅丽尔·斯特里普、艾米丽·布朗特', '美国/法国', '2006-06-30', '剧情/爱情', '7.9', '初涉社会的安德丽娅•桑切丝来到了著名时尚杂志《RUNWAY》面试，以聪明得到了主编米兰达•普雷斯丽的特许，让她担任自己的第二助理。开始的时候安德丽娅感到十分委屈，就算自己多努力工作也无法得到赞赏，经一位老前辈的指点便重新改造自己。工作越来越顺，甚至取代了第一助理在米兰达心中的地位，决定带着这个聪明的女孩前往法国。');
INSERT INTO `film_information` VALUES(14, '名侦探柯南', '儿玉兼嗣 ','高山南、山崎和佳奈', '日本', '2002-04-20', '动画/悬疑/冒险', '8.9', '这日柯南、小兰一行人来到米花市市政大厅，一场有关最新游戏“茧”的发布会正在这里召开。50名体验者刚分别进入一个外型酷似蚕茧的“大型胶囊”，游戏即被自称“诺亚方舟”的人工智能控制，“诺亚方舟”称游戏将提供5个完全真实的历史场景，体验者可选择其中之一进入，被淘汰会进入休眠状态，若最后无人走到终点，他们的大脑组织皆会被摧毁，此举是为令日本社会重生。');
INSERT INTO `film_information` VALUES(15, '复仇者联盟4：终局之战', '安东尼·罗素、乔·罗素 ',' 克里斯托弗·马库斯、斯蒂芬·麦克菲利、斯坦·李、杰克·科比', '美国', '2019-04-26', '动作/科幻/冒险/奇幻', '8.5', '一声响指，宇宙间半数生命灰飞烟灭。几近绝望的复仇者们在惊奇队长的帮助下找到灭霸归隐之处，却得知六颗无限宝石均被销毁，希望彻底破灭。如是过了五年，迷失在量子领域的蚁人意外回到现实世界，他的出现为幸存的复仇者们点燃了希望。与美国队长冰释前嫌的托尼找到了穿越时空的方法，星散各地的超级英雄再度集结，他们分别穿越不同的时代去搜集无限宝石。而在这一过程中，平行宇宙的灭霸察觉了他们的计划。');

#添加字段
ALTER TABLE film_information ADD image_src VARCHAR(40) NOT NULL COMMENT '图片路径' AFTER catogory;
#更新图片路径
UPDATE film_information SET image_src='img/img01.png' WHERE id=1;
UPDATE film_information SET image_src='img/img02.png' WHERE id=2;
UPDATE film_information SET image_src='img/img03.png' WHERE id=3;
UPDATE film_information SET image_src='img/img04.png' WHERE id=4;
UPDATE film_information SET image_src='img/img05.png' WHERE id=5;
UPDATE film_information SET image_src='img/img06.png' WHERE id=6;
UPDATE film_information SET image_src='img/img07.png' WHERE id=7;
UPDATE film_information SET image_src='img/img08.png' WHERE id=8;
UPDATE film_information SET image_src='img/img09.png' WHERE id=9;
UPDATE film_information SET image_src='img/img10.png' WHERE id=10;
UPDATE film_information SET image_src='img/img11.png' WHERE id=11;
UPDATE film_information SET image_src='img/img12.png' WHERE id=12;
UPDATE film_information SET image_src='img/img13.png' WHERE id=13;
UPDATE film_information SET image_src='img/img14.png' WHERE id=14;
UPDATE film_information SET image_src='img/img15.png' WHERE id=15;


SELECT * FROM film_information;

# 删除语句 delete from film_information where id=4;


#院线热映
CREATE TABLE `hot_film` (
  `h_id` INT(10) NOT NULL AUTO_INCREMENT,
  `h_title` VARCHAR(80) NOT NULL COMMENT '标题',
  `h_image` VARCHAR(120) NOT NULL COMMENT '图片路径',
  `h_duration` TIME NOT NULL COMMENT '时长',
  `h_heat` INT(20) NOT NULL COMMENT '热度',
  `h_briefIntro` VARCHAR(180) NOT NULL COMMENT '简介（一行字）',
  PRIMARY KEY (`h_id`)
) ENGINE=MYISAM DEFAULT CHARSET=gbk;

INSERT INTO `hot_film` VALUES('1','小妇人·原片片段','./img/item06','00:01:02','1398','甜茶出色演技引人注目');
INSERT INTO `hot_film` VALUES('2','雷米奇遇记·终极预告','./img/item07','00:01:45','1342','小雷米被音乐点亮人生');
INSERT INTO `hot_film` VALUES('3','触不可及·终极预告','./img/item08','00:02:26','1286','毒师老白与妮可关系成谜');
INSERT INTO `hot_film` VALUES('4','南方车站的聚会·特辑','./img/item09','00:03:58','1123','胡歌怀揣敬畏挑战极限');
INSERT INTO `hot_film` VALUES('5','碧血苍穹·终极预告','./img/item10','00:01:34','1092','孙耀威化身帅气御前锦衣卫');
INSERT INTO `hot_film` VALUES('6','未来机器人','./img/item11','00:01:59','964','巅峰机器人展示战斗实力');

SELECT * FROM comments;
SELECT * FROM film_information;
SELECT * FROM hot_film;
select * from `user`;

delete from comments where id=17;
#update film_information set f_name='名侦探柯南' where id=14;