<!-- Details Modal -->
    <div class="modal fade" style="direction: rtl;" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <form action="#" method="post">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                العميل:
                                <input type"hidden" name="customer_name" id="customer_name" style="width: 300px; text-align: right;" readonly>
                            </h1>
                            <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <label for="formGroupExampleInput" class="form-label">الإجمالي</label>
                                    <input class="form-control" type"hidden" name="total" id="total">
                                </div>
                                <div class="col">
                                    <label for="formGroupExampleInput" class="form-label">المستلم</label>
                                    <input class="form-control" type"hidden" name="takenCash" id="takenCash">
                                </div>
                                <div class="col">
                                    <label for="formGroupExampleInput" class="form-label">المتبقي</label>
                                    <input class="form-control" type"hidden" name="carrier_number" id="carrier_number">
                                </div>
                            </div><br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                            <input type="submit" class="btn btn-success" value="عرض">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    