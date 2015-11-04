<div>
    <div >
        <div class="modal-header">
            <button type="button" class="close"
                    data-dismiss="modal" aria-hidden="true">
                &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
                添加工作经验和期待薪资
            </h4>
        </div>
        <div class="modal-body">
            <div style="margin-top: 6px">
                <label for="employee-intro" class="">工作经验简介</label>
                <div class=""><textarea maxlength="255" name="Employee[intro]" class="form-control" id="employee-intro"></textarea></div>
                <div class=""></div>
            </div>
            <div style="margin-top: 9px">
                <label for="employee-intro" class="">期待薪资</label>
                <input type="text" value="0.00" class="form-control">
                <div class=""></div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn  btn-circle red"
                        data-dismiss="modal">清除
            </button>
            <button type="button" class="btn btn-success  btn-circle">
                提交更改
            </button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal -->
