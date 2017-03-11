<section>
    <div class="box-contact">
        <div class="contact-left">
            <div class="cover-contact"></div>
            <div class="hochiminh-contact box-contact-info">
                <div class="map-contact">
                    <iframe
                      height="297"
                      width="100%"
                      style="border:none;"
                      src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCJM_HqTUxZFoWhtf7WXL86zWx8yYw699Q
                        &q=<?php echo $this->mconfig->getByKey('address1') ?>">
                    </iframe>
                </div>
                <div class="info-contact">
                    <div class="ten-cty">
                        <span><?php echo $this->mconfig->getByKey('tencty') ?></span>
                    </div>
                    <div class="clr5"></div>
                    <div class="item-contact">
                        <div class="icon-contact">
                            <img src="public/default/img/icon/address.png" alt=" " />
                        </div>
                        <div class="value-contact">
                            <span><?php echo $this->mconfig->getByKey('address1') ?></span>
                        </div>
                    </div>
                    <div class="clr5"></div>
                    <div class="item-contact">
                        <div class="icon-contact">
                            <img src="public/default/img/icon/phone.png" alt=" " />
                        </div>
                        <div class="value-contact">
                            <span><?php echo $this->mconfig->getByKey('phone1') ?></span>
                        </div>
                        <div class="icon-contact" style="margin-left: 30px;">
                            <img src="public/default/img/icon/fax.png" alt=" " />
                        </div>
                        <div class="value-contact">
                            <span><?php echo $this->mconfig->getByKey('fax1') ?></span>
                        </div>
                    </div>
                    <div class="clr5"></div>
                    <div class="item-contact">
                        <div class="icon-contact">
                            <img src="public/default/img/icon/mail.png" alt=" " />
                        </div>
                        <div class="value-contact">
                            <span><?php echo $this->mconfig->getByKey('email1') ?> - Website: www.ancobtnn.com</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="vungtau-contact box-contact-info">
                <div class="map-contact">
                    <iframe
                      height="297"
                      width="100%"
                      style="border:none;"
                      src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCJM_HqTUxZFoWhtf7WXL86zWx8yYw699Q
                        &q=<?php echo $this->mconfig->getByKey('address2') ?>">
                    </iframe>
                </div>
                <div class="info-contact">
                    <div class="ten-cty">
                        <span>Công Ty TNHH BTNN Anco</span>
                    </div>
                    <div class="clr5"></div>
                    <div class="item-contact">
                        <div class="icon-contact">
                            <img src="public/default/img/icon/address.png" alt=" " />
                        </div>
                        <div class="value-contact">
                            <span><?php echo $this->mconfig->getByKey('address2') ?></span>
                        </div>
                    </div>
                    <div class="clr5"></div>
                    <div class="item-contact">
                        <div class="icon-contact">
                            <img src="public/default/img/icon/phone.png" alt=" " />
                        </div>
                        <div class="value-contact">
                            <span><?php echo $this->mconfig->getByKey('phone2') ?></span>
                        </div>
                        <div class="icon-contact" style="margin-left: 30px;">
                            <img src="public/default/img/icon/fax.png" alt=" " />
                        </div>
                        <div class="value-contact">
                            <span><?php echo $this->mconfig->getByKey('fax2') ?></span>
                        </div>
                    </div>
                    <div class="clr5"></div>
                    <div class="item-contact">
                        <div class="icon-contact">
                            <img src="public/default/img/icon/mail.png" alt=" " />
                        </div>
                        <div class="value-contact">
                            <span><?php echo $this->mconfig->getByKey('email2') ?> - Website: www.ancobtnn.com</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-contact">
                <ul>
                    <li class="active" data-class="hochiminh-contact">
                        <span>TP. Hồ Chí Minh</span>
                    </li>
                    <li data-class="vungtau-contact">
                        <span>TP. Vũng Tàu</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="contact-right">
            <form id="form-lienhe" method="post">
                <div class="item-form">
                    <div class="text-form">
                        <span>Họ và tên</span>
                    </div>
                    <div class="input-form">
                        <input name="name" placeholder="Họ và tên" type="text" required="" />
                    </div>
                </div>
                <div class="item-form">
                    <div class="text-form">
                        <span>Địa chỉ</span>
                    </div>
                    <div class="input-form">
                        <input name="address" placeholder="Địa chỉ" type="text" required="" />
                    </div>
                </div>
                <div class="item-form">
                    <div class="text-form">
                        <span>Email</span>
                    </div>
                    <div class="input-form">
                        <input name="email" placeholder="Email" type="email" required="" />
                    </div>
                </div>
                <div class="item-form">
                    <div class="text-form">
                        <span>Điện thoại</span>
                    </div>
                    <div class="input-form">
                        <input name="phone" placeholder="Điện thoại" type="text" required="" />
                    </div>
                </div>
                <div class="item-form">
                    <div class="text-form">
                        <span>Nội dung</span>
                    </div>
                    <div class="input-form" style="margin-left: -15px;">
                        <textarea name="message" required=""></textarea>
                    </div>
                </div>
                <div class="clr"></div>
                <div class="item-form">
                    <button type="submit"><span>Gửi</span></button>
                </div>
            </form>
        </div>
        <div class="clr"></div>
    </div>    
</section>