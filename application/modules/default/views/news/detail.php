<section>
    <div class="box-page">
        <div class="page-long">
            <div class="title-page">
                <span><?php echo $data['title'] ?></span>
            </div>
            <div class="content-page scroll content-text" style="max-height: 500px;">
                <?php echo $data['content'] ?>
            </div>
        </div>
        <div class="detail-right">
            <div class="title-duan-other">
                <span>Tin tức khác</span>
            </div>
            <div class="list-other">
                <ul>
                    <?php $duan = $this->mduan->getAll(); for($i=0; $i<count($duan); $i++){ ?>
                    <li>
                        <?php for($j = 0; $j < 2; $j++){ if(isset($duan[$i])){ ?>
                        <div class="item-duan">
                            <a href="tin-tuc/chi-tiet/<?php echo $duan[$i]['link'] ?>">
                                <div class="image-duan">
                                    <img src="public/duan/<?php echo $duan[$i]['avatar'] ?>" alt=" " />
                                </div>
                                <div class="title-duan">
                                    <span><?php echo $duan[$i]['title'] ?></span>
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
        <div class="clr"></div>
    </div>
</section>