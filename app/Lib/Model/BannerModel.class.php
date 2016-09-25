<?php
class BannerModel extends Model {
	protected $_validate=array(
			array('title','require','广告标题不能为空'),
			array('sort','number','排序号必须为数字'),
	);
}