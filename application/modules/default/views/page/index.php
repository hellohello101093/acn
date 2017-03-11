<section>
    <div class="box-page">
        <div class="page-content">
            <div class="title-page">
                <span><?php echo $page['title'] ?></span>
            </div>
            <div class="content-page scroll content-text">
                <?php echo $page['content'] ?>
            </div>
        </div>
        <div class="page-menu">
            <div class="titile-page-menu">
                <span>Giới thiệu</span>
            </div>
            <div class="list-menu-page">
                <ul>
                    <li class="<?php if($page['code']==='vechungtoi') echo 'active'; ?>">
                        <a href="ve-chung-toi">
                            <img src="public/default/img/icon/list.png" alt=" " /><span>Về chúng tôi</span>
                        </a>
                    </li>
                    <li class="<?php if($page['code']==='sodotochuc') echo 'active'; ?>">
                        <a href="so-do-to-chuc">
                            <img src="public/default/img/icon/list.png" alt=" " /><span>Sơ đồ tổ chức</span>
                        </a>
                    </li>
                    <li class="<?php if($page['code']==='tamnhinsumenh') echo 'active'; ?>">
                        <a href="tam-nhin-su-menh">
                            <img src="public/default/img/icon/list.png" alt=" " /><span>Tầm nhìn sứ mệnh</span>
                        </a>
                    </li>
                    <li class="<?php if($page['code']==='nganhnghekinhdoanh') echo 'active'; ?>">
                        <a href="nganh-nghe-kinh-doanh">
                            <img src="public/default/img/icon/list.png" alt=" " /><span>Ngành nghề kinh doanh</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="clr"></div>
    </div>
</section>