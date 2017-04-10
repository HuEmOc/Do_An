@extends('frontend.master')

@section('content')
    <style>
        .picsuccess {
            padding-top: 30px;
            display: block;
            overflow: visible;
            position: relative;
            width: 600px;
        }

        .picsuccess img {
            display: block;
            width: 100%;
            max-width: 640px;
            height: auto;
        }
        .notistatus {
            left: 0;
            right: 0;
            bottom: -18px;
            width: 280px;
            /* line-height: 36px; */
            font-size: 16px;
            color: #00af1d;
            font-weight: 600;
            text-align: center;
            display: block;
            margin: auto;
            text-transform: uppercase;
            padding-top: 20px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 1px 2px 0 rgba(0,0,0,.16);
        }
        .iconsuccess {
            background-position: -25px 0;
            width: 19px;
            height: 15px;
            margin-right: 3px;
        }
        .thank {
            display: block;
            overflow: hidden;
            width: 560px;
            margin: auto;
            color: #333;
            line-height: 22px;
            padding: 20px 20px 20px;
            background: #fff;
        }
        .titlebill {
            display: block;
            margin: 0 20px;
            line-height: 30px;
            font-size: 14px;
            color: #333;
            background: #f3f3f3;
            text-transform: uppercase;
            padding: 0 10px;
        }
        .infoorder, .callship, .cty {
            display: block;
            overflow: hidden;
            font-size: 14px;
            color: #333;
            padding: 10px 20px 0 20px;
            margin: auto;
            background: #fff;
        }
        .callship {
            line-height: 22px;
            padding-bottom: 10px;
        }
        .callship, .cty {
            display: block;
            overflow: hidden;
            font-size: 14px;
            color: #333;
            padding: 10px 20px 0 20px;
            margin: auto;
            background: #fff;
        }

         menu, dir {
            display: block;

            -webkit-margin-before: 1em;
            -webkit-margin-after: 1em;
            -webkit-margin-start: 0px;
            -webkit-margin-end: 0px;
            -webkit-padding-start: 40px;
        }


        .pull-right{
            padding-right: 50px;
        }
        .buyother {
            display: block;
            overflow: hidden;
            background: #fff;
            line-height: 40px;
            text-align: center;
            margin: 15px auto;
            width: 300px;
            font-size: 14px;
            color: #288ad6;
            font-weight: 600;
            text-transform: uppercase;
            border: 1px solid #288ad6;
            border-radius: 4px;
            margin-top: 100px;
        }

    </style>
    <div class="container" style="width: 600px; color: #ffffff">
        <div class="row">
            <div class="picsuccess">
                <img src="http://huemoc.dev/Image_frontend/phone/pic-success.png">
            </div>
            <div class="notistatus">
                 <i class="iconnoti iconsuccess">
                     Đặt hàng thành công
                 </i>
            </div>
            <div class="thank">
                Cảm ơn bạn đã tin tưởng và cho Huemoc.dev cơ hội được phục vụ. Nhân viên sẽ liên hệ lại với bạn để xác nhận đặt hàng.
            </div>



            <a  href="{{url('phone')}}" class="buyother">
                Mua thêm sản phẩm khác
            </a>
        </div>
    </div>
@endsection