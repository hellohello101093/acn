<section>
    <div class="box-duan">
        <div class="list-duan">
            <ul>
                <?php foreach($data as $val){ $images = json_decode($val['image'], true); ?>
                <li>
                    <a href="du-an-khach-hang/chi-tiet/<?php echo $val['link'] ?>">
                        <div class="image-duan">
                            <img src="public/product/<?php echo $val['id'] ?>/thumbnail/<?php echo $images[$val['avatar']] ?>" alt=" " />
                        </div>
                        <div class="title-duan">
                            <span><?php echo $val['name'] ?></span>
                        </div>
                    </a>
                </li>
                <?php } ?>
            </ul>
            <div class="clr30"></div>
        </div>
        <div class="phantrang">
            <ul>
                <?php echo $pagination ?>
            </ul>
        </div>
    </div>
</section>