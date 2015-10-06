<div id="oi_popup" style="display: block; height: 1279px;">
    <div id="oi_popup_inner">
        <style type="text/css"> .public-table .t {
                color: #000;
            } </style>
        <div class="popup-border">
            <div class="clearfix opoup-title-bg">
                <div class="lf f50"><strong>Tạo tài khoản</strong></div>
                <div align="right"><a onclick="g_func.opopup('close')" href="javascript://">Đóng [x]</a></div>
            </div>
            <div class="popup-padding">
                <div>Tạo mới một tài khoản cho phép bạn truy cập và sử dụng các dịch vụ trên website này. Nếu bạn đã có
                    tài khoản, bạn hãy <a onclick="g_func.opopup('login')" href="javascript://">đăng nhập tại đây</a>
                </div>
                <br>

                <form name="frm_register" method="post" action="actions/process&amp;module_id=register"
                      target="target_eb_iframe" onsubmit="return _global_js_eb.c_func.register()"
                      style="padding:0 0 68px 0">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="public-table">
                        <tbody>
                        <tr>
                            <td class="t"><label for="t_email">Email:</label></td>
                            <td class="i"><input type="text" name="t_email" id="t_email" value=""
                                                 onblur="if (this.value != '') {ajaxl('guest.php?act=check_email_exist&amp;email=' +this.value, 'oi_check_email', 1);}"
                                                 class="l"> <span id="oi_check_email" style="margin:0 0 0 30px"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="t"><label for="t_email_r">Xác nhận email:</label></td>
                            <td class="i"><input type="text" name="t_email_r" id="t_email_r" value="" class="l"></td>
                        </tr>
                        <tr>
                            <td class="t"><label for="t_matkhau">Chọn mật khẩu:</label></td>
                            <td class="i"><input type="password" name="t_matkhau" id="t_matkhau" value="" class="l">
                            </td>
                        </tr>
                        <tr>
                            <td class="t"><label for="t_matkhau_r">Nhập lại mật khẩu:</label></td>
                            <td class="i"><input type="password" name="t_matkhau_r" id="t_matkhau_r" value="" class="l">
                            </td>
                        </tr>
                        <tr>
                            <td class="t" valign="top"><label for="t_captcha">Xác minh đăng ký:</label></td>
                            <td class="i">
                                <div>Nhập các ký tự bạn nhìn thấy trong bức hình dưới đây.</div>
                                <div style="padding:6px 0"><img title="Nhấp để đổi mã khác"
                                                                src="regist_image.php?v=0.914414003957063&amp;t=0.005759394960477948"
                                                                id="request_bg_register" align="Captcha"
                                                                onclick="reset_img_captcha()" class="cur"></div>
                                <div><input type="text" name="t_captcha" id="t_captcha" value="" maxlength="3"
                                            class="n"></div>
                                <div>Không phân biệt viết HOA viết thường</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="t" height="80">&nbsp;</td>
                            <td class="i"><input type="submit" name="bt_register" id="bt_register" value="Tạo tài khoản"
                                                 class="red-button"></td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        <script type="text/javascript"> function reset_img_captcha() {
                $('#request_bg_register').attr({src: 'regist_image.php?v=' + Math.random() + '&t=' + Math.random()});
            }
            reset_img_captcha(); </script>
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