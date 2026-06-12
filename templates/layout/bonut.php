<?php
/*
 * NÚT NỔI (titkul): Hotline + Zalo (góc phải dưới)
*/
?>
<div class="tk-floatbtn">
    <?php if (!empty($optsetting['hotline'])) { ?>
    <a class="tk-float tk-float-phone" href="tel:<?= preg_replace('/[^0-9]/', '', $optsetting['hotline']) ?>" title="Gọi <?= $optsetting['hotline'] ?>">
        <i class="fas fa-phone-alt"></i>
        <span class="tk-float-label"><?= $optsetting['hotline'] ?></span>
    </a>
    <?php } ?>
    <?php if (!empty($optsetting['zalo'])) { ?>
    <a class="tk-float tk-float-zalo" href="https://zalo.me/<?= preg_replace('/[^0-9]/', '', $optsetting['zalo']) ?>" target="_blank" rel="nofollow" title="Chat Zalo">
        <img src="assets/images/zalo1.png" alt="Zalo" onerror="this.style.display='none';" />
        <span class="tk-float-label">Zalo</span>
    </a>
    <?php } ?>
</div>