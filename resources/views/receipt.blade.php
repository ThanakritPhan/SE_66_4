<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <title>Receipt</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" />
        <!-- Styles -->
        
    </head>
    <body>
        <!-- HEADER -->
        <div class="d-flex flex-row justify-content-end" style="background-color:#25393C;height:70px;">
            <div class="d-flex flex-row justify-content-end align-items-center" style="padding-right: 0px;color:#EAEAEA">
                <i class="bi bi-person-circle" style="font-size: 2rem;color: #EAEAEA;padding-right:10px"></i>  
            </div>
            <div class="d-flex flex-row justify-content-start align-items-center" style="width:150px; padding-right: 0px;color:#EAEAEA">
                ThanakritPhan
            </div>
        </div>
        <!-- HEADER -->
        <!-- Nav -->
        <nav class="flex-row" style="background-color: #AAB8C1;height:65px;">
            <ul class="nav nav-underline justify-content-start" style="padding-top:10px">
                <li class="nav-item">
                    <div class="d-flex flex-row bg-transparent">
                        <a class="icon-link icon-link-hover link-success link-underline-success" href="{{route('promotion')}}"><i class="bi bi-arrow-left" style="font-size: 2rem; padding-left: 20px; color:black" ></i></a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- Nav -->
        <div class="d-flex justify-content-center">
            <div class=" justify-content-center align-items-end" style="padding-top:50px">
            
                <div class="col m-0 " style="width:1000px;"><!--height:1500px;-->
                <form action="{{ route('upload.receipt') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="promotion" value="{{ json_encode($promotion) }}">
                    <input type="hidden" name="orderID" value="{{ json_encode($orderID) }}">
                    <input type="hidden" name="date" value="{{ json_encode($date) }}">
                    
                    <div class="d-flex card h-50" style="border-radius:20px;">
            
                        <!--HEADER RECEIPT-->
                        <div class="d-flex flex-row justify-content-around card-body p-4">
                            <div class="d-flex flex-column text-start">
                                <h7 class="fw-bolder">{{$member->Name}}</h7>
                                {{$member->loginID}}
                            </div>
                            <div class="d-flex flex-column text-start">
                                <h7 class="fw-bolder">รหัสคำสั่งซื้อ</h7>
                                {{$orderID}}
                            </div>
                            <div class="d-flex flex-column text-start">
                                <h7 class="fw-bolder">วันที่สั่งซื้อ</h7>
                                {{$date}}
                            </div>
                            <div class="d-flex flex-column text-start">
                                <h7 class="fw-bolder">ที่อยู่</h7>
                                {{$member->Address}}
                            </div> 
                        </div>
                        <!--PROMOTION RECEIPT-->
                        <div class="d-flex flex-column justify-content-start card-body p-4" >
                            <div class="d-flex flex-column text-start" style="margin-left:40px">
                                <h7 class="fw-bolder">Promotion ( {{$promotion->promotionname}} )</h7>
                            </div>
                            @foreach ($promotions as $pro)
                                <div class="d-flex flex-row justify-content-between" style="margin-left:40px;margin-top:15px;"> 
                                    <div>
                                        {{$pro->productname}} x 1
                                    </div>
                                    <div style="margin-right:60px;">
                                        {{$pro->price}} บาท
                                    </div>
                                </div>
                            @endforeach     
                        </div>

                        <!--SUMMARY RECEIPT-->
                        <div class="d-flex flex-row justify-content-between card-body p-4">
                            <div class="d-flex flex-row justify-content-between" style="margin-left:40px">
                                 <h7 class="fw-bolder">ยอดรวม</h7>
                            </div>
                            <div style="margin-right:60px;">
                                <span style=" color:red; text-decoration: line-through;">{{$SUM}} บาท</span> > {{$promotion->price_pro}} บาท
                            </div>
                        </div>
                        <!--EVIDENCE RECEIPT-->
                        <div class="d-flex flex-row justify-content-start card-body p-4">
                            <div class="d-flex flex-column text-start" style="margin-left:40px">
                                <h7 class="fw-bolder">ช่องทางการชำระเงิน</h7>
                            </div>
                            <div class="d-flex flex-row justify-content-between" style="margin-left:20px;"> 
                                <div>
                                        ธนาคารกสิกรไทย  เลขบัญชี 045-xxxxxxx ชื่อบัญชี นายสมศักดิ์ เจริญพร
                                </div>
                            </div>
                    
                        </div>

                        <div class="d-flex flex-row justify-content-between card-footer p-4  border-top-0 bg-transparent" style="">
                            
                            <div style="margin-left:40px;" class="text-center">
                                <!---->
                                    @csrf
                                    <input class="btn btn-outline-dark mt-auto" type="file" name="image">
                                    
                                
                            </div>
                            
                            @error('image')
                            <div style="color:red; margin-right:220px;padding-top:5px" class="text-center align-items-center">
                                {{$message}}
                            </div>
                                
                            @enderror

                            <div style="margin-right:40px" class="text-center"><button class="btn btn-outline-dark mt-auto" type="submit">Confirm</button></div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>