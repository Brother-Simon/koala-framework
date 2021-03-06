<? if ($this->pages) { ?>
    <? if ($this->baseUrl) { ?>
        <a class="frontendLink" href="<?=$this->baseUrl;?>">Frontend</a>
    <? } else { ?>
        <a class="frontendLink" href="/">Frontend</a>
    <? } ?>
<? } ?>
<div class="content">
    <? if ($this->untagged) { ?>
        <div class="untagged"><?=trlKwf('WARNING: untagged')?></div>
    <? } ?>
    <?php if($this->image) { ?>
        <div class="image" style="margin-top: -<?= $this->imageSize['height'] ?>px">
            <img src="<?= $this->image ?>" width="<?= $this->imageSize['width'] ?>" height="<?= $this->imageSize['height'] ?>" />
        </div>
    <?php } else { ?>
        <h1><?php echo $this->applicationName; ?> Login</h1>
    <?php } ?>

    <?=$this->errorsHtml?>
    <form action="<?= htmlspecialchars($this->action) ?>" method="<?=$this->method?>">
        <?php $this->formField($this->form) ?>
        <button class="submit" type="submit" name="<?= $this->formName ?>" value="submit"><?=trlKwf('Login')?></button>
    </form>
    <p>
        <a class="lostPassword" href="<?=$this->lostPasswordLink?>"><?=trlKwf('Lost password?')?></a>
    </p>
</div>
