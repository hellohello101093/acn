<section>
    <div class="box-tintuc">
        <div class="list-tintuc">
            <ul>
                <?php foreach($data as $val){ ?>
                <li>
                    <a href="tin-tuc/chi-tiet/<?php echo $val['link'] ?>">
                        <div class="cover-tintuc">
                            <div class="date-tintuc">
                                <div class="day-tintuc">
                                    <span><?php echo date('d', $val['created']) ?></span>
                                </div>
                                <div class="month-tintuc">
                                    <span><?php echo date('m', $val['created']) ?></span>
                                </div>
                            </div>
                            <div class="title-tintuc">
                                <span><?php echo $val['title'] ?></span>
                            </div>
                            <div class="desc-tintuc">
                                <?php echo $val['desc'] ?>
                            </div>
                        </div>
                        <div class="img-tintuc">
                            <img src="public/duan/<?php echo $val['avatar'] ?>" alt=" "/>
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