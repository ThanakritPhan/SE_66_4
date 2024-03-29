@extends('layoutMember')
@section('title', 'Order')
@section('content')
    <html>

    <head>
        <h2 style="text-align: center" style="padding: 60px">ใบแจ้งชำระ</h2>
    </head>

    <body>

        <div class="d-flex justify-content-center">
            <div class=" justify-content-center align-items-end" style="padding-top:10px">
                <form class="needs-validation" novalidate="" action="{{ route('confirm') }}"method="POST"
                    enctype="multipart/form-data">
                    <div class="col m-0 " style="width:1000px;">
                        <div class="d-flex card h-50" style="border-radius:20px;">
                            <div class="d-flex flex-row justify-content-around card-body p-4">

                                <div class="d-flex flex-column text-start">
                                    <h7 class="fw-bolder">Name Surname</h7>
                                    {{ $member->Name }} {{ $member->Surname }}
                                </div>
                                <div class="d-flex flex-column text-start">
                                    <h7 class="fw-bolder">memberID</h7>
                                    {{ $member->memberID }}
                                </div>
                                <div class="d-flex flex-column text-start">
                                    <h7 class="fw-bolder">Date</h7>
                                    <?php
                                    $day = date('d m Y');
                                    echo "$day";
                                    ?>
                                </div>
                                <div class="d-flex flex-column text-start">
                                    <h7 class="fw-bolder">Address</h7>
                                    {{ $member->Address }}
                                </div>

                            </div>

                            <div class="d-flex flex-row justify-content-between card-body p-4">
                                <div class="d-flex flex-row justify-content-between" style="margin-left:40px">
                                    <h6 class="fw-bolder">รายการสินค้า</h6>
                                </div>
                                <div style="margin-right:60px;">
                                </div>
                            </div>

                            <!--เก็บข้อมูลสินค้า-->
                            <div class="d-flex flex-column justify-content-between card-body p-4">

                                <div class="d-flex flex-column justify-content-between" style="margin-left:40px">

                                    @if (session('cart'))
                                        @foreach (session('cart') as $productID => $details)
                                            @csrf
                                            <div class="row g-3">
                                                <div class="d-flex card h-50" style="border-radius:20px">
                                                    <div
                                                        class="d-flex flex-column text-start"style="margin-left:40px;margin :20px">
                                                        <label for="name" class="form-label">ชื่อสินค้า</label>
                                                        <div class="input-group has-validation">
                                                            <input class="form-control" id="name" name="name[]"
                                                                value="{{ $details['name'] }}" placeholder=""
                                                                required=""readonly>
                                                        </div>

                                                        <div>
                                                            <label for="productID" class="form-label">รหัสสินค้า</label>
                                                            <div class="input-group has-validation">
                                                                <input class="form-control" id="productID"
                                                                    name="productID[]" value="{{ $details['productID'] }} "
                                                                    placeholder="" required=""readonly>

                                                            </div>
                                                            <div>
                                                                <label for="quantity" class="form-label">จำนวน</label>
                                                                <div class="input-group has-validation">
                                                                    <input class="form-control" id="quantity"
                                                                        name="quantity[]" value="{{ $details['quantity'] }}"
                                                                        placeholder="" required=""readonly>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <label for="price" class="form-label">ราคารวม</label>
                                                                <div class="input-group has-validation">
                                                                    <input class="form-control" id="price"
                                                                        name="price[]"
                                                                        value="{{ $details['price'] * $details['quantity'] }}บาท"
                                                                        placeholder="" required=""readonly>
                                                                </div>



                                                            </div>
                                                            <div style="display: none">
                                                                {{ $sum += $details['price'] * $details['quantity'] }}</div>
                                                            <br>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <!--เก็บข้อมูลสินค้า-->

                            <!--SUMMARY RECEIPT-->
                            <div class="d-flex flex-row justify-content-between card-body p-4">
                                <div>
                                    <h7 class="fw-bolder">ยอดรวม</h7>
                                </div>
                                <div style="margin-right:50px;">
                                    <br>
                                    <h7 class="fw-bolder">ราคารวม {{ $sum }} บาท</h7>

                                </div>
                            </div>

                            <!--EVIDENCE RECEIPT-->
                            <div class="d-flex flex-row justify-content-start card-body p-4">
                                <div>
                                    <h7 class="fw-bolder">ช่องทางการชำระเงิน</h7>
                                    <div class="d-flex flex-row justify-content-between" style="margin-left:50px;">
                                        <br>
                                        ธนาคารกสิกรไทย เลขบัญชี 045-xxxxxxx ชื่อบัญชี นายสมศักดิ์ เจริญพร
                                    </div>
                                </div>


                            </div>

                            <div class="d-flex flex-row justify-content-start card-body p-4">
                                <div>
                                    <h7 class="fw-bolder">หลักฐานการชำระเงิน*</h7><br>
                                    <br><img
                                        src="https://png.pngtree.com/png-vector/20190501/ourmid/pngtree-payment-icon-design-png-image_1013026.jpg"
                                        style="height: 150px">
                                </div>

                            </div>

                            <div class="d-flex flex-row justify-content-between card-footer p-4  border-top-0 bg-transparent"
                                style="">


                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" id="image" name="image" class="form-control-file">
                                </div>


                                <form action="{{ route('clearCart') }}" method="POST">
                                    @csrf
                                    <!-- ปุ่ม "Confirm" -->
                                    <div style="margin-right:40px" class="text-center">
                                        <button type="submit" id="confirmButton"
                                            class="btn btn-outline-dark mt-auto">Confirm</button>
                                    </div>
                                    <script>
                                        document.getElementById('confirmButton').addEventListener('click', function(event) {
                                            var imageInput = document.getElementById('image');
                                            if (imageInput.files.length === 0) {
                                                event.preventDefault(); // ยกเลิกการส่งฟอร์ม

                                                alert('กรุณาแนบรูปภาพ'); // แสดง Popup แจ้งเตือน
                                            }
                                        });
                                    </script>
                                </form>





                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </body>

    </html>
@endsection
