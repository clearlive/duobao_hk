<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"C:\UPUPW_ANK_W64\WebRoot\Vhosts\duobao_hk/application/home\view\home\users\pay.html";i:1553602640;}*/ ?>
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
    <!--<meta charset="UTF-8">-->
    <!--<title>支付</title>-->
    <!--<style>-->
        <!--html,body,.forms{-->
            <!--display: flex;-->
            <!--justify-content: center;-->
            <!--flex-direction: column;-->
            <!--align-items: center;-->
            <!--height:100%;-->
            <!--width: 100%;-->
        <!--}-->
    <!--</style>-->
    <!--<script type="text/javascript" src="https://cdn.staticfile.org/jquery/1.11.1/jquery.min.js"></script>-->
<!--</head>-->
<!--<body>-->
<!--<form class="forms" action="pays" method="get">-->
    <!--<div class="radio" style="margin-bottom: 60px">-->
        <!--<label>-->
            <!--<div style="display: flex;justify-content: space-between;align-items: center">-->
                <!--<div><input type="radio" name="demo" id="demo-zfb" value="zfb" checked="checked" ></div>-->
                <!--<div style="flex: 3;margin-left: 60px"><img  style="width:300px;height: 150px;" src="/upload/pay/zfb.jpg" alt=""></div>-->
            <!--</div>-->
        <!--</label>-->
    <!--</div>-->
    <!--<div class="radio" style="margin-bottom: 90px">-->
        <!--<label>-->
            <!--<div style="display: flex;justify-content: space-between;align-items: center">-->
                <!--<div><input type="radio" name="demo" id="demo-wx" value="wx" ></div>-->
                <!--<div  style="flex: 3;margin-left: 60px"><img  style="width:300px;height: 110px;" src="/upload/pay/wx.jpg" alt=""></div>-->
            <!--</div>-->
        <!--</label>-->
    <!--</div>-->
    <!--<div style="margin-bottom: 90px">-->
        <!--<span style="font-size: 50px">支付金额:<?php echo $_REQUEST['total_fee'] ?></span>-->
    <!--</div>-->
    <!--<input type="hidden" name="total_fee" value="<?php echo $_REQUEST['total_fee'] ?>">-->
    <!--<button  style="width: 60%;height: 5%;font-size: 30px" type="button" id="demoBtn">确认购买</button>-->
<!--</form>-->
<!--</body>-->
<!--</html>-->
<!--<script>-->
    <!--$('#demoBtn').click(function () {-->
        <!--$('.forms').submit()-->

    <!--})-->
<!--</script>-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>020支付</title>
    <style>
    html,body,.forms{
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    height:100%;
    width: 100%;
    }
    </style>
</head>
<body>
<form class="forms">
    <div class="radio" style="margin-bottom: 60px">
        <label>
            <div style="display: flex;justify-content: space-between;align-items: center">
                <div><input type="radio" name="demo" id="demo-alipay" value="option2" checked="checked" ></div>
                <div style="flex: 3;margin-left: 60px"><img  style="width:300px;height: 150px;" src="/upload/pay/zfb.jpg" alt=""></div>
            </div>
        </label>
    </div>
    <div class="radio" style="margin-bottom: 90px">
        <label>
            <div style="display: flex;justify-content: space-between;align-items: center">
                <div><input type="radio" name="demo" id="demo-weixin" value="option1" ></div>
                <div  style="flex: 3;margin-left: 60px"><img  style="width:300px;height: 110px;" src="/upload/pay/wx.jpg" alt=""></div>
            </div>
        </label>
    </div>
    <div style="margin-bottom: 90px">
        <span style="font-size: 50px">支付金额:<?php echo $_REQUEST['total_fee'] ?></span>
    </div>
    <input type="hidden" id="inputprice" value="<?php echo $_REQUEST['total_fee'] ?>">
    <button style="width: 70%;height: 10%;font-size: 50px" type="button" id="demoBtn">确认购买</button>
</form>

<form style='display:none;' id='formpay' name='formpay' method='post' action='https://pay.020zf.com/'>
    <input name='goodsname' id='goodsname' type='text' value='' />
    <input name='type' id='type' type='text' value='' />
    <input name='key' id='key' type='text' value=''/>
    <input name='notify_url' id='notify_url' type='text' value=''/>
    <input name='orderid' id='orderid' type='text' value=''/>
    <input name='orderuid' id='orderuid' type='text' value=''/>
    <input name='price' id='price' type='text' value=''/>
    <input name='return_url' id='return_url' type='text' value=''/>
    <input name='identification' id='identification' type='text' value=''/>
    <input type='submit' id='submitdemo'>
</form>
<!-- Jquery files -->
<script type="text/javascript" src="https://cdn.staticfile.org/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
    $().ready(function(){
        function gettype(){
            return ($("#demo-weixin").is(':checked') ? "1" : "2" );
        }
        $("#demoBtn").click(function(){
            $.post(
                "<?php echo url('pays'); ?>",
                {
                    price : $("#inputprice").val(),
                    type : gettype()

                },
                function(data){
                    $('#identification').val(data.identification);
                    $('#price').val(data.price);
                    $("#type").val(data.type);
                    $('#notify_url').val(data.notify_url);
                    $('#return_url').val(data.return_url);
                    $('#orderid').val(data.orderid);
                    $('#orderuid').val(data.orderuid);
                    $("#goodsname").val(data.goodsname);
                    $('#key').val(data.key);
                    $('#submitdemo').click();
                }, "json"
            );
        });
    });
</script>

</body>
</html>