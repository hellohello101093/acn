<section>
    <div class="services-box">
        <ul>
            <?php foreach($services as $data) { ?>
            <li>
                <a href="dich-vu-cung-cap/chi-tiet/<?php echo $data['link'] ?>">
                    <div class="image-service">
                        <img src="public/service/<?php echo $data['avatar'] ?>" alt=" " />
                    </div>
                    <div class="title-service">
                        <span><?php echo $data['title'] ?></span>
                    </div>
                </a>
            </li>
            <?php } ?>
        </ul>
        <div class="clr"></div>
    </div>
</section>