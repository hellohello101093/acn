<section>
    <div class="box-duan-detail">
        <div class="detail-left">
            <div class="image-list">
                <ul>
                    <?php $images = json_decode($data['image'], true); foreach($images as $image){ ?>
                    <li>
                        <img src="public/product/<?php echo $data['id'] ?>/<?php echo $image ?>" alt=" " />
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="title-duan-detail">
                <span><?php echo $data['name'] ?></span>
            </div>
            <div class="content-duan-detail scroll content-text">
                <?php echo $data['content'] ?>
            </div>
        </div>
        <div class="detail-right">
            <div class="title-duan-other">
                <span>Dự án khác</span>
            </div>
            <div class="list-other">
                <ul>
                    <?php $duan = $this->mproduct->getAll(); for($i=0; $i<count($duan); $i++){ ?>
                    <li>
                        <?php for($j = 0; $j < 2; $j++){ if(isset($duan[$i])){$images = json_decode($duan[$i]['image'], true);  ?>
                        <div class="item-duan">
                            <a href="du-an-khach-hang/chi-tiet/<?php echo $duan[$i]['link'] ?>">
                                <div class="image-duan">
                                    <img src="public/product/<?php echo $duan[$i]['id'] ?>/thumbnail/<?php echo $images[$duan[$i]['avatar']] ?>" alt=" " />
                                </div>
                                <div class="title-duan">
                                    <span><?php echo $duan[$i]['name'] ?></span>
                                </div>
                            </a>
                        </div>
                        <?php $i++; } } $i--; ?>
                    </li>
                    <?php } ?>
                </ul>
                <div class="clr10"></div>
            </div>
            <div class="clr30"></div>
            <div class="button-duan-khac">
                <img src="public/default/img/icon/prev-duan.png" class="prev-duan-khac" alt=" " />
                <img src="public/default/img/icon/next-duan.png" class="next-duan-khac" alt=" " />
            </div>
        </div>
        <div class="clr30"></div>
    </div>
</section>