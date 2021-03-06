<style>
    body.dragging , body.dragging * {
        cursor: move !important;
    }

    .dragged {
        position: absolute;
        opacity: 0.5;
        z-index: 2000;
    }

    .placeholder {
        position: relative;
        border: 1px dashed #CCC;
        width: 100%;
        height: 30px !important;
        display: block;
    }
    ol.simple_with_drop li.placeholder:before {
        position: absolute;
    }
    ol{ list-style: none;}
    ol li{margin-bottom: 5px}
</style>
<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-coffee"></i>Danh Sách Thuộc Tính Phòng
        </div>
        <div class="tools">
            <a href="javascript:;" class="collapse">
            </a>
            <a href="javascript:;" class="reload">
            </a>
        </div>
    </div>
    <div class="portlet-body">
        <form action='<?php echo base_url() ?>admin/config/editlist/<?php echo $bien ?>' class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="form-body"  id="form-target" >
                <div style="height: 500px ;overflow-x: auto ; margin: 10px ; padding-right: 10px" >

                    <ol class='simple_with_drop'>

                        <?php
                        $list = json_decode($this->mconfig->getByKey($bien),true);
                        if($list != null){
                            foreach($list as $key=>$value){
                                ?>
                                <li>

                                    <div class="input-group">
                                        <span class="input-group-addon "><i class=" icon-move  fa fa-arrows"></i></span>
                                        <input type="text" name="attr[]" class='form-control' value="<?php echo $value ?>" />
                                        <span class="input-group-addon delete-email"><i class="fa fa-trash-o"></i></span>
                                    </div>
                                </li>
                            <?php
                            }
                        }
                        ?>

                    </ol>


                    <div id="clone" style="display: none">
                        <li>

                            <div class="input-group">
                                <span class="input-group-addon"><i class=" icon-move  fa fa-arrows"></i></span>
                                <input type="text" name="attr[]" class='form-control'  />
                                <span class="input-group-addon delete-email"><i class="fa fa-trash-o"></i></span>
                            </div>
                        </li>
                    </div>
                </div>
                <button class="btn green" id='btn-ok' name='ok' type='submit'>Xác Nhận</button>
                <button type="button" class="btn blue add-email" ><i class="fa  fa-plus-square-o"></i></button>
            </div>

        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("body").on("click",".delete-email",function(){
            $(this).parents('li').remove();
        })
        $(".add-email").click(function(){
            $("#form-target ol").append($("#form-target #clone").html());
        })
        $("ol.simple_with_drop").sortable({
            placeholder: "placeholder"
        })
    });
</script>





	