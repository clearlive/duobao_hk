<?php
namespace application\admin\controller;
use application\admin\model\Settlements as M;
/**
 
 * application多用户商城
 * 版权所有 2016-2066 广州商淘信息科技有限公司，并保留所有权利。
 * 官网地址:http://www.application.net
 * 交流社区:http://bbs.shangtaosoft.com
 * 联系QQ:153289970
 
 

 
 * 结算控制器
 */
class Settlements extends Base{
    public function index(){
    	return $this->fetch('list');
    }

    /**
     * 获取列表
     */
    public function pageQuery(){
    	$m = new M();
    	return $m->pageQuery();
    }
    /**
     *  跳去结算页面
     */
    public function toHandle(){
    	$m = new M();
    	$object = $m->getById();
    	$this->assign("object",$object);
    	return $this->fetch('edit');
    }

    /**
     * 处理订单
     */
    public function handle(){
    	$m = new M();
    	return $m->handle();
    }
    /**
     *  跳去结算详情
     */
    public function toView(){
    	$m = new M();
    	$object = $m->getById();
    	$this->assign("object",$object);
    	return $this->fetch('view');
    }

    /**
     * 获取订单商品
     */
    public function pageGoodsQuery(){
        $m = new M();
        return $m->pageGoodsQuery();
    }

    /*************************************************
     *          以下是平台主动生成结算单
     ************************************************/
    /**
     * 进入平台结算野蛮
     */
    public function toShopIndex(){
        $this->assign("areaList",model('areas')->listQuery(0));
        return $this->fetch('list_shop');
    }

    /**
     * 获取待结算的商家列表
     */
    public function pageShopQuery(){
        $m = new M();
        return $m->pageShopQuery();
    }
    /**
     * 进入订单列表页面
     */
    public function toOrders(){
        $this->assign("id",(int)input('id'));
        return $this->fetch('list_order');
    }
    /**
     * 获取商家的待结算订单列表
     */
    public function pageShopOrderQuery(){
        $m = new M();
        return $m->pageShopOrderQuery();
    }
    /**
     * 生成结算单
     */
    public function generateSettleByShop(){
        $m = new M();
        return $m->generateSettleByShop();
    }
}
