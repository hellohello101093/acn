<section>
    <div class="box-page">
        <div class="page-content">
            <div class="title-page">
                <span><?php echo $data['title'] ?></span>
            </div>
            <div class="content-page scroll content-text">
                <?php echo $data['content'] ?>
            </div>
        </div>
        <div class="page-menu">
            <div class="titile-page-menu">
                <span>Dịch vụ cung cấp</span>
            </div>
            <div class="list-menu-page">
                <ul>
                    <?php $services = $this->mservice->getAll(); foreach($services as $service) { ?>
                    <li class="<?php if($service['link']===$data['link']) echo 'active'; ?>">
                        <a href="dich-vu-cung-cap/chi-tiet/<?php echo $service['link'] ?>">
                            <img src="public/default/img/icon/list.png" alt=" " /><span><?php echo $service['title'] ?></span>
                        </a>
                    </li>
                    <?php } ?>   
                    <li></li>                 
                </ul>
            </div>
        </div>
        <div class="clr"></div>
    </div>
</section>