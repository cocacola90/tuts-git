<div id="oi_popup" style="display: block; height: 1279px;">
    <div id="oi_popup_inner">
        <div class="popup-border">
            <div class="clearfix opoup-title-bg">
                <div class="lf f50"><strong>Đăng nhập</strong></div>
                <div align="right"><a onclick="g_func.opopup('close')" href="javascript://">Đóng [x]</a></div>
            </div>
            <div class="popup-padding">
                <form name="frm_dangnhap" method="post" action="actions/login" target="target_eb_iframe"
                      onsubmit="return _global_js_eb.c_func.check_login();">
                    <div><label for="t_email"><strong>Email người dùng</strong></label></div>
                    <div><input type="text" name="t_email" id="t_email" value="" class="login-text"></div>
                    <br>

                    <div><label for="t_matkhau"><strong>Mật khẩu</strong></label></div>
                    <div><input type="password" name="t_matkhau" id="t_matkhau" value="" class="login-text"></div>
                    <br>

                    <div><input type="submit" name="bt_login" id="bt_login" value="Đăng nhập" class="blue-button"></div>
                    <br>

                    <div><input type="checkbox" name="t_remember" id="t_remember" value="1"> <label for="t_remember"
                                                                                                    style="color:#666">Duy
                            trì trạng thái đăng nhập</label></div>
                    <br>

                    <div><a href="javascript:void(g_func.opopup('fogotpassword'));">Bạn quên mật khẩu? lấy lại mật khẩu
                            tại đây</a></div>
                </form>
            </div>
        </div>
    </div>
</div>
<style type="text/css"> 
#oi_popup {
  background: rgba(0, 0, 0,.68);
  width: 100%;
  height: 100%;
  position: absolute;
  z-index: 999999;
  display: none;
}
#oi_popup #oi_popup_inner {
  background: #CCC;
  width: 600px;
  padding: 10px;
  margin: 50px auto;
  -moz-border-radius: 5px;
  border-radius: 5px;
}
#oi_popup_inner .opoup-title-bg, #oi_popup_inner .opoup-title-bg a {
  color: #fff;
}
#oi_popup_inner .opoup-title-bg {
  background: #090;
  line-height: 40px;
  padding: 0 10px;
  border: 1px #fff solid;
}
.f50 {
  width: 50%;
}
.lf {
  float: left;
}
#oi_popup_inner .opoup-title-bg strong {
  font-size: 16px;
}
#oi_popup_inner .opoup-title-bg, #oi_popup_inner .opoup-title-bg a {
  color: #fff;
}
#oi_popup_inner .popup-padding {
  background: #fff;
  padding: 20px;
}

</style>