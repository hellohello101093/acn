<script>
    $(document).ready(function(){
        $('#title').on('keyup change',function(){
            var name = $('#title').val();
            $.post( url + "admin/product/generateLink", { name : name})
                .done(function(data ) {
                    $('#link').val(data);

                });
        })
    })
</script>
<div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i><?php echo  (isset($info))?"Sửa ":"Thêm " ?>Danh Mục
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse">
                </a>
                <a href="javascript:;" class="reload">
                </a>

            </div>
        </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action='<?php echo base_url()?>admin/category/<?php echo $action ?>/<?php echo  (isset($info['id']))?$info['id']:"" ?>' class="form-horizontal" method="post" enctype="multipart/form-data">

                <div class="form-body">
                    <?php if(validation_errors()!=''){ ?>
                    <div class="note note-danger" >
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <?php echo validation_errors() ?>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Tên (*)</label>
                        <div class="col-md-4">
                            <input type="text" id='title' name='name' required="required" placeholder="Tiêu Đề ..." class='form-control' value='<?php
                            echo (isset($info))?$info['name']:"" ?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Đường Dẫn (*)</label>
                        <div class="col-md-8">
                            <input type="text" id='link' name='link' required="required" placeholder="Đường Dẫn ..." class='form-control' value='<?php
                            echo (isset($info))?$info['link']:"" ?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Keyword (*)</label>
                        <div class="col-md-4">
                            <input type="text" id='keyword' name='keyword' required="required" placeholder="Keyword ..." class='form-control' value='<?php
                            echo (isset($info['keyword']))?$info['keyword']:"" ?>'>
                        </div>
                    </div>
                    <?php if(isset($info['image'])){ ?>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Ảnh Cũ</label>
                        <div class="col-md-4">
                            <img src="<?php echo base_url() ?>public/default/category/thumbnail/<?php echo $info['image'] ?>" alt=" " height="100" />
                        </div>
                    </div>
                    <?php } ?>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Ảnh (630 x 330)</label>
                        <div class="col-md-4">
                            <input type="file" name="image" id="news-avatar" title="Tải ảnh đại diện" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Sắp Xếp (*)</label>
                        <div class="col-md-4">
                            <input type="text" id='sort' name='sort' required="required" placeholder="Sắp Xếp ..." class='form-control' value='<?php
                            echo (isset($info['sort']))?$info['sort']:"" ?>'>
                        </div>
                    </div>
                </div>
                <div class="form-actions nobg fluid">
                    <div class="col-md-offset-3 col-md-9">
                        <a href="<?php echo base_url() ?>admin/category/listall"  class="btn default">Hủy bỏ</a>
                        <button class="btn green" id='btn-ok' name='ok' type='submit'>Xác Nhận</button>
                    </div>
                </div>
            </form>
            <!-- END FORM-->
        </div>
    </div>
<script>
    $(document).ready(function(){
        $('.select2').select2({
            tags:true
        });
    })
</script>


